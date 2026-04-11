<?php 
    $local = 'localhost';
    $banco = 'senai';
    $usuario = 'root';
    $senha = '';

    try {
        $conexao = new PDO("mysql:host=$local;dbname=$banco", $usuario, $senha);

        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM usuario";

        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e){
        echo ("nao deu");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
*{
    margin: 0;
    padding: 0;
}
header{
    height: 60px;
}
li{
    list-style: none;
    padding: 10px;
    margin-left: 10px;
    background: #c8c8c8;
    margin-top: 2px;
}
a{

    color: black;
    text-decoration: none;
}
.container{
    display: grid;
    grid-template-columns: 1fr 4fr;
    gap: 5px;
}

.coluna{
background: #5840dca1;
height: calc(100vh - 60px);
}

li:hover{
    background: blueviolet;
    color: purple;
}

form{
    width: 400px;
}

input{
    width: 100%;
    box-sizing: border-box;
    margin-bottom: 10px;
    padding: 2px;
}

.colorido{
    color: aqua;
}

.meio {
    display: flex;
    justify-content: center;
    padding-top: 20px;
}
    </style>
</head>

<body>
    <header>
        <section class="inicio">
            <div class="container">
                <div class="coluna">
                    <nav>
                        <ul>
                            <li><a href="">Cadastrar Usuario</a></li>
                            <li><a href="">Cadastrar Produto</a></li>
                            <li><a href="">Vendas</a></li>
                            <li><a href="">Contato</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="coluna meio">
                    <form action="" method="post">

                    <label for="nome">nome</label>
                    <input type="text" name="" id="">

                      <label for="email">email</label>
                    <input type="email" name="email" id="">

                      <label for="senha">senha</label>
                    <input type="password" name="senha" id="">

                    <button type="submit">salvar</button>
                    </form>
                </div>
            </div>

        </section>
    </header>
    <section class="resultados">
        <div class="container">

        </div>
    </section>
</body>

</html>