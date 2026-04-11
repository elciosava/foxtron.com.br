<?php
 $local = 'localhost';
  $banco = 'isaddeus';
   $usuario = 'root';
    $local = ''; // s4va6o841A@

    try {
        $conexao = new PDO ("mysql:host=$local;dbname=$banco",$usuario,$senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO:: ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "nao foi possivel" . $e->getMessage();
    }
    ?>