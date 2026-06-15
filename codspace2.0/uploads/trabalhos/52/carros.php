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


$id_cliente = $_GET['id_cliente'] ??null;

$sql_busca = "SELECT * FROM clientes WHERE id_cliente = :id_cliente";

                $stmt_busca = $conexao->prepare($sql_busca);
                $stmt_busca->bindParam(':id_cliente',$id_cliente);
                $stmt_busca->execute();
                $cliente = $stmt_busca->fetch(PDO::FETCH_ASSOC);
                $nome_cliente = $cliente['nome_cliente'];

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
        <h2>Alugar carro para o(a)<?php  ?></h2>

</header>
<div class="container">
    <form action="gravar_carro.php" method="post">
        <input type="hidden" name="id_cliente" value="<?php echo $id_cliente ?>">
        <label for="cliente">Cliente</label>
        <input type="text" name="cliente" value="<?php echo $nome_cliente ?>"disabled>



        <label for="marca_carro">Marca</label>
        <select name="marca_carro" id="">
            <option value="Fiat">Fiat</option>
            <option value="Volkswagen">Volkswagen</option>
            <option value="Mitsubishi">Mitsubishi</option>
            <option value="BYD">BYD</option>
            <option value="Honda">Honda</option>
        </select>
        <label for="modelo_carro">Modelo</label>
        <select name="modelo_carro" id="">
            <option value="Mobi">Mobi</option>
            <option value="Golf">Golf</option>
            <option value="Lancer">Lancer</option>
            <option value="Dolphin">Dolphin</option>
            <option value="Civic">Civic</option>
        </select>
        <button type="submit">Salvar Aluguel</button>

    </form>
</div>
    
</body>
</html>