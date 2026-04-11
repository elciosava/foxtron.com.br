
<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);

    if ($nome != '') {
        $stmt = $conexao->prepare("INSERT INTO professores (nome) VALUES (:nome)");
        $stmt->bindParam(':nome', $nome);

        if ($stmt->execute()) {
            $_SESSION['mensagem'] = "Professor cadastrado com sucesso!";
        } else {
            $_SESSION['mensagem'] = "Erro ao cadastrar professor.";
        }
    }

    header("Location: cadastrar_professor.php");
    exit;
}

$mensagem = '';
if (!empty($_SESSION['mensagem'])) {
    $mensagem = $_SESSION['mensagem'];
    unset($_SESSION['mensagem']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Document</title>
<style>
body {
  font-family: 'Segoe UI', sans-serif;
  background: linear-gradient(135deg, #9adcf7, #2980b9);
  margin: 0;
  padding: 0;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

.container {
  max-width: 600px;
  background: #fff;
  margin: 40px auto;
  padding: 30px;
  border-radius: 12px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.2);
}
h1 {
  text-align: center;
  color: #2d3436;
}
.mensagem {
  background: #d4edda;
  color: #155724;
  padding: 10px;
  border-left: 4px solid #28a745;
  border-radius: 5px;
  margin-bottom: 20px;
  font-weight: bold;
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
  border: 1px solid #b2bec3;
  border-radius: 6px;
}
button {
  margin-top: 15px;
  background-color: #0984e3;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-size: 16px;
  font-weight: bold;
}
button:hover {
  background-color: #74b9ff;
}
</style>
</head>
<body>
<div class="container">
  <h1>Cadastrar Professor 📚</h1>

  <?php if ($mensagem): ?>
    <div class="mensagem"><?= $mensagem ?></div>
  <?php endif; ?>

  <form method="post">
    <label>Nome do Professor:</label>
    <input type="text" name="nome" required>
    <button type="submit">Cadastrar</button>
  </form>

  <p style="text-align:center;margin-top:20px;">
    <a href="cadastrar_materia.php">Ir para cadastro de matérias</a>
  </p>
</div>
</body>
</html>