<?php
    $produto = $_POST['produto'];
    $pagamento = $_POST['pagamento'];
    $tipo = $_POST['tipo'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        body{
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            font-family: sans-serif;
        }

        .formulario{
            width: 800px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: #3f4ae0;
        }

        .form{
            border: solid 1px black;
            padding: 10px;
            background:#b1db16;
        }
        .form input, select{
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 5px;
        }

        .limpar{
            padding: 10px 20px;
            background: red;
            border: 0;
            color: #fff;
            font-weight: bold;
        }

        .salvar{
            padding: 10px 20px;
            background: green;
            border: 0;
            color: #fff;
            font-weight: bold;
        }

        .form_btn{
            padding: 10px;
        }

        .resultado{
            display: flex;
            gap:10px;
        }

    </style>
    <header>

    </header>

    <section class="formulario">
        <div class="form">

            <form action="" method="post"></form>

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

               <label for="valor">Pagamento</label>
               <input type="number" name="valor" id="">

               <label for="pagamento">Forma de Pagamento</label>
               <select name="pagamento" id="">
                    <option value="a vista">A vista</option>
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

            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" id="">

            <label for="numero">Numero</label>
            <input type="text" name="numero" id="">

             </select>
        </div>
        <div class="form_btn">
            <form>
               <button type="reset" class="limpar">Limpar</button>
               <button type="submit" class="salvar">Salvar</button>
           </form>
        </div>
    </section>
    <section class="resultado">
        <div class="resultado">
        <div><?php echo $produto; ?></div>

        <div><?php echo $pagamento; ?> </div>

        <div><?php echo $tipo; ?> </div>

        </div>
    </section>
</body>
</html>