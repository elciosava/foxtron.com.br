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
    <style>
        table{
            width: 500px;
            border-collapse: collapse;
        }
        td,th{
            border: 1px solid black;
            padding: 2px;
            text-align: left;
            
        }
        tr:hover{
            background: blue;
            cursor: pointer;
        }

        
    </style>
</head>
<body>
    <header>

    </header>
        <div class="container">
            <form action="gravar_cliente.php" method="post">
                <label for="nome_cliente">Nome</label>
                <input type="text" name="nome_cliente" id="">

                <label for="email_cliente">Email</label>
                <input type="email" name="email_cliente" id="">

                <button type="submit">Salvar Cliente</button>

                
            </form>
            <div class="clientes">
                <table>
                    <thead>
                        <th>Id</th>
                        <th>Cliente</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </thead>
                    
                    
                <?php
                $sql_busca = "SELECT * FROM clientes";

                $stmt_busca = $conexao->prepare($sql_busca);
                $stmt_busca->execute();

                while ($clientes = $stmt_busca->fetch(PDO::FETCH_ASSOC)){
                    echo "<tbody>";
                    echo"<tr>";
                    echo "<td>{$clientes['id_cliente']}</td>";
                    echo "<td>{$clientes['nome_cliente']}</td>";
                    echo "<td>{$clientes['email_cliente']}</td>";
                    echo "<td>
                    <form action='carros.php' method='get'>
                    <input type='hidden' name='id_cliente' value='{$clientes['id_cliente']}'>
                    <button type ='submit'>Alugar</button>
                    </form>";
                    

                    echo "</tr>";

                    echo "</tbody>";

                }

                ?>
                </tbody>
                </table>
            </div>
        </div>    
</body>
</html>