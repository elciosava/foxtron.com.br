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
        
        body {
            background: #00FFA0;
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