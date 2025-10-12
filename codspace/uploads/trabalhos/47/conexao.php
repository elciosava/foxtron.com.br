<link rel="stylesheet" href="estilo2.css">
<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'saimon';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("conexão falhou: " . $conn->connect_error);
}
    else{
        echo"conexão on-line";
    }
?>