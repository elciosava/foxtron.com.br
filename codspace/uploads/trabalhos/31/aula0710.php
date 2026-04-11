<?php
   $produto = $_POST['produto'];

   $produto = $_POST['tipo'];

   $produto = $_POST['pagamento'];

   $produto = $_POST['entrega'];

   $valor = $_POST['valor'];

   $bairro = $_POST['bairro'];

   $cidade = $_POST['cidade'];

   $numero = $_POST['numero'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin:0;
            padding:0;
        }

        body{
            display: flex;
            justify-content: center;
            font-family: Sans-serif;
            flex-direction: column;
            align-items: center;
        }
        .formulario {
            width: 800px;
            display: grid;
            grid-template-columns:     1fr 1fr;
            gap: 10px;
        }

        .form {
           
            padding: 10px;
            background: green;
        }

        .form input, select {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 5px;
        }

        .limpar {
            padding: 20px 30px;
            background: red;
            border: 0;
            color:white #fff;
            font-weight: bold;
        }
        .salvar{
            padding: 20px 30px;
            background: green;
            border: 0;
            color: white#fff;
            font-weight: bold;
        }

        .form_btn {
            
            padding: 10px;
        }
        .resultado{
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
        <input type="tipo"  id="">

        <label for="tipo">tipo</label>
        <select name="tipo" id="">
            <option class="pacote">Pacote</option>
            <option class="caixa">Caixa</option>
            <option class="litro">Litro</option>
            <option class="unidade">Unidade</option>
            <option class="balde">Balde</option>
            <option class="quilo">Quilo</option>
        </select>

        <label for="pagamento">pagamento</label>
        <input type="number" name="pagamneto" id="">

        <label for="pagamento">pagamento</label>
        <select name="pagamento" id="">
        <option class="pacote">Pacote</option>
            <option class="a avista">a vista</option>
            <option class="boleto">boleto</option>
            <option class="pix">pix</option>
            <option class="credito">credito</option>
            <option class="debito">debito</option>
</select>
    </div>

<div class="form">
<label for="entrega"class="Entrega">entrega</label>
        <input type="text" name="entrega" id="">

        <label for="bairro">bairro</label>
        <input type="text" name="bairro" id="">

        <label for="cidade">cidade</label>
        <input type="text" name="cidade" id="">

        <label for="numero">numero</label>
        <input type="text" name="numero" id="">

</div>
<div class="form_btn">
    <button class="limpar">Limpar</button>
    <button typ="submit" class="salvar">salvar</button>
</form>
</div>

        
    

</section>
<section class="resultados">
    <div class="resultado">
    
        <div><?php echo $produto?></div>
        <div><?php echo $tipo?></div>
        <div><?php echo $entrega?></div>
        <div><?php echo $valor?></div>
        <div><?php echo $produto?></div>
        <div><?php echo $bairro?></div>
        <div><?php echo $numero?></div>
    </div>
</section>
</body>
</html>