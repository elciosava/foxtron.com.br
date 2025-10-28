<?php
    include 'conexao.php';

    $sql = "SELECT * FROM `professores`";

    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $materias = $_POST['materias'];
    $id_professor = $_POST['professores'];

    $sql = "INSERT INTO materias (materia, id_professores)
            VALUES (:materias, :id_professor)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':materias', $materias);
    $stmt->bindParam(':id_professor', $id_professor);

    if ($stmt->execute()) {
        header("Location:cadastrar_materia.php");
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
            background: blue;
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
        
        button {
           
            border: none;
            padding: 8px;
            border-radius: 5px;
            
        }

        
    </style>
</head>

<body>
    <section class="endereco">
        <div class="container">
            
                <form action="" method="post">
                    <label for="materias">Matérias</label>
                    <input type="text" name="materias" id="">

                    <label for="professores">Professor</label>
                    <select name="professores" id="">
                    <?php
                        while($professor = $stmt->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$professor['id']}'>{$professor['nome']}</option>";
                        }
                    ?>
                    </select>
                    <button type="submit">Salvar</button>
                </form>
            
        </div>
    </section>
    
</body>

</html>