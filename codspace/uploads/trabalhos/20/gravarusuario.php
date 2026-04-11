<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  
  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
   $data_nacimento = $_POST['data_nacimento'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
 

  if(!empty($nome)){
    $sql = "INSERT INTO usuarios ( nome, sobrenome, data_nacimento, email, telefone)
        VALUES ( :nome, :sobrenome, :data_nacimento, :email, :telefone )";
     $stmt = $conexao->prepare($sql);
     
     $stmt->bindParam(':nome', $nome);
     $stmt->bindParam(':sobrenome', $sobrenome); 
      $stmt->bindParam(':data_nacimento', $data_nacimento);
     $stmt->bindParam(':email', $email);
     $stmt->bindParam(':telefone', $telefone);
   
   

     if($stmt->execute()){
       header("location: clientes.php");
       exit;
     }else{
        echo "<p style='color:red;'>Deu ruim!!</p>";
     }
}else{
    echo "<p style='color:orange;'>Preencha todos os campos!!</p>";
}

}
?>
