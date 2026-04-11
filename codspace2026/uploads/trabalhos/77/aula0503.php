<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background: #ffffff;;
}

header{
    background: #f200ff;
    padding:15px 0;
}

nav ul{
    list-style:none;
    display:flex;
    justify-content:center;
    gap:30px;
}

nav ul li a{
    text-decoration:none;
    color:white;
    font-size:18px;
    padding:8px 15px;
    border-radius:5px;
}

nav ul li a:hover{
    background-color: #8d11a3;
}

</style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="cadastrar_usuario.php">Cadastrar Usuario</a></li>
                <li><a href="cadastrar_endereco.php">Cadastrar Endereço</a></li>
            </ul>
        </nav>
</header>
</body>
</html>