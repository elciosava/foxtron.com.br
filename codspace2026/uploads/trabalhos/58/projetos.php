<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projetos</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        header{
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 50px;
            padding: 5px;
            background: #0f04de;
        }

        header img{
            width: 25px;
        }

        ul{
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        li{
            list-style: none;
            margin-left: 20px;
            display: flex;
            align-items: center;
        }

        input[type="search"]{
            width: 250px;
            padding: 5px;
            font-size: 1.1em;
            border-radius: 20px;
        }

        .container{
            display: flex;
            justify-content: center;
            gap: 1px;
        }

        .container img{
            width: 100%;
            height: calc(100vh - 60px);
        }

    </style>
</head>
<body>
    <header>
        <h2>Projetos Bagaliticos</h2>
        <input type="search" name="" id="">
        <nav>
            <ul>
                <li>Peixinho na Brasa</li>
                <li>Kaiser na Mon</li>
                <li>Só pra quem pode</li>
            </ul>
        </nav>
    </header>
    <section class="inicio">
        <div class="container">
            <img src="smoke.png" alt="">
            <img src="dancing.png" alt="">
            <img src="fall.png" alt="">
        </div>
    </section>
</body>
</html>