<?php
    include 'conexao.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome = $_POST['nome'];
        $dia = $_POST['dia'];
        $horario = $_POST['horario'];

        $sql = "INSERT INTO agendamento (nome, dia, horario) 
                VALUES (:nome, :dia, :horario)";
        $stmt=$conexao->prepare($sql);
        $stmt->bindParam(':nome',$nome);
        $stmt->bindParam(':dia',$dia);
        $stmt->bindParam(':horario',$horario);
        $stmt->execute();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elcio gulosão</title>
    <style>
        body {
            display:flex;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }
        form{
            width: 300px;
        }
        input,
        select {
            width: 100%;
            padding: 5px;
            font-size: 0.7rem;
            box-sizing: border-box;
        }

        .cabecalho {
            display: flex;
            padding: 5px 10px;
            border: 1px solid black;
            width: 750px;
        }
        .cel_cabecalho {
            width: 150px;
        }
        .linha {
            display: flex;
            padding: 5px 10px;            
            width: 750px;            
            border: 1px solid black;
        }
        .resultado {
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="">
        <label for="dia">Dia</label>
        <select name="dia" id="">
            <option value="segunda">segunda</option>
            <option value="terça">terça</option>
            <option value="quarta">quarta</option>
            <option value="quinta">quinta</option>
            <option value="sexta">sexta</option>
        </select>
        <label for="horario">horario</label>
        <input type="time" name="horario" id="">

        <button type="submit">Salvar</button>
    </form>
    <section class="resultados">
        <div class="resultado">
            <?php
            include "conexao.php";

            $sql = "SELECT * FROM agendamento";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // Cabeçalho da tabela
                echo "<div class='cabecalho'>";
                echo "<div class='cel_cabecalho'>ID</div>";
                echo "<div class='cel_cabecalho'>Nome</div>";
                echo "<div class='cel_cabecalho'>Dia</div>";
                echo "<div class='cel_cabecalho'>Horario</div>";
                echo "<div class='cel_cabecalho'>Ações</div>";
                echo "</div>";

                // Linhas dos produtos
                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='linha'>"; // Usei 'linha' pra não confundir com 'cabecalho'
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['dia']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['horario']}</div>";

                    // Ações (Editar + Deletar)
                    echo "<div class='cel_cabecalho'>";

                    // Formulário Editar
                    echo "<form action='editar_produto.php' method='get' style='display:inline;'>";
                    echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                    echo "<button type='submit'>Editar</button>";
                    echo "</form> ";

                    // Formulário Deletar
                    echo "<form action='deletar_produto.php' method='post' style='display:inline;' onsubmit=\"return confirm('Deseja realmente deletar este produto?');\">";
                    echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                    echo "<button type='submit'>Deletar</button>";
                    echo "</form>";

                    echo "</div>"; // fecha celula ações
            
                    echo "</div>"; // fecha linha
                }
            } else {
                echo "<p>Não há registros.</p>";
            }
            ?>
        </div>

    </section>
</body>
</html>