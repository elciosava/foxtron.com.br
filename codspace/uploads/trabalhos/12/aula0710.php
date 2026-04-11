<?php
  ini_set('display_errors', 0);

  $produto= $_POST['produto'];
  $tipo= $_POST['tipo'];
  $valor= $_POST['valor'];
  $pagamento= $_POST['pagamento'];
  $entrega= $_POST['entrega'];
  $bairro= $_POST['bairro'];
  $cidade= $_POST['cidade'];
  $numero= $_POST['numero'];

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
            margin: 0;
            padding: 0;
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
            background: lightblue; border: 0;
          }
          .form input, select {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 5px;
           
          }

          body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
           
             
          }

           .limpar {
            padding: 10px 15px;
            background: red;
            border: 0;
           }

            .salvar {
                padding: 10px 15px;
                background: green;
                border: 0;
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

        <label for="produto">Produto</label>
        <input type="text" name="produto" id="">

        <label for="tipo">Tipo</label>
        <select name="tipo" id="">
            <option value="   ">     </option>
            <option value="pacote">Pacote</option>
            <option value="caixa">Caixa</option>
            <option value="litro">Litro</option>
            <option value="unidade">Unidade</option>
            <option value="balde">Balde</option>
            <option value="quilo">Quilo</option>
</select>

   <label for="valor">Valor</label>
    <input type="valor" name="valor" id="">

     <label for="pagamento">Pagamento</label>
     <select name="pagamento" id="">
     
            <option value="  ">    </option>
            <option value="A vista">A vista</option>
            <option value="boleto">Boleto</option>
            <option value="pix">Pix</option>
            <option value="credito">Credito</option>
            <option value="debito">Debito</option>
      </select>
        </div>

      <div class="form">
        <label for="entrega">Entrega</label>
        <input type="text" name="entrega" id="">

        <label for="bairro">Bairro</label>
        <input type="text" name="bairro" id="">

        <label for="cidade">cidade</label>
        <input type="text" name="cidade" id="">

        <label for="numero">Numero</label>
        <input type="number" name="numero" id="">

  </div> 
   <div class="form-bnt">
    <button class="limpar">Limpar</button>
    <button class="salvar">Salvar</button>
   </div>
  
    </div>
   </section>

    <section class="resultado">
        <div class="resultado">
            
        </form>
        
            <div> <?php echo $produto ?></div>
            <div> <?php echo $tipo ?></div>
            <div> <?php echo $valor ?></div>
            <div> <?php echo $pagamento ?></div>
            <div> <?php echo $entrega ?></div>
            <div> <?php echo $bairro ?></div>
            <div> <?php echo $cidade ?></div>
            <div> <?php echo $numero ?></div>

           
        </div>
    </section>


</body>
</form>
</html>