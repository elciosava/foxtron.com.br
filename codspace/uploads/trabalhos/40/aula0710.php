<?php
ini_set('display_errors', 0);
$produto = $_POST ['produto'];
$tipo = $_POST ['tipo'];
$valor = $_POST ['valor'];
$pagamento = $_POST ['pagamento'];
$entrega = $_POST ['entrega'];
$bairro = $_POST ['bairro'];
$cidade = $_POST ['cidade'];
$numero = $_POST ['numero'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=header, initial-scale=1.0">
    <title>Document</title>
  <style>
    * {
        margin:0;
        padding:0;
    }

    body {
   
    justify-content: center;
    display: flex;
    font-family: Sans-Serif;
    align-items: center;
    flex-direction: column;
    }

    .formulario{
        width: 800px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        
    }

    .form {
       
        padding: 10px;

    }

    .form input, select {
       width: 100%;
       box-sizing: border-box;
       margin-bottom: 5px;
    }

    .limpar {
        padding: 10px 10px;
        margin: 5px;
        background: pink;
        border: 0;
        color: #fff;
        font-weight: bold;
    }

    .salvar {
        padding: 10px 10px;
        background: lightgreen;
        border: 0;
        color: #fff;
        font-weight: bold;
    }
    .form_bnt {
    padding: 10px;
      
    }

    .resultado {
        display: flex;
        gap: 10px;
    }
  </style>
</head>
<body>
    <header>

    </header>
<section class="formulario">
    <div class="form">
<form action="" method="post">

    <label for="produto">produto</label>
    <input type="text" name="produto" id="">

    <label for="tipo">Tipo</label>
   <select name="tipo" id="">
    <option value="pacote">Pacote</option>
    <option value="caixa">Caixa</option>
    <option value="litro">Litro</option>
    <option value="unidade">Unidade</option>
    <option value="balde">Balde</option>
    <option value="quilo">Quilo</option>
   </select>
 
<label for="valor">Valor</label>
<input type="number" name="valor" id="">

<label for="pagamento">Pagamento</label>
<select name="pagamento" id="">
    <option value="A vista">A vista</option>
    <option value="Boleto">Boleto</option>
    <option value="Pix">Pix</option>
    <option value="Credito">Credito</option>
    <option value="Debito">Debito</option>
</select>
</div>
</div>
  
   <div class="form">
   <label for="entrega">Entrega</label>
    <input type="text" name="entrega" id="">

    <label for="bairro">Bairro</label>
    <input type="text" name="bairro" id="">

    
    <label for="cidade">Cidade</label>
    <input type="text" name="cidade" id="">

    <label for="numero">Numero</label>
    <input type="text" name="numero" id="">
   </div>
       <div class="form_btn">
        <button class="limpar">Limpar</button>
      <button type="submit" class="salvar">Salvar</button>
      </form>
       </div>
       </section>

       <section class="resulatado">
        <div class="resultado">
   
        <div><?php echo $produto; ?></div>
       <div><?php echo $tipo; ?></div>
        <div><?php echo $valor; ?></div>
        <div><?php echo $pagamento; ?></div>
        <div><?php echo $entrega; ?></div>
        <div><?php echo $bairro; ?></div>
        <div><?php echo $cidade; ?></div>
        <div><?php echo $numero; ?></div>
       
        </div>
       </section>
</body>
</html>