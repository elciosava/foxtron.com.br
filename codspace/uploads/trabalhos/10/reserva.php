<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_aluno = $_POST['id_aluno']; 
    $id_computador = $_POST['id_computador']; 

    $sql_inserir_r = "INSERT INTO reserva (id_aluno,id_computador) 
                    VALUES (:id_aluno, :id_computador)";
    
    $stmt_inserir_r = $conexao->prepare($sql_inserir_r);
    $stmt_inserir_r->bindParam(':id_aluno', $id_aluno);
    $stmt_inserir_r->bindParam(':id_computador', $id_computador);
    $stmt_inserir_r->execute();
}

    $sql_alunos = "SELECT * FROM `alunos`";
    $stmt_alunos = $conexao->prepare($sql_alunos);
    $stmt_alunos->execute();

      
    $sql_computadores = "SELECT * FROM `computadores`";
    $stmt_computadores = $conexao->prepare($sql_computadores);
    $stmt_computadores->execute();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva</title>
</head>

<body>
    <style>
        body {
            flex-direction: column;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right,#e4e7ec,#61377a,#594192) ;
        }
        button {
            height: 30px;
            width: 80px;
            margin-top: 5px;
        }
        form {
            width: 400px;
            border: solid 1px black;
            padding: 20px;
            margin: 10px;
        }
        input,select {
            width: 100%;
            padding: 2px;
        }

    </style>
    <div class="container">
        <form action="" method="post">
            <label for="aluno">Aluno</label>
            <select name="id_aluno" id="id_aluno" required>
                <?php
                    while($alunos = $stmt_alunos->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$alunos['id']}'>{$alunos['nome']}</option>";
                    }
                ?>
            </select>
            <label for="computador">Computador</label>
            <select name="id_computador" id="id_computador" required>
                <?php
                    while($computadores = $stmt_computadores->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$computadores['id']}'>{$computadores['computador']}</option>";
                    }
                ?>
            </select>
            <button class="submit">Reservar</button>
        </form>
    </div>
</body>
</html>
