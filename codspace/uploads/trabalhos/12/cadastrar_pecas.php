<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $produto = $_POST['pecas'];

  $sql = "INSERT INTO pecas (produto) VALUES (:produto)";
  $stmt = $conexao->prepare($sql);
  $stmt->bindParam(':produto', $produto);

  if ($stmt->execute()) {
    header("Location:cadastropecas.php");
    exit;
  } else {
    echo "Não foi possível cadastrar o produto";
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
            margin: 0;
            padding: 0;
        }
        body {
            background: linear-gradient(135deg, #3fa766ff, #903ec7ff);
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .form-container {
            background-color: #ad39b8ff;
            border-radius: 10px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            margin-bottom: 30px;
            box-shadow: 4px 5px 30px #131111ff;
        }
        h2 {
            text-align: center;
            color: #529eb1ff;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input, 
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #2c1212ff;
            border-radius: 5px;
            font-size: 16px;
           transition: 0.3s ease-out;
       }
       input:hover,
       select:hover {
        border: 1px solid #00000050;
        transition: 0.3s ease-out;
       }
       button {
        width: 100%;
        padding: 12px;
        background-color: #001affff;
        border: 1px solid #7e7e7e2a;
        border-radius: 5px;
        color: white;
        font-size: 16px;
        cursor: pointer;
        margin-top: 15px;
        transition: 0.3s ease-out;
        font-weight:200;
       }
       button:active {
        background-color: #4947ceff;
        transition: 0.3s ease-out;
       }
       .resultados {
        width: 100%;
        max-width: 800px;
        background-color: #000000ff;
        border-radius: 10px;
        padding: 20px;
       }
       .cabecalho {
        display: flex;
        font-weight: bold;
        margin-bottom: 10px;
       }
       .cel_cabecalho {
        flex: 1;
        padding: 5px;
        border-bottom: 1px solid #000000ff;
       }

      
       
      
    </style>
    <body>
        <h2>Loja de Peças</h2>
    <section class="inicio">
        <div class="coluna meio">
                <form action="gravar_pecas.php" method="post">

                    <label for="nome">Nome da Peça</label>
                    <input type="text" name="nome" id="">

                    <label for="quantidade">Quantidade de peças</label>
                    <input type="text" name="quantidade">

                    <label for="valor">Valor</label>
                    <input type="text" name="valor">

                   
                    <button class="submit">Salvar</button>

                </form>
            </div>
    </section>
        </div>
    </section>    
</body>
</html>
