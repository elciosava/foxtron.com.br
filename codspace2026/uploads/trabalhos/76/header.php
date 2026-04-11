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
            box-sizing: border-box;
        }

        header {
            height: 60px;
            padding: 10px 30px;
            box-shadow: 0 1px 20px gray;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        header img {
            width: 50px;
        }

        ul {
            display: flex;
            align-items: center;
            justify-content: space-around;
        }

        li {
            list-style: none;
            margin-left: 20px;
        }

        a {
            text-decoration: none;
            color: black;
        }

    </style>
</head>
<body>
    <header>
        <img src="firefox.svg" alt="logo">
        <nav>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Sobre</a></li>
                <li><a href="">Contato</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>




CREATE TABLE Clientes (
   id INT auto_increment PRIMARY KEY,
   Nome VARCHAR(100),
   Email VARCHAR(100)
);