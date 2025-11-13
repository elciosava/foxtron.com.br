<link rel="stylesheet" href="estilo.css">
<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hora = $_POST['hora'];
    $dia = $_POST['dia'];
    $nome = $_POST['nome'];
    $computador = $_POST['computador'];
   
    $sql = "INSERT INTO paciente (nome, hora, dia, computador) VALUES (:nome, :hora, :dia, :computador)";


    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':hora', $hora);
    $stmt->bindParam(':dia', $dia);
    $stmt->bindParam(':computador', $computador);
     
    if ($stmt->execute()) {
        header("Location:cadastrar_computador.php");
        exit;
    } else {
        echo "deu eerado";
    }

}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ospytau</title>
    <style>
        body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
        }

        .container-geral {
        display: flex;
        justify-content: space-around;
        align-items: flex-start;
        flex-wrap: wrap;
        gap: 20px;
        margin: 20px;
        }

        .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        width: 45%;
        }

        h2 {
        text-align: center;
        color: #333;
        }

        table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        }

        th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
        }

        th {
        background-color: #c9c9c9;
        color: white;

        }

        .botao {
        display: inline-block;
        padding: 10px 15px;
        background-color: #9c9c9c;

        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 10px;
        }

        .botao:hover {
        background-color: #adadad;
        }

        .form-container {
        width: 400px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);

        }

        form {
        display: flex;
        flex-direction: column;
        }

        label {
        margin-top: 10px;
        font-weight: bold;
        }

        input, select {
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ccc;
        }

    </style>
</head>
<body>
    <section>
        <div class="container">
           
            <form action="" method="post">
                <h2>cadastre um computa.</h2>
                <label for="nome">nome</label>
                <input type="text" name="nome" id="">

                <select name="dia" id="">
                    <option value="sabado">sabado</option>
                    <option value="segunda">segunda</option>
                    <option value="terca">terca</option>
                    <option value="quarta">quarta</option>
                    <option value="quinta">quinta</option>
                    <option value="sexta">sexta</option>
                </select>

                <label for="hora">horario</label>
                <input type="time" name="hora" id="">

                <label for="computador">computador</label>
                <input type="text" name="computador" id="">


                <button type="submit">salvar</button>
            </form>
            

        </div>
        </div>

        <div class="resultados">
            <?php

            $sql = "SELECT * FROM paciente ORDER BY dia, hora";
                $stmt = $conexao->query($sql);

                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                    echo "<td>{$linha['nome']}</td><br>";
                    echo "<td>{$linha['dia']}</td><br>";
                    echo "<td>{$linha['hora']}</td><br>";
                    echo "<td>{$linha['computador']}</td><br><br>";
                    echo "</tr>";
                }
            ?>
            <header>
        <nav>
            <ul>
                <li><a href="cadastrar_computador.php">aluno</a></li>
            </ul>
        </nav>
    </header>
        </div>
    </section>
</body>
</html>