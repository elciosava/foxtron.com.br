<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['pecas']; 

    $sql = "INSERT INTO pecas (nome) 
            VALUES (:nome)";
    
    $stmt = $conexao->prepare($sql);  
    $stmt->bindParam(':nome', $nome); 
    
    if ($stmt->execute()){
        header("Location: cadastrar_peca.php");
        exit;
    } else {
        echo "Erro ao salvar: " . implode(", ", $stmt->errorInfo());
    }
}

$sql_pecas = "SELECT * FROM `pecas`";
$stmt_pecas = $conexao->prepare($sql_pecas);
$stmt_pecas->execute();
$pecas = $stmt_pecas->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
        <form action="" method="post">
            <label for="pecas">Peça</label>
            <input type="text" name="pecas" id="pecas" required>
            <button type="submit" class="submit">Salvar</button>
        </form>
    </section>

    <section class="resultados">
        <div class="resultado">
            <?php
            include 'conexao.php';

            $sql = "SELECT * FROM produtos";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount() > 0) {
                echo "<div class='cabecalho'>";
                echo "<div class='cel_cabecalho'>ID</div>";
                echo "<div class='cel_cabecalho'>Nome</div>";
                echo "<div class='cel_cabecalho'>Quantidade</div>";
                echo "<div class='cel_cabecalho'>Valor</div>";
                echo "<div class='cel_cabecalho'>Ações</div>";
                echo "</div>";
                
                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='linha'>";
                    echo "<div class='cel_linha'>{$linha['id']}</div>";
                    echo "<div class='cel_linha'>{$linha['nome']}</div>";
                    echo "<div class='cel_linha'>{$linha['quantidade']}</div>";
                    echo "<div class='cel_linha'>R$ " . number_format($linha['valor'], 2, ',', '.') . "</div>";
                    
                    echo "<div class='cel_linha acoes'>";
                    
                    // Formulário Editar
                    echo "<form action='editar_produto.php' method='get'>";
                    echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                    echo "<button type='submit'>Editar</button>";
                    echo "</form>";
                    
                    // Formulário Deletar - CORREÇÃO: aspas corrigidas
                    echo "<form action='deletar_produto.php' method='post' onsubmit=\"return confirm('Deseja realmente deletar este produto?');\">";
                    echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                    echo "<button type='submit'>Deletar</button>";
                    echo "</form>";
                    
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p style='text-align: center; color: white;'>Nenhum produto cadastrado.</p>";
            }
            ?>
        </div>
    </section>    
    
</body>
</html>