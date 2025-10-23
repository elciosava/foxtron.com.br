<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
     $quantidade = $_POST['quantidade'];
      $valor = $_POST['valor'];
      $id = $_GET['id'];

      if(!empty($id && !empty($nome) && !empty($quantidade) && !empty($valor))){
      try{
      $sql = "UPDATE produtos SET nome = :nome, quantidade = :quantidade,
      valor = :valor WHERE id = :id";
      $stmt = $conexao->prepare($sql);
      $stmt->bindParam (':nome', $nome);
      $stmt->bindParam (':quantidade', $quantidade);
      $stmt->bindParam (':valor', $valor);
      $stmt->bindParam (':id', $id);
      $stmt->execute();

      echo "Deu certo, foi atualizado!";
}catch (PDOException $erro){
    echo "Não deu certo!" . $erro->getMessage();
}
      }
    }

?>

<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo2.css">
    <title>Document</title>
    <style>
         * {
            margin: 0;
            padding: 0;
        }

        form {
            width: 350px;
        }

          .cabecalho, .cel_cabecalho{
            display:flex;
            padding: 0 20px;
            border: 1px solid black;
            width: 1000px;
           
        }
        input, select{
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 2px;

        }

        .cabecalho {
            display: flex;
            justify-content: center;
             align-items: center;

        }

         .cel_cabecalho{
            width: 250px;

         }

         .resultado {
            margin-top: 20px;
         }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        
         }

           body {
            height: 100vh;
            background-color: rgb(255, 220, 249);
            font-family: pink;
            display: flex;
            justify-content: center;
            align-items: center;
           }
       

    </style>
</head>
<body>
    <section>
        <div class="container">
            <form action="" method="post">
                <input type="text" value="<?php echo $_GET['id'];?>" id="id" name="id">

              <label for="produto">Produto</label>
              <input type="text" name="nome" id="nome" required>

              <label for="quantidade">Quantidade</label>
              <input type="numero" name="quantidade" id="quantidade"  required>

              <label for="valor">Valor</label>
              <input type="number" name="valor" id="valor"  required>
               
                <button type="submit">salvar</button>
                
                </form>
            </div>
        </div>
    </section>
    </body>
    </html>
