<?php
include 'conexao.php'; 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $aluno = $_POST['aluno'];
    $computador = $_POST['computador'];

    $insert = "INSERT INTO reservas (id_aluno, id_computador)
               VALUES (:aluno, :computador,)";

    $stmt = $conexao->prepare($insert);
    $stmt->bindParam(':aluno', $aluno);
    $stmt->bindParam(':computador', $computador);

    if($stmt->execute()){
        header("Location: reservas.php");
        exit;
    } else {
        $mensagem = "Não foi possível realizar a reserva.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background-color: #d0eaeeff;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .form-container {
            background-color: #95e4eeff;
            border-radius: 10px;
            padding: 30px;
            width: 400%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #1b24a1ff;
            margin-bottom: 20px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 20px 0;
            border: 1px solid #543861ff;
            border-radius: 5px;
            font-size: 14px;
        }
        header {
            width: 100%;
            background-color: #1b24a1ff;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            margin-bottom: 30px;
        }
        nav ul {
            display: flex;
            justify-content: center;
            list-style: none;
            gap: 40px;
        }
        nav ul li {
            position: relative;
        }
        nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 16px;
            padding: 10px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        nav ul li a:hover {
            background-color: #95e4eeff;
            color: #1b24a1ff;
            transform: scale(1.05);
        }
        nav ul li::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0%;
            height: 2px;
            background-color: #95e4eeff;
            transition: width 0.3s ease;
        }
        nav ul li:hover::after {
            width: 100%;
        }
        nav ul li a.active {
            background-color: #95e4eeff;
            color: #1b24a1ff;
        }
       button {
            width: 100%;
            padding: 10px;
            background-color: green;
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .cabecalho {
            display: flex;
            width: 500px;
            font-weight: bold;
            margin-top: 20px;
        }
        .cel_cabecalho {
            width: 100px;
            margin-left: 10px;
            display: flex;
            width: 500px;
            padding:10px;
            text-align: center;
            justify-content: center;
        }
        .resultado {
            display: flex;
            width: 500px;
            font-weight: normal;
            padding:10px;
            text-align: center;
            justify-content: center;
        }
    </style>
</head>
<body>
   
    <header>
        <nav>
            <ul>
                <li><a href="aluno.php">Aluno</a></li>
                <li><a href="computador.php">Computador</a></li>
                <li><a href="#">Reserva</a></li>
            </ul>
        </nav>
    </header>
    
<div class="form-container">
    <h2>Reservas de Computadores</h2>

    <form action="" method="post">
        <label for="aluno">Nome do Aluno</label>
        <select name="aluno" required>
            <?php
                $sqlalunos = "SELECT * FROM alunos";
                $stmtalunos = $conexao->prepare($sqlalunos);
                $stmtalunos->execute();
                while($alunos = $stmtalunos->fetch(PDO::FETCH_ASSOC)){
                    echo "<option value='{$alunos['id']}'>{$alunos['nome']}</option>";
                }
            ?>
        </select>

        <label for="computador">Computador</label>a
        <select name="computador" required>
            <?php
                $sql = "SELECT * FROM computadores";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();
                while($computadores = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<option value='{$computadores['id']}'>"." Número "."{$computadores['nome']}"." - Fileira "."{$computadores['fileira']}</option>";
                }
            ?>
        </select>
              <button type="submit">Concluir Reserva</button>
        
    </form>
</div>

<section class="resultados">
<?php 

include 'conexao.php';

$sql = "SELECT r.id, a.nome, c.fileira, c.computador FROM `reservas` AS r INNER JOIN alunos AS a ON r.id_aluno = a.id INNER JOIN computadores AS c ON r.id_computador = c.id;";
$stmt = $conexao->prepare($sql);
$stmt->execute();


$stmt = $conexao->prepare($sql);
$stmt->execute();

if($stmt->rowCount() > 0){
    echo "<div class='cabecalho'>
            <div class='cel_cabecalho'>ID</div>
            <div class='cel_cabecalho'>Aluno</div>
            <div class='cel_cabecalho'>Computador</div>
            <div class='cel_cabecalho'>Fileira</div>
    
          </div>";

    while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<div class='resultado'>
                <div class='cel_cabecalho'>{$linha['id']}</div>
                <div class='cel_cabecalho'>{$linha['nome']}</div>
                <div class='cel_cabecalho'>{$linha['computador']}</div>
                <div class='cel_cabecalho'>{$linha['fileira']}</div>

              </div>";
    }
} else {
    echo "<p>Não há registros.</p>";
}
?>
</section>

</body>
</html>