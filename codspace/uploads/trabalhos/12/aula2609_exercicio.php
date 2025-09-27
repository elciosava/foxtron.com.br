<?php
   
   $cadastro = $_POST['Cadastro'];
   $radio = $_POST['radio_button'];
   $select = $_POST['selecione'];
   $select2 = $_POST['selecione2'];
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <style>
         header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 20px;
            background-color: rgb(102, 15, 15);
            height: 50px;
            color: rgb(143, 140, 135);
        }

        body {
            height: 100vh;
            background-color: rgb(56, 61, 61);
            font-family: sans-serif;
        }
        * {
            margin: 0;
            padding: 0;
        }
     </style>
</head>
<body>
<header>
 <h2>Aula 26/09/25</h2>
</header>

<div class="container">
    <form action="" method="post">

        <label for="cadastro">Cadastro</label>
        <input type="cadastro" name="Cadastro" id="" >

        <label for="radio_button">escolha sua peça</label>

        <input type="radio" name="radio_button" id="" value="freio da frente">freio da frente
        <input type="radio" name="radio_button" id="" value="freio de tras">freio de tras

        <label for="selecione">Selecione</label>
        
        <select name="selecione" id="">
        <option value="   ">   </option>
            <option value="azul com preto">azul com preto</option>
            <option value="verde com cinza">verde com cinza</option>
            <option value="preto com roxo">preto com roxo</option>
</select>
      
        <label for="selecione2">Selecione</label>
        <select name="selecione2" id="">
            <option value="  ">  </option>
            <option value="k7">k7</option>
            <option value="pro7">pro7</option>
            <option value="pro6">pro6</option>
        </select>

        <button type="submit">Enviar</button>

   </form>

   <div class="resultado">
     <?php
         echo "<div> $cadastro </div>";
         echo "<div> $radio </div>";
         echo "<div> $select </div>";
         echo "<div> $select2 </div>";
        
         
      ?>
   </div>
  </div>
</body>
</html>