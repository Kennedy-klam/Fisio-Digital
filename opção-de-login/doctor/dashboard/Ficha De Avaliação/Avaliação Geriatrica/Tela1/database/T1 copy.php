<?php

// Conexão com o banco de dados
include("../../../../../../../database/dbConect.php");

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
