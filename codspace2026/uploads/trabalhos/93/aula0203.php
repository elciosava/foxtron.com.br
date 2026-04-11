<?php
ini_set("display_errors",0);

$nome = $_POST['nome'];
$cpf = $_POST ['cpf'];
$cidade = $_POST['cidade'];
$estado =$_POST[ 'estado'];


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
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
    border-radius: 20px;
        }
                input,select{
            width: 400px; ;
            box-sizing: border-box;

        }
    </style>




</head>
<body>
    <h1>CADASTRO</h1>

     <div class= "container">
             <form action="" method="post">
            <label for="nome"><b>Nome</b></lael>
            <input type="text" name="nome" id="">

            <form action="" method="post">
            <label for="cpf"><b>CPF</b></lael>
            <input type="number" name="cpf" id="">

          

    <label for="cidade"><b>Cidade</b></label>
    <select name="cidade" id>
         <option value="">SELECIONE A CIDADE </option>
        <option value="P">Porto União</option>
         <option value="União da Vitória">União da Vitória</option>
         <option value="General Carneiro">General Carneiro</option> 
         <option value="Bituruna">Bituruna</option>
         <option value="Canoinhas">PCanoinhas</option>
         <option value="Caçador">Caçador</option>
         <option value="Matos Costa">Matos Costa</option>
         <option value="Paulo Frontin">Paulo Frontin</option> <br>   
         
                 
         
</select>
    <label for="estado"><b>Estado</b></label>
    <select name="estado" id> 
    <option value="">SELECIONE O ESTADO </option>
    <option value="AC">Acre</option>
    <option value="AL">Alagoas</option>
    <option value="AP">Amapá</option>
    <option value="AM">Amazonas</option>
    <option value="BA">Bahia</option>
    <option value="CE">Ceará</option>
    <option value="DF">Distrito Federal</option>
    <option value="ES">Espírito Santo</option>
    <option value="GO">Goiás</option>
    <option value="MA">Maranhão</option>
    <option value="MT">Mato Grosso</option>
    <option value="MS">Mato Grosso do Sul</option>
    <option value="MG">Minas Gerais</option>
    <option value="PA">Pará</option>
    <option value="PB">Paraíba</option>
    <option value="PR">Paraná</option>
    <option value="PE">Pernambuco</option>
    <option value="PI">Piauí</option>
    <option value="RJ">Rio de Janeiro</option>
    <option value="RN">Rio Grande do Norte</option>
    <option value="RS">Rio Grande do Sul</option>
    <option value="RO">Rondônia</option>
    <option value="RR">Roraima</option>
    <option value="SC">Santa Catarina</option>
    <option value="SP">São Paulo</option>
    <option value="SE">Sergipe</option>
    <option value="TO">Tocantins</option>




    </select>

       <button type="submit">Enviar</button>

</form>

<div class="reultado">

 <?php 
          echo $nome . "<br>";
          echo $cpf . "<br>";
          echo $cidade . "<br>";
          echo $estado . "<br>"; 

          ?>





</body>
</html>