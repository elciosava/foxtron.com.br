<?php
    include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
     $horario = $_POST['horario'];
     $semana = $_POST['semana']; 
     


      $sql ="INSERT INTO consulta (nome, semana, horario)
      VALUES (:nome, :semana, :horario)";

      $stmt = $conexao->prepare($sql);
      $stmt->bindparam(':nome', $nome);
        $stmt->bindparam(':horario', $horario);
        $stmt->bindparam(':semana', $semana);

      if ($stmt->execute()){                        
        header("Location:consulta.php");
        exit;
      }else{
        echo "nao deu boa";
      }
     }


    

    $sql = "SELECT * FROM consulta";

           $stmt = $conexao->prepare($sql);
           $stmt->execute();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <style>
     .resultado {
        display: flex;
        padding:0px;
        width: 750px;
      }
      .cel_cabecalho {
        width: 150px;
      }
      .linha {
        display: flex;
        padding: 5px 10px;
        width: 750px;
        border: 1px solid black;
      }

    </style>
</head>
<body>
      <section class="inicio">
        <div class="container">
            <form action="" method="post">
                <label for="nome">nome</label>
                <input type="text" name="nome" id="">

                <label for="horario">horario</label>
                <input type="time" name="horario" id="">

                <label for="semana">semana</label>
                <input type="date" name="semana" id="">
                  <option value="segunda">segunda</option>
                   <option value="terca">terca</option>
                   <option value="quarta">quarta</option>
                    <option value="quinta">quinta</option>
                     <option value="sexta">sexta</option>





         <button type="submit">salvar</button>

          

    </form>
    </div>
</section>
 <section>
            <?php
            while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<div class='resultado'>";
                echo "<div class='linha'>{$linha['nome']}</div>
                <div class='linha'>{$linha['horario']}</div>
                 <div class='linha'>{$linha['semana']}</div>";
                echo"</div>";
            }


            ?>
    </section>
</body>
</html>