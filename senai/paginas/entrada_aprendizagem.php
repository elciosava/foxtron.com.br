<?php
// paginas/entrada_aprendizagem.php
require '../conexao/conexao.php';

// Buscar cursos APENAS de aprendizagem que são turma base
$sqlCursos = "SELECT id, nome, cod_curso, turno, ano_letivo, data_inicio, data_fim 
              FROM cursos
              WHERE modalidade = 'APRENDIZAGEM'
              AND eh_turma_base = 1
              ORDER BY ano_letivo DESC, nome ASC";
$stmtCursos = $conexao->query($sqlCursos);
$cursos = $stmtCursos->fetchAll(PDO::FETCH_ASSOC);


// Buscar feriados (para cálculo automático da data fim)
$sqlF = "SELECT data FROM feriados";
$stmtF = $conexao->query($sqlF);
$feriados = $stmtF->fetchAll(PDO::FETCH_COLUMN); // array de 'YYYY-MM-DD'

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $curso_base_id = (int)($_POST['curso_base_id'] ?? 0);
    $nome          = trim($_POST['nome'] ?? '');
    $cod_curso     = trim($_POST['cod_curso'] ?? '');
    $cod_turma     = trim($_POST['cod_turma'] ?? '');
    $cod_matriz    = trim($_POST['cod_matriz'] ?? '');
    $carga_total   = (float)($_POST['carga_horaria_total'] ?? 60);
    $horas_dia     = (float)($_POST['horas_por_dia'] ?? 4);
    $data_inicio   = $_POST['data_inicio'] ?? '';
    $data_fim      = $_POST['data_fim'] ?? '';
    $dias_aula     = strtoupper(trim($_POST['dias_aula'] ?? 'SEG,TER,QUA,QUI,SEX'));

    if (!$curso_base_id || empty($nome) || empty($data_inicio) || empty($data_fim)) {
        $msg = "Preencha curso base, nome, data início e data fim.";
    } else {
        // 1) Busca o curso base para herdar turno/ano etc.
        $sqlBase = "SELECT * FROM cursos WHERE id = :id";
        $stmtBase = $conexao->prepare($sqlBase);
        $stmtBase->execute([':id' => $curso_base_id]);
        $cursoBase = $stmtBase->fetch(PDO::FETCH_ASSOC);

        if (!$cursoBase) {
            $msg = "Curso base não encontrado.";
        } else {
            try {
                $conexao->beginTransaction();

                $turno      = $cursoBase['turno'] ?? 'Vespertino';
                $ano_letivo = (int)($cursoBase['ano_letivo'] ?? date('Y'));

                // 2) Inserir o novo curso de ENTRADA
                //    Já definindo modalidade = APRENDIZAGEM e eh_turma_base = 0
                $sqlInsCurso = "INSERT INTO cursos
                    (nome, cod_curso, cod_turma, cod_matriz,
                     carga_horaria_total, data_inicio, data_fim,
                     turno, ano_letivo, horas_por_dia, dias_aula,
                     modalidade, eh_turma_base)
                    VALUES
                    (:nome, :cod_curso, :cod_turma, :cod_matriz,
                     :carga, :inicio, :fim,
                     :turno, :ano, :horas_dia, :dias_aula,
                     :modalidade, :eh_turma_base)";
                $stmtIns = $conexao->prepare($sqlInsCurso);
                $stmtIns->execute([
                    ':nome'        => $nome,
                    ':cod_curso'   => $cod_curso,
                    ':cod_turma'   => $cod_turma,
                    ':cod_matriz'  => $cod_matriz,
                    ':carga'       => $carga_total,
                    ':inicio'      => $data_inicio,
                    ':fim'         => $data_fim,
                    ':turno'       => $turno,
                    ':ano'         => $ano_letivo,
                    ':horas_dia'   => $horas_dia,
                    ':dias_aula'   => $dias_aula,
                    ':modalidade'  => 'APRENDIZAGEM',
                    ':eh_turma_base' => 0
                ]);

                $novo_curso_id = (int)$conexao->lastInsertId();

                // 3) Pegar as 3 primeiras UCs do curso base (ordem por id)
                $sqlUC = "SELECT id, sigla, nome, carga_horaria, cor, professor_id
                          FROM unidades_curriculares
                          WHERE curso_id = :curso_id
                          ORDER BY id
                          LIMIT 3";
                $stmtUC = $conexao->prepare($sqlUC);
                $stmtUC->execute([':curso_id' => $curso_base_id]);
                $ucsBase = $stmtUC->fetchAll(PDO::FETCH_ASSOC);

                if (!empty($ucsBase)) {
                    $sqlInsUC = "INSERT INTO unidades_curriculares
                                (curso_id, sigla, nome, carga_horaria, cor, professor_id)
                                VALUES
                                (:curso_id, :sigla, :nome, :carga, :cor, :professor_id)";
                    $stmtInsUC = $conexao->prepare($sqlInsUC);

                    foreach ($ucsBase as $uc) {
                        $stmtInsUC->execute([
                            ':curso_id'     => $novo_curso_id,
                            ':sigla'        => $uc['sigla'],
                            ':nome'         => $uc['nome'],
                            ':carga'        => $uc['carga_horaria'],
                            ':cor'          => $uc['cor'] ?? null,
                            // se quiser herdar professor da UC base, troque null por $uc['professor_id']
                            ':professor_id' => null
                        ]);
                    }
                }

                $conexao->commit();

                // 4) Depois de criar o curso + UCs, chama o gerador de agendamentos
                header("Location: ../api/gerar_agendamentos.php?curso_id=" . $novo_curso_id);
                exit;

            } catch (PDOException $e) {
                if ($conexao->inTransaction()) {
                    $conexao->rollBack();
                }
                $msg = "Erro ao criar curso de entrada: " . $e->getMessage();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
    <title>Módulo de Entrada - Aprendizagem</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f6fc;
            margin: 0;
        }
        header {
            background: #1a2041;
            color: #fff;
            padding: 15px 20px;
        }
        header h1 {
            margin: 0;
            font-size: 20px;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            background: #fff;
            padding: 20px 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,.1);
        }
        h2 {
            margin-top: 0;
        }
        form label {
            display:block;
            font-weight:bold;
            margin-top:10px;
            font-size:13px;
        }
        form input, form select {
            width:100%;
            padding:8px;
            margin-top:3px;
            border-radius:5px;
            border:1px solid #ccc;
            font-size:13px;
            box-sizing:border-box;
        }
        .linha {
            display:flex;
            gap:10px;
        }
        .linha > div {
            flex:1;
        }
        button {
            margin-top:15px;
            padding:8px 15px;
            background:#1a2041;
            color:#fff;
            border:none;
            border-radius:6px;
            font-weight:bold;
            cursor:pointer;
        }
        button:hover {
            opacity:.9;
        }
        .msg {
            margin-top:10px;
            font-size:13px;
            color:#b30000;
        }
        a.btn {
            display:inline-block;
            margin-bottom:15px;
            padding:6px 10px;
            background:#1a2041;
            color:#fff;
            text-decoration:none;
            border-radius:6px;
            font-size:13px;
        }
        small {
            font-size:11px;
            color:#555;
        }
        #resumo_calculo {
            font-size: 12px;
            color:#333;
            margin-left: 5px;
        }
    </style>
