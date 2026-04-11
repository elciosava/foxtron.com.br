<?php
include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $cor = $_POST['cor'];
    $nome = $_POST['nome'];

    $sql = "INSERT INTO cores (cor, nome)
            VALUES(:cor, :nome)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':cor', $cor);
    $stmt->bindParam(':nome', $nome);

    if ($stmt->execute()){
        header("location:cores.php");
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
    /* ===== Estilo geral ===== */
    body {
        font-family: 'Segoe UI', Arial, sans-serif;
        background: #f8f9fa;
        color: #333;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    h1, h2 {
        text-align: center;
        color: #444;
        margin-bottom: 15px;
    }

    /* ===== Container do formulário ===== */
    .container {
        width: 100%;
        max-width: 600px;
        background: white;
        padding: 25px 30px;
        margin: 40px 0 20px 0;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    /* ===== Formulário ===== */
    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    label {
        font-weight: 600;
        color: #555;
    }

    input[type="text"],
    input[type="color"] {
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 1rem;
        width: 100%;
    }

    button {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 6px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
        align-self: flex-end;
        width: 150px;
    }

    button:hover {
        background-color: #0056b3;
    }

    /* ===== Resultados ===== */
    .resultados {
        width: 100%;
        max-width: 800px;
        background: white;
        padding: 20px;
        margin-bottom: 40px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .cabecalho,
    .linha {
        display: grid;
        grid-template-columns: 80px 1fr 120px;
        padding: 12px;
        border-bottom: 1px solid #e0e0e0;
        align-items: center;
        text-align: center;
    }

    .cabecalho {
        font-weight: bold;
        background-color: #007bff;
        color: white;
        border-radius: 6px 6px 0 0;
    }

    .linha:nth-child(even) {
        background-color: #f7f7f7;
    }

    .cel_cabecalho {
        text-align: center;
    }

    /* ===== Exibição da cor ===== */
    .cel_cabecalho.cor-visual {
        width: 45px;
        height: 25px;
        border-radius: 4px;
        border: 1px solid #ccc;
        margin: 0 auto;
    }

    /* ===== Mensagem de vazio ===== */
    p {
        text-align: center;
        color: #777;
        margin-top: 15px;
    }
</style>
</head>
<body>

     <section class="inicio">
        <div class="container">
            <form action="" method="post">
                <label for="nome">qual cor é</label>
                <input type="text" name="nome" id="">

                <label for="cor">cor</label>
                <input type="color" name="cor" id="">

                <button type="submit">Salvar</button>

            </form>
        </div>
    </section>
    <section class="resultados">
        <div class="resultado">
            <?php
            include "conexao.php";

            $sql = "SELECT * FROM cores";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "<div class='cabecalho'>";
                echo "<div class='cel_cabecalho'>ID</div>";
                echo "<div class='cel_cabecalho'>Nome</div>";
                echo "<div class='cel_cabecalho'>cores</div>";
                echo "</div>";


                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='linha'>";
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['cores']}</div>";                

                    echo "<div class='cel_cabecalho'>";

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