<?php
$cliente=$_GET['cliente'];
$produto=$_GET['fruta'];
$bebidas=$_GET['outro'];

echo"<div class='pedido'><span>Cliente:</span>$cliente</div>";
echo"<div class='pedido'><span>Produto:</span>$produto</div>";
echo"<div class='pedido'><span>Bebidas:</span>$bebidas</div>";