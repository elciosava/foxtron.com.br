<?php
// Inclui conexão PDO
include '../conexao/conexao.php';

// ------------------------------------------
// Processamento dos dados do formulário
// ------------------------------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitiza os dados recebidos
    $nome  = htmlspecialchars(trim($_POST['nome']));
    $email = htmlspecialchars(trim($_POST['email']));
    $senha = $_POST['senha'];

    // Hash seguro da senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    try {
        // Prepara a query (uso de placeholders ?)
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);

        // Executa passando os valores
        $stmt->execute([$nome, $email, $senha_hash]);

        // Redireciona após sucesso
        header("Location: ../index.php");
        exit();

    } catch (PDOException $e) {
        // Se for erro de chave duplicada (email já existe)
        if ($e->errorInfo[1] == 1062) {
            echo "Erro: Este e-mail já está cadastrado.";
        } else {
            echo "Erro no cadastro: " . $e->getMessage();
        }
    }
}
?>
