<?php
    $quantidade = $_GET['quantidade'];
    $produto = $_GET['produto'];
    $valor = $_GET['valor'];
    $tipo = $_GET['tipo'];

    echo "<div class='pedido'><span>Quantidade: </span>$quantidade</div>";
    echo "<div class='pedido'><span>Produto: </span>$produto</div>";
    echo "<div class='pedido'><span>Valor: </span>$valor</div>";
    echo "<div class='pedido'><span>Tipo: </span>$tipo</div>";