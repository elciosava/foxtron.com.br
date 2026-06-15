<?php
$cliente = $_GET ['cliente'];
$produto = $_GET ['produto'];
$bebida = $_GET ['bebida'];

echo "<div class='pedido'><span>cliente: </span> $cliente </div>";
echo "<div class='produto'><span>cliente: </span> $produto </div>";
echo "<div class='bebida'><span>cliente: </span> $bebida </div>";