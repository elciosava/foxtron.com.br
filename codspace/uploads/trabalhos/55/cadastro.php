<?php
include 'conexao.php';
session_start();

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {
        $_SESSION["usuario_id"] = $conn->insert_id;
        $_SESSION["usuario_nome"] = $nome;
        header("Location: malas.php");
        exit;
    } else {
        $msg = "❌ Erro: este e-mail já está cadastrado.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastrar - Travel</title>
<style>
body{font-family:Poppins,sans-serif;background:#f4f4f4;display:flex;align-items:center;justify-content:center;height:100vh;margin:0;}
form{background:#fff;padding:30px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);width:300px;}
input{width:100%;padding:10px;margin:8px 0;border:1px solid #ccc;border-radius:6px;}
button{width:100%;padding:10px;background:#ff4f81;color:#fff;border:none;border-radius:6px;cursor:pointer;}
button:hover{opacity:0.9;}
a{text-decoration:none;color:#ff4f81;font-weight:600;}
.msg{text-align:center;color:red;margin-top:10px;}
</style>
</head>
<body>

<form method="POST">
  <h2 style="text-align:center;color:#ff4f81;">Cadastrar</h2>
  <input type="text" name="nome" placeholder="Nome completo" required>
  <input type="email" name="email" placeholder="E-mail" required>
  <input type="password" name="senha" placeholder="Senha" required>
  <button type="submit">Cadastrar</button>
  <p style="text-align:center;margin-top:10px;">Já tem conta? <a href="login.php">Entrar</a></p>
  <p class="msg"><?php echo $msg; ?></p>
</form>

</body>
</html>
