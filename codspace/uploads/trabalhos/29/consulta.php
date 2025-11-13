<?php

include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  
  $nome = $_POST['nome'];
  $horario = $_POST['horario'];
   $dia = $_POST['dia'];

  if(!empty($nome)){
    $sql = "INSERT INTO consulta ( nome, horario, dia)
        VALUES ( :nome, :horario, :dia)";
     $stmt = $conexao->prepare($sql);
     
     $stmt->bindParam(':nome', $nome);
     $stmt->bindParam(':horario', $horario); 
      $stmt->bindParam(':dia', $dia);
  
   
   

     if($stmt->execute()){
       header("location: consulta.php");
       exit;
     }else{
        echo "<p style='color:red;'>Deu ruim!!</p>";
     }
}else{
    echo "<p style='color:orange;'>Preencha todos os campos!!</p>";
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
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        }

        body {
        font-family:sans-serif;
        line-height: 1.6;
        display: flex;
        justify-content: center;
        flex-direction: column;

        }


        .container {
        width: 100%;
        max-width: 900px;
        display: flex;
        
        }

        .linha{
            border:solid 1px black;
            width:200px;
            
        }

        .resultado{
            width:350px;
            display: flex;
            width:400px;
        }

    </style>

    
</head>
<body>
   
    <section>
    <div class="container">
        <form action="" method="post">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="">

        <label for="dia">Dia</label>
        <select name="dia" id="">
            <option value="segunda">Segunda</option>
            <option value="terça">Terça</option>
            <option value="quarta">Quarta</option>
            <option value="quinta">Quinta</option>
            <option value="sexta">Sexta</option>
            <option value="sabado">Sabado</option>
        </select>

        <label for="horario">Horario</label>
        <input type="time" name="horario" id="">

        <button type="submit">Enviar</button>

        <section>
        <div class="container">
        </section>
            <?php

              $sql = "SELECT * FROM consulta";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='resultado'>";
                   echo "<div class='linha'> {$linha['nome']}</div>
                            <div class='linha'> {$linha['horario']}</div>
                               <div class='linha'> {$linha['dia']}</div>";
                    echo "</div>";
                }
            ?>
        </div>
    </section>

    </form>
    </div>
</body>
</html>
