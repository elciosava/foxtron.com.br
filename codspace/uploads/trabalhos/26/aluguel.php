<?php 
include 'conexao.php';

// Busca os clientes
$sql_clientes = "SELECT * FROM clientex";
$stmt_clientes = $conexao->prepare($sql_clientes);
$stmt_clientes->execute();

// Busca os carros
$sql_carros = "SELECT * FROM carros";
$stmt_carros = $conexao->prepare($sql_carros);
$stmt_carros->execute();

// Tratamento do formulário
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_carros = $_POST['id_carros'] ?? null;
    $id_clientex = $_POST['id_clientex'] ?? null;

    if($id_carros && $id_clientex){
        $sql = "INSERT INTO aluguel (id_carros, id_clientex)
                VALUES (:id_carros, :id_clientex)";
        $stmt_insert = $conexao->prepare($sql);
        $stmt_insert->bindParam(':id_carros', $id_carros);
        $stmt_insert->bindParam(':id_clientex', $id_clientex);
        $stmt_insert->execute();

        echo "<div class='alert success'>✅ Felizmente a tesoura não comeu!</div>";
    } else {
        echo "<div class='alert warning'>⚠️ Campos inválidos!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Aluguel</title>
    <style>
        /* Reset simples */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        section {
            width: 100%;
            max-width: 400px;
        }

        .container {
            background: #fff;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 1.5rem;
            font-size: 1.4rem;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        label {
            font-weight: 600;
            color: #555;
        }

        select {
            padding: 0.7rem;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
            transition: border 0.3s ease;
        }

        select:focus {
            border-color: #007bff;
        }

        button {
            background: #007bff;
            color: white;
            border: none;
            padding: 0.8rem;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.3s ease, transform 0.2s;
        }

        button:hover {
            background: #0056b3;
            transform: scale(1.03);
        }

        .alert {
            text-align: center;
            margin-bottom: 1rem;
            padding: 0.7rem;
            border-radius: 8px;
            font-weight: 500;
        }

        .success {
            background: #d4edda;
            color: #155724;
        }

        .warning {
            background: #fff3cd;
            color: #856404;
        }

        @media (max-width: 500px) {
            .container {
                margin: 1rem;
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <section>
        <div class="container">
            <h1>Cadastro de Aluguel 🚗</h1>
            <form action="" method="post">
                <label for="cliente">Cliente</label>
                <select name="id_clientex" id="cliente" required>
                    <option value="">Selecione o cliente</option>
                    <?php while ($clientex = $stmt_clientes->fetch(PDO::FETCH_ASSOC)): ?>
                        <option value="<?= $clientex['id'] ?>"><?= htmlspecialchars($clientex['nome']) ?></option>
                    <?php endwhile; ?>
                </select>

                <label for="carros">Carro</label>
                <select name="id_carros" id="carros" required>
                    <option value="">Selecione o carro</option>
                    <?php while ($carros = $stmt_carros->fetch(PDO::FETCH_ASSOC)): ?>
                        <option value="<?= $carros['id'] ?>"><?= htmlspecialchars($carros['marca']) ?></option>
                    <?php endwhile; ?>
                </select>

                <button type="submit">Enviar</button>
            </form>
        </div>
    </section>
</body>
</html>
