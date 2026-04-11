<?php

ini_set("display_errors",0);
include 'conexaa_saude.php';

$genero = $_POST['genero'];
$idade = $_POST ['idade'];
$altura = $_POST ['altura'];
$peso = $_POST ['peso'];
$fumou = $_POST ['fumou'];
$exercicios = $_POST ['exercicios'];
$tempo_caminhada = $_POST ['tempo_caminhada'];
$tempo_corrida = $_POST ['tempo_corrida'];
$horas_exercicio = $_POST ['horas_exercicio'];
$sono = $_POST ['sono'];



$sql = "INSERT INTO pesquisa (genero,idade,altura,peso,fumou,exercicios,tempo_caminhada,tempo_corrida,horas_exercicio,sono)
VALUES (:genero,:idade,:altura,:peso,:fumou,:exercicios,:tempo_caminhada,:tempo_corrida,:horas_exercicio,:sono)";

$stm = $conexao->prepare($sql);
$stm->bindParam(':genero',$genero);
$stm->bindParam(':idade',$idade);
$stm->bindParam(':altura',$altura);
$stm->bindParam(':peso',$peso);
$stm->bindParam(':fumou',$fumou);
$stm->bindParam(':exercicios',$exercicios);
$stm->bindParam(':tempo_caminhada',$tempo_caminhada);
$stm->bindParam(':tempo_corrida',$tempo_corrida);
$stm->bindParam(':horas_exercicio',$horas_exercicio);
$stm->bindParam(':sono',$sono);
$stm->execute();

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Pesquisa de Saúde</title>
  <style>

    *{
        margin: o;
        padding: 0;
        box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      display: flex;
      justify-content: center;
      padding: 30px;
    }



    .container {
      background: #fff;
      width: 500px;
      padding: 20px 30px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

  
    p {
      font-size: 13px;
      color: #555;
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
      font-size: 14px;
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    .options {
      margin-top: 5px;
    }

    .options label {
      font-weight: normal;
      display: block;
      margin: 3px 0;
    }

    button {
            width:100%;
      margin-top: 20px;
      padding: 10px;
      background: #333;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    
    }

    button:hover {
      background: #555;
    }

    .captcha {
      margin-top: 15px;
    }

    .captcha-box {
      display: inline-block;
      padding: 5px 10px;
      background: #eee;
      border: 1px solid #ccc;
      margin-right: 10px;
      font-weight: bold;
    }
  </style>
</head>
<body>

<div class="container">
  <h2 id=titulo >Pesquisa de Saúde</h2>
  <p>
    Nós temos o prazer de te convidar para uma Pesquisa de Saúde de 5 minutos.
    Nossa Pesquisa da Saúde do Paciente inclui questões gerais e não invasivas sobre a sua saúde e hábitos.
    Respondendo à todas questões você nos ajudará  a implementar os melhores programas funcionais de melhoria da saúde.
  </p>

  <form action="" method="post">

  <label>Qual é o seu gênero?</label>
  <div class="options">
   <label>Qual é o seu gênero?</label>
<label><input type="radio" name="genero" value="Masculino"> Masculino</label>
<label><input type="radio" name="genero" value="Feminino"> Feminino</label>

<label>Qual é a sua idade?</label>
<input type="number" name="idade">

<label>Qual é a sua altura?</label>
<input type="text" name="altura">

<label>Qual é o seu peso?</label>
<input type="text" name="peso">

  <label>Você já fumou alguma vez?</label>
  <div class="options">
    <label><input type="radio" name="fumou"> Sim</label>
    <label><input type="radio" name="fumou"> Não</label>
  </div>

  <label>Você pratica regularmente os seguintes exercícios?</label>
  <div class="options">
  <input type="checkbox" name="exercicios[]" value="Caminhada"> Caminhada
  <input type="checkbox" name="exercicios[]" value="Natação"> Natação
  <input type="checkbox" name="exercicios[]" value="Bicicleta"> Bicicleta
  <input type="checkbox" name="exercicios[]" value="Outro"> Outro
  <input type="checkbox" name="exercicios[]" value="Eu não faço exercícios"> Eu não faço exercícios
    
      </div>

  <label>Se você caminha para se exercitar, quanto tempo você demora para andar um quilômetro</label>
  <input type="text">

  <label>Se você corre para se exercitar, quanto tempo você demora para andar um quilômetro</label>
  <input type="text">

  <label>Quantas horas por semana você costuma se exercitar?</label>
  <input type="text">

  <label>Quantas horas por dia você costuma dormir?</label>
  <input type="text">

<label>Verificação*</label>
  <div class="captcha">
    
    <span class="captcha-box">CEC32</span> 


  </div>

  <button>Enviar Pesquisa de Saúde</button>
  </form>
</div>

</body>
</html>