

<?php
// Conexão com o banco de dados (mesmo código de conexão usado em treino.php)
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

// Consulta para obter os dados cadastrados
$query = "SELECT treino, series, repeticoes, interv, message FROM cadastro";
$stmt = $conn->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Exibir os dados em HTML
foreach ($results as $result) {
  echo "<div class='treinores'>";
  echo "<p><strong>Treino:</strong> " . $result['treino'] . "</p>";
  echo "<p><strong>Séries:</strong> " . $result['series'] . "</p>";
  echo "<p><strong>Repetições:</strong> " . $result['repeticoes'] . "</p>";
  echo "<p><strong>Intervalo:</strong> " . $result['interv'] . "</p>";
  echo "<p><strong>Mensagem:</strong> " . $result['message'] . "</p>";
  echo "<hr>";
  echo "</div>";
}
?>



