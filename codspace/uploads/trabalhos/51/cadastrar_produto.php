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
            box-sizing: border-box;
        }
        body {
            background: linear-gradient(135deg, #ece2beff, #fda085);				;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction:column;
        }
        .form-container {
            background-color:#DC143C;
            border-radius: 10px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            margin-bottom:30px;
            max-width: 400px;
            box-shadow:4px 5px 30px #800000;
        }
        h2 {
            text-align: center;
            color:#800000;
            margin-bottom: 20px;
            font-size:1.8rem;
        }
        label{
            display:block;
            margin-top:10px;
            font-weight:bold;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #020200ff;
            border-radius: 5px;
            font-size: 14px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color:green;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        button:active{
            background-color:#A52A2A;
            transition:0.5s ease-in;
        }
        .cabecalho{
            display:flex;
            padding:15px;
            border:1px solid black;
            width: 1000px;
            background:bisque;
        }
        .cel_cabecalho{
            width:250px;

        }
        
        
    

    </style>
</head>
<body>
    <section>

    
      <div class="form-container">
        <h2>Preencha o Formulário</h2>

    <div class="resultados">
    <div class="resultado">
     <form action="gravar_produto.php" method="post">
        
     <label for="produto">Produto</label>
     <input type="text" name="produto" id="">

     <label for="quantiade">Quantidade</label>
     <input type="text" name="quantidade" id="">

     <label for="valor">Valor</label>
     <input type="number" name="valor" id="">



         <button type="submit">Salvar</button>

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
                echo"<div class='cel_cabecalho'>Produto</div>";
                echo"<div class='cel_cabecalho'>Quantidade</div>";
                echo"<div class='cel_cabecalho'>Valor</div>";
                echo"<div class='cel_cabecalho'>Ações</div>";
                echo "</div>";


            while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                  echo"<div class='cabecalho'>";
                  echo"<div class='cel_cabecalho'>{$linha['id']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['nome']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['quantidade']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['valor']}</div>";
        
                  echo "<form action='editar_produto.php' method'get'>
                  <input type='hidden' name='id' value='{$linha['id']}'>";

                  echo "<div class='cel_cabecalho'><button type='submit'>Editar</button><button>Deletar</button></div>";

                  echo "</form>";
                  echo "</div>";
            
            }
        }else{
                echo"<p>nao tem registro</p>";
            }


            ?>
            </div>
            </section>
</body>
</html>