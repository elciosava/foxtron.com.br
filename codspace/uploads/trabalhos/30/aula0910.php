<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

*{
    margin: 0;
    padding: 0;
}
.container{
    width: 300px;
}
input{
    width: 100%;
}
body{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: #0BE3E3;
}
    </style>
</head>
<body>
    <section class="usuario">
        <div class="container">
            <form action="gravarusuario.php"method="post">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="">

                <label for="email">Email</label>
                <input type="text" name="email" id="">

                <label for="senha">Senha</label>
                <input type="password" name="senha" id="">

                <button type="submit">Salvar</button>



            </form>
        </div>
    </section>
</body>
</html>