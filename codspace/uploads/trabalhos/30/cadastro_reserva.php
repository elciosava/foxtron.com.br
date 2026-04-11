<?php
 include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_aluno = $_POST['id_alunos'];
    $id_computador = $_POST['id_computadores'];

    $sql = "INSERT INTO reserva (id_aluno, id_computador) 
            VALUES (:id_aluno, :id_computador)";
    
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_aluno', $id_aluno);
    $stmt->bindParam(':id_computador', $id_computador);

    if ($stmt->execute()){
        header("location:cadastro_reserva.php");
        exit;
    }else{
        echo "não deu boa!";
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
    body {
        font-family: 'Poppins', Arial, sans-serif;
        background: linear-gradient(135deg, #b8fd9dff, #ffffffff);
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        padding: 20px;
        flex-direction: column;
    }

    form {
        width: 100%;
        max-width: 460px;
        background: #deffd1ff;
        padding: 35px 30px;
        border-radius: 14px;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    form:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #222;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    input, select {
        box-sizing: border-box;
        width: 100%;
        margin-bottom: 18px;
        padding: 10px 14px;
        border: 1.5px solid #cfd7dcff;
        border-radius: 10px;
        font-size: 15px;
        color: #333;
        background-color: #ffffffff;
        transition: all 0.2s ease;
    }

    input:focus, select:focus {
        border-color: #00b86b;
        background-color: #fff;
        box-shadow: 0 0 0 3px rgba(0, 184, 107, 0.2);
        outline: none;
    }

    button {
        background-color: #00b86b;
        width: 100%;
        height: 45px;
        border: none;
        color: #fff;
        font-size: 16px;
        font-weight: 600;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.25s ease;
        letter-spacing: 0.5px;
    }

    button:hover {
        background-color: #009f5e;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 159, 94, 0.3);
    }

    button:active {
        transform: translateY(0);
        box-shadow: none;
    }
     .cabecalho {
            display: flex;
            padding: 0 20px;
            border: 1px solid black;
            width: 1000px;
        }
        .cel_cabecalho{
            width: 250px;
        }
        .linha{
            display: flex;
            padding: 0 20px;
            border: 1px solid black;
            width: 1000px;
        }

    @media (max-width: 480px) {
        form {
            padding: 25px 20px;
        }

        h2 {
            font-size: 20px;
        }

        input, select, button {
            font-size: 14px;
        }
    }
</style>
</head>
<body>
     <div class="container">
            <div class="form-box">
                <h2>Reservas</h2>
                <form action="" method="post">
                    <label for="id_alunos">Alunos:</label>
                    <select name="id_alunos" id="">
                    <?php
                       $sqlalunos = "SELECT * FROM `aluno`";
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
                       $sqlcomputadores = "SELECT * FROM `computador`";
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

            $consulta = "SELECT r.id, a.nome, c.numero, c.processador, c.monitor, c.placa FROM reserva AS r 
            INNER JOIN aluno AS a ON r.id_aluno = a.id INNER JOIN computador AS c ON r.id_computador = c.id;
";

            $stmtconsulta = $conexao->prepare($consulta);
            $stmtconsulta->execute();

            if ($stmtconsulta->rowCount() > 0) {
                echo "<div class='cabecalho'>";
                echo "<div class='cel_cabecalho'>ID</div>";
                echo "<div class='cel_cabecalho'>Nome</div>";
                echo "<div class='cel_cabecalho'>Número do PC</div>";
                echo "<div class='cel_cabecalho'>Lado da Sala</div>";
                echo "<div class='cel_cabecalho'>Processador</div>";
                echo "<div class='cel_cabecalho'>Memória</div>";
                echo "<div class='cel_cabecalho'>Placa</div>";

                echo "</div>";


                while ($linha = $stmtconsulta->fetch(PDO::FETCH_ASSOC)) {
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
            <a href="aluno.php">Voltar</a>
        </div>
        
    </section>

</body>
</html>


