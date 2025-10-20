<?php
$msg = '';
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
    $p16 = $_POST['pergunta16'];

    $texto = "------------------------------\n";
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
    $texto .= "16. $p16\n";

    file_put_contents("respostas.txt", $texto, FILE_APPEND);

    $msg = "<p style='color: green; font-weight: bold; text-align: center;'>Respostas salvas com sucesso!</p>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Questionário de Aula</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #FFC1C1, #fff) ;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 700px;
      margin: 40px auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
    }

    .pergunta {
      margin-bottom: 25px;
    }

    .pergunta label {
      display: block;
      font-weight: bold;
      margin-bottom: 8px;
      color: #444;
    }

    .opcoes label {
      display: block;
      margin-bottom: 5px;
      font-weight: normal;
      color: #555;
    }

    input[type="radio"] {
      margin-right: 8px;
    }

    button {
      display: block;
      margin: 30px auto 0;
      padding: 10px 20px;
      background-color: #FFB5C5;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background-color: #EEA2AD;
    }

    $msg = "
    <div style='
    background-color: ##fff;
    color: #155724;
    border: 1px solid #c3e6cb;
    padding: 15px;
    border-radius: 8px;
    text-align: center;
    font-weight: bold;
    font-size: 18px;
    margin-bottom: 20px;
'>
  ✅ Respostas salvas com sucesso!
</div>";

 </style>
