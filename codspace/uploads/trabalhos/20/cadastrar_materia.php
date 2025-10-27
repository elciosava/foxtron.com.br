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
    <title>Cadastrar Matéria</title>
   <style>
/* Reset e base */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Body */
body {
    background: #f5f7fa;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    color: #333;
}

/* Container */
.container {
    background: #ffffff;
    padding: 40px 50px;
    border-radius: 12px;
    width: 100%;
    max-width: 480px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.container:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.15);
}

/* Form */
form {
    display: flex;
    flex-direction: column;
    gap: 18px;
}

/* Labels */
label {
    font-weight: 600;
    font-size: 1rem;
    color: #444;
}

/* Inputs e select */
input[type="text"],
select {
    padding: 12px 14px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 1rem;
    transition: all 0.2s ease;
    background-color: #fdfdfd;
    color: #333;
}

input[type="text"]:focus,
select:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0,123,255,0.3);
}

/* Botão */
button {
    background-color: #007bff;
    border: none;
    padding: 14px 0;
    border-radius: 8px;
    color: white;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
}

button:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

/* Responsividade */
@media (max-width: 520px) {
    .container {
        padding: 30px 25px;
    }
}
</style>

</head>
<body>
    <section class="inicio">
        <div class="container">
           <form action="gravar_materia.php" method="post">
                <label for="nome">Nome da Matéria</label>
                <input type="text" name="nome" id="nome">
                <select name="nome_materia" id="">
                    <?php 
                        while ($prof = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$prof['id']}'>{$prof['nome']}</option>";
                        }
                    ?>
                </select>

                <button type="submit">Salvar</button>
           </form>
        </div>
    </section>
</body>
</html>
