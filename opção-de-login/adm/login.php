<?php 
session_start();

include('conexões/conexao.php');

if(isset($_POST['usuario']) || isset($_POST['senha'])) {

    if(strlen($_POST['usuario']) == 0){
        echo "Preencha seu usuário";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $usuario = $mysqli->real_escape_string($_POST['usuario']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM loginadm WHERE admnome ='$usuario' AND senhaadm = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            $login = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $login['admid'];
            $_SESSION['nome'] = $login['usuario'];
            $_SESSION['senha'] = $login['senha'];

            header("Location: dashboard/dashboard.php");

        } else{
            echo "Falha ao logar! Usuário ou senha incorretos.";
        }  
    }
}

?>