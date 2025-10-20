<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){

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

$texto = "---------------------------\n";
$texto .= "Data: " . date('d/m/y') . "\n";
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

file_put_contents("respostas.txt",$texto, FILE_APPEND);

echo "Respostas foram salvas meu nobre!";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            display: flex;
            flex-direction: column;
            gap: 20px;
            max-width: 600px;
            margin: 40px auto;
            font-family: Arial, sans-serif;
        }

        h1{
            text-align: center;
            color: #004085;
            border: 2px solid #ccc;
            padding: 15px;
            border-radius: 10px;
            background-color: #f9f9f9;
            font-size: 2.5rem;
            font-weight: 700;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
            box-shadow:0 4px 8px rgba(0,0,0,0.1);
        }

        form{
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        button{
            margin-top: 10px;
            padding: 8px 16px;
            background-color: #28a745;
            width: 100%;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="radio"]{
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            border: 2px solid #0ec724;
            border-radius: 50%;
            outline: none;
            cursor: pointer;
            position:relative;
            margin-right: 8px;
            vertical-align: middle;
            transition: background-color 0.2s ease;
        }

        input[type="radio"]:checked::before{
            content: "";
            position: absolute;
            top: 3px;
            left: 3px;
            width: 10px;
            height: 10px;
            background-color: #007bff;
            border-radius: 50%;
        }

        button:hover{
            background-color: #1c6d2dff;
        }

        textarea {
             width: 100%;
             min-height: 80px;
             padding: 10px;
             resize: vertical;
             border: 1px solid #ccc;
             border-radius: 4px;
             font-family: Arial, sans-serif;
             font-size: 14px;
             box-sizing: border-box;
             background-color: #fff;
        }

        body {
           margin: 0;
           padding: 0;
           background: linear-gradient(135deg, #fab700, #131bbd);
           font-family: Arial, sans-serif;
           min-height: 100vh;
        }

        label{
            width: 100%;
            display: inline-block;
            margin: 10px 0 5px;
        }

    </style>
</head>
<body>
    <section class="inicio">
        <div class="container">
            <h1>Questionario SENAI</h1>
            <form action="" method="post">
                <label for="pergunta1">1. O conteudo das aulas é apresentado de forma clara e organizada ?</label>
                <label><input type="radio" name="pergunta1" value="Sempre">Sempre.</label>
                <label><input type="radio" name="pergunta1" value="As vezes">As vezes.</label>
                <label><input type="radio" name="pergunta1" value="Raramente">Raramente.</label>
                <label><input type="radio" name="pergunta1" value="Nunca">Nunca.</label>

                <label for="pergunta2">2. O ritmo das explicações está adequado para seu nível de aprendizado ?</label>
                <label><input type="radio" name="pergunta2" value="Muito rápida">Muito rápida.</label>
                <label><input type="radio" name="pergunta2" value="Adequado">Adequado.</label>
                <label><input type="radio" name="pergunta2" value="Um pouco devagar">Um pouco devagar.</label>
                <label><input type="radio" name="pergunta2" value="Muito devagar">Muito devagar.</label>

                <label for="pergunta3">3. Você sente que entende o que está ensinado antes de passar para o próximo assunto ?</label>
                <label><input type="radio" name="pergunta3" value="Sim muito">Sim, muito.</label>
                <label><input type="radio" name="pergunta3" value="Na maioria das vezes">Na maioria das vezes.</label>
                <label><input type="radio" name="pergunta3" value="As veze fico com dúvida">As veze fico com dúvida.</label>
                <label><input type="radio" name="pergunta3" value="Frequentemente fico perdido">Frequentemente fico perdido.</label>

                <label for="pergunta4">4. O professor explica o conteúdo de maneira que você compreende com facilidade ?</label>
                <label><input type="radio" name="pergunta4" value="As explicações são filézin">As explicações são filézin.</label>
                <label><input type="radio" name="pergunta4" value="Tenho um certo grau de dificuldade">Tenho um certo grau de dificuldade.</label>
                <label><input type="radio" name="pergunta4" value="Tenho dificuldade na maioria das aulas">Tenho dificuldade na maioria das aulas.</label>
                <label><input type="radio" name="pergunta4" value="Que que tá acontecendo aqui véi">Que que tá acontecendo aqui véi.</label>

                <label for="pergunta5">5. O professor responde as dúvidas dos alunos de maneira atenciosa ?</label>
                <label><input type="radio" name="pergunta5" value="Sempre">Sempre.</label>
                <label><input type="radio" name="pergunta5" value="As vezes">As vezes.</label>
                <label><input type="radio" name="pergunta5" value="Raramente">Raramente.</label>
                <label><input type="radio" name="pergunta5" value="Nem se esforça pra isso">Nem se esforça pra isso.</label>

                <label for="pergunta6">6. Você sente que o professor se preocupa em verificar se todos estão entendendo ?</label>
                <label><input type="radio" name="pergunta6" value="Sim">Sim.</label>
                <label><input type="radio" name="pergunta6" value="As vezes">As vezes.</label>
                <label><input type="radio" name="pergunta6" value="Um pouco">Um pouco.</label>
                <label><input type="radio" name="pergunta6" value="Não">Não.</label>

                <label for="pergunta7">7. As atividades práticas ajudam a entender o conteúdo ?</label>
                <label><input type="radio" name="pergunta7" value="Sim, muito">Sim, muito.</label>
                <label><input type="radio" name="pergunta7" value="Um pouco">Um pouco.</label>
                <label><input type="radio" name="pergunta7" value="Não muito">Não muito.</label>
                <label><input type="radio" name="pergunta7" value="Ajuda em nada">Ajuda em nada.</label>

                <label for="pergunta8">8. Você prefere mais aulas... ?</label>
                <label><input type="radio" name="pergunta8" value="Aulas práticas">Aulas práticas.</label>
                <label><input type="radio" name="pergunta8" value="Aulas teóricas">Aulas teóricas.</label>
                <label><input type="radio" name="pergunta8" value="Equilíbrio entre prática e teórica">Equilíbrio entre prática e teórica.</label>

                <label for="pergunta9">9. O tempo das atividades das aulas é suficiente ?</label>
                <label><input type="radio" name="pergunta9" value="Sim">Sim.</label>
                <label><input type="radio" name="pergunta9" value="As vezes">As vezes.</label>
                <label><input type="radio" name="pergunta9" value="Não">Não.</label>
                <label><input type="radio" name="pergunta9" value="Sobra tempo pra jogar">Sobra tempo pra jogar.</label>

                <label for="pergunta10">10. O ambiente da sala favorece o aprendizado ?</label>
                <label><input type="radio" name="pergunta10" value="Sim">Sim.</label>
                <label><input type="radio" name="pergunta10" value="As vezes">As vezes.</label>
                <label><input type="radio" name="pergunta10" value="Não">Não.</label>

                <label for="pergunta11">11. Como você se sente para tirar dúvida com o professor ?</label>
                <textarea name="pergunta11" id=""></textarea>

                <label for="pergunta12">12. O que você mais gosta nas aulas de programação ?</label>
                <textarea name="pergunta12" id=""></textarea>

                <label for="pergunta13">13. O que poderia ser melhorado nas aulas ou nas explicações ?</label>
                <textarea name="pergunta13" id=""></textarea>

                <label for="pergunta14">14. Há algum assunto ou linguagem que você gostaria que fosse mais explorada ?</label>
                <textarea name="pergunta14" id=""></textarea>

                <label for="pergunta15">15. Deixe aqui outra sugestão ou comentario !</label>
                <textarea name="pergunta15" id=""></textarea>

                <button type="submit">Enviar</button>
            </form>
        </div>
    </section>
</body>
</html>