<?php
    include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_alunos = $_POST['id_alunos'];
    $id_computadores = $_POST['id_computadores'];

    $sql = "INSERT INTO reservas (id_alunos, id_computadores) VALUES (:id_alunos, :id_computadores)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_alunos', $id_alunos);
    $stmt->bindParam(':id_computadores', $id_computadores);
     
    if ($stmt->execute()) {
        header("Location:cadastro_reserva.php");
        exit;
    } else {
        echo "não deu certo!!";
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
            padding: 0;
            margin: 0;
        }

        form {
            width: 350px;
        }
        h2 {
            text-align: center;
            color: rgba(50, 168, 85, 0.47);
            margin-bottom: 20px;
            font-size: 1.8rem;
        }

        body {
            background: linear-gradient(to right, rgba(4, 73, 13, 1), rgba(93, 110, 96, 1));
            font-family: Verdana;
            flex-direction: column;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        input,select {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 5px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-box {
            background-color: rgba(255, 255, 255, 0.83);
            border: 3px solid rgba(50, 168, 85, 0.47);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 20px;
        }

        button {
            background-color: rgba(50, 168, 85, 0.47);
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
            margin-top: 2px;
        }
        button:hover {
            background-color: rgba(110, 192, 117, 1);
        }
        .cabecalho {
            display: flex;
            padding: 0 20px;
            border: 1px solid black;
            width: 1310px;
        }

        .cel_cabecalho {
            width: 180px;
            margin: 5px;
        }

        .linha {
            display: flex;
            border: solid 1px black;
            padding: 5px 10px;
        }

        .resultado {
            margin-top: 20px;
        }
         header {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        li {
            margin: 0 10px;
            width: 150px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
       
    </style>
</head>
<body>
     <header>
        <nav>
            <ul>         
                <li><a href="cadastro_aluno.php"><button>Alunos</button></a></li>
                <li><a href="cadastro_pc.php"><button>Computadores</button></a></li>
            </ul>
        </nav>
    </header>
     <div class="container">
            <div class="form-box">
                <h2>Reservas</h2>
                <form action="" method="post">
                    <label for="id_alunos">Alunos:</label>
                    <select name="id_alunos" id="">
                    <?php
                       $sqlalunos = "SELECT * FROM `alunos`";
                       $stmtalunos = $conexao->prepare($sqlalunos);
                       $stmtalunos->execute();

                        while($alunos = $stmtalunos->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$alunos['id']}'>{$alunos['nome']}</option>";
                        }
                    ?>
                    </select>
                    
                    <label for="id_computadores">Computadores:</label>
                    <select name="id_computadores" id="">
                    <?php
                       $sqlcomputadores = "SELECT * FROM `computadores`";
                       $stmtcomputadores = $conexao->prepare($sqlcomputadores);
                       $stmtcomputadores->execute();

                       while($computadores = $stmtcomputadores->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$computadores['id']}'>{$computadores['numero']} | {$computadores['lado']} | {$computadores['processador']} | {$computadores['memoria']} | {$computadores['placa']}</option>";
                        }
                    ?>
                    </select>
                    
                    <button type="submit">Salvar</button>
                </form>
            </div>
        </div>
 <section class="resultados">
        <div class="resultado">
            <?php
            include "conexao.php";

            $sql = "SELECT r.id, a.nome, c.numero, c.lado, c.processador, c.memoria, c.placa FROM reservas AS r INNER JOIN alunos AS a ON r.id_alunos = a.id INNER JOIN computadores AS c ON r.id_computadores = c.id;
";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "<div class='cabecalho'>";
                echo "<div class='cel_cabecalho'>ID</div>";
                echo "<div class='cel_cabecalho'>Nome</div>";
                echo "<div class='cel_cabecalho'>Número do PC</div>";
                echo "<div class='cel_cabecalho'>Lado da Sala</div>";
                echo "<div class='cel_cabecalho'>Processador</div>";
                echo "<div class='cel_cabecalho'>Memória</div>";
                echo "<div class='cel_cabecalho'>Placa</div>";

                echo "</div>";


                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='linha'>";
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";             
                    echo "<div class='cel_cabecalho'>{$linha['numero']}</div>";             
                    echo "<div class='cel_cabecalho'>{$linha['lado']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['processador']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['memoria']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['placa']}</div>";
                    echo "</div>";
                }
                
            } else {
                echo "<p>Não há registros</p>";
            }
            ?>
        </div>
    </section>

</body>
</html>