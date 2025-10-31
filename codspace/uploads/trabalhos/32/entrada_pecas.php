<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_pecas = $_POST['id_pecas'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO entrada (id_pecas, quantidade) VALUES (:id_pecas, :quantidade)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_pecas', $id_pecas);
    $stmt->bindParam(':quantidade', $quantidade);
     
    if ($stmt->execute()) {
        header("Location:entrada_pecas.php");
        exit;
    } else {
        echo "não deu certo!!";
    }

}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        form {
            width: 350px;
        }
        body {
            background: lightblue;
            font-family: Verdana;
            flex-direction: column;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        input,select {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 5px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
       
    </style>
</head>

<body>
    <section class="endereco">
        <div class="container">
            <div class="form-box">
                <form action="" method="post">
                    <input type="text" value="<?php echo $_GET['id']; ?>" id="id_pecas" name="id_pecas">

                    <label for="quantidade">Entrada De Peças</label>
                    <input type="text" name="quantidade" id="">
                
                    <button type="submit">Salvar</button>
                    <button type="button" class="btn-voltar"
                        onclick="window.location.href='cadastro_pecas.php'">Voltar</button>
                </form>
            </div>
        </div>
    </section>
    
</body>

</html>