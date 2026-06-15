<?php
  $cliente = $_GET['cliente'];
  $produto = $_GET['produto'];
  $bebida = $_GET['bebida'];

     echo "<div class='pediddo'><span>Cliente: </span>$cliente</div>";
     echo "<div class='pediddo'><span>Produto: </span>$produto</div>";
     echo "<div class='pediddo'><span>Bebida: </span>$bebida</div>";