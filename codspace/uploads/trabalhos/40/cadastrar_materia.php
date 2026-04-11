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
            padding:0;
            margin:0;
        }
        form {
            width: 350px;
        }

        h2 {
            text-align: center;
            color: #000000;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }
        body {          
            background: linear-gradient(to top, rgba(255 62 150), rgba(238 201 0));
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
            border: 2px solid rgba(0, 0, 0, 1); 
            border-radius: 10px; 
            padding: 20px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
            margin: 20px;
        }
        button {
            background-color: rgba(0, 0, 0, 1);
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
          
        }
        button:hover {
            background-color: rgba(255, 255, 255, 1);
        }

    </style>
</head>
<body>
    <section class="inicio">
        <div class="container">
            <div class="form-box">
                <h2>Materias</h2>
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
               <button type="submit">Salvar</button>

            </form>
            </div>
        </div>
    </section>
</body>
</html>