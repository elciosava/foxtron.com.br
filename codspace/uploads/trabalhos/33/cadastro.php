<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nome = $_POST['nome'] ?? '';
  $sobrenome = $_POST['sobrenome'] ?? '';
  $nascimento = $_POST['nascimento'] ?? '';
  $telefone = $_POST['telefone'] ?? '';
  $email = $_POST['email'] ?? '';

  $sql = "INSERT INTO cadastro (nome, sobrenome, nascimento, telefone, email) 
          VALUES (:nome, :sobrenome, :nascimento, :telefone, :email)";
  
  $stmt = $conexao->prepare($sql);
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':sobrenome', $sobrenome);
  $stmt->bindParam(':nascimento', $nascimento);
  $stmt->bindParam(':telefone', $telefone);
  $stmt->bindParam(':email', $email);

  if ($stmt->execute()) {
    header("Location: cadastro.php");
    exit;
  } else {
    echo "Não foi possível cadastrar o usuário.";
  }
}
?>

<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro de Usuário</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: linear-gradient(135deg, #ffffffff, #80a9dfff);
      font-family: Arial, sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    .form-container {
      background-color: #fff;
      border-radius: 10px;
      padding: 30px;
      width: 100%;
      max-width: 400px;
      margin-bottom: 30px;
      box-shadow: 4px 5px 30px #00000062;
    }

    h2 {
      text-align: center;
      color: #80a9dfff;
      margin-bottom: 20px;
      font-size: 1.8rem;
    }

    label {
      display: block;
      margin-top: 10px;
      font-weight: bold;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #80a9dfff;
      border-radius: 5px;
      font-size: 14px;
      transition: 0.3s ease-out;
    }

    input:hover {
      border: 1px solid #00000050;
      transition: 0.3s ease-in;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #80a9dfff;
      border: 1px solid #7e7e7e2a;
      border-radius: 5px;
      color: white;
      font-size: 16px;
      cursor: pointer;
      margin-top: 15px;
      transition: 0.3s ease-out;
      font-weight: 200;
    }

    button:active {
      background-color: #5e7ca3ff;
      transition: 0.3s ease-in;
    }

  </style>
</head>
<body>
  <div class="form-container">
    <h2>Cadastro de Usuário</h2>
    <form action="" method="POST">
      <label for="nome">Nome</label>
      <input type="text" name="nome" >

      <label for="sobrenome">Sobrenome</label>
      <input type="text" name="sobrenome" >

      <label for="nascimento">Data de Nascimento</label>
      <input type="date" name="nascimento" >

      <label for="telefone">Telefone</label>
      <input type="text" name="telefone" >

      <label for="email">Email</label>
      <input type="email" name="email" >

      <button type="submit">Salvar</button>
    </form>
  </div>
</body>
</html>