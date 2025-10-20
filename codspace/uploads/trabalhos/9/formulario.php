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

    $texto = "--------------------------------------------------------------------------------------------------\n";
    $texto .= "Data: " . date('d/m/y') . "\n";
    $texto .="1. $p1\n";
    $texto .="2. $p1\n";
    $texto .="3. $p1\n";
    $texto .="4. $p1\n";
    $texto .="5. $p1\n";
    $texto .="6. $p1\n";
    $texto .="7. $p1\n";
    $texto .="8. $p1\n";
    $texto .="9. $p1\n";
    $texto .="10. $p1\n";
    $texto .="11. $p1\n";
    $texto .="12. $p1\n";
    $texto .="13. $p1\n";
    $texto .="14. $p1\n";
    $texto .="15. $p1\n";

    file_put_contents("respostas.txt", $texto, FILE_APPEND);
    
    echo "respostas salvas com sucesso!";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulário</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Quicksand', sans-serif;
      background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
      color: #333;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
    }

    .container {
      background: #ffffff;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      padding: 40px;
      max-width: 800px;
      width: 100%;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #1b3b4d;
      font-size: 28px;
    }

    .pergunta {
      margin-bottom: 30px;
    }

    .pergunta label {
      font-weight: 600;
      font-size: 16px;
      color: #1b3b4d;
      display: block;
      margin-bottom: 12px;
    }

    .opcoes {
      display: grid;
      gap: 10px;
      padding-left: 10px;
    }

    .opcoes label {
      font-weight: normal;
      color: #333;
      font-size: 15px;
    }

    .opcoes input[type="radio"] {
      margin-right: 8px;
      accent-color: #003cffff;
    }

    textarea {
      width: 100%;
      padding: 12px;
      border-radius: 8px;
      border: 1px solid #ccc;
      resize: vertical;
      font-family: 'Quicksand', sans-serif;
      font-size: 14px;
    }

    input[type="submit"] {
      display: block;
      margin: 0 auto;
      padding: 14px 40px;
      background-color: #1b3b4d;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition background:  0.3s ease, transform 0.2s ease;
    }

    input[type="submit"]:hover {
      background-color:#1b3b4d;
      transform: scale(1.05);
    }

    @media (max-width: 600px) {
      .container {
        padding: 25px 20px;
      }

      h1 {
        font-size: 24px;
      }
    }
  </style>
