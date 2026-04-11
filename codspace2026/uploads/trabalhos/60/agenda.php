<?php

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

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        form {
            width: 350px;
        }

        input {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        textarea {
            width: 100%;
            resize: none;
        }

        #tarefas {
            display: grid;
            grid-template-columns: repeat(3,1fr);
            gap: 20px;
            width: 900px;
            padding-top: 40px;
        }

        .tarefas {
            width: 300px;
            background: pink;
            border: solid 1px red;
        }

        .card {
            background: white;
            margin-bottom: 5px;
            border-radius: 12px;
            padding: 15px;
        }

        .card p,h3{
            margin-bottom: 10px;
        }
        
        .bolinha_azul {
            width: 5px;
            height: 5px;
            background: red;
            border-radius: 50%;
        }

        .bolinha_amarela {
            width: 5px;
            height: 5px;
            background: yellow;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <section id="formulario">
        <form action="gravar_tarefas.php" method="post">	
            <label for="titulo">titulo</label> 
            <input type="text" name="titulo" id="">
                
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="" cols="40" rows="5"></textarea>

            <label for="data_inicio">Inicio</label>
            <input type="date" name="data_inicio" id="">

            <label for="data_final">Final</label>
            <input type="date" name="data_final" id="">

            <button type="submit">Salvar</button>
        </form>
    </section>

    <section id="tarefas">
        <div class="tarefa">
            <div class="bolinha_azul"></div>
            <h3>A fazer</h3>
            <?php
                include 'conexao.php';

                $sql = "SELECT * FROM agenda WHERE estatus = 'pendente'";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();

                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='titulo'><h3>{$linha['titulo']}</h3></div>";
                    echo "<div class='descricao'><p>{$linha['descricao']}</p></div>";

                    $data1 = date("d/m/Y", strotime($linha['data_inicial_agenda']));
                    $data2 = date("d/m/Y", strotime($linha['data_final_agenda']));

                    echo "<div class='datas'><p>$data1 até $data2</p></div>";
                }
            ?>
        </div>

        <div class="tarefa">
            <div class="bolinha_amarela"></div>
            <h3>Em execução</h3>
        </div>
        <div class="tarefa">
            <h3>Concluido</h3>
        </div>
    </section>
</body>
</html>