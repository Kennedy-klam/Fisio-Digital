<?php

// Conexão com o banco de dados
include("../../../../../../database/dbConect.php");

// Verificando se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturando os valores do formulário
    $Consultas_idConsultas = 1; // Valor estático
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
    $visao = $_POST['visao'];
    $audicao = $_POST['audicao'];
    $continencia_urinaria = $_POST['continencia-urinaria'];
    $data_urinaria = $_POST['data'];
    $continencia_fecal = $_POST['continencia-fecal'];
    $data_fecal = $_POST['data-fecal'];
    $sono = $_POST['sono'];
    $ortese = $_POST['ortese'];
    $proteste = $_POST['proteste'];
    $queda = $_POST['queda'];
    $queda_quantas = $_POST['queda-quantas'];
    $fuma = $_POST['Fuma'];
    $tempo_fumar = $_POST['tempo-fumar'];
    $etilista = $_POST['etilista'];
    $tempo_etilista = $_POST['tempo-etilista'];
    // tela 2
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
    $atividade_diaria = $_POST['atividadeb'];
    $vestir = $_POST['vestir'];
    $intestino = $_POST['intestino'];
    $sistema_urinario = $_POST['urina'];
    $uso_banheiro = $_POST['banheiro'];
    $transferencia = $_POST['transferencia'];
    $mobilidade = $_POST['deambulacao'];
    $escadas = $_POST['escadas'];
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
            Consultas_idConsultas, Escolaridade, Renda, profissao, Residencia, moraCom, AtividadeFisica,
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
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
        )";

        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param(
        "issssssssssssssssssssssssssssssssssssssssssssssssssiiiiiiiiiisiiss",
        $Consultas_idConsultas,
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
        echo "Dados inseridos com sucesso!";
        //header("Location: sucesso.html");
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