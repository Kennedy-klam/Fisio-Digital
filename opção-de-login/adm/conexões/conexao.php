<?php 

$host = "localhost";
$bancodedados = "fisio digital";
$usuario = "root";
$senha = "";


$mysqli = new mysqli($host, $usuario, $senha, $bancodedados);
if ($mysqli->connect_error) {
    die ("Falha ao conectar ao banco de dados: " . $mysqli->error);
}
?>