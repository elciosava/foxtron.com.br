<?php

include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_aluno = $_POST['id_alunos'];
    $id_computador = $_POST['id_computador'];

    $sql = "INSERT INTO computadores (id_aluno, id_computador)
            VALUES(:id_aluno, :id_computador)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_alunos', $id_alunos);
    $stmt->bindParam(':id_computadores', $id_computadores);

    if ($stmt->execute()){
        header("location:cadastro_reserva.php");
        exit;
    }else{
        echo "nao deu boa!";
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
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background: #ffffffff;
        color: #030303ff;
        line-height: 1.6;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        min-height: 100vh;
        padding: 20px;
    }

    .endereco form {
        width: 100%;
        max-width: 400px;
        background: #ffffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(27, 142, 243, 0.1);
        margin-bottom: 30px;
    }

    .endereco label {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    .endereco input
    .endereco select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
        border: 1px solid #13b4eaff;
        font-size: 14px;
    }

    .endereco input[type="date"],
    .endereco input[type="time"] {
        font-size: 14px;
    }

    .endereco select {
        background-color: #16b0dfff;
        cursor: pointer;
    }

    .endereco input:focus,
    .endereco select:focus {
        border-color: #3a85fdff;
        outline: none;
        box-shadow: 0 0 5px rgba(29, 39, 54, 0.92);
    }

    .endereco button {
        width: 100%;
        padding: 12px;
        background-color: #0062ffff;
        color: #ffffffff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .endereco button:hover {
        background-color: #142c35ff;
    }

    .resultados {
        width: 100%;
        max-width: 1000px;
        margin-top: 30px;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(14, 117, 253, 0.1);
    }

    .cabecalho {
        display: grid;
        grid-template-columns: 1fr 2fr 2fr 2fr 1fr;
        background-color: #0e76ffff;
        padding: 10px;
        font-weight: bold;
        text-align: center;
        border-bottom: 1px solid #4491f0ff;
    }

    .cel_cabecalho {
        padding: 10px;
        font-size: 14px;
    }

    .linha {
        display: grid;
        grid-template-columns: 1fr 2fr 2fr 2fr 1fr;
        border-bottom: 1px solid #298efbff;
        text-align: center;
    }

    .linha:hover {
        background-color: #d3d8dcff;
    }

    .linha .cel_cabecalho {
        padding: 10px;
        font-size: 14px;
    }

    .linha .cel_cabecalho:last-child {
        text-align: center;
    }

    @media (max-width: 768px) {
        .endereco form {
            width: 90%;
        }

        .resultados {
            width: 100%;
        }

        .cabecalho {
            grid-template-columns: 1fr 2fr 2fr 1fr;
        }

        .linha {
            grid-template-columns: 1fr 2fr 2fr 1fr;
        }
    }
</style>

</head>
<body>
    <div class="container">
        <div class="form-box">
            <h2>Reservas</h2>
            <form action="" method="post">
                <label for="id_alunos">Alunos:</label>
                <select name="id_alunos" id="">,

                <label for="nome">Nome</label>
                <input type="text" name="nome" id="">

                <label for="computadores">computadores</label>
                <input type="text" name="computadores" id="">


                <button type="submit">reservar</button>

                    <?php

                    ?>
                </select>
            </form>
        </div>
    </div>
</body>
</html>