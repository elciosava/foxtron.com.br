<?php
if ($_SERVER["RESQUEST_METHOD"]== "POST"){
$gênero_POST("gênero");
$idade_POST("idade");
$altura_POST("altura");
$peso_POST("peso");
$fumou_POST("fumou");
$caminha_POST("caminha");
$exercício1_POST("exercício1");
$exercício2_POST("exercício2");
$exercício3_POST("exercício3");
$exercício4_POST("exercício4");
$exercício5_POST("exercício5");
$exercício6_POST("exercício6");
$caminha_POST("caminha");
$corre_POST("corre");
$horas_POST("horas");
$verificação_POST("verificação");
}

$sql ="INSERT INTO saude (gênero, peso, fumou)
VALUE (:gênero, :peso, :fumou )";

$stmt = $conexao->prepare($sql);
$stmt->bindParam(':gênero','gênero');
$stmt->bindParam(':peso','peso');
$stmt->bindParam(':fumou','fumou');

$stmt = PDO->prepare($sql)
    


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pesquisa de saude</title>
    <style>
        input[type="text"] {
            width: 100%;

        }

        * {
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        form {
            width: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        div {
            width: 100%;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <form action="" method="post">
        <h2>Pesquisa da Saúde</h2>

        <p>Nós temos prazer de te convidar para uma Pesquisa de Saúde de 5-minutos.
            Nossa pesquisa da Saúde de Paciente inclui questões gerais e não invasivas sobre a sua saúde e hábitos.
            Respondendo à todas as questões você nos ajudará a implementar os melhores programas funcionais de melhoria de Saúde.
        </p>
        <div>
            <label for="qual e o seu gênero?">qual é o seu gênero?</label>

        </div>
        <div>
            <input type="radio" name="gênero" VALUE="masculino" id="">masculino
        </div>
        <div>
            <input type="radio" name="gênero" VALUE="feminino" id="">feminino
        </div>
        <div>
            <label for="qual a sua idade?">qual é a sua idade?</label>
        </div>
        <div>
            <input type="text" name="" id="">
        </div>
        <div>
            <label for="qual e a sua altura?">qual é a sua altura?</label>
        </div>
        <input type="text" name="" id="">
        </div>
        <div>
            <label for="qual e o seu peso?">qual é o seu peso?</label>
        </div>
        <div>
            <input type="text" name="" id="">
        </div>
        <div>
            <label for="voce ja fumou alguma vez?">você já fumou alguma vez?</label>
        </div>
        <div>
            <input type="radio" name="sim" VALUE="sim" id="">sim
        </div>
        <div>
            <input type="radio" name="não" VALUE="não" id="">não
        </div>
        <div>você pratica regulamente os seguintes exercícios?</div>

        <div>
            <input type="checkbox" name="exercicio 1" VALUE="caminhada" id="">caminhada
        </div>
        <div>
            <input type="checkbox" name="exercicio 2" VALUE="corrida" id="">corrida
        </div>
        <div>
            <input type="checkbox" name="exercicio 3" VALUE="natação" id="">natação
        </div>
        <div>
            <input type="checkbox" name="exercicio 4" VALUE="bicicleta" id="">bicicleta
        </div>
        <div>
            <input type="checkbox" name="exercicio 5" VALUE="outro" id="">outro
        </div>
        <div>
            <input type="checkbox" name="exercicio 6" VALUE="eu não faço exercícios" id="">caminhada
        </div>
        <div>
            <label for="se você caminha para exercita,quanto tempo você demora para andar um quilômetro?">se você caminha para exercita,quanto tempo você demora para andar um quilômetro?</label>
        </div>
        <div>
            <input type="text" name="" id="">
        </div>
        <div>
            <label for="se você corre,quanto tempo você demora para corre um quilômetro?">se você corre para exercita,quanto tempo você demora para corre um quilômetro?</label>
        </div>
        <div>
            <input type="text" name="" id="">
        </div>
        <div>
            <label for="quantas horas por semana você custuma se exercita?">quantas horas por semana você custuma se exercita?</label>
        </div>
        <div>
            <input type="text" name="" id="">
        </div>
        <div>
            <label for="quantas horas por dia você custuma dormir">quantas horas por dia você custuma dormir</label>
        </div>
        <div>
            <input type="text" name="" id="">
        </div>
        <div>
            <label for="verificação">verificação</label>
        </div>
        <div>
            <input type="text" name="" id="">
        </div>

        <div>
            <button type="submit"> Salvar</button>
        </div>
    </form>
</body>

</html>