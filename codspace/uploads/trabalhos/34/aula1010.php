
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            

            }
            body{

                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                height: 100vh;
            }
            form{
                width: 300px;
            }
            input, select{
                width: 100%;
                padding: 5px;
                font-size: 0.7rem;
                box-sizing: border-box;
            }
            .cabecalho{
                display:flex;
                padding: 20px;
            }
            .cel_cabecalho{
                width:auto;
                margin-left: 10px;
                margin-right: 10px;
            }
            
            

                

            
        
    </style>
</head>
<body>
    <section>
        <div class="container">
            <form action="gravar_endereco.php" method="post">
                <label for="tipo">Tipo</label>
                <input type="text" name="tipo" id="">

                <label for="nome">nome</label>
                <input type="text" name="nome" id="">

                <label for="numero">Numero</label>
                <input type="number" name="numero" id="">

                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" id="">

                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" id="">

                <label for="estado">Estado</label>
                <input type="text" name="estado" id="">

                <button type="submit">salvar</button>

                
            </form>
            

        </div>
    </section>
    <section class="resultados">
        <div class="container">
            <?php
                  include "conexao.php";

                  $sql = "SELECT * FROM endereco";
                  $stmt = $conexao->prepare($sql);
                  $stmt->execute();

                  if($stmt->rowCount()>0){
                    echo "<div class='cabecalho'>";
                        echo "<div class='cel_cabecalho'>ID</div>";
                        echo "<div class='cel_cabecalho'>Tipo</div>";
                        echo "<div class='cel_cabecalho'>Nome</div>";
                        echo "<div class='cel_cabecalho'>Numero</div>";
                        echo "<div class='cel_cabecalho'>Bairro</div>";
                        echo "<div class='cel_cabacalho'>Cidade</div>";
                        echo "<div class='cel_cabecalho'>Estado</div>";

                        echo"</div>";

                  while($linha = $stmt->fetch (PDO::FETCH_ASSOC)){
                    echo "<div class='cabecalho'>";
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>"; 
                    echo "<div class='cel_cabecalho'>{$linha['tipo']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['numero']}</div>";
                    echo "<div class='cel_cabacalho'>{$linha['bairro']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['cidade']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['estado']}</div>";

                    echo"</div>";

                  }
                }else {
                    echo "<p>nao tem registro</p>";
                }


            ?>

        </div>
    </section>
</body>
</html>

