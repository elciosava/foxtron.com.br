<?php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <section id="formulario">
        <form action="gravar_taferfa.php" method="post">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="">

                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="40" rows="5"></textarea>

                <label for="data_inicio">Data Inicio</label>
                <input type="date" name="data_inicio" id="">

                <label for="data_final">Data Final</label>
                <input type="date" name="data_final" id="">

                <button type="submit">Salvar</button>

        </form>
    </section>
</body>
</html>