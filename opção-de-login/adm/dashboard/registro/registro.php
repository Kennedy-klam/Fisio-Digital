<?php

// include("../../../../database/dbConect.php");

$host = 'localhost';
$user = 'root';
$pass = '';
$banco = 'fisio digital 2.0';

$conn = new mysqli($host, $user, $pass, $banco);

if ($conn->connect_error){
    die("Conexão falhou: " . $conn->connect_error);
}

// Pegando os dados do formulário via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['name'];
    $data_nascimento = $_POST['dob'];
    $naturalidade = $_POST['naturalidade'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $cor_pele = $_POST['cor'];
    $estado_civil = $_POST['estadoCivil'];
    $sexo = $_POST['sexo'];
    $altura = $_POST['altura'];
    $filipai = $_POST['pai'];
    $filimae = $_POST['mae'];
    $profissao = $_POST['profissao'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $celular = $_POST['celular'];
    $telefone_fixo = $_POST['fixo'];
    $recado = $_POST['recado'];
    $data_admissao = $_POST['data-admissao'];
    $data_saida = $_POST['data-saida'];
    $desistencia = $_POST['desistencia'];
    $saida = $_POST['saida'];

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO paciente (cpf, nome, nascimento, naturalidade, rg, cor, estaCivil, sexo, altura, filiPai, filiMae, profissao, endereço, cidade, estado, celular, telefone, recado, dataAdmi, dataSaida, desistencia, motivSaida)
        VALUES ('$cpf', '$nome', '$data_nascimento', '$naturalidade', '$rg', '$cor_pele', '$estado_civil', '$sexo', '$altura', '$filipai', '$filimae', '$profissao', '$endereco', '$cidade', '$estado', '$celular', '$telefone_fixo', '$recado', '$data_admissao', '$data_saida', '$desistencia', '$saida')";

    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>