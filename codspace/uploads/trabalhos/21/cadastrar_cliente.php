<?php
    include 'conexao.php';

    $sql = "SELECT * FROM `endereco`";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Reset básico */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            color: #444;
        }

        .container {
            background: #fff;
            padding: 40px 45px;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 480px;
            transition: transform 0.3s ease;
        }

        .container:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 40px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            color: #3f3d56;
            margin-bottom: 30px;
            font-weight: 700;
            letter-spacing: 1.2px;
            font-size: 28px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
            font-size: 15px;
            user-select: none;
        }

        input[type="text"], select {
            padding: 14px 16px;
            margin-bottom: 25px;
            border: 2px solid #ddd;
            border-radius: 12px;
            font-size: 17px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            background-color: #fafafa;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.06);
        }

        input[type="text"]:focus, select:focus {
            border-color: #6c63ff;
            outline: none;
            box-shadow: 0 0 8px rgba(108, 99, 255, 0.5);
            background-color: #fff;
        }

        button {
            padding: 15px;
            font-size: 18px;
            background: linear-gradient(45deg, #6c63ff, #8f79f3);
            color: white;
            font-weight: 700;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            box-shadow: 0 6px 15px rgba(108, 99, 255, 0.4);
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }

        button:hover {
            background: linear-gradient(45deg, #574fd6, #6c63ff);
            box-shadow: 0 8px 20px rgba(87, 79, 214, 0.6);
        }

        /* Placeholder styling for better UI */
        input::placeholder {
            color: #bbb;
            font-style: italic;
        }

        /* Responsive adjustments */
        @media (max-width: 480px) {
            .container {
                padding: 30px 25px;
            }
        }
    </style>
</head>
<body>
    <section class="inicio">
        <div class="container">
            <form action="" method="post">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome">

                <label for="sobrenome">Sobrenome</label>
                <input type="text" name="sobrenome" id="sobrenome">

                <label for="cpf">Cpf</label>
                <input type="text" name="cpf" id="cpf">

                <label for="endereco">Endereço</label>
                <select name="endereco" id="endereco">
                    <?php
                        while($endereco = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo "<option value='{$endereco['id']}'>{$endereco['nome']}</option>";
                        }
                    ?>
                </select>
                <button type="submit">Salvar</button>
            </form>
        </div>
    </section>
</body>
</html>
