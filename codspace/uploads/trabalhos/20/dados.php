<?php


   include 'conexao.php';

   $sql = "SELECT * FROM `dados`";
   $stmt = $conexao->prepare($sql);
   $stmt->execute();
?>
<!DOCTYPE html>
<html lang="pt-br">
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
                <input type="text" name="nome" id="">

                <label for="sobrenome">Sobrenome</label>
                <input type="text" name="sobrenome" id="">

                <label for="nacimento">Nacimento</label>
                <input type="date" name="nacimento" id="">

                <label for="telefone">Telefone</label>
                <input type="number" name="telefone" id="">

                 <label for="email">Email</label>
                <input name="email" id="">

                    <?php 
                        while ($endereco = $stmt->fetch(PDO::FETCH_ASSOC)) {
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