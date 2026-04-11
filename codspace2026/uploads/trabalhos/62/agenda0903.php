<?php

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
            padding:0;
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
        }
        textarea{
            width: 100%;
            resize: none;
        }
        #tarefas{
            display: grid;
            grid-template-columns: repeat(3,1fr);
            gap: 20px;
            width: 700px;
            padding-top: 40px;
        }
        .tarefa {
            height: 300px;
            background: pink;
            border: solid 1px red;
            padding: 15px;
        }

        .card {
            background: white;
            margin-bottom: 3px;
            border-radius: 9px;
            padding: 15px;
        }

        .card p,h3{
              margin-bottom: 10;
        }

    </style>
</head>
<body>
    <section id="formulario">
        <form action="gravar_tarefa.php" method="post">

           <label for="titulo">Titulo</label>
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
            <h3>Pendente</h3>

            <?php

               include 'conexao.php';
            
               $sql = "SELECT * FROM agenda WHERE estatus = 'pendente'";
               $stmt = $conexao->prepare($sql);
               $stmt->execute();

               while($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                 echo "<div class='card'>";
                 echo "<div class='titulo'><h3>{$linha['titulo']}</h3></div>";
                 echo "<div class='descricao'><p>{$linha['descricao']}</p></div>";

                $data1 = date("d/m/Y", strtotime($linha['data_inicio']));
                $data2 = date("d/m/y", strtotime($linha['data_final']));

                 echo "<div class='datas'><p>$data1 até $data2</p></div>";
                 echo "</div>";
               }
            ?>
        </div>

        <div class="tarefa">
            <h3>Em execução</h3>
        </div>

        <div class="tarefa">
            <h3>Concluido</h3>
        </div>
    </section>
</body>
</html>
