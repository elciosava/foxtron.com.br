<?php
    include "conexao.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome = $_POST['nome'];
        $dia = $_POST['dia'];
        $horario = $_POST['horario'];

        $sql = "INSERT INTO cirurgias (nome, dia, horario)
              VALUES (:nome, :dia, :horario)";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam('nome' ,$nome);
        $stmt->bindParam('dia' ,$dia);
        $stmt->bindParam('horario' ,$horario);

    if ($stmt->execute()){
        header("location:agendar_cirurgia.php");
        exit;
    }else{
        echo "<p>deu certo</p>";
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
    margin: 0;
    padding: 0;

}

.resultado {
    margin: 2%;
}

.formulario {
    width: 800px;
  }

body {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 100vh;
}

form {
    width: 300px;
}

input, select {
    width: 100%;
    padding: 5px;
    font-size: 0.7rem;
    box-sizing: border-box;
}

.cabecalho {
    display: flex;
    padding: 0 20px;
    border:1px solid black;
    width: 1000px;
}

.cel_cabecalho {
    width: 250px;
}

.linha {
    display: flex;
    border: solid 1px black;
    padding: 5px 10px;
}

    </style>
</head>
<body>
     <header>
        <h2>Cirurgia</h2>
    </header>

   <div class="container">
     <section>
        <form action="" method="post">
    <label for="nome">Nome</label>
       <input type="text" name="nome" id="">

    <label for="dia">Dia</label>
       <select name="dia" id="">
      <option value="segunda">Segunda</option>
      <option value="terca">Terça</option>
      <option value="quarta">Quarta</option>
      <option value="quinta">Quinta</option>
      <option value="sexta">Sexta</option>
      <option value="sabado">Sabado</option>
       </select>

    <label for="horario">Horario</label>
      <input type="datetime" name="horario" id=""> 

    <button type="submit">Salva</button>  
        </form>
     </section>
</div>
   
   <div class="resultado"> 
     <section class="reultado">
<?php
    include "conexao_php";

    $sql = "SELECT * FROM cirurgias";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount()>0){
    echo "<div class='linha'>";    
        echo "<div class='cel_cabecalho'>ID</div>";
        echo "<div class='cel_cabecalho'>Nome</div>";
        echo "<div class='cel_cabecalho'>Dia</div>";
        echo "<div class='cel_cabecalho'>Horario</div>"; 
    echo "</div>";

    while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<div class='linha'>";
        echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
        echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
        echo "<div class='cel_cabecalho'>{$linha['dia']}</div>";
        echo "<div class='cel_cabecalho'>{$linha['horario']}</div>";
        echo "</div>";
      }
    } else {
        echo "<p>Não há registros.</p>";
    }
    
?>
<div class="Agendar Cirurgia">
            <a href="inicio.php">Voltar</a>
        </div>
     </section>
   </div>
</body>
</html>