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
