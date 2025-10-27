<?php
    $local ='localhost';
    $banco ='felipe';
    $usuario = 'root';
    $senha = '';


   try{
     $conexao= new PDO("mysql:host=$local;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   }catch (PDOexception $e){
    die("deu ruim coisa!!" . $e->getMessage());
   }
  




?>