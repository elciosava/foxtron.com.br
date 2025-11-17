<?php
require '../conexao/conexao.php';

// Se enviou o formulário, grava o curso
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $cod_curso = $_POST['cod_curso'] ?? '';
    $cod_turma = $_POST['cod_turma'] ?? '';
    $cod_matriz = $_POST['cod_matriz'] ?? '';
    $carga = (int) ($_POST['carga_horaria_total'] ?? 0);
    $data_inicio = $_POST['data_inicio'] ?? '';
    $data_fim = $_POST['data_fim'] ?? '';
    $turno = $_POST['turno'] ?? 'Vespertino';
    $ano_letivo = (int) ($_POST['ano_letivo'] ?? date('Y'));
    $horas_dia = (float) ($_POST['horas_por_dia'] ?? 4);
    $dias_aula = $_POST['dias_aula'] ?? 'SEG,TER,QUA,QUI,SEX';

    if (!empty($nome) && !empty($data_inicio) && !empty($data_fim)) {
        $sql = "INSERT INTO cursos
                (nome, cod_curso, cod_turma, cod_matriz,
                 carga_horaria_total, data_inicio, data_fim,
                 turno, ano_letivo, horas_por_dia, dias_aula)
                VALUES
                (:nome, :cod_curso, :cod_turma, :cod_matriz,
                 :carga, :inicio, :fim,
                 :turno, :ano, :horas_dia, :dias_aula)";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':cod_curso' => $cod_curso,
            ':cod_turma' => $cod_turma,
            ':cod_matriz' => $cod_matriz,
            ':carga' => $carga,
            ':inicio' => $data_inicio,
            ':fim' => $data_fim,
            ':turno' => $turno,
            ':ano' => $ano_letivo,
            ':horas_dia' => $horas_dia,
            ':dias_aula' => $dias_aula
        ]);
        $msg = "Curso cadastrado com sucesso!";
    } else {
        $msg = "Preencha pelo menos Nome, Data de início e Data de fim.";
    }
}

// Buscar todos os cursos
$sql = "SELECT * FROM cursos ORDER BY ano_letivo DESC, nome ASC";
$stmt = $conexao->query($sql);
$cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Buscar feriados (para o cálculo da data final)
$sqlF = "SELECT data FROM feriados";
$stmtF = $conexao->query($sqlF);
$feriados = $stmtF->fetchAll(PDO::FETCH_COLUMN); // array de 'YYYY-MM-DD'

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Cursos</title>
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
            max-width: 1200px;
            margin: 20px auto;
            background: #fff;
            padding: 20px 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
        }

        form label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
            font-size: 13px;
        }

        form input,
        form select,
        form textarea {
            width: 100%;
            padding: 8px;
            margin-top: 3px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 13px;
            box-sizing: border-box;
        }

        .linha {
            display: flex;
            gap: 10px;
        }

        .linha>div {
            flex: 1;
        }

        button {
            margin-top: 15px;
            padding: 8px 15px;
            background: #1a2041;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            opacity: .9;
        }

        .msg {
            margin-top: 10px;
            font-size: 13px;
            color: green;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 13px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 6px;
        }

        th {
            background: #f0f0ff;
        }

        a.btn {
            display: inline-block;
            margin-bottom: 15px;
            padding: 6px 10px;
            background: #1a2041;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-size: 13px;
        }

        .mini-link {
            font-size: 11px;
            text-decoration: none;
            color: #1a2041;
        }
    </style>
</head>

