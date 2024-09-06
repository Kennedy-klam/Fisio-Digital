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

        $sql_code = "SELECT * FROM logind WHERE doctorname ='$usuario' AND doctorpassword = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            $login = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $login['doctorid'];
            $_SESSION['nome'] = $login['doctorname'];
            $_SESSION['senha'] = $login['doctorpassword'];

            header("Location: dashboard/dashboard.php");

        } else{
            echo "Falha ao logar! Usuário ou senha incorretos.";
        }  
    }
}

?>