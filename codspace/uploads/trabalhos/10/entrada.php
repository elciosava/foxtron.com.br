<?php
    include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_pecas = $_POST['id_pecas']; 
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO entrada (id_pecas, quantidade) 
            VALUES (:id_pecas, :quantidade)";
    
    $stmt = $conexao->prepare($sql);  
    $stmt->bindParam(':id_pecas', $id_pecas); 
    $stmt->bindParam(':quantidade', $quantidade); 
    
    if ($stmt->execute()){
        header("Location: entrada.php");
        exit;
    } else {
        echo "Erro ao salvar: " . implode(", ", $stmt->errorInfo());
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section id="inicio">
        <div class="form">
            <form action="" method="post">
            <input type="text" value ="<?php echo $_GET['id'];?>" id="id" name="id_pecas">
            <label for="quantidade">Quantidade</label>
            <input type="text" name="quantidade" id="">
            <button type="submit">Salvar</button>
            </form>
        </div>
    </section>
    
</body>
</html>