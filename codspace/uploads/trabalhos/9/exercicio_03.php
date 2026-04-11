<?php
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $data_nascimento = $_POST['data_nascimento'];
    $telefone = $_POST['telefone'];
    $email = $_POST ['email'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

      * {
            padding:0;
            margin:0;
        }
        form {
            width: 350px;
        }

        h2 {
            text-align: center;
            color: #000000;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }
        body {          
            background: linear-gradient(to top, rgba(65b3e7ff), rgba(238 201 0));
            font-family: Verdana;
            flex-direction: column;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        input,select {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 5px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .cabecalho  {
            display: flex;
            padding: 0 20px;
            border: 1px solid black;  
            width: 1000px; 
        }
        .cel_cabecalho {
            width: 180px;
            margin: 5px; 
        }
        .linha {
            display: flex;
            border: solid 1px black;
            padding: 5px 10px;
        }
        .resultado {
            margin-top: 20px;
        }
         .form-box {
            background-color: rgba(255, 255, 255, 0.83); 
            border: 2px solid rgba(0, 0, 0, 1); 
            border-radius: 10px; 
            padding: 20px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
            margin: 20px;
        }
        button {
            background-color: rgba(0, 0, 0, 1);
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
          
        }
        button:hover {
            background-color: rgba(101, 105, 110, 1);
        }

    </style>
</head>
<body>
    <section>
        <form action="gravar.php" method="post">
        <label for="nome"> nome </label>
        <input type="text" name="nome" id="">

        <label for="sobrenome"> sobrenome </label>
        <input type="text" name="sobrenome" id="">

        <label for="data_nascimento"> data de nascimento</label>
        <input type="date" name="data_nascimento" id="">

        <label for="telefone"> telefone </label>
        <input type="number" name="telefone" id="">

        <label for="email"> email </label>
        <input type="email" name="email" id="">

        <button type="submit">salvar</button>
        </form>
    </section>
    
</body>
</html>