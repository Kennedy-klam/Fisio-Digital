<?php 
session_start();

include('conexões/conexao.php');

if(isset($_POST['clientname']) || isset($_POST['clientpassword'])) {

    if(strlen($_POST['clientname']) == 0){
        echo "Preencha seu usuário";
    } else if(strlen($_POST['clientpassword']) == 0) {
        echo "Preencha sua senha";
    } else {

        $usuario = $mysqli->real_escape_string($_POST['clientname']);
        $senha = $mysqli->real_escape_string($_POST['clientpassword']);

        $sql_code = "SELECT * FROM loginc WHERE clientname ='$usuario' AND clientpassword = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            $login = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $login['clientid'];
            $_SESSION['nome'] = $login['clientname'];
            $_SESSION['senha'] = $login['clientpassword'];

            header("Location: dashboard/dashboard.php");

        } else{
            echo "Falha ao logar! Usuário ou senha incorretos.";
        }  
    }
}

?>