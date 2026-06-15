<?php
$cliente = $_GET['cliente'];
$produto = $_GET['produto'];
$bebidas = $_GET['bebidas'];

echo "<div class='pedido'><span>cliente: </span>$cliente</div>";
echo "<div class='pedido'><span>produto: </span>$produto</div>";
echo "<div class='pedido'><span>bebidas: </span>$bebidas</div>";