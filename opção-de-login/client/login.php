<?php 
session_start();
include('conexões/conexao.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST); // Exibir dados enviados para depuração

    if (empty(trim($_POST['clientname']))) {
        echo "Preencha seu usuário";
    } else if (empty(trim($_POST['clientpassword']))) {
        echo "Preencha sua senha";
    } else {
        $usuario = $mysqli->real_escape_string(trim($_POST['clientname']));
        $senha = trim($_POST['clientpassword']); // Remover espaços da senha

        $sql_code = "SELECT * FROM paciente WHERE nome ='$usuario'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        if ($sql_query->num_rows > 0) {
            $login = $sql_query->fetch_assoc();
            var_dump($login); // Para verificar o que está sendo retornado

            // Comparação direta da senha
            if ($senha === $login['senha']) { 
                $_SESSION['id'] = $login['idPaciente'];
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