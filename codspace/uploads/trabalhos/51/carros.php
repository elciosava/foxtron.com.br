<?php
include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $marca= $_POST['marca'];
    $placa= $_POST['placa'];
    $cor= $_POST['cor'];

    $sql = "INSERT INTO carros (marca, placa, cor)
          VALUES (:marca, :placa, :cor)";

          $stmt = $conexao->prepare($sql);
          $stmt->bindparam('marca', $marca);
          $stmt->bindparam('placa', $placa);
          $stmt->bindParam(':cor', $cor);
        
     if ($stmt->execute()) {
    header("Location: carros.php");
    exit;
  } else {
    echo "Não foi possível cadastrar o usuário.";
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
      box-sizing: border-box;
    }
body {
  background: linear-gradient(135deg, #0bd2ec, #e2e3e4);
  font-family: 'Poppins', Arial, sans-serif;
  height: 100vh;
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}
.form-container {
  background-color: #ffffffcc;
  backdrop-filter: blur(10px);
  border-radius: 12px;
  padding: 40px 30px;
  width: 100%;
  max-width: 420px;
  margin-bottom: 40px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.form-container:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.25);
}
h2 {
  text-align: center;
  color: #211eb6;
  margin-bottom: 25px;
  font-size: 2rem;
  letter-spacing: 1px;
  font-weight: 600;
}
label {
  display: block;
  margin-top: 15px;
  font-weight: 600;
  color: #222;
  font-size: 0.95rem;
}
input {
  width: 100%;
  padding: 12px 14px;
  margin-top: 6px;
  border: 1px solid #b0b3ff;
  border-radius: 6px;
  font-size: 15px;
  outline: none;
  transition: all 0.3s ease;
  background-color: #fafaff;
}
input:hover {
  border-color: #888;
}
input:focus {
  border-color: #211eb6;
  box-shadow: 0 0 8px rgba(33, 30, 182, 0.3);
}
button {
  width: 100%;
  padding: 14px;
  background: linear-gradient(135deg, #211f96, #3d38c0);
  border: none;
  border-radius: 6px;
  color: white;
  font-size: 16px;
  cursor: pointer;
  margin-top: 20px;
  transition: all 0.3s ease;
  font-weight: 500;
  letter-spacing: 0.5px;
}
button:hover {
  background: linear-gradient(135deg, #2724b3, #4a43e0);
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(33, 30, 182, 0.3);
}
button:active {
  background: #56ce31;
  transform: translateY(0);
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.25);
}
table {
  color: #7e3ad8;
  border-collapse: collapse;
  margin-top: 20px;
  font-size: 0.95rem;
}
table th,
table td {
  border-bottom: 1px solid #e0e0e0;
  padding: 10px 15px;
}
table th {
  text-align: left;
  color: #211eb6;
  font-weight: 600;
}
  </style>
    
</head>
<body>
    <form action="" method="post">
        <h2>Carros🚘</h2>
        <label for="marca">Marca</label>
        <input type="text" name="marca" id="">

        <label for="placa">Placa</label>
        <input type="text" name="placa" id="">

        <label for="cor">Cor</label>
        <input type="color" name="cor" id="">


        <button type="submit">Salvar</button>

 <section id="resultado">

    <?php
       $resultado = "SELECT * FROM `carros`";
       $stmt = $conexao ->prepare($resultado);
       $stmt->execute();

      if($stmt->rowCount()>0) {
        echo"<table border='1'>";
        echo "<tr>
        <th>Marca</th>
        <th>Placa</th>
        <th>Cor</th>";
        echo "</tr>";

     while ($carros = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
        echo "<td>{$carros['marca']}</td>";
        echo "<td>{$carros['placa']}</td>";
        echo "<td>{$carros['cor']}</td>";
        echo "</tr>";
                }
                echo"</table>";
            }
    ?>
</section>
    </form>
</body>
</html>