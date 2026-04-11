<?php
    include 'conexao.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $data_nascimneto = $_POST['data_nascimento'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        $sql = "INSERT INTO clientes (nome, sobrenome, data_nascimento, email, telefone)
                VALUES (:nome, :sobrenome, :data_nascimento, :email, :telefone)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':data_nascimento', $data_nascimento);
        $stmt->bindParam(':email', $emai);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->execute();

        echo "deu boa gurizada";
    }else{
        echo "num deu coisa. " ;
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
            padding: 0;
            margin: 0;
        }
         input,select {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 5px;
        }
         h2 {
            text-align: center;
            color: rgba(33, 201, 33, 0.34);
            margin-bottom: 20px;
            font-size: 1.8rem;
        }

         form {
            width: 350px;
        }
         body {
            background: linear-gradient(to top, rgba(244, 2, 2, 1), rgba(255, 255, 255, 1));
            font-family: Verdana;
            flex-direction: column;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
         .form-box {
            background-colorrgba(216, 41, 41, 0.84);
            border: 3px solid rgba(202, 43, 43, 1);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 20px;
        }
         button {
            background-color: rgba(206, 27, 27, 0.93);
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            margin-top: 2px;
        }
    </style>

</head>
<body>

          <div class="form-box">
        <form action="" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="">

            <label for="sobrenome">sobrenome</label>
            <input type="text" name="sobrenome" id="">

            <label for="data_nascimento">data_nascimneto</label>
            <input type="text" name="data_nascimento" id="">

            <label for="email">email</label>
            <input type="text" name="email" id="">

            <label for="telefone">telefone</label>
            <input type="text" name="telefone" id="">
            <button type="submit">Salvar</button>
        </form>

        <section id="resultado">
            <?php
                $resultado = "SELECT * FROM `clientes`";
                $stmt = $conexao->prepare($resultado);
                $stmt->execute();

                //cabecalho da nossa tabela
                if($stmt->rowCOunt()>0){
                    echo "<table>";
                        echo "<tr>
                           <th>Nome</th>
                           <th>Sobrenome</th>
                           <th>Data</th>
                           <th>Email</th>
                           <th>Telefone</th>
                           </tr>";
                    

                    while ($clientes = $stmt->fetch(PDO::FETCH_ASSOC)){
                        echo "<tr>";
                        echo "<td>{$clientes['nome']}</td>";
                        echo "<td>{$clientes['sobrenome']}</td>";
                        echo "<td>{$clientes['data']}</td>";
                        echo "<td>{$clientes['email']}</td>";
                        echo "<td>{$clientes['telefone']}</td>";
                        echo "</tr>";

                      
                    }
                      echo "</table>";
                }
            ?>
    </section>
    </div>  
</body>
</html>
    
