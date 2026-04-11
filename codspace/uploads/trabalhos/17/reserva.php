<?php
    include 'conexao.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id_aluno = $_POST['id_aluno'];
        $id_computador = $_POST['id_computador'];


        $sql = "INSERT INTO reserva (id_aluno, id_computador)
                VALUES (:id_aluno, :id_computador)";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id_aluno', $id_aluno);
        $stmt->bindParam(':id_computador', $id_computador);

        if ($stmt->execute()){
            header("Location:reserva.php");
            exit;
        }else{
            echo "não deu boa!";
        }
    }



        $sqlaluno = "SELECT * FROM aluno";
        $stmtaluno = $conexao->prepare($sqlaluno);
        $stmtaluno->execute();
        
        $sqlcomputador = "SELECT * FROM computador";
        $stmtcomputador = $conexao->prepare($sqlcomputador);
        $stmtcomputador->execute();

             
    
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
        .cabecalho{
            display:flex;
            padding: 5px 10px;
            border: 1px solid black;
            width: 600px;
        }
        .cel_cabecalho {
            width: 100px;
        }
        .linha {
            display: flex;
            border: solid 1px black;
            padding: 5px 10px;
            
            width: 600px;
        }

    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="aluno.php">Aluno</a></li>
                <li><a href="computador.php">Computadores</a></li>
                <li><a href="reserva.php">Reserva</a></li>
            </ul>    
        </nav>    
    </header>
    
   <form action="" method="post">
    <label for="aluno">Aluno</label>
    <select name="id_aluno" id="">
        <?php
            while($aluno = $stmtaluno->fetch(PDO::FETCH_ASSOC)){
                echo "<option value='{$aluno['id']}'>{$aluno['nome']}</option>";

            }
            
        ?>
    </select>
    <label for="computador">Computador</label>
    <select name="id_computador" id="">
        <?php
            while($computador = $stmtcomputador->fetch(PDO::FETCH_ASSOC)){
                echo "<option value='{$computador['id']}'>{$computador['numero']} {$computador['processador']} {$computador['memoria']} {$computador['configuracao']} {$computador['armazenamento']}</option>";
            }
        ?>
    </select>
    <button type="submit">Enviar</button>
    </form>

    <div class="resultado">
            <?php
                include "conexao.php";

                $consulta = "SELECT r.id, a.nome, c.numero, c.processador, c.memoria FROM reserva AS r
                INNER JOIN aluno AS a ON r.id_aluno = a.id
                INNER JOIN computador AS c ON r.id_computador = c.id";

                $stmtconsulta = $conexao->prepare($consulta);
                $stmtconsulta->execute();

                if($stmtconsulta->rowCount()>0){
                    echo "<div class='cabecalho'>";
                        echo "<div class='cel_cabecalho'>ID</div>";
                        echo "<div class='cel_cabecalho'>Aluno</div>";
                        echo "<div class='cel_cabecalho'>Numero</div>";
                        echo "<div class='cel_cabecalho'>Processador</div>";
                        echo "<div class='cel_cabecalho'>Memoria</div>";
                        echo "<div class='cel_cabecalho'>Ações</div>";
                    echo "</div>";
                        
                while($linha = $stmtconsulta->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='linha'>";
                        echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                        echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                        echo "<div class='cel_cabecalho'>{$linha['numero']}</div>";
                        echo "<div class='cel_cabecalho'>{$linha['processador']}</div>";
                        echo "<div class='cel_cabecalho'>{$linha['memoria']}</div>";

                        echo "<div class='cel_cabeclho'>";

                        echo "<form action='editar_produto.php' method='get' style='display:inline;' onsubmit=\"return confirm('Deseja realmente deletar este produto?');\">";
                        echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                        echo "<button type='submit'>Editar</button>";
                        echo "</form>";

                        echo "<form action='deletar_produto.php' method='post' style='display:inline;'>";
                        echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                        echo "<button type='submit'>Deletar</button>";
                        echo "</form>";

                        echo "</div>";

                        echo "</div>";
                    
                }         
            }  else {
                echo "<p>Não há registros.</p>";
            }
            ?>
        </div>
</body>
</html>