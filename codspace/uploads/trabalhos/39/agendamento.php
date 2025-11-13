<?php
    include "conexao.php";

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $dia = $_POST['dia'];
    $hora = $_POST['hora'];

    $sql = "INSERT INTO agendamento (nome, dia, hora )
            VALUES (:nome, :dia, :hora)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':dia', $dia);
    $stmt->bindParam(':hora', $hora);

           
    if ($stmt->execute()){
        header("agendamento.php");
        exit;
    }else{
        echo "Não deu boa!";
    }
    

     }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <style>
         * {
            margin: 0;
            padding: 0;
        } 

         header {
            height:50px;
        }

        html {
            font-family: Segoe UI;
           background: linear-gradient(to top, #9c9c9cff, #70c55fff);
        }  

         form {
            width: 400px;
        }
        
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 30px;
            height: 50px;
        }
                                         
        .container {
            display: flex;
            justify-content: center;
            align-items: center;           
        }

        input, select {
            width: 100%;
            padding: 5px;
            font-size: 0.7rem;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
             height: 100vh; 
        }

        .cabecalho{
            display: flex;
            padding: 5px 20px;
            border: solid black 1px ;
            width: 700px;
        }

        .linha {
            display: flex;
            border: solid  black 1px;
            padding: 5px 15px;
        }

        .cel_cabecalho {
            width: 170px;
        }
        .form-box {
            
            background-color: rgba(134, 196, 162, 1);
            border: 2px solid rgba(0, 0, 0, 1); 
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(33, 167, 115, 0.2); 
            margin: 20px;
        }
        button {
            background-color: rgba(124, 196, 90, 0.51);
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
            margin-top: 4px;
        }

        button:hover {
            background-color: rgba(135, 226, 214, 1);
        }

        h2 {
            text-align: center;
            color: black;
            margin-bottom: 20px;
            font-size: 1.9rem;
        }
</style>
</head>
<body>
     <div class="form-box">
     <form action="" method="post">
        <h2>Agendamento De Consultas</h2>

     <label for="nome">Qual Seu Nome?</label>
     <input type="text" name="nome" id="">
     
     <label for="dia">Dia</label>
     <select name="dia" id="">
        <option value="segunda">Segunda</option>
        <option value="terca">Terça</option>
        <option value="quarta">Quarta</option>
        <option value="quinta">Quinta</option>
        <option value="sexta">Sexta</option>
        <option value="sabado">Sabado</option>
        <option value="domingo">Domingo</option>
     </select>

     <label for="hora">Hora</label>
     <input type="time" name="hora" id="">

     <button type="submit">Salvar</button>
     </form>
    </div>

    <section class="resultados">
    <div class="resultado">
        <?php
             include "conexao.php";

             $sql = "SELECT * FROM agendamento";
             $stmt = $conexao->prepare($sql);
             $stmt->execute();

             if ($stmt->rowCount()>0){
                echo "<div class='cabecalho'>";
                    echo "<div class='cel_cabecalho'>id</div>";
                    echo "<div class='cel_cabecalho'>nome</div>";
                    echo "<div class='cel_cabecalho'>dia</div>";
                    echo "<div class='cel_cabecalho'>hora</div>";
                    echo "</div>";

                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<div class='linha'>";
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['dia']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['hora']}</div>";
                     

                 
                    echo "</div>";
                    echo "</div>";  
             }
             }else{
                echo "<p>nao tem registro</p>";
             }
            
        ?>
    </div>
</section>
</body>
</html>