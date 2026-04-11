<?php
ini_set('display_errors', 0);


    $produto = $_post['produto'];
    $tipo = $_post['tipo'];
    $valor = $_post['valor'];
    $pagamento = $_post['pagamento'];
    $entrega = $_post['entrega'];
    $bairro = $_post['bairro'];
    $cidade = $_post['cidade'];
    $numero = $_post['numero'];
    
         
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
            font-family: Sans-serif;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        .formulario {
            width: 800px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .form {
            border: solid 1px black;
            padding: 10px;
        }

        .form input, select {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 5px;
        }

        .limpar {
            padding: 10px 20px;
            background: red;
            border: 0;
            color: #fff;
            font-weight: bold;
        }

        .salvar {
            padding: 10px 20px;
            background: green;
            border: 0;
            color: #fff;
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

<section  class="formulario">
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
       <option value="A vista">A vista</option>
       <option value="Boleto">Boleto</option>
       <option value="Pix">Pix</option>
       <option value="Credito">Credito</option>
       <option value="Debito">Debito</option>
     </select>
  </div>
  <div class="form">
    <label for="entrega">Entrega</label>
    <input type="text" name="entrega" id="">

    <label for="bairro">Bairro</label>
    <input type="text" name="bairro" id="">
     
    <label for="Cidade">Cidade</label>
    <input type="text" name="cidade" id="">
      
    <label for="numero">Numero</label>
    <input type="number" name="numero" id="">
  </div>
  <div class="form_btn">
    <button class= "limpar">Limpar</button>
    <button type="submit" class="Salvar">Salvar</button>
    </form> 
  </div>
 </section>

 <section class="resultado">
    <div class="resultado">
        
         <div><?php echo $produto; ?></div>
        <div>echo $produto</div>
        <div>echo $tipo</div>
        <div>echo $valor</div>
        <div>echo $pagamento</div>
        <div>echo $entrega</div>
        <div>echo $bairro</div>
        <div>echo $cidade</div>
        <div>echo $numero</div>
    </div>
    </section>
</body>
</html>