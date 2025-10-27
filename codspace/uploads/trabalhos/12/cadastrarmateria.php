<?php
    $sql = "SELECT * FROM `professores`";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
?>
