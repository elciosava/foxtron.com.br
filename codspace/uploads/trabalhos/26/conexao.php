<?php
   //e necessario 4 variaveis principais
   $local = 'localhost';
   $banco = 'joao';
   $usuario = 'root';
   $senha = '';

   //tentar a conexao usando as variaveis
   try{
      //criacao da variavel de conexao
      $conexao = new PDO("mysql:host=$local;dbname=$banco", $usuario, $senha);
      $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }catch (PDOException $e){
       echo "A conexão não procedeu. A tesoura comeu!" . $e->getMessage();
   }

?>