<body>
    <header>
        <h1>Cadastro de Cursos</h1>
    </header>

    <div class="container">
        <a href="../index.php" class="btn">Voltar para geração de calendário</a>
        <a href="professores.php" class="btn">Gerenciar professores</a>



        <h2>Novo Curso</h2>

        <?php if (!empty($msg)): ?>
            <div class="msg"><?= htmlspecialchars($msg) ?></div>
        <?php endif; ?>

        <form method="post">
            <label>Nome do curso</label>
            <input type="text" name="nome" required>

            <div class="linha">
                <div>
                    <label>Cód. Curso</label>
                    <input type="text" name="cod_curso" placeholder="Ex: QUA.G0073">
                </div>
                <div>
                    <label>Cód. Turma</label>
                    <input type="text" name="cod_turma" placeholder="Ex: QUA-V-G00280/2025">
                </div>
                <div>
                    <label>Cód. Matriz</label>
                    <input type="text" name="cod_matriz" placeholder="Ex: QUAG007303">
                </div>
            </div>

            <div class="linha">
                <div>
                    <label>Carga horária total (h)</label>
                    <input type="number" name="carga_horaria_total" id="carga_horaria_total" value="160">
                </div>
                <div>
                    <label>Horas por dia</label>
                    <input type="number" step="0.25" name="horas_por_dia" id="horas_por_dia" value="4">
                </div>
                <div>
                    <label>Ano letivo</label>
                    <input type="number" name="ano_letivo" id="ano_letivo" value="<?= date('Y') ?>">
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
                <div>
                    <label>Turno</label>
                    <select name="turno">
                        <option value="Matutino">Matutino</option>
                        <option value="Vespertino" selected>Vespertino</option>
                        <option value="Noturno">Noturno</option>
                    </select>
                </div>
            </div>

            <label>Dias de aula (use SEG,TER,QUA,QUI,SEX,SAB,DOM)</label>
            <input type="text" name="dias_aula" id="dias_aula" value="SEG,TER,QUA,QUI,SEX">

            <div style="margin-top:8px; display:flex; gap:10px; align-items:center; flex-wrap:wrap;">
                <button type="button" onclick="calcularDataFim()">Recalcular término</button>
                <span id="resumo_calculo" style="font-size:12px; color:#333;">
                    <!-- JS preenche aqui -->
                </span>
            </div>

            <div style="margin-top:8px; max-width:400px;">
                <div style="font-size:11px; margin-bottom:3px;">Ocupação do curso no ano letivo:</div>
                <div style="background:#e0e0e0; border-radius:999px; overflow:hidden; height:10px;">
                    <div id="barra_ocupacao" style="height:10px; width:0%; background:#1a2041;"></div>
                </div>
                <div id="texto_ocupacao" style="font-size:11px; margin-top:2px; color:#333;"></div>
            </div>

            <button type="submit">Cadastrar curso</button>
        </form>

        <h2>Cursos cadastrados</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Curso</th>
                <th>Período</th>
                <th>Turno</th>
                <th>CH</th>
                <th>UCs</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($cursos as $c): ?>
                <tr>
                    <td><?= $c['id'] ?></td>
                    <td>
                        <?= htmlspecialchars($c['nome']) ?><br>
                        <small><?= htmlspecialchars($c['cod_curso'] . ' | ' . $c['cod_turma']) ?></small>
                    </td>
                    <td><?= date('d/m/Y', strtotime($c['data_inicio'])) ?> a <?= date('d/m/Y', strtotime($c['data_fim'])) ?>
                    </td>
                    <td><?= htmlspecialchars($c['turno']) ?></td>
                    <td><?= (int) $c['carga_horaria_total'] ?>h</td>
                    <td>
                        <a class="mini-link" href="ucs.php?curso_id=<?= $c['id'] ?>">Gerenciar UCs</a>
                    </td>
                    <td>
                        <a class="mini-link" href="../api/gerar_agendamentos.php?curso_id=<?= $c['id'] ?>">Gerar calendário</a><br>
                        <a class="mini-link" href="calendario_curso.php?curso_id=<?= $c['id'] ?>">Ver calendário</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <script>
        // Feriados que vieram do PHP (formato 'YYYY-MM-DD')
        const FERIADOS = <?php echo json_encode($feriados ?? []); ?>;

        function calcularDataFim() {
            const inputCarga = document.getElementById('carga_horaria_total');
            const inputHorasDia = document.getElementById('horas_por_dia');
            const inputInicio = document.getElementById('data_inicio');
            const inputFim = document.getElementById('data_fim');
            const inputDias = document.getElementById('dias_aula');
            const inputAnoLetivo = document.getElementById('ano_letivo');

            const carga = parseFloat(String(inputCarga.value).replace(',', '.'));
            const horasDia = parseFloat(String(inputHorasDia.value).replace(',', '.'));
            const dataInicioStr = inputInicio.value;
            const diasStr = (inputDias.value || '').toUpperCase();
            const anoLetivo = parseInt(inputAnoLetivo.value || new Date().getFullYear());

            // validações básicas
            if (!carga || !horasDia || !dataInicioStr || !diasStr) {
                return;
            }
            if (horasDia <= 0) return;

            // Data de início
            const data = new Date(dataInicioStr + 'T00:00:00');
            let horasAcumuladas = 0;
            let diasLetivos = 0;

            const mapaDiaSemana = {
                0: 'DOM',
                1: 'SEG',
                2: 'TER',
                3: 'QUA',
                4: 'QUI',
                5: 'SEX',
                6: 'SAB'
            };

            const diasPermitidos = diasStr.split(',')
                .map(s => s.trim())
                .filter(s => s.length > 0);

            if (diasPermitidos.length === 0) return;

            let seguranca = 0;
            while (horasAcumuladas < carga && seguranca < 2000) {
                const diaSemana = mapaDiaSemana[data.getDay()]; // DOM, SEG, TER, ...

                // monta string 'YYYY-MM-DD' da data atual
                const ano = data.getFullYear();
                const mes = String(data.getMonth() + 1).padStart(2, '0');
                const dia = String(data.getDate()).padStart(2, '0');
                const dataStr = `${ano}-${mes}-${dia}`;

                const ehFeriado = FERIADOS.includes(dataStr);

                // conta horas só se for dia permitido E não for feriado
                if (diasPermitidos.includes(diaSemana) && !ehFeriado) {
                    horasAcumuladas += horasDia;
                    diasLetivos++;
                }

                if (horasAcumuladas >= carga) break;

                data.setDate(data.getDate() + 1);
                seguranca++;
            }

            const anoF = data.getFullYear();
            const mesF = String(data.getMonth() + 1).padStart(2, '0');
            const diaF = String(data.getDate()).padStart(2, '0');
            const dataFimStr = `${anoF}-${mesF}-${diaF}`;
            inputFim.value = dataFimStr;

            // Texto de resumo
            const resumo = document.getElementById('resumo_calculo');
            if (resumo) {
                const legivel = `${diaF}/${mesF}/${anoF}`;
                resumo.textContent = `Previsão: ${diasLetivos} dias de aula, término em ${legivel}.`;
            }

            // Barra de ocupação no ano letivo
            const barra = document.getElementById('barra_ocupacao');
            const textoOcup = document.getElementById('texto_ocupacao');
            if (barra && textoOcup) {
                const anoInicio = anoLetivo;
                const inicioAno = new Date(`${anoInicio}-01-01T00:00:00`);
                const fimAno = new Date(`${anoInicio}-12-31T00:00:00`);

                const inicioCurso = new Date(dataInicioStr + 'T00:00:00');
                const fimCurso = new Date(dataFimStr + 'T00:00:00');

                const msDia = 1000 * 60 * 60 * 24;

                const diasAno = Math.round((fimAno - inicioAno) / msDia) + 1;
                const diasCurso = Math.max(1, Math.round((fimCurso - inicioCurso) / msDia) + 1);

                let perc = Math.round((diasCurso / diasAno) * 100);
                if (perc > 100) perc = 100;
                if (perc < 0) perc = 0;

                barra.style.width = perc + '%';
                textoOcup.textContent = `O curso ocupa aproximadamente ${diasCurso} dias de calendário (${perc}% do ano letivo de ${anoLetivo}).`;
            }
        }

        // dispara o cálculo quando o usuário mexer nos campos
        window.addEventListener('DOMContentLoaded', function () {
            const camposQueRecalculam = [
                'carga_horaria_total',
                'horas_por_dia',
                'data_inicio',
                'dias_aula',
                'ano_letivo'
            ];

            camposQueRecalculam.forEach(id => {
                const el = document.getElementById(id);
                if (el) {
                    el.addEventListener('change', calcularDataFim);
                    el.addEventListener('blur', calcularDataFim);
                    el.addEventListener('keyup', function () {
                        clearTimeout(el._timer);
                        el._timer = setTimeout(calcularDataFim, 400);
                    });
                }
            });
        });
    </script>


</body>

</html>