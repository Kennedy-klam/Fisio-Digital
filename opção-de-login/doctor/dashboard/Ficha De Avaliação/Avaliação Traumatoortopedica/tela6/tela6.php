<?php
session_start();
include('../../../../conexões/conexao.php');

// Captura o ID da ficha na sessão
if (isset($_SESSION['idFichaTraumatoOrtopedica'])) {
    $idFichaTraumatoOrtopedica = $_SESSION['idFichaTraumatoOrtopedica'];
} else {
    die("ID da ficha não encontrado.");
}

if (isset($_POST['submit'])) {
    $apley_6_positivo = $_POST['apley_6_positivo'];
    $apley_6_negativo = $_POST['apley_6_negativo'];
    $apley_6_esquerdo = $_POST['apley_6_esquerdo'];
    $apley_6_direito = $_POST['apley_6_direito'];

    $estresse_varo_valgo_positivo = $_POST['estresse_varo_valgo_positivo'];
    $estresse_varo_valgo_negativo = $_POST['estresse_varo_valgo_negativo'];
    $estresse_varo_valgo_esquerdo = $_POST['estresse_varo_valgo_esquerdo'];
    $estresse_varo_valgo_direito = $_POST['estresse_varo_valgo_direito'];

    $gaveta_anterior_positivo = $_POST['gaveta_anterior_positivo'];
    $gaveta_anterior_negativo = $_POST['gaveta_anterior_negativo'];
    $gaveta_anterior_esquerdo = $_POST['gaveta_anterior_esquerdo'];
    $gaveta_anterior_direito = $_POST['gaveta_anterior_direito'];

    $gaveta_posterior_positivo = $_POST['gaveta_posterior_positivo'];
    $gaveta_posterior_negativo = $_POST['gaveta_posterior_negativo'];
    $gaveta_posterior_esquerdo = $_POST['gaveta_posterior_esquerdo'];
    $gaveta_posterior_direito = $_POST['gaveta_posterior_direito'];

    $lachmann_positivo = $_POST['lachmann_positivo'];
    $lachmann_negativo = $_POST['lachmann_negativo'];
    $lachmann_esquerdo = $_POST['lachmann_esquerdo'];
    $lachmann_direito = $_POST['lachmann_direito'];

    $pivot_positivo = $_POST['pivot_positivo'];
    $pivot_negativo = $_POST['pivot_negativo'];
    $pivot_esquerdo = $_POST['pivot_esquerdo'];
    $pivot_direito = $_POST['pivot_direito'];

    $mcMurray_positivo = $_POST['mcMurray_positivo'];
    $mcMurray_negativo = $_POST['mcMurray_negativo'];
    $mcMurray_esquerdo = $_POST['mcMurray_esquerdo'];
    $mcMurray_direito = $_POST['mcMurray_direito'];

    $apreensao_6_positivo = $_POST['apreensao_6_positivo'];
    $apreensao_6_negativo = $_POST['apreensao_6_negativo'];
    $apreensao_6_esquerdo = $_POST['apreensao_6_esquerdo'];
    $apreensao_6_direito = $_POST['apreensao_6_direito'];

    $clarke_positivo = $_POST['clarke_positivo'];
    $clarke_negativo = $_POST['clarke_negativo'];
    $clarke_esquerdo = $_POST['clarke_esquerdo'];
    $clarke_direito = $_POST['clarke_direito'];

    $tecla_positivo = $_POST['tecla_positivo'];
    $tecla_negativo = $_POST['tecla_negativo'];
    $tecla_esquerdo = $_POST['tecla_esquerdo'];
    $tecla_direito = $_POST['tecla_direito'];

    $estabilidade_positivo = $_POST['estabilidade_positivo'];
    $estabilidade_negativo = $_POST['estabilidade_negativo'];
    $estabilidade_esquerdo = $_POST['estabilidade_esquerdo'];
    $estabilidade_direito = $_POST['estabilidade_direito'];

    $gaveta_anterior_posterior_positivo = $_POST['gaveta_anterior_posterior_positivo'];
    $gaveta_anterior_posterior_negativo = $_POST['gaveta_anterior_posterior_negativo'];
    $gaveta_anterior_posterior_esquerdo = $_POST['gaveta_anterior_posterior_esquerdo'];
    $gaveta_anterior_posterior_direito = $_POST['gaveta_anterior_posterior_direito'];

    $thompson_positivo = $_POST['thompson_positivo'];
    $thompson_negativo = $_POST['thompson_negativo'];
    $thompson_esquerdo = $_POST['thompson_esquerdo'];
    $thompson_direito = $_POST['thompson_direito'];

    $homan_positivo = $_POST['homan_positivo'];
    $homan_negativo = $_POST['homan_negativo'];
    $homan_esquerdo = $_POST['homan_esquerdo'];
    $homan_direito = $_POST['homan_direito'];

    $spurling_positivo = $_POST['spurling_positivo'];
    $spurling_negativo = $_POST['spurling_negativo'];
    $spurling_esquerdo = $_POST['spurling_esquerdo'];
    $spurling_direito = $_POST['spurling_direito'];

    $adson_positivo = $_POST['adson_positivo'];
    $adson_negativo = $_POST['adson_negativo'];
    $adson_esquerdo = $_POST['adson_esquerdo'];
    $adson_direito = $_POST['adson_direito'];

    $slump_positivo = $_POST['slump_positivo'];
    $slump_negativo = $_POST['slump_negativo'];
    $slump_esquerdo = $_POST['slump_esquerdo'];
    $slump_direito = $_POST['slump_direito'];

    $lasegue_positivo = $_POST['lasegue_positivo'];
    $lasegue_negativo = $_POST['lasegue_negativo'];
    $lasegue_esquerdo = $_POST['lasegue_esquerdo'];
    $lasegue_direito = $_POST['lasegue_direito'];

    $elevacao_perna_positivo = $_POST['elevacao_perna_positivo'];
    $elevacao_perna_negativo = $_POST['elevacao_perna_negativo'];
    $elevacao_perna_esquerdo = $_POST['elevacao_perna_esquerdo'];
    $elevacao_perna_direito = $_POST['elevacao_perna_direito'];

    $hoover_positivo = $_POST['hoover_positivo'];
    $hoover_negativo = $_POST['hoover_negativo'];
    $hoover_esquerdo = $_POST['hoover_esquerdo'];
    $hoover_direito = $_POST['hoover_direito'];

    $milgran_positivo = $_POST['milgran_positivo'];
    $milgran_negativo = $_POST['milgran_negativo'];
    $milgran_esquerdo = $_POST['milgran_esquerdo'];
    $milgran_direito = $_POST['milgran_direito'];

    $valsava_positivo = $_POST['valsava_positivo'];
    $valsava_negativo = $_POST['valsava_negativo'];
    $valsava_esquerdo = $_POST['valsava_esquerdo'];
    $valsava_direito = $_POST['valsava_direito'];

    $mao_atras_da_cabeça = $_POST['mao_atras_da_cabeça'];
    $mao_no_angulo_inferior_da_escapula_contralateral = $_POST['mao_no_angulo_inferior_da_escapula_contralateral'];
    $mao_no_ombro_contralateral = $_POST['mao_no_ombro_contralateral'];
    $outros_superior = $_POST['outros_superior'];

    $agachamento = $_POST['agachamento'];
    $subir_descer_escadas = $_POST['subir_descer_escadas'];
    $step_down_test = $_POST['step_down_test'];
    $correr_reto_a_frente = $_POST['correr_reto_a_frente'];
    $correr_desacelerar = $_POST['correr_desacelerar'];
    $correr_fazer_voltas = $_POST['correr_fazer_voltas'];

    $pular_em_uma_perna = $_POST['pular_em_uma_perna'];
    $saltar = $_POST['saltar'];
    $outros_inferior = $_POST['outros_inferior'];

    $exames_complementares = $_POST['exames_complementares'];
    $observacao = $_POST['observacao'];
    $diagnostico_fisioterapeutico = $_POST['diagnostico_fisioterapeutico'];
    $objetivos = $_POST['objetivos'];
    $condutas = $_POST['condutas'];

    // Verifica se já existe uma ficha com o ID informado
    $query_check = "SELECT * FROM fichatraumatoortopédica6 WHERE idFichaTraumatoOrtopédica = ?";
    $stmt_check = $mysqli->prepare($query_check);
    if ($stmt_check === false) {
        die('Erro ao preparar a consulta de verificação: ' . $mysqli->error);
    }
    $stmt_check->bind_param('i', $idFichaTraumatoOrtopedica);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        // Query de atualização
        $query_update = "UPDATE fichatraumatoortopédica6 SET 
            apley_6_positivo = ?, 
            apley_6_negativo = ?, 
            apley_6_esquerdo = ?, 
            apley_6_direito = ?, 
            estresse_varo_valgo_positivo = ?, 
            estresse_varo_valgo_negativo = ?, 
            estresse_varo_valgo_esquerdo = ?, 
            estresse_varo_valgo_direito = ?, 
            gaveta_anterior_positivo = ?, 
            gaveta_anterior_negativo = ?, 
            gaveta_anterior_esquerdo = ?, 
            gaveta_anterior_direito = ?, 
            gaveta_posterior_positivo = ?, 
            gaveta_posterior_negativo = ?, 
            gaveta_posterior_esquerdo = ?, 
            gaveta_posterior_direito = ?, 
            lachmann_positivo = ?, 
            lachmann_negativo = ?, 
            lachmann_esquerdo = ?, 
            lachmann_direito = ?, 
            pivot_positivo = ?, 
            pivot_negativo = ?, 
            pivot_esquerdo = ?, 
            pivot_direito = ?, 
            mcMurray_positivo = ?, 
            mcMurray_negativo = ?, 
            mcMurray_esquerdo = ?, 
            mcMurray_direito = ?, 
            apreensao_6_positivo = ?, 
            apreensao_6_negativo = ?, 
            apreensao_6_esquerdo = ?, 
            apreensao_6_direito = ?, 
            clarke_positivo = ?, 
            clarke_negativo = ?, 
            clarke_esquerdo = ?, 
            clarke_direito = ?, 
            tecla_positivo = ?, 
            tecla_negativo = ?, 
            tecla_esquerdo = ?, 
            tecla_direito = ?, 
            estabilidade_positivo = ?, 
            estabilidade_negativo = ?, 
            estabilidade_esquerdo = ?, 
            estabilidade_direito = ?, 
            gaveta_anterior_posterior_positivo = ?, 
            gaveta_anterior_posterior_negativo = ?, 
            gaveta_anterior_posterior_esquerdo = ?, 
            gaveta_anterior_posterior_direito = ?, 
            thompson_positivo = ?, 
            thompson_negativo = ?, 
            thompson_esquerdo = ?, 
            thompson_direito = ?, 
            homan_positivo = ?, 
            homan_negativo = ?, 
            homan_esquerdo = ?, 
            homan_direito = ?, 
            spurling_positivo = ?, 
            spurling_negativo = ?, 
            spurling_esquerdo = ?, 
            spurling_direito = ?, 
            adson_positivo = ?, 
            adson_negativo = ?, 
            adson_esquerdo = ?, 
            adson_direito = ?, 
            slump_positivo = ?, 
            slump_negativo = ?, 
            slump_esquerdo = ?, 
            slump_direito = ?, 
            lasegue_positivo = ?, 
            lasegue_negativo = ?, 
            lasegue_esquerdo = ?, 
            lasegue_direito = ?, 
            elevacao_perna_positivo = ?, 
            elevacao_perna_negativo = ?, 
            elevacao_perna_esquerdo = ?, 
            elevacao_perna_direito = ?, 
            hoover_positivo = ?, 
            hoover_negativo = ?, 
            hoover_esquerdo = ?, 
            hoover_direito = ?, 
            milgran_positivo = ?, 
            milgran_negativo = ?, 
            milgran_esquerdo = ?, 
            milgran_direito = ?, 
            valsava_positivo = ?, 
            valsava_negativo = ?, 
            valsava_esquerdo = ?, 
            valsava_direito = ?, 
            mao_atras_da_cabeça = ?, 
            mao_no_angulo_inferior_da_escapula_contralateral = ?, 
            mao_no_ombro_contralateral = ?, 
            outros_superior = ?, 
            agachamento = ?, 
            subir_descer_escadas = ?, 
            step_down_test = ?, 
            correr_reto_a_frente = ?, 
            correr_desacelerar = ?, 
            correr_fazer_voltas = ?, 
            pular_em_uma_perna = ?, 
            saltar = ?, 
            outros_inferior = ?, 
            exames_complementares = ?, 
            observacao = ?, 
            diagnostico_fisioterapeutico = ?, 
            objetivos = ?, 
            condutas = ? 
        WHERE idFichaTraumatoOrtopédica = ?";

        $stmt_update = $mysqli->prepare($query_update);
        if ($stmt_update === false) {
            die('Erro ao preparar a consulta de atualização: ' . $mysqli->error);
        }

        $stmt_update->bind_param(
            "iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiissssssssssssssssssi",
            $apley_6_positivo,
            $apley_6_negativo,
            $apley_6_esquerdo,
            $apley_6_direito,
            $estresse_varo_valgo_positivo,
            $estresse_varo_valgo_negativo,
            $estresse_varo_valgo_esquerdo,
            $estresse_varo_valgo_direito,
            $gaveta_anterior_positivo,
            $gaveta_anterior_negativo,
            $gaveta_anterior_esquerdo,
            $gaveta_anterior_direito,
            $gaveta_posterior_positivo,
            $gaveta_posterior_negativo,
            $gaveta_posterior_esquerdo,
            $gaveta_posterior_direito,
            $lachmann_positivo,
            $lachmann_negativo,
            $lachmann_esquerdo,
            $lachmann_direito,
            $pivot_positivo,
            $pivot_negativo,
            $pivot_esquerdo,
            $pivot_direito,
            $mcMurray_positivo,
            $mcMurray_negativo,
            $mcMurray_esquerdo,
            $mcMurray_direito,
            $apreensao_6_positivo,
            $apreensao_6_negativo,
            $apreensao_6_esquerdo,
            $apreensao_6_direito,
            $clarke_positivo,
            $clarke_negativo,
            $clarke_esquerdo,
            $clarke_direito,
            $tecla_positivo,
            $tecla_negativo,
            $tecla_esquerdo,
            $tecla_direito,
            $estabilidade_positivo,
            $estabilidade_negativo,
            $estabilidade_esquerdo,
            $estabilidade_direito,
            $gaveta_anterior_posterior_positivo,
            $gaveta_anterior_posterior_negativo,
            $gaveta_anterior_posterior_esquerdo,
            $gaveta_anterior_posterior_direito,
            $thompson_positivo,
            $thompson_negativo,
            $thompson_esquerdo,
            $thompson_direito,
            $homan_positivo,
            $homan_negativo,
            $homan_esquerdo,
            $homan_direito,
            $spurling_positivo,
            $spurling_negativo,
            $spurling_esquerdo,
            $spurling_direito,
            $adson_positivo,
            $adson_negativo,
            $adson_esquerdo,
            $adson_direito,
            $slump_positivo,
            $slump_negativo,
            $slump_esquerdo,
            $slump_direito,
            $lasegue_positivo,
            $lasegue_negativo,
            $lasegue_esquerdo,
            $lasegue_direito,
            $elevacao_perna_positivo,
            $elevacao_perna_negativo,
            $elevacao_perna_esquerdo,
            $elevacao_perna_direito,
            $hoover_positivo,
            $hoover_negativo,
            $hoover_esquerdo,
            $hoover_direito,
            $milgran_positivo,
            $milgran_negativo,
            $milgran_esquerdo,
            $milgran_direito,
            $valsava_positivo,
            $valsava_negativo,
            $valsava_esquerdo,
            $valsava_direito,
            $mao_atras_da_cabeça,
            $mao_no_angulo_inferior_da_escapula_contralateral,
            $mao_no_ombro_contralateral,
            $outros_superior,
            $agachamento,
            $subir_descer_escadas,
            $step_down_test,
            $correr_reto_a_frente,
            $correr_desacelerar,
            $correr_fazer_voltas,
            $pular_em_uma_perna,
            $saltar,
            $outros_inferior,
            $exames_complementares,
            $observacao,
            $diagnostico_fisioterapeutico,
            $objetivos,
            $condutas,
            $idFichaTraumatoOrtopedica  // Não se esqueça de passar o ID
        );

        if ($stmt_update->execute()) {
            echo "<script>
                alert('Formulário salvo com sucesso!');
                window.location.href = '../../../consultas-marcadas/appointment.php'; // Redireciona imediatamente
            </script>";
        } else {
            echo "Erro ao inserir os dados: " . $stmt_update->error;
        }
        $stmt_update->close();
    } else {
        $query_insert = "INSERT INTO fichatraumatoortopédica6 (
            idFichaTraumatoOrtopédica,
            apley_6_positivo, 
            apley_6_negativo, 
            apley_6_esquerdo, 
            apley_6_direito, 
            estresse_varo_valgo_positivo, 
            estresse_varo_valgo_negativo, 
            estresse_varo_valgo_esquerdo, 
            estresse_varo_valgo_direito, 
            gaveta_anterior_positivo, 
            gaveta_anterior_negativo, 
            gaveta_anterior_esquerdo, 
            gaveta_anterior_direito, 
            gaveta_posterior_positivo, 
            gaveta_posterior_negativo, 
            gaveta_posterior_esquerdo, 
            gaveta_posterior_direito, 
            lachmann_positivo, 
            lachmann_negativo, 
            lachmann_esquerdo, 
            lachmann_direito, 
            pivot_positivo, 
            pivot_negativo, 
            pivot_esquerdo, 
            pivot_direito, 
            mcMurray_positivo, 
            mcMurray_negativo, 
            mcMurray_esquerdo, 
            mcMurray_direito, 
            apreensao_6_positivo, 
            apreensao_6_negativo, 
            apreensao_6_esquerdo, 
            apreensao_6_direito, 
            clarke_positivo, 
            clarke_negativo, 
            clarke_esquerdo, 
            clarke_direito, 
            tecla_positivo, 
            tecla_negativo, 
            tecla_esquerdo, 
            tecla_direito, 
            estabilidade_positivo, 
            estabilidade_negativo, 
            estabilidade_esquerdo, 
            estabilidade_direito, 
            gaveta_anterior_posterior_positivo, 
            gaveta_anterior_posterior_negativo, 
            gaveta_anterior_posterior_esquerdo, 
            gaveta_anterior_posterior_direito, 
            thompson_positivo, 
            thompson_negativo, 
            thompson_esquerdo, 
            thompson_direito, 
            homan_positivo, 
            homan_negativo, 
            homan_esquerdo, 
            homan_direito, 
            spurling_positivo, 
            spurling_negativo, 
            spurling_esquerdo, 
            spurling_direito, 
            adson_positivo, 
            adson_negativo, 
            adson_esquerdo, 
            adson_direito, 
            slump_positivo, 
            slump_negativo, 
            slump_esquerdo, 
            slump_direito, 
            lasegue_positivo, 
            lasegue_negativo, 
            lasegue_esquerdo, 
            lasegue_direito, 
            elevacao_perna_positivo, 
            elevacao_perna_negativo, 
            elevacao_perna_esquerdo, 
            elevacao_perna_direito, 
            hoover_positivo, 
            hoover_negativo, 
            hoover_esquerdo, 
            hoover_direito, 
            milgran_positivo, 
            milgran_negativo, 
            milgran_esquerdo, 
            milgran_direito, 
            valsava_positivo, 
            valsava_negativo, 
            valsava_esquerdo, 
            valsava_direito, 
            mao_atras_da_cabeça, 
            mao_no_angulo_inferior_da_escapula_contralateral, 
            mao_no_ombro_contralateral, 
            outros_superior, 
            agachamento, 
            subir_descer_escadas, 
            step_down_test, 
            correr_reto_a_frente, 
            correr_desacelerar, 
            correr_fazer_voltas, 
            pular_em_uma_perna, 
            saltar, 
            outros_inferior, 
            exames_complementares, 
            observacao, 
            diagnostico_fisioterapeutico, 
            objetivos, 
            condutas) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt_insert = $mysqli->prepare($query_insert);
        if ($stmt_insert === false) {
            die('Erro ao preparar a consulta de inserção: ' . $mysqli->error);
        }

        $stmt_insert->bind_param(
            'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiissssssssssssssssss',
            $idFichaTraumatoOrtopedica,
            $apley_6_positivo,
            $apley_6_negativo,
            $apley_6_esquerdo,
            $apley_6_direito,
            $estresse_varo_valgo_positivo,
            $estresse_varo_valgo_negativo,
            $estresse_varo_valgo_esquerdo,
            $estresse_varo_valgo_direito,
            $gaveta_anterior_positivo,
            $gaveta_anterior_negativo,
            $gaveta_anterior_esquerdo,
            $gaveta_anterior_direito,
            $gaveta_posterior_positivo,
            $gaveta_posterior_negativo,
            $gaveta_posterior_esquerdo,
            $gaveta_posterior_direito,
            $lachmann_positivo,
            $lachmann_negativo,
            $lachmann_esquerdo,
            $lachmann_direito,
            $pivot_positivo,
            $pivot_negativo,
            $pivot_esquerdo,
            $pivot_direito,
            $mcMurray_positivo,
            $mcMurray_negativo,
            $mcMurray_esquerdo,
            $mcMurray_direito,
            $apreensao_6_positivo,
            $apreensao_6_negativo,
            $apreensao_6_esquerdo,
            $apreensao_6_direito,
            $clarke_positivo,
            $clarke_negativo,
            $clarke_esquerdo,
            $clarke_direito,
            $tecla_positivo,
            $tecla_negativo,
            $tecla_esquerdo,
            $tecla_direito,
            $estabilidade_positivo,
            $estabilidade_negativo,
            $estabilidade_esquerdo,
            $estabilidade_direito,
            $gaveta_anterior_posterior_positivo,
            $gaveta_anterior_posterior_negativo,
            $gaveta_anterior_posterior_esquerdo,
            $gaveta_anterior_posterior_direito,
            $thompson_positivo,
            $thompson_negativo,
            $thompson_esquerdo,
            $thompson_direito,
            $homan_positivo,
            $homan_negativo,
            $homan_esquerdo,
            $homan_direito,
            $spurling_positivo,
            $spurling_negativo,
            $spurling_esquerdo,
            $spurling_direito,
            $adson_positivo,
            $adson_negativo,
            $adson_esquerdo,
            $adson_direito,
            $slump_positivo,
            $slump_negativo,
            $slump_esquerdo,
            $slump_direito,
            $lasegue_positivo,
            $lasegue_negativo,
            $lasegue_esquerdo,
            $lasegue_direito,
            $elevacao_perna_positivo,
            $elevacao_perna_negativo,
            $elevacao_perna_esquerdo,
            $elevacao_perna_direito,
            $hoover_positivo,
            $hoover_negativo,
            $hoover_esquerdo,
            $hoover_direito,
            $milgran_positivo,
            $milgran_negativo,
            $milgran_esquerdo,
            $milgran_direito,
            $valsava_positivo,
            $valsava_negativo,
            $valsava_esquerdo,
            $valsava_direito,
            $mao_atras_da_cabeça,
            $mao_no_angulo_inferior_da_escapula_contralateral,
            $mao_no_ombro_contralateral,
            $outros_superior,
            $agachamento,
            $subir_descer_escadas,
            $step_down_test,
            $correr_reto_a_frente,
            $correr_desacelerar,
            $correr_fazer_voltas,
            $pular_em_uma_perna,
            $saltar,
            $outros_inferior,
            $exames_complementares,
            $observacao,
            $diagnostico_fisioterapeutico,
            $objetivos,
            $condutas
        );

        if ($stmt_insert->execute()) {
            echo "<script>
                alert('Formulário salvo com sucesso!');
                window.location.href = '../../../consultas-marcadas/appointment.php'; // Redireciona imediatamente
            </script>";
        } else {
            echo "Erro ao inserir os dados: " . $stmt_insert->error;
        }
        $stmt_insert->close();
    }
    $stmt_check->close();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>tela6</title>
