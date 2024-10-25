<?php 
session_start();
include('conexões/conexao.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST); // Exibir dados enviados para depuração

    // Validação dos campos usuario e senha
    if (empty(trim($_POST['usuario']))) {
        echo "Preencha seu usuário";
    } else if (empty(trim($_POST['senha']))) {
        echo "Preencha sua senha";
    } else {
        $usuario = $mysqli->real_escape_string(trim($_POST['usuario'])); // Ajustado para 'usuario'
        $senha = trim($_POST['senha']); // Remover espaços da senha

        $sql_code = "SELECT * FROM administrador WHERE nome = '$usuario'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        if ($sql_query->num_rows > 0) {
            $login = $sql_query->fetch_assoc();
            var_dump($login); // Exibir resultado para depuração

            if ($senha === $login['senha']) { 
                $_SESSION['id'] = $login['idAdministrador'];
                $_SESSION['nome'] = $login['nome'];
                
                header("Location: dashboard/dashboard.php");
                exit();
            } else {
                echo "Falha ao logar! Usuário ou senha incorretos.";
            }
        } else {
            echo "Falha ao logar! Usuário ou senha incorretos.";
        }  
    }
}
?>