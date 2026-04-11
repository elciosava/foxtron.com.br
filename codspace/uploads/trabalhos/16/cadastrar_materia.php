<?php include('conexao.php'); ?>
<link rel="stylesheet" href="estilo.css">

<div class="container">
<h2>Cadastrar Matéria</h2>
<form method="POST">
    <label>Professor:</label>
    <select name="id_professores" required>
        <option value="">Selecione</option>
        <?php
        $result = $conn->query("SELECT * FROM professores");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id']}'>{$row['nome']}</option>";
        }
        ?>
    </select>

    <label>Nome da Matéria:</label>
    <input type="text" name="materia" required>
    <input type="submit" name="salvar" value="Cadastrar">
</form>

<?php
if (isset($_POST['salvar'])) {
    $id_professores = $_POST['id_professores'];
    $materia = $_POST['materia'];

    $sql = "INSERT INTO materia (id_professores, materia) VALUES ('$id_professores', '$materia')";
    if ($conn->query($sql) === TRUE) {
        echo "<p>✅ Matéria cadastrada com sucesso!</p>";
    } else {
        echo "<p>❌ Erro: " . $conn->error . "</p>";
    }
}
?>
<div class="voltar">
  <a href="listar_materias.php" class="botao">Ver Matérias</a>
</div>
</div>
