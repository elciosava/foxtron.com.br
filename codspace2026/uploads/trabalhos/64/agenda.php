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
            margin-bottom: 10px;
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
            padding-top:40px;
        }

        .tarefa {
            height: 500px;
            width: 300px;
            background: #90d5ff;
            border: solid 1px #000;
            padding: 15px;
        }

        .card {
            background:white;
            margin-bottom: 5px;
            border-radius: 12px;
            padding: 15px;
        }

        .card p{
            margin-bottom: 10px;

        }

        .bolinha_vermelha {
            width: 5px;
            height: 5px;
            background: red;
            border-radius: 50%;
            margin-right: 10px;
        }

        .bolinha_amarela {
            width: 5px;
            height: 5px;
            background: yellow;
            border-radius: 50%;
            margin-right: 10px;
        }
        
        .bolinha_verde {
            width: 5px;
            height: 5px;
            background: green;
            border-radius: 50%;
            margin-right: 10px;
        }

        .borda_vermelha {
            border-bottom: 3px solid red;
             margin-bottom: 10px;
        }

        .borda_amarela {
            border-bottom: 3px solid yellow;
            margin-bottom: 10px;
        }

        .borda_verde {
            border-bottom:3px solid green;
             margin-bottom: 10px;
        }

        .titulo {
            display: flex;
           align-items: center;
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
            <div class="titulo borda_vermelha">
                <div class="bolinha_vermelha"></div>
            <h3>A fazer</h3>
            </div>

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
                    $data2 = date("d/m/Y", strtotime($linha['data_final']));

                    echo "<div class='datas'><p>$data1 até $data2</p></div>";
                        echo "<div class='botoes'>";
                            echo "<form method='get' action='update_andamento.php'>";
                            echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                            echo "<button type='submit'>Andamento</button>";
                            echo "</form>";
                        echo"</div>";
                    echo "</div>";

                }
            ?>
        </div>
        
        <div class="tarefa">
            <div class="titulo borda_amarela">

                <div class="bolinha_amarela"></div>
                <h3>Em execução</h3>
            </div>

             <?php
                include 'conexao.php';

                $sql = "SELECT * FROM agenda WHERE estatus = 'andamento'";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();

                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='card'>";
                    echo "<div class='titulo'><h3>{$linha['titulo']}</h3></div>";
                    echo "<div class='descricao'><p>{$linha['descricao']}</p></div>";
                    

                    $data1 = date("d/m/Y", strtotime($linha['data_inicio']));
                    $data2 = date("d/m/Y", strtotime($linha['data_final']));

                    echo "<div class='datas'><p>$data1 até $data2</p></div>";
                        echo "<div class='botoes'>";
                            echo "<form method='get' action='update_concluido.php'>";
                            echo "<input type='haidden' name='id' value='{$linha['id']}'>";
                            echo "<button type='submit'>concluido</button>";
                            echo "</form>";
                        echo"</div>";
                    echo "</div>";

                }
            ?>
        </div>
        <div class="tarefa">
            <div class="titulo borda_verde">

                <div class="bolinha_verde"></div>
                <h3>Concluído</h3>
            </div>

             <?php
                include 'conexao.php';

                $sql = "SELECT * FROM agenda WHERE estatus = 'concluido'";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();

                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='card'>";
                    echo "<div class='titulo'><h3>{$linha['titulo']}</h3></div>";
                    echo "<div class='descricao'><p>{$linha['descricao']}</p></div>";
                    

                    $data1 = date("d/m/Y", strtotime($linha['data_inicio']));
                    $data2 = date("d/m/Y", strtotime($linha['data_final']));

                    echo "<div class='datas'><p>$data1 até $data2</p></div>";
                        echo "<div class='botoes'>";
                            echo "<form method='get' action='update_andamento.php'>";
                            echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                            echo "<button type='submit'>concluido</button>";
                            echo "</form>";
                        echo"</div>";
                    echo "</div>";

                }
            ?>
        </div>
    </section>
    
</body>
</html>