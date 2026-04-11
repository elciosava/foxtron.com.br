<?php
    ini_set("display_errors",0);

    include 'conexao.php';

    $genero = $_POST['genero'];
    $idade = $_POST['idade'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $fumo = $_POST['fumo'];
    $exercicio = $_POST['exercicio'];
    $caminha = $_POST['caminha'];
    $corrida = $_POST['corrida'];
    $exercitar = $_POST['exercitar'];
    $dormir = $_POST['dormir'];

    $sql = "INSERT INTO pesquisa (genero, idade, altura, peso, fumo, exercicio, caminha, corrida, exercitar, dormir)
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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa de Saúde</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: sans-serif;
            background: #15b600;
        }

        form{
            width: 300px;
            padding: 10px;
            border: 1px solid black;
            background: #c1df00;
        }

        .container{
            width: 310px;
            padding: 10px;
        }

        input[type="text"]{
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        p{
            width: 600px;
        }

        button{
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: 0.3s;
            color: #0b00a1;
        }

    </style>
</head>
<body>
    <h1>Pesquisa de Saúde</h1>
    <p>Nós temos o prazer de convidar você para realizar uma Pesquisa sobre Saúde que tem duração de 5 minutos.
       Nossa Pesquisa sobre a Saúde do Paciente inclui questões gerais e não invasivas sobre a sua saúde e hábitos.
       Respondendo à todas as questões você nos ajudará a implementar os melhores programas
       funcionais de melhoria da saúde.
    </p>
    <div class="container">
        <form action="" method="post">

            <label for="genero">Qual o seu Gênero ?</label>
            <div><input type="radio" name="genero" value="Masculino"> Masculino</div>
            <div><input type="radio" name="genero" value="Feminino"> Feminino</div>

            <label for="idade">Qual é sua idade ?</label>
            <input type="text" name="idade" id="">

            <label for="altura">Qual é a sua altura atual ?</label>
            <input type="text" name="altura" id="">

            <label for="peso">Qual é o seu peso atual ?</label>
            <input type="text" name="peso" id="">

            <label for="fumo">Você já deu uma tragada alguma vez ?</label>
            <input type="radio" name="fumo" value="Sim">Sim
            <input type="radio" name="fumo" value="Não">Não

            <label for="exercicio">Você pratica regularmente os seguintes exercícios ?</label>
            <div><input type="checkbox" name="exercicio1" value="Caminhada">Caminhada</div>
            <div><input type="checkbox" name="exercicio2" value="Corrida">Corrida</div>
            <div><input type="checkbox" name="exercicio3" value="Natacao">Natação</div>
            <div><input type="checkbox" name="exercicio4" value="Ciclismo">Ciclismo</div>
            <div><input type="checkbox" name="exercicio5" value="Outro">Outro</div>
            <div><input type="checkbox" name="exercicio6" value="Eu não faco exercício">Eu não faço exercício</div>

            <label for="caminha">Se você caminha para se exercitar, quanto tempo você demora para andar um quilomêtro ?</label>
            <input type="text" name="caminha" id="">

            <label for="corrida">Se você corre para se exercitar, quanto tempo você demora para correr um quilomêtro ?</label>
            <input type="text" name="corrida" id="">

            <label for="exercitar">Quantas horas você costuma se exercitar ?</label>
            <input type="text" name="exercitar" id="">

            <label for="dormir">Quantas horas por dia você costuma dormir ?</label>
            <input type="text" name="dormir" id="">

            <button type="submit">Enviar Pesquisa de Saúde</button>
        </form>
    </div>

</body>
</html>