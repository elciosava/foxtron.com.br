<?php

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

         header {
            height:50px;
        }

        html {
            font-family: Segoe UI;
            background: lightblue;
        }  

         form {
            width: 400px;
        }
        
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 30px;
            height: 50px;
        }
                                         
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
        }

        input, select {
            width: 100%;
            padding: 5px;
            font-size: 0.7rem;
            box-sizing: border-box;
        }

    </style>
</head>
<body>
    <header>

    </header>
<section class="èsdereco">
    <div class="container">

<form action="" method="post">

    <label for="tipo">Tipo</label>
    <select name="tipo" id="">
    <option value="Avenida">Avenida</option>
    <option value="Rua">Rua</option>
    </select>
    

    <label for="auau">Nome</label>
    <input type="text" neme="auau" id="">

    <label for="numero">Numero</label>
    <input type="number" neme="numero" id="">

    <label for="bairro">Bairro</label>
    <input type="text" neme="bairro" id="">

    <label for="cidade">Cidade</label>
    <select name="cidade" id="">
    <option value="Porto União">Porto União</option>
    <option value="Porto Vitoria">Porto Vitoria</option>
    </select>


    <label for="estado">Estado</label>
    <select name="estado" id="">
    <option value="SC">SC</option>
    <option value="PR">PR</option>
    </select>
    

    <button type="submit">Salvar</button>

</form>
    </div>
</section>


</body>
</html>