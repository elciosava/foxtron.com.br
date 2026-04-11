<?php
   include 'conexao.php';
    
   $reserva = "SELECT r.id, a.nome, c.numero, c.processador, c.memoria FROM reserva AS r
   INNER JOIN aluno AS a ON r.id_aluno = a.id
   INNER JOIN computador AS c ON r.id_computador = c.id";

    $stmtreserva = $conexao->prepare($reserva);
    $stmtreserva->execute();


    $sqlaluno = "SELECT * FROM `aluno`";
    $stmtaluno = $conexao->prepare($sqlaluno);
    $stmtaluno->execute();
        
    $sqlcomputador = "SELECT * FROM `computador`";
    $stmtcomputador = $conexao->prepare($sqlcomputador);
    $stmtcomputador->execute();

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_aluno = $_POST['id_aluno'];
    $id_computador = $_POST['id_computador'];
    

    $sql = "INSERT INTO reserva (id_aluno, id_computador)
    Values (:id_aluno, :id_computador)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_aluno',$id_aluno);
    $stmt->bindParam(':id_computador',$id_computador);
    
    
    if ($stmt->execute()){
     header("location:reserva.php");
     exit;
    }else{
        echo"Não Deu Boa!!"; 
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
 .resultado, body{
        display: flex;
        justify-content: center;
        align-items: center;
        width:500px;
    }

    .linha{
     border: solid 1px black;
     width:200px;
    }

  
  

    
</style>


</head>
<body>
    <header>
        <nav>
            <ul>
                <a href="menu.php"><button type="submit">Voltar</button></a>
                
                
            </ul>
        </nav>
    </header>
     <section>
        <div class="form">
            <form action="" method="post">
                <label for="aluno">Aluno</label>
                <select name="id_aluno" id="">
                    <?php 
                        while ($alunos = $stmtaluno->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$alunos['id']}'>{$alunos['nome']}</option>";
                        }
                    ?>
                </select>
                <label for="computador">Computador</label>
                <select name="id_computador" id="">
                    <?php 
                        while ($computador = $stmtcomputador->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$computador['id']}'>{$computador['numero']} {$computador['processador']} {$computador['memoria']}</option>";
                        }
                    ?>
                </select>
                <button type="submit">Salvar</button>
            </form>
        </div>
        <div class="container">
            <?php
               while($linha = $stmtreserva->fetch(PDO::FETCH_ASSOC)){
                  echo "<div class='resultado'>";
                  echo "<div class='linha'>{$linha['nome']}</div>
                        <div class='linha'>{$linha['numero']}</div>
                        <div class='linha'>{$linha['processador']}</div>
                        <div class='linha'>{$linha['memoria']}</div>";
                  echo "</div>";
               }
            ?>
        </div>
     </section>
</body>
</html>