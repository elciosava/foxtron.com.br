<?php
ini_set("display_errors",0);
$nome= $_POST ['nome'];
$cpf= $_POST ['cpf'];
$cidade= $_POST ['cidade'];
$estado= $_POST ['estado'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 02-03</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body{
            display: flex;
            justify-content: center; 
            align-items: center; 
            flex-direction: column;
            background: #ffffff;
}
        .resultado {
            width: 345px;
            border: solid 2px rgb(134, 89, 206);
            padding: 20px;
            background: rgb(185, 145, 248);
            color: #000;
            margin: 10px;
            box-sizing: border-box;
            display: flex;
            justify-content: space-around;
            align-items: center;
            
            
        }
        div {
            padding: 10px 50px 10px 50px;
            margin:10px 0 0 0 ;
            background: rgb(234, 223, 250);
        }
    </style>
</head>


<body>
    <div class="container">
    <form action="" method="post">

    <label for="nome">Qual seu nome?</label>
    <input type="text" name="nome" id="">

    <label for="cpf">Qual seu CPF?</label>
    <input type="number" name="cpf" id="">

    <label for="cidade">Qual sua cidade?</label>
    <select name="cidade" id="">
        <option value="Porto União">Porto União</option>
        <option value="União da Vitória">União da Vitória</option>
        <option value="Canoinhas">Canoinhas</option>
        <option value="Irineópolis">Irineópolis</option>
        <option value="Matos Costa">Matos Costa</option>
        <option value="Três Barras">Três Barras</option>
        <option value="São Mateus do Sul">São Mateus do Sul</option>
        <option value="Paula Freitas">Paula Freitas</option>
        <option value="Cruz Machado">Cruz Machado</option>
        <option value="Bituruna">Bituruna</option>
        <option value="General Carneiro">General Carneiro</option>
</select>

    <label for="estado">Qual seu estado?</label>
    <select name="estado" id="">
        <option value="Paraná">Paraná</option>
        <option value="Bahia">Bahia</option>
        <option value="Distrito Federal">Distrito Federal</option> 
        <option value="Mato Grosso">Mato Grosso</option>
        <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
        <option value="Minas Gerais">Minas Gerais</option>
        <option value="Rio de Janeiro">Rio de Janeiro</option>
        <option value="Rio Grande do Sul">Rio Grande do Sul</option>
        <option value="Santa Catarina">Santa Catarina</option>
        <option value="São Paulo">São Paulo</option>
</select>

    <button type="submit">Enviar</button>

    </form>
    </div>
    
    <div class="resultado">
        <?php
        echo ("Olá "), $nome;
        echo (", portadora do CPF: "), $cpf ."</br>";
        echo (" Residente de "), $cidade;
        echo (" localizado no estado "), $estado ."</br>";
        ?>
    </div>
</body>

</html>   