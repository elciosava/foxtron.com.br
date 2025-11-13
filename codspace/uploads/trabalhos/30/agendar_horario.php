<?php

include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $dia = $_POST['dia'];
    $horario = $_POST['horario'];

    $sql = "INSERT INTO agendamento (nome, dia, horario) 
            VALUES (:nome, :dia, :horario)";
    
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':dia', $dia);
    $stmt->bindParam(':horario', $horario);

    if ($stmt->execute()){
        header("location:agendar_horario.php");
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
    /* RESET */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Verdana", sans-serif;
    }

    /* FUNDO */
    body {
        background: linear-gradient(135deg, #b52dc2, #64238f);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        min-height: 100vh;
        padding: 40px 15px;
        color: #333;
    }

    h2 {
        text-align: center;
        color: #2653e9;
        margin-bottom: 25px;
        font-size: 1.8rem;
    }

    /* CONTAINER DO FORMULÁRIO */
    .form-box {
        background-color: rgba(255, 255, 255, 0.95);
        border: 2px solid #2653e9;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        padding: 25px 30px;
        width: 100%;
        max-width: 380px;
        margin-bottom: 40px;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    label {
        font-weight: bold;
        font-size: 0.9rem;
        margin-bottom: 4px;
    }

    input, select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
        outline: none;
        transition: border-color 0.3s;
    }

    input:focus, select:focus {
        border-color: #2653e9;
    }

    button {
        background-color: #2653e9;
        color: white;
        border: none;
        border-radius: 6px;
        padding: 10px;
        font-weight: bold;
        font-size: 15px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #2f7f97;
    }

    /* RESULTADOS */
    .resultado {
        background-color: rgba(255, 255, 255, 0.95);
        border: 2px solid #2653e9;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        padding: 20px;
        width: 100%;
        max-width: 800px;
        overflow-x: auto;
    }

    .cabecalho, .linha {
        display: grid;
        grid-template-columns: 60px 1fr 1fr 1fr 100px;
        align-items: center;
        text-align: center;
        padding: 10px;
    }

    .cabecalho {
        background-color: #53015eff;
        color: white;
        font-weight: bold;
        border-radius: 6px 6px 0 0;
    }

    .linha {
        border-bottom: 1px solid #ddd;
        background-color: white;
        transition: background-color 0.2s;
    }

    .linha:nth-child(even) {
        background-color: #f8f8f8;
    }

    .linha:hover {
        background-color: rgba(38, 83, 233, 0.1);
    }

    .cel_cabecalho {
        padding: 5px;
    }

    /* RESPONSIVO */
    @media (max-width: 600px) {
        .cabecalho, .linha {
            grid-template-columns: 40px 1fr 1fr;
            font-size: 13px;
        }

        .cabecalho div:nth-child(4),
        .cabecalho div:nth-child(5),
        .linha div:nth-child(4),
        .linha div:nth-child(5) {
            display: none;
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
                        <option value="sabado">Sábado</option>
                    </select>
                      
                    <label for="horario">Horário</label>
                    <input type="time" name="horario" id="">

                    <button type="submit">Agendar</button>
                </form>
                
        </div>
    </section>
    <section class="resultados">
        <div class="resultado">
            <?php
                include "conexao.php";
                
                $sql = "SELECT * FROM agendamento";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();

                if($stmt->rowCount()>0){
                    echo "<div class='cabecalho'>";
                    echo "<div class='cel_cabecalho'>ID</div>";
                    echo "<div class='cel_cabecalho'>nome</div>";
                    echo "<div class='cel_cabecalho'>dia</div>";
                    echo "<div class='cel_cabecalho'>horario</div>";
                echo "</div>";
                 
                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<div class='linha'>";
                     echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                     echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                     echo "<div class='cel_cabecalho'>{$linha['dia']}</div>";
                     echo "<div class='cel_cabecalho'>{$linha['horario']}</div>";

                     
                    echo "</div>";
                }
            }else {
                echo "<p>Não há registros.</p>";
            }
            ?>
        </div>
    </section>
</body>
</html>