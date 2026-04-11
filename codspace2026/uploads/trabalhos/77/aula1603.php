<?php

   include 'conexao.php';

                $sql = "SELECT * FROM agenda_eventos";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de evento</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body{
            background: #8338EC;
            min-height: 100vh;
            display:flex;
            flex-direction: column;
            justify-content:flex-start;
            align-items:center;
            margin:0;
            padding-top:40px;
        }

        .container{
            background: #fff;
            padding:30px;
            border-radius:10px;
            width:350px;
            box-shadow:0 10px 25px rgba(0,0,0,0.2);
        }

        form{
            display:flex;
            flex-direction:column;
        }

        label{
            margin-top:10px;
            font-weight:bold;
        }

        input{
            padding:8px;
            margin-top:5px;
            border-radius:5px;
            border:1px solid #ccc;
            font-size:14px;
        }

        input:focus{
            outline:none;
            border:3px solid #3A86FF;
        }

        button{
            margin-top:20px;
            padding:10px;
            border:none;
            border-radius:5px;
            background: #FF006E;
            color:white;
            font-size:16px;
            cursor:pointer;
        }

        button:hover{
            background: #ff4696;
        }

        .card {
            background: #ffffff;
            color: #000000;
            border-radius: 12px;
            padding: 10px;
            width: 350px;
            margin: 10px 0 10px 0;
            border: 2px solid pink;
        }
        .card p {
            margin-bottom: 10px;
        }
        #eventos{
            margin-top:20px;
            background: #ffffff;
            border-radius: 12px;
            padding: 25px;      
        }  
        .bolinha_rosa{
            width: 5px;
            height: 5px;
            background: pink;
            border-radius: 50%;
            margin-right:10px;
        }
        .borda_rosa{
            border-bottom: 3px solid pink;
        }

        .titulos{
            display:flex;
            align-items: center;
            margin-bottom: 10px;
        }
        
        
    </style>
</head>
<body>
    <div class="container">
        <form action="gravar_evento.php" method="post">

            <label for="titulo">Titulo do evento:</label>
            <input type="text" name="titulo">

            <label for="descricao">Local do evento:</label>
            <input type="text" name="descricao">

            <label for="data_evento">Data do evento:</label>   
            <input type="date" name="data_evento" id="">

            <label for="horario_evento">Horario do evento:</label>
            <input type="time" name="horario_evento" id="">

            <button type="submit">Salvar</button>

        </form>
    </div>

    <section id="eventos">

        <div class="evento">
            <div class="titulos borda_rosa">
                <div class="bolinha_rosa"></div>
                <h3 class="titulo_card">Eventos marcados</h3>
            </div>

            <?php
                include 'conexao.php';

                $sql = "SELECT * FROM agenda_eventos";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();

                while($linha = $stmt->fetch (PDO::FETCH_ASSOC)) {
                    echo "<div class='card'>";
                    echo "<div class='titulo'><h3>{$linha['titulo']}</h3></div>";
                    echo "<div class='descricao'><p>{$linha['descricao']}</p></div>";
                    echo "<div class='horario_evento'><p>{$linha['horario_evento']}</p></div>";
                    $data = date("d/m/Y", strtotime($linha['data_evento']));
                    echo "<div class='datas'><p>$data</p></div>";
                    echo "</div>";
                    
                }
            ?>
        </div>

</body>
</html>
