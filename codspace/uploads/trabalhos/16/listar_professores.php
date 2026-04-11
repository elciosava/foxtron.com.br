<?php include('conexao.php'); ?>
<link rel="stylesheet" href="estilo.css">

<div class="container">
<h2>Professores Cadastrados</h2>

<table>
<tr>
  <th>ID</th>
  <th>Nome</th>
</tr>
<?php
$result = $conn->query("SELECT * FROM professores");
while ($row = $result->fetch_assoc()) {
  echo "<tr>
          <td>{$row['id']}</td>
          <td>{$row['nome']}</td>
        </tr>";
}
?>
</table>

<div class="voltar">
  <a href="cadastrar_professor.php" class="botao">+ Novo Professor</a>
  <a href="listar_materias.php" class="botao">Ver Matérias</a>
</div>
</div>
