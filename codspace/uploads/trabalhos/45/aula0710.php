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
        padding: 10px 20px;
        background: red;
        border: #fff;
        font-weight: bold;
    }

    .salvar {
        padding: 10px 20px;
        background: green;
        border: 0;
        border: #fff;
        font-weight: bold;
    }

    .form_btn {
        padding:10px;
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
        <select name="tipo" name="tipo" id="">
            <option value="pacote">Pacote</option>
            <option value="caixa">Caixa</option>
            <option value="litro">Litro</option>
            <option value="unidade">Unidade</option>
            <option value="balde">Balde</option>
            <option value="quilo">Quilo</option>

        <label for="Valor">Valor</label>
        <input type="number" name="valor" id="">

        <label for="pagamento">Pagamento</label>
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
</div>
<div class="form_btm">
    <button class="limpar">Limpar</button>
    <button type="submit" class="salvar">Salvar</button>
    </form>
</div>
</section>
 
<section class="resultados">
    <div class="resultado">
        
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>

    </div>
</section>
    </body>
</html>