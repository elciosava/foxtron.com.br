<?php
//conectar com o banco de dados
    //primeiro declarar 4 variáveis principais que são:
    $local = 'localhost';
    $banco = 'aline';
    $usuario = 'root';
    $senha = '';

    //tentamos conectar usando nossas variáveis 
    try{
        $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $erro){
        echo "Deu ruim parça!" . $erro->getMessage();
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $titulo = $_POST['titulo'] ?? null;
        $user = $_POST['usuario'] ?? null;
        $tarefa = $_POST['tarefa'] ?? null;
        $estatus = 'PENDENTE';
    

    $sql = "INSERT INTO tarefas (titulo_tarefa, usuario_tarefa, descricao_tarefa, status_tarefa)
        VALUES (:titulo, :user, :tarefa, :estatus)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':tarefa', $tarefa);
    $stmt->bindParam(':estatus', $estatus);
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
        *{
            margin:0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        header {
            height: 50px;
            padding: 10px;
        }
    
        #container {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 10px;
            grid-template-rows: 1fr 2fr;
            height: calc(100vh - 60px);
        }

        .formulario {
            grid-column: span 3;
            display: flex;
            justify-content: center; /*fica no centro horizontalmente*/
            align-items: center; /*fica no centro verticalmente*/
        }

        .form_cadastro {
            max-width: 400px;
            padding: 5px;
        }

        input {
            width: 100%;
        }

        textarea {
            resize: none;
            width: 100%;
        }

        .tarefa {
            background: #efefef;
            padding: 10px;
        }

        .div_tarefa{
            width: 100%;
            padding: 10px;
            background: white;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .titulo {
            font-size: 1.2rem;
            font-weight: bold;

        }

        .usuario {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .descricao {
            margin-bottom: 20px;
        }
        
    </style>

</head>

<body>
    <header>
        <h2>Agenda de tarefas</h2>
    </header>

    
    <div id="container">
        <div class="formulario">
            <form action="" method="post" class="form_cadastro">
                <label for="titulo">Título da tarefa</label>
                <input type="text" name="titulo" id="">

                <label for="usuario">Usuário</label>
                <input type="text" name="usuario" id="">

                <label for="tarefa">Tarefa</label>
                <textarea name="tarefa" id="" rows="4"></textarea>

                <button type="submit">Enviar tarefa</button>

            
            </form>
        </div>

        <div class="tarefa">
            <?php
                $busca = "SELECT * FROM tarefas WHERE status_tarefa = 'PENDENTE'";

                $stmt_busca = $conexao->prepare($busca);
                $stmt_busca->execute();

                while ($tarefas = $stmt_busca->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class = 'div_tarefa'>";
                        echo"<div class = 'titulo'>{$tarefas['titulo_tarefa']}</div>";
                        echo"<div class = 'usuario'>{$tarefas['usuario_tarefa']}</div>";
                        echo"<div class = 'descricao'>{$tarefas['descricao_tarefa']}</div>";
                        echo"<div class = 'alterar'>";
                            echo"<form action='estatus_andamento.php'method='get'>";
                            //hidden é pra esconder o id, não aparecer na página
                                echo "<input type = 'hidden' name='id_tarefa' value='{$tarefas['id_tarefa']}'><button type = 'submit'>Andamento</button>";
                            echo"</form>";
                        echo"</div>";
                    echo "</div>";
                }
            ?>
        </div>

        <div class="tarefa">
            <?php
                $busca = "SELECT * FROM tarefas WHERE status_tarefa = 'ANDAMENTO'";

                $stmt_busca = $conexao->prepare($busca);
                $stmt_busca->execute();

                while ($tarefas = $stmt_busca->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class = 'div_tarefa'>";
                        echo"<div class = 'titulo'>{$tarefas['titulo_tarefa']}</div>";
                        echo"<div class = 'usuario'>{$tarefas['usuario_tarefa']}</div>";
                        echo"<div class = 'descricao'>{$tarefas['descricao_tarefa']}</div>";
                        echo"<div class = 'alterar'>";
                            echo"<form action='estatus_concluido.php'method='get'>";
                                echo "<input type = 'hidden' name='id_tarefa' value='{$tarefas['id_tarefa']}'><button type = 'submit'>Concluído</button>";
                            echo"</form>";
                        echo"</div>";
                    echo "</div>";
                }
            ?>
        </div>

        <div class="tarefa">
            <?php
                $busca = "SELECT * FROM tarefas WHERE status_tarefa = 'CONCLUIDO'";

                $stmt_busca = $conexao->prepare($busca);
                $stmt_busca->execute();

                while ($tarefas = $stmt_busca->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class = 'div_tarefa'>";
                        echo"<div class = 'titulo'>{$tarefas['titulo_tarefa']}</div>";
                        echo"<div class = 'usuario'>{$tarefas['usuario_tarefa']}</div>";
                        echo"<div class = 'descricao'>{$tarefas['descricao_tarefa']}</div>";
                        echo"<div class = 'alterar'>";
                            echo"<form action='estatus_excluido.php'method='get'>";
                                echo "<input type = 'hidden' name='id_tarefa' value='{$tarefas['id_tarefa']}'><button type = 'submit'>Excluir</button>";
                            echo"</form>";
                        echo"</div>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
</body>
</html>
