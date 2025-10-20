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

$texto = "------------------------------------------------/n";
$texto .= "data: " . date('d/m/y') . "\n";
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

echo "resostas salvas com sucesso!";














}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section class="inicio">
     <div class="container">
     <form action="" method="post">
   <style>
    /* Fundo geral da página */
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #0822b6ff, #1114cfff); /* Gradiente bonito */
        min-height: 100vh;
    }

    .container {
        display: flex;
        flex-direction: column;
        gap: 20px;
        max-width: 600px;
        margin: 40px auto;
        font-family: Arial, sans-serif;
        background-color: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 20px 
        rgba(190, 22, 212, 0.1);
    }

    h1 {
        text-align: center;
        color: white;
        border: 1px solid #3c21d8ff;
        padding: 10px;
        border-radius: 8px;
        background-color: #3a16daff;
        margin: 0;
    }

    form {
        border: 1px solid #29067cff;
        padding: 15px;
        border-radius: 8px;
    }

    label {
        display: block;
        margin: 10px 0 5px;
    }

    input[type="radio"] {
        margin-right: 5px;
    }

    textarea {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #4205b4ff;
        resize: vertical;
        font-family: Arial, sans-serif;
    }

    button {
        margin-top: 10px;
        padding: 10px 16px;
        background-color: #00b7ffff;
        width: 100%;
        color: white;                       
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #160896ff;
    }
</style>

                <h1>QUESTIONARIO SENAI</h1>
               





                <label for="pergunta 1">1. o conteudo das aulas é apresentado de forma clara e organizada?</label>
               <label><input type="radio" name="pergunta1" value="muito rapida">muito rapida</label>
              <label><input type="radio" name="pergunta1" value="adequado">adequado</label>
              <label><input type="radio" name="pergunta1" value="pouco devagar">pouco devagar</label>
              <label><input type="radio" name="pergunta1" value="muito devagar">muito devagar</label>

              <label for="pergunta 2">2. o ritmo das explicaçoes esta adequado para o seu nivel de apredizagem? </label>
               <label><input type="radio" name="pergunta2" value="sempre">sempre</label>
              <label><input type="radio" name="pergunta2" value="as veses">as veses</label>
              <label><input type="radio" name="pergunta2" value="raramente">raramente</label>
              <label><input type="radio" name="pergunta2" value="nunca">nunca</label>

              <label for="pergunta 3">3. voce sente que entende o que sendo ensinado antes de passar para o proximo assunto?</label>
               <label><input type="radio" name="pergunta3" value="sim muito bem">sim muito bem</label>
              <label><input type="radio" name="pergunta3" value="na maioria das veses">na maioria das veses</label>
              <label><input type="radio" name="pergunta3" value="as vese fico com duvida">as veses fico com duvida</label>
              <label><input type="radio" name="pergunta3" value="frequentemente fico perdido">frequentemente fico perdido</label>

              <label for="pergunta 4">4. o professor explica o conteudo de maneira que voce conpreeende com facilidade :</label>
               <label><input type="radio" name="pergunta4" value="as explicaçao sao muito clara">as explicaçao sao muito clara</label>
              <label><input type="radio" name="pergunta4" value="tenho dificuldade">tenho dificuldade</label>
              <label><input type="radio" name="pergunta4" value="tenho dificuldade na maioria das aulas">tenho dificuldade na maioria das aulas</label>
              <label><input type="radio" name="pergunta4" value="nao compreendo o conteudo">nao compreendo o conteudo</label>

              <label for="pergunta 5">5. o professor responde as duvidas dos alunos de maneira atencioza? :</label>
               <label><input type="radio" name="pergunta5" value="sempre">sempre</label>
              <label><input type="radio" name="pergunta5" value="as veses">as veses</label>
              <label><input type="radio" name="pergunta5" value="raramente">raramente</label>
              <label><input type="radio" name="pergunta5" value="nunca">nunca</label>

              <label for="pergunta 6">6. voce sente que o professor se preocupa em verificar se todos estao entendendo :</label>
               <label><input type="radio" name="pergunta6" value="sim">sim</label>
              <label><input type="radio" name="pergunta6" value="as veses">as veses</label>
              <label><input type="radio" name="pergunta6" value="um pouco">um pouco</label>
              <label><input type="radio" name="pergunta6" value="nao">nao</label>

              <label for="pergunta 7">7.as atividade praticadas ajudam a enterder o conteudo :</label>
               <label><input type="radio" name="pergunta7" value="sim, muito">sim, muito</label>
              <label><input type="radio" name="pergunta7" value="um pouco">um pouco</label>
              <label><input type="radio" name="pergunta7" value="nao muito">nao muito</label>
              <label><input type="radio" name="pergunta7" value="nao ajudam muito">nao ajudam muito</label>

              <label for="pergunta 8">8. voce prefere mais aulas...? :</label>
               <label><input type="radio" name="pergunta8" value="aulas praticas">aulas praticas</label>
              <label><input type="radio" name="pergunta8" value="aulas teoricas">aulas teoricas</label>
              <label><input type="radio" name="pergunta8" value="equilibrio entre pratica e teorica">equilibrio entre pratica e teorica</label>
              <label><input type="radio" name="pergunta8" value="nao ajudam">nao ajudam</label>

              <label for="pergunta 9">9. o tempo das atividades das aulas e suficiente? :</label>
               <label><input type="radio" name="pergunta9" value="sim">sim</label>
              <label><input type="radio" name="pergunta9" value="as veses">as veses</label>
              <label><input type="radio" name="pergunta9" value="nao">nao</label>
              
              <label for="pergunta 10">10. o ambiente da sala favorece o aprendizado?</label>
               <label><input type="radio" name="pergunta10" value="sim">sim</label>
              <label><input type="radio" name="pergunta10" value="as veses">as veses</label>
              <label><input type="radio" name="pergunta10" value="nao">nao</label>
              

             <label for="pergunta11">11. como voce se sente para tirar duvidas com o professor?</label>
             <textarea name="pergunta11" id=""></textarea>

             <label for="pergunta11">12. o que voce mais gosta nas aulas de programaçao?</label>
             <textarea name="pergunta12" id=""></textarea>

             <label for="pergunta11">13. oque poderia ser melhorado nas aulas ou nas explicaçoes</label>
             <textarea name="pergunta13" id=""></textarea>

             <label for="pergunta11">14. ha algum assunto ou linguagem que voce gostaria que voce gostaria que fosse mais explorada ?</label>
             <textarea name="pergunta14" id=""></textarea>

             <label for="pergunta11">15. deixe aqui qualquer outra sugestao ou comentario?</label>
             <textarea name="pergunta15" id=""></textarea>

             <button class="submit">enviar</button>





             
                

           
              








            </form>
        </div>
    </section>
</body>
</html>