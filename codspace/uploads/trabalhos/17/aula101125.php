<?php
include 'conexao.php';


            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $nome = $_POST['nome'];
                $dia = $_POST['dia'];
                $horario = $_POST['horario'];
                               
                $insert = "INSERT INTO consulta (nome, dia, horario)
                            VALUES (:nome, :dia, :horario)";

                $stmt = $conexao->prepare($insert);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':dia', $dia);
                $stmt->bindParam(':horario', $horario);
                               
            if ( $stmt->execute()){
               header("Location: aula101125.php");
               exit;
            } else {
                $mensagem = "Não deu coisa...";
            }
        }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">

            <label for="nome">Nome</label>
            <input type="text" name="nome" id="">

            <label for="dia">Dia</label>
            <input type="date" name="dia" id="">

            <label for="horario">Horário</label>
            <input type="time" name="horario" id="">

            <button type="submit">Enviar</button>
    </form>
    <section class="resultados">
        <div class="resultado">
            <?php
                include "conexao.php";

                $sql = "SELECT * FROM consulta";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();

                if($stmt->rowCount()>0){
                    echo "<div class='cabecalho'>";
                        echo "<div class='cel_cabecalho'>nome</div>";
                        echo "<div class='cel_cabecalho'>dia</div>";
                        echo "<div class='cel_cabecalho'>horario</div>";
                    echo "</div>";
                        
                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='linha'>";
                        echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                        echo "<div class='cel_cabecalho'>{$linha['dia']}</div>";
                        echo "<div class='cel_cabecalho'>{$linha['horario']}</div>";
                        echo "<div class='cel_cabecalho'>";

                        echo "</div>";

                        echo "<form action='editar_produto.php' method='get' style='display:inline;' onsubmit=\"return confirm('Deseja realmente deletar este produto?');\">";
                        echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                        echo "<button type='submit'>Editar</button>";
                        echo "</form>";

                        echo "<form action='deletar_produto.php' method='post' style='display:inline;'>";
                        echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                        echo "<button type='submit'>Deletar</button>";
                        echo "</form>";

                        echo "</div>";
                    
                }         
            }else {
                echo "<p>Não há registros.</p>";
            }
            ?>
        </div>
    </section>
</body>
</html>