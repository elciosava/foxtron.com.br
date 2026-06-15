<?php
$produto = $_POST['produto'];
$quantidade = $_POST['quantidade'];
$tipo = $_POST['tipo'];
$valor = $_POST['valor'];

  echo "<h2>Dados cadastrados</h2>";
  echo "Produto: $produto <br>";
  echo "Quantidade: $quantidade <br>";
  echo "Tipo: $tipo <br>";
  echo "Valor: $valor <br>";
?>