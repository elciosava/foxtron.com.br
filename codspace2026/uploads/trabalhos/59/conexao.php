<?php
 $local = 'localhost';
 $banco = 'agenda';
 $usuario = 'root';
 $senha = '';

 try{
    $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }catch (PDOExeption $ERRO){

      echo "nao deu certo" . $ERRO->getMessage();

 }


