<?php

include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $dia = $_POST['dia'];
    $horario = $_POST['horario'];

    $sql = "INSERT INTO agendamentos (nome, dia, horario) 
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
* {
    margin: 0;
    padding: 0;
    box-sizing: center;
}

body {
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    font-family: "Verdana", sans-serif;
    background: linear-gradient(135deg, rgba(27, 50, 114, 1), rgba(126, 158, 218, 1));
    color: #222;
}

h2 {
    text-align: center;
    color: rgba(38, 83, 233, 1);
    margin-bottom: 20px;
    font-size: 1.9rem;
    font-weight: bold;
    letter-spacing: 0.5px;
}

form {
    width: 100%;
    max-width: 380px;
}

input,
select {
    width: 100%;
    padding: 10px 12px;
    margin-bottom: 12px;
    font-size: 0.95rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: all 0.2s ease;
    background-color: #fdfdfd;
}

input:focus,
select:focus {
    border-color: rgba(38, 83, 233, 1);
    outline: none;
    box-shadow: 0 0 5px rgba(38, 83, 233, 0.4);
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.form-box {
    background-color: rgba(255, 255, 255, 0.9);
    border: 2px solid rgba(38, 83, 233, 1);
    border-radius: 10px;
    padding: 25px 30px;
    box-shadow: 0 5px 12px rgba(0, 0, 0, 0.2);
    margin: 20px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.form-box:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 18px rgba(0, 0, 0, 0.25);
}

button {
    width: 100%;
    background-color: rgba(38, 83, 233, 1);
    color: #fff;
    font-weight: bold;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
    padding: 10px;
    margin-top: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

button:hover {
    background-color: rgba(47, 127, 151, 1);
    transform: scale(1.03);
}

.cabecalho {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 750px;
    max-width: 95%;
    padding: 8px 20px;
    border: 1px solid #000;
    border-radius: 5px;
    background-color: #f3f3f3;
    font-weight: bold;
    text-align: center;
}

.cel_cabecalho {
    flex: 1;
    margin: 5px;
    text-align: center;
}

.linha {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border: 1px solid #bbb;
    border-radius: 5px;
    padding: 8px 15px;
    margin-top: 5px;
    background-color: #fff;
    transition: background-color 0.2s ease;
}

.linha:hover {
    background-color: rgba(38, 83, 233, 0.08);
}

.resultado {
    margin-top: 20px;
    width: 100%;
    text-align: center;
}

@media (max-width: 768px) {
    .cabecalho {
        flex-direction: column;
        width: 90%;
    }

    .linha {
        flex-direction: column;
        text-align: center;
    }

    form {
        width: 90%;
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
                
                $sql = "SELECT * FROM agendamentos";
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