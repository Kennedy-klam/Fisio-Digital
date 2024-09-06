<?php
// Conexão com o banco de dados (substitua os valores de host, nome de usuário e senha)
$host = "localhost";
$db_name = "fisio digital";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clientname = $_POST["nome"];
    $clientemail = $_POST["email"];
    $clientpassword = $_POST["senha"];
    $senha_confirmacao = $_POST["confsenha"];

    if (empty($clientname) || empty($clientemail) || empty($clientpassword) || empty($senha_confirmacao)) {
        echo "Por favor, preencha todos os campos.";
    } elseif ($clientpassword !== $senha_confirmacao) {
        echo "As senhas não coincidem. Tente novamente.";
    } else {
        // Verifique se o usuário já existe no banco de dados
        $query = "SELECT clientemail FROM loginc WHERE clientemail = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $clientemail);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Já existe um usuário com este e-mail. Tente outro e-mail.";
        } else {
            // Insira o novo usuário no banco de dados
            $query = "INSERT INTO loginc (clientname, clientemail, clientpassword) VALUES (:usuario, :email, :senha)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':usuario', $clientname);
            $stmt->bindParam(':email', $clientemail);
            $stmt->bindParam(':senha', $clientpassword);

            if ($stmt->execute()) {
                echo "Cadastro realizado com sucesso!";
                header("location: dashboard.php"); // Redireciona usuário para a página de dashboard
            } else {
                echo "Erro ao cadastrar o usuário. Tente novamente.";
            }
        }
    }
}

// Feche a conexão com o banco de dados
$conn = null;
?>