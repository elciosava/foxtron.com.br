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
        echo "nao deu boa!!";
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
        box-sizing: border-box;
    }

    body {
        background: linear-gradient(135deg, #24815a, #36c190);
        font-family: Verdana, sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        padding: 50px 15px;
        color: #333;
    }

    /* ===== FORMULÁRIO ===== */
    form {
        width: 100%;
        max-width: 400px;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        margin-bottom: 40px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        text-align: center;
    }

    form:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
    }

    input,
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    input:focus,
    select:focus {
        border-color: #24815a;
        box-shadow: 0 0 4px rgba(36, 129, 90, 0.4);
        outline: none;
    }

    /* ===== CONTAINER ===== */
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        gap: 0;
    }

    /* ===== CABEÇALHO ===== */
    .cabecalho {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        max-width: 1000px;
        background-color: #f3fff9;
        border: 1px solid #24815a;
        border-radius: 6px 6px 0 0;
        overflow: hidden;
        margin-bottom: 0;
    }

    .cel_cabecalho {
        flex: 1;
        text-align: center;
        font-weight: bold;
        color: #15543c;
        background-color: #c5f1da;
        padding: 12px 8px;
        border-right: 1px solid #24815a;
    }

    .cel_cabecalho:last-child {
        border-right: none;
    }

    /* ===== LINHAS ===== */
    .linha {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        max-width: 1000px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-top: none;
        transition: background-color 0.2s ease;
    }

    .linha:nth-child(even) {
        background-color: #f9f9f9;
    }

    .linha:hover {
        background-color: #e8fff2;
    }

    .linha > div {
        flex: 1;
        text-align: center;
        padding: 10px;
        border-right: 1px solid #eee;
    }

    .linha > div:last-child {
        border-right: none;
    }

    /* ===== CENTRALIZAÇÃO ===== */
    .cabecalho,
    .linha {
        margin-left: auto;
        margin-right: auto;
    }

    /* ===== RESPONSIVIDADE ===== */
    @media (max-width: 768px) {
        .cabecalho, .linha {
            flex-direction: column;
            width: 95%;
        }

        .cel_cabecalho, .linha > div {
            text-align: left;
            padding: 10px 15px;
            border-right: none;
            border-bottom: 1px solid #ddd;
        }

        .cel_cabecalho:last-child, 
        .linha > div:last-child {
            border-bottom: none;
        }
    }
</style>
</head>
<body>
    </head>
<body>
    <section class="endereco">
        <div class="container">
            
                <form action="" method="post">
        
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
                    
                    <label for="horario">Horario</label>
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
                     echo "<div class='cel_cabecalho'>Nome</div>";
                     echo "<div class='cel_cabecalho'>Dia</div>";
                     echo "<div class='cel_cabecalho'>Horario</div>";
                echo "</div>";
                

                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='cabecalho'>";
                     echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                     echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                     echo "<div class='cel_cabecalho'>{$linha['dia']}</div>";
                     echo "<div class='cel_cabecalho'>{$linha['horario']}</div>";

                     echo "<div>"; 

                    
                     echo "<div>"; 

                }
            }else {
                echo "<p>Não há registros.</p>";
            }      
            ?>
        </div>
    </section>
</body>
</html>