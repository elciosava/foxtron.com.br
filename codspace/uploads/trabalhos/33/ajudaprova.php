<?php
// Espaço reservado para código PHP
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comandos SQL e PHP</title>
    <style>
        /* ====== ESTILO GERAL ====== */
        body {
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #e9e2ff, #f7f5ff);
            color: #333;
        }

        header {
            text-align: center;
            background: linear-gradient(135deg, #7e57c2, #9575cd);
            color: white;
            padding: 40px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            letter-spacing: 1px;
        }

        header h1 {
            margin: 0;
            font-size: 2.2em;
        }

        header p {
            margin-top: 10px;
            font-size: 1.1em;
            opacity: 0.9;
        }

        /* ====== CONTAINER PRINCIPAL ====== */
        main {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            padding: 40px;
        }

        /* ====== CARTÃO ====== */
        .card {
            background-color: #ffffff;
            border-radius: 15px;
            width: 420px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.25s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background: linear-gradient(135deg, #9575cd, #7e57c2);
            color: white;
            text-align: center;
            padding: 15px 0;
        }

        .card-header h2 {
            margin: 0;
            font-size: 1.5em;
            letter-spacing: 1px;
        }

        .card-content {
            padding: 20px;
        }

        .texto {
            margin-bottom: 20px;
            border-left: 5px solid #7e57c2;
            padding-left: 10px;
        }

        .texto p {
            margin: 0;
            line-height: 1.5;
        }

        .quadrinho {
            background: #f1ebff;
            border-radius: 10px;
            padding: 15px;
            font-family: "Fira Code", monospace;
            white-space: pre-line;
            border-left: 5px solid #9575cd;
            color: #2c1b6e;
        }

        /* ====== RESPONSIVO ====== */
        @media (max-width: 768px) {
            main {
                flex-direction: column;
                align-items: center;
            }

            .card {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>Comandos SQL e PHP</h1>
        <p>Resumo visual dos principais comandos e funções</p>
    </header>

    <main>
        <!-- INSERT -->
        <div class="card">
            <div class="card-header">
                <h2>INSERT</h2>
            </div>
            <div class="card-content">
                <div class="texto">
                    <p><strong>Função:</strong> Usado para adicionar novos dados em uma tabela.
                        Pode receber informações diretamente de variáveis ou
                        de campos em um formulário.
                    </p>
                </div>
                <div class="quadrinho">
                    INSERT INTO clientes (nome, idade, cidade)
                    VALUES ('João', 30, 'São Paulo');
                </div>
            </div>
        </div>

        <!-- SELECT -->
        <div class="card">
            <div class="card-header">
                <h2>SELECT</h2>
            </div>
            <div class="card-content">
                <div class="texto">
                    <p><strong>Função:</strong> Usado para consultar e recuperar dados de uma tabela.</p>
                </div>
                <div class="quadrinho">
                    SELECT * FROM clientes WHERE condição;
                </div>
            </div>
        </div>

        <!-- UPDATE -->
        <div class="card">
            <div class="card-header">
                <h2>UPDATE</h2>
            </div>
            <div class="card-content">
                <div class="texto">
                    <p><strong>Função:</strong> Usado para atualizar os dados existentes em uma tabela.</p>
                </div>
                <div class="quadrinho">
                    UPDATE clientes SET coluna1 = valor1 WHERE condição;
                </div>
            </div>
        </div>

        <!-- DELETE -->
        <div class="card">
            <div class="card-header">
                <h2>DELETE</h2>
            </div>
            <div class="card-content">
                <div class="texto">
                    <p><strong>Função:</strong> Usado para remover dados de uma tabela.</p>
                </div>
                <div class="quadrinho">
                    DELETE FROM clientes WHERE condição;
                </div>
            </div>
        </div>

        <!-- CREATE -->
        <div class="card">
            <div class="card-header">
                <h2>CREATE</h2>
            </div>
            <div class="card-content">
                <div class="texto">
                    <p><strong>Função:</strong> Usado para criar uma tabela no banco de dados.</p>
                </div>
                <div class="quadrinho">
                    CREATE TABLE nome_da_tabela (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    coluna2 TIPO_DADOS
                    );
                </div>
            </div>
        </div>

        <!-- VARIÁVEL -->
        <div class="card">
            <div class="card-header">
                <h2>VARIÁVEL</h2>
            </div>
            <div class="card-content">
                <div class="texto">
                    <p><strong>Função:</strong> Variáveis podem armazenar informações fixas
                        ou receber dados de um formulário.
                    </p>
                </div>
                <div class="quadrinho">
                    $nome = "João";
                    $nome = $_POST['nome'];
                </div>
            </div>
        </div>

        <!-- IF -->
        <div class="card">
            <div class="card-header">
                <h2>IF</h2>
            </div>
            <div class="card-content">
                <div class="texto">
                    <p><strong>Função:</strong> Verifica se uma condição é verdadeira antes de executar um bloco de código.</p>
                </div>
                <div class="quadrinho">
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // código a ser executado se a condição for verdadeira
                    }
                </div>
            </div>
        </div>

        <!-- CONEXÃO -->
        <div class="card">
            <div class="card-header">
                <h2>CONEXÃO</h2>
            </div>
            <div class="card-content">
                <div class="texto">
                    <p><strong>Função:</strong> Faz a ligação do banco de dados à sua página.</p>
                </div>
                <div class="quadrinho">
                    $local = "localhost";
                    $usuario = "root";
                    $senha = "";
                    $banco = "nome_do_banco";
                </div>
            </div>
        </div>
    </main>
</body>

</html>