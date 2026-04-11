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

   if ($stmt->execute()) {
    header("Location:reserva_computadores.php");
    exit;
} else {
        echo "Não deu certo!";
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
            padding:0;
            margin:0;
        }
        form {
            width: 350px;
        }

        h2 {
            text-align: center;
            color: #FFB6C1;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }
        body {          
            background: linear-gradient(to top, rgba(255 245 238), rgba(255 192 203));
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
        .cabecalho  {
            display: flex;
            padding: 0 20px;
            border: 1px solid black;  
            width: 1000px; 
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
         .form-box {
            background-color: rgba(255, 255, 255, 0.83); 
            border: 2px solid rgba(0, 0, 0, 1); 
            border-radius: 10px; 
            padding: 20px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
            margin: 20px;
        }
        button {
            background-color: rgb(255,192,203);
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
          
        }
        button:hover {
            background-color: rgb(255,182,193);
        }

            li {
            display: inline-block;
            margin: 0 10px;
        }

    </style>
</head>
<body>
     <div class="container">
       <div class="form-box">
        <h2>Reserva dos Computadores</h2>
        <form action="" method="post">

            <label for="id_alunos">Aluno</label>
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

               <label for="id_computadores">Computador</label>
               <select name="id_computadores" id="">
                <?php
                $sqlcomputadores = "SELECT * FROM `computadores`";
                $stmtcomputadores = $conexao->prepare($sqlcomputadores);
                $stmtcomputadores->execute();

     
                while($computadores = $stmtcomputadores->fetch(PDO::FETCH_ASSOC)){
                    echo "<option value='{$computadores['id']}'>{$computadores['placa']}'>{$computadores['processador']}'>{$computadores['memoria']}'>{$computadores['lado']}'>{$computadores['numero']}</option>";
                }
 
                ?> 
               
               </select>
 <button type="submit">Salvar</button>
                  

       
  
     
    </div>
    <section class="resultados">
        <div class="resultado">
            <?php 
            include "conexao.php";

            $sql = "SELECT r.id, a.nome, c.placa, c.processador, c.memoria, c.lado, c.numero FROM reserva AS r INNER JOIN alunos AS a ON r.id_alunos = a.id INNER JOIN computadores AS c ON r.id_computadores = c.id; ";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount()>0){
                echo"<div class='cabecalho'>";
                echo"<div class='cel_cabecalho'>ID</div>";
                echo"<div class='cel_cabecalho'>Nome</div>";
                echo"<div class='cel_cabecalho'>Placa</div>";
                echo"<div class='cel_cabecalho'>processador</div>";
                echo"<div class='cel_cabecalho'>memoria</div>";
                echo"<div class='cel_cabecalho'>lado</div>";
                echo"<div class='cel_cabecalho'>Numero</div>";
                echo "</div>";
            

            while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                  echo"<div class='cabecalho'>";
                  echo"<div class='cel_cabecalho'>{$linha['id']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['nome']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['placa']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['processador']}</div>";                                                                                                 
                  echo"<div class='cel_cabecalho'>{$linha['memoria']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['lado']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['numero']}</div>";
                   echo "</div>";
            
            }
        }else{
                echo"<p>nao tem registro</p>";
            }


            ?>
            </section>

            <header>
                <nav>
                    <ul>
                            <li>
                    <a href="alunos.php"><button>Alunos</button></a>
                </li>
                <li>
                      <a href="computadores.php"><button>Computadores</button></a>
                </li>

                    </ul>
                </nav>
            </header>
</body>
</html>