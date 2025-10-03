<?php
    ini_set('display_errors', 0);
    $nome = $_GET['nome'];
    $email = $_GET['email'];
    $senha = $_GET['senha'];

    $nome1 = $_GET['nome1'];
    $email1 = $_GET['email1'];
    $senha1 = $_GET['senha1'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }
    .icones img {
        width: 30px;
        height: 30px;
        margin-left: 20px;
    }
    header {
        display: flex;
        justify-content: space-around;
        align-items: center;
        height: 50px;
        padding: 10px;
        margin: 10px;
    }
    .icones {
        display:flex;
        justify-content: center;
        align-items: center;
    }
    .inicio {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
    }
    form {
        width: 350px;
    }
    .coluna input {
        width: 100%;
        padding: 5px;
        font-size: 1.1rem;
    }
    .coluna {
        background: grey;
        height: calc(100vh - 70px);
        display: flex;
        justify-content: center;
        padding-top: 40px;
    }
    button {
        padding: 10px 20px;
        margin-top: 20px;
        background: rgb(255, 145, 123);
    }
</style>
<body>
    <header>
        <h2>Luiz</h2>
        <input type="search" name="busca" id="">
        <div class="icones">
            <img src="user.svg" alt=""><span>My account</span>
            <img src="heart.svg" alt=""><span>Favorites</span>
            <img src="cart.svg" alt=""><span>My cart</span>
        </div>
    </header>

    <section class="inicio">
        <div class="coluna">
        <form action="" method="get">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="">

            <label for="email">Email</label>
            <input type="email" name="email" id="">

            <label for="senha">Senha</label>
            <input type="password" name="senha" id="">

            <button type="submit">Enviar</button>
            </form>
        </div>

        <div class="coluna">
        <form action="" method="get">
            <label for="nome">Nome</label>
            <input type="text" name="nome1" id="" value="<?php echo $nome; ?>">

            <label for="email">Email</label>
            <input type="email" name="email1" id="" value="<?php echo $email; ?>">

            <label for="senha">Senha</label>
            <input type="password" name="senha1" id="" value="<?php echo $senha; ?>">

            <button type="submit">Enviar</button>
            </form>
        </div>
        <div class="coluna">
        <div class="coluna"><?php echo $nome1; ?></div>
        <div class="coluna"><?php echo $email1; ?></div>
        <div class="coluna"><?php echo $senha1; ?></div>
        </div>
    </section>
</body>
</html>