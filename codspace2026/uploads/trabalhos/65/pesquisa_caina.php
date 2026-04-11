<?php
    ini_set("display_errors",0);
    include 'conexao.php';

    $sql = "INSERT INTO pesquisa_caina (genero, qual_sua_idade, qual_sua_altura, qual_seu_peso, voce_ja_formou_alguma_vez, sim, nao, voce_pratica_regulamente_os_seguintes_exercicios, se_voce_caminha_quanto_tempo_para_fazer_1km, se_voce_corre_quanto_tempo_para_fazer_1km, quantas_horas_por_semana_voce_costuma_se_exercitar, quantas_horas_por_semana_voce_costuma_dormir )
        VALUES (:nome, :genero, :qual_sua_idade, :qual_sua_altura :qual_seu_peso, :voce_ja_formou_alguma_vez :sim, :nao, :voce_pratica_regulamente_os_seguintes_exercicios, :se_voce_caminha_quanto_tempo_para_fazer_1km, :se_voce_corre_quanto_tempo_para_fazer_1km, :quantas_horas_por_semana_voce_costuma_se_exercitar, :quantas_horas_por_semana_voce_costuma_dormir)";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':genero', $genero);
        $stmt->bindParam(':qual_sua_idade', $qual_sua_idade);
         $stmt->bindParam(':qual_sua_altura', $qual_sua_altura);
        $stmt->bindParam(':qual_seu_peso', $qual_seu_peso);
        $stmt->bindParam(':voce_ja_formou_alguma_vez', $voce_ja_formou_alguma_vez);
        $stmt->bindParam(':sim', $sim);
        $stmt->bindParam(':nao', $nao);
        $stmt->bindParam(':voce_pratica_regulamente_os_seguintes_exercicios', $voce_pratica_regulamente_os_seguintes_exercicios);
        $stmt->bindParam(':se_voce_caminha_quanto_tempo_para_fazer_1km', $se_voce_caminha_quanto_tempo_para_fazer_1km);
        $stmt->bindParam(':se_voce_corre_quanto_tempo_para_fazer_1km', $se_voce_corre_quanto_tempo_para_fazer_1km);
        $stmt->bindParam(':quantas_horas_por_semana_voce_costuma_se_exercitar', $quantas_horas_por_semana_voce_costuma_se_exercitar);
        $stmt->bindParam(':quantas_horas_por_semana_voce_costuma_dormir', $quantas_horas_por_semana_voce_costuma_dormir);
        $stmt->execute();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body {
           display: flex;
           justify-content: center;
           align-items: center;

        }
        input[type="text"] {
            width: 100%;
            margin-bottom: 10px;

        }
        form {
            width: 500px;
        }
        input[type="radio"] {
             width: 50px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h2>Pesquisa de Saúde.</h2>
            <p>Nós temos o prazer de te convidar para uma Pesquisa de Saúde de 5-minutos. 
                Nossa pesquisa da saúde do 
                Paciente inclui questões
                gerais e não ivasivas sobre a sua saúde e hábitos.
                Respondendo á todas as questões voce nos ajudara
                 a implementar os melhores programas funcionais de melhoria da saúde.
            </p>
            
             <label for="genero">Qual é seu Genero?</label>
             <div>
                 <input type="radio" name="genero" value="masculino"> Masculino
             </div>
            <input type="radio" name="genero" value="feminino"> Feminino

             <div>
              <label for="qual_sua_idade">Qual sua idade?</label>
             
            </div>

            <div>
                <input type="text" name="" id="">
            </div>
             <div>
              <label for="qual_sua_altura">Qual sua altura?</label>
             
            </div>

            <div>
                <input type="text" name="" id="">
            </div>
             <div>
              <label for="qual_seu_peso">Qual seu peso?</label>
             
            </div>

            <div>
                <input type="text" name="" id="">
            </div>
            <div>
                <label for="voce_ja_formou_alguma_vez">Voce já formou alguma vez?</label>
            </div>
             <div>
                 <input type="radio" name="sim" value="sim"> Sim
             </div>
             <div>
                 <input type="radio" name="nao" value="nao"> Não
             </div>

              <div>
                <label for="voce_pratica_regulamente_os_seguintes_exercicios">Voce pratica regulamente os seguintes exercicios?</label>
            </div>
            <div>
                <input type="checkbox" name="exercicio1" value="caminhada"> Caminhada
            </div>
             <div>
                <input type="checkbox" name="exercicio2" value="corrida"> Corrida
            </div>
             <div>
                <input type="checkbox" name="exercicio3" value="natacao"> Natação
            </div>
             <div>
                <input type="checkbox" name="exercicio4" value="bicicleta"> Bicicleta
            </div>
             <div>
                <input type="checkbox" name="exercicio5" value="outro"> Outro
            </div>
             <div>
                <input type="checkbox" name="exercicio6" value="eu_nao_pratico_exercicios"> Eu não pratico exercícios
            </div>
            <div>
                <label for="se_voce_caminha_quanto_tempo_para_fazer_1km">Se voce caminha quanto tempo leva para fazer 1km</label>
            </div>
             <div>
                <input type="text" name="" id="">
             </div>
            <div>
                <label for="se_voce_corre_quanto_tempo_para_fazer_1km">Se voce corre quanto tempo leva para fazer 1km?</label>
            </div>
            <div>
                <input type="text" name="" id="">
            </div>
            <div>
                 <label for="quantas_horas_por_semana_voce_costuma_se_exercitar">Quantas horas por semana voce costuma se exercitar?</label>
            </div>
            <div>
                <input type="text" name="" id="">
            </div>
            <div>
            <label for="quantas_horas_por_semana_voce_costuma_dormir">Quantas horas por semana voce costuma dormir?</label>
            </div>
            <div>
                <input type="text" name="" id="">
            </div>
            <button type="submit">Enviar informacões</button>
</body>
</html>

