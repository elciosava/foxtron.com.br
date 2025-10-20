<?php
  $local = 'localhost';
  $banco = 'joao';
  $usuario = 'root';
  $senha = ''; //s4va6o841A@

  try{
    $conexao = new PDO("mysql:host=$local;dbname=$banco",$usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  }catch (PDOException $e){
    echo "a conexão nao procedeu, a tesoura comeu!!!" . $e->getMessage();
  }
?>