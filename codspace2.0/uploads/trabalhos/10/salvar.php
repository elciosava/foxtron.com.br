<?php
 $produto = $_GET['produto'];
 $tipo = $_GET['tipo'];
 $quantidade = $_GET['quantidade'];
 $valor = $_GET['valor'];

 echo "<div class='pedido'><span>Produto: </span>$produto</div>";
 echo "<div class='pedido'><span>Tipo: </span>$tipo</div>";
 echo "<div class='pedido'><span>Valor: </span>$valor</div>";
 echo "<div class='pedido'><span>Quantidade: </span>$quantidade</div>";