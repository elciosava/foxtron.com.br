<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $marca = $_POST['marca'];
    $placa = $_POST['placa'];
    $cor = $_POST['cor'];
   
    $sql = "INSERT INTO carros (marca, placa, cor)
            VALUES (:marca, :placa, :cor)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':placa', $placa);
    $stmt->bindParam(':cor', $cor);
     
    if ($stmt->execute()) {
        header("Location:cadastrar_carros.php");
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
            color: rgba(168, 50, 50, 1);
            margin-bottom: 20px;
            font-size: 1.8rem;
        }

        body {
            background: linear-gradient(to right, rgba(187, 18, 18, 1), rgba(209, 103, 103, 1));
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
            border: 3px solid rgba(168, 50, 50, 1);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 20px;
        }

        button {
            background-color: rgba(168, 50, 50, 1);
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
            background-color: rgba(240, 122, 122, 1);
        }
        .cabecalho {
            display: flex;
            padding: 0 20px;
            border: 1px solid black;
            width: 750px;
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
                <h2>Cadastre o Seu Carro</h2>
                <form action="" method="post">
                    <label for="marca">Marca do Seu Carro:</label>
                    <input type="text" name="marca" id="">

                    <label for="placa">Placa de Seu Carro:</label>
                    <input type="text" name="placa" id="">

                    <label for="cor">Cor do Seu Carro:</label>
                    <input type="color" name="cor" id="">

                    <button type="submit">Salvar</button>
                    <button type="button" class="btn-voltar"
                        onclick="window.location.href='cadastrar_clientes.php'">Voltar</button>
                </form>
            </div>
        </div>
<section class="resultados">
        <div class="resultado">
            <?php
            include "conexao.php";

            $sql = "SELECT * FROM carros";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "<div class='cabecalho'>";
                echo "<div class='cel_cabecalho'>ID</div>";
                echo "<div class='cel_cabecalho'>Marca</div>";
                echo "<div class='cel_cabecalho'>Placa</div>";
                echo "<div class='cel_cabecalho'>Cor</div>";
                echo "</div>";


                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='linha'>";
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['marca']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['placa']}</div>";                
                    echo "<div class='cel_cabecalho'>{$linha['cor']}</div>";

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