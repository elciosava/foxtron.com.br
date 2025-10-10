<?php
ini_set(option: 'display_errors', value: 0);

$produto = $_POST["produto"];
$tipo = $_POST["tipo"];
$valor = $_POST["valor"];
$pagamento = $_POST["pagamento"];
$entrega = $_POST["entrega"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$numero = $_POST["numero"];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            justify-content: center;
            font-family: sans-serif;
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
    </style>
</head>

<body>
    <header>

    </header>
    <section class="formulario">
        <div class="form">

            <form action="" method="POST">

                <label for="produto">produto</label>
                <input type="text" name="produto" id="">
                <label for="tipo">tipo</label>
                <select name="tipo" id="">


                    <option value="pacote">pacote</option>
                    <option value="caixa">caixa</option>
                    <option value="litro">litro</option>
                    <option value="unidade">unidade</option>

                </select>
                <label for="valor">valor</label>
                <input type="number" name="valor" id="">

                <label for="pagamento">pagamento</label>
                <select name="pagamento" id="">
                    <option value="A vista">A vista</option>
                    <option value="boleto">boleto</option>
                    <option value="pix">pix</option>
                    <option value="credito">credito</option>
                    <option value="debito ">debito</option>
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
            <input type="number" name="numero" id="">
        </div>
        <div class="form_btn">
            <button class="limpar">limpar</button>

            <button type="submit" class="salvar">salvar</button>
            </form>
        </div>
    </section>


    <section class="resultados">
        <div class="resultado">

            <div><?php echo $produto;  ?> </div>
            <div><?php echo $tipo;  ?> </div>
            <div><?php echo $valor;  ?> </div>
            <div><?php echo $pagamento;  ?> </div>
            <div><?php echo $entrega;  ?> </div>
            <div><?php echo $bairro;  ?> </div>
            <div><?php echo $cidade;  ?> </div>
            <div><?php echo $numero;  ?> </div>



        </div>
    </section>
</body>

</html>