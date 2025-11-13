<?php
    include 'conexao.php';

    $sqlaluno = "SELECT * FROM `aluno`";
$stmtaluno = $conexao->prepare($sqlaluno);
$stmtaluno->execute();


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
     


      $sql ="INSERT INTO aluno (nome)
      VALUES (:nome)";

      $stmt = $conexao->prepare($sql);
      $stmt->bindparam(':nome', $nome);
      
      if ($stmt->execute()){                        
        header("Location:aluno.php");
        exit;
      }else{
        echo "nao deu boa";
      }
     }


    

    $sql = "SELECT * FROM aluno";

           $stmt = $conexao->prepare($sql);
           $stmt->execute();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
     
</head>
<body>
   
      <section class="inicio">
        <div class="container">
            <form action="" method="post">
                <label for="nome">nome</label>
                <input type="text" name="nome" id="">

         <button type="submit">salvar</button>

          <header>
        <nav>
            <ul>
              <li><a href="computador.php">computador</a></li>
                <li><a href="reserva.php">reserva</a></li>
                <li><a href="aluno.php">aluno</a></li>
        </nav>
    <header>
  

    </form>
    </div>
</section>

</body>
</html>