<?php 
session_start();
include('../../../../conexões/conexao.php');

if (isset($_SESSION['idFichaTraumatoOrtopedica'])) {
    $idFichaTraumatoOrtopedica = $_SESSION['idFichaTraumatoOrtopedica'];
    echo "ID da ficha: " . $idFichaTraumatoOrtopedica; // Debugging
} else {
    die("ID da ficha não encontrado.");
}

var_dump($idFichaTraumatoOrtopedica);

if (isset($_POST['submit'])) {
    // Coletando os dados do formulário
    $trapezio_descendente_D1 = $_POST['trapezio_descendente_D1'];
    $trapezio_descendente_D2 = $_POST['trapezio_descendente_D2'];
    $trapezio_descendente_E1 = $_POST['trapezio_descendente_E1'];
    $trapezio_descendente_E2 = $_POST['trapezio_descendente_E2'];

    $esternocleidomastoideo_D1 = $_POST['esternocleidomastoideo_D1'];
    $esternocleidomastoideo_D2 = $_POST['esternocleidomastoideo_D2'];
    $esternocleidomastoideo_E1 = $_POST['esternocleidomastoideo_E1'];
    $esternocleidomastoideo_E2 = $_POST['esternocleidomastoideo_E2'];

    $eretor_espinha_D1 = $_POST['eretor_espinha_D1'];
    $eretor_espinha_D2 = $_POST['eretor_espinha_D2'];
    $eretor_espinha_E1 = $_POST['eretor_espinha_E1'];
    $eretor_espinha_E2 = $_POST['eretor_espinha_E2'];

    $reto_abdomen_D1 = $_POST['reto_abdomen_D1'];
    $reto_abdomen_D2 = $_POST['reto_abdomen_D2'];
    $reto_abdomen_E1 = $_POST['reto_abdomen_E1'];
    $reto_abdomen_E2 = $_POST['reto_abdomen_E2'];

    $obliquo_externo_D1 = $_POST['obliquo_externo_D1'];
    $obliquo_externo_D2 = $_POST['obliquo_externo_D2'];
    $obliquo_externo_E1 = $_POST['obliquo_externo_E1'];
    $obliquo_externo_E2 = $_POST['obliquo_externo_E2'];

    $quadrado_lombo_D1 = $_POST['quadrado_lombo_D1'];
    $quadrado_lombo_D2 = $_POST['quadrado_lombo_D2'];
    $quadrado_lombo_E1 = $_POST['quadrado_lombo_E1'];
    $quadrado_lombo_E2 = $_POST['quadrado_lombo_E2'];

    $postural_anterior = $_POST['postural_anterior'];
    $postural_posterior = $_POST['postural_posterior'];
    $postural_lateral_direito = $_POST['postural_lateral_direito'];
    $postural_lateral_esquerdo = $_POST['postural_lateral_esquerdo'];

    $apley_positivo = $_POST['apley_positivo'];
    $apley_negativo = $_POST['apley_negativo'];
    $apley_esquerdo = $_POST['apley_esquerdo'];
    $apley_direito = $_POST['apley_direito'];

    $neer_positivo = $_POST['neer_positivo'];
    $neer_negativo = $_POST['neer_negativo'];
    $neer_esquerdo = $_POST['neer_esquerdo'];
    $neer_direito = $_POST['neer_direito'];

    $yocum_positivo = $_POST['yocum_positivo'];
    $yocum_negativo = $_POST['yocum_negativo'];
    $yocum_esquerdo = $_POST['yocum_esquerdo'];
    $yocum_direito = $_POST['yocum_direito'];

    $halkins_Kennedy_positivo = $_POST['halkins_Kennedy_positivo'];
    $halkins_Kennedy_negativo = $_POST['halkins_Kennedy_negativo'];
    $halkins_Kennedy_esquerdo = $_POST['halkins_Kennedy_esquerdo'];
    $halkins_Kennedy_direito = $_POST['halkins_Kennedy_direito'];

    $jobe_positivo = $_POST['jobe_positivo'];
    $jobe_negativo = $_POST['jobe_negativo'];
    $jobe_esquerdo = $_POST['jobe_esquerdo'];
    $jobe_direito = $_POST['jobe_direito'];

    $yergason_positivo = $_POST['yergason_positivo'];
    $yergason_negativo = $_POST['yergason_negativo'];
    $yergason_esquerdo = $_POST['yergason_esquerdo'];
    $yergason_direito = $_POST['yergason_direito'];

    $speed_positivo = $_POST['speed_positivo'];
    $speed_negativo = $_POST['speed_negativo'];
    $speed_esquerdo = $_POST['speed_esquerdo'];
    $speed_direito = $_POST['speed_direito'];

    $queda_braco_positivo = $_POST['queda_braco_positivo'];
    $queda_braco_negativo = $_POST['queda_braco_negativo'];
    $queda_braco_esquerdo = $_POST['queda_braco_esquerdo'];
    $queda_braco_direito = $_POST['queda_braco_direito'];

    $apreensao_positivo = $_POST['apreensao_positivo'];
    $apreensao_negativo = $_POST['apreensao_negativo'];
    $apreensao_esquerdo = $_POST['apreensao_esquerdo'];
    $apreensao_direito = $_POST['apreensao_direito'];

    $gaveta_positivo = $_POST['gaveta_positivo'];
    $gaveta_negativo = $_POST['gaveta_negativo'];
    $gaveta_esquerdo = $_POST['gaveta_esquerdo'];
    $gaveta_direito = $_POST['gaveta_direito'];

    $cozen_positivo = $_POST['cozen_positivo'];
    $cozen_negativo = $_POST['cozen_negativo'];
    $cozen_esquerdo = $_POST['cozen_esquerdo'];
    $cozen_direito = $_POST['cozen_direito'];

    $mill_positivo = $_POST['mill_positivo'];
    $mill_negativo = $_POST['mill_negativo'];
    $mill_esquerdo = $_POST['mill_esquerdo'];
    $mill_direito = $_POST['mill_direito'];

    $golfista_positivo = $_POST['golfista_positivo'];
    $golfista_negativo = $_POST['golfista_negativo'];
    $golfista_esquerdo = $_POST['golfista_esquerdo'];
    $golfista_direito = $_POST['golfista_direito'];

    $estresse_positivo = $_POST['estresse_positivo'];
    $estresse_negativo = $_POST['estresse_negativo'];
    $estresse_esquerdo = $_POST['estresse_esquerdo'];
    $estresse_direito = $_POST['estresse_direito'];

    $tinel_nervo_positivo = $_POST['tinel_nervo_positivo'];
    $tinel_nervo_negativo = $_POST['tinel_nervo_negativo'];
    $tinel_nervo_esquerdo = $_POST['tinel_nervo_esquerdo'];
    $tinel_nervo_direito = $_POST['tinel_nervo_direito'];

    $phalen_positivo = $_POST['phalen_positivo'];
    $phalen_negativo = $_POST['phalen_negativo'];
    $phalen_esquerdo = $_POST['phalen_esquerdo'];
    $phalen_direito = $_POST['phalen_direito'];

    $phalen_invertido_positivo = $_POST['phalen_invertido_positivo'];
    $phalen_invertido_negativo = $_POST['phalen_invertido_negativo'];
    $phalen_invertido_esquerdo = $_POST['phalen_invertido_esquerdo'];
    $phalen_invertido_direito = $_POST['phalen_invertido_direito'];

    $tinel_positivo = $_POST['tinel_positivo'];
    $tinel_negativo = $_POST['tinel_negativo'];
    $tinel_esquerdo = $_POST['tinel_esquerdo'];
    $tinel_direito = $_POST['tinel_direito'];

    $filkenstein_positivo = $_POST['filkenstein_positivo'];
    $filkenstein_negativo = $_POST['filkenstein_negativo'];
    $filkenstein_esquerdo = $_POST['filkenstein_esquerdo'];
    $filkenstein_direito = $_POST['filkenstein_direito'];

    $froment_positivo = $_POST['froment_positivo'];
    $froment_negativo = $_POST['froment_negativo'];
    $froment_esquerdo = $_POST['froment_esquerdo'];
    $froment_direito = $_POST['froment_direito'];

    $patrick_positivo = $_POST['patrick_positivo'];
    $patrick_negativo = $_POST['patrick_negativo'];
    $patrick_esquerdo = $_POST['patrick_esquerdo'];
    $patrick_direito = $_POST['patrick_direito'];

    $trendelemburg_positivo = $_POST['trendelemburg_positivo'];
    $trendelemburg_negativo = $_POST['trendelemburg_negativo'];
    $trendelemburg_esquerdo = $_POST['trendelemburg_esquerdo'];
    $trendelemburg_direito = $_POST['trendelemburg_direito'];

    $TPDPP_positivo = $_POST['TPDPP_positivo'];
    $TPDPP_negativo = $_POST['TPDPP_negativo'];
    $TPDPP_esquerdo = $_POST['TPDPP_esquerdo'];
    $TPDPP_direito = $_POST['TPDPP_direito'];

    $compressao_positivo = $_POST['compressao_positivo'];
    $compressao_negativo = $_POST['compressao_negativo'];
    $compressao_esquerdo = $_POST['compressao_esquerdo'];
    $compressao_direito = $_POST['compressao_direito'];

    $gillet_positivo = $_POST['gillet_positivo'];
    $gillet_negativo = $_POST['gillet_negativo'];
    $gillet_esquerdo = $_POST['gillet_esquerdo'];
    $gillet_direito = $_POST['gillet_direito'];

    $piedallu_positivo = $_POST['piedallu_positivo'];
    $piedallu_negativo = $_POST['piedallu_negativo'];
    $piedallu_esquerdo = $_POST['piedallu_esquerdo'];
    $piedallu_direito = $_POST['piedallu_direito'];

    $piriforme_positivo = $_POST['piriforme_positivo'];
    $piriforme_negativo = $_POST['piriforme_negativo'];
    $piriforme_esquerdo = $_POST['piriforme_esquerdo'];
    $piriforme_direito = $_POST['piriforme_direito'];

    $ortolani_positivo = $_POST['ortolani_positivo'];
    $ortolani_negativo = $_POST['ortolani_negativo'];
    $ortolani_esquerdo = $_POST['ortolani_esquerdo'];
    $ortolani_direito = $_POST['ortolani_direito'];

    // Verifica se já existe uma ficha com o ID informado
    $query_check = "SELECT * FROM fichatraumatoortopédica5 WHERE idFichaTraumatoOrtopédica = ?";
    $stmt_check = $mysqli->prepare($query_check);
    if ($stmt_check === false) {
        die('Erro ao preparar a consulta de verificação: ' . $mysqli->error);
    }
    $stmt_check->bind_param('i', $idFichaTraumatoOrtopedica);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();
    
if ($result_check->num_rows > 0) {
    // Query de atualização
    $query_update = "UPDATE fichatraumatoortopédica5 SET 
        trapezio_descendente_D1 = ?, trapezio_descendente_D2 = ?, trapezio_descendente_E1 = ?, trapezio_descendente_E2 = ?, 
        esternocleidomastoideo_D1 = ?, esternocleidomastoideo_D2 = ?, esternocleidomastoideo_E1 = ?, esternocleidomastoideo_E2 = ?, 
        eretor_espinha_D1 = ?, eretor_espinha_D2 = ?, eretor_espinha_E1 = ?, eretor_espinha_E2 = ?, 
        reto_abdomen_D1 = ?, reto_abdomen_D2 = ?, reto_abdomen_E1 = ?, reto_abdomen_E2 = ?, 
        obliquo_externo_D1 = ?, obliquo_externo_D2 = ?, obliquo_externo_E1 = ?, obliquo_externo_E2 = ?, 
        quadrado_lombo_D1 = ?, quadrado_lombo_D2 = ?, quadrado_lombo_E1 = ?, quadrado_lombo_E2 = ?, 
        postural_anterior = ?, postural_posterior = ?, postural_lateral_direito = ?, postural_lateral_esquerdo = ?, 
        apley_positivo = ?, apley_negativo = ?, apley_esquerdo = ?, apley_direito = ?, 
        neer_positivo = ?, neer_negativo = ?, neer_esquerdo = ?, neer_direito = ?, 
        yocum_positivo = ?, yocum_negativo = ?, yocum_esquerdo = ?, yocum_direito = ?, 
        halkins_Kennedy_positivo = ?, halkins_Kennedy_negativo = ?, halkins_Kennedy_esquerdo = ?, halkins_Kennedy_direito = ?, 
        jobe_positivo = ?, jobe_negativo = ?, jobe_esquerdo = ?, jobe_direito = ?, 
        yergason_positivo = ?, yergason_negativo = ?, yergason_esquerdo = ?, yergason_direito = ?, 
        speed_positivo = ?, speed_negativo = ?, speed_esquerdo = ?, speed_direito = ?, 
        queda_braco_positivo = ?, queda_braco_negativo = ?, queda_braco_esquerdo = ?, queda_braco_direito = ?, 
        apreensao_positivo = ?, apreensao_negativo = ?, apreensao_esquerdo = ?, apreensao_direito = ?, 
        gaveta_positivo = ?, gaveta_negativo = ?, gaveta_esquerdo = ?, gaveta_direito = ?, 
        cozen_positivo = ?, cozen_negativo = ?, cozen_esquerdo = ?, cozen_direito = ?, 
        mill_positivo = ?, mill_negativo = ?, mill_esquerdo = ?, mill_direito = ?, 
        golfista_positivo = ?, golfista_negativo = ?, golfista_esquerdo = ?, golfista_direito = ?, 
        estresse_positivo = ?, estresse_negativo = ?, estresse_esquerdo = ?, estresse_direito = ?, 
        tinel_nervo_positivo = ?, tinel_nervo_negativo = ?, tinel_nervo_esquerdo = ?, tinel_nervo_direito = ?, 
        phalen_positivo = ?, phalen_negativo = ?, phalen_esquerdo = ?, phalen_direito = ?, 
        phalen_invertido_positivo = ?, phalen_invertido_negativo = ?, phalen_invertido_esquerdo = ?, phalen_invertido_direito = ?, 
        tinel_positivo = ?, tinel_negativo = ?, tinel_esquerdo = ?, tinel_direito = ?, 
        filkenstein_positivo = ?, filkenstein_negativo = ?, filkenstein_esquerdo = ?, filkenstein_direito = ?, 
        froment_positivo = ?, froment_negativo = ?, froment_esquerdo = ?, froment_direito = ?, 
        patrick_positivo = ?, patrick_negativo = ?, patrick_esquerdo = ?, patrick_direito = ?, 
        trendelemburg_positivo = ?, trendelemburg_negativo = ?, trendelemburg_esquerdo = ?, trendelemburg_direito = ?, 
        TPDPP_positivo = ?, TPDPP_negativo = ?, TPDPP_esquerdo = ?, TPDPP_direito = ?, 
        compressao_positivo = ?, compressao_negativo = ?, compressao_esquerdo = ?, compressao_direito = ?, 
        gillet_positivo = ?, gillet_negativo = ?, gillet_esquerdo = ?, gillet_direito = ?, 
        piedallu_positivo = ?, piedallu_negativo = ?, piedallu_esquerdo = ?, piedallu_direito = ?, 
        piriforme_positivo = ?, piriforme_negativo = ?, piriforme_esquerdo = ?, piriforme_direito = ?, 
        ortolani_positivo = ?, ortolani_negativo = ?, ortolani_esquerdo = ?, ortolani_direito = ? 
        WHERE idFichaTraumatoOrtopédica = ?";

    $stmt_update = $mysqli->prepare($query_update);
    if ($stmt_update === false) {
        die('Erro ao preparar a consulta de atualização: ' . $mysqli->error);
    }

    $stmt_update->bind_param(
         'iiiiiiiiiiiiiiiiiiiiiiiiissssiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', // 140 campos inteiros mais 1 inteiro para o ID
        $trapezio_descendente_D1, $trapezio_descendente_D2, $trapezio_descendente_E1, $trapezio_descendente_E2, 
        $esternocleidomastoideo_D1, $esternocleidomastoideo_D2, $esternocleidomastoideo_E1, $esternocleidomastoideo_E2, 
        $eretor_espinha_D1, $eretor_espinha_D2, $eretor_espinha_E1, $eretor_espinha_E2, 
        $reto_abdomen_D1, $reto_abdomen_D2, $reto_abdomen_E1, $reto_abdomen_E2, 
        $obliquo_externo_D1, $obliquo_externo_D2, $obliquo_externo_E1, $obliquo_externo_E2, 
        $quadrado_lombo_D1, $quadrado_lombo_D2, $quadrado_lombo_E1, $quadrado_lombo_E2, 
        $postural_anterior, $postural_posterior, $postural_lateral_direito, $postural_lateral_esquerdo, 
        $apley_positivo, $apley_negativo, $apley_esquerdo, $apley_direito, 
        $neer_positivo, $neer_negativo, $neer_esquerdo, $neer_direito, 
        $yocum_positivo, $yocum_negativo, $yocum_esquerdo, $yocum_direito, 
        $halkins_Kennedy_positivo, $halkins_Kennedy_negativo, $halkins_Kennedy_esquerdo, $halkins_Kennedy_direito, 
        $jobe_positivo, $jobe_negativo, $jobe_esquerdo, $jobe_direito, 
        $yergason_positivo, $yergason_negativo, $yergason_esquerdo, $yergason_direito, 
        $speed_positivo, $speed_negativo, $speed_esquerdo, $speed_direito, 
        $queda_braco_positivo, $queda_braco_negativo, $queda_braco_esquerdo, $queda_braco_direito, 
        $apreensao_positivo, $apreensao_negativo, $apreensao_esquerdo, $apreensao_direito, 
        $gaveta_positivo, $gaveta_negativo, $gaveta_esquerdo, $gaveta_direito, 
        $cozen_positivo, $cozen_negativo, $cozen_esquerdo, $cozen_direito, 
        $mill_positivo, $mill_negativo, $mill_esquerdo, $mill_direito, 
        $golfista_positivo, $golfista_negativo, $golfista_esquerdo, $golfista_direito, 
        $estresse_positivo, $estresse_negativo, $estresse_esquerdo, $estresse_direito, 
        $tinel_nervo_positivo, $tinel_nervo_negativo, $tinel_nervo_esquerdo, $tinel_nervo_direito, 
        $phalen_positivo, $phalen_negativo, $phalen_esquerdo, $phalen_direito, 
        $phalen_invertido_positivo, $phalen_invertido_negativo, $phalen_invertido_esquerdo, $phalen_invertido_direito, 
        $tinel_positivo, $tinel_negativo, $tinel_esquerdo, $tinel_direito, 
        $filkenstein_positivo, $filkenstein_negativo, $filkenstein_esquerdo, $filkenstein_direito, 
        $froment_positivo, $froment_negativo, $froment_esquerdo, $froment_direito, 
        $patrick_positivo, $patrick_negativo, $patrick_esquerdo, $patrick_direito, 
        $trendelemburg_positivo, $trendelemburg_negativo, $trendelemburg_esquerdo, $trendelemburg_direito, 
        $TPDPP_positivo, $TPDPP_negativo, $TPDPP_esquerdo, $TPDPP_direito, 
        $compressao_positivo, $compressao_negativo, $compressao_esquerdo, $compressao_direito, 
        $gillet_positivo, $gillet_negativo, $gillet_esquerdo, $gillet_direito, 
        $piedallu_positivo, $piedallu_negativo, $piedallu_esquerdo, $piedallu_direito, 
        $piriforme_positivo, $piriforme_negativo, $piriforme_esquerdo, $piriforme_direito, 
        $ortolani_positivo, $ortolani_negativo, $ortolani_esquerdo, $ortolani_direito, 
        $idFichaTraumatoOrtopedica 
    );

    if ($stmt_update->execute()) {
        header("Location: ../tela6/tela6.php");
    } else {
        echo "Erro ao atualizar os dados: " . $stmt_update->error;
    }
    $stmt_update->close();
} else {
    $query_insert = "INSERT INTO fichatraumatoortopédica5 (
        idFichaTraumatoOrtopédica,
        trapezio_descendente_D1, trapezio_descendente_D2, trapezio_descendente_E1, trapezio_descendente_E2, 
        esternocleidomastoideo_D1, esternocleidomastoideo_D2, esternocleidomastoideo_E1, esternocleidomastoideo_E2, 
        eretor_espinha_D1, eretor_espinha_D2, eretor_espinha_E1, eretor_espinha_E2, 
        reto_abdomen_D1, reto_abdomen_D2, reto_abdomen_E1, reto_abdomen_E2, 
        obliquo_externo_D1, obliquo_externo_D2, obliquo_externo_E1, obliquo_externo_E2, 
        quadrado_lombo_D1, quadrado_lombo_D2, quadrado_lombo_E1, quadrado_lombo_E2, 
        postural_anterior, postural_posterior, postural_lateral_direito, postural_lateral_esquerdo, 
        apley_positivo, apley_negativo, apley_esquerdo, apley_direito, 
        neer_positivo, neer_negativo, neer_esquerdo, neer_direito, 
        yocum_positivo, yocum_negativo, yocum_esquerdo, yocum_direito, 
        halkins_Kennedy_positivo, halkins_Kennedy_negativo, halkins_Kennedy_esquerdo, halkins_Kennedy_direito, 
        jobe_positivo, jobe_negativo, jobe_esquerdo, jobe_direito, 
        yergason_positivo, yergason_negativo, yergason_esquerdo, yergason_direito, 
        speed_positivo, speed_negativo, speed_esquerdo, speed_direito, 
        queda_braco_positivo, queda_braco_negativo, queda_braco_esquerdo, queda_braco_direito, 
        apreensao_positivo, apreensao_negativo, apreensao_esquerdo, apreensao_direito, 
        gaveta_positivo, gaveta_negativo, gaveta_esquerdo, gaveta_direito, 
        cozen_positivo, cozen_negativo, cozen_esquerdo, cozen_direito, 
        mill_positivo, mill_negativo, mill_esquerdo, mill_direito, 
        golfista_positivo, golfista_negativo, golfista_esquerdo, golfista_direito, 
        estresse_positivo, estresse_negativo, estresse_esquerdo, estresse_direito, 
        tinel_nervo_positivo, tinel_nervo_negativo, tinel_nervo_esquerdo, tinel_nervo_direito, 
        phalen_positivo, phalen_negativo, phalen_esquerdo, phalen_direito, 
        phalen_invertido_positivo, phalen_invertido_negativo, phalen_invertido_esquerdo, phalen_invertido_direito, 
        tinel_positivo, tinel_negativo, tinel_esquerdo, tinel_direito, 
        filkenstein_positivo, filkenstein_negativo, filkenstein_esquerdo, filkenstein_direito, 
        froment_positivo, froment_negativo, froment_esquerdo, froment_direito, 
        patrick_positivo, patrick_negativo, patrick_esquerdo, patrick_direito, 
        trendelemburg_positivo, trendelemburg_negativo, trendelemburg_esquerdo, trendelemburg_direito, 
        TPDPP_positivo, TPDPP_negativo, TPDPP_esquerdo, TPDPP_direito, 
        compressao_positivo, compressao_negativo, compressao_esquerdo, compressao_direito, 
        gillet_positivo, gillet_negativo, gillet_esquerdo, gillet_direito, 
        piedallu_positivo, piedallu_negativo, piedallu_esquerdo, piedallu_direito, 
        piriforme_positivo, piriforme_negativo, piriforme_esquerdo, piriforme_direito, 
        ortolani_positivo, ortolani_negativo, ortolani_esquerdo, ortolani_direito) 
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt_insert = $mysqli->prepare($query_insert);
        if ($stmt_insert === false) {
            die('Erro ao preparar a consulta de inserção: ' . $mysqli->error);
        }

        $stmt_insert->bind_param(
            'iiiiiiiiiiiiiiiiiiiiiiiiissssiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', // 140 campos inteiros
            $idFichaTraumatoOrtopedica,
            $trapezio_descendente_D1, $trapezio_descendente_D2, $trapezio_descendente_E1, $trapezio_descendente_E2, 
            $esternocleidomastoideo_D1, $esternocleidomastoideo_D2, $esternocleidomastoideo_E1, $esternocleidomastoideo_E2, 
            $eretor_espinha_D1, $eretor_espinha_D2, $eretor_espinha_E1, $eretor_espinha_E2, 
            $reto_abdomen_D1, $reto_abdomen_D2, $reto_abdomen_E1, $reto_abdomen_E2, 
            $obliquo_externo_D1, $obliquo_externo_D2, $obliquo_externo_E1, $obliquo_externo_E2, 
            $quadrado_lombo_D1, $quadrado_lombo_D2, $quadrado_lombo_E1, $quadrado_lombo_E2, 
            $postural_anterior, $postural_posterior, $postural_lateral_direito, $postural_lateral_esquerdo, 
            $apley_positivo, $apley_negativo, $apley_esquerdo, $apley_direito, 
            $neer_positivo, $neer_negativo, $neer_esquerdo, $neer_direito, 
            $yocum_positivo, $yocum_negativo, $yocum_esquerdo, $yocum_direito, 
            $halkins_Kennedy_positivo, $halkins_Kennedy_negativo, $halkins_Kennedy_esquerdo, $halkins_Kennedy_direito, 
            $jobe_positivo, $jobe_negativo, $jobe_esquerdo, $jobe_direito, 
            $yergason_positivo, $yergason_negativo, $yergason_esquerdo, $yergason_direito, 
            $speed_positivo, $speed_negativo, $speed_esquerdo, $speed_direito, 
            $queda_braco_positivo, $queda_braco_negativo, $queda_braco_esquerdo, $queda_braco_direito, 
            $apreensao_positivo, $apreensao_negativo, $apreensao_esquerdo, $apreensao_direito, 
            $gaveta_positivo, $gaveta_negativo, $gaveta_esquerdo, $gaveta_direito, 
            $cozen_positivo, $cozen_negativo, $cozen_esquerdo, $cozen_direito, 
            $mill_positivo, $mill_negativo, $mill_esquerdo, $mill_direito, 
            $golfista_positivo, $golfista_negativo, $golfista_esquerdo, $golfista_direito, 
            $estresse_positivo, $estresse_negativo, $estresse_esquerdo, $estresse_direito, 
            $tinel_nervo_positivo, $tinel_nervo_negativo, $tinel_nervo_esquerdo, $tinel_nervo_direito, 
            $phalen_positivo, $phalen_negativo, $phalen_esquerdo, $phalen_direito, 
            $phalen_invertido_positivo, $phalen_invertido_negativo, $phalen_invertido_esquerdo, $phalen_invertido_direito, 
            $tinel_positivo, $tinel_negativo, $tinel_esquerdo, $tinel_direito, 
            $filkenstein_positivo, $filkenstein_negativo, $filkenstein_esquerdo, $filkenstein_direito, 
            $froment_positivo, $froment_negativo, $froment_esquerdo, $froment_direito, 
            $patrick_positivo, $patrick_negativo, $patrick_esquerdo, $patrick_direito, 
            $trendelemburg_positivo, $trendelemburg_negativo, $trendelemburg_esquerdo, $trendelemburg_direito, 
            $TPDPP_positivo, $TPDPP_negativo, $TPDPP_esquerdo, $TPDPP_direito, 
            $compressao_positivo, $compressao_negativo, $compressao_esquerdo, $compressao_direito, 
            $gillet_positivo, $gillet_negativo, $gillet_esquerdo, $gillet_direito, 
            $piedallu_positivo, $piedallu_negativo, $piedallu_esquerdo, $piedallu_direito, 
            $piriforme_positivo, $piriforme_negativo, $piriforme_esquerdo, $piriforme_direito, 
            $ortolani_positivo, $ortolani_negativo, $ortolani_esquerdo, $ortolani_direito
        );

        if ($stmt_insert->execute()) {
            header("Location: ../tela6/tela6.php");
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
    <link rel="stylesheet" href="./style.css">
    <title>Prova de função muscular</title>
</head>

<body>
    <form action="" method="POST">
        <div class="container">

            <div class="musculo">
                <h1 class="sub-titulo">Pescoço</h1>
                <div class="box-musculo">
                    <div class="coluna1">
                        <p><b>Movimento:</b> Extensão</p>
                        <br><br><br>
                        <p><b>Direito: <input type="text" name="trapezio_descendente_D1" class="descricao"></b></p>
                        <p><b>Direito: <input type="text" name="trapezio_descendente_D2" class="descricao"></b></p>
                    </div>
                    <div class="coluna2">
                        <p><b>Músculo:</b> Trapézio descendente (NC XI e C3-C4)</p>
                        <p>Extensores (ramos dorsais dos Nn. Espinais)</p>
                        <p><b>Esquerdo: <input type="text" name="trapezio_descendente_E1" class="descricao"></b></p>
                        <p><b>Esquerdo: <input type="text" name="trapezio_descendente_E2" class="descricao"></b></p>
                    </div>
    
                    <div class="d-flex"><!--separação vertical entre as colunas-->
                        <div class="vr"></div>
                    </div>
    
                    <div class="coluna1">
                        <p><b>Movimento:</b> Flexão</p>
                        <br><br><br>
                        <p><b>Direito: <input type="text" name="esternocleidomastoideo_D1" class="descricao"></b></p>
                        <p><b>Direito: <input type="text" name="esternocleidomastoideo_D2" class="descricao"></b></p>
                    </div>
                    <div class="coluna2">
                        <p><b>Músculo:</b> Esternocleidomastoideo (NC XI e C2-C3)</p>
                        <br><br>
                        <p><b>Esquerdo: <input type="text" name="esternocleidomastoideo_E1" class="descricao"></b></p>
                        <p><b>Esquerdo: <input type="text" name="esternocleidomastoideo_E2" class="descricao"></b></p>
                    </div>
                </div>
            </div>
    
            <hr class="separacao-musculos">
    
            <div class="musculo">
                <h1 class="sub-titulo">Tronco</h1>
                <div class="box-musculo">
                    <div class="coluna1">
                        <p><b>Movimento:</b> Extensão</p>
                        <br><br><br>
                        <p><b>Direito: <input type="text" name="eretor_espinha_D1" class="descricao"></b></p>
                        <p><b>Direito: <input type="text" name="eretor_espinha_D2" class="descricao"></b></p>
                    </div>
                    <div class="coluna2">
                        <p><b>Músculo:</b> Eretor da espinha (ramos dorsais dos Nn. Espinais)</p>
                        <br><br>
                        <p><b>Esquerdo: <input type="text" name="eretor_espinha_E1" class="descricao"></b></p>
                        <p><b>Esquerdo: <input type="text" name="eretor_espinha_E2" class="descricao"></b></p>
                    </div>
    
                    <div class="d-flex"><!--separação vertical entre as colunas-->
                        <div class="vr"></div>
                    </div>
    
                    <div class="coluna1">
                        <p><b>Movimento:</b> Flexão</p>
                        <br><br><br>
                        <p><b>Direito: <input type="text" name="reto_abdomen_D1" class="descricao"></b></p>
                        <p><b>Direito: <input type="text" name="reto_abdomen_D2" class="descricao"></b></p>
                    </div>
                    <div class="coluna2">
                        <p><b>Músculo:</b> Reto do abdomen (T7-T12)</p>
                        <br><br>
                        <p><b>Esquerdo: <input type="text" name="reto_abdomen_E1" class="descricao"></b></p>
                        <p><b>Esquerdo: <input type="text" name="reto_abdomen_E2" class="descricao"></b></p>
                    </div>
                </div>
    
                <hr>
    
                <div class="box-musculo final">
                    <div class="coluna1">
                        <p><b>Movimento:</b> Rotação</p>
                        <br><br><br>
                        <p><b>Direito: <input type="text" name="obliquo_externo_D1" class="descricao"></b></p>
                        <p><b>Direito: <input type="text" name="obliquo_externo_D2" class="descricao"></b></p>
                    </div>
                    <div class="coluna2">
                        <p><b>Músculo:</b> Oblíquo externo (8° ao 12° intercostais)</p>
                        <p>Oblíquo interno (8° ao 12° intercostais)</p>
                        <p><b>Esquerdo: <input type="text" name="obliquo_externo_E1" class="descricao"></b></p>
                        <p><b>Esquerdo: <input type="text" name="obliquo_externo_E2" class="descricao"></b></p>
                    </div>
    
                </div>
            </div>
    
            <hr class="separacao-musculos">
            <div class="musculo">
                <h1 class="sub-titulo">Pelve</h1>
                <div class="box-musculo final">
    
                    <div class="coluna1">
                        <p><b>Movimento:</b> Elevação</p>
                        <br><br><br>
                        <p><b>Direito: <input type="text" name="quadrado_lombo_D1" class="descricao"></b></p>
                        <p><b>Direito: <input type="text" name="quadrado_lombo_D2" class="descricao"></b></p>
                    </div>
                    <div class="coluna2">
                        <p><b>Músculo:</b> Quadrado do lombo (T12- L3)</p>
                        <br><br>
                        <p><b>Esquerdo: <input type="text" name="quadrado_lombo_E1" class="descricao"></b></p>
                        <p><b>Esquerdo: <input type="text" name="quadrado_lombo_E2" class="descricao"></b></p>
                    </div>
    
                </div>
            </div>
    
            <hr>
    
    
            <h1 class="avaliacao">Avaliação Postural</h1>
    
            <div>
                <h2>Anterior:</h2>
                <textarea class="anterior" id="" name="postural_anterior" placeholder="Digite aqui:"></textarea>
            </div>
            <div>
                <h2>Posterior:</h2>
                <textarea class="posterior" id="" name="postural_posterior" placeholder="Digite aqui:"></textarea>
            </div>
            <div>
                <h2>Lateral direito:</h2>
                <textarea class="lateraldireito" id="" name="postural_lateral_direito" placeholder="Digite aqui:"></textarea>
            </div>
            <div>
                <h2>Lateral esquerdo:</h2>
                <textarea class="lateralesquerdo" id="" name="postural_lateral_esquerdo" placeholder="Digite aqui:"></textarea>
            </div><br>
    
    
            <!-- <h1 class="avaliacao">Exame da Marcha</h1><br>(Ver sobre exame de marcha com a stakeholder)-->
    
            <h1 class="avaliacao">Teste Especiais</h1>
    
            <h2 class="tabelas">Ombro</h2>
            <table border="1">
                <tr>
                    <th>Nome do Teste</th>
                    <th>Positivo</th>
                    <th>Negativo</th>
                    <th>Esquerdo</th>
                    <th>Direito</th>
                </tr>
                <tr>
                    <td><strong>Apley</strong></td>
                    <td><input type="text" class="textoTabela" name="apley_positivo"></td>
                    <td><input type="text" class="textoTabela" name="apley_negativo"></td>
                    <td><input type="text" class="textoTabela" name="apley_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="apley_direito"></td>
                </tr>
                <tr>
                    <td><strong>Neer</strong></td>
                    <td><input type="text" class="textoTabela" name="neer_positivo"></td>
                    <td><input type="text" class="textoTabela" name="neer_negativo"></td>
                    <td><input type="text" class="textoTabela" name="neer_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="neer_direito"></td>
                </tr>
                <tr>
                    <td><strong>Yocum</strong></td>
                    <td><input type="text" class="textoTabela" name="yocum_positivo"></td>
                    <td><input type="text" class="textoTabela" name="yocum_negativo"></td>
                    <td><input type="text" class="textoTabela" name="yocum_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="yocum_direito"></td>
                </tr>
                <tr>
                    <td><strong>Halkins-Kennedy</strong></td>
                    <td><input type="text" class="textoTabela" name="halkins_Kennedy_positivo"></td>
                    <td><input type="text" class="textoTabela" name="halkins_Kennedy_negativo"></td>
                    <td><input type="text" class="textoTabela" name="halkins_Kennedy_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="halkins_Kennedy_direito"></td>
                </tr>
                <tr>
                    <td><strong>Jobe</strong></td>
                    <td><input type="text" class="textoTabela" name="jobe_positivo"></td>
                    <td><input type="text" class="textoTabela" name="jobe_negativo"></td>
                    <td><input type="text" class="textoTabela" name="jobe_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="jobe_direito"></td>
                </tr>
                <tr>
                    <td><strong>Yergason</strong></td>
                    <td><input type="text" class="textoTabela" name="yergason_positivo"></td>
                    <td><input type="text" class="textoTabela" name="yergason_negativo"></td>
                    <td><input type="text" class="textoTabela" name="yergason_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="yergason_direito"></td>
                </tr>
                <tr>
                    <td><strong>Speed</strong></td>
                    <td><input type="text" class="textoTabela" name="speed_positivo"></td>
                    <td><input type="text" class="textoTabela" name="speed_negativo"></td>
                    <td><input type="text" class="textoTabela" name="speed_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="speed_direito"></td>
                </tr>
                <tr>
                    <td><strong>Queda do braço</strong></td>
                    <td><input type="text" class="textoTabela" name="queda_braco_positivo"></td>
                    <td><input type="text" class="textoTabela" name="queda_braco_negativo"></td>
                    <td><input type="text" class="textoTabela" name="queda_braco_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="queda_braco_direito"></td>
                </tr>
                <tr>
                    <td><strong>Apreensão-Luxação</strong></td>
                    <td><input type="text" class="textoTabela" name="apreensao_positivo"></td>
                    <td><input type="text" class="textoTabela" name="apreensao_negativo"></td>
                    <td><input type="text" class="textoTabela" name="apreensao_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="apreensao_direito"></td>
                </tr>
                <tr>
                    <td><strong>Gaveta</strong></td>
                    <td><input type="text" class="textoTabela" name="gaveta_positivo"></td>
                    <td><input type="text" class="textoTabela" name="gaveta_negativo"></td>
                    <td><input type="text" class="textoTabela" name="gaveta_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="gaveta_direito"></td>
                </tr>
            </table>
    
            <h2 class="tabelas">Cotovelo</h2>
            <table border="1">
                <tr>
                    <th>Nome do Teste</th>
                    <th>Positivo</th>
                    <th>Negativo</th>
                    <th>Esquerdo</th>
                    <th>Direito</th>
                </tr>
                <tr>
                    <td><strong>Cozen</strong></td>
                    <td><input type="text" class="textoTabela" name="cozen_positivo"></td>
                    <td><input type="text" class="textoTabela" name="cozen_negativo"></td>
                    <td><input type="text" class="textoTabela" name="cozen_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="cozen_direito"></td>
                </tr>
                <tr>
                    <td><strong>Mill</strong></td>
                    <td><input type="text" class="textoTabela" name="mill_positivo"></td>
                    <td><input type="text" class="textoTabela" name="mill_negativo"></td>
                    <td><input type="text" class="textoTabela" name="mill_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="mill_direito"></td>
                </tr>
                <tr>
                    <td><strong>Cotovelo de golfista</strong></td>
                    <td><input type="text" class="textoTabela" name="golfista_positivo"></td>
                    <td><input type="text" class="textoTabela" name="golfista_negativo"></td>
                    <td><input type="text" class="textoTabela" name="golfista_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="golfista_direito"></td>
                </tr>
                <tr>
                    <td><strong>Estresse em varo e valgo</strong></td>
                    <td><input type="text" class="textoTabela" name="estresse_positivo"></td>
                    <td><input type="text" class="textoTabela" name="estresse_negativo"></td>
                    <td><input type="text" class="textoTabela" name="estresse_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="estresse_direito"></td>
                </tr>
                <tr>
                    <td><strong>tinel do nervo ulnar</strong></td>
                    <td><input type="text" class="textoTabela" name="tinel_nervo_positivo"></td>
                    <td><input type="text" class="textoTabela" name="tinel_nervo_negativo"></td>
                    <td><input type="text" class="textoTabela" name="tinel_nervo_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="tinel_nervo_direito"></td>
                </tr>
            </table>
    
            <h2 class="tabelas">Punho e mão</h2>
            <table>
                <tr>
                    <th>Nome do Teste</th>
                    <th>Positivo</th>
                    <th>Negativo</th>
                    <th>Esquerdo</th>
                    <th>Direito</th>
                </tr>
                <tr>
                    <td><strong>Phalen</strong></td>
                    <td><input type="text" class="textoTabela" name="phalen_positivo"></td>
                    <td><input type="text" class="textoTabela" name="phalen_negativo"></td>
                    <td><input type="text" class="textoTabela" name="phalen_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="phalen_direito"></td>
                </tr>
                <tr>
                    <td><strong>Phalen invertido</strong></td>
                    <td><input type="text" class="textoTabela" name="phalen_invertido_positivo"></td>
                    <td><input type="text" class="textoTabela" name="phalen_invertido_negativo"></td>
                    <td><input type="text" class="textoTabela" name="phalen_invertido_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="phalen_invertido_direito"></td>
                </tr>
                <tr>
                    <td><strong>tinel</strong></td>
                    <td><input type="text" class="textoTabela" name="tinel_positivo"></td>
                    <td><input type="text" class="textoTabela" name="tinel_negativo"></td>
                    <td><input type="text" class="textoTabela" name="tinel_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="tinel_direito"></td>
                </tr>
                <tr>
                    <td><strong>Filkenstein</strong></td>
                    <td><input type="text" class="textoTabela" name="filkenstein_positivo"></td>
                    <td><input type="text" class="textoTabela" name="filkenstein_negativo"></td>
                    <td><input type="text" class="textoTabela" name="filkenstein_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="filkenstein_direito"></td>
                </tr>
                <tr>
                    <td><strong>Froment</strong></td>
                    <td><input type="text" class="textoTabela" name="froment_positivo"></td>
                    <td><input type="text" class="textoTabela" name="froment_negativo"></td>
                    <td><input type="text" class="textoTabela" name="froment_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="froment_direito"></td>
                </tr>
            </table>
    
            <h2 class="tabelas">Pelve e quadril</h2>
            <table border="1">
                <tr>
                    <th>Nome do Teste</th>
                    <th>Positivo</th>
                    <th>Negativo</th>
                    <th>Esquerdo</th>
                    <th>Direito</th>
                </tr>
                <tr>
                    <td><strong>Patrick - FABERE</strong></td>
                    <td><input type="text" class="textoTabela" name="patrick_positivo"></td>
                    <td><input type="text" class="textoTabela" name="patrick_negativo"></td>
                    <td><input type="text" class="textoTabela" name="patrick_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="patrick_direito"></td>
                </tr>
                <tr>
                    <td><strong>Trendelemburg</strong></td>
                    <td><input type="text" class="textoTabela" name="trendelemburg_positivo"></td>
                    <td><input type="text" class="textoTabela" name="trendelemburg_negativo"></td>
                    <td><input type="text" class="textoTabela" name="trendelemburg_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="trendelemburg_direito"></td>
                </tr>
                <tr>
                    <td><strong>TPDPP</strong></td>
                    <td><input type="text" class="textoTabela" name="TPDPP_positivo"></td>
                    <td><input type="text" class="textoTabela" name="TPDPP_negativo"></td>
                    <td><input type="text" class="textoTabela" name="TPDPP_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="TPDPP_direito"></td>
                </tr>
                <tr>
                    <td><strong>Compressão pélvica</strong></td>
                    <td><input type="text" class="textoTabela" name="compressao_positivo"></td>
                    <td><input type="text" class="textoTabela" name="compressao_negativo"></td>
                    <td><input type="text" class="textoTabela" name="compressao_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="compressao_direito"></td>
                </tr>
                <tr>
                    <td><strong>Gillet</strong></td>
                    <td><input type="text" class="textoTabela" name="gillet_positivo"></td>
                    <td><input type="text" class="textoTabela" name="gillet_negativo"></td>
                    <td><input type="text" class="textoTabela" name="gillet_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="gillet_direito"></td>
                </tr>
                <tr>
                    <td><strong>Piedallu</strong></td>
                    <td><input type="text" class="textoTabela" name="piedallu_positivo"></td>
                    <td><input type="text" class="textoTabela" name="piedallu_negativo"></td>
                    <td><input type="text" class="textoTabela" name="piedallu_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="piedallu_direito"></td>
                </tr>
                <tr>
                    <td><strong>Piriforme</strong></td>
                    <td><input type="text" class="textoTabela" name="piriforme_positivo"></td>
                    <td><input type="text" class="textoTabela" name="piriforme_negativo"></td>
                    <td><input type="text" class="textoTabela" name="piriforme_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="piriforme_direito"></td>
                </tr>
                <tr>
                    <td><strong>Ortolani</strong></td>
                    <td><input type="text" class="textoTabela" name="ortolani_positivo"></td>
                    <td><input type="text" class="textoTabela" name="ortolani_negativo"></td>
                    <td><input type="text" class="textoTabela" name="ortolani_esquerdo"></td>
                    <td><input type="text" class="textoTabela" name="ortolani_direito"></td>
                </tr>
            </table>
    
            <button type="submit" name="submit">Próxima página</button>
    
            <script src="./script.js"></script>
        </div>
        
    </form>
    
</body>

</html>

