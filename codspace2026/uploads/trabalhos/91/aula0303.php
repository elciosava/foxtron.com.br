<?php
 //conexao com banco de dados;
 //declarar 4 variaveis ;
 $local = 'localhost'; //local onde esta meu banco
 $banco = 'mah'; //nome do meu banco de dados
 $usuario = 'root'; //usuario pafdrao do banco de dados 
 $senha = ''; //senha padrao do banco de dados 

 try{
    $conexao = new PDO ("mysql:local=$local;dbname=$banco",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }catch (PDOException $e){

     echo "Nao conectou!" . $e->getMessage ();
 }
   //carregar campos para variaveis 
   $nome = $_POST['nome'];
   $senha = $_POST['senha'];

   //carrega a instrucao sqL
   $sql = "INSERT INTO usuario(nome,senha) VALUES (:nome, :senha)";
   $stmt = $conexao->prepare($sql);
   //carregar nossas variaveis
   $stmt->bindParam(':nome',$nome);
   $stmt->bindParam(':senha',$senha);
   //executa a instrucao sql
   $stmt->execute();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <div class="container">
        <form action="" method="post">
            <label for="nome">nome</label>
            <input type="text" name="nome" id="">

            <label for="senha">senha</label>
            <input type="password" name="senha" id="">

            <button type="submit">enviar</button>
        </form>
      </div>
</body>
</html>