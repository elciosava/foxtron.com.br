
<?php
$masculino = "Masculino";
$femenino = "Femenino";



?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Pesquisa de Saúde</title>
       <style>
    

  .coluna {
            width: 500px;
            background: green;
            display: flex;
        }

        .coluna {
            width: 250px;
            border: 1px solid gray;
            padding: 5px;
        }

          .coluna {
            width: 500px;
            display: flex ;
        }
       
                 
    </style>
</head>
<body>

    <h1>Pesquisa de Saúde</h1> 

    <form>

        <!-- Gênero -->
        <p>Qual seu gênero?</p>
        <input type="radio" name="genero" value="masculino"> Masculino<br>
        <input type="radio" name="genero" value="feminino"> Feminino<br>
     
        <!-- Idade -->
        <p>Qual sua idade?</p>
                     <input type="number" name="idade" required><br><br>

        <!-- Altura -->
               <p>Qual sua altura? </p>
        <input type="number" name="altura" required><br><br>

        <!-- Peso -->
        <p>Qual é seu peso? </p>
        <input type="number" name="peso" required><br><br>

        <!-- Fumou -->
        <p>Você já fumou alguma vez?</p>
                  <input type="radio" name="fumou" value="sim"> Sim<br>
             <input type="radio" name="fumou" value="nao"> Não<br><br>

        <!--  -->
        <p>Você pratica regularmente os seguintes exercícios?</p>
           <input type="checkbox" name="exercicios" value="caminhada"> Caminhada<br>
                 <input type="checkbox" name="exercicios" value="corrida"> Corrida<br>
                          <input type="checkbox" name="exercicios" value="natacao"> Natação<br>
                       <input type="checkbox" name="exercicios" value="bicicleta"> Bicicleta<br>
                                   <input type="checkbox" name="exercicios" value="outro"> Outro<br>
                              <input type="checkbox" name="exercicios" value="nenhum"> Eu não faço exercícios<br><br>


                              
        <!--  -->
               <p>Se você caminha para se exercitar, quanto tempo você demora para andar um quilômetro? </p>
        <input type="number" name="quilômetro" required><br><br>

          <!--  -->
        <p>Se você corre para se exercitar, quanto tempo você demora para correr um quilômetro?</p>
        <input type="number" name="quilômetro" required><br><br>

               <!--  -->
        <p>Quantas horas por semana você costuma se exercitar? </p>
        <input type="number" name="exercitar?" required><br><br>


          <p>Quantas horas por você costuma dormir ? </p>
        <input type="number" name="exercitar?" required><br><br>




        <button type="submit">Enviar</button>

    </form>

</body>
</htm