</head>
<body>
  <div class="container">
    <h1>Questionário de Aula</h1>
    <?php
      if($msg !== ''){
          echo $msg;
      }
    ?>

    <form action="" method="post">
      <div class="pergunta">
        <label for="pergunta1">1. O conteúdo das aulas é apresentado de forma clara e organizada?</label>
        <div class="opcoes">
          <label><input type="radio" name="pergunta1" value="Sempre" />Sempre</label>
          <label><input type="radio" name="pergunta1" value="Às vezes" />Às vezes</label>
          <label><input type="radio" name="pergunta1" value="Raramente" />Raramente</label>
          <label><input type="radio" name="pergunta1" value="Nunca" />Nunca</label>
        </div>
      </div>

      <div class="pergunta">
        <label for="pergunta2">2. O cheiro de seus colegas atrapalha seu aprendizado?</label>
        <div class="opcoes">
          <label><input type="radio" name="pergunta2" value="Sempre" />Sempre</label>
          <label><input type="radio" name="pergunta2" value="Às vezes" />Às vezes</label>
          <label><input type="radio" name="pergunta2" value="Raramente" />Raramente</label>
          <label><input type="radio" name="pergunta2" value="Nunca" />Nunca</label>
        </div>
      </div>

      <div class="pergunta">
        <label for="pergunta3">3. O ritmo está adequado para o seu nível de aprendizado?</label>
        <div class="opcoes">
          <label><input type="radio" name="pergunta3" value="Muito rápido" />Muito rápido</label>
          <label><input type="radio" name="pergunta3" value="Adequado" />Adequado</label>
          <label><input type="radio" name="pergunta3" value="Um pouco devagar" />Um pouco devagar</label>
          <label><input type="radio" name="pergunta3" value="Muito devagar" />Muito devagar</label>
        </div>
      </div>

      <div class="pergunta">
        <label for="pergunta4">4. Você sente que entende o conteúdo que está sendo ensinado?</label>
        <div class="opcoes">
          <label><input type="radio" name="pergunta4" value="Sim, muito" />Sim, muito</label>
          <label><input type="radio" name="pergunta4" value="Na maioria das vezes" />Na maioria das vezes</label>
          <label><input type="radio" name="pergunta4" value="Às vezes fico com dúvidas" />Às vezes fico com dúvidas</label>
          <label><input type="radio" name="pergunta4" value="Frequentemente fico perdido" />Frequentemente fico perdido</label>
        </div>
      </div>

      <div class="pergunta">
        <label for="pergunta5">5. O professor explica o conteúdo de maneira que você compreende com facilidade?</label>
        <div class="opcoes">
          <label><input type="radio" name="pergunta5" value="As aplicações são claras" />As aplicações são claras</label>
          <label><input type="radio" name="pergunta5" value="Tenho dificuldade" />Tenho dificuldade</label>
          <label><input type="radio" name="pergunta5" value="Tenho dificuldade na maioria das aulas" />Tenho dificuldade na maioria das aulas</label>
          <label><input type="radio" name="pergunta5" value="Não compreendo o conteúdo" />Não compreendo o conteúdo</label>
        </div>
      </div>

      <div class="pergunta">
        <label for="pergunta6">6. O professor responde as dúvidas dos alunos de maneira atenciosa?</label>
        <div class="opcoes">
          <label><input type="radio" name="pergunta6" value="Sempre" />Sempre</label>
          <label><input type="radio" name="pergunta6" value="Às vezes" />Às vezes</label>
          <label><input type="radio" name="pergunta6" value="Raramente" />Raramente</label>
          <label><input type="radio" name="pergunta6" value="Nunca" />Nunca</label>
        </div>
      </div>

        <div class="pergunta">
        <label for="pergunta7">7. Você sente que o professor se preocupa em verificar se todos estão entendendo?</label>
        <div class="opcoes">
          <label><input type="radio" name="pergunta7" value="Sim" />Sim</label>
          <label><input type="radio" name="pergunta7" value="Às vezes" />Às vezes</label>
          <label><input type="radio" name="pergunta7" value="Um pouco" />Um pouco</label>
          <label><input type="radio" name="pergunta7" value="Não" />Não</label>
        </div>
      </div>

      <div class="pergunta">
        <label for="pergunta8">8. As atividades práticas ajudam a entender o conteúdo?</label>
        <div class="opcoes">
          <label><input type="radio" name="pergunta8" value="Sim, muito" />Sim, muito</label>
          <label><input type="radio" name="pergunta8" value="Um pouco" />Um pouco</label>
          <label><input type="radio" name="pergunta8" value="Não muito" />Não muito</label>
          <label><input type="radio" name="pergunta8" value="Não ajudam" />Não ajudam</label>
        </div>
      </div>

      <div class="pergunta">
        <label for="pergunta9">9. Você prefere mais aula...?</label>
        <div class="opcoes">
          <label><input type="radio" name="pergunta9" value="Aulas prática" />Aulas prática</label>
          <label><input type="radio" name="pergunta9" value="Aulas teoricas" />Aulas teoricas</label>
          <label><input type="radio" name="pergunta9" value="Equilíbrio entre aulas teóricas e práticas" />Equilíbrio entre aulas teóricas e práticas</label>
        </div>
      </div>

      <div class="pergunta">
        <label for="pergunta10">10. O tempo das atividades das aulas é suficiente?</label>
        <div class="opcoes">
          <label><input type="radio" name="pergunta10" value="Sim" />Sim</label>
          <label><input type="radio" name="pergunta10" value="Às vezes" />Às vezes</label>
          <label><input type="radio" name="pergunta10" value="Não" />Não</label>
        </div>
      </div>

       <div class="pergunta">
        <label for="pergunta11">11. O ambiente de sala favorece o aprendizado?</label>
        <div class="opcoes">
          <label><input type="radio" name="pergunta11" value="Sim" />Sim</label>
          <label><input type="radio" name="pergunta11" value="Às vezes" />Às vezes</label>
          <label><input type="radio" name="pergunta11" value="Não" />Não</label>
        </div>
      </div>

     <div class="pergunta">
        <label for="pergunta12">12. Como você se sente para tirar dúvidas com o professor?</label>
        <div class="opcoes">
          <textarea name="pergunta12" id="pergunta12" rows="2"></textarea>
        </div>
      </div>

      <div class="pergunta">
        <label for="pergunta13">13. O que você gosta nas aulas de programação?</label>
        <div class="opcoes">
          <textarea name="pergunta13" id="pergunta13" rows="2"></textarea>
        </div>
      </div>

      <div class="pergunta">
        <label for="pergunta14">14. O que poderia ser melhorado nas aulas ou nas explicações?</label>
        <div class="opcoes">
          <textarea name="pergunta14" id="pergunta14" rows="2"></textarea>
        </div>
      </div>

      <div class="pergunta">
        <label for="pergunta15">15. Há algum assunto ou linguagem que você gostaria que fosse mais explorado?</label>
        <div class="opcoes">
          <textarea name="pergunta15" id="pergunta15" rows="2"></textarea>
        </div>
      </div>

      <div class="pergunta">
        <label for="pergunta16">16. Deixe aqui qualquer sugestão ou comentário: </label>
        <div class="opcoes">
          <textarea name="pergunta16" id="pergunta16" rows="2"></textarea>
        </div>
      </div>


      <button type="submit">Enviar</button>
      
    </form>
  </div>
</body>
</html>

