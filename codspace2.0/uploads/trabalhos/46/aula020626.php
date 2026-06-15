<?php
    $nome = 'Cadastro de Aulas';
    $professor = $_GET['professor'];
    $materia = $_GET['materia'];
    $cargahoraria = $_GET['cargahoraria'];
    $saladeaula = $_GET['saladeaula'];
    $codigodeturma = $_GET['codigodeturma'];
    $serie = $_GET['serie']
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
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: lightslategray;
        }
        .formulario {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        form {
            width: 300px;
            padding: 15px;
        }
        input {
            width: 100%;
        }
        body {
            background: lightskyblue;
        }

    </style>
</head>
<body>
    <header>
        <?php
        echo "<h2>$nome</h2>";
        ?>
    </header>
    <div class="formulario">
        <form action="" method="get">
            <label for="professor">Professor:</label>
            <input type="text" name="professor" id="">

            <label for="materia">Matéria:</label>
            <input type="text" name="materia" id="">

            <label for="carga horaria">Carga Horária:</label>
            <input type="number" name="cargahoraria" id="">

            <label for="serie">Série:</label>
            <input type="number" name="serie" id="">

            <label for="sala de aula">Sala de Aula:</label>
            <input type="text" name="saladeaula" id="">

            <label for="codigo de turma">Código de Turma:</label>
            <input type="number" name="codigodeturma" id="">

            <button type="submit">Enviar</button>
        </form>
         <div class="resultado">
        <?php 
            echo "<div class='aluno'><span>Matéria: </span>$materia</div>";
            echo "<div class='aluno'><span>Professor: </span>$professor</div>";
            echo "<div class='aluno'><span>Série: </span>$serie</div>";
            echo "<div class='aluno'><span>Sala de Aula: </span>$saladeaula</div>";
            echo "<div class='aluno'><span>Código de Turma: </span>$codigodeturma</div>";
            echo "<div class='aluno'><span>Carga Horária: </span>$cargahoraria</div>";
        ?>
    </div>
    </div>
</body>
</html