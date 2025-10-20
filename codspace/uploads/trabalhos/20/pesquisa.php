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
$pergunta10= $_POST['pergunta10'];
$pergunta11 = $_POST['pergunta11'];
$pergunta12 = $_POST['pergunta12'];
$pergunta13 = $_POST['pergunta13'];
$pergunta14 = $_POST['pergunta14'];
$pergunta15 = $_POST['pergunta15'];

$texto = "------------------------------------\n";
$texto  .= "Data: " . date('d/m/y') . "\n";
$texto  .= "1. $p1\n";
$texto  .= "2. $p2\n";
$texto  .= "3. $p3\n";
$texto  .= "4. $p4\n";
$texto  .= "5. $p5\n";
$texto  .= "6. $p6\n";
$texto  .= "7. $p7\n";
$texto  .= "8. $p8\n";
$texto  .= "9. $p9\n";
$texto  .= "10. $p10\n";
$texto  .= "11. $p11\n";
$texto  .= "12. $p12\n";
$texto  .= "13. $p13\n";
$texto  .= "14. $p14\n";
$texto  .= "15. $p15\n";

file_put_contents("respostas.txt",$texto, FILE_APPEND);

echo "Respostas salvas com sucesso";

}



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title><style>

        
     body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background: linear-gradient(135deg, #00fff2ff, #d074faff);
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

.container {
  max-width: 700px;
  margin: 40px auto;
  background: linear-gradient(145deg, #ffffff, #7fd3ecff);
  padding: 40px;
  border-radius: 15px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.container:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
}
h2 {
  text-align: center;
  color: #2c3e50;
  margin-bottom: 30px;

  font-size: 2.5rem;       /* Aumenta o tamanho da fonte */
  font-weight: 700;        /* Negrito */
  text-transform: uppercase; /* Deixa todas as letras maiúsculas */
  letter-spacing: 2px;     /* Espaçamento entre letras */
  border-bottom: 3px solid #4CAF50; /* Linha verde abaixo */
  padding-bottom: 10px;    /* Espaçamento entre o texto e a linha */
  box-shadow: 0 2px 5px rgba(0,0,0,0.1); /* Sombra leve */
}



.container label {
  display: block;
  margin-top: 15px;
  color: #333;
  font-weight: 500;
}
.container textarea {
  width: 70%;
  padding: 10px;
  margin-top: 8px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 6px;
  resize: vertical;
  font-size: 14px;
  font-family: Arial, sans-serif;
  box-sizing: border-box;
}

/* Estilizando os inputs de rádio */
.container input[type="radio"] {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  width: 16px;
  height: 16px;
  border: 2px solid #4CAF50;
  border-radius: 50%;
  outline: none;
  margin-right: 8px;
  position: relative;
  top: 3px;
  cursor: pointer;
}

.container input[type="radio"]:checked {
  background-color: #4CAF50;
}

.container input[type="radio"]:checked::before {
  content: "";
  display: block;
  width: 6px;
  height: 6px;
  margin: 4px auto;
  border-radius: 50%;
  background: white;
}

/* Estilo do botão */
.container button {
  margin-top: 25px;
  padding: 12px;
  width: 100%;
  background-color: #4CAF50;
  color: white;
  font-size: 16px;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.container button:hover {
  background-color: #43a047;
}

        
    </style>
</head>
<body>
    <section class="inicio">
        <div class="container">
            <form action="" method="post">

            
    <h2>Questionario    </h2>
    
    <form action="" method="post">
        <!-- resto do formulário -->
  

            

                <label for="pergunta1">1. O Conteudo das  aulas é apresentado de forma clara e organizada?</label>
               <label > <input type="radio" name="pergunta1" value="Sempre">Sempre</label>
               <label > <input type="radio" name="pergunta1" value="As vezes">As vezes</label>
               <label > <input type="radio" name="pergunta1" value=" Raramente"> Raramente</label>
               <label > <input type="radio" name="pergunta1" value=" Nunca"> Nunca</label>


               <label for="pergunta2">2. O ritmo das explicações esta adequado para seu nivel de aprendizado? </label>
               <label > <input type="radio" name="pergunta2" value="Muito rapida">Muito rapida</label>
               <label > <input type="radio" name="pergunta2" value="Adequado">Adequado</label>
               <label > <input type="radio" name="pergunta2" value=" Um pouco devagar">Um pouco devagar</label>
               <label > <input type="radio" name="pergunta2" value="Muito Devagar ">Muito Devagar </label>


               <label for="pergunta3">3.Você sente que entende o que esta sendo ensinado antes de  passar para o proximo assunto?  </label>
               <label > <input type="radio" name="pergunta3" value="Sim muito">Sim muito</label>
               <label > <input type="radio" name="pergunta3" value="Nas maiorias das vezes"> Nas maiorias das vezes</label>
               <label > <input type="radio" name="pergunta3" value="As vezes fico com duvida">As vezes fico com duvida </label>
               <label > <input type="radio" name="pergunta3" value="Frequente mente fico perdido">Frequente mente fico perdido </label>

                <label for="pergunta4">4.O professor explica o conteudo de maneira que você entenda com facilidade?  </label>
               <label > <input type="radio" name="pergunta4" value="As explicações são claras">As explicações são claras</label>
               <label > <input type="radio" name="pergunta4" value="Tenho dificuldade"> Tenho dificuldade</label>
               <label > <input type="radio" name="pergunta4" value="Tenho dificuldade na maioria das aulas"> Tenho dificuldade na maioria das aulas</label>
               <label > <input type="radio" name="pergunta4" value="Não compreendo o conteudo">Não compreendo o conteudo</label>

                <label for="pergunta5">5. O professor responde  as duvidas dos alunos de maneira atenciosa? </label>
               <label > <input type="radio" name="pergunta5" value=" Sempre">Sempre </label>
               <label > <input type="radio" name="pergunta5" value="As vezes"> As vezes </label>
               <label > <input type="radio" name="pergunta5" value="Raramente">Raramente </label>
               <label > <input type="radio" name="pergunta5" value="Nunca "> Nunca</label>

                <label for="pergunta6">6.Você sente que o professor se preocupa em vericar se todos estão entendento?  </label>
               <label > <input type="radio" name="pergunta6" value="Sim ">Sim </label>
               <label > <input type="radio" name="pergunta6" value=" As vezes"> As vezes</label>
               <label > <input type="radio" name="pergunta6" value="Um pouco ">Um pouco </label>
               <label > <input type="radio" name="pergunta6" value="Não ">Não </label>
               

                <label for="pergunta7">7.As atividades ajudam a entende o conteude?  </label>
               <label > <input type="radio" name="pergunta7" value="Sim muito">Sim muito </label>
               <label > <input type="radio" name="pergunta7" value="Um pouco">Um pouco</label>
               <label > <input type="radio" name="pergunta7" value="Não muito ">Não muito</label>
               <label > <input type="radio" name="pergunta7" value="Não ajuda">Não ajuda</label>
               

                <label for="pergunta8">8. Você prefere mais aulas...  </label>
               <label > <input type="radio" name="pergunta8" value="Aulas praticas ">Aulas praticas </label>
               <label > <input type="radio" name="pergunta8" value="Aulas teoricas">Aulas teoricas </label>
               <label > <input type="radio" name="pergunta8" value="Equilibrio entre pratica e teorica ">Equilibrio entre pratica e teorica </label>
               
               
                <label for="pergunta9">9. O tempo das atividades das aulas é suficiente?  </label>
               <label > <input type="radio" name="pergunta9" value="Sim ">Sim </label>
               <label > <input type="radio" name="pergunta9" value="As vezes "> As vezes </label>
               <label > <input type="radio" name="pergunta9" value="Não ">Não </label>
               
               
                <label for="pergunta10">10. O ambiente da sala favorece o aprendizado?  </label>
                <label > <input type="radio" name="pergunta9" value="Sim ">Sim </label>
               <label > <input type="radio" name="pergunta9" value="As vezes "> As vezes </label>
               <label > <input type="radio" name="pergunta9" value="Não ">Não </label>
               

               <label for="pergunta11">11.Como você se sente para tirar duvidas com o professor? </label>
               <textarea name="pergunta11" id=""></textarea>
              
               <label for="pergunta12">12.O que você mais gosta nas aulas de programação?  </label>
                <textarea name="pergunta12" id=""></textarea>

               <label for="pergunta13">13. O que poderia ser melhorado nas aulas ou nas explicações?  </label>
               <textarea name="pergunta13" id=""></textarea>

               <label for="pergunta14">14. Há algum assunto ou linguagem que você gostaria que fosse mais explorada? </label>
                <textarea name="pergunta14" id=""></textarea>

               <label for="pergunta15">15. Deixe aqui qualquer outra sugestão ou comentario. </label>
               <textarea name="pergunta15" id=""></textarea>


               <button type="submit">Enviar</button>
               
               
               
               
               
     

            </form>
        </div>
    </section>
</body>
</html>