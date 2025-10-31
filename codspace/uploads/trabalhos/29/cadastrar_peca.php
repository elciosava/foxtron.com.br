<?php
    include 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
       
body {
    font-family: 'Trebuchet MS', sans-serif;
    background: linear-gradient(135deg, #ff0000, #000000, #ffffff);
    background-size: 400% 400%;
    animation: trocaCoresSPFC 10s ease infinite;
    color: #fff;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 0;
    min-height: 100vh;
}


@keyframes trocaCoresSPFC {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}


h1 {
    text-align: center;
    margin-top: 20px;
    font-size: 2.4rem;
    letter-spacing: 2px;
    text-shadow: 2px 2px 10px #ff0000, 0 0 20px #000;
    color: #fff;
}


.meio {
    display: flex;
    justify-content: center;
    margin-top: 30px;
}

form {
    width: 320px;
    background-color: rgba(0, 0, 0, 0.8);
    border: 2px solid #ff0000;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 0 15px #000, 0 0 25px #ff0000;
    transition: 0.3s;
}

form:hover {
    box-shadow: 0 0 25px #ffffff, 0 0 40px #ff0000;
}

label {
    font-weight: bold;
    color: #ff0000;
}

input, select {
    width: 100%;
    padding: 8px;
    margin: 8px 0 15px 0;
    border-radius: 5px;
    border: none;
    font-size: 1rem;
}

input[type="text"], select {
    background-color: #f1f1f1;
    color: #000;
    transition: 0.3s;
}

input:focus, select:focus {
    outline: none;
    border: 1px solid #ff0000;
    box-shadow: 0 0 10px #ff0000;
}


button.submit {
    width: 100%;
    background: linear-gradient(90deg, #ff0000, #000000, #ffffff);
    background-size: 200% 200%;
    color: white;
    padding: 10px;
    border: none;
    font-size: 1rem;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.4s;
    animation: btnSPFC 6s infinite alternate ease-in-out;
}

@keyframes btnSPFC {
    0% { background-position: 0% 50%; }
    100% { background-position: 100% 50%; }
}

button.submit:hover {
    transform: scale(1.05);
    box-shadow: 0 0 15px #ffffff, 0 0 25px #ff0000;
}


.cabecalho, .linha {
    display: flex;
    justify-content: center;
    text-align: center;
}

.cabecalho {
    background-color: #ff0000;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    padding: 10px 0;
    margin-top: 40px;
    border-radius: 8px 8px 0 0;
    box-shadow: 0 0 15px #000;
}

.linha {
    display: flex;
    border: solid 1px #000;
    padding: 5px 10px;
}

.linha:nth-child(even) {
    background-color: rgba(255,255,255,0.1);
}

.linha:nth-child(odd) {
    background-color: rgba(0,0,0,0.4);
}

.cel_cabecalho {
    width: 150px;
    padding: 10px;
    border-right: 1px solid #fff;
}

.cel_cabecalho:last-child {
    border-right: none;
}

.resultado {
    width: 80%;
    max-width: 800px;
    border: 2px solid #ff0000;
    border-radius: 0 0 8px 8px;
    overflow: hidden;
    box-shadow: 0 0 20px #ff0000;
}

.cabecalho div, .linha div {
    display: flex;
    justify-content: center;
    align-items: center;
}


.acoes {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.acoes button {
    background-color: #fff;
    color: #000;
    border: none;
    padding: 6px 10px;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

.acoes button:hover {
    background-color: #ff0000;
    color: #fff;
    transform: scale(1.1);
    box-shadow: 0 0 10px #fff;
}

.bola {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 60px;
    height: 60px;
    background-image: url('https://upload.wikimedia.org/wikipedia/commons/d/d3/Soccerball.svg');
    background-size: cover;
    animation: quica 2s infinite ease-in-out, gira 4s infinite linear;
    filter: drop-shadow(0 0 10px #ff0000);
}

@keyframes quica {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
}

@keyframes gira {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
    </head>
    <body>
    <section class="inicio">
        <div class="coluna meio">
                <form action="gravar_peca.php" method="post">
                    <label for="peca">Peça</label>
                    <input type="text" name="peca" id="">

                    <label for="quantidade">Quantidade</label>
                    <input type="text" name="quantidade">

                   

                    
                    <button class="submit">Salvar</button>
                </form>
            </div>
    </section>