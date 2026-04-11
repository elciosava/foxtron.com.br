<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pecas = $_POST['pecas'];
   
    $sql = "INSERT INTO pecas (pecas)
            VALUES (:pecas)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':pecas', $pecas);
     
    if ($stmt->execute()) {
        header("Location:cadastro_pecas.php");
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
            color: rgba(4, 0, 255, 1);
            margin-bottom: 20px;
            font-size: 1.8rem;
        }

        body {
            background: linear-gradient(to right, rgba(22, 76, 255, 1), rgba(45, 209, 250, 1));
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
            background-color: rgba(190, 200, 255, 0.83);
            border: 3px solid rgba(0, 4, 255, 1);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 20px;
        }

        button {
            background-color: rgba(0, 4, 255, 1);
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
            background-color: rgba(56, 4, 241, 1);
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
    <section class="endereco">
        <div class="container">
            <div class="form-box">
                <h2>Cadastro De Peças</h2>
                <form action="" method="post">
                    <label for="pecas">Cadastre a Sua Peça:</label>
                    <input type="text" name="pecas" id="">
                
                    <button type="submit">Salvar</button>
                </form>
            </div>
        </div>
    </section>
     <section class="resultados">
        <div class="resultado">
            <?php
            include "conexao.php";

            $sql = "SELECT * FROM pecas";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "<div class='cabecalho'>";
                echo "<div class='cel_cabecalho'>ID</div>";
                echo "<div class='cel_cabecalho'>Peças</div>";
                echo "</div>";


                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='linha'>";
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['pecas']}</div>";                

                    echo "<div class='cel_cabecalho'>";

                    echo "<form action='entrada_pecas.php' method='get' style='display-inline; width: 80px; display: inline;'>";
                    echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                    echo "<button type='submit'>Entrada</button>";
                    echo "</form>";

                    echo "<form action='saida_pecas.php' method='get' style='display-inline; width: 80px; display: inline; margin-left: 5px;'>";
                    echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                    echo "<button type='submit'>Saída</button>";
                    echo "</form>";

                    echo "</div>";

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