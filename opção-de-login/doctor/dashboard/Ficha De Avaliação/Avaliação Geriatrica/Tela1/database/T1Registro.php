<?php

/* include("../../../../database/dbConect.php");

$host = 'localhost';
$user = 'root';
$pass = '';
$banco = 'fisio-digital-v2.0';

$conn = new mysqli($host, $user, $pass, $banco);

if ($conn->connect_error){
    die("Conexão falhou: " . $conn->connect_error);
}

// Pegando os dados do formulário via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $escolaridade = $_POST['escolaridade'];
    $renda = $_POST['renda'];
    $profissao = $_POST['profissao'];
    $localResi = $_POST['local-residencia'];
    $moraCom = $_POST['mora-com'];
    $cor_pele = $_POST['atividade'];
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

<?php*/


// Conexão com o banco de dados
$host = 'localhost';
$user = 'root';
$pass = '';
$banco = 'fisio-digital-v2.0';

// Criando a conexão
$conn = new mysqli($host, $user, $pass, $banco);

// Verifica se a conexão foi bem sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificando se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturando os valores do formulário
    $escolaridade = $_POST['escolaridade'];
    $renda = $_POST['renda'];
    $profissao = $_POST['profissao'];
    $local_residencia = $_POST['local-residencia'];
    $mora_com = $_POST['mora-com'];
    $atividade_fisica = $_POST['atividade'];
    $quantos_dias = $_POST['quantos-dias'];
    $frequencia_sair = $_POST['frequencia'];
    $atividade_social = $_POST['atividade-social'];
    $doencas = $_POST['doencas'];
    $outras_doencas = $_POST['outras-doencas'];
    $queixa_principal = $_POST['queixa-principal'];

    /*$medicamentos = $_POST['medicamentos'];
    $como_usa = $_POST['como-usa'];
    $tempo_uso = $_POST['tempo-uso'];*/
    
    $visao = $_POST['visao'];
    $audicao = $_POST['audicao'];
    $continencia_urinaria = $_POST['continencia-urinaria'];
    $data_urinaria = $_POST['data'];
    $continencia_fecal = $_POST['continencia-fecal'];
    $data_fecal = $_POST['data-fecal'];
    $sono = $_POST['sono'];
    $texto_disturbios = $_POST['texto-disturbios'];
    $ortese = $_POST['ortese'];
    $proteste = $_POST['proteste'];
    $queda = $_POST['queda'];
    $queda_quantas = $_POST['queda-quantas'];
    $fuma = $_POST['Fuma'];
    $tempo_fumar = $_POST['tempo-fumar'];
    $etilista = $_POST['etilista'];
    $tempo_etilista = $_POST['tempo-etilista'];

    // Prepara a query SQL para inserir ou atualizar os dados
    $sql = "INSERT INTO FichaAvaliaçãoGeriatrica (
                Escolaridade, Renda, profissao, Residencia, moraCom, AtividadeFisica,
                quantos_dias, FrequenciaSaida, AtivSocial, Doenças, outras_doencas, 
                QueixaPrincipal, /*medicamentos, como_usa, tempo_uso,*/ visao, audicao, contUrin,
                dataUrin, contFecal, dataFecal, sono, /*texto_disturbios,*/ ortese, protese,
                queda, quedaQuantas, fuma, tempoFuma, etilista, tempoEtilista
            ) VALUES (
                ?, ?, ?, ?, ?, ?, ?, ?, /*?, ?, ?,*/ ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
            )";
    
    // Preparando a consulta
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssssssssssssssssssssss", 
        $escolaridade, $renda, $profissao, $local_residencia, $mora_com, $atividade_fisica, 
        $quantos_dias, $frequencia_sair, $atividade_social, $doencas, $outras_doencas, 
        $queixa_principal, /* $medicamentos, $como_usa, $tempo_uso, */ $visao, $audicao, 
        $continencia_urinaria, $data_urinaria, $continencia_fecal, $data_fecal, 
        $sono, $texto_disturbios, $ortese, $proteste, $queda, $queda_quantas, 
        $fuma, $tempo_fumar, $etilista, $tempo_etilista
    );

    // Executando a consulta
    if ($stmt->execute()) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir os dados: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
