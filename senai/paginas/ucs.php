<?php
// paginas/ucs.php
require '../conexao/conexao.php';

$curso_id = filter_input(INPUT_GET, 'curso_id', FILTER_VALIDATE_INT);
if (!$curso_id) {
    die("Curso inválido.");
}

$msg = "";

// -----------------------------------------
// TRATAMENTO DE POST (NOVA UC / DEFINIR PROF)
// -----------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';

    // 1) Cadastrar NOVA UC
    if ($acao === 'nova_uc') {
        $sigla        = trim($_POST['sigla'] ?? '');
        $nome_uc      = trim($_POST['nome'] ?? '');
        $carga        = (float)($_POST['carga_horaria'] ?? 0);
        $cor          = trim($_POST['cor'] ?? '');
        $prof_raw     = $_POST['professor_id'] ?? '';
        $professor_id = ($prof_raw === '') ? null : (int)$prof_raw;

        if (empty($nome_uc) || $carga <= 0) {
            $msg = "Preencha pelo menos o Nome da UC e a Carga Horária.";
        } else {
            try {
                // normaliza cor (se vier "ff0000" vira "#ff0000")
                if ($cor !== '') {
                    if ($cor[0] !== '#') {
                        $cor = '#' . $cor;
                    }
                } else {
                    $cor = null;
                }

                $sqlIns = "INSERT INTO unidades_curriculares
                           (curso_id, sigla, nome, carga_horaria, cor, professor_id)
                           VALUES
                           (:curso_id, :sigla, :nome, :carga, :cor, :professor_id)";
                $stmtIns = $conexao->prepare($sqlIns);
                $stmtIns->execute([
                    ':curso_id'     => $curso_id,
                    ':sigla'        => $sigla,
                    ':nome'         => $nome_uc,
                    ':carga'        => $carga,
                    ':cor'          => $cor,
                    ':professor_id' => $professor_id
                ]);

                $msg = "UC cadastrada com sucesso!";
            } catch (PDOException $e) {
                $msg = "Erro ao cadastrar UC: " . $e->getMessage();
            }
        }
    }

    // 2) Atualizar PROFESSOR de uma UC existente
    if ($acao === 'definir_prof') {
        $uc_id = filter_input(INPUT_POST, 'uc_id', FILTER_VALIDATE_INT);
        // professor_id pode ser vazio (null)
        $professor_id_raw = $_POST['professor_id'] ?? '';
        $professor_id = ($professor_id_raw === '') ? null : (int)$professor_id_raw;

        if (!$uc_id) {
            $msg = "UC inválida para atualização.";
        } else {
            try {
                // garantir que a UC pertence a este curso
                $sqlCheck = "SELECT id FROM unidades_curriculares WHERE id = :id AND curso_id = :curso_id";
                $stmtCheck = $conexao->prepare($sqlCheck);
                $stmtCheck->execute([
                    ':id'       => $uc_id,
                    ':curso_id' => $curso_id
                ]);
                $existe = $stmtCheck->fetch(PDO::FETCH_ASSOC);

                if (!$existe) {
                    $msg = "UC não pertence a este curso.";
                } else {
                    $sqlUp = "UPDATE unidades_curriculares
                              SET professor_id = :professor_id
                              WHERE id = :id";
                    $stmtUp = $conexao->prepare($sqlUp);
                    $stmtUp->bindValue(':professor_id', $professor_id, is_null($professor_id) ? PDO::PARAM_NULL : PDO::PARAM_INT);
                    $stmtUp->bindValue(':id', $uc_id, PDO::PARAM_INT);
                    $stmtUp->execute();

                    $msg = "Professor atualizado com sucesso para a UC selecionada.";
                }
            } catch (PDOException $e) {
                $msg = "Erro ao atualizar UC: " . $e->getMessage();
            }
        }
    }
}

// -----------------------------------------
// BUSCAR DADOS PARA TELA
// -----------------------------------------

// Buscar dados do curso
$sqlCurso = "SELECT * FROM cursos WHERE id = :id";
$stmtCurso = $conexao->prepare($sqlCurso);
$stmtCurso->execute([':id' => $curso_id]);
$curso = $stmtCurso->fetch(PDO::FETCH_ASSOC);

