<?php
// Conexão com o banco de dados (substitua os valores de host, nome de usuário e senha)
$host = "localhost";
$db_name = "fisio digital"; 
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $treino = $_POST["treino"];
  $series = $_POST["series"];
  $repeticoes = $_POST["repeticoes"];
  $interv = $_POST["interv"];
  $message = $_POST["message"];

  // Insira os dados na tabela de treinos
  $query = "INSERT INTO cadastro (treino, series, repeticoes, interv, message) VALUES (:treino, :series, :repeticoes, :interv, :message)";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':treino', $treino);
  $stmt->bindParam(':series', $series);
  $stmt->bindParam(':repeticoes', $repeticoes);
  $stmt->bindParam(':interv', $interv);
  $stmt->bindParam(':message', $message);

  if ($stmt->execute()) {
    // Redirecione para a página de resumo ou para onde desejar
    header("Location: resumo_treino.html");
  } else {
    echo "Erro ao cadastrar o treino. Tente novamente.";
  }
}
