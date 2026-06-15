<?php
  $cliente=$_GET['cliente'];
  $produto = $_GET['produto'];
  $bebida = $_GET['bebida'];

  echo"<div class='pedito'><span>Cliente:</span>$cliente</div>";
  echo"<div class='pedito'><span>Produto:</span>$produto</div>";
  echo"<div class='pedito'><span>Bebida:</span>$bebida</div>";
