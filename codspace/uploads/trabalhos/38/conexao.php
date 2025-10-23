<?php
   $local = 'localhost';
   $banco = 'erick';
   $usuario = 'root';
   $senha = '';

   try{
    $conexao = new PDO("mysql:host=$local;dbname=$banco",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }catch (PODException $e){
       echo "Não deu certo!!". $e->getMassage();
   } 


?>