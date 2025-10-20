<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if(!empty($nome)){
        $sql = "INSERT INTO usuarios (nome, sobrenome, email, senha)
        VALUES(:nome, :sobrenome, :email, :senha)";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);

        if($stmt->execute()){
            header("Location: cadastrar_usuarios.php");
            exit;
        }else{
            echo "<p style='color:red;'>A conexão não procedeu. A tesoura comeu!!</p>";
        }
    }else{
        echo "<p style='color:orango;'>Preencha direito isso aí!!</p>";
    }
}
?>