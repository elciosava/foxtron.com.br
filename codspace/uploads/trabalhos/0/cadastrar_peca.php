<?php include('conexao.php'); ?>
<link rel="stylesheet" href="estilo.css">

<div class="form-container">
  <h2>Cadastrar Nova Peça</h2>

  <form method="post">
    <label>Nome da Peça:</label>
    <input type="text" name="nome" required>

    <label>Quantidade:</label>
    <input type="number" name="quantidade" min="0" required>

    <button type="submit" class="botao">Salvar</button>
  </form>

  <a href="index.php" class="botao">Voltar</a>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST['nome'];
  $quantidade = $_POST['quantidade'];

  $sql = "INSERT INTO pecas (nome, quantidade) VALUES ('$nome', '$quantidade')";
  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Peça cadastrada com sucesso!'); window.location='index.php';</script>";
  } else {
    echo "Erro: " . $conn->error;
  }
}
?>
