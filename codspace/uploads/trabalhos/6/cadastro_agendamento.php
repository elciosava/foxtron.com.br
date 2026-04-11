<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $dia = $_POST['dia'];
    $horario = $_POST['horario'];
   
    $sql = "INSERT INTO agendamento (nome, dia, horario)
            VALUES (:nome, :dia, :horario)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':dia', $dia);
    $stmt->bindParam(':horario', $horario);
     
    if ($stmt->execute()) {
        header("Location:cadastro_agendamento.php");
        exit;
    } else {
        echo "não deu certo!!";
    }

}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         * {
            padding: 0;
            margin: 0;
        }

        form {
            width: 350px;
        }
        h2 {
            text-align: center;
            color: rgba(38, 83, 233, 1);
            margin-bottom: 20px;
            font-size: 1.8rem;
        }

        body {
            background: linear-gradient(to right, rgba(27, 50, 114, 1), rgba(126, 158, 218, 1));
            font-family: Verdana;
            flex-direction: column;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        input,select {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 5px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-box {
            background-color: rgba(255, 255, 255, 0.83);
            border: 3px solid rgba(38, 83, 233, 1);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 20px;
        }

        button {
            background-color: rgba(38, 83, 233, 1);
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
            margin-top: 2px;
        }
        button:hover {
            background-color: rgba(47, 127, 151, 1);
        }
         .cabecalho {
            display: flex;
            padding: 0 20px;
            border: 1px solid black;
            width: 550px;
        }

        .cel_cabecalho {
            width: 180px;
            margin: 5px;
        }

        .linha {
            display: flex;
            border: solid 1px black;
            padding: 5px 10px;
        }

        .resultado {
            margin-top: 20px;
        }
    </style>
</head>
<body>
     <div class="container">
            <div class="form-box">
                <h2>Agendamento</h2>
                <form action="" method="post">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="">

                    <label for="dia">Dia:</label>
                    <select name="dia" id="">
                    <option value="Segunda">Segunda</option>
                    <option value="Terça">Terça</option>
                    <option value="Quarta">Quarta</option>
                    <option value="Quinta">Quinta</option>
                    <option value="Sexta">Sexta</option>
                    </select>

                    <label for="horario">Horário:</label>
                    <input type="time" name="horario" id="">
                
                    <button type="submit">Salvar</button>
                </form>
            </div>
        </div>
        <section class="resultados">
        <div class="resultado">
            <?php
            include "conexao.php";

            $sql = "SELECT * FROM agendamento";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "<div class='cabecalho'>";
                echo "<div class='cel_cabecalho'>Nome</div>";
                echo "<div class='cel_cabecalho'>Dia</div>";
                echo "<div class='cel_cabecalho'>Horário</div>";
                echo "</div>";


                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='linha'>";
                    echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['dia']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['horario']}</div>";                   
                    echo "</div>";
                }
                
            } else {
                echo "<p>Não há registros</p>";
            }
            ?>
        </div>
    </section>
</body>
</html>