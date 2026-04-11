<?php include('conexao.php'); ?>
<link rel="stylesheet" href="estilo.css">

<div class="container">
<h2>Cadastrar Professor</h2>
<form method="POST">
    <label>Nome do Professor:</label>
    <input type="text" name="nome" required>
    <input type="submit" name="salvar" value="Cadastrar">
</form>

<?php
if (isset($_POST['salvar'])) {
    $nome = $_POST['nome'];
    $sql = "INSERT INTO professores (nome) VALUES ('$nome')";
    if ($conn->query($sql) === TRUE) {
        echo "<p>✅ Professor cadastrado com sucesso!</p>";
    } else {
        echo "<p>❌ Erro: " . $conn->error . "</p>";
    }
}
?>
<div class="voltar">
  <a href="listar_professores.php" class="botao">Ver Professores</a>
</div>
</div>
