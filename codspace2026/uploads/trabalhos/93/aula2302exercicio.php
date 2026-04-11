<?php
    $produto = $_POST['produto'];
    $quantidade = $_POST ['quantidade'] ;
    $preco = $_POST['preco'];
      

    echo $produto . "</br>";
    echo $quantidade ."</br>";
    echo $preco ."</br>";
    echo $valortotal . "</br>";

    $resultado = $quantidade * $preco;

    echo $resultado 


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <h2>Cadastro de Prodrutos</h2>
</body>
  <div class="container">
    <form action="" method="post">
        <label for="produto">PRODUTO </label>
        <input type="text" name="produto" id=""> 

         <label for="quantidade"> QUANTIDADE </label>
        <input type=" number" name="quantidade" id="">

        <label for="preco"> PREÇO </label>
        <input type=" number" name="preco" id="">


          <button type="submit">ENVIAR</button>
</form>





</html>