<?php
if($_SERVER['RESQUEST_METHOD'] === 'POST'){
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

$texto = "-------------------------\n";
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
    .container {
      display: flex;
      flex-direction: column;
      gap: 20px;
      max-width: 600px;
      margin: 40px auto;
      font-family: Arial, sans-serif;
      
    }

   h1 {
  text-align: center;
  color: #003366; /* Azul mais escuro */
  border: 2px solid #0056b3; /* Borda azul mais forte */
  padding: 15px;
  border-radius: 10px;
  background-color: #cce5ff; /* Fundo azul clarinho */
  font-size: 2.5rem; /* Maior */
  font-weight: 700; /* Negrito forte */
  text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

    textarea {
  width: 100%;
  height: 70px;      /* Altura menor */
  padding: 8px;
  font-family: Arial, sans-serif;
  font-size: 14px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  box-sizing: border-box;
  margin-top: 5px;
  margin-bottom: 15px;
}

    form {
      border: 1px solid #ccc;
      padding: 15px;
      border-radius: 8px;
      background-color: #f9f9f9;
     
    }

    .container:hover{
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba( 0 , 0 , 0 0.2);
    }

    

    
  input[type="radio"]:hover {
    border-color: #002f6c; /* azul escuro ao passar o mouse */
  }

    label {
      display: block;
      margin: 10px 0 5px;
    }

    button {
  margin-top: 10px;
  padding: 8px 16px;
  background-color: #1b72c4ff; /* Verde */
  width:100%;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="radio"] {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  width: 18px;
  height: 18px;
  border: 2px solid #007bff; /* borda azul */
  border-radius: 50%;
  outline: none;
  cursor: pointer;
  position: relative;
  margin-right: 8px;
  vertical-align: middle;
  transition: background-color 0.2s ease;
}

input[type="radio"]:checked::before {
  content: "";
  position: absolute;
  top: 3px;
  left: 3px;
  width: 10px;
  height: 10px;
  background-color: #007bff; /* bolinha azul */
  border-radius: 50%;
}

button:hover {
  background-color: #170e92ff; /* Verde um pouco mais escuro ao passar o mouse */
}

body {
  margin: 0;
  padding: 0;
  background: linear-gradient(135deg, #00d7f3ff, #2f00ffff); /* gradiente azul bonito */
  font-family: Arial, sans-serif;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}
  </style>
    
</head>
<body>
    <section class="inicio">
       
        <div class="container">
             <h1>Questionario SENAI</h1>
            <form action="" method="post">
                <label for="pergunta1">1. O conteudo das aulas é apresentado de 
                    forma clara e organizada?</label>
                <label><input type="radio" name="pergunta1" value="Sempre">Sempre</label>
                <label><input type="radio" name="pergunta1" value="As vezes">As vezes</label>
                <label><input type="radio" name="pergunta1" value="Raramente">Raramente</label>
                <label><input type="radio" name="pergunta1" value="Nunca">Nunca</label>


                <label for="pergunta2">2. O ritmos das explicações esta adequado para seu nivel para o
                    seu nivel de aprendizado? </label>
                <label><input type="radio" name="pergunta2" value="Muito rapida">Muito rapida</label>
                <label><input type="radio" name="pergunta2" value="Adequado">Adequado</label>
                <label><input type="radio" name="pergunta2" value="Um pouco devagar">Um pouco devagar</label>
                <label><input type="radio" name="pergunta2" value="Muito devagar">Muito devagar</label>

                <label for="pergunta3">3. Você sente que entende o que esta sendo ensinado antes de passar para o proximo assunto ? </label>
                <label><input type="radio" name="pergunta3" value="Sim Muito">Sim muito</label>
                <label><input type="radio" name="pergunta3" value="Na maioria das vezes">Na maioria das vezes</label>
                <label><input type="radio" name="pergunta3" value="As vezes fico com duvida">As vezes fico com duvida</label>
                <label><input type="radio" name="pergunta3" value="Frequentemente fico perdido">Frequentemente fico perdido</label>

                <label for="pergunta4">4. O professor explica o conteudo de maneira que voce compreende com facilidade? </label>
                <label><input type="radio" name="pergunta4" value="As explicações são claras">As explicações são claras</label>
                <label><input type="radio" name="pergunta4" value="Tenho dificuldade">Tenho dificuldade</label>
                <label><input type="radio" name="pergunta4" value="Tenho dificuldade nas maioria das aulas">Tenho dificuldade nas maioria das aulas</label>
                <label><input type="radio" name="pergunta4" value="Não compreendo o conteudo">Não compreendo o conteudo</label>

                <label for="pergunta5">5. O professor responde as duvidas dos alunos de maneira atenciosa? </label>
                <label><input type="radio" name="pergunta5" value="Sempre">Sempre</label>
                <label><input type="radio" name="pergunta5" value="As vezes">As vezes</label>
                <label><input type="radio" name="pergunta5" value="Raramente">Raramente</label>
                <label><input type="radio" name="pergunta5" value="Nunca">Nunca</label>

                <label for="pergunta6">6. Você sente que o professor se preocupa em verificar se os alunos estão entendendo? </label>
                <label><input type="radio" name="pergunta6" value="Sim">Sim</label>
                <label><input type="radio" name="pergunta6" value="As vezes">As vezes</label>
                <label><input type="radio" name="pergunta6" value="Um pouco">Um pouco</label>
                <label><input type="radio" name="pergunta6" value="Não">Não</label>

                <label for="pergunta7">7. As atividades praticas ajudam a entender? </label>
                <label><input type="radio" name="pergunta7" value="Sim">Sim</label>
                <label><input type="radio" name="pergunta7" value="Um pouco">Um pouco</label>
                <label><input type="radio" name="pergunta7" value="Não muito">Não muito</label>
                <label><input type="radio" name="pergunta7" value="Não ajudam">Não ajudam</label>

                <label for="pergunta8">8. Você prefere mais aulas...? </label>
                <label><input type="radio" name="pergunta8" value="Aulas praticas">Aulas praticas</label>
                <label><input type="radio" name="pergunta8" value="Aulas teoricas">Aulas teoricas</label>
                <label><input type="radio" name="pergunta8" value="Equilibrio entre pratica e teorica">Equlibrio entre pratica e teorica</label>

                <label for="pergunta9">9. O tempo das atividades das aulas é suficiente? </label>
                <label><input type="radio" name="pergunta9" value="Sim">Sim</label>
                <label><input type="radio" name="pergunta9" value="As vezes">As vezes</label>
                <label><input type="radio" name="pergunta9" value="Não">Não</label>
                

                <label for="pergunta10">10. O ambiente da sala favorece o aprendizado? </label>
                <label><input type="radio" name="pergunta10" value="Sim">Sim</label>
                <label><input type="radio" name="pergunta10" value="As vezes">As vezes</label>
                <label><input type="radio" name="pergunta10" value="Não">Não</label>
               

                <label for="pergunta11">11. Como você sente para tirar duvidas com o professor? </label>
                <textarea name="pergunta11" id=""></textarea>
                

                <label for="pergunta12">12. O que você mais gosta nas aulas de programação? </label>
                 <textarea name="pergunta12" id=""></textarea>

                <label for="pergunta13">13. O que poderia ser mudado nas aulas ou nas explicações? </label>
                <textarea name="pergunta13" id=""></textarea>

                <label for="pergunta14">14. Há algum assunto ou linguagem que você gostaria que fosse mais explorada? </label>
                <textarea name="pergunta14" id=""></textarea>

                <label for="pergunta15">15. Deixe aqui qualquer outra sugestão ou comentario</label>
                <textarea name="pergunta15" id=""></textarea>
                 <button type="submit">Enviar</button>

            </form>
        </div>
    </section>  
</body>
</html>