if (!$curso) {
    die("Curso não encontrado.");
}

// Buscar todos os professores
$sqlProf = "SELECT id, nome FROM professores ORDER BY nome ASC";
$stmtProf = $conexao->query($sqlProf);
$professores = $stmtProf->fetchAll(PDO::FETCH_ASSOC);

// Buscar UCs do curso
$sqlUCs = "SELECT id, sigla, nome, carga_horaria, cor, professor_id
           FROM unidades_curriculares
           WHERE curso_id = :curso_id
           ORDER BY id";
$stmtUCs = $conexao->prepare($sqlUCs);
$stmtUCs->execute([':curso_id' => $curso_id]);
$ucs = $stmtUCs->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
    <title>Unidades Curriculares - <?= htmlspecialchars($curso['nome']) ?></title>
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
            box-shadow: 0 0 10px rgba(0,0,0,.1);
        }
        h2 {
            margin-top: 0;
            color: #1a2041;
        }
        .info-curso {
            font-size: 13px;
            margin-bottom: 15px;
        }
        .info-curso strong {
            color: #1a2041;
        }
        a.btn {
            display:inline-block;
            margin-bottom:10px;
            margin-right:5px;
            padding:6px 10px;
            background:#1a2041;
            color:#fff;
            text-decoration:none;
            border-radius:6px;
            font-size:13px;
        }
        .msg {
            margin:10px 0;
            padding:8px 10px;
            border-radius:6px;
            font-size:13px;
            background:#e8f5e9;
            color:#1b5e20;
        }
        .msg.erro {
            background:#ffebee;
            color:#b71c1c;
        }
        table {
            width:100%;
            border-collapse:collapse;
            font-size:13px;
            margin-top:10px;
        }
        th, td {
            border:1px solid #ddd;
            padding:6px;
            vertical-align:middle;
        }
        th {
            background:#f0f0ff;
        }
        form.inline-form {
            margin:0;
        }
        select, input[type="text"], input[type="number"], input[type="color"] {
            font-size:13px;
            padding:4px;
        }
        input[type="color"] {
            padding:0;
            border:none;
            background:transparent;
        }
        button {
            padding:4px 8px;
            font-size:12px;
            border:none;
            border-radius:4px;
            background:#1a2041;
            color:#fff;
            cursor:pointer;
        }
        button:hover {
            opacity:0.9;
        }
        .cor-preview {
            display:inline-block;
            width:16px;
            height:16px;
            border-radius:4px;
            border:1px solid #ccc;
            vertical-align:middle;
            margin-left:4px;
        }
        .legenda-aviso {
            font-size:11px;
            color:#555;
            margin-top:8px;
        }
        .bloco-form {
            margin-top:15px;
            padding:10px;
            border-radius:6px;
            background:#f9f9ff;
            border:1px solid #ddd;
            display: flex;
        }
        .bloco-form h3 {
            margin: 0;
            font-size:14px;
            color:#1a2041;
        }

        .bloco-form input, select{
            width: 100%;
            box-sizing: border-box;
        }

        .linha{
            padding: 5px;
        }

        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .h3 {
            grid-column: span 2;
        }
        label {
            font-size:12px;
            font-weight:bold;
            display:block;
            margin-bottom:3px;
        }
        small {
            font-size:11px;
            color:#666;
        }

    </style>
</head>
<body>
<header>
    <h1>Unidades Curriculares do Curso</h1>
</header>

