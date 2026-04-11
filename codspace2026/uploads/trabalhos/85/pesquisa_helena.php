<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
$genero = $_POST['genero']; 
$idade   = $_POST['idade'];
$altura   = $_POST['altura'];
$peso = $_POST['peso']; 
$fumou   = $_POST['fumou'];
$caminhada   = $_POST['caminhada'];
$corrida = $_POST['corrida']; 
$natacao   = $_POST['natacao'];
$bicicleta   = $_POST['bicicleta'];
$outro = $_POST['outro']; 
$eunaofacoexercicios   = $_POST['eunaofacoexercicios'];
$caminha   = $_POST['caminha'];
$corre   = $_POST['corre'];
$semana = $_POST['semana']; 
$dia   = $_POST['dia'];


$sql = "INSERT INTO pesquisa (genero, idade, altura, peso, fumou, caminhada, corrida, natacao, bicicleta, outro, eunaofacoexercicios, caminha, corre, semana, dia)
                VALUES (:genero, :idade, :altura. :peso, :fumou, :caminhada, :corrida, :natacao, :bicicleta,:outro, :eunaofacoexercicios, :caminha, :corre, :semana, :dia)";
        $stmt = $conexao->prepare($sql);

        $stmt->bindParam(':genero', $genero);
        $stmt->bindParam(':idade', $idade);
        $stmt->bindParam(':altura', $altura);
         $stmt->bindParam(':peso', $peso);
        $stmt->bindParam(':fumou', $fumou);
        $stmt->bindParam(':caminhada', $caminhada);
         $stmt->bindParam(':corrida', $corrida);
        $stmt->bindParam(':natacao', $natacao);
        $stmt->bindParam(':bicicleta', $bicicleta);
         $stmt->bindParam(':outro', $outro);
        $stmt->bindParam(':eunaofacoexercicios', $eeunaofacoexercicios);
        $stmt->bindParam(':caminha', $caminha);
       $stmt->bindParam(':corre', $corre);
        $stmt->bindParam(':semana', $semana);
        $stmt->bindParam(':dia', $dia);

        $stmt->execute();
}
        ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesquisa de Saúde</title>

  <style>
    body {
      font-family: sans-serif;
      display: flex;
      justify-content: center;
    }

    .container {
      max-width: 600px;
      width: 100%;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    .descricao {
        
      margin-bottom: 30px;
    }

    .pergunta {
      margin-bottom: 20px; 
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"]{
      margin-bottom: 10px;
      width: 100%;
      margin-bottom: 5px;
      
    }
    input[type="checkbox"] {
        margin-bottom: 5px;

    }
  </style>
</head>

<body>

<div class="container">

  <h1>Pesquisa de Saúde</h1>

  <p class="descricao">
    Nós temos o prazer de te convidar para uma Pesquisa de Saúde de 5-minutos. Nossa Pesquisa da Saúde do Paciente inclui 
  questões gerais e não invasivas sobre a sua saúde e hábitos. Respondendo á todas as questões você nos ajudará a implementar os melhores progrmas funcionais de melhoria da saúde.
  </p>

  <form action="" method="post">

    <div class="pergunta">
      <label>Qual é o seu gênero?</label>

      <div>
          <input type="radio" name="genero" id="feminino">Feminino

      </div>
<div>

    <input type="radio" name="genero" id="masculino">Masculino
</div>
    </div>

    <div class="pergunta">
      <label for="idade">Qual é a sua idade?</label>
      <input type="text" id="idade">
    </div>

    <div class="pergunta">
      <label for="altura">Qual é a sua altura?</label>
      <input type="text" id="altura">
    </div>

    <div class="pergunta">
      <label for="peso">Qual é o seu peso?</label>
      <input type="text" id="peso">
    </div>

    <div class="pergunta">
      <label>Você já fumou alguma vez?</label>

      <div>
      <input type="radio" name="fumou" id="sim">Sim
      </div>

      <div>
      <input type="radio" name="fumou" id="nao">Não
</div>

    </div>

    <div class="pergunta">
      <label>Você pratica regularmente os seguintes exercícios?</label>

      <div>
      <input type="checkbox" id="caminhada">Caminhada
      </div>

      <div>
      <input type="checkbox" id="corrida">Corrida
      </div>

      <div>
      <input type="checkbox" id="natacao">Natação
      </div>

        <div>
      <input type="checkbox" id="bicicleta">Bicicleta
    </div>

      <div>
        <input type="checkbox" name="pratica" value="outro" id="outro">Outro
        </div>

        <div>
     <input type="checkbox" name="pratica" value="eunaofacoexercicios" id="eunaofacoexercicios">Eu não faço exercicios
       </div>
       
    </div>

    <div class="pergunta">
      <label for="caminha">Se você caminha para se exercitar, quanto tempo você demora para andar um quilômetro?</label>
      <input type="text" id="caminha">
    </div>

    <div class="pergunta">
      <label for="corre">Se você corre para se exercitar, quanto tempo você demora para correr um quilômetro?</label>
      <input type="text" id="corre">
    </div>

    <div class="pergunta">
      <label for="semana">Quantas horas por semana por semana você costuma se exercitar?</label>
      <input type="text" id="semana">
    </div>

    <div class="pergunta">
      <label for="dia">Quantas horas por dia por semana você costuma se exercitar?</label>
      <input type="text" id="dia">
    </div>

  <button type="submit">Enviar Pesquisa de Saúde</button>
  </form>

</div>

</body>
</html>
