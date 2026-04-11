<?php

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
        *{
            margin:0;
            padding:0;
        }

        body{
            display: flex;
            flex-direction:column;
            justify-content:center;
            font-family: sans-serif;
            align-items:center;
        }

        .formulario{
            
            width:800px;
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:10px;
        }

        .form{
            border: solid 1px black;
            padding:10px;
            background:lightgreen;
        }
        .form input, select{
            width:100%;
            background:lightyellow;
            box-sizing:border-box ;
            margin-bottom:5px;
        }
        .limpar{
            padding:10px 20px;
            background:aquamarine;
            border:0;
            color: violet;
            font-weight: bold;
        }

        .salvar{
            background:violet;
            padding:10px 20px;
            border:0;
            color: aquamarine;
            font-weight: bold;
        }

        .form_btn{
            border:solid 1px lightgreen;
            padding:10px;
        }

        .resultado{
            display:flex;
            gap:10px;
        }

      
     
    </style>
</head>
<body>
    <header>

    </header>

    <section class="formulario">
    <div class="form">
        <form action="" method="post">
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
          <option value="A vista">A Vista</option>
          <option value="Boleto">Boleto</option>
          <option value="Pix">Pix</option>
          <option value="Credito">Credito</option>
          <option value="Debito">Debito</option>

     </select>

 

    </div>
    <div class="form">
    <label for="entrega">entrega</label>
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
        <button type="submit" class="salvar">Salvar</button>
        </form>
     </div>
    </section>

    <section class="resultado">
       <div class="resultado">
       
         <div> <?php echo $produto;  ?> </div>
         <div> <?php  echo $tipo; ?> </div>
         <div>   <?php echo $valor;?> </div>
         <div>  <?php echo $pagamento; ?> </div>
         <div>  <?php echo $entrega;  ?> </div>
         <div>  <?php echo $bairro; ?> </div>
         <div>  <?php  echo $cidade; ?>  </div>
         <div>   <?php echo $numero;  ?> </div>
 
         
       </div>
    </section>
</body>
</html>
