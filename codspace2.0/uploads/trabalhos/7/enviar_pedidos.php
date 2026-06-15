<?php
$cliente = $_GET['cliente'];
$produto = $_GET['produto'];
$bebida = $_GET['bebida'];

echo "<div class='pedido'><span>Cliente: </span>$cliente</div>";
echo "<div class='pedido'><span>produto: </span>$produto</div>";
echo "<div class='pedido'><span>bebida: </span>$bebida</div>";
