<?php
$cliente=$_GET['cliente'];
$produto=$_GET['produto'];
$bebidas=$_GET['bebidas'];

echo"<div class='pedido'><span>Cliente:</span>$cliente</div>";
echo"<div class='pedido'><span>Produto:</span>$produto</div>";
echo"<div class='pedido'><span>Bebidas:</span>$$bebidas</div>";