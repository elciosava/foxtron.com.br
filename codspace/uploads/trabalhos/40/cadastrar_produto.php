DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo2.css">
    <title>Document</title>
    <style>
          .cabecalho, .cel_cabecalho{
            display:flex;
            padding: 0 20px;
            border: 1px solid black;
            width: 1000px;
           
        }

         .cel_cabecalho{
            width: 250px;
         }
       

    </style>
</head>
<body>
    <section>
        <div class="container">
            <form action="gravar_produto.php" method="post">

              <label for="produto">Produto</label>
              <input type="numero" name="produto" id="">

              <label for="quantidade">Quantidade</label>
              <input type="numero" name="quantidade" id="">

              <label for="valor">Valor</label>
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
                echo"<div class='cel_cabecalho'>Produto</div>";
                echo"<div class='cel_cabecalho'>Quantidade</div>";
                echo"<div class='cel_cabecalho'>Valor</div>";
                echo "<div class='cel_cabecalho'>Ações</div>";
                echo "</div>";
            

            while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                  echo"<div class='cabecalho'>";
                  echo"<div class='cel_cabecalho'>{$linha['id']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['nome']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['quantidade']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['valor']}</div>";
                     echo "<div class='cel_cabecalho'><button>Editar</button><button>Deletar</button></div>";
                   echo "</div>";
            
            }
        }else{
                echo"<p>nao tem registro</p>";
            }


            ?>
            </section>
</body>
</html>