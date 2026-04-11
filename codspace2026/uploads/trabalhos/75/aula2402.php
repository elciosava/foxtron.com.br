<?php
 $nome=$_POST ['nome'];
$sobrenome=$_POST ['sobrenome'];
 $cargo=$_POST ['cargo'];
 $salario=$_POST ['salario'];
 
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de empresa</title>
    <style>
        body{
            display:flex;
            justify-content: center;
            flex-direction: column;
            align-items:center; 
}
        .container{
            width:400px;
            background: #12ec2f;
            padding: 10px;
        }
        input{
            width:400px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="">
             <label for="sobrenome">Sobrenome</label>
            <input type="text" name="sobrenome" id="">
           <label for="cargo">Cargo</label>     
           <input type="text" name="cargo" id="">

            <label for="salario">Salario</label>
            <input type="text" name="salario" id="">

            <button type="submit">enviar</button>
            </form>
</div>
        <div class="resultado">
            <?php        
                echo $nome . "<br>";
                echo $sobrenome . "<br>";
                echo $cargo . "<br>";
                echo $salario . "<br>";
            ?>        
        </div>    
</body>
</html>