<?php
    include 'conexao.php';

    $sql = "SELECT * FROM `endereco`";
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
            background: linear-gradient(to right, blue , red );
        }

        form {
            width: 450px;
        }

        input, select {
            box-sizing: border-box;
              width: 100%;
        }

        button  {
          background: linear-gradient(to right, green , grey );
          width: 100%;
          height: 40px;
          color: #000000;
          border-radius: 10px;
        }


    </style>
</head>
<body>
    <section class="inicio">
        <div class="container">
            <form action="" method="post">

                
                <label for="nome">nome</label>
                <input type="text" name="nome" id="">

                <label for="sobrenome">sobrenome</label>
                <input type="text" name="sobrenome" id="">

                
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="">

                
                <label for="endereco">Endereco</label>
                <select name="text" name="endereco" id="">
                    <?php
                    while($endereco = $stmt->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$endereco['id']}'>{$endereco['nome']}</option>";
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