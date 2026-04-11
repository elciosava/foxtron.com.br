<?php
ini_set('display_errors', 0);
$produto = $_POST['produto'];
$tipo = $_POST['tipo'];
$valor = $_POST['valor'];
$pagamento = $_POST['pagamento'];
$entrega = $_POST['entrega'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$numero = $_POST['numero'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin:0;
            padding:0;
        }
        body{
            justify-content:center;
            font-family: Sans-serif;
            display:flex;
            flex-direction:column;
            align-items:center;
            background:bisque;
        }
        .formulario{
            width: 800px;
            display:grid;
            grid-template-columns: 1fr 1fr;
            gap:10px;
        }
        .form {
            border:solid 1px black;
            padding:10px;
            background: beige;

        }
        .form input, select {
            width:100%;
            box-sizing: border-box;
            margin-bottom:5px;
        }
        .limpar{
            padding:10px 20px;
            background: brown;
            border:0;
            color: #fff;
            font-weight:bold;
        }
        .salvar{
            padding: 10px 20px;
            background: chocolate;
            border:0;
            color: #fff;
            font-weight:bold;
        }
        .form_btn{
            padding:10px;
        }
        .res{
            background:orange;
            width:auto;
            display: inline;
            gap:10px;
        }
    </style>
</head>
<body>
    <header>

</header>

<section class="formulario">
<div class="form">
    <form action="" method="POST">
    <label for="produto">Produto</label>
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
        <option value="credito">Credito</option>
        <option value="Debito">Debito</option>
    </select>
</div>
<div class="form">
<label for="entrega">Entrega</label>
    <input type="text" name="entrega" id=> 

    <label for="bairro">Bairro</label>
    <input type="text" name="bairro" id=> 

    <label for="cidade">Cidade</label>
    <input type="text" name="cidade" id=> 

    <label for="numero">Numero</label>
    <input type="number" name="numero" id=> 
</div>
<div class="form_btn">
    <button class="limpar">Limpar</button>
    <button type="submit" class="salvar">Salvar</button>
    </form>

</div>
</section>
<selection class="resultados">
    <div class="resultado">
        <div class="res"><?php echo $produto; ?></div>
        <div class="res"><?php echo $tipo; ?></div>
        <div class="res"><?php echo $valor; ?></div>
        <div class="res"><?php echo $pagamento; ?></div>
        <div class="res"><?php echo $entrega; ?></div>
        <div class="res"><?php echo $bairro; ?></div>
        <div class="res"><?php echo $cidade; ?></div>
        <div class="res"><?php echo $numero; ?></div>
    </div>
    </selection>

    </section>
</body>
</html>