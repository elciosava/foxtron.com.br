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
        header("location:cadastrar_pecas.php");
        exit;
    }else{
        echo "Não deu boa!";
    }
    
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENTRADA</title><style>
        
        html {
            background: lightpink;
        }  
                                    
        .resultado {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 350px;
            padding: 1px 17px
        }

        .linha {
            margin-bottom: 25px;
            border: solid 1px red;
            width: 350px;
            

        }

         body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
             height: 100vh; 
        }

</style>
</head>
<body>
    <section class="inicio">
        <div class="container">
            <form action="" method="post">
                <input type="text" value="<?php echo $_GET['id']; ?>" id="id_pecas" name="id_pecas">
                <input type="hidden" name="">
                <label for="quantidade">Quantidade</label>
                <input type="text" name="quantidade" id="">
                <button class="submit">Salvar</button>
            </form>
        </div>
    </section>
</body>
</html>