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
    /* Fundo animado com gradiente colorido */
body {
  font-family: Arial, sans-serif;
  background: linear-gradient(270deg, #74b9ff, #a29bfe, #81ecec, #55efc4);
  background-size: 800% 800%;
  animation: gradientBG 15s ease infinite;
  margin: 0;
  padding: 0;
}

/* Animação do fundo */
@keyframes gradientBG {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

/* Container central com efeito de entrada */
.container {
  width: 80%;
  margin: 40px auto;
  background: #fff;
  border-radius: 15px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
  padding: 30px;
  animation: fadeIn 1.2s ease-in-out;
}

/* Animação de fade-in */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

h2 {
  text-align: center;
  color: #2d3436;
  animation: slideDown 1s ease;
}

/* Título com leve animação */
@keyframes slideDown {
  from { opacity: 0; transform: translateY(-20px); }
  to { opacity: 1; transform: translateY(0); }
}

form {
  margin: 20px auto;
  width: 60%;
}

label {
  display: block;
  margin-bottom: 5px;
  color: #2d3436;
}

input[type="text"], select {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border-radius: 8px;
  border: 1px solid #ccc;
  transition: all 0.3s ease;
}

/* Animação no foco */
input[type="text"]:focus, select:focus {
  border-color: #007bff;
  box-shadow: 0 0 8px rgba(0,123,255,0.4);
  transform: scale(1.02);
}

input[type="submit"], a.botao {
  background: #007bff;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 8px;
  text-decoration: none;
  cursor: pointer;
  margin-right: 10px;
  transition: all 0.3s ease;
}

/* Efeito de hover nos botões */
input[type="submit"]:hover, a.botao:hover {
  background: #0056b3;
  transform: translateY(-3px);
  box-shadow: 0 5px 10px rgba(0, 86, 179, 0.3);
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 25px;
  animation: fadeIn 1.5s ease;
}

th, td {
  border: 1px solid #ddd;
  padding: 10px;
  text-align: center;
}

th {
  background: #007bff;
  color: white;
}

tr:nth-child(even) {
  background: #f2f2f2;
}

/* Efeito hover nas linhas da tabela */
tr:hover {
  background: #e3f2fd;
  transition: background 0.3s ease;
}

.voltar {
  display: block;
  margin-top: 20px;
  text-align: center;
}

/* Link de voltar com leve animação */
.voltar a {
  color: #007bff;
  text-decoration: none;
  transition: color 0.3s ease;
}

.voltar a:hover {
  color: #0056b3;
  text-decoration: underline;
}

</style>