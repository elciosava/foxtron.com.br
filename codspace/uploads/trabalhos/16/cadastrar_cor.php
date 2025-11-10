<?php
 include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $cor = $_POST['cor'];

    $sql = "INSERT INTO cores (nome, cor) 
            VALUES (:nome, :cor)";
    
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cor', $cor);

    if ($stmt->execute()){
        header("location:cadastrar_cor.php");
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
</head>
<style>
    /* Reset básico */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Segoe UI", Roboto, sans-serif;
    }

    body {
      background: #f7f9fb;
      color: #333;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 40px 20px;
    }

    h1 {
      margin-bottom: 20px;
      color: #333;
    }

    /* Seção do formulário */
    .inicio {
      background: #fff;
      padding: 25px 30px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
      margin-bottom: 40px;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    label {
      font-weight: bold;
      margin-bottom: 5px;
    }

    input[type="text"] {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1rem;
      transition: border-color 0.3s;
    }

    input[type="text"]:focus {
      border-color: #000000ff;
      outline: none;
    }

    input[type="color"] {
      height: 40px;
      width: 100%;
      border: none;
      background: #f2f2f2;
      border-radius: 6px;
      cursor: pointer;
    }

    button {
      background: #000000ff;
      color: white;
      border: none;
      padding: 12px;
      border-radius: 6px;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s;
    }

    button:hover {
      background: #000000ff;
    }

    /* Seção dos resultados */
    .resultados {
      width: 100%;
      max-width: 700px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      overflow: hidden;
    }

    .cabecalho, .linha {
      display: grid;
      grid-template-columns: 80px 1fr 100px;
      padding: 12px 20px;
      align-items: center;
    }

    .cabecalho {
      background: #000000ff;
      color: #fff;
      font-weight: bold;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .linha:nth-child(even) {
      background: #f7f9fb;
    }

    .linha:hover {
      background: #e9f0ff;
    }

    .cel_cabecalho {
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      word-break: break-word;
    }

    /* Exibição da cor */
    .cel_cabecalho:last-child {
      display: flex;
      justify-content: center;
    }

    .cor-preview {
      width: 40px;
      height: 25px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }

    p {
      padding: 20px;
      text-align: center;
      color: #777;
    }
  </style>
<body>
    <section class="inicio">
        <div class="container">
            <form action="" method="post">
                <label for="nome">Cor</label>
                <input type="text" name="nome" id="">

                <label for="cor">Cor</label>
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
                echo "<div class='cel_cabecalho'>Cores</div>";
                echo "</div>";


                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='linha'>";
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                     echo "<div class='cel_cabecalho'>{$linha['cor']}</div>";

                    echo "<div class='cel_cabecalho'>";
                      echo "</div>";

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