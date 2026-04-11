<?php include('conexao.php'); ?>
<link rel="stylesheet" href="estilo.css">

<div class="container">
<h2>Cadastrar peças</h2>
<form method="POST">
    <label>Nome da peça:</label>
    <input type="text" name="nome" required>
    <input type="submit" name="salvar" value="Cadastrar">
</form>

<?php
if (isset($_POST['salvar'])) {
    $nome = $_POST['nome'];
    $sql = "INSERT INTO professores (nome) VALUES ('$nome')";
    if ($conn->query($sql) === TRUE) {
        echo "<p>✅ peça cadastrada com sucesso!</p>";
    } else {
        echo "<p>❌ Erro: " . $conn->error . "</p>";
    }
}
?>
<div class="voltar">
  <a href="listar_professores.php" class="botao">Ver peças</a>
</div>
</div>
<style>
    /* Reset básico */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

/* Fundo RGB animado */
body {
  font-family: "Poppins", sans-serif;
  background: linear-gradient(270deg, #ff00ff, #00ffff, #00ff00, #ff0000);
  background-size: 800% 800%;
  animation: rgbAnimation 12s ease infinite;
  color: #fff;
  line-height: 1.6;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

@keyframes rgbAnimation {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

/* Container com efeito de vidro */
.container {
  max-width: 960px;
  margin: 40px auto;
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(12px);
  border-radius: 15px;
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
  padding: 40px;
  color: #fff;
  border: 1px solid rgba(255, 255, 255, 0.2);
}

h2 {
  text-align: center;
  color: #fff;
  margin-bottom: 25px;
  text-shadow: 0 0 10px rgba(255, 255, 255, 0.6);
}

/* Formulário estilizado */
form {
  margin: 0 auto;
  width: 100%;
  max-width: 600px;
}

label {
  display: block;
  margin-bottom: 6px;
  font-weight: 600;
  color: #fff;
}

input[type="text"],
select {
  width: 100%;
  padding: 12px;
  margin-bottom: 20px;
  border-radius: 8px;
  border: 1px solid rgba(255, 255, 255, 0.3);
  background: rgba(255, 255, 255, 0.1);
  color: #fff;
  font-size: 16px;
  outline: none;
  transition: all 0.3s ease;
}

input[type="text"]:focus,
select:focus {
  border-color: #00ffff;
  box-shadow: 0 0 10px #00ffff;
}

/* Botões com efeito neon */
input[type="submit"],
a.botao {
  background: linear-gradient(90deg, #007bff, #00ffff);
  color: #fff;
  border: none;
  padding: 12px 24px;
  border-radius: 8px;
  text-decoration: none;
  cursor: pointer;
  font-size: 16px;
  transition: all 0.3s ease;
  display: inline-block;
  margin-right: 10px;
  box-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
}

input[type="submit"]:hover,
a.botao:hover {
  background: linear-gradient(90deg, #00ffff, #007bff);
  box-shadow: 0 0 20px #00ffff, 0 0 40px #007bff;
  transform: scale(1.05);
}

/* Tabela com brilho */
table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 30px;
  color: #fff;
}

th,
td {
  border: 1px solid rgba(255, 255, 255, 0.2);
  padding: 12px;
  text-align: center;
}

th {
  background: rgba(0, 255, 255, 0.3);
  color: #fff;
  font-weight: bold;
}

tr:nth-child(even) {
  background-color: rgba(255, 255, 255, 0.1);
}

.voltar {
  display: block;
  margin-top: 30px;
  text-align: center;
  font-size: 16px;
  color: #fff;
  text-decoration: none;
  transition: all 0.3s ease;
}

.voltar:hover {
  text-shadow: 0 0 10px #00ffff;
  transform: scale(1.1);
}

</style>