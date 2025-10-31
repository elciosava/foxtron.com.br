
<?php
include 'conexao.php';

 
   $sqlp = "SELECT * FROM `peca`";
   $stmt = $conexao->prepare($sqlp);
   $stmt->execute();

   if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $quantidade = $_POST['quantidade'];
    $id_pecas = $_POST['id_peca'];

    $sql = "INSERT INTO entrada (quantidade, id_pecas)
            VALUES (:quantidade, :id_pecas)";
    
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':id_pecas', $id_pecas);

    if ($stmt->execute()){
        header("Location:cadastrar_peca.php");
        exit;    
    }else{
        
    }
}
?>

 <!DOCTYPE html>
 <html lang="pt-br">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pecas automotivas</title>
 </head>
 <body>
    <section>
        <div class="form">
            <form action="" method="post">
                <input type="hidden" name="euamo">
                <label for="quantidade">Quantidade</label>
                <input type="text" name="quantidade" id="quantidade">
                <select name="id_peca" id="">
                    <?php
                    while ($prof = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$prof['id']}'>{$prof['peca']}</option>";
                    }
                    ?>
                </select>
                <button type="submit">Salvar</button>
            </form>
        </div>
    </section>
 </body>
 </html>