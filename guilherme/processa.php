

<?php
include('conexao.php');

$acao = $_POST['acao'];
$email = $_POST['email'];
$senha = $_POST['senha'];

if ($acao === 'cadastro') {
    $nome = $_POST['nome'];
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senhaHash')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Cadastro realizado com sucesso! Faça login agora.'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar: " . $conn->error . "'); window.location='index.php';</script>";
    }

} elseif ($acao === 'login') {
    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($senha, $user['senha'])) {
            header("Location: sucesso.php");
            exit;
        } else {
            echo "<script>alert('Senha incorreta!'); window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Usuário não encontrado!'); window.location='index.php';</script>";
    }
}
$conn->close();
?>


