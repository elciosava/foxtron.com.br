<?php
include 'conexao.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome = $_POST['nome'];
        $horario = $_POST['horario'];
        $dia = $_POST['dia'];

        $insert = "INSERT INTO consulta (horario,nome, dia)
         VALUES ( :horario, :nome,:dia)";
         $stmt = $conexao->prepare($insert);
         $stmt->bindParam('horario', $horario);
         $stmt->bindParam('nome', $nome);
         $stmt->bindParam('dia', $dia);

         if ( $stmt->execute()){
             header("Location: aula101125.php");
             exit;
         }else{ 
         $mensagem = "não deu coisa...";
    
    }
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
            margin: 0;
            padding: 0;
        }

        .container{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .linha{
            border: solid 1px black;
            width: 200px;
        }

        .resultado{
            width: 250px;
        }
    </style>
</head>
<body>
    <section>
        <div class="container">
            <form action="" method="post">
                <label for="nome">Nome</label>
                <input type="text"name="nome" id=**>

                <label for="data">Data</label>
                <select name="dia" id="">
                    <option value="segunda">Segunda</option>
                    <option value="terça">Terça</option>
                    <option value="quarta">Quarta</option>
                    <option value="quinta">Quinta</option>
                    <option value="sexta">Sexta</option>
                    <option value="sábado">Sábado</option>



                </select>

                <label for="horario">Horário</label>
                <input type="time" name="horario" id="">

                <button type="submit">salvar</button>

                
            </form>
            

        </div>
    </section>
    <section>
        <div class="container">
            <?php
            
     $sql = "SELECT * FROM consulta ";

             $stmt = $conexao->prepare($sql);
             $stmt->execute();


                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='resultado'>";
                    echo "<div class='linha'>{$linha['horario']}</div>
                          <div class='linha'>{$linha['nome']}</div>
                          <div class='linha'>{$linha['dia']}</div>";
                    echo "</div>";
                }
           ?>
        
</div>
</section>
</body>
</html>