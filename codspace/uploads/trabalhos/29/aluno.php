<?php

include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

  
  $nome = $_POST['nome'];
 
  if(!empty($nome)){
    $sql = "INSERT INTO aluno ( nome)
        VALUES ( :nome)";
     $stmt = $conexao->prepare($sql);
     
     $stmt->bindParam(':nome', $nome);
    
  
   
   

     if($stmt->execute()){
       header("location: aluno.php");
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <section>
    <div class="container">
        <form action="" method="post">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="">

        <button type="submit">enviar</button>
</div>
 <header>
        <nav>
        <ul>
            <li><a href="computador.php">Computador</a></li>
            <li><a href="reserva.php">Reserva</a></li>
             <li><a href="menu.php">voltar</a></li>

        </ul>
        </nav>
    </header>
</body>
</html>