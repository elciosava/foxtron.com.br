<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        background: linear-gradient(135deg, #f8f9fc, #e6ecff);
        animation: fadeInBody 1s ease-in;
    }

    /* Animação para o corpo aparecer suavemente */
    @keyframes fadeInBody {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    header {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        animation: slideDown 1s ease-out;
    }

    /* Header desce suavemente ao aparecer */
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
        animation: fadeInNav 1.5s ease-in-out;
    }

    /* Cada item do menu entra com leve atraso */
    li {
        margin: 10px 0;
        border: solid 1px black;
        width: 200px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 8px;
        background-color: #ffffff;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        opacity: 0;
        animation: fadeUp 0.8s ease forwards;
    }

    /* Animação de entrada gradual para os itens do menu */
    li:nth-child(1) { animation-delay: 0.3s; }
    li:nth-child(2) { animation-delay: 0.5s; }
    li:nth-child(3) { animation-delay: 0.7s; }
    li:nth-child(4) { animation-delay: 0.9s; }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    a {
        text-decoration: none;
        color: black;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    a:hover {
        color: #0031b8;
    }

    li:hover {
        background-color: #f0f4ff;
        transform: translateY(-3px) scale(1.03);
        box-shadow: 0 4px 12px rgba(0, 49, 184, 0.2);
    }

    button {
        margin-top: 30px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border: none;
        color: white;
        border-radius: 5px;
        background-color: #0031b8;
        transition: all 0.3s ease;
        animation: fadeInButton 1.5s ease-in-out;
    }

    @keyframes fadeInButton {
        from {
            opacity: 0;
            transform: translateY(15px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    button:hover {
        background-color: #00409f;
        transform: translateY(-3px);
        box-shadow: 0 4px 10px rgba(0, 49, 184, 0.3);
    }
</style>

</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="cadastro_aluno.php">Cadastro Aluno</a></li>
                <li><a href="cadastro_reserva.php">Cadastro Reserva</a></li>
                <li><a href="cadastro_pc.php">Cadastro PC</a></li>
            </ul>
        </nav>

    </header>
</body>
</html>
