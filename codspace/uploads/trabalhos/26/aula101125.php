<?php
    include 'conexao.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $horario = $_POST['horario'];
        $dia = $_POST['dia'];
        $nome = $_POST['nome'];

        $insert = "INSERT INTO consulta (horario, dia, nome)
                   VALUES (:horario, :dia, :nome)";
        $stmt = $conexao->prepare($insert);
        $stmt->bindParam(':horario', $horario);
        $stmt->bindParam(':dia', $dia);
        $stmt->bindParam(':nome', $nome);

        if ($stmt->execute()) {
            header("Location: aula101125.php");
            exit;
        } else {
            echo "<p style='color:red;'>A conexão não procedeu. A tesoura comeu!!</p>";
        }
    }

    $sql = "SELECT * FROM `consulta`";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        .container{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .linha{
            border: solid 1px black;
            width: 250px;
            padding: 5px 10px;
            display: flex;
        }

        .resultado{
            width: 300px;
        }

    </style>
</head>
<body>
    <section>
        <form action="" method="post">
            <div class="container">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="">

                <label for="dia">Data:</label>
                <input type="date" name="dia" id="">

                <label for="horario">Horário:</label>
                <input type="time" name="horario" id="">

                <button type="submit">Enviar Consulta</button>
            </div>
        </form>
    </section>

    <section>
        <div class="container">
            <?php
                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='resultado'>";
                    echo "<div class='linha'>{$linha['nome']}</div>
                          <div class='linha'>{$linha['horario']}</div>
                          <div class='linha'>{$linha['dia']}</div>";
                    echo "</div>";
                }
            ?>
        </div>
    </section>
</body>
</html>
