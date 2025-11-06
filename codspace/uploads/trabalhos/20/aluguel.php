<?php
include 'conexao.php';

//$sql = "SELECT professores.nome, materia.materia FROM professores AS professores
 //INNER JOIN materias AS materia WHERE professores.id = materia.id_professores";

 //$stmt = $conexao->prepare($sql);
 //$stmt->execute();
 $sql = "SELECT * FROM `clientes`";
   $stmt = $conexao->prepare($sql);
   $stmt->execute();

    $sql_carros = "SELECT * FROM `carros`";
   $stmt_carros = $conexao->prepare($sql_carros);
   $stmt_carros->execute();

   include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_carros = $_POST['id_carros'];
    $id_clientes = $_POST['id_clientes'];
    

    $sql = "INSERT INTO aluguel (id_carros, id_clientes)
    Values (:id_carros, :id_clientes)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_carros',$id_carros);
    $stmt->bindParam(':id_clientes',$id_clientes);
    
    
    if ($stmt->execute()){
     header("location:aluguel.php");
     exit;
    }else{
        echo"Não Deu Boa!!"; 
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
 
body {
    font-family: Arial, sans-serif;
    background-color: #f5f6fa;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}


.container {
    background: #fff;
    padding: 25px 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    width: 320px;
}


form {
    display: flex;
    flex-direction: column;
}


label {
    margin-bottom: 5px;
    font-weight: bold;
    color: #333;
}

select {
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    font-size: 14px;
}


button {
    padding: 10px;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background-color: #1d6fa5;
}

    </style>
    
</head>
<body>
    <section>
        <div class="container">
            <form action="" method="post">
                <label for="cliente">Cliente</label>
                <select name="id_clientes" id="">
                    <?php 
                        while ($clientes = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$clientes['id']}'>{$clientes['nome']}</option>";
                        }
                    ?>
                </select>
                <label for="carros">Carros</label>
                <select name="id_carros" id="">
                    <?php 
                        while ($carros = $stmt_carros->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$carros['id']}'>{$carros['marcas']}</option>";
                        }
                    ?>
                </select>

                <button type="submit">Enviar</button>
            </form>

        </div>
    </section>
</body>
</html>