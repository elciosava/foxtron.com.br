<?php
  $produto=$_GET['produto'];
  $tipo = $_GET['tipo'];
  $quantidade = $_GET['quantidade'];
  $valor = $_GET['valor'];

  echo"<div class='pedito'><span>produto:</span>$produto</div>";
  echo"<div class='pedito'><span>tipo:</span>$tipo</div>";
  echo"<div class='pedito'><span>quantidade:</span>$quantidade</div>";
  echo"<div class='pedito'><span>valor:</span>$valor</div>";

