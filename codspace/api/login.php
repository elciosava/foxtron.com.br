<?php
session_start();
include '../conexao/conexao.php'; 

try {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = trim($_POST["email"]);
        $senha = $_POST["senha"];

        // Busca usuário pelo email
        $sql = "SELECT id, nome, email, senha, tipo FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $usuario = $stmt->fetch();

        if ($usuario && password_verify($senha, $usuario["senha"])) {
            // Login OK → cria sessão
            $_SESSION["usuario_id"]   = $usuario["id"];
            $_SESSION["usuario_nome"] = $usuario["nome"];
            $_SESSION["usuario_tipo"] = $usuario["tipo"];

            // Redireciona de acordo com o tipo
            if ($usuario["tipo"] === "professor") {
                header("Location: ../paginas/professor.php");
            } else {
                header("Location: ../paginas/aluno.php");
            }
            exit;
        } else {
            // Email ou senha incorretos
            echo "<script>alert('E-mail ou senha inválidos'); window.location.href='../index.php';</script>";
            exit;
        }
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
