<?php
 include 'conexao.php';


 if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $numero = $_POST['numero'];
    $mesa = $_POST['mesa'];


    $sql = "INSERT INTO computador (numero, mesa)
    VALUES (:numero, :mesa)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':mesa', $mesa);

    if ($stmt->execute()){
        header("Location:cadastrar_computador.php");
        exit;
        echo "<p>Não deu certo :C</p>";
    }
 }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computador</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            
             <label for="numero">Número do computador</label>
            <input type="number" name="numero" id="">

             <label for="mesa">Qual a mesa que seu computador está localizado</label>
            <input type="text" name="mesa" id="">

           <button class="submit">Salvar</button>

        </form>
    </div>
</body>
</html>