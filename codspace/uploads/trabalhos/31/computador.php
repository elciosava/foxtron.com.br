<?php
    include 'conexao.php';

    $sqlcomputador = "SELECT * FROM `computador`";
$stmtcomputador = $conexao->prepare($sqlcomputador);
$stmtcomputador->execute();


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
     $numero = $_POST['numero'];
     $lado = $_POST['lado'];
      $memoria = $_POST['memoria'];

     


      $sql ="INSERT INTO computador (nome, numero, lado, memoria)
      VALUES (:nome, :numero, :lado, :memoria)";

      $stmt = $conexao->prepare($sql);
      $stmt->bindparam(':nome', $nome);
        $stmt->bindparam(':numero', $numero);
        $stmt->bindparam(':lado', $lado);
          $stmt->bindparam(':memoria', $memoria);

      if ($stmt->execute()){                        
        header("Location:computador.php");
        exit;
      }else{
        echo "nao deu boa";
      }
     }



    $sql = "SELECT * FROM computador";

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

                <label for="numero">numero</label>
                <input type="text" name="numero" id="">

                <label for="lado">lado</label>
                <input type="text" name="lado" id="">

                 <label for="memoria">memoria</label>
                <input type="text" name="memoria" id="">
         <button type="submit">salvar</button>

           <header>
        <nav>
            <ul>
                <li><a href="computador.php">computador</a></li>
                <li><a href="reserva.php">reserva</a></li>
                <li><a href="aluno.php">aluno</a></li>
            </ul>
        </nav>
    <header>

        
    </form>
    </div>
</section>
   
    
</body>
</html>