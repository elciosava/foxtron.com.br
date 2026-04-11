<?php
   include 'conexao.php';

   $nome = $_POST['nome'];
   $senha = $_POST['senha'];

   $sql = "INSERT INTO usuarios (nome, senha)
           VALURES (:nome, :senha)";

           $stmt = $conexao->prepare($sql);
           $stmt->bindParam(':nome', $nome);
           $stmt->bindParam(':senha', $senha);
           $STMT->execute();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastrar usuario</title>
</head>
<body>
      <section>
        <form action="" method="post">

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="">

        
        <label for="senha">senha</label>
        <input type="text" name="senha" id="">

        <button type="submit">Enviar</button>
</section>

</body>
</html>