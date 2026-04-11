<?php



    include 'conexao.php';

    $sql = "SELECT * FROM `dados`";
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
            <form action="gravar_dados.php" method="post">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome">

                <label for="sobrenome">Sobrenome</label>
                <input type="text" name="sobrenome" id="sobrenome">

                <label for="data_nasc">Data de Nascimento</label>
                <input type="date" name="data_nasc" id="">

                <label for="telefone">Telefone</label>
                <input type="number" name="telefone" id="">

                <label for="email">Email</label>
                <input type="email" name="email" id="">
                    <?php
                        while($dados = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo "<option value='{$dados['id']}'>{$dados['nome']}</option>";
                        }
                    ?>
                </select>
                <button type="submit">Salvar</button>
            </form>
        </div>
    </section>
</body>
</html>
