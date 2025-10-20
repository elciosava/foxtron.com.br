<?php
$mensagem_sucesso = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $p1 = $_POST['pergunta1'] ?? '';
    $p2 = $_POST['pergunta2'] ?? '';
    $p3 = $_POST['pergunta3'] ?? '';
    $p4 = $_POST['pergunta4'] ?? '';
    $p5 = $_POST['pergunta5'] ?? '';
    $p6 = $_POST['pergunta6'] ?? '';
    $p7 = $_POST['pergunta7'] ?? '';
    $p8 = $_POST['pergunta8'] ?? '';
    $p9 = $_POST['pergunta9'] ?? '';
    $p10 = $_POST['pergunta10'] ?? '';
    $p11 = $_POST['pergunta11'] ?? '';
    $p12 = $_POST['pergunta12'] ?? '';
    $p13 = $_POST['pergunta13'] ?? '';
    $p14 = $_POST['pergunta14'] ?? '';
    $p15 = $_POST['pergunta15'] ?? '';

    $texto = "--------------------------------------\n";
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

    $mensagem_sucesso = "Respostas salvas com sucesso!";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Formulário de Avaliação</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #ffffffff, #7f3b9eff);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px 10px;
        }

        .container {
            max-width: 700px;
            margin: 30px;
        }

        .form-container {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 30px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            color: #410e63ff;
            margin-bottom: 30px;
            font-size: 2rem;
        }

        form label:first-child {
            font-weight: bold;
            font-size: 1.05rem;
            margin-bottom: 10px;
            display: block;
            color: #333;
        }

        .question {
            margin-bottom: 25px;
        }

        .question label {
            display: block;
            margin: 5px 0 0 20px;
            font-weight: normal;
            color: #333;
        }

        input[type="radio"] {
            margin-right: 8px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #42b438ff;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition background: 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #1e7e1e;
        }

        .success-message {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 10px 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            color: #155724;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <?php if ($mensagem_sucesso): ?>
            <div class="success-message"><?php echo $mensagem_sucesso; ?></div>
        <?php endif; ?>

        <h2>Formulário de Avaliação</h2>
        <form action="#" method="post">

            <div class="question">
                <label for="pergunta1">1. O conteúdo das aulas é apresentado de forma clara e organizada?</label>
                <label><input type="radio" name="pergunta1" value="Sempre">Sempre</label>
                <label><input type="radio" name="pergunta1" value="Às vezes">Às vezes</label>
                <label><input type="radio" name="pergunta1" value="Raramente">Raramente</label>
                <label><input type="radio" name="pergunta1" value="Nunca">Nunca</label>
            </div>

            <div class="question">
                <label for="pergunta2">2. O ritmo das explicações está adequado para o seu nível de aprendizado?</label>
                <label><input type="radio" name="pergunta2" value="Muito rápido">Muito rápido</label>
                <label><input type="radio" name="pergunta2" value="Adequado">Adequado</label>
                <label><input type="radio" name="pergunta2" value="Um pouco devagar">Um pouco devagar</label>
                <label><input type="radio" name="pergunta2" value="Muito devagar">Muito devagar</label>
            </div>

            <div class="question">
                <label for="pergunta3">3. Você sente que entende o que está sendo ensinado antes de passar para o próximo assunto?</label>
                <label><input type="radio" name="pergunta3" value="Sim, muito">Sim, muito</label>
                <label><input type="radio" name="pergunta3" value="Na maioria das vezes">Na maioria das vezes</label>
                <label><input type="radio" name="pergunta3" value="Às vezes fico com dúvidas">Às vezes fico com dúvidas</label>
                <label><input type="radio" name="pergunta3" value="Frequentemente fico perdido">Frequentemente fico perdido</label>
            </div>

            <div class="question">
                <label for="pergunta4">4. O professor explica o conteúdo de maneira que você compreende com facilidade?</label>
                <label><input type="radio" name="pergunta4" value="As explicações são claras">As explicações são claras</label>
                <label><input type="radio" name="pergunta4" value="Tenho dificuldade">Tenho dificuldade</label>
                <label><input type="radio" name="pergunta4" value="Tenho dificuldade na maioria das aulas">Tenho dificuldade na maioria das aulas</label>
                <label><input type="radio" name="pergunta4" value="Não compreendo o conteúdo">Não compreendo o conteúdo</label>
            </div>

            <div class="question">
                <label for="pergunta5">5. O professor responde as dúvidas dos alunos de forma atensiosa?</label>
                <label><input type="radio" name="pergunta5" value="Sempre">Sempre</label>
                <label><input type="radio" name="pergunta5" value="Às vezes">Às vezes</label>
                <label><input type="radio" name="pergunta5" value="Raramente">Raramente</label>
                <label><input type="radio" name="pergunta5" value="Nunca">Nunca</label>
            </div>

            <div class="question">
                <label for="pergunta6">6. Você sente que o professor se preocupa em verificar se todos estão entendendo?</label>
                <label><input type="radio" name="pergunta6" value="Sim">Sim</label>
                <label><input type="radio" name="pergunta6" value="As vezes">As vezes</label>
                <label><input type="radio" name="pergunta6" value="Um pouco">Um pouco</label>
                <label><input type="radio" name="pergunta6" value="Não">Não</label>
            </div>

            <div class="question">
                <label for="pergunta7">7. As atividades praticas ajudam a entender o conteúdo?</label>
                <label><input type="radio" name="pergunta7" value="Sim, muito">Sim, muito</label>
                <label><input type="radio" name="pergunta7" value="Um pouco">Um pouco</label>
                <label><input type="radio" name="pergunta7" value="Não muito">Não muito</label>
                <label><input type="radio" name="pergunta7" value="Não ajudam">Não ajudam</label>
            </div>

            <div class="question">
                <label for="pergunta8">8. Você prefere mais aulas...?</label>
                <label><input type="radio" name="pergunta8" value="Aulas práticas">Aulas práticas</label>
                <label><input type="radio" name="pergunta8" value="Aulas teoricas">Aulas teoricas</label>
                <label><input type="radio" name="pergunta8" value="Equilíbrio entre prática e teorica">Equilíbrio entre prática e teorica</label>
            </div>

            <div class="question">
                <label for="pergunta9">9. O tempo das atividades das aulas é suficiente?</label>
                <label><input type="radio" name="pergunta9" value="Sim">Sim</label>
                <label><input type="radio" name="pergunta9" value="As vezes">As vezes</label>
                <label><input type="radio" name="pergunta9" value="Não">Não</label>
            </div>

            <div class="question">
                <label for="pergunta10">10. O ambiente da sala favorece o aprendizado?</label>
                <label><input type="radio" name="pergunta10" value="Sim">Sim</label>
                <label><input type="radio" name="pergunta10" value="As vezes">As vezes</label>
                <label><input type="radio" name="pergunta10" value="Não">Não</label>
            </div>

            <div class="question">
               <label for="pergunta11">11. Como você se sente para tirar dúvidas com o professor?</label>
               <textarea name="pergunta11" id=""></textarea>
            </div>

            <div class="question">
               <label for="pergunta12">12. O que você mais gosta nas aulas de programação?</label>
               <textarea name="pergunta12" id=""></textarea>
            </div>

            <div class="question">
               <label for="pergunta13">13. O que poderia ser melhorado nas aulas ou nas explicações?</label>
               <textarea name="pergunta13" id=""></textarea>
            </div>

            <div class="question">
               <label for="pergunta14">14. Há algum assunto ou linguagem que você gostaria que fosse mais explorada?</label>
               <textarea name="pergunta14" id=""></textarea>
            </div>

            <div class="question">
               <label for="pergunta15">15. Deixe aqui qualquer outra sugestão ou comentário?</label>
               <textarea name="pergunta15" id=""></textarea>
            </div>

            <input type="submit" value="Enviar Avaliação" />

        </form>
    </div>
</body>
</html>