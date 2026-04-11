<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_produto'])){
    $id_produto = $_POST['id_produto'];

$delete = "DELETE FROM produto WHERE id =:id_produto";
$stm = $conexao->prepare($delete);
$stm->bindParam(':id_produto', $id_produto);

if ($stm->execute()){
    $mensagem = "Produto Excluido !";
}else{ $mensagem = " Resgatar produto";
}

}

$sql = "SELECT * FROM produto";
$stmt = $conexao->prepare($sql);
$stmt->execute ();
$produtos = $stmt->fetchAll();

#sql = "SELECT" * FROM produto ORDER by id = DSC";

?>

<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (!empty($mensagem)):?>
    <p> <?= $mensagem ?> </p>
    <?php endif; ?>

    <form action="" method="post">
        <select name="id_produto">
            <option value="">Selecione um produto</option>

            <?php foreach($produtos as $produto): ?>
                <option value="<?= $produto['id'] ?>">
                    <?= $produto['produto'] ?>

                </option>
                <?php endforeach; ?>
        </select>
        <button type="submit" onclick="return confirm('Quer deletrar esse cliente?')">Deletar Produto Selecionado</button>


    </form>

    
</body>
</html>