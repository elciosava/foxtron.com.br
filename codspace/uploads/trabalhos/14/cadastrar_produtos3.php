<?php
// Processamento do formulário (se necessário)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aqui você pode adicionar o código para processar o formulário
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Produtos - Tema Clash Royale</title>
    
    <style>
        /* Reset e configurações gerais */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
            background-attachment: fixed;
            min-height: 100vh;
            padding: 20px;
            color: #fff;
        }

        /* Container principal */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 3fr;
            gap: 20px;
        }

        /* Seção do formulário */
        .inicio {
            background: rgba(0, 0, 0, 0.7);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            border: 2px solid #ffcc00;
            height: fit-content;
        }

        .inicio h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffcc00;
            text-shadow: 0 0 5px rgba(255, 204, 0, 0.7);
            font-size: 1.5rem;
        }

        form {
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #ffcc00;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 2px solid #ffcc00;
            background-color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
            transition: all 0.3s;
        }

        input:focus, select:focus {
            outline: none;
            box-shadow: 0 0 10px #ffcc00;
            transform: scale(1.02);
        }

        button.submit {
            width: 100%;
            padding: 12px;
            background: linear-gradient(to bottom, #ffcc00, #ff9900);
            border: none;
            border-radius: 8px;
            color: #8b0000;
            font-weight: bold;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 4px 0 #cc7a00;
        }

        button.submit:hover {
            background: linear-gradient(to bottom, #ffd633, #ffad33);
            transform: translateY(-2px);
            box-shadow: 0 6px 0 #cc7a00;
        }

        button.submit:active {
            transform: translateY(2px);
            box-shadow: 0 2px 0 #cc7a00;
        }

        /* Seção de resultados */
        .resultados {
            background: rgba(0, 0, 0, 0.7);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            border: 2px solid #ffcc00;
        }

        .resultados h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffcc00;
            text-shadow: 0 0 5px rgba(255, 204, 0, 0.7);
            font-size: 1.5rem;
        }

        /* Tabela de produtos */
        .cabecalho {
            display: grid;
            grid-template-columns: 80px 1fr 120px 120px 200px;
            gap: 10px;
            padding: 15px;
            background: linear-gradient(to right, #8b0000, #b22222);
            border-radius: 10px;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: center;
            border: 2px solid #ffcc00;
        }

        .linha {
            display: grid;
            grid-template-columns: 80px 1fr 120px 120px 200px;
            gap: 10px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            margin-bottom: 10px;
            align-items: center;
            text-align: center;
            transition: all 0.3s;
            border: 1px solid rgba(255, 204, 0, 0.3);
        }

        .linha:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .cel_cabecalho {
            font-weight: bold;
            color: #ffcc00;
        }

        /* Botões de ação */
        .linha form {
            display: inline;
            margin: 0 5px;
        }

        .linha button {
            padding: 8px 15px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            font-size: 0.8rem;
        }

        .linha button[type="submit"]:first-of-type {
            background: linear-gradient(to bottom, #4CAF50, #2E7D32);
            color: white;
            box-shadow: 0 3px 0 #1B5E20;
        }

        .linha button[type="submit"]:last-of-type {
            background: linear-gradient(to bottom, #f44336, #c62828);
            color: white;
            box-shadow: 0 3px 0 #b71c1c;
        }

        .linha button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 0;
        }

        .linha button:active {
            transform: translateY(1px);
            box-shadow: 0 2px 0;
        }

        /* Responsividade */
        @media (max-width: 900px) {
            .container {
                grid-template-columns: 1fr;
            }
            
            .cabecalho, .linha {
                grid-template-columns: 60px 1fr 100px 100px 150px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 600px) {
            .cabecalho, .linha {
                grid-template-columns: 1fr;
                text-align: left;
                gap: 5px;
            }
            
            .cel_cabecalho::before {
                content: attr(data-label) ": ";
                font-weight: bold;
                color: #ffcc00;
            }
            
            .linha .cel_cabecalho::before {
                content: attr(data-label) ": ";
                font-weight: bold;
                color: #ffcc00;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <section class="inicio">
            <h2>Adicionar Novo Produto</h2>
            <div class="coluna meio">
                <form action="" method="post">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" required>

                    <label for="quantidade">Quantidade</label>
                    <input type="number" name="quantidade" id="quantidade" required>

                    <label for="valor">Valor</label>
                    <input type="number" step="0.01" name="valor" id="valor" required>

                    <button type="submit" class="submit">Salvar Produto</button>
                </form>
            </div>
        </section>
        
        <section class="resultados">
            <h2>Produtos Cadastrados</h2>
            <div class="resultado">
                <?php
                include 'conexao.php';

                $sql = "SELECT * FROM produtos";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();

                if($stmt->rowCount()>0){
                    echo "<div class='cabecalho'>";
                        echo "<div class='cel_cabecalho' data-label='ID'>ID</div>";
                        echo "<div class='cel_cabecalho' data-label='Nome'>Nome</div>";
                        echo "<div class='cel_cabecalho' data-label='Quantidade'>Quantidade</div>";
                        echo "<div class='cel_cabecalho' data-label='Valor'>Valor</div>";
                        echo "<div class='cel_cabecalho' data-label='Ações'>Ações</div>";
                    echo "</div>";
        
                    while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                        echo "<div class='linha'>";
                            echo "<div class='cel_cabecalho' data-label='ID'>{$linha['id']}</div>";
                            echo "<div class='cel_cabecalho' data-label='Nome'>{$linha['nome']}</div>";
                            echo "<div class='cel_cabecalho' data-label='Quantidade'>{$linha['quantidade']}</div>";
                            echo "<div class='cel_cabecalho' data-label='Valor'>R$ " . number_format($linha['valor'], 2, ',', '.') . "</div>";
                            
                            echo "<div class='cel_cabecalho' data-label='Ações'>";
                            echo "<form action='editar_produto.php' method='get' style='display:inline;'>";
                            echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                            echo "<button type='submit'>Editar</button>";
                            echo "</form>";

                            echo "<form action='deletar_produto.php' method='post' style='display:inline;'>";
                            echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                            echo "<button type='submit'>Deletar</button>";
                            echo "</form>";
                            echo "</div>";

                        echo "</div>";
                    }
                } else {
                    echo "<div style='text-align: center; padding: 20px; background: rgba(255,255,255,0.1); border-radius: 10px;'>Nenhum produto cadastrado</div>";
                }
                ?>
            </div>
        </section>    
    </div>
</body>
</html>