<?php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Produtos</title>
    
    <style>
        body {
            justify-content: center;
            background: linear-gradient(to right, #e4e7ec, #61377a, #594192);
            margin: 0;
            padding: 20px;
            font-family: Arial, sans-serif;
        }
        
        .container {
            display: grid;
            grid-template-columns: 1fr 4fr;
            gap: 5px;
        }

        .meio {
            display: flex;
            justify-content: center;
            padding-top: 20px;
        }
        
        form {
            width: 300px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        input, select {
            width: 100%;
            padding: 8px;
            font-size: 0.7rem; 
            box-sizing: border-box;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        
        button {
            margin: 10px 0;
            padding: 8px 16px;
            background: #594192;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        button:hover {
            background: #61377a;
        }
        
        .cabecalho {
            display: flex;
            padding: 10px;
            background: #f5f5f5;
            border: 1px solid #ddd;
            font-weight: bold;
        }
        
        .cel_cabecalho {
            flex: 1;
            padding: 5px;
            text-align: center;
        }
        
        .linha {
            display: flex;
            border: 1px solid #ddd;
            padding: 10px;
            background: white;
            align-items: center;
        }
        
        .cel_linha {
            flex: 1;
            padding: 5px;
            text-align: center;
        }
        
        .acoes {
            display: flex;
            gap: 5px;
            justify-content: center;
        }
        
        .acoes form {
            width: auto;
            padding: 0;
            margin: 0;
            background: none;
            box-shadow: none;
        }
        
        .acoes button {
            margin: 0;
            padding: 5px 10px;
            font-size: 0.7rem;
        }
        
        section {
            margin-bottom: 30px;
        }
        
        .resultado {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <section class="inicio">
        <div class="meio">
            <form action="gravar_produto.php" method="post">
                <label for="produto">Produto</label>
                <input type="text" name="produto" id="produto" required>
                
                <label for="quantidade">Quantidade</label>
                <input type="number" name="quantidade" id="quantidade" required>
                
                <label for="valor">Valor</label>
                <input type="number" step="0.01" name="valor" id="valor" required>
                
                <button type="submit">Salvar</button>
            </form>
        </div>
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