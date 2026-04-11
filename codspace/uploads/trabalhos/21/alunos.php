<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    

    $sql = "INSERT INTO aluno (nome)
    Values (:nome)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome',$nome);
    
    
    if ($stmt->execute()){
     header("location:alunos.php");
     exit;
    }else{
        echo"Não Deu Boa!!"; 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluno</title>
    <style>
        
    </style>
</head>
<body>

<header>
        <nav>
            <ul>
              <a href="menu.php"><button type="submit">Voltar</button></a>
            </ul>
        </nav>
    </header>
    <div class="container">
   <form action="" method="post">
    
        <label for="nome">Nome</label>
         <input type="text" name="nome" id="">
      <button type="submit">Enviar</button> 
      
   </form>
</div>
</body>
</html>