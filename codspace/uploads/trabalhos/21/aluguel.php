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
        /* Estilo geral da página */
        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Container do formulário */
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            width: 350px;
            text-align: center;
            animation: fadeIn 0.7s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            margin-bottom: 25px;
            color: #333;
        }

        /* Labels */
        label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
            color: #555;
            font-weight: 500;
        }

        /* Inputs */
        input[type="text"],
        input[type="color"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus {
            border-color: #2a5298;
            outline: none;
        }

        /* Botão */
        button {
            background: #2a5298;
            color: white;
            border: none;
            padding: 12px 20px;
            width: 100%;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #1e3c72;
        }

        /* Efeito no input color */
        input[type="color"] {
            height: 40px;
            cursor: pointer;
            border: none;
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
                            echo "<option value='{$carros['id']}'>{$carros['marca']}</option>";
                        }
                    ?>
                </select>

                <button type="submit">Enviar</button>
            </form>

        </div>
    </section>
</body>
</html>