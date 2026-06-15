<?php

    $produto = $_GET ['produto'];
    $quantidade = $_GET ['quantidade'];
    $tipo = $_GET ['tipo'];
    $valor = $_GET ['valor'];

  echo "<div class= 'pedido'> <span>Produto:: </span>$produto</div>";
  echo "<div class= 'pedido'> <span>Quantidade: </span>$quantidade</div>";
  echo "<div class= 'pedido'> <span>Tipo: </span>$tipo</div>";
  echo "<div class= 'pedido'> <span>Valor: </span>$valor</div>";