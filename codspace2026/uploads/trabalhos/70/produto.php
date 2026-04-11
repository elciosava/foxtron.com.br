<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_produto'])){
 $id_produto =$_POST['id_produto'];

 $delete = "DELETE FROM produto WHERE id_produto = :id_produto";
 $stmt = $conexao->prepare($delete);
 $stmt->bindParam(':id_produto',$id_produto);

 if($stmt->execute()){
    $mensagem ="produto excluido com sucesso";

 }else{
    $mensagem = "O cliente se recusa torce pro vasco";
}
 }
 
 $sql = "SELECT id_produto, nome_produto, quantidade_produto FROM produto ";
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
 <?php  if(!empty($mensagem)): ?>
 <p><?=  $mensagem  ?></p>
 <?php endif; ?>


 <form action="" method="post">
    <select name="id_produto" >
        <option value="">Selecione um produto</option>

        <?php foreach($produtos as $produto):?>
            <option value="<?=  $produto['id_produto'];?>">
                <?= $produto['nome_produto']; ?> |
                <?= $produto['quantidade_produto'] ?>

            </option>
            <?php  endforeach;?>
    </select>
    <button type="submit" onclick="return confirm('quer deletar esse produto?')">Deletar produto selecionado</button>
 </form>
</body> 
</html>