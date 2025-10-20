DOCTYPE html>
<html lang="en">
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
            <form action="gravar_endereco.php" method="POST">
                <label for="tipo">tipo</label>
                <select name="tipo" id="">
                    <option value="avenida">Avenida</option>
                    <option value="avenida">Rua</option>
                    <option value="avenida">Beco</option>
                    <option value="avenida">Viela</option>
                    <option value="avenida">Travessa</option>
                    <option value="avenida">Alameda</option>
                </select>

                <label for="nome">nome</label>
                <input type="text" name="nome" id="">

                <label for="numero">numero</label>
                <input type="number" name="numero" id="">

                <label for="bairro">bairro</label>
                <input type="text" name="bairro" id="">

                <label for="cidade">cidade</label>
                <select name="cidade" id="">
                    <option value="avenida">união da vitoria</option>
                    <option value="avenida">porto união</option>
                </select>
                <label for="estado">estado</label>
                <select name="estado" id="">
                    <option value="avenida">SC</option>
                    <option value="avenida">PR</option>
                </select>

                <button type="submit">salvar</button>
                
                </form>
            </div>
        </div>
    </section>
<section class="resultados">
        <div class="resultado">
            <?php 
            include "conexao.php";

            $sql = "SELECT * FROM endereco";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount()>0){
                echo"<div class='cabecalho'>";
                echo"<div class='cel_cabecalho'>ID</div>";
                echo"<div class='cel_cabecalho'>Tipo</div>";
                echo"<div class='cel_cabecalho'>Nome</div>";
                echo"<div class='cel_cabecalho'>Numero</div>";
                echo"<div class='cel_cabecalho'>Bairro</div>";
                echo"<div class='cel_cabecalho'>Cidade</div>";
                echo"<div class='cel_cabecalho'>Estado</div>";
                echo "</div>";
            

            while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                  echo"<div class='cabecalho'>";
                  echo"<div class='cel_cabecalho'>{$linha['id']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['tipo']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['nome']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['numero']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['bairro']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['cidade']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['estado']}</div>";
                   echo "</div>";
            
            }
        }else{
                echo"<p>nao tem registro</p>";
            }


            ?>
            </section>
</body>
</html>