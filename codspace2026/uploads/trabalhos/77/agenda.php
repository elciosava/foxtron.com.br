<?php



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGENDA</title>

    <style>
        *{
            margin:0;
            padding:0;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin:40px;
            background: #ffffff;
        }
        form{
            width: 350px;
        }
        input{
            width: 100%;
            box-sizing: border-box;
            margin: 5px 0 10px 0;
            background: #ffffff;
            padding: 1.5px 0 1.5px 5px;
            border-radius: 10px;

        }
        textarea{
            width: 100%;
            resize: none;
            background: #ffffff;

        }
        #tarefas {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding-top:40px;
        }
        .tarefa {
            height:600px;
            background: #cdcacc;
            border-radius: 6px;
            padding:10px;  
        }

        #formulario{
            color: white;
            background: #000000;;
            padding:30px;
            border-radius:10px;
        }

        button{
            width:100%;
            padding:5px;
            background: white;
            border:none;
            color: #f98ac3;
            font-size:16px;
            border-radius:8px;
            cursor:pointer;
        }

        .card {
            background: #858585;
            color: #000000;
            border-radius: 12px;
            padding: 10px;
            width: 350px;
        }
        .card p {
            margin-bottom: 10px;
        }
        .bolinha_azul{
            width: 5px;
            height: 5px;
            background: red;
            border-radius: 50%;
            margin-right:10px;
        }
        .bolinha_amarela{
            width: 5px;
            height: 5px;
            background: #c7a50e;
            border-radius: 50%;
            margin-right:10px;
        }
        .bolinha_verde{
            width: 5px;
            height: 5px;
            background: green;
            border-radius: 50%;
            margin-right:10px;
        }
        .titulos{
            display:flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .borda_vermelha{
            border-bottom: 3px solid red;
        }
        .borda_verde{
           border-bottom: 3px solid green;
        }
        .borda_amarela{
            border-bottom: 3px solid #c7a50e;
        }

        
    </style>     
</head>
<body>
    <section id="formulario">
        <form action="gravar_tarefa.php" method="post">
                        
    <label for="titulo">Título</label>
    <input type="text" name="titulo" id=""><br>

    <label for="descricao">Descrição</label>
    <textarea name="descricao" id="" cols=40 rows="5"></textarea><br>
    
    <label for="data_inicio">Ínicio</label>
    <input type="date" name="data_inicio" id=""><br>

    <label for="data_final">Final</label>
    <input type="date" name="data_final" id=""><br>
    
    <button type="submit">Salvar</button>

        </form>
    </section>
     <section id="tarefas">

        <div class="tarefa">
            <div class="titulos borda_vermelha">
                <div class="bolinha_azul"></div>
                <h3 class="titulo_card">A fazer</h3>
            </div>

            <?php
                include 'conexao.php';

                $sql = "SELECT * FROM agenda WHERE estatus = 'pendente'";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();

                while($linha = $stmt->fetch (PDO::FETCH_ASSOC)) {
                    echo "<div class='card'>";
                    echo "<div class='titulo'><h3>{$linha['titulo']}</h3></div>";
                    echo "<div class='descricao'><p>{$linha['descricao']}</p></div>";

                    $data1 = date("d/m/Y", strtotime($linha['data_inicio']));
                    $data2 = date("d/m/Y", strtotime($linha['data_final']));

                    echo "<div class='datas'><p>$data1 até $data2</p></div>";
                    echo "<div class='botoes'>";
                        echo "<form method='get' action='update_andamento.php'>";
                        echo "<input type='hidden' name='id'value='{$linha['id']}'>";
                        echo "<button type='submit'>Andamento</button>";
                        echo "</form>";
                     echo "</div>";
                    echo "</div>";

                    
                }
            ?>
        </div>

        <div class="tarefa">
            <div class="titulos borda_amarela">
                <div class="bolinha_amarela"></div>
                <h3 class="titulo_card">Em execução</h3>
            </div>

            <?php
                include 'conexao.php';

                $sql = "SELECT * FROM agenda WHERE estatus = 'andamento'";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();

                while($linha = $stmt->fetch (PDO::FETCH_ASSOC)) {
                    echo "<div class='card'>";
                    echo "<div class='titulo'><h3>{$linha['titulo']}</h3></div>";
                    echo "<div class='descricao'><p>{$linha['descricao']}</p></div>";

                    $data1 = date("d/m/Y", strtotime($linha['data_inicio']));
                    $data2 = date("d/m/Y", strtotime($linha['data_final']));

                    echo "<div class='datas'><p>$data1 até $data2</p></div>";
                    echo "<div class='botoes'>";
                        echo "<form method='get' action='update_concluido.php'>";
                        echo "<input type='hidden' name='id'value='{$linha['id']}'>";
                        echo "<button type='submit'>Concluido</button>";
                        echo "</form>";
                     echo "</div>";
                    echo "</div>";
                    
                }
            ?>
        </div>

        <div class="tarefa">
            <div class="titulos borda_verde">
                <div class="bolinha_verde"></div>
                <h3 class="titulo_card">Concluido</h3>
            </div>

            <?php
                include 'conexao.php';

                $sql = "SELECT * FROM agenda WHERE estatus = 'concluido'";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();

                while($linha = $stmt->fetch (PDO::FETCH_ASSOC)) {
                    echo "<div class='card'>";
                    echo "<div class='titulo'><h3>{$linha['titulo']}</h3></div>";
                    echo "<div class='descricao'><p>{$linha['descricao']}</p></div>";

                    $data1 = date("d/m/Y", strtotime($linha['data_inicio']));
                    $data2 = date("d/m/Y", strtotime($linha['data_final']));

                    echo "<div class='datas'><p>$data1 até $data2</p></div>";
                  
                    echo "</div>";
                    
                }
            ?>
        </div>
       
      </section>  
    
    
</body>
</html>
