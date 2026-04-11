<?php

include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $dia = $_POST['dia'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];

    $sql = "INSERT INTO agendamento (nome, dia, data1, horario)
            VALUES(:nome, :dia, :data1, :horario)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':dia', $dia);
    $stmt->bindParam(':data1', $data);
    $stmt->bindParam(':horario', $horario);

    if ($stmt->execute()){
        header("location:agendar_horario.php");
        exit;
    }else{
        echo "nao deu boa!";
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
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background: #ffffffff;
        color: #030303ff;
        line-height: 1.6;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        min-height: 100vh;
        padding: 20px;
    }

    .endereco form {
        width: 100%;
        max-width: 400px;
        background: #ffffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(27, 142, 243, 0.1);
        margin-bottom: 30px;
    }

    .endereco label {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    .endereco input
    .endereco select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
        border: 1px solid #13b4eaff;
        font-size: 14px;
    }

    .endereco input[type="date"],
    .endereco input[type="time"] {
        font-size: 14px;
    }

    .endereco select {
        background-color: #16b0dfff;
        cursor: pointer;
    }

    .endereco input:focus,
    .endereco select:focus {
        border-color: #3a85fdff;
        outline: none;
        box-shadow: 0 0 5px rgba(29, 39, 54, 0.92);
    }

    .endereco button {
        width: 100%;
        padding: 12px;
        background-color: #0062ffff;
        color: #ffffffff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .endereco button:hover {
        background-color: #142c35ff;
    }

    .resultados {
        width: 100%;
        max-width: 1000px;
        margin-top: 30px;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(14, 117, 253, 0.1);
    }

    .cabecalho {
        display: grid;
        grid-template-columns: 1fr 2fr 2fr 2fr 1fr;
        background-color: #0e76ffff;
        padding: 10px;
        font-weight: bold;
        text-align: center;
        border-bottom: 1px solid #4491f0ff;
    }

    .cel_cabecalho {
        padding: 10px;
        font-size: 14px;
    }

    .linha {
        display: grid;
        grid-template-columns: 1fr 2fr 2fr 2fr 1fr;
        border-bottom: 1px solid #298efbff;
        text-align: center;
    }

    .linha:hover {
        background-color: #d3d8dcff;
    }

    .linha .cel_cabecalho {
        padding: 10px;
        font-size: 14px;
    }

    .linha .cel_cabecalho:last-child {
        text-align: center;
    }

    @media (max-width: 768px) {
        .endereco form {
            width: 90%;
        }

        .resultados {
            width: 100%;
        }

        .cabecalho {
            grid-template-columns: 1fr 2fr 2fr 1fr;
        }

        .linha {
            grid-template-columns: 1fr 2fr 2fr 1fr;
        }
    }
</style>

</head>
<body>
     <section class="endereco">
        <div class="container">
            
        <form action="agendar_horario.php" method="post">
                    
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="">

                    <select name="dia" id="">
                        <option value="segunda">Segunda</option>
                        <option value="terça">Terça</option>
                        <option value="quarta">Quarta</option>
                        <option value="quinta">Quinta</option>
                        <option value="sexta">Sexta</option>
                        <option value="sabado">Sabado</option>
                    </select>

                    <label for="date">Data</label>
                    <input type="date" name="data" id="">          
                    
                    <label for="horario">horario</label>
                    <input type="time" name="horario" id="">

                    <button type="submit">confirmar</button>
                </form>
                
        </div>
    </section>
    <section class="resultados">
        <div class="resultados">
            <?php
                include "conexao.php";

                $sql = "SELECT * FROM agendamento";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();

                if($stmt->rowCount()>0){
                    echo "<div class='cabecalho'>";
                        echo "<div class='cel_cabecalho'>ID</div>";
                        echo "<div class='cel_cabecalho'>nome</div>";
                        echo "<div class='cel_cabecalho'>data</div>";
                        echo "<div class='cel_cabecalho'>horario</div>";
                        echo "<div class='cel_cabecalho'>Ações</div>";
                    echo "</div>";
                

                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='linha'>";
                        echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                        echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                        echo "<div class='cel_cabecalho'>{$linha['data1']}</div>";
                        echo "<div class='cel_cabecalho'>{$linha['horario']}</div>";

                        echo "</div>";


                        echo "</div>"; // fecha linha
                }
            }else {
                echo "<p>Não há registros.</p>";
            }    
      
            ?>
</body>
</html>