</head>
<body>
<header>
    <h1>Módulo de Entrada - Aprendizagem</h1>
</header>

<div class="container">
    <a href="../index.php" class="btn">Voltar</a>
    <a href="cursos.php" class="btn">Gerenciar cursos</a>

    <h2>Criar turma de ENTRADA</h2>

    <?php if (!empty($msg)): ?>
        <div class="msg"><?= htmlspecialchars($msg) ?></div>
    <?php endif; ?>

    <form method="post">
        <label>Curso base (turma principal em que essa entrada vai se juntar depois)</label>
        <select name="curso_base_id" id="curso_base_id" required>
            <option value="">Selecione...</option>
            <?php foreach ($cursos as $c): ?>
                <option value="<?= (int)$c['id'] ?>"
                        data-nome-curso="<?= htmlspecialchars($c['nome']) ?>">
                    <?= htmlspecialchars($c['nome']) ?>
                    (<?= htmlspecialchars($c['cod_curso']) ?> |
                    <?= date('d/m/Y', strtotime($c['data_inicio'])) ?> -
                    <?= date('d/m/Y', strtotime($c['data_fim'])) ?>)
                </option>
            <?php endforeach; ?>
        </select>

        <label>Nome do curso de entrada</label>
        <input type="text" name="nome" id="nome_curso_entrada"
               placeholder="Será preenchido automaticamente com base no curso selecionado" required>

        <div class="linha">
            <div>
                <label>Cód. Curso</label>
                <input type="text" name="cod_curso" placeholder="Opcional">
            </div>
            <div>
                <label>Cód. Turma</label>
                <input type="text" name="cod_turma" placeholder="Ex: APR-ENTRADA-001/2025">
            </div>
            <div>
                <label>Cód. Matriz</label>
                <input type="text" name="cod_matriz" placeholder="Opcional">
            </div>
        </div>

        <div class="linha">
            <div>
                <label>Carga horária total (h)</label>
                <input type="number" name="carga_horaria_total" id="carga_horaria_total" value="60">
                <small>Ex: 3 UCs iniciais de 20h</small>
            </div>
            <div>
                <label>Horas por dia</label>
                <input type="number" step="0.25" name="horas_por_dia" id="horas_por_dia" value="4">
            </div>
        </div>

        <div class="linha">
            <div>
                <label>Data início</label>
                <input type="date" name="data_inicio" id="data_inicio" required>
            </div>
            <div>
                <label>Data fim</label>
                <input type="date" name="data_fim" id="data_fim" required>
            </div>
        </div>

        <label>Dias de aula (SEG,TER,QUA,QUI,SEX,SAB,DOM)</label>
        <input type="text" name="dias_aula" id="dias_aula" value="SEG,TER,QUA,QUI,SEX">

        <div style="margin-top:8px;">
            <button type="button" onclick="calcularDataFimEntrada()">Calcular data fim</button>
            <span id="resumo_calculo"></span>
        </div>

        <button type="submit">Criar curso de entrada e gerar calendário</button>
    </form>

    <p style="margin-top:15px; font-size:12px; color:#444;">
        Este módulo:
        <br>• Cria um novo curso com ~60h (3 UCs iniciais copiadas do curso base),
        <br>• Copia as 3 primeiras UCs do curso selecionado,
        <br>• Calcula automaticamente a data final considerando dias de aula e feriados,
        <br>• Roda o gerador de agendamentos para esse curso de entrada.
    </p>
