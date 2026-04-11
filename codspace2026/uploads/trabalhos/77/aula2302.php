<?php
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];

    echo $nome ."</br>";
    echo $email ."</br>";
    echo $cpf ."</br>";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 23-02</title>

    <style>
* {
            margin: 0;
            padding: 0;
        }
        body {
            margin: 10px;
            color: rgba(255, 255, 255, 1)
            
        }
        
        div {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background: rgba(79, 139, 218, 1);
            padding: 10px 7px 10px 7px;
            color: rgba(0, 0, 0, 1)
                       
        }
    
        
        button {
            background: rgba(255, 255, 255, 1);
            color: rgba(0, 0, 0, 1);
            margin: 5px 5px 5px 0;
            padding: 5px 5px 5px 5px;
        }

        label, input {
            padding: 3px 0 3px 0;
            display: block
            
        }

        input {
            background: rgba(119, 168, 233, 1);
            padding: 3px 7px 3px 7px;
        }
    </style>

</head>

<body>
    <div class="container">
        <form action="" method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="">
            
            <label for="email">Email:</label>
            <input type="text" name="email" id="">

            <label for="cpf">CPF:</label>
            <input type="number" name="cpf" id="">

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>

</html>