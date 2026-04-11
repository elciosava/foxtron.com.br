<?php
    include 'conexao.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $cores = $_POST['cores'];
  

    $sql = "INSERT INTO cores (nome, cores)
            VALUES (:nome, :cores)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cores', $cores);

    
    if ($stmt->execute()){
        header("location:cores.php");
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
    <title>Cores</title>

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
           background: linear-gradient(to top, #89d47fff, #71c3ceff);
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
            padding: 5px 15px;
            border: solid black 1px ;
            width: 550px;
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
            
            background-color: rgba(87, 173, 133, 1);
            border: 2px solid rgba(0, 0, 0, 1); 
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(43, 62, 238, 0.2); 
            margin: 20px;
        }
        button {
            background-color: rgba(112, 188, 194, 0.51);
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
            background-color: rgba(64, 80, 218, 1);
        }

        h2 {
            text-align: center;
            color: black;
            margin-bottom: 20px;
            font-size: 1.9rem;
        }
        
 .cor-box {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 1px solid #000;
            margin-right: 8px;
            vertical-align: middle;
        }

 </style>

</head>
<body>
    <div class="conteiner">
         <div class="form-box">
        <form action="" method="post">
            <h2>Cadastro De Cores</h2>

            <label for="cores">Cor</label>
            <input type="color" name="cores" id="">

            <label for="nome">Qual a Cor Vc Quer</label>
            <input type="text" name="nome" id="">

            <button type="submit">Salvar</button>

    </form>
    </div>
    </div>

    <section class="resultados">
    <div class="resultado">
        <?php
             include "conexao.php";

             $sql = "SELECT * FROM cores";
             $stmt = $conexao->prepare($sql);
             $stmt->execute();

             if ($stmt->rowCount()>0){
                echo "<div class='cabecalho'>";
                    echo "<div class='cel_cabecalho'>id</div>";
                    echo "<div class='cel_cabecalho'>nome</div>";
                    echo "<div class='cel_cabecalho'>cores</div>";
                    echo "</div>";

                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<div class='linha'>";
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                     echo "<div class='cor-box' style='background-color: {$linha['cores']};'></div>";
                    echo "{$linha['cores']}";
                     

                    

                    

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