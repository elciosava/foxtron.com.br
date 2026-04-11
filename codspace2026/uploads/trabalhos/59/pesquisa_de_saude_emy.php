<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idade  = $_POST['idade'];
    $altura = $_POST['altura'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pesquisa de Saúde</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #dc06f4;
        }
        .container {
            width: 500px;
            margin: auto;
            background: rgb(242, 67, 195);
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
       input[type= "text"],
       input[type= "number"] {
              width: 100%;
        }
        button {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            background: rgb(86, 4, 82);
            color: rgb(237, 19, 139);
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Pesquisa de Saúde</h2>
    <p>
        Nós temos o prazer de te convidar para uma pesquisa de saúde de 5-minutos. Nossa
         Pesquisa da saude do paciente inclui questões gerais e nao invasivas sobre a sua
         saude e habitos. Respondendo á todas as questões voce nos ajudara a implemantar
         os melhores programas funcionais de melhora de saude.
    </p>

    <form action="" method="POST">

        <label> Qual seu genero:</label>
        <input type="radio" name="genero" value="masculino"> Masculino<br>
        <input type="radio" name="genero" value="feminino"> Feminino

        <label>Qual sua idade:</label>
        <input type="number" name="idade" required>

        <label>Qual sua altura (m):</label>
        <input type="number" step="0.01" name="altura">

        <label>Qual seu peso (kg):</label>
        <input type="number" step="0.1" name="peso">

        <label>Voce ja fumou?</label>
        <input type="radio" name="fumo" value="sim"> Sim<br>
        <input type="radio" name="fumo" value="nao"> Não

        <label>Voce pratica regularmente os seguintes exercicios?:</label>
        <input type="checkbox" name="exercicios[]" value="caminhada"> Caminhada<br>
        <input type="checkbox" name="exercicios[]" value="corrida"> Corrida<br>
        <input type="checkbox" name="exercicios[]" value="natacao"> Natação<br>
        <input type="checkbox" name="exercicios[]" value="bicicleta"> Bicicleta<br>
        <input type="checkbox" name="exercicios[]" value="outro"> Outro<br>
        <input type="checkbox" name="exercicios[]" value="nenhum"> Não faço exercícios

        <label>Qual seu tempo para caminhar 1km:</label>
        <input type="text" name="tempo_caminhada">

        <label>Qual seu tempo para correr 1km:</label>
        <input type="text" name="tempo_corrida">

        <label>Quantas horas de exercício por semana:</label>
        <input type="number" name="horas_exercicio">

        <label>Quantas horas de sono por dia:</label>
        <input type="number" name="horas_sono">

        <button type="submit">Enviar sua Pesquisa</button>

    </form>
</div>

</body>
</html>