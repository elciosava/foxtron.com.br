<?php 
$produto = $_POST['produto'];
$preço = $_POST['preço'];
$quantidade = $_POST['quantidade'];


  echo $produto . "</br>";
  echo $preço . "</br>";
  echo $quantidade . "</br>";
  $resultado = $preço * $quantidade;
  echo "O resultado é: " . $resultado; 



?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="produto">produto:</label>
            <input type="text" name="produto" id="">

            <label for="preço">preço:</label>
            <input type="nunber" name="preço" id="">

             <label for="quantidade">quantidade:</label>
            <input type="nunber" name="quantidade" id="">

            <button type="submit">salvar</button>

        </form>
    </div>
</body>
</html>