<?php include('conexao.php'); ?>
<link rel="stylesheet" href="estilo.css">

<div class="form-container">
  <h2>Registrar Saída</h2>

  <form method="post">
    <label>Selecione a Peça:</label>
    <select name="id_peca" required>
      <option value="">-- Escolha --</option>
      <?php
      $sql = "SELECT * FROM pecas";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
        echo "<option value='{$row['id']}'>{$row['nome']} (Estoque: {$row['quantidade']})</option>";
      }
      ?>
    </select>

    <label>Quantidade de Saída:</label>
    <input type="number" name="quantidade" min="1" required>

    <label>Observação (opcional):</label>
    <input type="text" name="observacao">

    <button type="submit" class="botao">Registrar</button>
  </form>

  <a href="index.php" class="botao">Voltar</a>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_peca = $_POST['id_peca'];
  $quantidade = $_POST['quantidade'];
  $observacao = $_POST['observacao'];

  $verifica = $conn->query("SELECT quantidade FROM pecas WHERE id = $id_peca");
  $peca = $verifica->fetch_assoc();

  if ($peca['quantidade'] >= $quantidade) {

    $conn->query("INSERT INTO saida (id_peca, quantidade, observacao) VALUES ($id_peca, $quantidade, '$observacao')");

    $conn->query("UPDATE pecas SET quantidade = quantidade - $quantidade WHERE id = $id_peca");

    echo "<script>alert('Saída registrada com sucesso! 👍'); window.location='index.php';</script>";
  } else {
    echo "<script>alert('Quantidade insuficiente em estoque!👍');</script>";
  }
}
?>
