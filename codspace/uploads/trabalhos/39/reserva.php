<?php
    include 'conexao.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_alunos = $_POST['id_alunos'];
    $id_computadores = $_POST['id_computadores'];
  

    $sql = "INSERT INTO reserva (id_alunos, id_computadores) 
            VALUES (:id_alunos, :id_computadores)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_alunos', $id_alunos);
    $stmt->bindParam(':id_computadores', $id_computadores);
    
    if ($stmt->execute()){
        header("location:reserva.php");
        exit;
    }else{
        echo "Não deu boa!";
    }
    
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva</title>
    <style>
         * {
            margin: 0;
            padding: 0;
        } 

         header {
            height:50px;
        }

        html {
            font-family: Segoe UI;
           background: linear-gradient(to left, #094b0cff, #616161ff);
        }  

         form {
            width: 400px;
        }
        
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 30px;
            height: 50px;
        }
                                         
        .container {
            display: flex;
            justify-content: center;
            align-items: center;           
        }

        input, select {
            width: 100%;
            padding: 5px;
            font-size: 0.7rem;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
             height: 100vh; 
        }

        .cabecalho{
            display: flex;
            padding: 5px 15px;
            border: solid black 1px ;
            width: 1200px;
        }

        .linha {
            display: flex;
            border: solid  black 1px;
            padding: 5px 15px;
        }

        .cel_cabecalho {
            width: 170px;
        }
        .form-box {
            
            background-color: rgba(7, 56, 29, 1);
            border: 2px solid rgba(0, 0, 0, 1); 
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
            margin: 20px;
        }
        button {
            background-color: rgba(33, 58, 37, 1);
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
            margin-top: 4px;
        }

        button:hover {
            background-color: rgba(10, 22, 129, 1);
        }

        h2 {
            text-align: center;
            color: black;
            margin-bottom: 20px;
            font-size: 1.9rem;
        }

        </style>
</head>
<body>
     <nav>
        <ul>
        
    <li><a href="alunos.php"><button>Alunos</button></a> </li>
    <li><a href="computadores.php"><button>Computadores</button></a></li>
    
        
        </ul>
    </nav>
      <section class="inicio">
        <div class="container">
            <div class="form-box">
                <h2>Resrva De Computadores</h2>


            <form action="" method="post">


                <label for="id_alunos">Alunos</label>
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

                <label for="id_computadores">Computadores</label>
                <select name="id_computadores" id="">

                <?php
                $sqlcomputadores = "SELECT * FROM `computadores`";
                $stmtcomputadores = $conexao->prepare($sqlcomputadores);
                $stmtcomputadores->execute();

                while($computadores = $stmtcomputadores->fetch(PDO::FETCH_ASSOC)){
                    echo "<option value='{$computadores['id']}'>{$computadores['placa']} | {$computadores['processador']} | {$computadores['memoria']} | {$computadores['lado']} | {$computadores['numero']}</option>";
                    }

                ?>
                </select>
                

                <button class="submit">Salvar</button>
            </form>
          </div>
        </div>
    </section>

    <section class="resultados">
        <div class="resultados">
            <?php
            include "conexao.php";

            $sql = "SELECT r.id, a.nome, c.placa, c.processador, c.memoria, c.lado, c.numero FROM reserva AS r INNER JOIN alunos AS a ON r.id_alunos = a.id INNER JOIN computadores AS c ON r.id_computadores = c.id;";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

              if ($stmt->rowCount()>0){
                echo "<div class='cabecalho'>";
                    echo "<div class='cel_cabecalho'>ID</div>";
                    echo "<div class='cel_cabecalho'>Nome</div>";
                    echo "<div class='cel_cabecalho'>Placa</div>";
                    echo "<div class='cel_cabecalho'>Processador</div>";
                    echo "<div class='cel_cabecalho'>Memoria</div>";
                    echo "<div class='cel_cabecalho'>Lado</div>";
                    echo "<div class='cel_cabecalho'>Numero</div>";
                    echo "</div>";

                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<div class='linha'>";
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['placa']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['processador']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['memoria']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['lado']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['numero']}</div>";
                    echo "</div>";
                    }
             }else{
                echo "<p>nao tem registro</p>";
             }
            
            ?>
        </div>
    </section>
</body>
</html>