<?php include('conexao.php'); ?>
<link rel="stylesheet" href="estilo.css">

<div class="container">
<h2>Matérias Cadastradas</h2>

<table>
<tr>
  <th>ID</th>
  <th>Professor</th>
  <th>Matéria</th>
</tr>
<?php
$sql = "SELECT m.id, p.nome AS professor, m.materia
        FROM materia m
        JOIN professores p ON m.id_professores = p.id";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
  echo "<tr>
          <td>{$row['id']}</td>
          <td>{$row['professor']}</td>
          <td>{$row['materia']}</td>
        </tr>";
}
?>
</table>

<div class="voltar">
  <a href="cadastrar_materia.php" class="botao">+ Nova Matéria</a>
  <a href="listar_professores.php" class="botao">Ver Professores</a>
</div>
</div>
