<?php
    include 'conexao.php';
     
    $sql = "SELECT * FROM `professores`";
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
    <section>
        <div class="container">
            <form action="" method="post">
                <label for="materias">materias</label>
                <input type="text" name="materias" id="">
                <select name="professores" id="">
                    <?php
                    while($professores = $stmt->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$professores['id']}'>{$professores['nome']}</option>";
                    }
                    ?>
                </select>
             
                <button class="salvar">salvar</button>
                </select>
            </form>
        </div>
    </section>
 </body>
 </html>