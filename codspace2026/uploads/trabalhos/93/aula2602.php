<?php

$nome = $_POST ['nome'];
$sobrenome = $_POST ['sobrenome'];
$cargo = $_POST ['cargo'];
$salario = $_POST ['salario'];

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULARIO EMPRESA</title>
    <style>

        body {

        display:flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
          }


        .container {
            width: 400px;
            background: #1c691c;
            padding: 10px;

        }

        .container {
    width: 400px;
    background-color: #16cf10;
    padding: 20px;
    border-radius: 10px;

        input{
            width: 400px; ;
            box-sizing: border-box;


        }
        
}
    </style>
</head>





<body>  
    <div class="container">
        <form action="" method="post">

            <label for="nome"><b>NOME</b></label>  
            <input type="text" name="nome" id=""> 

            <label for="sobrenome"><b>SOBRENOME</b></label>  
            <input type="text" name="sobrenome" id="">  

            <label for="cargo"><b>CARGO</b></label>  
            <input type="text" name="cargo" id="">  

            <label for="salario"><b>SALARIO</b></label>  
            <input type="text" name="salario" id="">  

            <button type="submit">ENVIAR</button>
            
            

        </form>
    </div>
    <div class="reultado">

        <?php 
          echo $nome . "<br>";
          echo $sobrenome . "<br>";
          echo $cargo . "<br>";
          echo $salario . "<br>"; 

          ?>


 </div>


    </div>
</body>
</html>