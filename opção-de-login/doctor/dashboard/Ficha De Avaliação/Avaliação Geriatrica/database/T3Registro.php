<?php
include ('../../../../../../database/dbConect.php') //incluindo a conexão no Banco

//verificando se o formulário foi submetido 
if($_SERVER['REQUEST_METHOD']==='POST'){
    //pegando os valores de dentro do HTML
    $pa0 = $_POST['PA-0'];
    $pa03 = $_POST['PA-03'];
    $pa06 = $_POST['PA-06'];
    $fc0 = $_POST['FC-0'];
    $fc03 = $_POST['FC-03'];
    $fc06 = $_POST['FC-06'];
    $diagnostico = $_POST['diagnostico'];
    $objetivo = $_POST['objetivo'];
    //OBS: AINDA FALTAM ALGUNS CAMPOS!!!

    //aqui inseri os valores no banco de dados
    $sql = "INSERT INTO fichaavaliaçãogeriatrica (PA_0, PA_03, PA_06, FC_0, FC_03, FC_06, diagnostico, objetivo)
            VALUES ('$pa0', '$pa03', '$pa06', '$fc0', '$fc03', '$fc06', '$diagnostico', '$objetivo')";

    if ($conn -> query($sql) === true){
        echo "Dados salvos com sucesso"
    }else{
        echo "erro:" .sql . "<br>" .$conn->error;
    }

    $conn->close();
}
?>