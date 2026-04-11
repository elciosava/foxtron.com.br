<?php
include 'conexao.php';

//$sql = "SELECT professores.nome, materia.materia FROM professores AS professores
 //INNER JOIN materias AS materia WHERE professores.id = materia.id_professores";

 //$stmt = $conexao->prepare($sql);
 //$stmt->execute();
 $sql = "SELECT * FROM `clientes`";
   $stmt = $conexao->prepare($sql);
   $stmt->execute();

    $sql_carros = "SELECT * FROM `carros`";
   $stmt_carros = $conexao->prepare($sql_carros);
   $stmt_carros->execute();

   include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_carros = $_POST['id_carros'];
    $id_clientes = $_POST['id_clientes'];
    

    $sql = "INSERT INTO aluguel (id_carros, id_clientes)
    Values (:id_carros, :id_clientes)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_carros',$id_carros);
    $stmt->bindParam(':id_clientes',$id_clientes);
    
    
    if ($stmt->execute()){
     header("location:aluguel.php");
     exit;
    }else{
        echo"Não Deu Boa!!"; 
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        margin: 0;
        font-family: 'Montserrat', sans-serif;
        background: radial-gradient(circle at 30% 20%, #0a0f1f, #000);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        color: #fff;
    }

    /* Fundo com efeito de energia */
    body::before {
        content: '';
        position: absolute;
        width: 200%;
        height: 200%;
        background: linear-gradient(120deg, rgba(0, 90, 255, 0.3), rgba(255, 215, 0, 0.1), rgba(0, 200, 255, 0.2));
        animation: moveBg 8s linear infinite;
        opacity: 0.3;
        z-index: 0;
    }

    @keyframes moveBg {
        from { transform: translate(0, 0); }
        to { transform: translate(-10%, -10%); }
    }

    .container {
        position: relative;
        z-index: 1;
        background: rgba(0, 0, 0, 0.85);
        border-radius: 20px;
        padding: 40px;
        width: 340px;
        box-shadow: 0 0 25px rgba(0, 150, 255, 0.4);
        border-top: 2px solid #00aaff;
        border-bottom: 2px solid #ffd700;
        text-align: center;
    }

    h1 {
        font-size: 1.8rem;
        margin-bottom: 25px;
        color: #00aaff;
        text-shadow: 0 0 10px #0099ff, 0 0 20px #00ccff;
        letter-spacing: 1px;
    }

    label {
        display: block;
        margin: 12px 0 6px;
        text-align: left;
        font-weight: 600;
        color: #ddd;
    }

    select, button {
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 8px;
        margin-bottom: 15px;
        font-size: 16px;
        transition: 0.3s;
    }

    select {
        background: #101426;
        color: #fff;
        border: 1px solid #00aaff;
        outline: none;
    }

    select:focus {
        box-shadow: 0 0 8px #00ccff;
    }

    button {
        background: linear-gradient(90deg, #00aaff, #0077ff);
        color: white;
        font-weight: 700;
        letter-spacing: 1px;
        cursor: pointer;
        box-shadow: 0 0 10px #00aaff;
    }

    button:hover {
        background: linear-gradient(90deg, #0077ff, #00ccff);
        box-shadow: 0 0 15px #00ccff;
        transform: scale(1.05);
    }

    .logo {
        font-size: 2rem;
        font-weight: 700;
        background: linear-gradient(90deg, #00aaff, #ffd700);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
</style>
</head>
<body>
    <section>
        <div class="container">
            <form action="" method="post">
                <label for="cliente">Cliente</label>
                <select name="id_clientes" id="">
                    <?php 
                        while ($clientes = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$clientes['id']}'>{$clientes['nome']}</option>";
                        }
                    ?>
                </select>
                <label for="carros">Carros</label>
                <select name="id_carros" id="">
                    <?php 
                        while ($carros = $stmt_carros->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$carros['id']}'>{$carros['marca']}</option>";
                        }
                    ?>
                </select>

                <button type="submit">Enviar</button>
            </form>

        </div>
    </section>
</body>
</html>
