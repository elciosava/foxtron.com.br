<?php
include 'conexao.php';

// Parte responsável por inserir novo produto no banco
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $quantidade = $_POST['quantidade'] ?? '';
    $valor = $_POST['valor'] ?? '';

    $sql = "INSERT INTO produtos (nome, quantidade, valor)
            VALUES (:nome, :quantidade, :valor)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':valor', $valor);

    if ($stmt->execute()) {
        header("Location: cadastrar_produto.php");
        exit;
    } else {
        echo "Erro ao salvar o produto!";
    }
}

// Buscar produtos para exibição
$sql = "SELECT * FROM produtos";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            color: #333;
            line-height: 1.6;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 30px;
        }

        header {
            grid-column: 1 / -1;
            text-align: center;
            margin-bottom: 30px;
            padding: 25px;
            background: linear-gradient(to right, #e53935, #e35d5b);
            color: white;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .form-section {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            height: fit-content;
        }

        .form-section h2 {
            color: #2c3e50;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid #f0f0f0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s;
        }

        input:focus {
            border-color: #e53935;
            box-shadow: 0 0 0 3px rgba(229, 57, 53, 0.2);
            outline: none;
        }

        .btn {
            display: inline-block;
            background: linear-gradient(to right, #e53935, #e35d5b);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s;
            text-align: center;
            width: 100%;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(229, 57, 53, 0.3);
        }

        .btn-edit {
            background: linear-gradient(to right, #3498db, #2980b9);
            padding: 8px 15px;
            font-size: 0.9rem;
        }

        .btn-edit:hover {
            box-shadow: 0 4px 10px rgba(52, 152, 219, 0.3);
        }

        .btn-delete {
            background: linear-gradient(to right, #e74c3c, #c0392b);
            padding: 8px 15px;
            font-size: 0.9rem;
        }

        .btn-delete:hover {
            box-shadow: 0 4px 10px rgba(231, 76, 60, 0.3);
        }

        .results-section {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        }

        .table-header {
            display: grid;
            grid-template-columns: 0.5fr 1.5fr 1fr 1fr 1.5fr;
            background: #2c3e50;
            color: white;
            padding: 15px 20px;
            font-weight: 600;
        }

        .table-row {
            display: grid;
            grid-template-columns: 0.5fr 1.5fr 1fr 1fr 1.5fr;
            padding: 15px 20px;
            border-bottom: 1px solid #f0f0f0;
            align-items: center;
        }

        .table-row:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table-row:hover {
            background-color: #f1f8ff;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .valor {
            font-weight: 600;
            color: #27ae60;
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #7f8c8d;
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #bdc3c7;
        }

        .total {
            padding: 15px 20px;
            background: #f8f9fa;
            border-top: 1px solid #e9ecef;
            font-weight: 600;
            text-align: right;
        }

        .stats {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            font-size: 0.9rem;
        }

        @media (max-width: 992px) {
            .container {
                grid-template-columns: 1fr;
            }
            
            .table-header, .table-row {
                grid-template-columns: 0.5fr 1.5fr 1fr 1.5fr;
            }
            
            .valor-header, .valor-cell {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .table-header, .table-row {
                grid-template-columns: 1fr 1fr 1fr;
                gap: 10px;
            }
            
            .id-header, .id-cell {
                display: none;
            }
            
            .actions {
                flex-direction: column;
            }
        }

        @media (max-width: 576px) {
            .table-header, .table-row {
                grid-template-columns: 1fr 1fr;
            }
            
            .quantidade-header, .quantidade-cell {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1><i class="fas fa-boxes"></i> Sistema de Produtos</h1>
            <p class="subtitle">Gerencie seu inventário de forma simples e eficiente</p>
        </header>
        
        <section class="form-section">
            <h2><i class="fas fa-plus-circle"></i> Adicionar Produto</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="nome">Nome do Produto</label>
                    <input type="text" name="nome" id="nome" placeholder="Digite o nome do produto" required>
                </div>
                
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" name="quantidade" id="quantidade" placeholder="Quantidade em estoque" min="0" required>
                </div>
                
                <div class="form-group">
                    <label for="valor">Valor (R$)</label>
                    <input type="number" name="valor" id="valor" placeholder="0.00" step="0.01" min="0" required>
                </div>
                
                <button type="submit" class="btn"><i class="fas fa-save"></i> Salvar Produto</button>
            </form>
        </section>
        
        <section class="results-section">
            <div class="table-header">
                <div class="id-header">ID</div>
                <div class="nome-header">Nome</div>
                <div class="quantidade-header">Quantidade</div>
                <div class="valor-header">Valor</div>
                <div class="acoes-header">Ações</div>
            </div>
            
            <?php if (count($produtos) > 0): ?>
                <?php 
                $totalValor = 0;
                $totalQuantidade = 0;
                ?>
                <?php foreach ($produtos as $produto): ?>
                    <?php 
                    $totalValor += $produto['valor'] * $produto['quantidade'];
                    $totalQuantidade += $produto['quantidade'];
                    ?>
                    <div class="table-row">
                        <div class="id-cell">#<?= $produto['id'] ?></div>
                        <div class="nome-cell"><?= htmlspecialchars($produto['nome']) ?></div>
                        <div class="quantidade-cell"><?= $produto['quantidade'] ?></div>
                        <div class="valor-cell valor">R$ <?= number_format($produto['valor'], 2, ',', '.') ?></div>
                        <div class="acoes-cell actions">
                            <form action="editar_produto.php" method="get" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                                <button type="submit" class="btn btn-edit"><i class="fas fa-edit"></i> Editar</button>
                            </form>
                            <form action="deletar_produto.php" method="post" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Tem certeza que deseja excluir este produto?')">
                                    <i class="fas fa-trash"></i> Excluir
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                <div class="total">
                    <div class="stats">
                        <span>Total de Produtos: <?= count($produtos) ?></span>
                        <span>Itens em Estoque: <?= $totalQuantidade ?></span>
                        <span>Valor Total: R$ <?= number_format($totalValor, 2, ',', '.') ?></span>
                    </div>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <i class="fas fa-inbox"></i>
                    <h3>Nenhum produto cadastrado</h3>
                    <p>Adicione seu primeiro produto usando o formulário ao lado.</p>
                </div>
            <?php endif; ?>
        </section>
    </div>

    <script>
        // Adicionar máscara para o campo de valor
        document.addEventListener('DOMContentLoaded', function() {
            const valorInput = document.getElementById('valor');
            
            if (valorInput) {
                valorInput.addEventListener('input', function() {
                    // Formatar o valor para ter sempre duas casas decimais
                    let value = this.value.replace(/\D/g, '');
                    value = (value / 100).toFixed(2);
                    this.value = value;
                });
            }
        });
    </script>
</body>
</html>