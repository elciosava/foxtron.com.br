<?php
$quantidade = $_GET['quantidade'];
$produto = $_GET['produto'];
$tipo = $_GET['tipo'];
$valor = $_GET['valor'];
$total = $quantidade * $valor;

echo "<div class='pedido'><span>Produto: </span>$produto</div>";
echo "<div class='pedido'><span>Tipo: </span>$tipo</div>";
echo "<div class='pedido'><span>Quantidade: </span>$quantidade</div>";
echo "<div class='pedido'><span>Valor: </span>$valor</div>";
echo "<div class='pedido'><span>Total: </span>$total</div>";