<?php
    include 'conexao.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $data_nascimento = $_POST['data_nascimento'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        $sql = "INSERT INTO clientes (nome, sobrenome, data_nascimento, email, telefone)
                VALUES (:nome, :sobrenome, :data_nascimento, :email, :telefone)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':data_nascimento', $data_nascimento);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->execute();

        echo "Deu boa gurizada!";
    }else{
        echo "Num deu coisa.";
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
         <form action="" method="post">
         <label for="nome">Nome</label>
         <input type="text" name="nome" id="">

         <label for="sobrenome">Sobrenome</label>
         <input type="text" name="sobrenome" id="">

         <label for="data_nascimento">Data_nascimento</label>
         <input type="date" name="data_nascimento" id="">

         <label for="email">Email</label>
         <input type="email" id="" name="email">

         <label for="telefone">Telefone</label>
         <input type="tel" id="" name="telefone">

         <button type="submit">Salvar</button>
    </form>
    <section id="resultado">
        <?php
            $resultado = "SELECT * FROM `clientes`";
            $stmt = $conexao->prepare($resultado);
            $stmt->execute();

            //cabecalho da nossa tabela
            if($stmt->rowCount()>0){
              echo "<table>";
                 echo "<tr>
                         <th>Nome</th>
                         <th>Sobrenome</th>
                         <th>Data_nascimento</th>
                         <th>Email</th>
                         <th>Telefone</th>
                      <tr>";
              echo "</table>";

              while ($clientes = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<tr>";
                echo "<td>{$clientes['nome']}</td>";
                echo "<td>{$clientes['sobrenome']}</td>";
                echo "<td>{$clientes['data_nascimento']}</td>";
                echo "<td>{$clientes['email']}</td>";
                echo "<td>{$clientes['telefone']}</td>";
                echo "<tr>";
              }

              echo "<table>";
            }
        ?>
    </section>
</body>
</html>