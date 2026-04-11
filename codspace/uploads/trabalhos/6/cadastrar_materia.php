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
        h2 {
            text-align: center;
            color: rgba(109, 10, 134, 1);
            margin-bottom: 20px;
            font-size: 1.8rem;
        }

        body {
            background: linear-gradient(to left, rgba(114, 91, 145, 1), rgba(76, 24, 173, 1));
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
        .form-box {
            background-color: rgba(255, 255, 255, 0.83);
            border: 3px solid rgba(109, 10, 134, 1);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 20px;
        }

        button {
            background-color: rgba(109, 10, 134, 1);
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
            margin-top: 2px;
        }

        
    </style>
</head>

<body>
    <section class="endereco">
        <div class="container">
            <div class="form-box">
                <h2>Cadastro De Matérias</h2>
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
        </div>
    </section>
    
</body>

</html>