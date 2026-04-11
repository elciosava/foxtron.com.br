<?php
  ini_set ("display_errors", 0);
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">

        <label for="nome">nome</label>
        <input type="text" name="nome" id="">
     
        <label for="cpf">cpf</label>
        <input type="number" name="cpf" id="">
     
        <label for="cidade">cidade</label>
        <select name="cidade" id="">
         <option value="porto uniao">porto uniao </option>
         <option value="sao francisco">sao francisco</option>
         <option value="santa maria">santa maria </option>
         <option value="ouro preto">ouro preto</option>
     </select>
     
        <label for="estado">estado</label>
        <select name="estado" id="">
        <option value="parana">parana</option>
        <option value="santa catarina ">santa caratrina</option>
        <option value="rio grande do Sul">rio grande do sul</option>
        <option value="minas gerais">minas gerais</option>
        </select>
        <button type="submit">enviar</button>
    </form>
</div>
    <div class="resultado">
        <?php
        echo $nome . "</br>";
         echo $cpf . "</br>";
         
echo $cidade. "</br>";
echo $estado. "</br>";
    ?>
    </div>
</body>
</html>