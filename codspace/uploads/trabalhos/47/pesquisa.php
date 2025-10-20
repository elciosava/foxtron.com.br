<?php
ini_set("display_errors",0);
if($_SERVER['REQUEST_METHOD'] == "POST"){

$p1 = $_POST['pergunta1'];
$p2 = $_POST['pergunta2'];
$p3 = $_POST['pergunta3'];
$p4 = $_POST['pergunta4'];
$p5 = $_POST['pergunta5'];
$p6 = $_POST['pergunta6'];
$p7 = $_POST['pergunta7'];
$p8 = $_POST['pergunta8'];
$p9 = $_POST['pergunta9'];
$p10 = $_POST['pergunta10'];
$p11 = $_POST['pergunta11'];
$p12 = $_POST['pergunta12'];
$p13 = $_POST['pergunta13'];
$p14 = $_POST['pergunta14'];
$p15 = $_POST['pergunta15'];

$texto  = "-------------------------------------------------------------------------------\n";
$texto .= "Data: " . date("d/m/y") . "\n";
$texto .= "1. $p1\n";
$texto .= "2. $p2\n";
$texto .= "3. $p3\n";
$texto .= "4. $p4\n";
$texto .= "5. $p5\n";
$texto .= "6. $p6\n";
$texto .= "7. $p7\n";
$texto .= "8. $p8\n";
$texto .= "9. $p9\n";
$texto .= "10. $p10\n";
$texto .= "11. $p11\n";
$texto .= "12. $p12\n";
$texto .= "13. $p13\n";
$texto .= "14. $p14\n";
$texto .= "15. $p15\n";

file_put_contents("respostas.txt", $texto, FILE_APPEND);
echo "<script>alert('Respostas enviadas com sucesso!');</script>";

}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionário</title>
    <style>
        
@charset "UTF-8";

* {
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    box-sizing: border-box;
}

body {
    background-image: url(carro.jpg);
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    background-attachment: fixed;
    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
    justify-content: center;
    align-items: center;
}
header, main, section, article {
    max-width: 700px;
}

header > h1 {
    color: white;
    text-shadow: 3px 3px 0px rgb(36, 36, 36);
}

footer {
    display: block;
    width: 100vw;
    background-color: rgba(62, 62, 62, 1);
    color: white;
    text-align: center;
    margin-top: auto;
    padding: 10px;
}

a {
    color: #000000ff;
    background-color: rgba(212, 212, 212, 0.77);
    padding: 0 3px;
    font-weight: 600;
    text-decoration: none;
    border-bottom: .5px dotted hsl(0, 0%, 100%);
}

a:hover {
    color: #a3a3a3;
    border-bottom: 1px solid #757575;
}

table {
    min-width: 400px;
    border-spacing: 0px;
    border: 0.5px solid #8b8b8b;
    margin: 10px auto;
}

table th {
    background-color: #7a7a7a;
    color: white;
    padding: 5px;
    text-align: left;
    width: 20%;
}

table td {
    padding: 5px;
}

table tr {
    background-color: rgba(155, 155, 155, 0.86);
}

table tr:nth-child(odd) {
    background-color: rgba(255, 255, 255, 0.83);
}

table.divisao {
    border: 1px solid white;
}

table.divisao td {
    background-color: white;
    padding: 20px;
    text-align: center;
    font-size: 2.5em;
}

ul > li::marker {
    color: #bdb9da;
}

form {
    background-color: rgba(255, 255, 255, 0.75);
    padding: 25px;
    border-radius: 2px;
}

form label {
    display: block;
    width: fit-content;
    font-size: 0.8em;
    font-weight: 100;
    background-color: rgba(160, 160, 160, 0.69);
    padding: 3px 7px;
    margin-top: 10px;
    margin-bottom: 0px;
    border-radius: 2px;
}

input,select{
    width: 100%;
    padding: 12px 20px;
    font-size: 1em;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 2px;
    box-sizing: border-box;
}

