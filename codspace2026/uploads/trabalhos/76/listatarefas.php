<?php
include 'conexao.php';
$titulo_tarefa = $_POST['titulo'] ?? null;
$descricao_tarefa = $_POST['descricao'] ?? null;

$sql = "INSERT INTO tarefas (titulo_tarefa,descricao_tarefa)
            VALUES (:titulo_tarefa,:descricao_tarefa)";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam('titulo_tarefa', $titulo_tarefa);
    $stmt->bindParam('descricao_tarefa', $descricao_tarefa);
    $stmt->execute();
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
            box-sizing: border-box;
            font-family: 'Segoe UI';
        }

        body {
            background: gray;
        }

        form {
            width: 100%;
        }

        input[type="text"],
        textarea {
            width: 100%;
            margin: 5px 0 10px 0;
            resize: none;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        #tarefas {
            padding: 20px;
            width: 100%;
            height: 100vh;
            display: grid;
            grid-template-columns: 1fr 4fr;
            gap: 20px;
        }

        .formulario,
        .tarefa {
            padding: 20px;
            border: 1px solid lightgray;
            background: white;
        }

        .andamento {
            background: orange;
        }

        .concluido {
            background: greenyellow;
        }
    </style>
</head>

<body>
    <section id="tarefas">
        <div class="formulario">
            <form action="" method="post">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="">

                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="" rows="5"></textarea>

                <button type="submit">Salvar Tarefa</button>
            </form>
        </div>
        <div class="tarefa">
            <?php
            $sql = "SELECT * FROM tarefas";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {

                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $statusClass = ($linha['estatus_tarefa'] === 'Concluido') ? 'concluido' : 'andamento';
                    echo "<div class='linha' {$statusClass}>";
                    echo "<div class='cel_cabecalho'>{$linha['titulo_tarefa']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['descricao_tarefa']}</div>";

                    echo "<div class='cel_cabecalho'>";
                    echo "<form method='get' action='update_tarefa.php'>";
                    echo "<input type='hidden' name='id_tarefa' value='{$linha['id_tarefa']}'>";
                    //alterem a partir daqui 
                    $checked = ($linha['estatus_tarefa'] === 'Concluido') ? 'checked' : '';
                    echo "<input type='checkbox' name='estatus_tarefa' value='Concluido' onchange='this.form.submit()' $checked>Concluido";
                    //nao aterem mais nada 
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                }
            }
            ?>
        </div>
    </section>
</body>

</html>