</div>

<script>
// Feriados vindos do PHP (mantidos se quiser usar futuramente)
const FERIADOS = <?php echo json_encode($feriados ?? []); ?>;

// Preenche automaticamente o nome do curso de entrada baseado no curso base
document.getElementById('curso_base_id').addEventListener('change', function () {
    const select = this;
    const opt = select.options[select.selectedIndex];
    const nomeBase = opt.getAttribute('data-nome-curso') || '';

    const inputNome = document.getElementById('nome_curso_entrada');
    if (nomeBase) {
        if (!inputNome.value || inputNome.value.startsWith('Entrada -')) {
            inputNome.value = 'Entrada - ' + nomeBase;
        }
    }
});

// Cálculo da data fim sincronizado via backend
async function calcularDataFimEntrada() {
    const selectCursoBase = document.getElementById('curso_base_id');
    const curso_base_id = parseInt(selectCursoBase.value || '0', 10);

    const inputCarga     = document.getElementById('carga_horaria_total');
    const inputHorasDia  = document.getElementById('horas_por_dia');
    const inputInicio    = document.getElementById('data_inicio');
    const inputFim       = document.getElementById('data_fim');
    const inputDias      = document.getElementById('dias_aula');
    const resumo         = document.getElementById('resumo_calculo');

    if (!curso_base_id) {
        if (resumo) resumo.textContent = 'Selecione o curso base antes de calcular.';
        return;
    }

    const carga          = parseFloat(String(inputCarga.value).replace(',', '.'));
    const horasDia       = parseFloat(String(inputHorasDia.value).replace(',', '.'));
    const dataInicioStr  = inputInicio.value;
    const diasStr        = (inputDias.value || '').toUpperCase();

    if (!carga || !horasDia || !dataInicioStr || !diasStr) {
        if (resumo) resumo.textContent = 'Preencha carga, horas/dia, data início e dias de aula.';
        return;
    }

    try {
        const resp = await fetch('../api/sincronizar_entrada.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                curso_base_id:       curso_base_id,
                carga_horaria_total: carga,
                horas_por_dia:       horasDia,
                dias_aula:           diasStr,
                data_inicio:         dataInicioStr
            })
        });

        const json = await resp.json();

        if (json.status !== 'ok') {
            if (resumo) {
                resumo.textContent = 'Erro ao calcular: ' + (json.mensagem || 'desconhecido');
            }
            return;
        }

        const dataTeorica = json.data_fim_teorica;
        const dataSync    = json.data_fim_sincronizada || dataTeorica;

        inputFim.value = dataSync;

        function formatoBR(dataStr) {
            if (!dataStr) return '';
            const [ano, mes, dia] = dataStr.split('-');
            return `${dia}/${mes}/${ano}`;
        }

        let textoResumo = `Término teórico em ${formatoBR(dataTeorica)}. `;
        if (dataSync !== dataTeorica) {
            textoResumo += `Sincronizado com a turma principal para terminar em ${formatoBR(dataSync)}. `;
        }

        if (json.uc_nome || json.uc_sigla) {
            const rotuloUC = (json.uc_sigla ? json.uc_sigla + ' - ' : '') + (json.uc_nome || '');
            textoResumo   += `A entrada termina junto com a UC: ${rotuloUC}.`;
        }

        if (resumo) {
            resumo.textContent = textoResumo;
        }

    } catch (e) {
        console.error(e);
        if (resumo) resumo.textContent = 'Falha na comunicação com o servidor ao sincronizar.';
    }
}
</script>

</body>
</html>
