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

        form {
            width: 300px;
        }

     body {
            height: 100vh;
            background-color: rgba(167, 190, 160, 1);
            font-family: cursive;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 30px;
            background-color: rgba(253, 210, 247, 1);
            height: 55px;
            color: rgb(56, 54, 55);
        }

        input,select {
            width: 100%;
            box-sizing: border-box;
             margin-bottom: 10px;
             padding: 3px;
        }
 
              .container{

           display: flex;
           justify-content: center;
           align-items: center;
           height: 100vh;
        }
        
    
    </style>
</head>
<body>
    <section class="endereco">
<div class="container">

<form action="" method="post">

<label for="tipo">Tipo</label>
<select name="tipo" id="">
<option value="Avenida">Avenida</option>
<option value="Rua">Rua</option>
<option value="Trvessa">Travessa</option>
</select>

<label for="ain">Ain</label>
<input type="text" name="ain" id="">

<label for="numero">Numero</label>
<input type="text" name="numero" id="">

<label for="bairro">Bairro</label>
<input type="text" name="bairro" id="">

<label for="cidade">Cidade</label>
<select name="" id="">
<option value="Porto União">Porto União</option>
<option value="">União da Vitória</option>
<option value=""></option>
</select>

<label for="estado">Estado</label>
<select name="" id="">
<option value="SC">SC</option>
<option value="SC">SC</option>
</select>

<button type="submit">Salvar</button>
 </form>
</div>
    </section>
</body>
</html>