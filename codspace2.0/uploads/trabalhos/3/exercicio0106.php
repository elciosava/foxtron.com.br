<?php
$nota1 = $_GET['nota1'];
$nota2 = $_GET['nota2'];
$nota3 = $_GET['nota3'];
$nota4 = $_GET['nota4'];
$nome = $_GET['nome'];
$materia = $_GET['materia'];
$media = ($nota1+$nota2+$nota3+$nota4)/4;

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
        * {
                margin:0px;
                padding: 0px;
                background: lightblue;
        }
         header {
            
            align-items: center;
            justify-items: center;
            padding: 30px;
            text-align: center;
            
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;

        }
        form {
            width: 300px;
            background-color: gray;
            
        }
        input {
            width: 300px;
            
        
        }
        body {
            background-color: blue;
            text-align: center;

        }
        
        
    </style>

</head>

<body>
    <header>
    <div class="container">
        <div class="header">
            <div class="form">
            </div>   
        </div>
     </div>

     <form action="" method="get">
        <label for="nome">Nome</label>
        <input type="text" name= "nome" id="">
        <label for="materia">materia</label>
        <input type="text" name= "materia" id="">
        <label for="nota1">nota1</label>
        <input type="nunber" name= "nota1" id="">
        <label for="nota2">nota2</label>
        <input type="nunber" name= "nota2" id="">
        <label for="nota3">nota3</label>
        <input type="number"name= nota3 id="">
        <label for="nota4">nota4</label>
        <input type="number" name= nota4 id="">

        <button type="submit">Enviar</button>
        
    </header>    
</form> 
<div class="resultado">
 <?php

 echo "<div class='nome'>$nome</div>";
 echo "<div class='materia'>$materia</div>";
 echo "<div class='media'>$media</div>";

?>
 </div>



    
</body>

