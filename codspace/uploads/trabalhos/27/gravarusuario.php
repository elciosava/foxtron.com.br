<?php
$local = 'localhost';
$banco = 'senai';
$usuario_db = 'root';
$senha_db = '';

try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco;charset=utf8", $usuario_db, $senha_db);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM usuarios";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome  = $_POST['nome']  ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (empty($nome) || empty($email) || empty($senha)) {
        echo "Preencha todos os campos";
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email inválido";
        exit;
    }

    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $insert = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
    try {
        $stmt = $conexao->prepare($insert);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha_hash);

        if ($stmt->execute()) {
            echo "Novo registro criado com sucesso";
        } else {
            echo "Não foi possível criar o registro";
        }
    } catch (PDOException $e) {
        echo "Erro ao inserir: " . $e->getMessage();
    }
}
?>
