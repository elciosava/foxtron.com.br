
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

        body{
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
            flex-direction:column;
            background:lightgreen;      
        }

      section{
        width:100vh;
      
           display:flex;
            justify-content:center;
            align-items:center;
            background:gray;
      }

      form{
     width:400px;

      }

      input{
        width:400px;
        background:lightblue;
      }

    .cabecalho{
        display:flex;
        padding: 20px;
    }

        .cel_cabecalho{
            width: auto;
            margin-left:10px;
            margin-right:10px;

        }

      
    </style>
</head>
<body>          
    <section class="usuario">
    <form action="gravarusuario.php" method="post">

    <label for="nome">Nome</label>
    <input type="text" name="nome" id="">

     <label for="sobrenome">Sobrenome</label>
    <input type="text" name="sobrenome" id="">

     <label for="email">Email</label>
    <input type="email" name="email" id="">

     <label for="senha">Senha</label>
    <input type="password" name="senha" id="">



   <button type="submit">Enviar</button>
</form>
</section>

<section class="resultados">
    <div class="resultado">
        <?php
       include "conexao.php";

       $sql = "SELECT *FROM usuarios";

       $stmt = $conexao ->prepare($sql);

        $stmt->execute();
        if($stmt->rowCount()>0){
            echo "<div class='cabecalho'>";
            echo "<div class='cel_cabecalho'>ID</div>";
           echo "<div class='cel_cabecalho'>Nome</div>";
           echo "<div class='cel_cabecalho'>Sobrenome</div>";
           echo "<div class='cel_cabecalho'>Email</div>";
           echo "<div class='cel_cabecalho'>Senha</div>";
           echo "</div>";
       

        while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
               echo "<div class='cabecalho'>";
            echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
           echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
           echo "<div class='cel_cabecalho'>{$linha['sobrenome']}</div>";
           echo "<div class='cel_cabecalho'>{$linha['email']}</div>";
           echo "<div class='cel_cabecalho'>{$linha['senha']}</div>";
           echo "</div>";
        } 
        }else{
            echo "nao tem registo";
        }


        ?>
    </div>
</section>
</body>
</html>         