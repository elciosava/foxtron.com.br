<?php
 include 'conexao.php';

 if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $dia = $_POST['dia'];
    $horario = $_POST['horario'];

    $sql = "INSERT INTO agendamentos(nome,dia,horario)
             VALUES (:nome, :dia, :horario)";

    $stmt=$conexao->prepare($sql);
    $stmt->bindParam(':nome',$nome); 
    $stmt->bindParam(':dia',$dia);  
    $stmt->bindParam(':horario', $horario);
    
    if($stmt->execute()){
        header("location:cadastro_agendamentos.php");
        exit;
    }else {
        echo "não deu certo!!";
    }
 }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body {
            display:  flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

        }

        header {
            height:60px;
        }

        li{
            list-style: none;
            padding: 10px;
            margin-left: 10px;
            background: #9cbafaff;
            margin-top: 2px;
        }

        li:hover {
            background: #baf5d1ff;
            color: #fff;
        }

        a {
            color: #000;
            text-decoration: none;
        }

        form {
            width: 450px;
        }

        input, select {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 2px;
        }

       .cabecalho {
        display: flex;
        padding: 5px 10px;
        border: 1px solid black;
        width: 750px;
       }
       .cel_cabecalho {
        width: 150px;
       }
       .linha {
        display:flex;
        padding: 5px 10px;
        width: 750px;
        border: 1px solid black;
       }
       .resiltado {
        
       }
   </style>
</head>
<body>
<header>

</header>

<section>

       
            <form action="" method="post">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="">

                <label for="dia">Dia</label>
                <select name="dia" id="">
    <option value="segunda">Segunda</option>
    <option value="terça">Terça</option>
    <option value="quarta">Quarta</option>
    <option value="quinta">Quinta</option>
    <option value="sexta">Sexta</option>
    <option value="sabado">Sabado</option>

</select>

                <label for="horario">Horario</label>
                <input type="time" name="horario" id="">

                <button type="submit">Salvar</button>
           </form> 
    </section>
    <section class="resultado">
         <?php
            include "conexao.php";

            $sql = "SELECT * FROM agendamentos";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "<div class='cabecalho'>";
                echo "<div class='cel_cabecalho'>id</div>";
                echo "<div class='cel_cabecalho'>nome</div>";
                echo "<div class='cel_cabecalho'>dia</div>";
                echo "<div class='cel_cabecalho'>horario</div>";
                echo "<div class='cel_cabecalho'>Ações</div>";
                echo "</div>";


                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='linha'>";
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['dia']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['horario']}</div>";

                    echo "<div class='cel_cabecalho'>";

                    echo "<form action='editar_agendamentos.php' method='get' style='display:incline;'>";
                    echo "<input type='hidden' name='id'value='{$linha['id']}'>";
                    echo "<button type='submit'>Editar</button>";
                    echo "</form>";

                    echo "<form action='deletar_agendamentos.php' method='post' style='display:inline;
                    'onsubmit=\"return confirm('Deseja realmente deletar este agendamentos?');\">";
                    echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                    echo "<button type='submit'>Deletar</button>";
                    echo "</form>";

                    echo "</div>";

                    echo "</div>";
                }
            }else {
                echo "<p>Não há registros.</p>";
            }
            ?>
</section>
</body>
</html>