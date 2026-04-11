<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $dia = $_POST['dia'];
    $hora = $_POST['hora'];
    $semana = $_POST['semana'];
   
           $sql = "INSERT INTO consultas (nome, dia, hora, semana)
        VALUES (:nome, :dia, :hora, :semana)";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome',$nome);
        $stmt->bindParam(':dia',$dia);
        $stmt->bindParam(':hora',$hora);
        $stmt->bindParam(':semana',$semana);
        $stmt->execute();
     }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elcio gulosao</title>
      <style>
        body {
            margin: 0;
            padding: 0;
            background:grey;
            display: grid;
            justify-content: center;
        }

        form {
            width: 300px;
        }

        input, select {
            width: 100%;
            padding: 5px;
            font-size: 0.7rem;
            box-sizing: border-box;

        }

        .cabecalho {
            display: flex;
            padding: 5px 10px;
            border: 1px solid black;
            width: 750px;
        }

        .linha {
            display: flex;
            padding: 5px 10px;
            width: 750px;
            border: 1px solid black;
        }

        .resultado {
            margin-top: 40px;
        }
        
</style>
</head>
<body>


    
<div class="container">

        <form action="" method="post">
            <select name="semana" id="">
            <option value="segunda">Segunda</option>
            <option value="terca">Terça</option>
            <option value="quarta">Quarta</option>
            <option value="quinta">Quinta</option>
            <option value="sexta">Sexta</option>
            <option value="sábado">Sábado</option>
        </select>

        <label for="nome">Nome do Gulosão</label>
        <input type="text" name="nome" id="">

         <label for="dia">Data da consulta</label>
        <input type="date" name="dia" id="">

          <label for="hora">Hora da consulta</label>
        <input type="time" name="hora" id="">

        <button class="submit">Salvar</button>

        </form>
    </div>
    <?php
                $sql = "SELECT * FROM `consultas`";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();

                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='resultado'>";
                    echo "<div class='linha'>{$linha['nome']}</div>
                    <div class='linha'>{$linha['dia']}</div>
                    <div class='linha'>{$linha['hora']}
                     <div class='linha'>{$linha['semana']}";
                    echo"</div>";
                }
                ?>
           
</body>
</html>