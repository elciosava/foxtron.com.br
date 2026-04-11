<?php

include 'conexao.php';

$sql = "SELECT c.nome_cliente, e.rua_endereco FROM `cliente` AS c 
    INNER JOIN endereco AS e WHERE c.id_cliente = e.id_cliente";

$stmt = $conexao->prepare($sql);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    // Cabeçalho da tabela
    echo "<div class='cabecalho'>";
    echo "<div class='cel_cabecalho'>Nome</div>";
    echo "<div class='cel_cabecalho'>Endereco</div>";
    echo "</div>";

    // Linhas dos produtos
    while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='linha'>"; // Usei 'linha' pra não confundir com 'cabecalho'
        echo "<div class='cel_cabecalho'>{$linha['nome_cliente']}</div>";
        echo "<div class='cel_cabecalho'>{$linha['rua_endereco']}</div>";
        echo "</div>";
    }
}
  $sql_cliente= "SELECT id_cliente, name_cliente FROM cliente";
   $stmt = $conexao->prepare($sql);
   $stmt->execute();

   $cliente = $stmt->fetchALL(PDO::FETCH_ASSOC) 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .cabecalho{
            width: 500px;
            background: pink;
            display:flex;
        }

        .cel_cabecalho{
            width:250px;
            border: 1px solid  gray;
        }

        .linha{
            width: 500px;
            display:flex;
        }
        
          
    </style>
</head>
<body>
    <form action="" method="post">
      <label for="nome">nome</label>
     <select name="id_cliente" id="">
        <?php foreach ($clientes as $cliente) ?>
            <option value="<?php $cliente['id_cliente']; ?>">
                <?php $cliente['nome_cliente']; ?></option>
   </select>
       <? php endforeach;?>
            <label for="rua_endereco">rua</label>
             <input type="text" name="rua_endereco" id="">
             <button type="submit">salvar</button>
    </form>
</body>
</html>