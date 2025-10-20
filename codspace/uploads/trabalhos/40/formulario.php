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

$texto = "-------------------------------------------------------------------------------------------\n";
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

echo "Respostas salvas com sucesso!";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        body {
            display: flex;
            height: 100vh;
          justify-content: center;

        }

        form {
            width: 500px;
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
       label[for="pergunta15"]
       {
        margin-top: 10px;}

        .container {
            width: 500px;
        }

        html {
            font-family: 'italic';
        }

        textarea {
            width: 450px;
            height: 80px;
        }

        button {
            width: 100px;
            height:30px;
            background: pink;
            color: #ffffffff;
            border: 0;
        }
    </style>
</head>
<body>
    <section class="inicio">
        <div class="container">
            <form action="" method="post">

            <label for="pergunta1">1. O conteúdo das aulas é apresentado de forma clara e organizada?</label>
           </label><input type="radio" name="pergunta1" value="Sempre">Sempre</label>
           <label> <input type="radio" name="pergunta1" values="Ás vezes">Ás vezes</label>
            <label> <input type="radio" name="pergunta1" values="Raramente">Raramente</label>
           <label> <input type="radio" name="pergunta1" values="Nunca">Nunca</label>

           
           <label for="pergunta2">2. O ritmo das explicações está adequado para seu nível de apredizagem?</label>
           </label><input type="radio" name="pergunta2" value="Muito rapida">muito rápida</label>
           <label> <input type="radio" name="pergunta2" values="Adequado">Adequado</label>
           <label> <input type="radio" name="pergunta2" values="Um pouco devagar">Um pouco devagar</label>
           <label> <input type="radio" name="pergunta2" values="Muito devagar">Muito devagar</label>      
           
           <label for="pergunta3">3. Você sente que entende o que está sendo ensinado antes de passar para o próximo assunto?</label>
           </label><input type="radio" name="pergunta3" value="Sim, muito">Sim, muito</label>
           <label> <input type="radio" name="pergunta3" values="Na maioria das vezes">Na maioria das vezes</label>
           <label> <input type="radio" name="pergunta3" values="Ás vezes fico com duvida">Ás vezes fico com duvida</label>
           <label> <input type="radio" name="pergunta3" values="Frequentemente fico perdido">Frequentemente fico perdido</label>  

           <label for="pergunta4">4. O professor explica o conteúdo de maneira que você compreende com facilidade?</label>
           </label><input type="radio" name="pergunta4" value="Ás vezes as explicações são claras">Ás explicações são claras</label>
           <label> <input type="radio" name="pergunta4" values="Tenho dificuldade">Tenho dificuldade</label>
           <label> <input type="radio" name="pergunta4" values="Tenho dificuldade na maioria das aulas">Tenho dificuldade na maioria das aulas</label>
           <label> <input type="radio" name="pergunta4" values="Não compreendo o conteúdo">Não compreendo o conteúdo</label>  

           <label for="pergunta5">5. O professor responde as duvidas dos alunos de maneira atenciosa?</label>
           </label><input type="radio" name="pergunta5" value="Sempre">Sempre</label>
           <label> <input type="radio" name="pergunt5" values="Ás vezes">Ás vezes</label>
           <label> <input type="radio" name="pergunta5" values="Raramente">Raramente</label>
           <label> <input type="radio" name="pergunta5" values="Nunca">Nunca</label> 

           <label for="pergunta6">6. Você sente que o professor se preocupa em verificar se todos estão entendendo?</label>
           </label><input type="radio" name="pergunta6" value="Sim">Sim</label>
           <label> <input type="radio" name="pergunta6" values="Ás vezes">Ás vezes</label>
           <label> <input type="radio" name="pergunta6" values="Um pouco">Um pouco</label>
           <label> <input type="radio" name="pergunta6" values="Não">Não</label> 

           <label for="pergunta7">7. As atividades praticadas ajudam a entender o conteúdo?</label>
           </label><input type="radio" name="pergunta7" value="Sim, muito">Sim, muito</label>
           <label> <input type="radio" name="pergunta7" values="Um pouco">Um pouco</label>
           <label> <input type="radio" name="pergunta7" values="Não muito">Não muito</label>
           <label> <input type="radio" name="pergunta7" values="Não ajudam">Não ajudam</label> 

            <label for="pergunta8">8. Você prefere mais aulas...?</label>
           </label><input type="radio" name="pergunta8" value="Aulas práticas">Aulas práticas</label>
           <label> <input type="radio" name="pergunta8" values="Aulas teóricas">Aulas teóricas</label>
           <label> <input type="radio" name="pergunta8" values="Equilibrio entre aula prática e teórica">Equilibrio entre aula pratica e teorica</label>

             <label for="pergunta9">9. O tempo das atividades das aulas é suficiente?</label>
           </label><input type="radio" name="pergunta9" value="Sim">Sim</label>
           <label> <input type="radio" name="pergunta9" values="Ás vezes">Ás vezes</label>
           <label> <input type="radio" name="pergunta9" values="Não">Não</label>

           <label for="pergunta10">10. O ambiente da sala favorece o aprendizado?</label>
           </label><input type="radio" name="pergunta10" value="Sim">Sim</label>
           <label> <input type="radio" name="pergunta10" values="Ás vezes">Ás vezes</label>
           <label> <input type="radio" name="pergunta10" values="Não">Não</label>

           <label for="pergunta11">11. Como você se sente para tirar duvidas com o professor?</label>
           <textarea name="pergunta11" id=""></textarea>

           <label for="pergunta12">12. O que você mais gosta nas aulas de programação?</label>
           <textarea name="pergunta12" id=""></textarea>
         

           <label for="pergunta13">13. O que poderia ser melhorado nas aulas ou nas explicações?</label>
           <textarea name="pergunta13" id=""></textarea>
           
           <label for="pergunta14">14. Há algum assunto ou linguagem que você gostaria que fosse mais explorado?</label>
          <textarea name="pergunta14" id=""></textarea>

           <label for="pergunta15">15. Deixe aqui qualquer outra sugestão ou comentário.</label>
            <textarea name="pergunta15" id=""></textarea>

            <button type="submit">Enviar</button>


           </form>
           </form>

        </div>
    </section>
</body>
</html>