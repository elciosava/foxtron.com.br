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
       * {
    box-sizing: border-box;
    margin: 5;
    padding: 10;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f7f8;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    padding: 20px;
    color: #333;
}

.container {
    background-color: #fff;
    padding: 100px 100px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 450px;
}

h1 {
    text-align: center;
    margin-bottom: 25px;
    font-weight: 700;
}

label {
    display: block;
    margin-top: 20px;
    margin-bottom: 8px;
    font-weight: 600;
    color: #555;
}

input[type="text"],
select {
    width: 100%;
    padding: 12px 15px;
    border: 1.8px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus,
select:focus {
    border-color: #007BFF;
    outline: none;
    box-shadow: 0 0 8px rgba(0,123,255,0.3);
}

button {
    margin-top: 50px;
    width: 50%;
    background-color: #007BFF;
    border: none;
    padding: 14px 0;
    border-radius: 10px;
    color: white;
    font-size: 18px;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

/* Responsividade simples */
@media (max-width: 500px) {
    .container {
        padding: 20px;
    }

    input[type="text"],
    select {
        font-size: 14px;
    }

    button {
        font-size: 16px;
        padding: 5px 0;
    }
}
        
    </style>
</head>
<body>
    <section class="inicio">
        <div class="container">
            <form action="" method="post">
                <label for="nome">nome</label>
                <input type="text" name="nome" id="">

                <label for="sobrenome">sobrenome</label>
                <input type="text" name="sobrenome" id="">

                <label for="cpf">cpf</label>
                <input type="text" name="cpf" id="">

                <label for="endereco">endereco</label>
                <select name="endereco" id="">
                    <?php
                    while($endereco = $stmt->fetch(PDO::FETCH_ASSOC)){
                        echo "<option velue='{$endereco['id']}'>{$endereco['nome']}</option>";
                    }

                    
                    


                    ?>

                </select>
                <button type="submit">salvar</button>

            </form>
        </div>
    </section>
    
</body>
</html>