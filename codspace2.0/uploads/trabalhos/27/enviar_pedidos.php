<?php   
    $cliente = $_GET ['cliente'];
    $produto = $_GET['produto'];
    $bebida = $_GET ['bebida'];

    echo "<div clas = 'pedido'><span>Cliente: </span>$cliente</div>";
    echo "<div clas = 'pedido'><span>Produto: </span>$produto</div>";
    echo "<div clas = 'pedido'><span>Bebida: </span>$bebida</div>";
