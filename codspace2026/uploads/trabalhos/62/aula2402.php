<?php

$nome= $_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$cargo=$_POST['cargo'];
$salario= $_POST['salario'];

echo $nome."</br>";
echo $sobrenome."</br>";
echo $cargo."</br>";
echo $salario."</br>";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body 
           {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items:center;

           }
           

        .container{
            width: 400px;
            background: #e9ec04ff;
            
            
        }

        input{
            width: 400px;
            box-sizing: border-box;
        }

    </style>
</head>
<body>
   <div class="container">
    <form action="" method="post">
     <label for="nome">nome</label>
       <input type="text"name="nome" id="">

          <label for="sobreno">sobrenome</label>
       <input type="text"name="sobrenome" id="">

          <label for="cargo">cargo</label>
       <input type="text"name="cargo" id="">
       
          <label for="salario">salario</label>
       <input type="text"name="salario" id="">

      <button type="submit"> clique aqui</button>
    </form>

   </div> 
</body>
</html>