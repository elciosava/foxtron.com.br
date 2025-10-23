<?php
   $local = 'localhost';
   $banco = 'felipe';
   $usuario = 'root';
   $local = '';

   try{
    $conexao = new PDO("mysql:host=$local;dbname=$banco",$usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }catch (PDOException $e){
    echo "nao deu boa!! " . $e->getMessage();
   }














?>