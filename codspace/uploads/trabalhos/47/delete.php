
<?php
include 'conexao.php';
$id = $_GET['id'];
$conn->query("DELETE FROM endereco WHERE id=$id");
echo "excluido com sucesso";
?>