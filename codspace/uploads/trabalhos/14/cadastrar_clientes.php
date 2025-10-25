<?php
    include 'conexao.php';

    $sql = "SELECT * FROM `endereco`";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <input type="number" name="cpf" id="">

                <label for="endereco">endereco</label>
                <select name="endereco" id="">
                    <?php
                        while($endereco = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo "<option value='{$endereco['id']}'>{endereco['nome']}</option>";
                        }
                    ?>
                </select>
            </form>
        </div>
    </section>
</body>
</html>