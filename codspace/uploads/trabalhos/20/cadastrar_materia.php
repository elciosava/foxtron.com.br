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



* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}


body {
    background: linear-gradient(135deg, #0d0d2b, #1a1a40, #2b0b3d); 
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    color: #e0e0ff;
    background-attachment: fixed;
    overflow-x: hidden;
}


body::after {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 200%;
    height: 200%;
    background: radial-gradient(white, transparent 2px) repeat;
    background-size: 50px 50px;
    opacity: 0.08;
    pointer-events: none;
    z-index: 0;
}


.container {
    background: rgba(30, 0, 60, 0.8);
    padding: 40px 50px;
    border-radius: 12px;
    width: 100%;
    max-width: 480px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.6);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    color: #e0e0ff;
}

.container:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(124, 58, 173, 0.6);
}


form {
    display: flex;
    flex-direction: column;
    gap: 18px;
}


label {
    font-weight: 600;
    font-size: 1rem;
    color: #dcdcff;
}

input[type="text"],
select {
    padding: 12px 14px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 8px;
    font-size: 1rem;
    transition: all 0.2s ease;
    background-color: rgba(255, 255, 255, 0.05);
    color: #e0e0ff;
}

input[type="text"]:focus,
select:focus {
    outline: none;
    border-color: #7c3aed;
    box-shadow: 0 0 5px rgba(124, 58, 173, 0.5);
    background-color: rgba(255, 255, 255, 0.1);
}


button {
    background-color: #7c3aed;
    border: none;
    padding: 14px 0;
    border-radius: 8px;
    color: white;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
    box-shadow: 0 4px 12px rgba(124, 58, 173, 0.4);
}

button:hover {
    background-color: #9333ea;
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(124, 58, 173, 0.6);
}


select {
    padding: 12px 14px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 8px;
    font-size: 1rem;
    transition: all 0.2s ease;
    background-color: rgba(255, 255, 255, 0.05);
    color: #e0e0ff;
    -webkit-appearance: none; 
    -moz-appearance: none;
    appearance: none;
}


select:focus {
    outline: none;
    border-color: #7c3aed;
    box-shadow: 0 0 5px rgba(124, 58, 173, 0.5);
    background-color: rgba(255, 255, 255, 0.1);
    color: #e0e0ff;
}


select option {
    background-color: rgba(30, 0, 60, 0.9); 
    color: #e0e0ff;
}


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
