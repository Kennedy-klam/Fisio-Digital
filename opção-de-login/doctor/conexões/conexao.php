<?php 

$host = "localhost";
$bancodedados = "fisio digital 2.0"; // Sem aspas
$usuario = "root";
$senha = "";

$mysqli = new mysqli($host, $usuario, $senha, $bancodedados);

if ($mysqli->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $mysqli->connect_error);
}

?>
