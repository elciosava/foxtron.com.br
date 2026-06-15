<?php
    $cliente = $_GET['cliente'];
    $produto = $_GET['produto'];
    $bebida = $_GET['bebida'];

    echo "<div class='pedido'><span>Cliente: </span>$cliente</div>";
    echo "<div class='pedido'><span>Produto: </span>$produto</div>";
    echo "<div class='pedido'><span>Bebida: </span>$bebida</div>";