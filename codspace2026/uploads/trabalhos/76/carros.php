<?php
    ini_set("display_errors",0);
    include 'conexao.php';
    $marca_carro = $_POST['marca_carro'];
    $modelo_carro = $_POST['modelo_carro'];
    $ano_carro = $_POST['ano_carro'];
    $placa_carro = $_POST['placa_carro'];

    $sql = "INSERT INTO carros (marca_carro,modelo_carro,ano_carro,placa_carro)
            VALUES (:marca_carro,:modelo_carro,:ano_carro,:placa_carro)";
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){        
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam('marca_carro', $marca_carro);
        $stmt->bindParam('modelo_carro', $modelo_carro);
        $stmt->bindParam('ano_carro', $ano_carro);
        $stmt->bindParam('placa_carro', $placa_carro);
        $stmt->execute();
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
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }
        form {
            width: 300px;
        }
        input {
            width: 100%;
        }

        .cabecalho {
            display: flex;
            justify-content: center;
            width: 500px;
        }
        .cel_cabecalho {
            width: 100px;
            border: black 1px solid;
        }
        .linha {
            display: flex;
            justify-content: center;
            width: 500px;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <label for="marca_carro">Marca</label>
        <input type="text" name="marca_carro" id="">

        <label for="modelo_carro">Modelo</label>
        <input type="text" name="modelo_carro" id="">

        <label for="ano_carro">Ano</label>
        <input type="text" name="ano_carro" id="">

        <label for="placa_carro">Placa</label>
        <input type="text" name="placa_carro" id="">

        <button type="submit">Salvar</button>
    </form>

    <div class="resultado">
        <?php
            $sql = "SELECT * FROM carros";
            $stmt= $conexao->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "<div class='cabecalho'>";
                    echo "<div class='cel_cabecalho'>Marca</div>";
                    echo "<div class='cel_cabecalho'>Modelo</div>";
                    echo "<div class='cel_cabecalho'>Ano</div>";
                    echo "<div class='cel_cabecalho'>Placa</div>";
                    echo "<div class='cel_cabecalho'>Ações</div>";
                echo "</div>";

            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<div class='linha'>";
                    echo "<div class='cel_cabecalho'>{$linha['marca_carro']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['modelo_carro']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['ano_carro']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['placa_carro']}</div>";

                    echo "<div class='cel_cabecalho'>";
                        echo "<form method='get' action='deletar_carro.php'>";
                        echo "<input type='hidden' name='id_carro' value='{$linha['id_carro']}'>";
                        echo "<button type='submit'>Deletar carro</button>";
                        echo "</form>";
                    echo "</div>";
                echo "</div>";
                }
            }
        ?>
    </div>
</body>
</html>