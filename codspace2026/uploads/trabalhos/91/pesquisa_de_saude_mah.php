<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pesquisa de Saúde</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, select {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
        }
        .checkbox-group, .radio-group {
            margin-top: 5px;
        }
        button {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            background: black;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Pesquisa de Saúde</h2>

    <p>Responda esta pesquisa rápida sobre sua saúde e hábitos.</p>

    <label>Qual é o seu gênero?</label>
    <div class="radio-group">
        <input type="radio" name="genero"> Masculino<br>
        <input type="radio" name="genero"> Feminino
    </div>

    <label>Qual é a sua idade?</label>
    <input type="number">

    <label>Qual é a sua altura?</label>
    <input type="text">

    <label>Qual é o seu peso?</label>
    <input type="text">

    <label>Você já fumou alguma vez?</label>
    <div class="radio-group">
        <input type="radio" name="fumo"> Sim<br>
        <input type="radio" name="fumo"> Não
    </div>

    <label>Você pratica exercícios?</label>
    <div class="checkbox-group">
        <input type="checkbox"> Caminhada<br>
        <input type="checkbox"> Corrida<br>
        <input type="checkbox"> Natação<br>
        <input type="checkbox"> Bicicleta<br>
        <input type="checkbox"> Outro<br>
        <input type="checkbox"> Não faço exercícios
    </div>

    <label>Tempo para caminhar 1km:</label>
    <input type="text">

    <label>Tempo para correr 1km:</label>
    <input type="text">

    <label>Horas de exercício por semana:</label>
    <input type="number">

    <label>Horas de sono por dia:</label>
    <input type="number">

    <label>Verificação:</label>
    <input type="text" placeholder="Digite o código">

    <button>Enviar Pesquisa</button>
</div>

</body>
</html>