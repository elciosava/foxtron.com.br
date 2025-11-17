<?php
require 'conexao/conexao.php';

// Buscar cursos no banco
$sql = "SELECT * FROM cursos ORDER BY ano_letivo DESC, nome ASC";
$stmt = $conexao->query($sql);
$cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerar Calendário de Curso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f6fc;
            margin: 0;
            padding: 0;
        }
        header {
            background: #1a2041;
            color: #fff;
            padding: 15px 20px;
        }
        header h1 {
            margin: 0;
            font-size: 22px;
        }
        .container {
            max-width: 900px;
            margin: 30px auto;
            background: #fff;
            padding: 20px 25px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }
        select, input[type="time"], button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
            box-sizing: border-box;
        }
        button {
            background: #1a2041;
            color: #fff;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            opacity: .9;
        }
        .info-curso {
            margin-top: 15px;
            padding: 10px;
            background: #f7f7ff;
            border-radius: 6px;
            font-size: 14px;
        }
        .links {
            margin-top: 20px;
            font-size: 14px;
        }
        .links a {
            color: #1a2041;
            text-decoration: none;
            margin-right: 10px;
        }
        a.btn {
            display:inline-block;
            margin-bottom:15px;
            padding:8px 12px;
            background:#1a2041;
            color:#fff;
            text-decoration:none;
            border-radius:6px;
            font-size:14px;
        }
    </style>
    <script>
        // Só pra mostrar informações básicas do curso sem recarregar
        function atualizarInfoCurso() {
            const select = document.getElementById('curso_id');
            const infoDiv = document.getElementById('infoCurso');
            const option = select.options[select.selectedIndex];

            const carga = option.getAttribute('data-carga');
            const inicio = option.getAttribute('data-inicio');
            const fim = option.getAttribute('data-fim');
            const turno = option.getAttribute('data-turno');

            if (!select.value) {
                infoDiv.innerHTML = "<em>Selecione um curso para ver detalhes.</em>";
                return;
            }

            infoDiv.innerHTML = `
                <strong>Carga horária total:</strong> ${carga}h<br>
                <strong>Período:</strong> ${inicio} até ${fim}<br>
                <strong>Turno:</strong> ${turno}
            `;
        }
    </script>
</head>
<body onload="atualizarInfoCurso()">

<header>
    <h1>Gerar Calendário / Agendamento de Aulas</h1>
</header>

<div class="container">
    <a href="paginas/cursos.php" class="btn">Gerenciar cursos e UCs</a>

    <form action="../api/gerar_calendario.php" method="post">
        <label for="curso_id">Selecione o curso:</label>
        <select name="curso_id" id="curso_id" required onchange="atualizarInfoCurso()">
            <option value="">-- Escolha um curso --</option>
            <?php foreach ($cursos as $curso): ?>
                <option 
                    value="<?= $curso['id'] ?>"
                    data-carga="<?= $curso['carga_horaria_total'] ?>"
                    data-inicio="<?= date('d/m/Y', strtotime($curso['data_inicio'])) ?>"
                    data-fim="<?= date('d/m/Y', strtotime($curso['data_fim'])) ?>"
                    data-turno="<?= $curso['turno'] ?>">
                    <?= $curso['nome'] ?> (<?= $curso['ano_letivo'] ?>)
                </option>
            <?php endforeach; ?>
        </select>

        <div class="info-curso" id="infoCurso">
            <em>Selecione um curso para ver detalhes.</em>
        </div>

        <label for="hora_inicio">Horário de início das aulas:</label>
        <input type="time" name="hora_inicio" id="hora_inicio" value="13:30" required>

        <label>
            <input type="checkbox" name="limpar_antes" value="1" checked>
            Apagar agendamentos anteriores deste curso antes de gerar
        </label>

        <button type="submit">Gerar Calendário e Agendamento</button>
    </form>

    <div class="links">
        <a href="paginas/ver_aulas.php">Ver aulas geradas</a>
    </div>
</div>

</body>
</html>
