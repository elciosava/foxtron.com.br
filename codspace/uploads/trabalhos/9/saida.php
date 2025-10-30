<?php
include("conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $produto = $_POST['id_produto'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO pecas (quantidade)
    VALUES  (:quantidade)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_produto',$id_produto);
    $stmt->bindParam(':quantidade',$quantidade);

    if($stmt->execute()){
        header("Location:saida.php");
        exit;
    } else{
        echo ("<p style='color:red;'> Deu ruim </p>");
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
            padding:0;
            margin:0;
        }
        form {
            width: 350px;
        }

        h2 {
            text-align: center;
            color: #000000ff;
            padding-bottom: 30px;
            font-size: 1.8rem;
        }
        body {          
            background: linear-gradient(to top, rgba(65b3e7ff), rgba(255 192 203));
            font-family: Verdana;
            flex-direction: column;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
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
            flex-direction: column;
        }
        .cabecalho  {
            display: flex;
            padding: 0 20px;
            border: 1px solid black;  
            width: 1000px; 
        }
        .cel_cabecalho {
            width: 180px;
            margin: 5px; 
        }
        .linha {
            display: flex;
            border: solid 1px black;
            padding: 5px 10px;
        }
        .resultado {
            margin-top: 20px;
        }
         .form-box {
            background-color: rgba(255, 255, 255, 0.83); 
            border: 2px solid rgba(0, 0, 0, 1); 
            border-radius: 10px; 
            padding: 20px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
            margin: 20px;
        }
        button {
            background-color: rgba(0, 0, 0, 1);
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
          
        }
        button:hover {
            background-color: rgba(101, 105, 110, 1);
        }
    </style>
</head>
<body>
    <section class="tudo">
        <div class="container">
            <h2>Saida de Peças</h2>

            <form action="" method="post">

                <label for="produto">Produto</label>
                <input type="text" name="produto" id="produto">
                
                <label for="Quantidade">Quantidade</label>
                <input type="text" name="Quantidade" id="Quantidade">

                <button type="submit">Salvar</button>
            </form>
        </div>
    </section>
    
</body>
</html>