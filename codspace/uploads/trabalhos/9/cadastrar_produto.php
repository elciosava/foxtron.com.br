<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo2.css">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            background-color: #419fec59;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .form-container {
            background-color:#928374;
            border-radius: 10px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            margin-bottom: 30px;
            box-shadow: 4px 5px 30px #8756;
        }

        h2{
            text-align:center;
            color: #f1f1f1ff;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }

        label{
            display:block;
            margin-top:10px;
            font-weight: bold;
        }

        input, select {
            width:100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #f5f1f8ff;
            border-radius: 5px;
            font-size: 14px;
            transition: 0.3s ease-out;
        }

        input:hover, select:hover {
            border: 1px solid #f1f7f177;
            transition: 0.3 ease-in;
        }

        button {
            width: 60px;
            padding: 5px;
            background-color: #2fade793;
            border: 1px solid #83cde4ff;
            border-radius: 5px;
            color:white;
            font-size: 16px;
            cursor: pointer;
            margin-left: 15px;
            transition: 0.3s ease-out;
            font-weight: 200;
        }

        button:active {
            background-color: #eeeeeeff;
            transition: 0.3 ease-in;
        }

        .resultados {
            width: 100%;
            max-width: 800px;
            background-color: #ffff;
            border-radius: 10px;
            padding: 20px;
        }

        .cabecalho{
            display:flex;
            padding:20px;
        }
        
        .cabecalho{
            display:flex;
            padding: 0 20px;
            border: 1px solid black;
            width: 800px;
        }

        .cel_cabecalho{
            margin-left:10px;
            margin-right:10px; 
            width: 160px;;
        }
    </style>
</head>
<body>
    <section>
        <div class="container">
            <form action="gravar_produto.php" method="POST">

                <label for="produto"> produto </label>
                <input type="text" name="produto" id="">

                <label for="quantidade"> quantidade </label>
                <input type="text" name="quantidade" id="">

                <label for="valor"> valor </label>
                <input type="number" name="valor" id="">

                
                <button type="submit">salvar</button>
                
                </form>
            </div>
        </div>
    </section>
<section class="resultados">
        <div class="resultado">
            <?php 
            include "conexao.php";

            $sql = "SELECT * FROM produtos";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount()>0){
                echo"<div class='cabecalho'>";
                echo"<div class='cel_cabecalho'>ID</div>";
                echo"<div class='cel_cabecalho'>produto</div>";
                echo"<div class='cel_cabecalho'>quantidade</div>";
                echo"<div class='cel_cabecalho'>valor</div>";

                echo "</div>";
            

            while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                  echo"<div class='cabecalho'>";
                  echo"<div class='cel_cabecalho'>{$linha['id']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['nome']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['quantidade']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['valor']}</div>";
                echo"<div class='cel_cabecalho'><button>editar</button><button>deletar</button></div>";
                   echo "</div>";
            
            }
        }else{
                echo"<p>nao tem registro</p>";
            }
            ?>
</section>
</body>
</html>