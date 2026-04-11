<?php
    include 'conexao.php';


    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_Aluno = $_POST['id_aluno'];
     $id_computador = $_POST['id_computador'];
  
     


      $sql ="INSERT INTO reserva (id_aluno, id_computador)
      VALUES (:id_aluno, :id_computador)";

      $stmt = $conexao->prepare($sql);
      $stmt->bindparam(':id_aluno', $id_Aluno);
        $stmt->bindparam(':id_computador', $id_computador);

      if ($stmt->execute()){                        
        header("Location:reserva.php");
        exit;
      }else{
        echo "nao deu boa";
      }
     }


    

    $sql = "SELECT * FROM reserva";

           $stmt = $conexao->prepare($sql);
           $stmt->execute();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
     
</head>
<body>
            <header>
        <nav>
            <ul>
                <li><a href="computador.php">computador</a></li>
                <li><a href="reserva.php">reserva</a></li>
                <li><a href="aluno.php">aluno</a></li>
            </ul>
        </nav>
    <header>
 
    <section class="inicio">    
      <form action="" method="post">
        <label for="nome">aluno</label>
        <select name="id_aluno" id="">
        <?php
            $sqlaluno = "SELECT * FROM `aluno`";
            $stmtaluno = $conexao->prepare($sqlaluno);
            $stmtaluno->execute();

              while ($aluno = $stmtaluno->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$aluno['id']}'>{$aluno['nome']}</option>";
                    }
            
          ?>
        </select>
          
            <label for="horario">computador</label>       
          <select name="id_computador" id="">
        <?php
            $sqlcomputador = "SELECT * FROM `computador`";
            $stmtcomputador = $conexao->prepare($sqlcomputador);
            $stmtcomputador->execute();

              while ($computador = $stmtcomputador->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$computador['id']}'>{$computador['nome']}</option>";
                    }
            
          ?>
        </select>
          
        <button type="submit">salvar</button>



       
      </form>
    </section>
    <div>
       <?php
            include "conexao.php";

            $consulta = "SELECT r.id, a.nome, c.numero FROM reserva AS r
        INNER JOIN aluno AS a ON r.id_aluno = a.id
        INNER JOIN computador AS c ON r.id_computador = c.id";
        $stmtreserva = $conexao->prepare($consulta);
        $stmtreserva->execute();


            if($stmtreserva->rowCount()>0){
                echo "<div class='cabecalho'>";
                    echo "<div class='cel_cabecalho'>ID</div>";
                    echo "<div class='cel_cabecalho'>Produto</div>";
                    echo "<div class='cel_cabecalho'>Quantidade</div>";
                    echo "<div class='cel_cabecalho'>Valor</div>";
                    echo "<div class='cel_cabecalho'>Ações</div>";
                echo "</div>";
    

            while($linha = $stmtreserva->fetch(PDO::FETCH_ASSOC)){
                echo "<div class='linha'>";
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['quantidade']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['valor']}</div>";

                       

            }
            }else {
                echo "<p>nao ha registro.</p>";
            }
            ?>
    </div>
</body>
</html>