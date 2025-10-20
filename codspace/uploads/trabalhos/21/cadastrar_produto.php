

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <style>
        *{
            margin:0;
            padding:0;
        }

        body {
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction: column;
            height:100vh;
            background:lightblue;
        }

        .cabecalho, .cel_cabecalho {
            display:flex;
            padding:0 10px;
           

        }
        .cel_cabecalho {
          width:200px;
          margin-left:10px;
          margin-right:10px;
          border: 1px solid black;
        }


         
      

        section {   
            width:100vh;
            
                        display:flex;
            justify-content:center;
            align-items:center;
           
            background:lightblue;
        }
        form {
            width:400px;
        }

        input {
            width:100%;
            background:lightyellow;
           
        }
      
        input,select {
            width: 100%;
            padding:5px;
            font-size:0.7rem;
            box-sizing:border-box;
        }

     




    </style>
</head>
<body>
   
    <section class="usuario">
    <form action="gravar_produto.php" method="post">

       <label for="produto">Produto</label>
       <input type="text" name="produto" id="">

       <label for="quantidade">Quantidade</label>
       <input type="number" name="quantidade" id="">

       <label for="valor">Valor</label>
       <input type="number" name="valor" id="">

        <button type="submit">Salvar</button>

        
    </form>
  </section>
  <section class="resultados">
    <div class="resultado">
        <?php
          include "conexao.php";

          $sql = "SELECT * FROM produtos";

          $stmt = $conexao-> prepare($sql);
          $stmt->execute();

          if($stmt->rowCount()>0){
            echo "<div class='cabecalho'>";
                echo "<div class='cel_cabecalho'>ID</div>";
                echo "<div class='cel_cabecalho'>Produto</div>";
                echo "<div class='cel_cabecalho'>Quantidade</div>";
                echo "<div class='cel_cabecalho'>valor</div>";
                echo "<div class='cel_cabecalho'>Ações</div>";
                
            echo "</div>";

          

          while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
             echo "<div class='cabecalho'>";
                echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                echo "<div class='cel_cabecalho'>{$linha['quantidade']}</div>";
                echo "<div class='cel_cabecalho'>{$linha['valor']}</div>";
                echo "<div class='cel_cabecalho'><button>Editar</button><button>Deletar</button></div>";
               
            echo "</div>";
          }
          }else{
            echo "nao tem registro";
          }
          
        ?>
    </div>
  </section>
</body>
</html>