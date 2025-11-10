<link rel="stylesheet" href="estilo.css">

<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cor = $_POST['cor'];
    $nome = $_POST['nome'];
   
    $sql = "INSERT INTO cores (nome, cor) VALUES (:nome, :cor)";


    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':cor', $cor);
    $stmt->bindParam(':nome', $nome);
     
    if ($stmt->execute()) {
        header("Location:cadastrar_cor.php");
        exit;
    } else {
        echo "deu eerado";
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
    <section>
        <div class="container">
           
            <form action="cadastrar_cor.php" method="post">
                <h2>escreva uma cor.</h2>
                <label for="nome">nome da cor</label>
                <input type="text" name="nome" id="">


                <label for="cor"></label>
                <input type="color" name="cor" id="cor">

                <button type="submit">salvar</button>
            </form>

        </div>
        </div>
    </section>
</body>
</html>