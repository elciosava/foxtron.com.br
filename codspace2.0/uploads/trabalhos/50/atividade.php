<?php 
    //crio 4 variáveis para o banco de dados
    $local = 'localhost';
    $banco = 'pedro';
    $usuario = 'root';
    $senha = '';

    //tentamos conectar usando nossas variáveis
    try {
        $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$senha);
        $conexao ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $erro){
        echo "Deu ruim parsa!" . $erro->getMessage();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
    $nome = $_POST['nome'] ?? null;
    $email = $_POST['email'] ?? null;
    $contato = $_POST['contato'] ?? null;

    $sql = "INSERT INTO professores (nome_professor, email_professor, contato_professor)
                        VALUES (:nome, :email, :contato)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':contato', $contato);
    $stmt->execute();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>67</title>
    <Style>
        * {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            
        }
        body {
            background-color: aliceblue;
        }
        .resultado {
            background-color: white;
             padding:10px;  
        }

        .menu {
            background-color: white;
            padding:10px;

        }

        .formulario h3 {
            margin: 20px 0 20px 0;
        }

        .resultado h3 {
            margin: 20px 0 20px 0;
        }

        header {
            background-color: white;
            height: 60px;
            padding:10px;
             display: flex;
             justify-content: center;
             align-items: center;
           
        }
        #container {
            display: grid;
            grid-template-columns: 1fr 2fr 2fr;
            gap: 10px;
            grid-template-rows: calc(100vh - 90px);
            margin-top: 10px ;
        }
        li {
            list-style: none;
            background-color: bisque;
            padding: 10px;
            margin-bottom: 2px; 
            color: white;
            font-weight: bold;
            cursor: pointer;

        }

        li:hover{
            background-color: azure;
        }

        form {
            width: 100%;
        }

        input {
            width: 100%;
            margin: 5px 0 10px 0;
            height: 28px;
            font-size: 1.0rem;
            padding: 2px;
        }

.formulario h3 {
    margin: 20px 0 20px 0;

}

button {
    padding: 8px 19px;
    background-color: darkmagenta;
    color: white;
    border: none;

}

button:active {
    transform: translateY(2px);
}
table{
    width: 100%;
    border-collapse: collapse;
} 
td, th {
    border: 1px solid black;
    padding: 5px;
    text-align: left;
}
tr:hover{
    background: #d3d3d3;
    cursor: pointer;
    
}
    </Style>
</head>
<body><header>
    <h3>CABECALHO</h3>
</header>
    
    <div id="container">
        <div class="MENU">
            <nav>
                <ul>
                    <li>Home</li>
                    <li>Sobre</li>
                    <li>Contato</li>
                </ul>
            </nav>
        </div>
        <div class="formulario">
            <h3>Cadastro de professores</h3>
            <form action="" method="post">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="">

                <label for="email">Email</label>
                <input type="email" name="email" id="">

                <label for="contato">Contato</label>
                <input type="number" name="contato" id="">

                <button type="submit">Salvar</button>
            </form>
        </div>
        <div class="resultado">
            <h3>Professores</h3>

            <table>
                <thead>
                    <th>Nome</th><th>Email</th><th>Contato</th>
                </thead>
            
            <?php
                $sql_busca = "SELECT * FROM professores";

                $stmt_busca = $conexao->prepare($sql_busca);
                $stmt_busca->execute();

                while($professores = $stmt_busca->fetch(PDO::FETCH_ASSOC)){
                    echo "<tbody>";
                        echo "<tr>";
                            echo "<td>{$professores['nome_professor']}</td>";
                            echo "<td>{$professores['email_professor']}</td>";
                            echo "<td>{$professores['contato_professor']}</td>";
                        echo "</tr>";
                    echo "</tbody>";
                }
             ?>
            </table>
        </div>
    </div>
</body>
</html>