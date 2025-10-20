<DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo2.css">
    <title>Document</title>
    <style>
          .cabecalho{
            display:flex;
            padding:20px;
        }
        .cel_cabecalho{
            width:auto;
            margin-left:10px;
            margin-right:10px;
        }
    </style>
</head>
<body>
    <section>
        <div class="container">
            <form action="gravar_usuario.php" method="post">

                <label for="nome">nome</label>
                <input type="text" name="nome" id="">

                <label for="sobrenome">sobrenome</label>
                <input type="text" name="sobrenome" id="">

                <label for="email">email</label>
                <input type="email" name="email" id="">

                <label for="senha">senha</label>
                <input type="password" name="senha" id="">

                <button type="submit">salvar</button>
                </form>
            </div>
    </section>
        <section class="resultados">
          <div class="resultado">
            <?php 
            include "conexao.php";

            $sql = "SELECT * FROM usuarios";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount()>0){
                echo"<div class='cabecalho'>";
                echo"<div class='cel_cabecalho'>nome</div>";
                echo"<div class='cel_cabecalho'>sobrenome</div>";
                echo"<div class='cel_cabecalho'>email</div>";
                echo"<div class='cel_cabecalho'>senha</div>";
                echo "</div>";
            

            while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                  echo"<div class='cabecalho'>";
                  echo"<div class='cel_cabecalho'>{$linha['nome']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['sobenome']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['email']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['senha']}</div>";
                   echo "</div>";
            }
        }else{
                echo"<p>nao tem registro</p>";
            }
            ?>
            </section>
</body>
</html>