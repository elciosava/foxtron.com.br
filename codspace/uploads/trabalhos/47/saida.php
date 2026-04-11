<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_pecas = $_POST['id_pecas'];
    $quantidade = $_POST['quantidade'];
   
    $sql = "INSERT INTO saida (id_pecas, qunatidade) VALUES (:id_pecas, quantidade)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_pecas', $pecas);
    $stmt->bindParam(':quntidade', $quntidade);
     
    if ($stmt->execute()) {
        header("Location:saida_pecas.php");
        exit;
    } else {
        echo "deu errado";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section class="endereco">
        <div class="container">
            <div class="form-box">
                <h2>entrada de pecas</h2>
                <form action="" method="post">
                    <input type="text" value="<?php echo $_GET['id']; ?>" id="id_pecas" name="id_pecas">

                    <label for="quantidade">quantidade</label>
                    <input type="text" name="qunatidade" id="">

                    <button type="submit">salvar</button>
                    <button type="button" class="bnt-voltar"
                        onclick="window.location.href+'cadastro_pecas.php'">voltar</button>
                </form>
            </div>
        </div>
    </section>
    
</body>
</html>