<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['id_cliente'])){
$id_cliente = $_POST['id_cliente'];

$delete = "DELETE FROM tomate WHERE id_CLIENTE = :id_cliente";
$stmt = $conexao->prepare($delete);
$stmt->bindParam(':id_cliente' , $id_cliente);

if ($stmt->execute()){
    $mensagem = "Cliente foi pro beleleu!!";
}else{
    $messagem = "o cliente se resusa correr";
   }
}

$sql= "SELECT id_cliente, nome_cliente FROM tomate ";
$stmt= $conexao->prepare($sql);
$stmt->execute();
$clientes =$stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (!empty($messagem)):
        ?>
    <p><?= $messagem ?></p>
    <?php endif; ?>

    <form action="" method="post">
        <select name="id_cliente">
            <option value="">Selecione um cliente</option>

            <?php foreach($clientes as $cliente): ?>
                <option value="<?= $cliente['id_cliente'] ?>">
                    <?= $cliente['nome_cliente'] ?>
                </option>
           <?php endforeach; ?>     
            
        </select>
        <button type="submit" onclick="return confirm('quer delear esse cliente?')">delets</button>
    </form>
</body>
</html>