</head>
<body> 
  <section class="inicio">
    <div class="container">
      <h1>Formulário</h1>
      <form action="formulario.php" method="post">

        <div class="pergunta">
          <label for="pergunta1">1. O conteúdo das aulas é apresentado de forma clara e organizada?</label>
          <div class="opcoes">
            <label><input type="radio" name="pergunta1" value="Sempre"> Sempre</label>
            <label><input type="radio" name="pergunta1" value="Às vezes"> Às vezes</label>
            <label><input type="radio" name="pergunta1" value="Raramente"> Raramente</label>
            <label><input type="radio" name="pergunta1" value="Nunca"> Nunca</label>
          </div>
        </div>

        <div class="pergunta">
          <label for="pergunta2">2. O ritmo das explicações está adequado para o seu nível de aprendizado?</label>
          <div class="opcoes">
            <label><input type="radio" name="pergunta2" value="Muito rápida"> Muito rápida</label>
            <label><input type="radio" name="pergunta2" value="Às vezes"> Às vezes</label>
            <label><input type="radio" name="pergunta2" value="Um pouco devagar"> Um pouco devagar</label>
            <label><input type="radio" name="pergunta2" value="Muito devagar"> Muito devagar</label>
          </div>
        </div>

        <div class="pergunta">
          <label for="pergunta3">3. Você sente que entende o que está sendo ensinado antes de passar para o próximo assunto?</label>
          <div class="opcoes">
            <label><input type="radio" name="pergunta3" value="Sim, muito"> Sim, muito</label>
            <label><input type="radio" name="pergunta3" value="Na maioria das vezes"> Na maioria das vezes</label>
            <label><input type="radio" name="pergunta3" value="Às vezes fico com dúvida"> Às vezes fico com dúvida</label>
            <label><input type="radio" name="pergunta3" value="Frequentemente fico perdido"> Frequentemente fico perdido</label>
          </div>
        </div>

        <div class="pergunta">
          <label for="pergunta4">4. O professor explica o conteúdo de maneira que você compreende com facilidade??</label>
          <div class="opcoes">
            <label><input type="radio" name="pergunta4" value="Sim, muito"> Sim, muito</label>
            <label><input type="radio" name="pergunta4" value="Na maioria das vezes"> Na maioria das vezes</label>
            <label><input type="radio" name="pergunta4" value="Às vezes fico com dúvida"> Às vezes fico com dúvida</label>
            <label><input type="radio" name="pergunta4" value="Frequentemente fico perdido"> Frequentemente fico perdido</label>
          </div>
        </div>

        <div class="pergunta">
          <label for="pergunta5">5. O professor responde às dúvidas dos alunos de maneira atenciosa??</label>
          <div class="opcoes">
            <label><input type="radio" name="pergunta5" value="As aplicações são claras"> As aplicações são claras</label>
            <label><input type="radio" name="pergunta5" value="Tenho dificuldade"> Tenho dificuldade</label>
            <label><input type="radio" name="pergunta5" value="Tenho dificuldade na maioria das vezes"> Tenho dificuldade na maioria das vezes</label>
            <label><input type="radio" name="pergunta5" value="Não compreendo o conteúdo"> Não compreendo o conteúdo</label>
          </div>
        </div>

        <div class="pergunta">
          <label for="pergunta6">6. Você sente que o professor se preocupa em verificar se todos estão entendendo?</label>
          <div class="opcoes">
            <label><input type="radio" name="pergunta6" value="Sempre"> Sempre</label>
            <label><input type="radio" name="pergunta6" value="Às vezes"> Às vezes</label>
            <label><input type="radio" name="pergunta6" value="Raramente"> Raramente</label>
            <label><input type="radio" name="pergunta6" value="Nunca"> Nunca</label>
          </div>
        </div>

        <div class="pergunta">
          <label for="pergunta7">7. As atividades práticas ajudam a entender o conteúdo?</label>
          <div class="opcoes">
            <label><input type="radio" name="pergunta7" value="Sim, muito"> Sim, muito </label>
            <label><input type="radio" name="pergunta7" value="Um pouco"> Um pouco </label>
            <label><input type="radio" name="pergunta7" value="Não muito"> Não muito </label>
            <label><input type="radio" name="pergunta7" value="Não ajudam"> Não ajudam </label>
          </div>
        </div>

        <div class="pergunta">
          <label for="pergunta8">8. Você prefere mais aulas...?</label>
          <div class="opcoes">
            <label><input type="radio" name="pergunta8" value="Aulas práticas"> Aulas práticas </label>
            <label><input type="radio" name="pergunta8" value="Aulas teoricas"> Aulas teoricas </label>
            <label><input type="radio" name="pergunta8" value="Equilibrio entre prática e teorica"> Équilibrio entrre prática e teorica </label>
          </div>
        </div>

        <div class="pergunta">
          <label for="pergunta9">9. O tempo das atividades das aulas é suficiente?</label>
          <div class="opcoes">
            <label><input type="radio" name="pergunta9" value="Sim"> Sim </label>
            <label><input type="radio" name="pergunta9" value="As vezes"> As vezes </label>
            <label><input type="radio" name="pergunta9" value="Não"> Não </label>
          </div>
        </div>

        <div class="pergunta">
          <label for="pergunta10">10. O ambiente da sala favorece o aprendizado?</label>
          <div class="opcoes">
            <label><input type="radio" name="pergunta10" value="Sim"> Sim </label>
            <label><input type="radio" name="pergunta10" value="As vezes"> As vezes </label>
            <label><input type="radio" name="pergunta10" value="Não"> Não </label>
          </div>
        </div>

        <div class="pergunta">
          <label for="pergunta11">11. Como você se sente para tirar duvidas com o professor?</label>
          <textarea name="pergunta11" id=""> </textarea>
          </div>

          <div class="pergunta">
          <label for="pergunta12">12. O que você mais gosta nas aulas de programação?</label>
          <textarea name="pergunta12" id=""> </textarea>
          </div>

          <div class="pergunta">
          <label for="pergunta13">13. O que poderia ser melhorado nas aulas ou nas explicações?</label>
          <textarea name="pergunta13" id=""> </textarea>
          </div>

          <div class="pergunta">
          <label for="pergunta14">14. Há algum assunto ou linguagem que você gostaria que fosse mais explorada?</label>
          <textarea name="pergunta14" id=""> </textarea>
          </div>

          <div class="pergunta">
          <label for="pergunta15">15. Deixe aqui qualquer outra sugestão ou comentário.</label>
          <textarea name="pergunta15" id=""> </textarea>
          </div>

        <input type="submit" value="Enviar Respostas">

      </form>
    </div>
  </section>
</body>
</html>
