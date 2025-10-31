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
        
       * {
            margin: 0;
            padding: 0;
        } 

         header {
            height:50px;
        }

        html {
            font-family: Segoe UI;
             background: linear-gradient(to left, #6006aaff, #84b4a8ff);
        }  

         form {
            width: 400px;
        }
        
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 30px;
            height: 50px;
        }
                                         
        .container {
            display: flex;
            justify-content: center;
            align-items: center;           
        }

        input, select {
            width: 100%;
            padding: 5px;
            font-size: 0.7rem;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
             height: 100vh; 
        }

          .form-box {
            
            background-color: rgba(180, 32, 113, 1);
            border: 2px solid rgba(0, 0, 0, 1); 
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
            margin: 20px;
        }
        button {
            background-color: rgba(195, 0, 255, 1);
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
            margin-top: 4px;
        }

        button:hover {
            background-color: rgba(10, 22, 129, 1);
        }

        h2 {
            text-align: center;
            color: black;
            margin-bottom: 20px;
            font-size: 1.9rem;
        }
</style>
</head>
<body>
    <section class="inicio">
        <div class="container">
            <div class="form-box">
            <form action="" method="post">
                <h2>Entrada De Peças</h2>
                <input type="text" value="<?php echo $_GET['id']; ?>" id="id_pecas" name="id_pecas">
                <input type="hidden" name="">
                <label for="quantidade">Quantidade</label>
                <input type="text" name="quantidade" id="">
                <button class="submit">Salvar</button>
            </form>
        </div>
        </div>
    </section>
</body>
</html>