<?php 
$host = 'localhost';
$user = 'root';
$pass = '';
$banco = 'fisio-digital-v2.0';

$conn = new mysqli($host, $user, $pass, $banco);

if ($conn->connect_error){
    die("Conexão falhou: " . $conn->connect_error);
}
?>