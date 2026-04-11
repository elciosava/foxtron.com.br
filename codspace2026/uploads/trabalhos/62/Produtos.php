<?php
include 'conexao.php';

  if ($_SERVER['REQUEST_METHOD']=== 'POST' && isset($_POST['id'])){
    $id = $_POST['id'];

    $delete = "DELETE FROM cliente WHERE id = :id";
    $stmt = $conexao->prepare($delete);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()){
        $mensagem = "cliente foi pro vasco!!";
    }else{
    $mensagem = "O cliente se recusa a ir pro vasco";
    }
  }

  $sql = "SELECT id, produto FROM produtos ";
  $stmt = $conexao->prepare($sql);
  $stmt->execute();
  $produtos = $stmt->fetchALL();
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
  <meta charset="UTF-8">
  <title>Lista de Produtos</title>
</head>
<body>
    <?php
       if (!empty($mensagem)): ?>
    <p><?= $mensagem ?></p>
    <?php endif; ?>

    <form action="" metho="post">
        <select name="id">
           <option value="">Selecione um produto</option>

           <?php foreach($produtos as $produto): ?>
            <option value="<?=  $produto['id']; ?>">
                <?= $produto['produto']; ?>
            </option>
            <?php endforeach; ?>
        </select>
        <button type="submit" onclick="return confirm('Quer deletar esse produto ?')">Deletar produto Selecionado</butoon>
      </form>
</body>
</html>