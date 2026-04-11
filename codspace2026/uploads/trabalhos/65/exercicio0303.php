<?php
   //conexao com banco de dados
   //declarar 4 variaveis

   $local = 'local host'; //local onde esta meu banco
   $banco = 'caina'; //nome do meu banco de dados
   $usuario = 'root'; //usuario padrão do meu banco de dados
   $senha = ''; //senha padrao do banco de dados

   try{
    $conexao = neW PDO ("mysql:local=$local;dbname=$banco",$usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }catch  (PDOExpetion $e){
    echo "Não conectou!" . $e->getMessage();
   }

   //carregar campos para variaveis

   $endereco = $_POST['endereco'];
   $rua = $_POST['rua'];
   $numero = $_POST['numero'];  
    $bairro = $_POST['bairro'];  


   //carrega a intrucao sql
   $sql = "INSERT INTO endereco (rua, numero, bairro) VALUES (:rua, :numero, :bairro)";

   //prepara a instrucao sql
   $stmt = $conexao->prepare($sql);

   //carregar nossas variaveis
   $stmt->bindParam(':rua', $rua);
   $stmt->bindParam(':numero', $numero);
   $stmt->bindParam(':bairro', $bairro);

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
            <label for="rua">Rua</label>
            <input type="text" name="rua" id="">

             <label for="numero">Numero</label>
             <input type="number" name="numero" id="">

               <label for="bairro">Bairro</label>
            <input type="text" name="bairro" id="">

             <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>