</head>

<body>
    <form action="" method="post" onsubmit="return confirmarEnvio()">
        <div class="container">
            <h2 class="tabelas">Joelho</h2>
            <table>
                <tr>
                    <th>Nome do teste</th>
                    <th>Positivo</th>
                    <th>Negativo</th>
                    <th>Esquerdo</th>
                    <th>direito</th>
                </tr>
                <tr>
                    <td><strong>Apley</strong></td>
                    <td><input type="text" class="textoTabela" name="apley_6_positivo"></td>
                    <td><input type="text" class="textoTabela" name="apley_6_negativo"></td>
                    <td><input type="text" class="textoTabela" name="apley_6_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="apley_6_direito"></td>
                </tr>
                <tr>
                    <td><strong>Estresse em varo e valgo</strong></td>
                    <td><input type="text" class="textoTabela" name="estresse_varo_valgo_positivo"></td>
                    <td><input type="text" class="textoTabela" name="estresse_varo_valgo_negativo"></td>
                    <td><input type="text" class="textoTabela" name="estresse_varo_valgo_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="estresse_varo_valgo_direito"></td>
                </tr>
                <tr>
                    <td><strong>Gaveta anterior</strong></td>
                    <td><input type="text" class="textoTabela" name="gaveta_anterior_positivo"></td>
                    <td><input type="text" class="textoTabela" name="gaveta_anterior_negativo"></td>
                    <td><input type="text" class="textoTabela" name="gaveta_anterior_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="gaveta_anterior_direito"></td>
                </tr>
                <tr>
                    <td><strong>gaveta posterior</strong></td>
                    <td><input type="text" class="textoTabela" name="gaveta_posterior_positivo"></td>
                    <td><input type="text" class="textoTabela" name="gaveta_posterior_negativo"></td>
                    <td><input type="text" class="textoTabela" name="gaveta_posterior_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="gaveta_posterior_direito"></td>
                </tr>
                <tr>
                    <td><strong>Lachmann</strong></td>
                    <td><input type="text" class="textoTabela" name="lachmann_positivo"></td>
                    <td><input type="text" class="textoTabela" name="lachmann_negativo"></td>
                    <td><input type="text" class="textoTabela" name="lachmann_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="lachmann_direito"></td>
                </tr>
                <tr>
                    <td><strong>Pivot shift</strong></td>
                    <td><input type="text" class="textoTabela" name="pivot_positivo"></td>
                    <td><input type="text" class="textoTabela" name="pivot_negativo"></td>
                    <td><input type="text" class="textoTabela" name="pivot_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="pivot_direito"></td>
                </tr>
                <tr>
                    <td><strong>McMurray</strong></td>
                    <td><input type="text" class="textoTabela" name="mcMurray_positivo"></td>
                    <td><input type="text" class="textoTabela" name="mcMurray_negativo"></td>
                    <td><input type="text" class="textoTabela" name="mcMurray_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="mcMurray_direito"></td>
                </tr>
                <tr>
                    <td><strong>Apreensão</strong></td>
                    <td><input type="text" class="textoTabela" name="apreensao_6_positivo"></td>
                    <td><input type="text" class="textoTabela" name="apreensao_6_negativo"></td>
                    <td><input type="text" class="textoTabela" name="apreensao_6_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="apreensao_6_direito"></td>
                </tr>
                <tr>
                    <td><strong>Sinal de Clarke</strong></td>
                    <td><input type="text" class="textoTabela" name="clarke_positivo"></td>
                    <td><input type="text" class="textoTabela" name="clarke_negativo"></td>
                    <td><input type="text" class="textoTabela" name="clarke_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="clarke_direito"></td>
                </tr>
                <tr>
                    <td><strong>Tecla</strong></td>
                    <td><input type="text" class="textoTabela" name="tecla_positivo"></td>
                    <td><input type="text" class="textoTabela" name="tecla_negativo"></td>
                    <td><input type="text" class="textoTabela" name="tecla_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="tecla_direito"></td>
                </tr>
            </table>

            <h2 class="tabelas">Tornozelo e pé</h2>
            <table>
                <tr>
                    <th>Nome do teste</th>
                    <th>Positivo</th>
                    <th>Negativo</th>
                    <th>Esquerdo</th>
                    <th>Direito</th>
                </tr>
                <tr>
                    <td><strong>Estabilidade lateral e medial</strong></td>
                    <td><input type="text" class="textoTabela" name="estabilidade_positivo"></td>
                    <td><input type="text" class="textoTabela" name="estabilidade_negativo"></td>
                    <td><input type="text" class="textoTabela" name="estabilidade_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="estabilidade_direito"></td>
                </tr>
                <tr>
                    <td><strong>Gaveta anterior e posterior</strong></td>
                    <td><input type="text" class="textoTabela" name="gaveta_anterior_posterior_positivo"></td>
                    <td><input type="text" class="textoTabela" name="gaveta_anterior_posterior_negativo"></td>
                    <td><input type="text" class="textoTabela" name="gaveta_anterior_posterior_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="gaveta_anterior_posterior_direito"></td>
                </tr>
                <tr>
                    <td><strong>Thompson</strong></td>
                    <td><input type="text" class="textoTabela" name="thompson_positivo"></td>
                    <td><input type="text" class="textoTabela" name="thompson_negativo"></td>
                    <td><input type="text" class="textoTabela" name="thompson_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="thompson_direito"></td>
                </tr>
                <tr>
                    <td><strong>Homan</strong></td>
                    <td><input type="text" class="textoTabela" name="homan_positivo"></td>
                    <td><input type="text" class="textoTabela" name="homan_negativo"></td>
                    <td><input type="text" class="textoTabela" name="homan_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="homan_direito"></td>
                </tr>
            </table>

            <h2 class="tabelas">Coluna cervical</h2>
            <table>
                <tr>
                    <th>Nome do teste</th>
                    <th>Positivo</th>
                    <th>Negativo</th>
                    <th>Esquerdo</th>
                    <th>Direito</th>
                </tr>
                <tr>
                    <td><strong>Spurling(Compressão foraminal)</strong></td>
                    <td><input type="text" class="textoTabela" name="spurling_positivo"></td>
                    <td><input type="text" class="textoTabela" name="spurling_negativo"></td>
                    <td><input type="text" class="textoTabela" name="spurling_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="spurling_direito"></td>
                </tr>
                <tr>
                    <td><strong>tração</strong></td>
                    <td><input type="text" class="textoTabela" name="tracao_positivo"></td>
                    <td><input type="text" class="textoTabela" name="tracao_negativo"></td>
                    <td><input type="text" class="textoTabela" name="tracao_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="tracao_direito"></td>
                </tr>
                <tr>
                    <td><strong>Adson</strong></td>
                    <td><input type="text" class="textoTabela" name="adson_positivo"></td>
                    <td><input type="text" class="textoTabela" name="adson_negativo"></td>
                    <td><input type="text" class="textoTabela" name="adson_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="adson_direito"></td>
                </tr>
            </table>

            <h2 class="tabelas">Coluna lombar</h2>
            <table>
                <tr>
                    <th>Nome do teste</th>
                    <th>Positivo</th>
                    <th>Negativo</th>
                    <th>Esquerdo</th>
                    <th>Direito</th>
                </tr>
                <tr>
                    <td><strong>Slump test</strong></td>
                    <td><input type="text" class="textoTabela" name="slump_positivo"></td>
                    <td><input type="text" class="textoTabela" name="slump_negativo"></td>
                    <td><input type="text" class="textoTabela" name="slump_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="slump_direito"></td>
                </tr>
                <tr>
                    <td><strong>Lasegue</strong></td>
                    <td><input type="text" class="textoTabela" name="lasegue_positivo"></td>
                    <td><input type="text" class="textoTabela" name="lasegue_negativo"></td>
                    <td><input type="text" class="textoTabela" name="lasegue_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="lasegue_direito"></td>
                </tr>
                <tr>
                    <td><strong>Elevação da perna retificada</strong></td>
                    <td><input type="text" class="textoTabela" name="elevacao_perna_positivo"></td>
                    <td><input type="text" class="textoTabela" name="elevacao_perna_negativo"></td>
                    <td><input type="text" class="textoTabela" name="elevacao_perna_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="elevacao_perna_direito"></td>
                </tr>
                <tr>
                    <td><strong>Hoover</strong></td>
                    <td><input type="text" class="textoTabela" name="hoover_positivo"></td>
                    <td><input type="text" class="textoTabela" name="hoover_negativo"></td>
                    <td><input type="text" class="textoTabela" name="hoover_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="hoover_direito"></td>
                </tr>
                <tr>
                    <td><strong>Milgran</strong></td>
                    <td><input type="text" class="textoTabela" name="milgran_positivo"></td>
                    <td><input type="text" class="textoTabela" name="milgran_negativo"></td>
                    <td><input type="text" class="textoTabela" name="milgran_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="milgran_direito"></td>
                </tr>
                <tr>
                    <td><strong>Valsava</strong></td>
                    <td><input type="text" class="textoTabela" name="valsava_positivo"></td>
                    <td><input type="text" class="textoTabela" name="valsava_negativo"></td>
                    <td><input type="text" class="textoTabela" name="valsava_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="valsava_direito"></td>
                </tr>
            </table><br>

            <h1>Testes funcionais</h1><br>

            <h1>Membro superior</h1>

            <label for=""><strong>Mão atrás da cabeça:</strong></label><br>
            <textarea name="mao_atras_da_cabeça" id="" class="testeFuncional"
                placeholder="Digite aqui..."></textarea><br><br>

            <label for=""><strong>Mão no angulo inferior da escápula contralateral:</strong></label><br>
            <textarea name="mao_no_angulo_inferior_da_escapula_contralateral" id="" class="testeFuncional"
                placeholder="Digite aqui..."></textarea><br><br>

            <label for=""><strong>Mão no ombro contralateral:</strong></label><br>
            <textarea name="mao_no_ombro_contralateral" id="" class="testeFuncional"
                placeholder="Digite aqui..."></textarea><br><br>

            <label for=""><strong>Outros:</strong></label><br>
            <textarea name="outros_superior" id="" class="testeFuncional" placeholder="Digite aqui..."></textarea><br><br>

            <h1>Membro inferior</h1>

            <label for=""><strong>Agachamento:</strong></label><br>
            <textarea name="agachamento" id="" class="testeFuncional" placeholder="Digite aqui..."></textarea><br><br>

            <label for=""><strong>Subir e descer escadas:</strong></label><br>
            <textarea name="subir_descer_escadas" id="" class="testeFuncional"
                placeholder="Digite aqui..."></textarea><br><br>

            <label for=""><strong>Step-Down test</strong></label><br>
            <textarea name="step_down_test" id="" class="testeFuncional" placeholder="Digite aqui..."></textarea><br><br>

            <label for=""><strong>Correr reto à frente:</strong></label><br>
            <textarea name="correr_reto_a_frente" id="" class="testeFuncional"
                placeholder="Digite aqui..."></textarea><br><br>

            <label for=""><strong>correr e desacelerar:</strong></label><br>
            <textarea name="correr_desacelerar" id="" class="testeFuncional"
                placeholder="Digite aqui..."></textarea><br><br>

            <label for=""><strong>Correr e fazer voltas:</strong></label><br>
            <textarea name="correr_fazer_voltas" id="" class="testeFuncional"
                placeholder="Digite aqui..."></textarea><br><br>

            <label for=""><strong>Pular em uma perna:</strong></label><br>
            <textarea name="pular_em_uma_perna" id="" class="testeFuncional"
                placeholder="Digite aqui..."></textarea><br><br>

            <label for=""><strong>Saltar:</strong></label><br>
            <textarea name="saltar" id="" class="testeFuncional" placeholder="Digite aqui..."></textarea><br><br>

            <label for=""><strong>Outros:</strong></label><br>
            <textarea name="outros_inferior" id="" class="testeFuncional" placeholder="Digite aqui..."></textarea><br><br>

            <div>
                <h2>Exames Complementares</h2>
                <textarea name="exames_complementares" id="" class="ExameCompl" placeholder="Digite aqui..."></textarea>
            </div>
            <div>
                <h2>Observações</h2>
                <textarea name="observacao" id="" class="obs" placeholder="Digite aqui..."></textarea>
            </div>
            <div>
                <h2>Diagnóstico Fisioterapêutico</h2>
                <textarea name="diagnostico_fisioterapeutico" id="" class="Diagnostico"
                    placeholder="Digite aqui..."></textarea>
            </div>
            <div>
                <h2>Objetivos terapêuticos</h2>
                <textarea name="objetivos" id="" class="obj" placeholder="Digite aqui..."></textarea>
            </div>
            <div>
                <h2>Condutas</h2>
                <textarea name="condutas" id="" class="Condutas" placeholder="Digite aqui..."></textarea>
            </div>

            <button type="submit" name="submit">Finalizar Teste</button>

            <script>
                function confirmarEnvio() {
                    return confirm("Você tem certeza que deseja enviar o formulário?");
                }
            </script>

            <script src="./script.js"></script>

        </div>

    </form>

</body>

</html>