<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <style>
         .container {
            display: grid;
            grid-template-columns: 1fr 4fr;
            gap: 5px;
         }

        .meio {
            display: flex;
            justify-content: center;
            padding-top: 20px;
        }
        input {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 2px;
        }
        select {
             width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 2px;
        }
        form {
            width: 300px;
        }
        input, select {
            width: 100%;
            padding: 5px;
            font-size: 0,7rem;
            box-sizing: border-box;
        }
        .cabecalho {
            display: flex;
            padding: 20px;
        }
        .cel_cabecalho {
            width: auto;
            margin-left: 10px;
            margin-right: 10px;
        }
       

    </style>
    <body>
    <section class="inicio">
        <div class="coluna meio">
                <form action="gravar_usuario.php" method="post">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="">

                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" name="sobrenome">

                    <label for="email">Email</label>
                    <input type="text" name="email">

                    <label for="senha">Senha</label>
                    <input type="password" name="senha">

                    <button class="submit">Salvar</button>
                </form>
            </div>
    </section>
    <section class="resultados">
        <div class="resultado">
            <?php
            include 'conexao.php';

            $sql = "SELECT * FROM usuarios";
            $stmt = $conexao->prepare($sql);
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
                echo "não tem registro";
            }
            ?>
        </div>
    </section>    
</body>
</html>
