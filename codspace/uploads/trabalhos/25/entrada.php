<?php
    include 'conexao.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $quantidade = $_POST['quantidade'];

        $sql = "INSERT INT entrada (id_pecas, quantidade)
        VALUES (:id_pecas, :quantidade)";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id_pecas', $id);
        $stmt->bindParam(':quantidade', $quantidade);

        if($stmt->execute()){
            echo "<p style='color:green;'>Deu boa!!</p>";
        }else{
            echo "<p style='color:red;'>Deu ruim!!</p>";
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
                <input type="text" value="<?php echo $_GET['id'];?>" id="id" name="id">
                <input type="hidden" name="">
                <label for="quantidade">quantidade</label>
                <input type="text" class="quantidade" id="">
                <button type="submit">Salvar</button>
            </form>
        </div>
    </section>
</body>
</html>
SELECT pecas.nome_peca, entrada.quantidade AS
entrada_quantidade, saida.quantidade AS
saida_quantidade FROM pecas INNER JOIN
entrada ON pecas.id = entrada.id_pecas INNER 
JOIN saida ON pecas.id = saida.id_pecas;