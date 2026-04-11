<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        header {
        background: #955c8e;
        height: 50px;
        padding: 5px 0 5px 0;
        width: 100vw;
}



        * {
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
            sizing: none;
        }
        #tarefas {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            width: 900px;
            padding-top: 40px;
        }
        .tarefas {
            height: 400px;
            background: pink;
            border: solid 1px red;
            padding: 15px;
        }

        .card {
            background: white;
            margin-bottom: 5px;
            border-radius: 12px;
            padding: 15px;
        }
        .card p, h3,{
            margin-bottom: 10px;

        }
    </style>
</head>
<body>
   <header>

   </header>

    <section id="tarefas">

        <div class="tarefas">
            <h3></div></h3>

   <?php 
         include 'conexao.php';

            $sql = "SELECT * FROM agenda WHERE estatus = 'pendente'";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            while($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='card'>";
                echo "<div class='titulo'><h3>{$linha['titulo']}</h3></div>";
                echo "<div class='descricao'><p>{$linha['descricao']}</p></div>";

                $data1 = date("d/m/Y" , strtotime($linha['data_inicio']));
                 $data2 = date("d/m/Y" , strtotime($linha['data_final']));

                echo "<div class='datas'><p>$data1 até  $data2</p></div>";
                echo "<div class='botoes'>";
                echo "<form method='get' action='update_andamento.php'>";
                echo "<input type='text' name='id' value='{$linha['id']}'>";
                echo "<button type='submit'>Andamento</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";

                
            }
        ?> 
        </div>        

        <div class="tarefas">
            <h3></div></h3>
            
   <?php 
         include 'conexao.php';

            $sql = "SELECT * FROM agenda WHERE estatus = 'andamento'";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            while($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='card'>";
                echo "<div class='titulo'><h3>{$linha['titulo']}</h3></div>";
                echo "<div class='descricao'><p>{$linha['descricao']}</p></div>";

                $data1 = date("d/m/Y" , strtotime($linha['data_inicio']));
                 $data2 = date("d/m/Y" , strtotime($linha['data_final']));

                echo "<div class'datas'><p>$data1 até  $data2</p></div>";
                echo "<div class='botoes'>";
                echo "<form method='get' action='update_concluido.php'>";
                echo "<input type='text' name='id' value='{$linha['id']}'>";
                echo "<button type='submit'>Concluido</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
            }
        ?> 
        </div>

        <div class="tarefas">
            <h3></div></h3>

               <?php 
         include 'conexao.php';

            $sql = "SELECT * FROM agenda WHERE estatus = 'danca'";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            while($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='card'>";
                echo "<div class='titulo'><h3>{$linha['titulo']}</h3></div>";
                echo "<div class='descricao'><p>{$linha['descricao']}</p></div>";

                $data1 = date("d/m/Y" , strtotime($linha['data_inicio']));
                 $data2 = date("d/m/Y" , strtotime($linha['data_final']));

                echo "<div class'datas'><p>$data1 até  $data2</p></div>";
                echo "<div class='botoes'>";
                echo "<form method='get' action='update_concluido.php'>";
                echo "<input type='text' name='id' value='{$linha['id']}'>";
                echo "<button type='submit'>Concluido</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
            }
        ?> 
        </div>

    </section>
</body>
</html>