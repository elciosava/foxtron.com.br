<link rel="stylesheet" href="estilo.css">

<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pecas = $_POST['pecas'];
   
    $sql = "INSERT INTO pecas (nome) VALUES (:nome)";


    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':pecas', $pecas);
     
    if ($stmt->execute()) {
        header("Location:cadastrar_peca.php");
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
    <title>Document</title>
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
                    echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                

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