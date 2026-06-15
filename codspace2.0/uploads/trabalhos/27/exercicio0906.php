<?php

  //4variaveis que sao padrao
  $local = 'localhost';
  $banco = 'adrian';
  $usuario = 'root';
  $senha = '';

  //tentar uma conexao com banco
  try {
    $conexao = new PDO("mysql:$local;dbname=$banco;",$usuario,$senha );
    $conexao->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch (PDOException $erro) {
    echo "Num deu conexão,meu truta.". $erro->getMessage();
  }