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
        .coluna {
            background: rgb(247,147,147);
            height: calc(100vh - 60px);
            display: grid;
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
        

    </style>
    <section class="inicio">
        <div class="coluna meio">
                <form action="" method="post">
                    <label for="nome">ID</label>
                    <input type="text" name="nome" id="">

                    <label for="tipo">Tipo</label>
                    <select name="tipo" id="">
                        <option value="Travessa">Travessa</option>
                        <option value="Rua">Rua</option>
                        <option value="Rua">Beco</option>
                        <option value="Rua">Avenida</option>
                        <option value="Rua">Alameda</option>
                    </select>

                    <label for="senha">Sigma</label>
                    <input type="password" name="senha" id="">

                    <label for="senha">Numero</label>
                    <input type="text" name="senha" id="">
                    
                    <label for="cidade">Cidade</label>
                    <select name="cidade" id="">
                        <option value="Porto União">Porto União</option>
                        <option value="União da Vitória">União da Vitória</option>
                    </select>

                    <label for="senha">Bairro</label>
                    <input type="text" name="senha" id="">

                        
                    </select>

                    <label for="senha">Estado</label>
                    <input type="text" name="senha" id="">

                    <button class="submit">Salvar</button>
                </form>
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
                echo "<div class='cabecalho>";
                echo "<div class='cel_cabecalho'>ID</div>";
                echo "<div class='cel_cabecalho'>Tipo</div>";
                echo "<div class='cel_cabecalho'Nome</div>";
                echo "<div class='cel_cabecalho'>Numero</div>";
                echo "<div class='cel_cabecalho'>Bairro</div>";
                echo "<div class='cel_cabecalho'>Cidade</div>";
                echo "<div class='cel_cabecalho'>Estado</div>";
                echo "</div>";
            }
            ?>
        </div>
    </section>
</head>
<body>
    
</body>
</html>