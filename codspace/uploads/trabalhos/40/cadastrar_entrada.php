<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_pecas = $_POST['id_pecas']; 
     $quantidade = $_POST['quantidade'];  
      $sql = "INSERT INTO entrada(id_pecas, quantidade)
    VALUES (:id_pecas, :quantidade)";


    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_pecas', $id_pecas);
    $stmt->bindParam(':quantidade', $quantidade);

   

    if ($stmt->execute()) {
        header("Location:cadastrar_entrada.php");
        exit;
    }else{
        echo "não deu certo!";
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
            color: #bc5ffaff;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }
        body {          
            background: linear-gradient(to top, rgba(234 245 938), rgba(214 117 203));
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
            background-color: rgba(255, 985, 255, 0.83); 
            border: 2px solid rgba(250, 229, 255, 1); 
            border-radius: 10px; 
            padding: 20px; 
            box-shadow: 0 4px 8px rgba(153, 0, 255, 0.2); 
            margin: 20px;
        }
        button {
            background-color: rgba(195, 96, 252, 1);
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
          
        }
        button:hover {
            background-color: rgba(215, 96, 252, 1);
        }

    </style>
</head>
<body>
    <section class="inicio">
        <div class="container">
            <div class="form-box">
                <h2>💜Cadastro de Entradas💜</h2>
            <form action="" method="post">
                  <input type="text" value="<?php echo $_GET['id']; ?>" id="id_pecas" name="id_pecas">
              
                  <label for="quantidade">Entrada de peças</label>
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