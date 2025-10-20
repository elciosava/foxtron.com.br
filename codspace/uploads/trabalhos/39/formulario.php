<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){

$pergunta1 = $_POST['pergunta1'];
$pergunta2 = $_POST['pergunta2'];
$pergunta3 = $_POST['pergunta3'];
$pergunta4 = $_POST['pergunta4'];
$pergunta5 = $_POST['pergunta5'];
$pergunta6 = $_POST['pergunta6'];
$pergunta7 = $_POST['pergunta7'];
$pergunta8 = $_POST['pergunta8'];
$pergunta9 = $_POST['pergunta9'];
$pergunta10 = $_POST['pergunta10'];
$pergunta11 = $_POST['pergunta11'];
$pergunta12 = $_POST['pergunta12'];
$pergunta13 = $_POST['pergunta13'];
$pergunta14 = $_POST['pergunta14'];
$pergunta15 = $_POST['pergunta15'];

$texto = "--------------------------------------------------------------------------------------------------------------------------------\n";
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

file_put_contents("respostas.txt", $texto, FILE_APPEND);

echo "Respostas salvas com sucesso!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=sec, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            height:100vh;
            justify-content:center;
        }

        form {
            width: 500px ;
        }

        label {
            width: 100%;
            display: inline-block;
            padding: 2px;
        }

        label[for="pergunta1"],
        label[for="pergunta2"],
        label[for="pergunta3"],
        label[for="pergunta4"],
        label[for="pergunta5"],
        label[for="pergunta6"],
        label[for="pergunta7"],
        label[for="pergunta8"],
        label[for="pergunta9"],
        label[for="pergunta10"],
        label[for="pergunta11"],
        label[for="pergunta12"],
        label[for="pergunta13"],
        label[for="pergunta14"],
        label[for="pergunta15"]{
        margin-top:10px;
        }

        .conteiner {
            width: 500px;
        }

        html {
            font-family: Sans-serif;
        }

        textarea {
            width: 450px;
            height: 80px;
        }

        button {
            width: 450px;
            background:lightblue ;
            color: #fff;
            border:0;
        }
    </style>
</head>
<body>
    <section class="inicio">
        <div class="container">
            <form action="" method="post">
                <label for="pergunta1">1. O conteudo das aulas é apresentado de forma clara e organizada?</label>
                <label><input type="radio" name="pergunta1" value="Sempre">Sempre</label>
                <label><input type="radio" name="pergunta1" value="As vezes">As vezes</label>
                <label><input type="radio" name="pergunta1" value="Raramente">Raramente</label>
                <label><input type="radio" name="pergunta1" value="Nunca">Nunca</label>

                <label for="pergunta2">2. O ritmo das explicações esta adequado para o seu nivel de aprendizado?</label>
                <label><input type="radio" name="pergunta2" value="Muito rapida">Muito rapida</label>
                <label><input type="radio" name="pergunta2" value="Adequado">Adequado</label>
                <label><input type="radio" name="pergunta2" value="Um pouco devagar">Um pouco devagar</label>
                <label><input type="radio" name="pergunta2" value="Muito devagar">Muito devagar</label>

                <label for="pergunta3">3. Você sente que entende o que esta sendo ensinado antes de passar para o proximo assunto</label>
                <label><input type="radio" name="pergunta3" value="Sim, muito">Sim, muito</label>
                <label><input type="radio" name="pergunta3" value="Na maioria das vezes">Na mioria das vezes</label>
                <label><input type="radio" name="pergunta3" value="As vezes fico com duvida">As vezes fico com duvida</label>
                <label><input type="radio" name="pergunta3" value="Frequentemente fico perdido">Frequentemente fico perdido</label>

                <label for="pergunta4">4. O professor explica o conteudo de maneira que você compreende com facilidade?</label>
                <label><input type="radio" name="pergunta4" value="As explicações são claras">As explicações são claras</label>
                <label><input type="radio" name="pergunta4" value="Tenho dificuldade">Tenho dificuldade</label>
                <label><input type="radio" name="pergunta4" value="Tenho dificuldade na maiorias das aulas">Tenho dificuldade na maiorias das aulas</label>
                <label><input type="radio" name="pergunta4" value="Não compreendo o conteudo">Não compreendo o conteudo</label>

                <label for="pergunta5">5. O professor responde as duvidas dos alunos de maneira atenciosa?</label>
                <label><input type="radio" name="pergunta5" value="Sempre">Sempere</label>
                <label><input type="radio" name="pergunta5" value="As vezes">As vezes</label>
                <label><input type="radio" name="pergunta5" value="Raramente">Raramente</label>
                <label><input type="radio" name="pergunta5" value="Nunca">Nunca</label>

                <label for="pergunta6">6. Você sente que o professor se preocupa em verificar se  todos estão entendendo?</label>
                <label><input type="radio" name="pergunta6" value="Sim">Sim</label>
                <label><input type="radio" name="pergunta6" value="As vezes">As vezes</label>
                <label><input type="radio" name="pergunta6" value="Um pouco">Um pouco</label>
                <label><input type="radio" name="pergunta6" value="Não">Não</label>

                <label for="pergunta7">7. As atividades praticas ajudam a entender o conteudo?</label>
                <label><input type="radio" name="pergunta7" value="Sim, muito">Sim, muito</label>
                <label><input type="radio" name="pergunta7" value="Um pouco">Um pouco</label>
                <label><input type="radio" name="pergunta7" value="Não muito">Não muito</label>
                <label><input type="radio" name="pergunta7" value="Não ajudam">Não ajudam</label>

                <label for="pergunta8">8. Você prefere mais aulas...?</label>
                <label><input type="radio" name="pergunta8" value="Aulas praticas">Aulas praticas</label>
                <label><input type="radio" name="pergunta8" value="Aulas teoricas">Aulas teoricas</label>
                <label><input type="radio" name="pergunta8" value="Equlibrio entre pratica e teorica">Equilibrio entre pratica e teorica</label>               

                <label for="pergunta9">9. O tempo das atividades das aulas é suficiente?</label>
                <label><input type="radio" name="pergunta9" value="Sim">Sim</label>
                <label><input type="radio" name="pergunta9" value="As vezes">As vezes</label>
                <label><input type="radio" name="pergunta9" value="Não">Não</label>

                <label for="pergunta10">10. O ambiente da sala favorece o aprendizado?</label>
                <label><input type="radio" name="pergunta10" value="Sim">Sim</label>
                <label><input type="radio" name="pergunta10" value="As vezes">As vezes</label>
                <label><input type="radio" name="pergunta10" value="Não">Não</label>

                <label for="pergunta11">11. Como você se sente para tirar duvidas com o professor?</label>
                <textarea name="pergunta11" id=""></textarea>
               
                <label for="pergunta12">12. O que você mais gosta nas aulas de programação?</label>
                <textarea name="pergunta12" id=""></textarea>

                <label for="pergunta13">13. O que poderia ser melhorado nas aulas ou nas explicações?</label>
                <textarea name="pergunta13" id=""></textarea>

                <label for="pergunta14">14. Há algum assunto ou linguagem que você gostaria que fosse mais explorada?</label>
                <textarea name="pergunta14" id=""></textarea>

                <label for="pergunta15">15. Deixe aqui qualquer outra sugestão ou comentario?</label>
                <textarea name="pergunta15" id=""></textarea>

                <button type="submit">Enviar</button>

            </form>
        </div>
    </section>
</body>
</html>