<?php
    ini_set("display_errors",0);
    include 'conexao.php';

    $dia = $_POST['dia'];
    $horario = $_POST['horario'];
    $assunto = $_POST['assunto'];

    $sql = "INSERT INTO calendario (dia, horario, assunto)
            VALUES (:dia, :horario, :assunto)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':dia', $dia);
    $stmt->bindParam(':horario', $horario);
    $stmt->bindParam(':assunto', $assunto);
    $stmt->execute();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos Futuros</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            background: #0be345;
            flex-direction: column;
        }
        form {
            width: 400px;
        }
        input {
            width: 100%;
        }

    </style>
</head>
<body>
    <form action="" method="post">
        <div class="calentario">

            <label for="dia">Dia:</label>
            <input type="date" name="dia" id="">

            <label for="horario">Horário:</label>
            <input type="time" name="horario" id="">

            <label for="assunto">Assunto:</label>
            <input type="text" name="assunto" id="">

            <button type="submit">Enviar</button>
        </div>
    </form>

    <section class="resultados">
        <div class="resultado">
            <?php
                include "conexao.php";

                $sql = "SELECT * FROM `calendario`";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();

                if ($stmt->rowCount() > 0){
                //Faz aparecer as coisas

                echo"<div class='cabecalho'>";
                echo"<div class='cel_cabecalho'>ID</div";
                echo"<div class='cel_cabecalho'>Dia</div";
                echo"<div class='cel_cabecalho'>Horario</div";
                echo"<div class='cel_cabecalho'>Assunto</div";
                echo"</div>";

                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                    //Faz aparecer datas, horas e assuntos

                        echo "<div class='linha'>";
                        echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                        echo "<div class='cel_cabecalho'>{$linha['dia']}</div>";
                        echo "<div class='cel_cabecalho'>{$linha['horario']}</div>";
                        echo "<div class='cel_cabecalho'>{$linha['assunto']}</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Não há registros salvos.</p>";
                }
            ?>
        </div>
    </section>

</body>
</html>