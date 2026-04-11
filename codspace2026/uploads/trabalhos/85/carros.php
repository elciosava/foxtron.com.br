<?php
ini_set("display_errors", 0);
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

//$id_carro = $_POST['id_carro'];
$marca_carro = $_POST['marca_carro'];
$modelo_carro = $_POST['modelo_carro'];
$ano_carro = $_POST['ano_carro'];
$placa_carro = $_POST['placa_carro'];

$sql = "INSERT INTO carros (marca_carro, modelo_carro, ano_carro, placa_carro)
VALUES (:marca_carro, :modelo_carro, :ano_carro, :placa_carro)";

$stmt = $conexao->prepare($sql);
$stmt->bindParam(':marca_carro', $marca_carro);
$stmt->bindParam(':modelo_carro', $modelo_carro);
$stmt->bindParam(':ano_carro', $ano_carro);
$stmt->bindParam(':placa_carro', $placa_carro);

$stmt->execute();

}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar carro</title>
    <Style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        section {
            height: 50vh;
            background: pink;
        }

        form {
            width: 400px;
            padding: 20px;
        }

        input {
            width: 100%;
        }
    </Style>
</head>

<body>
    <section>
        <form action="" method="post">
            <label for="marca_carro">Marca Carro</label>
            <input type="text" name="marca_carro" id="">

            <label for="modelo_carro">Modelo Carro</label>
            <input type="text" name="modelo_carro" id="">

            <label for="ano_carro">Ano Carro</label>
            <input type="text" name="ano_carro" id="">

            <label for="placa_carro">Placa Carro</label>
            <input type="text" name="placa_carro" id="">
            <button type="submit">Salvar</button>
        </form>

    </section>
    </form>
    <div class="resultado">
        <?php
        $sql = "SELECT * FROM carros";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        if ($stmt->RowCount() > 0) {
            echo "<div class='cabecalho'>";
            echo "<div class='cel_cabecalho'>Marca</div>";
            echo "<div class='cel_cabecalho'>Modelo</div>";
            echo "<div class='cel_cabecalho'>Ano</div>";
            echo "<div class='cel_cabecalho'>Placa</div>";
            echo "</div>";

            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='linha'>";
                echo "<div class='cel_cabecalho'>{$linha['marca_carro']}</div>";
                echo "<div class='cel_cabecalho'>{$linha['modelo_carro']}</div>";
                echo "<div class='cel_cabecalho'>{$linha['ano_carro']}</div>";
                echo "<div class='cel_cabecalho'>{$linha['placa_carro']}</div>";

                echo "<div class='linha'>";
                echo "<form method='get' action='deletar.php'>";
                echo "<input type='text' name='id_carro'>";
                echo "<button type='submit'>Deletar carro</button>";
                echo "</div>";
                echo "</div>";
            }
        }
        ?>
    </div>
</body>

</html>