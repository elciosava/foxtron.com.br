<?php
include "conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_pecas = $_POST['id_pecas'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO saida (id_pecas, quantidade)
            VALUES (:id_pecas,:quantidade)";
          
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_pecas',$id_pecas );
    $stmt->bindParam(':quantidade',$quantidade);

    if ($stmt->execute()){
        header("Location:entrada.php");
        exit;
    }else{
        echo "<p>nao deu certo :C</p>";
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

        .formulario {
            width: 800px;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }



        form {
            width: 300px;
        }

        input, select {
            width: 100%;
            padding: 5px;
            font-size: 0.7rem;
            box-sizing: border-box;
        }

        .cabecalho {
            display: flex;
            padding: 0 20px;
            border:1px solid black;
            width: 1000px;
        }

        .cel_cabecalho {
            width: 250px;
        }

    </style>

</head>
<body>
    <section>
    <div class="container">
        <form action="" method="post">
    <input type="text" value="<?php echo $_GET['id'];?>" id="id" name="id_pecas">

    <label for="quantidade">Quantidade</label>
      <input type="number" name="quantidade" id="">
       
            <button type="submit">Salvar</button>

   </form>           
</div>