<?php

$produto = $_GET['produto'];
$tipo = $_GET['tipo'];
$valor = $_GET['valor'];
$quantidade = $_GET['quantidade'];


echo "<div class='pedido'><span>produto: </span>$produto</div>";
echo "<div class='pedido'><span>tipo: </span>$tipo</div>";
echo "<div class='pedido'><span>valor: </span>$valor</div>";
echo "<div class='pedido'><span>quantidade: </span>$quantidade</div>";