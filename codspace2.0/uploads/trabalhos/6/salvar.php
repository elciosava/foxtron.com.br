<?php
    $produto= $_GET['produto'];
    $quantidade= $_GET ['quantidade'];
    $tipo= $_GET['tipo'];
    $valor = $_GET ['valor'];

    $total = $quantidade * $valor;
    
    
echo "<div class= 'pedido'><span>produto: </span>$produto</div>";
echo "<div class= 'pedido'><span>quantidade: </span>$quantidade</div>";
echo "<div class= 'pedido'><span>tipo: </span>$tipo</div>";
echo "<div class='produto'><span>valor: </span>$total</div>";
?>