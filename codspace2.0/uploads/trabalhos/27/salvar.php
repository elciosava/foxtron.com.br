<?php   
    $produto = $_GET ['produto'];
    $quantidade = $_GET['quantidade'];
    $tipo = $_GET ['tipo'];
    $valor = $_GET['valor'];

    echo "<div clas = 'pedido'><span>Produto: </span>$produto</div>";
    echo "<div clas = 'pedido'><span>Quantidde: </span>$quantidade</div>";
    echo "<div clas = 'pedido'><span>Tipo: </span>$tipo</div>";
    echo "<div clas = 'pedido'><span>Valor: </span>$valor</div>";