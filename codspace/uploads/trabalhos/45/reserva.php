<?php
    include "conexao.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id_aluno = $_POST['id_aluno'];
        $id_computador = $_POST['id_computador'];

        $sql = "INSERT INTO reserva (id_aluno, id_computador)
              VALUES (:id_aluno, :id_computador)";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam('id_aluno' ,$id_aluno);
        $stmt->bindParam('id_computador' ,$id_computador);
    if ($stmt->execute())

        {
        header("location:reserva.php");
        exit;
    }else{
        echo "<p>deu certo</p>";
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
        * {
        margin: 0;
        padding: 0;

        }

        .resultado {
        margin: 2%;
        }

        .formulario {
        width: 800px;
        }

        body {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 100vh;
        }

        .volta {
            display: flex;
            background: #d8d8d8c4;
            border:5px solid #ffffffff;
            width: 45px;
        }

        form {
        width: 300px;
        }

        input, select {
        width: 100%;
        padding: 5px;
        font-size: 0.7rem;
        box-sizing: border-box;
        }

        .cabecalho {
        display: flex;
        padding: 0 20px;
        border:1px solid black;
        width: 1000px;
        }

        .cel_cabecalho {
        width: 250px;
        }

        .linha {
        display: flex;
        border: solid 1px black;
        padding: 5px 10px;
        }

    </style>
</head>
<body>
     <header>
        <h2>Reserva</h2>
    </header>

   <section>
    <div class="container">
     
        <form action="" method="post">
            <label for="numero">Aluno</label>
            <select name="id_aluno" id="">
                <?php
                    $sqlalunos = "SELECT * FROM `alunos`";
                    $stmtalunos = $conexao->prepare($sqlalunos);
                    $stmtalunos->execute();

                    while ($aluno = $stmtalunos->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$aluno['id']}'>{$aluno['aluno']}</option>";
                    }
                ?>
            </select>

            <label for="numero">Computador</label>
            <select name="id_computador" id="">
                <?php
                    $sqlcomputadores = "SELECT * FROM `computadores`";
                    $stmtcomputadores = $conexao->prepare($sqlcomputadores);
                    $stmtcomputadores->execute();

                    while ($computador = $stmtcomputadores->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$computador['id']}'>{$computador['numero']} {$computador['estado']} {$computador['modelo']}</option>";
                    }
                ?>
            </select>

            <button type="submit">Salva</button>  
        </form>
     
</div>
</section>
   
   <div class="resultado"> 
     <section class="reultado">
<?php
    include "conexao_php";

    $consulta = "SELECT r.id, a.aluno, c.numero, c.estado, c.modelo FROM reserva AS r INNER JOIN alunos AS a ON r.id_aluno = a.id INNER JOIN computadores AS c ON r.id_computador = c.id";
    $stmtconsulta = $conexao->prepare($consulta);
    $stmtconsulta->execute();

    if($stmtconsulta->rowCount()>0){
    echo "<div class='linha'>";    
        echo "<div class='cel_cabecalho'>ID</div>";
        echo "<div class='cel_cabecalho'>Nome</div>";
        echo "<div class='cel_cabecalho'>Numero</div>";
          echo "<div class='cel_cabecalho'>Estado</div>";
          echo "<div class='cel_cabecalho'>Modelo</div>";
    echo "</div>";

    while($linha = $stmtconsulta->fetch(PDO::FETCH_ASSOC)){
    echo "<div class='linha'>";
        echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
        echo "<div class='cel_cabecalho'>{$linha['aluno']}</div>";
        echo "<div class='cel_cabecalho'>{$linha['numero']}</div>";
        echo "<div class='cel_cabecalho'>{$linha['estado']}</div>";
        echo "<div class='cel_cabecalho'>{$linha['modelo']}</div>";
        echo "</div>";
      }
    } else {
        echo "<p>Não há registros.</p>";
    }
    
?>
           <div class="volta">
            <a href="menu_para_reserva.php" class="tamanho">Volta</a>
        </div>
     </section>
   </div>
</body>
</html>