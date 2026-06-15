<?php
$local = 'localhost';
$banco = 'farias';
$usuario = 'root';
$senha = '';

try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch (PDOException $erro){
    echo "não rolou!". $erro->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h2>INNER JOIN</h2>
    </header>
    <div class="container">
        <table>
            <thead>
                <th>Id</th>
                <th>Cliente</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Opções</th>
            </thead>
            <?php
                $sql_busca = "SELECT 
                cliente.nome_cliente,
                carro.id_carro,
                carro.modelo_carro, 
                carro.marca_carro
                FROM clientes AS cliente
                INNER JOIN carros AS carro
                ON cliente.id_cliente = carro.id_cliente";

                $stmt_busca = $conexao->prepare($sql_busca);
                $stmt_busca->execute();

                while ($aluguel = $stmt_busca->fetch(PDO::FETCH_ASSOC)){
                    echo "<tbody>";
                    echo"<tr>";
                    echo "<td>{$aluguel['id_carro']}</td>";
                    echo "<td>{$aluguel['nome_cliente']}</td>";
                    echo "<td>{$aluguel['marca_carro']}</td>";
                    echo "<td>{$aluguel['modelo_carro']}</td>";
                    echo "<td>
                    <form action='excluir_aluguel.php' method='get'>
                    <input type='hidden' name='id_carro' value='{$aluguel['id_carro']}'>
                    <button type ='submit'>Excluir</button>
                    </form>";
                    

                    echo "</tr>";

                    echo "</tbody>";

                }

                ?>
        </table>
    </div>
    
</body>
</html>