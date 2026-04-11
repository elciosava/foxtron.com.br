
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

echo "Resposta salvas com sucesso!";
}
?>

<!DOCTYPE html
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #f0f8ff; /* Cor de fundo suave */
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            gap: 20px; 
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff; /* Cor do fundo do formulário */
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #252525ff;
            padding: 10px;
            border-radius: 8px;
            background-color: #6d6d6dff;
        }

        form {
            border: 1px solid #000000ff;
            padding: 15px;
            border-radius: 8px;
            background-color: #f8f9fa;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        button {
            margin-top: 10px;
            padding: 8px 16px;
            background-color: #494949ff;
            width: 100%;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #6e6e6eff;
        }

        textarea {
            width: 100%;
            min-width: 80px;
            padding: 10px;
            resize: vertical;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            background-color: #fff;
        }

        .section {
            background: #79349E;
        }

        /* Estilo do fundo */
        .inicio {
            background-image: linear-gradient(to right, #e0e4e6ff, #2c2c2cff); /* Gradiente do fundo */
            padding: 40px 0;
        }
    </style>
</head>
<body>
    <section class="inicio">
        <div class="container">
            <h1>Questionario SENAI</h1>
            <form action="" method="post">
                <label for="pergunta1">1. O conteudo das aulas é apresentadas de forma clara e orgnizada?</label>
           <label><input type="radio" name="pergunta1" value="Sempre">Sempre</label>
            <label><input type="radio" name="pergunta1" value="As vezes">As vezes</label>
             <label><input type="radio" name="pergunta1" value="Raramente">Raramente</label>
              <label><input type="radio" name="pergunta1" value="Nunca">Nunca</label>


              <label for="pergunta2">2. O ritimo das explicaçoes esta adequados para o seu nivel de aprendizado?</label>
              <label><input type="radio" name="pergunta2" value="Muito rapida">Muito rapida</label>
            <label><input type="radio" name="pergunta2" value="Adequado">Adequado</label>
             <label><input type="radio" name="pergunta2" value="Um pouco devagar">Um pouco devagar</label>
              <label><input type="radio" name="pergunta2" value="Muito devagar">Muito devagar</label>

              <label for="pergunta3">3. Voce sente que entende o que esta sendo ensinado antes de passar de assunto?</label>
                <label><input type="radio" name="pergunta3" value="Sim muito">Sim muito</label>
            <label><input type="radio" name="pergunta3" value="Na maioria das vezes">Na maioria das vezes</label>
             <label><input type="radio" name="pergunta3" value="As vezes fico com duvidas">As vezes fico com duvidas</label>
              <label><input type="radio" name="pergunta3" value="frequentemente fico perdido">frequentemente fico perdido</label>


              <label for="pergunta4">4. O professor explica o conteudo de maneira que vc comprende com facilidade?</label>
               <label><input type="radio" name="pergunta4" value="Sim muito">as explicaçoes sao claras</label>
            <label><input type="radio" name="pergunta4" value="Tenho dificuldade">Tenho dificuldade</label>
             <label><input type="radio" name="pergunta4" value="Tenho difilculdade na maioria das aulas">Tenho difilculdade na maioria das aulas</label>
              <label><input type="radio" name="pergunta4" value="Nao compreendo o conteudo">Nao compreendo o conteudo</label>


                <label for="pergunta5">5. o professor responde as duvidas dos alunos de maneira atenciosa?</label>
               <label><input type="radio" name="pergunta5" value="Sempre">Sempre</label>
            <label><input type="radio" name="pergunta5" value="As vezes">As vezes</label>
             <label><input type="radio" name="pergunta5" value="Raramente">Raramente</label>
              <label><input type="radio" name="pergunta5" value="Nunca">Nunca</label>

               <label for="pergunta6">6. Voce sente que o professor se preucupa em verificar se todos estao se entendendo ?</label>
               <label><input type="radio" name="pergunta6" value="Sim ">Sim </label>
            <label><input type="radio" name="pergunta6" value="As vezes">As vezes</label>
             <label><input type="radio" name="pergunta6" value="Um pouco">Um pouco</label>
              <label><input type="radio" name="pergunta6" value="Nao">Nao</label>

               <label for="pergunta7">7. As atividades praticas ajudam a entende o conteudo?</label>
               <label><input type="radio" name="pergunta7" value="Sim muito">Sim muito</label>
            <label><input type="radio" name="pergunta7" value="Um pouco">Um pouco</label>
             <label><input type="radio" name="pergunta7" value="Nao muito">Nao muito</label>
              <label><input type="radio" name="pergunta7" value="Nao ajudam">Nao ajudam</label>

               <label for="pergunta8">8. Voce prefere mais aulas...?
               <label><input type="radio" name="pergunta8" value="Aulas praticas">Aulas praticas</label>
            <label><input type="radio" name="pergunta8" value="Aulas teoricas">Aulas teoricas</label>
             <label><input type="radio" name="pergunta8" value="Equilibrio entre pratica e teorica">Equilibrio entre pratica e teorica</label>
              

               <label for="pergunta9">9. O tempo das atividades das aulas e suficiente?</label>
               <label><input type="radio" name="pergunta9" value="Sim ">Sim </label>
            <label><input type="radio" name="pergunta9" value="As vezes">As vezes</label>
             <label><input type="radio" name="pergunta9" value="Nao">Nao</label>
              

               <label for="pergunta10">10. O ambiente da sala favorece o aprendizado?</label>
               <label><input type="radio" name="pergunta10" value="Sim">Sim </label>
            <label><input type="radio" name="pergunta10" value="As vezes">As vezes</label>
             <label><input type="radio" name="pergunta10" value="Nao">Nao</label>
              

               <label for="pergunta11">11. Como voce se sente para tirar duvidas com o professor?</label>

               <textarea name="" id=""></textarea>
           

               <label for="pergunta12">12. O que voce mais gosta nas aulas de programaçao?</label>

               <textarea name="" id=""></textarea>
              

               <label for="pergunta13">13. O que poderia ser melhorado nas aulas ou na explicaçoes?</label>

               <textarea name="" id=""></textarea>
          

               <label for="pergunta14">14.  Ha algum assunto ou linguagem que voce gostaria  que fosse mais explorada?</label>

               <textarea name="" id=""></textarea>
             
              <label for="pergunta15">15. Deixe aqui outra sugestao ou comentario.</label>

              <textarea name="" id=""></textarea>

              <button type="submit">Enviar</button>
           


            </form>
        </div>
    </section>
</body>
</html>
