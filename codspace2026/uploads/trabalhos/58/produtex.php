<?php
    include 'conexao.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])){
        $id = $_POST['id'];

        $delete = "DELETE FROM produtos WHERE id = :id";
        $stmt = $conexao->prepare($delete);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()){
            $mensagem = "Produto Foi Obliterado!!!";
        }else{
            $mensagem = "O Produto se recusa a ser Obliterado!!!";
        }
    }

    $sql = "SELECT id, produto FROM produtos";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $produtos = $stmt->fetchALL();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de produtos</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        
    </style>
</head>
<body>
    <form action="" method="post">
        <select name="id" id="">
            <option value="">Selecione um produto que vai ser Obliterado</option>

            <?php foreach($produtos as $produto): ?>
                <option value="<?= $produto ['id']; ?>">
                    <?= $produto ['produto']; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Deletar da existencia</button>

    </form>
</body>
</html>