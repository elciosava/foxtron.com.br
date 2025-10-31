<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_pecas = $_POST['id_pecas'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO entrada (id_pecas, quantidade) VALUES (:id_pecas, :quantidade)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_pecas', $id_pecas);
    $stmt->bindParam(':quantidade', $quantidade);
     
    if ($stmt->execute()) {
        header("Location:entrada_pecas.php");
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
    
</head>

<body>
    <section class="endereco">
        <div class="container">
            <div class="form-box">
                <h2>Entrada De Peças</h2>
                <form action="" method="post">
                    <input type="text" value="<?php echo $_GET['id']; ?>" id="id_pecas" name="id_pecas">

                    <label for="quantidade">Entrada De Peças</label>
                    <input type="text" name="quantidade" id="">
                
                    <button type="submit">Salvar</button>
                    <button type="button" class="btn-voltar"
                        onclick="window.location.href='cadastro_pecas.php'">Voltar</button>
                </form>
            </div>
        </div>
    </section>
    
</body>

</html>