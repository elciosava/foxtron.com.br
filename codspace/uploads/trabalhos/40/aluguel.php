<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_clientes = $_POST['id_clientes']; 
    $id_carros = $_POST['id_carros'];  

      $sql = "INSERT INTO aluguel (id_clientes, id_carros)
    VALUES (:id_clientes, :id_carros)";


    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_clientes', $id_clientes);
    $stmt->bindParam(':id_carros', $id_carros);

   

    if ($stmt->execute()) {
        header("Location:aluguel.php");
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
            color: #FFDAB9;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }
        body {          
            background: linear-gradient(to top, rgba(255 218 185), rgba(255 239 213));
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
            background-color: rgba(255, 255, 255, 0.83); 
            border: 2px solid rgba(255, 255, 255, 1); 
            border-radius: 10px; 
            padding: 20px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
            margin: 20px;
        }
        button {
            background-color: rgba(247, 210, 143, 1);
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
          
        }
        button:hover {
            background-color: rgba(255, 232, 182, 1);
        }

    </style>
</head>
<body>
    <div class="container">
       <div class="form-box">
        <h2>Cadastrar Cliente</h2>
        <form action="" method="post">

            <label for="id_clientes">Cliente</label>
            <select name="id_clientes" id="">

               <?php
               $sqlclientes = "SELECT * FROM `clientes`";
               $stmtclientes = $conexao->prepare($sqlclientes);
               $stmtclientes->execute();

                
                while($clientes = $stmtclientes->fetch(PDO::FETCH_ASSOC)){
                    echo "<option value='{$clientes['id']}'>{$clientes['nome']}</option>";
                }

               ?>
               </select>

               <label for="carros">Carros</label>
               <select name="id_carros" id="">
                <?php
                $sqlcarros = "SELECT * FROM `carros`";
                $stmtcarros = $conexao->prepare($sqlcarros);
                $stmtcarros->execute();

     
                while($carros = $stmtcarros->fetch(PDO::FETCH_ASSOC)){
                    echo "<option value='{$carros['id']}'>{$carros['modelo']}</option>";
                }

                ?> 
               </select>

        <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>