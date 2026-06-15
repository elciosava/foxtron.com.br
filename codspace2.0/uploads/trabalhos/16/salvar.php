<?php
 $produto=$_GET ['produto'];
 $quantidade=$_GET ['quantidade'];
 $tipo=$_GET['tipo'];
 $valor=$_GET ['valor'];

 echo "<div class='produto'><span>produto: </span> $produto </div>";
 echo "<div class='quantidade'><span>quantidade: </span> $quantidade</div>";
 echo "<div class='tipo'><span>tipo: </span> $tipo</div>";
 echo "<div class='valor'><span>valor: </span> $valor</div>";