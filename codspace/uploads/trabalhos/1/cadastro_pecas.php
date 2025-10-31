<?php
 include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome_peca = $_POST['peca'];

        $sql = "INSERT INTO pecas (nome_peca)
        VALUES (:nome_peca)";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome_peca', $nome_peca);

        if($stmt->execute()){
            echo "<p style='color:green;'>Deu boa!!</p>";
        }else{
            echo "<p style='color:red;'>Deu ruim!!</p>";
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
<body>
    <section id="inicio">
        <div class="form">
            <form action="" method="post">
                <label for="peca">Peça</label>
                <input type="text" name="peca" id="">
                <button type="submit">Salvar</button>
            </form>
        </div>
    </section>
    <section id="produtos">
        <div class="produtos">
            <?php
            include "conexao.php";

            $sql = "SELECT * FROM pecas";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // Cabeçalho da tabela
                echo "<div class='cabecalho'>";
                echo "<div class='cel_cabecalho'>ID</div>";
                echo "<div class='cel_cabecalho'>Peça</div>";
                echo "<div class='cel_cabecalho'>Ações</div>";
                echo "</div>";

                // Linhas dos produtos
                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='linha'>"; // Usei 'linha' pra não confundir com 'cabecalho'
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['nome_peca']}</div>";

                    // Ações (Editar + Deletar)
                    echo "<div class='cel_cabecalho'>";

                    // Formulário Editar
                    echo "<form action='entrada.php' method='get' style='display:inline;'>";
                    echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                    echo "<button type='submit'>Entrada</button>";
                    echo "</form> ";

                    // Formulário Deletar
                    echo "<form action='saida.php' method='get' style='display:inline;'>";
                    echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                    echo "<button type='submit'>Saida</button>";
                    echo "</form>";

                    echo "</div>"; // fecha celula ações
            
                    echo "</div>"; // fecha linha
                }
            } else {
                echo "<p>Não há registros.</p>";
            }
            ?>
        </div>
    </section>
</body>
</html>