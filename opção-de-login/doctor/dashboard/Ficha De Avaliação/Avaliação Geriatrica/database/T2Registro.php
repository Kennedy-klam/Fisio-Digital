<?php
include("../../../../../../database/dbConect.php");

// Verificando se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Capturando os valores do formulário
    $Consultas_idConsultas = 1; // Valor estático
    $orientacao_temporal = $_POST['tempo'];
    $orientacao_local = $_POST['local'];
    $repita_palavras = $_POST['reptPalav'];
    $calculo = $_POST['calculo'];
    $memorizacao = $_POST['memoria'];
    $linguagem_objetos = $_POST['nomObj'];
    $linguagem_frase = $_POST['reptFase'];
    $linguagem_instrucoes = $_POST['ordem'];
    $linguagem_leitura = $_POST['lerOrdem'];
    $linguagem_escrita = $_POST['escrevFase'];
    $linguagem_copiar = $_POST['copDesenho'];
    $abombrod = $_POST['abombrod'];
    $abombroe = $_POST['abombroe'];
    $flexcotovelod = $_POST['flexcotovelod'];
    $flexcotoveloe = $_POST['flexcotoveloe'];
    $extpunhod = $_POST['extpunhod'];
    $extpunhoe = $_POST['extpunhoe'];
    $flexquadrild = $_POST['flexquadrild'];
    $flexquadrile = $_POST['flexquadrile'];
    $extjoelhod = $_POST['extjoelhod'];
    $extjoelhoe = $_POST['extjoelhoe'];
    $dflextornozelod = $_POST['dflextornozelod'];
    $dflextornozeloe = $_POST['dflextornozeloe'];
    $alimentacao = $_POST['alimentacao'];
    $banho = $_POST['banho'];
    $atividade_diaria = $_POST['atividade'];
    $vestir = $_POST['vestir'];
    $intestino = $_POST['intestino'];
    $sistema_urinario = $_POST['urina'];
    $uso_banheiro = $_POST['banheiro'];
    $transferencia = $_POST['transferencia'];
    $mobilidade = $_POST['deambulacao'];
    $escadas = $_POST['escadas'];

    // Calcular o total de pontos
    /* $resultado_total = $orientacao_temporal + $orientacao_local + $repita_palavras + $calculo +
        $memorizacao + $linguagem_objetos + $linguagem_frase +
        $linguagem_instrucoes + $linguagem_leitura + $linguagem_escrita + $linguagem_copiar; */

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO fichaavaliaçãogeriatrica (
            Consultas_idConsultas, espacial, local, reptPalav, calculo, 
            memoria, nomObj, reptFrase, ordem,
            lerOrdem, escrevFrase, copDesenho,
            abombrod, abombroe, flexcotovelod, flexcotoveloe,
            extpunhod, extpunhoe, flexquadrild, flexquadrile,
            extjoelhod, extjoelhoe, dflextornozelod, dflextornozeloe,
            alimentacao, banho, atividade_diaria, vestir, intestino, sistema_urinario, uso_banheiro, transferencia, mobilidade, escadas

        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "isssssssssssssssssssssssiiiiiiiiii",
        $Consultas_idConsultas,
        $orientacao_temporal,
        $orientacao_local,
        $repita_palavras,
        $calculo,
        $memorizacao,
        $linguagem_objetos,
        $linguagem_frase,
        $linguagem_instrucoes,
        $linguagem_leitura,
        $linguagem_escrita,
        $linguagem_copiar,
        $abombrod, 
        $abombroe, 
        $flexcotovelod, 
        $flexcotoveloe,
        $extpunhod, 
        $extpunhoe, 
        $flexquadrild, 
        $flexquadrile,
        $extjoelhod, 
        $extjoelhoe, 
        $dflextornozelod, 
        $dflextornozeloe,
        $alimentacao, 
        $banho, 
        $atividade_diaria, 
        $vestir, 
        $intestino, 
        $sistema_urinario, 
        $uso_banheiro, 
        $transferencia, 
        $mobilidade, 
        $escadas

    );

    if ($stmt->execute()) {
        echo "Dados salvos com sucesso!";
    } else {
        echo "Erro ao salvar os dados: " . $stmt->error;
    }

    // Fechar a conexão
    $stmt->close();
}
$conn->close();
