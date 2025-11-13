<?php
include "conexaoo.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $data = $_POST['dia'];
    $hora = $_POST['hora'];

    $sql = 'INSERT INTO consultas (nome, data, hora) VALUES (:nome, :dia, :hora)';
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':dia', $data);
    $stmt->bindParam(':hora', $hora);

    if ($stmt->execute()) {
        header("location: consultas.php");
        exit;
    } else {
        echo "Erro ao cadastrar consulta.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento de Consultas</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #cfe9faff, #93cbffff);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding: 40px 20px;
            color: #333;
        }

        h1 {
            color: #fff;
            margin-bottom: 30px;    
            font-size: 2.2rem;
            text-shadow: 2px 2px 6px rgba(0,0,0,0.2);
            text-align: center;
        }

        .form-container {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0px 8px 25px rgba(0,0,0,0.15);
            padding: 30px 25px;
            width: 100%;
            max-width: 450px;
            margin-bottom: 40px;
            animation: fadeIn 0.6s ease;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }

        label {
            display: block;
            font-weight: 600;
            margin-top: 10px;
            margin-bottom: 6px;
            color: #93cbffff;
        }

        input, select {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #93cbffff;
            font-size: 15px;
            transition: 0.3s ease;
        }

        input:focus, select:focus {
            border-color: #93cbffff;
            outline: none;
            box-shadow: 0 0 6px #ff69b475;
        }

        button {
            width: 100%;
            margin-top: 20px;
            background: #93cbffff;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #93cbffff;
        }

        /* Centraliza os cards na tela */
        .resultados {
            width: 100%;
            max-width: 900px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            padding: 20px;
            width: 250px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border-top: 5px solid #93cbffff;
            text-align: center;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .card h3 {
            color: #93cbffff;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 15px;
            color: #555;
            margin: 4px 0;
        }

        .sem-registro {
            background: #fff;
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            color: #888;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>
<body>

    <h1>Agendamento de Consultas</h1>

    <div class="form-container">
        <form action="consultas.php" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" required>

            <label for="dia">Dia da Semana</label>
            <select name="dia" id="dia" required>
                <option value="segunda">Segunda</option>
                <option value="terça">Terça</option>
                <option value="quarta">Quarta</option>
                <option value="quinta">Quinta</option>
                <option value="sexta">Sexta</option>
                <option value="sábado">Sábado</option>
            </select>

            <label for="hora">Hora</label>
            <input type="time" name="hora" id="hora" required>

            <button type="submit">Salvar Consulta</button>
        </form>
    </div>

    <div class="resultados">
        <?php
        include 'conexaoo.php';
        $sql = "SELECT * FROM consultas ORDER BY id DESC";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='card'>";
                echo "<h3>{$linha['nome']}</h3>";
                echo "<p><strong>Dia:</strong> {$linha['data']}</p>";
                echo "<p><strong>Hora:</strong> {$linha['hora']}</p>";
                echo "</div>";
            }
        } else {
            echo "<div class='sem-registro'>Nenhuma consulta cadastrada ainda.</div>";
        }
        ?>
    </div>
 
</body>
</html>
