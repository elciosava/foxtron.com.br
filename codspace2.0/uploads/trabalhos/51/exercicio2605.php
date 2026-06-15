<?php
    //conectar com o banco de dados
    //primeiro declarar 4 variáveis principais que são:
    $local = 'localhost';
    $banco = 'aline';
    $usuario = 'root';
    $senha = '';

    //tentamos conectar usando nossas variáveis 
    try{
        $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $erro){
        echo "Deu ruim parça!" . $erro->getMessage();
    }

    //pra salvar as informações, ver se está salvando
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
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
    <title>Document</title>

    <style>
        /* pra tudo o que tem dentro do site*/
        *{
            margin: 0;
            padding: 0;
            font-family:Georgia, 'Times New Roman', Times, serif;
            box-sizing: border-box;
        }

        body {
            background: #e6e6e6
        }

        .resultado {
           background: white;
           padding: 10px;
           
        }

        .menu {
           background: white;
           padding: 10px 0 0 20px;
        }

        .formulario {
           background: white;
           padding: 10px;
        }

        .formulario h3{
            margin: 20px 0 20px 0;
        }

        .resultado h3{
            margin: 20px 0 20px 0;
        }

        form{
            width: 100%; /*largura*/
        }

        input{
            width: 100%; /*largura*/
            margin: 5px 0 10px 0;
            height: 28px;
            font-size: 1.0rem;
            padding: 2px;
        }

        button {
            padding: 8px 20px;
            background: #5efa59;
            color: white;
            border: none;
            font-weight: bold;
        }

        button:active{
            transform: translateY(2px);
        }

        header{
            background: white;
            height: 60px;
            padding: 10px;
            display: flex;
            justify-content: center; /*fica no centro horizontalmente*/
            align-items: center; /*fica no centro verticalmente*/
        }

        #container{
            display: grid;
            /* é igual que a coluna vai ocupar 1 fração da tela*/
            grid-template-columns: 1fr 2fr 2fr;
            gap: 10px;
            grid-template-rows: calc(100vh - 90px);
            margin-top: 10px;
        }

        li{
            list-style: "🌱";
            background: #5efa59;
            padding: 10px;
            margin-bottom: 1px;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        li:hover{
            background: #c6f7bf;
        }

        table{
            width: 100%;
            border-collapse: collapse;
        }

        td,th {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }

        tr:hover{
            background: #d3d3d3;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <!--tipo de texto-->
        <h3>CABEÇALHO</h3>
    </header>

     <!--div#container + enter (criou o conteiner para as colunas)-->
    <div id="container">
         <!--div.coluna*2 + enter (criou 2 colunas dentro do conteiner)-->

         <!--Criar Listar o menu-->
        <div class="menu">
            <nav>
                <ul>
                    <li>Home</li>
                    <li>Sobre</li>
                    <li>Conteúdo</li>
                </ul>
            </nav>
        </div>
        <div class="formulario">
            <h3>Cadastro de Professores</h3>
            <form action="" method="post">

                <label for="">Nome</label>
                <input type="text" name="nome" id="">

                <label for="">E-mail</label>
                <input type="email" name="email" id="">

                <label for="">Contato</label>
                <input type="number" name="contato" id="">

                <button type="submit">Salvar</button>
            </form>
        </div>
        <div class="resultado">
            <h3>Professores</h3>

            <table>
                <thead> <!--o thead cria op cabeçalho-->
                    <th>Nome</th> <!--o th cria as colunas-->
                    <th>E-mail</th>
                    <th>Contato</th>
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