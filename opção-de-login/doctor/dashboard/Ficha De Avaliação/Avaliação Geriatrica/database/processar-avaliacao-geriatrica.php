<?php
session_start(); // Inicia a sessão
// Conexão com o banco de dados
include("../../../../../../database/dbConect.php");

// Acessar os IDs armazenados na sessão
$idPaciente = $_SESSION['idPaciente'] ?? null;
$idConsulta = $_SESSION['idConsulta'] ?? null;

// Verifica se os IDs estão presentes na sessão
if (!$idPaciente || !$idConsulta) {
    echo "Erro: ID do paciente ou da consulta não está disponível na sessão!";
    die();
}

// Verificando se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturando os valores do formulário
    $escolaridade = $_POST['escolaridade'] ?? null;
    $renda = $_POST['renda'] ?? null;
    $profissao = $_POST['profissao'] ?? null;
    $local_residencia = $_POST['local-residencia'] ?? null;
    $mora_com = $_POST['mora-com'] ?? null;
    $atividade_fisica = $_POST['atividade'] ?? null;
    $quantos_dias = $_POST['quantos-dias'] ?? null;
    $frequencia_sair = $_POST['frequencia'] ?? null;
    $atividade_social = $_POST['atividade-social'] ?? null;
    $doencas = $_POST['doencas'] ?? null;
    $outras_doencas = $_POST['outras-doencas'] ?? null;
    $queixa_principal = $_POST['queixa-principal'] ?? null;
    $visao = $_POST['visao'] ?? null;
    $audicao = $_POST['audicao'] ?? null;
    $continencia_urinaria = $_POST['continencia-urinaria'] ?? null;
    $data_urinaria = $_POST['data'] ?? null;
    $continencia_fecal = $_POST['continencia-fecal'] ?? null;
    $data_fecal = $_POST['data-fecal'] ?? null;
    $sono = $_POST['sono'] ?? null;
    $ortese = $_POST['ortese'] ?? null;
    $proteste = $_POST['proteste'] ?? null;
    $queda = $_POST['queda'] ?? null;
    $queda_quantas = $_POST['queda-quantas'] ?? null;
    $fuma = $_POST['Fuma'] ?? null;
    $tempo_fumar = $_POST['tempo-fumar'] ?? null;
    $etilista = $_POST['etilista'] ?? null;
    $tempo_etilista = $_POST['tempo-etilista'] ?? null;
    // tela 2
    $orientacao_temporal = $_POST['tempo'] ?? null;
    $orientacao_local = $_POST['local'] ?? null;
    $repita_palavras = $_POST['reptPalav'] ?? null;
    $calculo = $_POST['calculo'] ?? null;
    $memorizacao = $_POST['memoria'] ?? null;
    $linguagem_objetos = $_POST['nomObj'] ?? null;
    $linguagem_frase = $_POST['reptFase'] ?? null;
    $linguagem_instrucoes = $_POST['ordem'] ?? null;
    $linguagem_leitura = $_POST['lerOrdem'] ?? null;
    $linguagem_escrita = $_POST['escrevFase'] ?? null;
    $linguagem_copiar = $_POST['copDesenho'] ?? null;
    $abombrod = $_POST['abombrod'] ?? null;
    $abombroe = $_POST['abombroe'] ?? null;
    $flexcotovelod = $_POST['flexcotovelod'] ?? null;
    $flexcotoveloe = $_POST['flexcotoveloe'] ?? null;
    $extpunhod = $_POST['extpunhod'] ?? null;
    $extpunhoe = $_POST['extpunhoe'] ?? null;
    $flexquadrild = $_POST['flexquadrild'] ?? null;
    $flexquadrile = $_POST['flexquadrile'] ?? null;
    $extjoelhod = $_POST['extjoelhod'] ?? null;
    $extjoelhoe = $_POST['extjoelhoe'] ?? null;
    $dflextornozelod = $_POST['dflextornozelod'] ?? null;
    $dflextornozeloe = $_POST['dflextornozeloe'] ?? null;
    $alimentacao = $_POST['alimentacao'] ?? null;
    $banho = $_POST['banho'] ?? null;
    $atividade_diaria = $_POST['atividadeb'] ?? null;
    $vestir = $_POST['vestir'] ?? null;
    $intestino = $_POST['intestino'] ?? null;
    $sistema_urinario = $_POST['urina'] ?? null;
    $uso_banheiro = $_POST['banheiro'] ?? null;
    $transferencia = $_POST['transferencia'] ?? null;
    $mobilidade = $_POST['deambulacao'] ?? null;
    $escadas = $_POST['escadas'] ?? null;
    // tela 3
    $tugt = $_POST['tugt'] ?? null;
    $nota_sentar = $_POST['nota-sentar'] ?? null;
    $nota_levantar = $_POST['nota-levantar'] ?? null;
    $diag_fisio = $_POST['diag-fisio'] ?? null;
    $objetivo = $_POST['objetivo'] ?? null;
    $pa_0 = $_POST['PA-0'] ?? null;
    $pa_3 = $_POST['PA-3'] ?? null;
    $pa_6 = $_POST['PA-6'] ?? null;
    $fc_0 = $_POST['FC-0'] ?? null;
    $fc_3 = $_POST['FC-3'] ?? null;
    $fc_6 = $_POST['FC-6'] ?? null;
    $sat_0 = $_POST['Sat-0'] ?? null;
    $sat_3 = $_POST['Sat-3'] ?? null;
    $sat_6 = $_POST['Sat-6'] ?? null;
    $fr_0 = $_POST['Fr-0'] ?? null;
    $fr_3 = $_POST['Fr-3'] ?? null;
    $fr_6 = $_POST['Fr-6'] ?? null;
    $borg_0 = $_POST['Borg-0'] ?? null;
    $borg_3 = $_POST['Borg-3'] ?? null;
    $borg_6 = $_POST['Borg-6'] ?? null;
    $distancia_percorrida = $_POST['distanciaPercorrida'] ?? null;
    $distancia_prevista = $_POST['distanciaPrevista'] ?? null;

    // Iniciar uma transação para garantir consistência
    $conn->begin_transaction();

    // Prepara a query SQL para inserir os dados
    try {
        // Inserir na tabela fichaavaliaçãogeriatrica
        $sql1 = "INSERT INTO fichaavaliaçãogeriatrica (
            consultas_idConsultas, consultas_paciente_idPaciente, Escolaridade, Renda, profissao, Residencia, moraCom, AtividadeFisica,
            quantos_dias, FrequenciaSaida, AtivSocial, Doenças, outras_doencas, 
            QueixaPrincipal, visao, audicao, contUrin,
            dataUrin, contFecal, dataFecal, sono, ortese, protese,
            queda, quedaQuantas, fuma, tempoFuma, etilista, tempoEtilista, espacial, local, reptPalav, calculo, 
            memoria, nomObj, reptFrase, ordem,
            lerOrdem, escrevFrase, copDesenho,
            abombrod, abombroe, flexcotovelod, flexcotoveloe,
            extpunhod, extpunhoe, flexquadrild, flexquadrile,
            extjoelhod, extjoelhoe, dflextornozelod, dflextornozeloe,
            alimentacao, banho, atividade_diaria, vestir, intestino, sistema_urinario, uso_banheiro, transferencia, mobilidade, escadas,
            tugt,
            nota_sentar, 
            nota_levantar, 
            diag_fisio, 
            objetivo
        ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
        )";

        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param(
        "iissssssssssssssssssssssssssssssssssssssssssssssssssiiiiiiiiiisiiss",
        $idConsulta,
        $idPaciente,
        $escolaridade,
        $renda,
        $profissao,
        $local_residencia,
        $mora_com,
        $atividade_fisica,
        $quantos_dias,
        $frequencia_sair,
        $atividade_social,
        $doencas,
        $outras_doencas,
        $queixa_principal,
        $visao,
        $audicao,
        $continencia_urinaria,
        $data_urinaria,
        $continencia_fecal,
        $data_fecal,
        $sono,
        $ortese,
        $proteste,
        $queda,
        $queda_quantas,
        $fuma,
        $tempo_fumar,
        $etilista,
        $tempo_etilista,
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
        $escadas,
        $tugt, 
        $nota_sentar, 
        $nota_levantar, 
        $diag_fisio, 
        $objetivo
        );

        if (!$stmt1->execute()) {
            throw new Exception("Erro ao inserir em fichaavaliaçãogeriatrica: " . $stmt1->error);
        }

        // captura o id da ficha de avaliação criada
        $idFichaAvaliaçãoGeriatrica = $conn->insert_id;

        // Inserir na tabela TesteCaminhada
        $sql2 = "INSERT INTO TesteCaminhada (
            idFichaAvaliaçãoGeriatrica,
            pa0, pa3, pa6,
            fc0, fc3, fc6,
            sat0, sat3, sat6,
            fr0, fr3, fr6,
            borg0, borg3, borg6,
            dist_percorrida, dist_prevista
        ) VALUES (
            ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
        )";

        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param(
            "iiiiiiiiiiiiiiiidd",
            $idFichaAvaliaçãoGeriatrica,
            $pa_0,
            $pa_3,
            $pa_6,
            $fc_0,
            $fc_3,
            $fc_6,
            $sat_0,
            $sat_3,
            $sat_6,
            $fr_0,
            $fr_3,
            $fr_6,
            $borg_0,
            $borg_3,
            $borg_6,
            $distancia_percorrida,
            $distancia_prevista
        );

        if (!$stmt2->execute()) {
            throw new Exception("Erro ao inserir em TesteCaminhada: " . $stmt2->error);
        }

        // Confirmar a transação
        $conn->commit();
        echo "<script>
        alert('Formulário salvo com sucesso!');
        setTimeout(function() {
            window.location.href = '../../../consultas-marcadas/appointment.php';
        }, 1000);
    </script>";
        exit;
    } catch (Exception $e) {
        // Reverter a transação em caso de erro
        $conn->rollback();
        echo "Erro: " . $e->getMessage();
    } finally {
        // Fechar as conexões
        $stmt1->close();
        $stmt2->close();
        $conn->close();
    }
}