<?php
   include 'conexao.php';

 
   $sql = "SELECT * FROM `professores`";
   $stmt = $conexao->prepare($sql);
   $stmt->execute();

   if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $materia = $_POST['materia'];
    $id_professor = $_POST['id_professor'];

    $sql = "INSERT INTO materias (materia, id_professor)
            VALUES (:materia, :id_professor)";
    
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':materia', $materia);
    $stmt->bindParam(':id_professor', $id_professor);

    if ($stmt->execute()){
        header("Location:cadastrar_materia.php");
        exit;    
    }else{
        
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Matéria</title>
    <style>

        body { font-family: Arial, sans-serif; background: #f2f2f2; padding: 30px; }
        form { margin-bottom: 20px; background: #fff; padding: 20px; border-radius: 8px; width: 300px; }
        table { border-collapse: collapse; width: 50%; background: #fff; border-radius: 8px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: #eee; }
        input[type="text"] { width: 100%; padding: 8px; }
        button { padding: 8px 12px; margin-top: 8px; background: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #0056b3; }

   </style>
</head>
<body>
    <section class="inicio">
        <div class="container">
           <form action="gravar_materia.php" method="post">
                <label for="nome">Nome da Matéria</label>
                <input type="text" name="nome" id="nome">
                <select name="nome_materia" id="">
                    <?php 
                        while ($prof = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$prof['id']}'>{$prof['nome']}</option>";
                        }
                    ?>
                </select>

                <button type="submit">Salvar</button>
           </form>
        </div>
    </section>
</body>
</html>
