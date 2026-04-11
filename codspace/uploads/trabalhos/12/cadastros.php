<?php
    include 'conexao.php';

    $sql = "SELECT * FROM `cadastros`";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
?>
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
        }

        body {
            display: flex;
            justify-content: center;
            background: linear-gradient(to right, pink , white );
        }

        form {
            width: 450px;
        }

        input, select {
            box-sizing: border-box;
              width: 100%;
        }

        button  {
          background: linear-gradient(to right, darkgreen, darkblue );
          width: 100%;
          height: 40px;
          color: #b89b9bff;
          border-radius: 10px;
        }


    </style>
</head>
<body>
    <section class="inicio">
        <div class="container">
            <form action="gravar_cadastros.php" method="post">

                
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="">

                <label for="sobrenome">Sobrenome</label>
                <input type="text" name="sobrenome" id="">

                
                <label for="nascimento">Nascimento</label>
                <input type="date" name="nascimento" id="">

                 <label for="numero">Numero</label>
                <input type="number" name="numero" id="">

                 <label for="email">Email</label>
                <input type="text" name="email" id="">
               
                    <?php
                    while($cadastros = $stmt->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$cadastros['id']}'>{$cadastros['nome']}</option>";
                    }
                    ?>
                    </select>
                    <button type="submit">Salvar</button>
                     <button type="submit">Limpar</button>


            </form>
        </div>
    </section>
</body>
</html>