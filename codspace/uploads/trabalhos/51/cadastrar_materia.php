<?php
include 'conexao.php';

$sql = "SELECT * FROM professores";
$stmt = $conexao->prepare($sql);
$stmt->execute();

if($_SERVER['REQUEST_METHOD']== 'POST'){
    $materia = $_POST['materia'];
    $id_professor = $_POST['id_professor'];

    $sql = "INSERT INTO materias (materia, id_professores)
      VALUES (:materia, :id_professor)";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':materia', $materia);
        $stmt->bindParam(':id_professor', $id_professor);
      
         if($stmt->execute()){
         header("Location: cadastrar_materia.php");
         exit;
        }else{
        $mensagem = "Não deu boa...";
        echo $mensagem;
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro de Matérias</title>
<style>
body {
  font-family: 'Segoe UI', sans-serif;
  background:linear-gradient(135deg, #9adcf7, #2980b9);
  margin: 0;
  padding: 0;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

.container {
  width: 100%;
  max-width: 600px;
  background: #fff;
  padding: 40px;
  border-radius: 12px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.2);
}

h1 {
  text-align: center;
  color: #42a6c2;
  margin-bottom: 30px;
}

form {
  display: flex;
  flex-direction: column;

}

label {
  font-weight: bold;
  margin-top: 20px;
}

input, select, button {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  border: 1px solid #b2bec3;
  border-radius: 6px;
  font-size: 16px;
}

button {
  background-color: #0984e3;
  color: white;
  border: none;
  margin-top: 25px;
  cursor: pointer;
  font-weight: bold;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #74b9ff;
}
</style>
</head>
<body>
     
    <form action="" method="POST">
        <label for="materia"> Cadastrar Matéria📕📗</label>
        <input type="text" name="materia" id="">

        <select name="id_professor" id="">

 <?php

        while($professor = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo "<option value='{$professor['id']}'>{$professor['nome']}</option>";
        }

        ?>
     </select>
       <button type="submit">Salvar</button>
</body>
</html>
