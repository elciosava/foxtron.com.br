<?php
include 'conexao.php';

    $reserva = "SELECT * FROM `reserva`";
    $stmtreserva = $conexao->prepare($reserva);
    $stmtreserva->execute();

    $sqlaluno = "SELECT * FROM `aluno`";
    $stmtaluno = $conexao->prepare($sqlaluno);
    $stmtaluno->execute();

    $sqlcomputador = "SELECT * FROM `computador`";
    $stmtcomputador = $conexao->prepare($sqlcomputador);
    $stmtcomputador->execute();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id_aluno = $_POST['id_aluno'];
        $id_computador = $_POST['id_computador'];

    $sql = "INSERT INTO reserva (id_aluno, id_computador)
    VALUES (:id_aluno, :id_computador)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam('id_aluno',$id_aluno);
    $stmt->bindParam('id_computador',$id_computador);

    if($stmt->execute()){
        header("location:reserva.php");
        exit;
    }else{
        echo "A conexão não procedeu. A tesoura comeu!!!";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva da Reserva</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #03d303ff 0%, #c4da02ff 50%, #0011ffff 100%);
            color: #fff;
        }

        .linha{
            border: solid 1px black;
            width: 200px;
        }

    </style>
</head>
<body>

    <header>
        <nav>
          <ul>

            <h2><li><a href="menu.php"button type="submit">Voltar</li></button></a></h2>

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
                    echo "<option value='{$computador['id']}'>{$computador['numero']} {$computador['processador']} {$computador['memoria']} {$computador['armazenamento']}</option>";
            }
            ?>
        </select>
        <button type="submit">Salvar</button>
    </form>
    <div class="container">
        <?php
        while($linha = $stmtreserva->fetch(PDO::FETCH_ASSOC)){
            echo "<div class='resultado'>";
            echo "<div class='linha'>{$linha['nome']}</div>
                  <div class='linha'>{$linha['numero']}</div>
                  <div class='linha'>{$linha['processador']}</div>
                  <div class='linha'>{$linha['memoria']}</div>
                  <div class='linha'>{$linha['armazenamento']}</div>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>