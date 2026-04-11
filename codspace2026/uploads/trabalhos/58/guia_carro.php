<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Guia de Veículos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 50px;
            padding: 5px;
            background: #a1fa2d;
            box-shadow: 0 1px 20px #e09e04;
            width: 100%;
        }

        section:last-of-type {
            display: flex;
            gap: 10px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .card {
            text-align: center;
        }

        h2, h1 {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn {
            background: linear-gradient(135deg, #e50000, #c85d00);
            border: none;
            padding: 10px 15px;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            opacity: 0.8;
        }

        .sair {
            background: linear-gradient(135deg, #ff4b5c, #ff0000);
        }
    </style>
</head>

<body>

<header class="topo">

    <h1>Guia de Veículos</h1>

    <div class="area-usuario">

        <?php if (isset($_SESSION['usuario'])) { ?>

            <span>Bem-vindo(a), <?php echo $_SESSION['usuario']; ?></span>

            <a href="propulsor.php">
                <button class="btn">Cadastro de carro</button>
            </a>

            <form action="logout.php" method="POST" style="display:inline;">
                <button class="btn sair">Sair</button>
            </form>

        <?php } else { ?>

            <a href="logar.php">
                <button class="btn">Login</button>
            </a>

            <a href="cadastro.php">
                <button class="btn">Cadastrar-se</button>
            </a>

        <?php } ?>

    </div>

</header>

<section>
    <h2>Sobre o Site</h2>
    <p>
        Este site tem a intenção de ajudar a entender como os carros são,
        fazendo com que as pessoas tenham um melhor entendimento sobre cada tipo
        de veículo e também para que tipo de trabalho cada veículo serve.
    </p>

    <?php if (isset($_SESSION['usuario'])) { ?>
        <h1>Bem-vindo(a), <?php echo $_SESSION['usuario']; ?>!</h1>
    <?php } ?>

</section>

<section>

    <div class="card">
        <a href="passeio.html">
            <img src="volvo.png" width="300">
        </a>
        <h3>Volvo 90XC</h3>
    </div>

    <div class="card">
        <a href="caminhao.html">
            <img src="Scania.png" width="300">
        </a>
        <h3>Scania R164 V8</h3>
    </div>

    <div class="card">
        <a href="moto.html">
            <img src="harley.png" width="300">
        </a>
        <h3>Harley-Davidson Sportster 1200 SPORTSTER S</h3>
    </div>

    <div class="card">
        <a href="jacare.html">
            <img src="jacare111.png" width="300">
        </a>
        <h3>Scania Jacaré 111</h3>
    </div>

    <div class="card">
        <a href="caravan.html">
            <img src="caravan.png" width="300">
        </a>
        <h3>Chevrolet Caravan SS</h3>
    </div>

    <div class="card">
        <a href="brasilia.html">
            <img src="brasilia.png" width="300">
        </a>
        <h3>Volkswagen Brasilia</h3>
    </div>

    <div class="card">
        <a href="cg.html">
            <img src="cg.png" width="300">
        </a>
        <h3>Honda CG 150</h3>
    </div>

    <div class="card">
        <a href="f1000.html">
            <img src="f1000.png" width="300">
        </a>
        <h3>Ford F1000</h3>
    </div>

    <div class="card">
        <a href="crf.html">
            <img src="crf.png" width="300">
        </a>
        <h3>Honda CRF 450</h3>
    </div>

    <div class="card">
        <a href="cbr.html">
            <img src="cbr.png" width="300">
        </a>
        <h3>Honda CBR 1000RR</h3>
    </div>

    <div class="card">
        <a href="787b.html">
            <img src="787b.png" width="300">
        </a>
        <h3>Mazda 787B</h3>
    </div>

    <div class="card">
        <a href="z1000.html">
            <img src="z1000.png" width="300">
        </a>
        <h3>Kawasaki Z 1000</h3>
    </div>

</section>

</body>
</html>