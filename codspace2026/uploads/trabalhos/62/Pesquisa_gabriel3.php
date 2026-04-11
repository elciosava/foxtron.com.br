<?php
$masculino = "Masculino";
$femenino = "Femenino";
$genero = $_POST['genero'];
$altura = $_POST['idade'];
$peso = $_POST['peso'];
$fumou = $_POST['exercicio'];
$caminha = $_POST['corrida'];
$exercitar = $_POST['exercitar'];
$dormir = $_POST['dormir'];

$sql = "INSERT INTO pesquisa_gabriel3 (genero, idade, altura, peso, fumo, exercicio, caminha, corrida, exercitar, dormir)
            VALUES (:genero, :idade, :altura, :peso, :fumo, :exercicio, :caminha, :corrida, :exercitar, :dormir)";
   
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':idade', $idade);
    $stmt->bindParam(':altura', $altura);
    $stmt->bindParam(':peso', $peso);
    $stmt->bindParam(':fumo', $fumo);
    $stmt->bindParam(':exercicio', $exercicio);
    $stmt->bindParam(':caminha', $caminha);
    $stmt->bindParam(':corrida', $corrida);
    $stmt->bindParam(':exercitar', $exercitar);
    $stmt->bindParam(':dormir', $dormir);
    $stmt->execute();


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Pesquisa de Saúde</title>
  
  <style>

    input[type="text"],
    input[type="number"]{
        width: 100%;

        
    .container {
  text-align: center;
}

    }
    form{
        width: 500px;
       
    }
         body{
            display: flex;
            justify-content:center;
            align-items:center
         }


  

  </style>
</head>
<body>



<form action="" method="post">
    <h2>Pesquisa de Saúde</h2>
     <p>Nós temos o prazer de te convidar para uma Pesquisa de saúde de 5-minutos. nossa Pesquisada Saúde do Paciente inclui questões gerais e não invasivas sobre a sáude e hábitos. Respondendo á todas as questões  você  nos ajudará a implementar os melhores programas funcionais de melhoria da saúde. </p>

  <!-- Gênero -->
  <p>Qual é o seu gênero?</p>
  <input type="radio" name="genero" value="masculino"> Masculino<br>
  <input type="radio" name="genero" value="feminino"> Feminino<br>

  <!-- Idade -->
  <p>Qual é a sua idade?</p>
  <input type="number" name="idade">

  <!-- Altura -->
  <p>Qual é a sua altura?</p>
  <input type="text" name="altura">

  <!-- Peso -->
  <p>Qual é o seu peso?</p>
  <input type="text" name="peso">

  <!-- Fuma -->
  <p>Você já fumou alguma vez?</p>
  <input type="radio" name="fuma" value="sim"> Sim<br>
  <input type="radio" name="fuma" value="nao"> Não<br>

  <!-- Exercícios -->
  <p>Você pratica regularmente os seguintes exercícios?</p>
  <input type="checkbox" name="exercicio" value="caminhada"> Caminhada<br>
           <input type="checkbox" name="exercicio" value="corrida"> Corrida<br>
                <input type="checkbox" name="exercicio" value="natacao"> Natação<br>
                      <input type="checkbox" name="exercicio" value="bicicleta"> Bicicleta<br>
                          <input type="checkbox" name="exercicio" value="outro"> Outro<br>
                                <input type="checkbox" name="exercicio" value="nenhum"> Eu não faço exercícios<br>

  <!-- Caminhada -->
  <p>Se você caminha para se exercitar, quanto tempo você demora para andar um quilômetro?</p>
  <input type="text" name="tempo_caminhada">

  <!-- Corrida -->
  <p>Se você corre para se exercitar, quanto tempo você demora para correr um quilômetro?</p>
  <input type="text" name="tempo_corrida">

  <!-- Horas por semana -->
  <label>Quantas horas por semana você costuma se exercitar?</label>
  <input type="number" name="horas_semana">

  <!-- Sono -->
  <p>Quantas horas por dia você costuma dormir?</p>
  <input type="number" name="sono">

  <!-- Botão -->
  <br><br>
  <button type="submit" black>Enviar Pesquisa de Saúde</button>

</form>

</body>
</html>