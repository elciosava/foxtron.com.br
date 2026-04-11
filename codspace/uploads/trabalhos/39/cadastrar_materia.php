<?php
    include 'conexao.php';

    $sql = "SELECT * FROM `professores`";

    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $materias = $_POST['materia'];
    $id_professor = $_POST['professor'];

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
            margin: 0;
            padding: 0;
        } 

         header {
            height:50px;
        }

        html {
            font-family: Segoe UI;
            background: lightblue;
        }  

         form {
            width: 400px;
        }
        
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 30px;
            height: 50px;
        }
                                         
        .container {
            display: flex;
            justify-content: center;
            align-items: center;           
        }

        input, select {
            width: 100%;
            padding: 5px;
            font-size: 0.7rem;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
             height: 100vh; 
        }

        .cabecalho {
            display: flex;
            padding: 20px;
        }

        .cel_cabecalho {
            width: auto;
            margin-left: 10px;
            margin-right: 10px;
        }
 </style>
</head>
<body>
     <section class="inicio">
        <div class="container">
            <form action="" method="post">

              

                <label for="materia">Materias</label>
                <input type="text" name="materia" id="">

                <select name="professor" id="">
                    <?php
                    while($professor = $stmt->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$professor['id']}'>{$professor['nome']}</option>";
                    }
                    ?>
                </select>
                <button class="submit">Salvar</button>
            </form>
        </div>
    </section>
</body>
</html>