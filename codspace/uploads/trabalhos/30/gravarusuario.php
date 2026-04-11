<?php
    $local = 'localhost';
    $banco = 'senai';
    $usuario = 'root';
    $senha = '';

    try {
        $conexao = new PDO("mysql:host=$local;dbname=$banco;", $usuario, $senha);
    
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sql = 'SELECT * FROM `usuario`';
    
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
    
        $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
      }catch (PDOException $e){
        echo ("nao deu");
      }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         

      if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        $insert = "INSERT INTO usuario ( `nome`, `email`, `senha`)
                    VALUES ( :nome, :email, :senha)";
        $stmt = $conexao->prepare($insert);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);

        if ($stmt->execute()){
            $mensagem = "Usuario cadastrado com sucesso";
        }else{
            $mensagem = "Nao deu coisa...";
        }
     }
?>