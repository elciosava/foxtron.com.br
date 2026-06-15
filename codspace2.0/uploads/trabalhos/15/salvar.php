<?php
$cliente= $_GET['cliente'];
$produto= $_GET['produto'];
$quantidade= $_GET['quantidade'];
$tipo= $_GET['tipo'];


echo "<div class='pedido'><span>Cliente: </span>$cliente</div>";
echo "<div class='pedido'><span>Produto: </span>$produto</div>";
echo "<div class='pedido'><span>Quantidade: </span>$quantidade</div>";
echo "<div class='pedido'><span>Tipo: </span>$tipo</div>";

