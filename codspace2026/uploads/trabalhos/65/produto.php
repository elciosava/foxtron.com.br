<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])){
    $id = $_POST['id'];

    $delete = "DELETE FROM produto WHERE id = :id";
    $stmt = $conexao->prepare($delete);
     $stmt->bindParam(':id', $id);

     if ($stmt->execute()){
        $mensagem = "Cliente estava no aviao do 11 de setembro!!";
     }else{
        $mensagem = "O cliente perdeu o voo";
     }
}

$sql = "SELECT id, produto FROM produto";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$produtos = $stmt->fetchAll();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>     
    <?php
    if (!empty($mensagem)):
    
    ?>
    <p><?= $mensagem ?></p>
    <?php endif; ?>

    <form action="" method="post">
        <select name="id">
            <option value="">Selecione o produto</option>


         <?php foreach($produtos as $produto): ?>
            <option value="<?= $produto['id'] ?>">
                <?=  $produto['produto'] ?>
            </option>
            <?php endforeach; ?>
        </select>
        <button type="submit" onclick="return confirm('Quer deletar esse produto?')">Deletar Produto Selecionado</button>
    </form>
</body>
</html>