input[type=button], button {
    width: 50%;
    background-color: #272727;
    font-size: 1em;
    color: white;
    padding: 10px 20px;
    margin: 5px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=button]:hover, button:hover {
    background-color: #272727;
}
    </style>

    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <section class="inicio">
        <div class="container">
            <form action="" method="post">
                <label for="pergunta1">1. O conteúdo das aulas é apresentado de forma clara e organizada?</label>
                <label><input type="radio" name="pergunta1" value="sempre">Sempre</label>
                <label><input type="radio" name="pergunta1" value="às vezes">Às vezes</label>
                <label><input type="radio" name="pergunta1" value="raramente">Raramente</label>
                <label><input type="radio" name="pergunta1" value="nunca">Nunca</label>

                <label for="pergunta2">2. O ritmo das explicações está adequado para seu nível de aprendizado?</label>
                <label><input type="radio" name="pergunta2" value="muito raramente">Muito raramente</label>
                <label><input type="radio" name="pergunta2" value="adequado">Adequado</label>
                <label><input type="radio" name="pergunta2" value="um pouco devagar">Um pouco devagar</label>
                <label><input type="radio" name="pergunta2" value="inadequado">Inadequado</label>

                <label for="pergunta3">3. Você sente que entende o que está sendo ensinado antes de passar para o próximo assunto?</label>
                <label><input type="radio" name="pergunta3" value="sim muito">Sim, muito</label>
                <label><input type="radio" name="pergunta3" value="na maioria das vezes">Na maioria das vezes</label>
                <label><input type="radio" name="pergunta3" value="às vezes fico com dúvida">Às vezes fico com dúvida</label>
                <label><input type="radio" name="pergunta3" value="frequentemente fico perdido">Frequentemente fico perdido</label>

                <label for="pergunta4">4. O professor explica o conteúdo de maneira que você compreende com facilidade?</label>
                <label><input type="radio" name="pergunta4" value="as explicações são claras">As explicações são claras</label>
                <label><input type="radio" name="pergunta4" value="tenho dificuldade">Tenho dificuldade</label>
                <label><input type="radio" name="pergunta4" value="às vezes fico com dúvida">Às vezes fico com dúvida</label>
                <label><input type="radio" name="pergunta4" value="não compreendo">Não compreendo</label>

                <label for="pergunta5">5. O professor responde às dúvidas dos alunos de maneira atenciosa?</label>
                <label><input type="radio" name="pergunta5" value="sempre">Sempre</label>
                <label><input type="radio" name="pergunta5" value="às vezes">Às vezes</label>
                <label><input type="radio" name="pergunta5" value="raramente">Raramente</label>
                <label><input type="radio" name="pergunta5" value="nunca">Nunca</label>

                <label for="pergunta6">6. Você sente que o professor se preocupa se todos entenderam?</label>
                <label><input type="radio" name="pergunta6" value="sim">Sim</label>
                <label><input type="radio" name="pergunta6" value="às vezes">Às vezes</label>
                <label><input type="radio" name="pergunta6" value="pouco">Pouco</label>
                <label><input type="radio" name="pergunta6" value="nunca">Nunca</label>

                <label for="pergunta7">7. As atividades práticas ajudam a entender o conteúdo?</label>
                <label><input type="radio" name="pergunta7" value="sim muito">Sim, muito</label>
                <label><input type="radio" name="pergunta7" value="às vezes">Às vezes</label>
                <label><input type="radio" name="pergunta7" value="não muito">Não muito</label>
                <label><input type="radio" name="pergunta7" value="nunca">Nunca</label>

                <label for="pergunta8">8. Você prefere mais aulas:</label>
                <label><input type="radio" name="pergunta8" value="aulas práticas">Aulas práticas</label>
                <label><input type="radio" name="pergunta8" value="aulas teóricas">Aulas teóricas</label>
                <label><input type="radio" name="pergunta8" value="equilíbrio entre aula prática e teórica">Equilíbrio entre aula prática e teórica</label>
                <label><input type="radio" name="pergunta8" value="não ajudam">Não ajudam</label>

                <label for="pergunta9">9. O tempo das aulas é suficiente?</label>
                <label><input type="radio" name="pergunta9" value="sim">Sim</label>
                <label><input type="radio" name="pergunta9" value="às vezes">Às vezes</label>
                <label><input type="radio" name="pergunta9" value="não">Não</label>

                <label for="pergunta10">10. O ambiente da sala favorece o aprendizado?</label>
                <label><input type="radio" name="pergunta10" value="sim">Sim</label>
                <label><input type="radio" name="pergunta10" value="às vezes">Às vezes</label>
                <label><input type="radio" name="pergunta10" value="não">Não</label>

                <label for="pergunta11">11. Como você se sente para tirar dúvidas com o professor?</label>
                <textarea name="pergunta11" id=""></textarea>

                <label for="pergunta12">12. O que você mais gosta nas aulas de programação?</label>
                <textarea name="pergunta12" id=""></textarea>

                <label for="pergunta13">13. O que você acha que poderia melhorar nas explicações?</label>
                <textarea name="pergunta13" id=""></textarea>

                <label for="pergunta14">14. Há algum assunto ou linguagem que você gostaria que fosse mais explorado?</label>
                <textarea name="pergunta14" id=""></textarea>

                <label for="pergunta15">15. Deixe aqui qualquer outra sugestão</label>
                <textarea name="pergunta15" id=""></textarea>

                <button type="submit">Enviar</button>

            </form>
        </div>
    </section>
</body>

</html>
