<?php
    $professor = $_GET['professor'];
    $materia = $_GET['materia'];
    $cargahoraria = $_GET['carga_horaria'];
    $codigodaturma = $_GET['codigo_da_turma'];
    $serie = $_GET['serie'];
    $saladeaula = $_GET['sala_de_aula'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        header{
            height: 80px;
            justify-content: center;
            display: flex;
            align-items: center;
            background: #00af00;
            font-family: 'Segoe UI';
        }
        .cadastro{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        form{
            width: 300px;
            padding: 15px;
        }
        input{
            width: 100%;
        }
        body{
            background:#23d613;
        }
    </style>
</head>
<body>
    <header>
        <h2>Cadastro</h2>
    </header>
    <div class="cadastro">
        <form action="" method="get">
            <label for="professor">Professor:</label>
            <input type="text" name="professor" id="">
            
            <label for="materia">Matéria:</label>
            <input type="text" name="materia" id="">

            <label for="carga horaria">Carga Horaria:</label>
            <input type="number" name="carga_horaria" id="">

            <label for="codigo da turma">Código da turma:</label>
            <input type="number" name="codigo_da_turma" id="">

            <label for="serie">Série:</label>
            <input type="number" name="serie" id="">

            <label for="sala de aula">Sala de aula:</label>
            <input type="number" name="sala_de_aula" id="">
            
            <button type="submit">Enviar</button>
        </form>
        <div class="resultados">
            <?php
            echo "<div class='professor'><span>Bem vindo professor </span>$professor</div>";
            echo "<div class='materia'><span>Matéria: </span>$materia</div>";
            echo "<div class='carga horaria'><span>Carga Horaria: </span>$cargahoraria<span> horas</span></div>";
            echo "<div class='codigo da tuma'><span>Código da turma: </span>$codigodaturma</div>";
            echo "<div class='serie'><span>Série: </span>$serie<span>°</span></div>";
            echo "<div class='sala de aula'><span>Sala de aula:</span>$saladeaula</div>";
            ?>
        </div>
    </div>
</body>
</html>