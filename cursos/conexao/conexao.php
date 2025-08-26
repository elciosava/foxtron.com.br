<?php
    $host = 'localhost';
    $db = 'portfolio';
    $user = 'root';
    $pass = 's4va6o841A@'; // No XAMPP o padrão é senha em branco

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    } catch (PDOException $e) {
        die("Erro ao conectar ao banco: " . $e->getMessage());
    }
?>