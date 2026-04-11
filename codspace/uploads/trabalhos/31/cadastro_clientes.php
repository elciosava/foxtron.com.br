<?php
     $local ='localhost';
    $banco ='felipe';
    $usuario = 'root';
    $senha = '';


    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $data = $_POST['data_nascimento'];
     $telefone = $_POST['telefone'];
 $email = $_POST['email'];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <style>
         * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #3a3a3a, #1f1f1f);
            color: #f0f0f0;
        }

        .container {
            background-color: #2b2b2b;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
            width: 320px;
            margin-bottom: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        label {
            font-size: 0.9rem;
            color: #ddd;
        }

        input {
            width: 100%;
            padding: 8px;
            font-size: 0.9rem;
            background-color: #3f3f3f;
            border: 1px solid #555;
            border-radius: 5px;
            color: #f0f0f0;
        }

        input:focus {
            outline: none;
            border-color: #888;
        }

        button {
            background-color: #555;
            color: #f0f0f0;
            padding: 8px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        button:hover {
            background-color: #888;
        }

        .cabecalho, .linha {
            display: flex;
            width: 1000px;
            border: 1px solid #444;
        }

        .cabecalho {
            background-color: #333;
            font-weight: bold;
        }

        .linha:nth-child(even) {
            background-color: #2f2f2f;
        }

        .cel_cabecalho {
            width: 200px;
            padding: 10px;
            text-align: center;
            border-right: 1px solid #444;
        }

        .linha {
            display: flex;
            border: solid 1px black;
            padding: 5px 10px;
        }

        .cel_cabecalho:last-child {
            border-right: none;
        }

        .resultado {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            width: 1050px;
            box-shadow: 0 0 10px rgba(255,255,255,0.05);
        }

        .resultado form {
            display: inline;
        }

        .resultado button {
            padding: 5px 10px;
            font-size: 0.8rem;
            margin: 2px;
        }
    </style>
</head>
<body>
   

    <div class="container">
            <form action="" method="post">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="">

                <label for="nascimento">Data de Nascimento</label>
                <input type="data" name="nascimento" id="">

                <label for="telefone">Telefone</label>
                <input type="number" name="telefone" id="">

                <label for="email">Email</label>
                <input type="email" name="email" id="">

                <button type="submit">Salvar</button>

            </form>
        </div>


    

</form>
    
</body>
</html>