<div class="container">
    <a href="cursos.php" class="btn">Voltar para Cursos</a>
    <a href="calendario_curso.php?curso_id=<?= $curso_id ?>" class="btn">Ver calendário do curso</a>

    <h2><?= htmlspecialchars($curso['nome']) ?></h2>
    <div class="info-curso">
        <div>
            <strong>Cód. curso:</strong> <?= htmlspecialchars($curso['cod_curso'] ?? '') ?>
            <?php if (!empty($curso['cod_turma'])): ?>
                | <strong>Turma:</strong> <?= htmlspecialchars($curso['cod_turma']) ?>
            <?php endif; ?>
            <?php if (!empty($curso['cod_matriz'])): ?>
                | <strong>Matriz:</strong> <?= htmlspecialchars($curso['cod_matriz']) ?>
            <?php endif; ?>
        </div>
        <div>
            <strong>Período:</strong>
            <?= date('d/m/Y', strtotime($curso['data_inicio'])) ?>
            a
            <?= date('d/m/Y', strtotime($curso['data_fim'])) ?>
            | <strong>Turno:</strong> <?= htmlspecialchars($curso['turno']) ?>
        </div>
    </div>

    <?php if (!empty($msg)): ?>
        <div class="msg<?= (stripos($msg, 'Erro') !== false) ? ' erro' : '' ?>">
            <?= nl2br(htmlspecialchars($msg)) ?>
        </div>
    <?php endif; ?>

    <!-- FORMULÁRIO: NOVA UC -->
    <div class="bloco-form">
        <form method="post">
            <div class="linha h3">
                <h3>Cadastrar nova Unidade Curricular</h3>
            </div>
            <div class="linha">
                <input type="hidden" name="acao" value="nova_uc">
                <label>Sigla</label>
                <input type="text" name="sigla" placeholder="Ex: UC1, FUND.COMUNICAÇÃO">    
                <label>Nome da UC</label>
                <input type="text" name="nome" required placeholder="Ex: Fundamentos da Comunicação e Informação">
                <label>Carga horária (h)</label>
                <input type="number" name="carga_horaria" min="1" step="1" value="20" required>
            </div>

            <div class="linha">
                
                <label>Professor responsável</label>
                <select name="professor_id">
                    <option value="">-- Selecionar professor --</option>
                    <?php foreach ($professores as $prof): ?>
                        <option value="<?= (int)$prof['id'] ?>">
                            <?= htmlspecialchars($prof['nome']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <small>Se deixar em branco, o gerador de calendário vai bloquear e avisar quais UCs estão sem professor.</small>
                    <label>Cor</label>
                    <input type="color" name="cor" value="#1f77b4">
                    <small>Usada no calendário.</small></br></br>
    
                <button type="submit">Cadastrar UC</button>
            </div>

        </form>
    </div>

    <!-- LISTA DE UCs EXISTENTES -->
    <?php if (empty($ucs)): ?>
        <p style="margin-top:15px;">Nenhuma UC cadastrada para este curso.</p>
    <?php else: ?>
        <h3 style="margin-top:20px;">UCs cadastradas</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Sigla</th>
                <th>Nome da UC</th>
                <th>CH (h)</th>
                <th>Cor</th>
                <th>Professor</th>
                <th>Ação</th>
            </tr>
            <?php foreach ($ucs as $uc): ?>
                <tr>
                    <td><?= (int)$uc['id'] ?></td>
                    <td><?= htmlspecialchars($uc['sigla']) ?></td>
                    <td><?= htmlspecialchars($uc['nome']) ?></td>
                    <td><?= (float)$uc['carga_horaria'] ?></td>
                    <td>
                        <?php
                        $cor = trim($uc['cor'] ?? '');
                        if ($cor === '') {
                            $cor = '#1f77b4';
                        } elseif ($cor[0] !== '#') {
                            $cor = '#' . $cor;
                        }
                        ?>
                        <span class="cor-preview" style="background: <?= htmlspecialchars($cor) ?>;"></span>
                        <span style="font-size:11px; margin-left:4px; color:#555;">
                            <?= htmlspecialchars($cor) ?>
                        </span>
                    </td>
                    <td>
                        <form method="post" class="inline-form">
                            <input type="hidden" name="acao" value="definir_prof">
                            <input type="hidden" name="uc_id" value="<?= (int)$uc['id'] ?>">

                            <select name="professor_id">
                                <option value="">-- Selecionar professor --</option>
                                <?php foreach ($professores as $prof): ?>
                                    <option value="<?= (int)$prof['id'] ?>"
                                        <?= ($uc['professor_id'] == $prof['id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($prof['nome']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                    </td>
                    <td>
                            <button type="submit">Salvar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <div class="legenda-aviso">
            ⚠️ Para o gerador de calendário funcionar, cada UC precisa ter um professor definido.
            Se deixar em branco, o sistema vai bloquear a geração e avisar quais UCs estão faltando.
        </div>
    <?php endif; ?>

</div>
</body>
</html>
