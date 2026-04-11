<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Cores</title>
    <style>
        * {
            margin: 0;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            display:flex;
            align-items: center;
            flex-direction: column;
        }

        form {
            width: 400px;
            border: 1px solid #000000;
            padding: 20px;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input, button {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        #resultado {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #000000;
        }
        header {
            background: #83bbff;
            height: 50px;
            padding: 5px 0 5px 0;
            width: 100vw;
        }
        .firmdadata {
            width: 200px;

        }
        
        input[type="date"]{
            width: 100;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <header>
        <h2>Cadastro de Cor</h2>
    </header>
    
    <form id="formCor" method="post">
        <label for="nomeCor">Nome da Cor:</label>
        <input type="text" id="nomeCor" name="nomeCor" required>

        <label for="cor">Escolha a Cor:</label>
        <input type="color" id="cor" name="cor" required>

        <button type="submit">Enviar</button>
    </form>

    <div id="resultado">
        <?php

            ini_set("display_errors",0);
            $nomeCor=$_POST['nomeCor'];
            $cor=$_POST['cor'];

            echo $nomeCor;
            echo $cor;
        ?>
    </div>

    <section id="corpo">
    <label for="data_inicial">Data:</label>
        <input type="date" id="nomeCor" name="nomeCor" required>

        <label for="cor">Escolha a Cor:</label>
        <input type="color" id="cor" name="cor" required>

    </section>

</body>
</html>