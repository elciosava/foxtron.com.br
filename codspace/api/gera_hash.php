<?php
    $senha = "123456"; // senha simples para teste
    $hash = password_hash($senha, PASSWORD_DEFAULT);

    echo $hash;
?>