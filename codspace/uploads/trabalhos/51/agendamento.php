<?php
    include 'conexao.php'; 

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome = $_POST['nome'];
        $dia = $_POST['dia'];
        $horário = $_POST['horário'];

        $insert="INSERT INTO pacientes (`nome`, `dia`, `hora`)
        VALUES (:nome, :dia, :hora)";

         $stmt = $conexao->prepare($insert);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':dia', $dia);
        $stmt->bindParam(':hora', $hora);
       
        if($stmt->execute()){
         header("Location:agendamento.php");
         exit;
        }else{
        $mensagem = "Não deu coisa...";
    }
}
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
            box-sizing: border-box;
        }

        body {
            background-color:	#fffafaff;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction:column;
        }

        .form-container {
            background-color:	#9ee2ceff;
            border-radius: 10px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color:#662263ff;
            margin-bottom: 20px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #543861ff;
            border-radius: 5px;
            font-size: 14px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color:green;
            border: none;
            border-radius: 5px;
            color: blue;
            font-size: 16px;
            cursor: pointer;
        }
        .cabecalho{
            display:flex;
             width: 400px;
        }
        .cel_cabecalho{
            width:auto;
            margin-left:10px;
            width: 100px;
        }
         .resultados {
            width: 100%;
        }

        .resultado {
            margin-top: 20px;
        }



    </style>
</head>
<body>
    
</body>
</html>
 <div class="form-container">
        <h2>Agendamentos de Consultas Médicas:</h2>

    <div class="resultados">
    <div class="resultado">
     <form action="agendamento.php" method="post">

        <label for= "nome">Nome</label>
        <input type="text" name="nome" id="">

         <label for= "dia">Dia</label>
         <select name="dia" id="">
            <option value="Segunda">Segunda-feira</option>
            <option value="Terça">Terça-feira</option>
            <option value="Quarta">Quarta-feira</option>
            <option value="Quinta">Quinta-feira</option>
            <option value="Sexta">Sexta-feira</option>
        </select>

        <label for= "hora">Horário</label>
        <input type="time" name="horário" id="">

         <button type="submit">Agendar Consulta</button>

    </form>
    </div>
    </section>
    <section class="resultados">
    <div class="resultado">
            <?php 
            include 'conexao.php';

            $sql = "SELECT * FROM pacientes";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount()>0){
                echo"<div class='cabecalho'>";
                echo"<div class='cel_cabecalho'>ID</div>";
                echo"<div class='cel_cabecalho'>Nome</div>";
                echo"<div class='cel_cabecalho'>Dia</div>";
                echo"<div class='cel_cabecalho'>Hora</div>";
                echo "</div>";
            

            while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                  echo"<div class='cabecalho'>";
                  echo"<div class='cel_cabecalho'>{$linha['id']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['nome']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['dia']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['hora']}</div>";
                  echo "</div>";
            
            }
        }else{
                echo"<p>nao tem registro</p>";
            }


            ?>
            </section>
</body>
</html>