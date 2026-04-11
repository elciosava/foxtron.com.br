<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <style>
         * {
            margin: 0;
            padding:0;
         }
          body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
          }

         form{
            width: 350px;
         }

         input {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 20px;
         }
         textarea {
            width:100%;
            resize: none;
         }

         #tarefas {
            display:grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            width: 900px;
            padding-top: 40px;
         }

         .tarefa{
            height: 300px;
            background: pink;
            border: solid 1px red;
            padding: 15px;
         }
         .card {
            background: white;
            padding: 15px;
            margin-bottom: 5px;
            border-radius
         }

         .card p, h3,{
            margin-bottom:10px
         }
    </style>
</head>
<body>
   <section>
    <form action="gravar_tarefa.php" method="post">
        
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" id="">

        <label for="descricao">descricao</label>
        <textarea name="descricao" id="" cols="40" rows="5"></textarea>

        <label for="data_inicio">data_inicio</label>
        <input type="date" name="data_inicio" id="">

        <label for="" data_final>data_final</label>
        <input type="date" name="data_final" id="">

        <button tape= "submit">salvar</button>



    </form>
   </section>    

   <section id="tarefas">
    
       <div class="tarefa">
        <h3>A fazer</h3>

        <?php
           include 'conexao.php';

           $sql = "SELECT * FROM agenda WHERE estatus = 'andamento'";
           $stmt = $conexao->prepare($sql);
           $stmt->execute();

           while($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {

            echo "<div class='card'>";
            echo "<div class='titulo'><h3>{$linha['titulo']}</h3></div>";
            echo "<div class='descricao'><p>{$linha['descricao']}</p></div>";

            $data1 = date("d,m,Y", strtotime($linha['data_inicio']));
             $data2 = date("d,m,Y", strtotime($linha['data_final']));
            
            echo "<div class='datas'><p>$data1 ate $data2</p></div>";
           echo "<div class= 'botes'>";
                echo "<form method= 'get' action='update_andamento.php'>";
                echo "<input type= 'text' name='id' value='{$linha['id']}'>";
                echo "<button type='submit'>Andamneto</button>";
                echo "</form>";
                echo "</div>";
                 echo "</div>";

                  $data1 = date("d,m,Y", strtotime($linha['data_inicio']));
             $data2 = date("d,m,Y", strtotime($linha['data_final']));
            
            echo "<div class='datas'><p>$data1 ate $data2</p></div>";
           echo "<div class= 'botes'>";
                echo "<form method= 'get' action='update_concluido.php'>";
                echo "<input type= 'test' name='id' value='{$linha['id']}'>";
                echo "<button type='submit'>Concluido</button>";
                echo "</form>";
                echo "</div>";
                 echo "</div>";

            echo "<div class= 'botes'>";
                echo "<form method= 'get' action='update_andamento.php>";
                echo "<input type= 'test' name='id'>";
                echo "<button type='submit'>Andamneto</button>";
                echo "</form>";

           }
           ?>
       </div>

       <div class="tarefa">
        <h3>Em execucao</h3>
        </div>

       <div class="tarefa">
        <h3>Concluido</h3>
       </div>
      
   </section>
</body>
</html>