<?php
    include 'conexao.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome = $_POST ['nome'];
        $sobrenome = $_POST ['sobrenome'];
        $data_nascimento = $_POST ['data_nascimento'];
        $email = $_POST ['email'];
        $telefone = $_POST ['telefone'];

        $sql = "INSERT INTO clientes (nome, sobrenome, data_nascimento, email, telefone)
            VALUES (:nome, :sobrenome, :data_nascimento, :email, :telefone)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':data_nascimento', $data_nascimento);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->execute();

        echo "deu boa galeris";
    } else{
        echo "num deu nao fi";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {          
        font-family: "Poppins", Verdana, sans-serif;
        background: linear-gradient(135deg, #459fe9ff 0%, #000000ff 100%);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #333;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .form-box {
        background: rgba(255, 255, 255, 0.95);
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        padding: 30px 25px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        width: 350px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .form-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
    }

    h2 {
        text-align: center;
        color: #222;
        font-size: 1.9rem;
        font-weight: 600;
        margin-bottom: 25px;
    }

    input, select {
        width: 100%;
        padding: 10px 12px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 1rem;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    input:focus, select:focus {
        border-color: #65b3e7;
        box-shadow: 0 0 5px rgba(101, 179, 231, 0.5);
        outline: none;
    }

    button {
        width: 100%;
        padding: 10px;
        background: linear-gradient(135deg, #000000, #434343);
        border: none;
        border-radius: 6px;
        font-weight: 600;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    button:hover {
        background: linear-gradient(135deg, #434343, #000000);
        transform: scale(1.02);
    }

    .cabecalho {
        display: flex;
        justify-content: space-around;
        align-items: center;
        border: 2px solid #333;
        background: #f3f3f3;
        border-radius: 8px 8px 0 0;
        width: 1000px; 
        padding: 10px;
    }
    .cel_cabecalho {
        width: 180px;
        text-align: center;
        font-weight: 600;
        color: #444;
    }

    .linha {
        display: flex;
        justify-content: space-around;
        align-items: center;
        border: 1px solid #ccc;
        padding: 10px;
        background-color: #fff;
        transition: background-color 0.2s ease;
    }
    .linha:nth-child(even) {
        background-color: #f9f9f9;
    }
    .linha:hover {
        background-color: #eaf6ff;
    }

    .resultado {
        margin-top: 25px;
        width: 100%;
        text-align: center;
    }
    table{
        color:white;
    }
    </style>
</head>
<body>
    <form action="" method="post">
        <label for="nome"> nome </label>    
        <input type="text" name="nome" id="">

        <label for="sobrenome"> sobrenome </label>
        <input type="text" name="sobrenome" id="">

        <label for="data_nascimento"> data de nascimento </label>
        <input type="date" name="data_nascimento" id="">

        <label for="email"> email </label>
        <input type="email" name="email" id="">

        <label for="telefone"> telefone </label>
        <input type="number" name="telefone" id="">

        <button type="submit"> enviar </button>
        
    </form>

    <section id="resultado">
        <?php
            $resultado ="SELECT * FROM `clientes`";
            $stmt = $conexao->prepare($resultado);
            $stmt->execute();

            if($stmt->rowCount()>0) {
                echo "<table border='1'>";
                    echo "<tr>
                         <th> nome </th>
                             <th> sobreome </th>
                             <th> data nascimento </th>
                             <th> email </th>
                             <th> telefone </th>
                    </tr>";

                while ($clientes = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr>";
                    echo "<td>{$clientes['nome']}</td>";
                    echo "<td>{$clientes['sobrenome']}</td>";
                    echo "<td>{$clientes['data_nascimento']}</td>";
                    echo "<td>{$clientes['email']}</td>";
                    echo "<td>{$clientes['telefone']}</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        ?>
    </section>
    
</body>
</html>