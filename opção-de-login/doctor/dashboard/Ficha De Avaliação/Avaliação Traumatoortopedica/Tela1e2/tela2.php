<?php
session_start();  // Inicia a sessão para capturar os dados
include('../../../../conexões/conexao.php');

// Captura o ID da ficha na sessão
if (isset($_SESSION['idFichaTraumatoOrtopedica'])) {
    $idFichaTraumatoOrtopedica = $_SESSION['idFichaTraumatoOrtopedica'];
} else {
    die("ID da ficha não encontrado.");
}

// Verifica se o formulário foi enviado (POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $segmento1 = htmlspecialchars($_POST['segmento1'] ?? '');
    $pontoRef1 = htmlspecialchars($_POST['pontoRef1'] ?? '');
    $cm_1 = htmlspecialchars($_POST['cm_1'] ?? '');
    $esquerda1 = htmlspecialchars($_POST['esquerda1'] ?? '');
    $direita1 = htmlspecialchars($_POST['direita1'] ?? '');
    $data1 = htmlspecialchars($_POST['data1'] ?? '');
    $segmento2 = htmlspecialchars($_POST['segmento2'] ?? '');
    $pontoRef2 = htmlspecialchars($_POST['pontoRef2'] ?? '');
    $cm_2 = htmlspecialchars($_POST['cm_2'] ?? '');
    $data2 = htmlspecialchars($_POST['data2'] ?? '');
    $esquerdo2 = htmlspecialchars($_POST['esquerdo2'] ?? '');
    $direito2 = htmlspecialchars($_POST['direito2'] ?? '');
    $discrepancia_aparente_esquerdo_1 = htmlspecialchars($_POST['discrepancia_aparente_esquerdo_1'] ?? '');
    $discrepancia_aparente_direito_1 = htmlspecialchars($_POST['discrepancia_aparente_direito_1'] ?? '');
    $discrepancia_real_esquerdo_1 = htmlspecialchars($_POST['discrepancia_real_esquerdo_1'] ?? '');
    $discrepancia_real_direito_1 = htmlspecialchars($_POST['discrepancia_real_direito_1'] ?? '');
    $testeGaleazzi = htmlspecialchars($_POST['testeGaleazzi'] ?? '');
    $dataGonio = htmlspecialchars($_POST['dataGonio'] ?? '');

    $ombro_flexao_esq = htmlspecialchars($_POST['ombro_flexao_esq'] ?? '');
    $ombro_flexao_dir = htmlspecialchars($_POST['ombro_flexao_dir'] ?? '');
    $ombro_extensao_esq = htmlspecialchars($_POST['ombro_extensao_esq'] ?? '');
    $ombro_extensao_dir = htmlspecialchars($_POST['ombro_extensao_dir'] ?? '');
    $ombro_aducao_esq = htmlspecialchars($_POST['ombro_aducao_esq'] ?? '');
    $ombro_aducao_dir = htmlspecialchars($_POST['ombro_aducao_dir'] ?? '');
    $ombro_abducao_esq = htmlspecialchars($_POST['ombro_abducao_esq'] ?? '');
    $ombro_abducao_dir = htmlspecialchars($_POST['ombro_abducao_dir'] ?? '');
    $ombro_rotacao_interna_esq = htmlspecialchars($_POST['ombro_rotacao_interna_esq'] ?? '');
    $ombro_rotacao_interna_dir = htmlspecialchars($_POST['ombro_rotacao_interna_dir'] ?? '');
    $ombro_rotacao_externa_esq = htmlspecialchars($_POST['ombro_rotacao_externa_esq'] ?? '');
    $ombro_rotacao_externa_dir = htmlspecialchars($_POST['ombro_rotacao_externa_dir'] ?? '');

    $cotovelo_flexao_esq = htmlspecialchars($_POST['cotovelo_flexao_esq'] ?? '');
    $cotovelo_flexao_dir = htmlspecialchars($_POST['cotovelo_flexao_dir'] ?? '');
    $cotovelo_extensao_esq = htmlspecialchars($_POST['cotovelo_extensao_esq'] ?? '');
    $cotovelo_extensao_dir = htmlspecialchars($_POST['cotovelo_extensao_dir'] ?? '');

    $radiulnar_pronacao_esq = htmlspecialchars($_POST['radiulnar_pronacao_esq'] ?? '');
    $radiulnar_pronacao_dir = htmlspecialchars($_POST['radiulnar_pronacao_dir'] ?? '');
    $radiulnar_supinacao_esq = htmlspecialchars($_POST['radiulnar_supinacao_esq'] ?? '');
    $radiulnar_supinacao_dir = htmlspecialchars($_POST['radiulnar_supinacao_dir'] ?? '');

    $punho_flexao_esq = htmlspecialchars($_POST['punho_flexao_esq'] ?? '');
    $punho_flexao_dir = htmlspecialchars($_POST['punho_flexao_dir'] ?? '');
    $punho_extensao_esq = htmlspecialchars($_POST['punho_extensao_esq'] ?? '');
    $punho_extensao_dir = htmlspecialchars($_POST['punho_extensao_dir'] ?? '');
    $punho_desvio_esq = htmlspecialchars($_POST['punho_desvio_esq'] ?? '');
    $punho_desvio_dir = htmlspecialchars($_POST['punho_desvio_dir'] ?? '');
    $punho_radial_esq = htmlspecialchars($_POST['punho_radial_esq'] ?? '');
    $punho_radial_dir = htmlspecialchars($_POST['punho_radial_dir'] ?? '');

    $cmc_polegar_flexao_esq = htmlspecialchars($_POST['cmc_polegar_flexao_esq'] ?? '');
    $cmc_polegar_flexao_dir = htmlspecialchars($_POST['cmc_polegar_flexao_dir'] ?? '');
    $cmc_polegar_extensao_esq = htmlspecialchars($_POST['cmc_polegar_extensao_esq'] ?? '');
    $cmc_polegar_extensao_dir = htmlspecialchars($_POST['cmc_polegar_extensao_dir'] ?? '');
    $cmc_polegar_abducao_esq = htmlspecialchars($_POST['cmc_polegar_abducao_esq'] ?? '');
    $cmc_polegar_abducao_dir = htmlspecialchars($_POST['cmc_polegar_abducao_dir'] ?? '');

    $mcf_flexao_esq = htmlspecialchars($_POST['mcf_flexao_esq'] ?? '');
    $mcf_flexao_dir = htmlspecialchars($_POST['mcf_flexao_dir'] ?? '');
    $mcf_extensao_esq = htmlspecialchars($_POST['mcf_extensao_esq'] ?? '');
    $mcf_extensao_dir = htmlspecialchars($_POST['mcf_extensao_dir'] ?? '');
    $mcf_abducao_esq = htmlspecialchars($_POST['mcf_abducao_esq'] ?? '');
    $mcf_abducao_dir = htmlspecialchars($_POST['mcf_abducao_dir'] ?? '');
    $mcf_aducao_esq = htmlspecialchars($_POST['mcf_aducao_esq'] ?? '');
    $mcf_aducao_dir = htmlspecialchars($_POST['mcf_aducao_dir'] ?? '');

    $interfalangicas_flexao_esq = htmlspecialchars($_POST['interfalangicas_flexao_esq'] ?? '');
    $interfalangicas_flexao_dir = htmlspecialchars($_POST['interfalangicas_flexao_dir'] ?? '');
    $interfalangicas_extensao_esq = htmlspecialchars($_POST['interfalangicas_extensao_esq'] ?? '');
    $interfalangicas_extensao_dir = htmlspecialchars($_POST['interfalangicas_extensao_dir'] ?? '');

    $quadril_flexao_esq = htmlspecialchars($_POST['quadril_flexao_esq'] ?? '');
    $quadril_flexao_dir = htmlspecialchars($_POST['quadril_flexao_dir'] ?? '');
    $quadril_extensao_esq = htmlspecialchars($_POST['quadril_extensao_esq'] ?? '');
    $quadril_extensao_dir = htmlspecialchars($_POST['quadril_extensao_dir'] ?? '');
    $quadril_abducao_esq = htmlspecialchars($_POST['quadril_abducao_esq'] ?? '');
    $quadril_abducao_dir = htmlspecialchars($_POST['quadril_abducao_dir'] ?? '');
    $quadril_aducao_esq = htmlspecialchars($_POST['quadril_aducao_esq'] ?? '');
    $quadril_aducao_dir = htmlspecialchars($_POST['quadril_aducao_dir'] ?? '');
    $quadril_rotacao_interna_esq = htmlspecialchars($_POST['quadril_rotacao_interna_esq'] ?? '');
    $quadril_rotacao_interna_dir = htmlspecialchars($_POST['quadril_rotacao_interna_dir'] ?? '');
    $quadril_rotacao_externa_esq = htmlspecialchars($_POST['quadril_rotacao_externa_esq'] ?? '');
    $quadril_rotacao_externa_dir = htmlspecialchars($_POST['quadril_rotacao_externa_dir'] ?? '');

    $joelho_flexao_esq = htmlspecialchars($_POST['joelho_flexao_esq'] ?? '');
    $joelho_flexao_dir = htmlspecialchars($_POST['joelho_flexao_dir'] ?? '');
    $joelho_extensao_esq = htmlspecialchars($_POST['joelho_extensao_esq'] ?? '');
    $joelho_extensao_dir = htmlspecialchars($_POST['joelho_extensao_dir'] ?? '');

    $tornozelo_dorsiflexao_esq = htmlspecialchars($_POST['tornozelo_dorsiflexao_esq'] ?? '');
    $tornozelo_dorsiflexao_dir = htmlspecialchars($_POST['tornozelo_dorsiflexao_dir'] ?? '');
    $tornozelo_plantarflexao_esq = htmlspecialchars($_POST['tornozelo_plantarflexao_esq'] ?? '');
    $tornozelo_plantarflexao_dir = htmlspecialchars($_POST['tornozelo_plantarflexao_dir'] ?? '');

    $subtalar_inversao_esq = htmlspecialchars($_POST['subtalar_inversao_esq'] ?? '');
    $subtalar_inversao_dir = htmlspecialchars($_POST['subtalar_inversao_dir'] ?? '');
    $subtalar_aversao_esq = htmlspecialchars($_POST['subtalar_aversao_esq'] ?? '');
    $subtalar_aversao_dir = htmlspecialchars($_POST['subtalar_aversao_dir'] ?? '');

    $mtf_flexao_i_dedo_esq = htmlspecialchars($_POST['mtf_flexao_i_dedo_esq'] ?? '');
    $mtf_flexao_i_dedo_dir = htmlspecialchars($_POST['mtf_flexao_i_dedo_dir'] ?? '');
    $mtf_il_v_dedo_esq = htmlspecialchars($_POST['mtf_il_v_dedo_esq'] ?? '');
    $mtf_il_v_dedo_dir = htmlspecialchars($_POST['mtf_il_v_dedo_dir'] ?? '');
    $mtf_extensao_i_dedo_esq = htmlspecialchars($_POST['mtf_extensao_i_dedo_esq'] ?? '');
    $mtf_extensao_i_dedo_dir = htmlspecialchars($_POST['mtf_extensao_i_dedo_dir'] ?? '');
    $mtf_il_v_dedo_2_esq = htmlspecialchars($_POST['mtf_il_v_dedo_2_esq'] ?? '');
    $mtf_il_v_dedo_2_dir = htmlspecialchars($_POST['mtf_il_v_dedo_2_dir'] ?? '');
    $if_flexao_if_i_dedo_esq = htmlspecialchars($_POST['if_flexao_if_i_dedo_esq'] ?? '');
    $if_flexao_if_i_dedo_dir = htmlspecialchars($_POST['if_flexao_if_i_dedo_dir'] ?? '');
    $ifp_ii_v_dedo_esq = htmlspecialchars($_POST['ifp_ii_v_dedo_esq'] ?? '');
    $ifp_ii_v_dedo_dir = htmlspecialchars($_POST['ifp_ii_v_dedo_dir'] ?? '');
    $ifd_ii_v_dedo_esq = htmlspecialchars($_POST['ifd_ii_v_dedo_esq'] ?? '');
    $ifd_ii_v_dedo_dir = htmlspecialchars($_POST['ifd_ii_v_dedo_dir'] ?? '');

    $col_cervical_flexao_esq = htmlspecialchars($_POST['col_cervical_flexao_esq'] ?? '');
    $col_cervical_flexao_dir = htmlspecialchars($_POST['col_cervical_flexao_dir'] ?? '');
    $col_cervical_extensao_esq = htmlspecialchars($_POST['col_cervical_extensao_esq'] ?? '');
    $col_cervical_extensao_dir = htmlspecialchars($_POST['col_cervical_extensao_dir'] ?? '');
    $col_cervical_flexao_lateral_esq = htmlspecialchars($_POST['col_cervical_flexao_lateral_esq'] ?? '');
    $col_cervical_flexao_lateral_dir = htmlspecialchars($_POST['col_cervical_flexao_lateral_dir'] ?? '');
    $col_cervical_rotacao_esq = htmlspecialchars($_POST['col_cervical_rotacao_esq'] ?? '');
    $col_cervical_rotacao_dir = htmlspecialchars($_POST['col_cervical_rotacao_dir'] ?? '');

    $col_lombar_flexao_esq = htmlspecialchars($_POST['col_lombar_flexao_esq'] ?? '');
    $col_lombar_flexao_dir = htmlspecialchars($_POST['col_lombar_flexao_dir'] ?? '');
    $col_lombar_extensao_esq = htmlspecialchars($_POST['col_lombar_extensao_esq'] ?? '');
    $col_lombar_extensao_dir = htmlspecialchars($_POST['col_lombar_extensao_dir'] ?? '');
    $col_lombar_flexao_lateral_esq = htmlspecialchars($_POST['col_lombar_flexao_lateral_esq'] ?? '');
    $col_lombar_flexao_lateral_dir = htmlspecialchars($_POST['col_lombar_flexao_lateral_dir'] ?? '');
    $col_lombar_rotacao_esq = htmlspecialchars($_POST['col_lombar_rotacao_esq'] ?? '');
    $col_lombar_rotacao_dir = htmlspecialchars($_POST['col_lombar_rotacao_dir'] ?? '');

    $med_valgo_joelhos_esq = htmlspecialchars($_POST['med_valgo_joelhos_esq'] ?? '');
    $med_valgo_joelhos_dir = htmlspecialchars($_POST['med_valgo_joelhos_dir'] ?? '');
    $med_varo_joelhos_esq = htmlspecialchars($_POST['med_varo_joelhos_esq'] ?? '');
    $med_varo_joelhos_dir = htmlspecialchars($_POST['med_varo_joelhos_dir'] ?? '');
    $med_recurvado_joelhos_esq = htmlspecialchars($_POST['med_recurvado_joelhos_esq'] ?? '');
    $med_recurvado_joelhos_dir = htmlspecialchars($_POST['med_recurvado_joelhos_dir'] ?? '');
    $med_valgo_cotovelo_esq = htmlspecialchars($_POST['med_valgo_cotovelo_esq'] ?? '');
    $med_valgo_cotovelo_dir = htmlspecialchars($_POST['med_valgo_cotovelo_dir'] ?? '');
    $med_varo_cotovelo_esq = htmlspecialchars($_POST['med_varo_cotovelo_esq'] ?? '');
    $med_varo_cotovelo_dir = htmlspecialchars($_POST['med_varo_cotovelo_dir'] ?? '');
    $med_valgo_retrope_esq = htmlspecialchars($_POST['med_valgo_retrope_esq'] ?? '');
    $med_valgo_retrope_dir = htmlspecialchars($_POST['med_valgo_retrope_dir'] ?? '');
    $med_varo_retrope_esq = htmlspecialchars($_POST['med_varo_retrope_esq'] ?? '');
    $med_varo_retrope_dir = htmlspecialchars($_POST['med_varo_retrope_dir'] ?? '');
    $med_hallux_valgo_esq = htmlspecialchars($_POST['med_hallux_valgo_esq'] ?? '');
    $med_hallux_valgo_dir = htmlspecialchars($_POST['med_hallux_valgo_dir'] ?? '');

    $flex_indice_schober_esq = htmlspecialchars($_POST['flex_indice_schober_esq'] ?? '');
    $flex_indice_schober_dir = htmlspecialchars($_POST['flex_indice_schober_dir'] ?? '');
    $flex_indice_stibor_esq = htmlspecialchars($_POST['flex_indice_stibor_esq'] ?? '');
    $flex_indice_stibor_dir = htmlspecialchars($_POST['flex_indice_stibor_dir'] ?? '');
    $flex_iii_dedo_solo_anterior_esq = htmlspecialchars($_POST['flex_iii_dedo_solo_anterior_esq'] ?? '');
    $flex_iii_dedo_solo_anterior_dir = htmlspecialchars($_POST['flex_iii_dedo_solo_anterior_dir'] ?? '');

    $teste_thomas_1 = htmlspecialchars($_POST['teste_thomas_1'] ?? '');
    $opcao1 = htmlspecialchars($_POST['opcao1'] ?? '');
    $teste_thomas_2 = htmlspecialchars($_POST['teste_thomas_2'] ?? '');
    $opcao2 = htmlspecialchars($_POST['opcao2'] ?? '');
    $teste_thomas_modificado_1 = htmlspecialchars($_POST['teste_thomas_modificado_1'] ?? '');
    $opcao3 = htmlspecialchars($_POST['opcao3'] ?? '');
    $teste_thomas_modificado_2 = htmlspecialchars($_POST['teste_thomas_modificado_2'] ?? '');
    $opcao4 = htmlspecialchars($_POST['opcao4'] ?? '');
    $teste_ober_1 = htmlspecialchars($_POST['teste_ober_1'] ?? '');
    $opcao5 = htmlspecialchars($_POST['opcao5'] ?? '');
    $teste_ober_2 = htmlspecialchars($_POST['teste_ober_2'] ?? '');
    $opcao6 = htmlspecialchars($_POST['opcao6'] ?? '');
    $teste_ely_1 = htmlspecialchars($_POST['teste_ely_1'] ?? '');
    $opcao7 = htmlspecialchars($_POST['opcao7'] ?? '');
    $teste_ely_2 = htmlspecialchars($_POST['teste_ely_2'] ?? '');
    $opcao8 = htmlspecialchars($_POST['opcao8'] ?? '');
    $teste_angulo_popliteo_1 = htmlspecialchars($_POST['teste_angulo_popliteo_1'] ?? '');
    $opcao9 = htmlspecialchars($_POST['opcao9'] ?? '');
    $teste_angulo_popliteo_2 = htmlspecialchars($_POST['teste_angulo_popliteo_2'] ?? '');
    $opcao10 = htmlspecialchars($_POST['opcao10'] ?? '');
    $outros = htmlspecialchars($_POST['outros'] ?? '');
    
        // Sua consulta INSERT com os valores fixos
        $query1 = "INSERT INTO fichatraumatoortopédica2 (
            idFichaTraumatoOrtopédica,
            segmento1,
            pontoRef1,
            cm_1,
            esquerda1,
            direita1,
            data1,
            segmento2,
            pontoRef2,
            cm_2,
            data2,
            esquerdo2,
            direito2,
            discrepancia_aparente_esquerdo_1,
            discrepancia_aparente_direito_1,
            discrepancia_real_esquerdo_1,
            discrepancia_real_direito_1,
            testeGaleazzi,
            dataGonio,
            ombro_flexao_esq,
            ombro_flexao_dir,
            ombro_extensao_esq,
            ombro_extensao_dir,
            ombro_aducao_esq,
            ombro_aducao_dir,
            ombro_abducao_esq,
            ombro_abducao_dir,
            ombro_rotacao_interna_esq,
            ombro_rotacao_interna_dir,
            ombro_rotacao_externa_esq,
            ombro_rotacao_externa_dir,
            cotovelo_flexao_esq,
            cotovelo_flexao_dir,
            cotovelo_extensao_esq,
            cotovelo_extensao_dir,
            radiulnar_pronacao_esq,
            radiulnar_pronacao_dir,
            radiulnar_supinacao_esq,
            radiulnar_supinacao_dir,
            punho_flexao_esq,
            punho_flexao_dir,
            punho_extensao_esq,
            punho_extensao_dir,
            punho_desvio_esq,
            punho_desvio_dir,
            punho_radial_esq,
            punho_radial_dir,
            cmc_polegar_flexao_esq,
            cmc_polegar_flexao_dir,
            cmc_polegar_extensao_esq,
            cmc_polegar_extensao_dir,
            cmc_polegar_abducao_esq,
            cmc_polegar_abducao_dir,
            mcf_flexao_esq,
            mcf_flexao_dir,
            mcf_extensao_esq,
            mcf_extensao_dir,
            mcf_abducao_esq,
            mcf_abducao_dir,
            mcf_aducao_esq,
            mcf_aducao_dir,
            interfalangicas_flexao_esq,
            interfalangicas_flexao_dir,
            interfalangicas_extensao_esq,
            interfalangicas_extensao_dir,
            quadril_flexao_esq,
            quadril_flexao_dir,
            quadril_extensao_esq,
            quadril_extensao_dir,
            quadril_abducao_esq,
            quadril_abducao_dir,
            quadril_aducao_esq,
            quadril_aducao_dir,
            quadril_rotacao_interna_esq,
            quadril_rotacao_interna_dir,
            quadril_rotacao_externa_esq,
            quadril_rotacao_externa_dir,
            joelho_flexao_esq,
            joelho_flexao_dir,
            joelho_extensao_esq,
            joelho_extensao_dir,
            tornozelo_dorsiflexao_esq,
            tornozelo_dorsiflexao_dir,
            tornozelo_plantarflexao_esq,
            tornozelo_plantarflexao_dir,
            subtalar_inversao_esq,
            subtalar_inversao_dir,
            subtalar_aversao_esq,
            subtalar_aversao_dir,
            mtf_flexao_i_dedo_esq,
            mtf_flexao_i_dedo_dir,
            mtf_il_v_dedo_esq,
            mtf_il_v_dedo_dir,
            mtf_extensao_i_dedo_esq,
            mtf_extensao_i_dedo_dir,
            mtf_il_v_dedo_2_esq,
            mtf_il_v_dedo_2_dir,
            if_flexao_if_i_dedo_esq,
            if_flexao_if_i_dedo_dir,
            ifp_ii_v_dedo_esq,
            ifp_ii_v_dedo_dir,
            ifd_ii_v_dedo_esq,
            ifd_ii_v_dedo_dir,
            col_cervical_flexao_esq,
            col_cervical_flexao_dir,
            col_cervical_extensao_esq,
            col_cervical_extensao_dir,
            col_cervical_flexao_lateral_esq,
            col_cervical_flexao_lateral_dir,
            col_cervical_rotacao_esq,
            col_cervical_rotacao_dir,
            col_lombar_flexao_esq,
            col_lombar_flexao_dir,
            col_lombar_extensao_esq,
            col_lombar_extensao_dir,
            col_lombar_flexao_lateral_esq,
            col_lombar_flexao_lateral_dir,
            col_lombar_rotacao_esq,
            col_lombar_rotacao_dir,
            med_valgo_joelhos_esq,
            med_valgo_joelhos_dir,
            med_varo_joelhos_esq,
            med_varo_joelhos_dir,
            med_recurvado_joelhos_esq,
            med_recurvado_joelhos_dir,
            med_valgo_cotovelo_esq,
            med_valgo_cotovelo_dir,
            med_varo_cotovelo_esq,
            med_varo_cotovelo_dir,
            med_valgo_retrope_esq,
            med_valgo_retrope_dir,
            med_varo_retrope_esq,
            med_varo_retrope_dir,
            med_hallux_valgo_esq,
            med_hallux_valgo_dir,
            flex_indice_schober_esq,
            flex_indice_schober_dir,
            flex_indice_stibor_esq,
            flex_indice_stibor_dir,
            flex_iii_dedo_solo_anterior_esq,
            flex_iii_dedo_solo_anterior_dir,
            teste_thomas_1,
            opcao1,
            teste_thomas_2,
            opcao2,
            teste_thomas_modificado_1,
            opcao3,
            teste_thomas_modificado_2,
            opcao4,
            teste_ober_1,
            opcao5,
            teste_ober_2,
            opcao6,
            teste_ely_1,
            opcao7,
            teste_ely_2,
            opcao8,
            teste_angulo_popliteo_1,
            opcao9,
            teste_angulo_popliteo_2,
            opcao10,
            outros
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        
        // Preparar a consulta
        $stmt1 = $mysqli->prepare($query1);
        if (!$stmt1) {
            die("Erro ao preparar a consulta: " . $mysqli->error);
        }
    
        // Bind de parâmetros
        $stmt1->bind_param(
            'isssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss',
            $idFichaTraumatoOrtopedica,
            $segmento1, $pontoRef1, $cm_1, $esquerda1, $direita1, $data1, $segmento2, 
            $pontoRef2, $cm_2, $data2, $esquerdo2, $direito2, $discrepancia_aparente_esquerdo_1, 
            $discrepancia_aparente_direito_1, $discrepancia_real_esquerdo_1, $discrepancia_real_direito_1, 
            $testeGaleazzi, $dataGonio, $ombro_flexao_esq, $ombro_flexao_dir, $ombro_extensao_esq,
            $ombro_extensao_dir, $ombro_aducao_esq, $ombro_aducao_dir,
            $ombro_abducao_esq, $ombro_abducao_dir, $ombro_rotacao_interna_esq,
            $ombro_rotacao_interna_dir, $ombro_rotacao_externa_esq, $ombro_rotacao_externa_dir,
            $cotovelo_flexao_esq, $cotovelo_flexao_dir, $cotovelo_extensao_esq,
            $cotovelo_extensao_dir, $radiulnar_pronacao_esq, $radiulnar_pronacao_dir,
            $radiulnar_supinacao_esq, $radiulnar_supinacao_dir, $punho_flexao_esq,
            $punho_flexao_dir, $punho_extensao_esq, $punho_extensao_dir, $punho_desvio_esq,
            $punho_desvio_dir, $punho_radial_esq, $punho_radial_dir, $cmc_polegar_flexao_esq,
            $cmc_polegar_flexao_dir, $cmc_polegar_extensao_esq, $cmc_polegar_extensao_dir,
            $cmc_polegar_abducao_esq, $cmc_polegar_abducao_dir, $mcf_flexao_esq,
            $mcf_flexao_dir, $mcf_extensao_esq, $mcf_extensao_dir, $mcf_abducao_esq,
            $mcf_abducao_dir, $mcf_aducao_esq, $mcf_aducao_dir, $interfalangicas_flexao_esq,
            $interfalangicas_flexao_dir, $interfalangicas_extensao_esq, $interfalangicas_extensao_dir,
            $quadril_flexao_esq, $quadril_flexao_dir, $quadril_extensao_esq, $quadril_extensao_dir,
            $quadril_abducao_esq, $quadril_abducao_dir, $quadril_aducao_esq, $quadril_aducao_dir,
            $quadril_rotacao_interna_esq, $quadril_rotacao_interna_dir, $quadril_rotacao_externa_esq,
            $quadril_rotacao_externa_dir, $joelho_flexao_esq, $joelho_flexao_dir,
            $joelho_extensao_esq, $joelho_extensao_dir, $tornozelo_dorsiflexao_esq,
            $tornozelo_dorsiflexao_dir, $tornozelo_plantarflexao_esq, $tornozelo_plantarflexao_dir,
            $subtalar_inversao_esq, $subtalar_inversao_dir, $subtalar_aversao_esq, $subtalar_aversao_dir,
            $mtf_flexao_i_dedo_esq, $mtf_flexao_i_dedo_dir, $mtf_il_v_dedo_esq, $mtf_il_v_dedo_dir,
            $mtf_extensao_i_dedo_esq, $mtf_extensao_i_dedo_dir, $mtf_il_v_dedo_2_esq, $mtf_il_v_dedo_2_dir,
            $if_flexao_if_i_dedo_esq, $if_flexao_if_i_dedo_dir, $ifp_ii_v_dedo_esq, $ifp_ii_v_dedo_dir,
            $ifd_ii_v_dedo_esq, $ifd_ii_v_dedo_dir, $col_cervical_flexao_esq, $col_cervical_flexao_dir,
            $col_cervical_extensao_esq, $col_cervical_extensao_dir, $col_cervical_flexao_lateral_esq,
            $col_cervical_flexao_lateral_dir, $col_cervical_rotacao_esq, $col_cervical_rotacao_dir,
            $col_lombar_flexao_esq, $col_lombar_flexao_dir, $col_lombar_extensao_esq, $col_lombar_extensao_dir,
            $col_lombar_flexao_lateral_esq, $col_lombar_flexao_lateral_dir, $col_lombar_rotacao_esq,
            $col_lombar_rotacao_dir, $med_valgo_joelhos_esq, $med_valgo_joelhos_dir, $med_varo_joelhos_esq,
            $med_varo_joelhos_dir, $med_recurvado_joelhos_esq, $med_recurvado_joelhos_dir, $med_valgo_cotovelo_esq,
            $med_valgo_cotovelo_dir, $med_varo_cotovelo_esq, $med_varo_cotovelo_dir, $med_valgo_retrope_esq,
            $med_valgo_retrope_dir, $med_varo_retrope_esq, $med_varo_retrope_dir, $med_hallux_valgo_esq,
            $med_hallux_valgo_dir, $flex_indice_schober_esq, $flex_indice_schober_dir, $flex_indice_stibor_esq,
            $flex_indice_stibor_dir, $flex_iii_dedo_solo_anterior_esq, $flex_iii_dedo_solo_anterior_dir,
            $teste_thomas_1, $opcao1, $teste_thomas_2, $opcao2, $teste_thomas_modificado_1,
            $opcao3, $teste_thomas_modificado_2, $opcao4, $teste_ober_1, $opcao5, $teste_ober_2,
            $opcao6, $teste_ely_1, $opcao7, $teste_ely_2, $opcao8, $teste_angulo_popliteo_1,
            $opcao9, $teste_angulo_popliteo_2, $opcao10, $outros
        );
        
        
        // Execute a consulta
        $stmt1->execute();
        if ($stmt1->affected_rows > 0) {
            header("Location: ../tela 3/tela3.php");
        } else {
            echo "Erro ao inserir o registro.";
        }
        
        $stmt1->close();
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha de Avaliação de Fisioterapia Traumato-Ortopédica</title>
    <link rel="stylesheet" href="Estilos/Styles.css">

</head>

<body>
    <form action="" method="POST">
    <input type="hidden" name="consultas_idConsultas" value="1">
    <input type="hidden" name="consultas_paciente_idPaciente" value="1">
        <div class="container">
            <h3>Perimetria</h3>
            <table class="tableS" border="1">
                <tr>
                    <th class="titulo-segmento" colspan="5">Segmento:
                        <input type="text" name="segmento1" class="input-style1">
                    </th>

                </tr>
                <tr>
                    <th colspan=5 class="titulo-ponto">Ponto de Referência: <input type="text" name="pontoRef1" class="input-style1"></th>

                </tr>
                <tr>
                    <th rowspan="2">Centímetros da Medida</th>
                    <th colspan="2">Data: <input type="text" name="data1" class="input-style1"></th>
                    <th colspan="2">Data: <input type="text" class="input-style1"></th>
                </tr>
                <tr>
                    <th>Esquerdo</th>
                    <th>Direito</th>
                    <th>Esquerdo</th>
                    <th>Direito</th>
                </tr>
                <tr>
                    <td><input type="text" name="cm1" class="input-style1"></td>
                    <td><input type="text" name="esquerda1" class="input-style1"></td>
                    <td><input type="text" name="direita1" class="input-style1"></td>
                    <td><input type="text" class="input-style1"></td>
                    <td><input type="text" class="input-style1"></td>
                </tr>
                <tr>
                    <td><input type="text" class="input-style1"></td>
                    <td><input type="text" class="input-style1"></td>
                    <td><input type="text" class="input-style1"></td>
                    <td><input type="text" class="input-style1"></td>
                    <td><input type="text" class="input-style1"></td>
                </tr>
                <tr>
                    <td><input type="text" class="input-style1"></td>
                    <td><input type="text" class="input-style1"></td>
                    <td><input type="text" class="input-style1"></td>
                    <td><input type="text" class="input-style1"></td>
                    <td><input type="text" class="input-style1"></td>
                </tr>
            </table>
            <br>

            <table class="tableS" border="1">
                <tr>
                    <th class="titulo-segmento" colspan="5">Segmento:
                        <input type="text" name="segmento2" class="input-style1">
                    </th>

                </tr>
                <tr>
                    <th colspan=5 class="titulo-ponto">Ponto de Referência: <input type="text" name="pontoRef2" class="input-style1"></th>

                </tr>
                <tr>
                    <th rowspan="2">Centímetros da Medida</th>
                    <th colspan="2">Data: <input type="text" name="data2" class="input-style1"></th>
                    <th colspan="2">Data: <input type="text" class="input-style1"></th>
                </tr>
                <tr>
                    <th>Esquerdo</th>
                    <th>Direito</th>
                    <th>Esquerdo</th>
                    <th>Direito</th>
                </tr>
                <tr>
                    <td><input type="text" name="cm2" class="input-style1"></td>
                    <td><input type="text" name="esquerdo2" class="input-style1"></td>
                    <td><input type="text" name="direito2" class="input-style1"></td>
                    <td><input type="text" class="input-style1"></td>
                    <td><input type="text" class="input-style1"></td>
                </tr>
                <tr>
                    <td><input type="text" class="input-style1"></td>
                    <td><input type="text" class="input-style1"></td>
                    <td><input type="text" class="input-style1"></td>
                    <td><input type="text" class="input-style1"></td>
                    <td><input type="text" class="input-style1"></td>
                </tr>
                <tr>
                    <td><input type="text" class="input-style1"></td>
                    <td><input type="text" class="input-style1"></td>
                    <td><input type="text" class="input-style1"></td>
                    <td><input type="text" class="input-style1"></td>
                    <td><input type="text" class="input-style1"></td>
                </tr>
            </table>

            <br><br>
            <h3>Comprimento de membros inferiores</h3>

            <table class="tableS" border="1">
                <thead>
                    <tr>
                        <th colspan="2">Discrepância aparente</th>
                        <th colspan="2">Discrepância real</th>
                    </tr>
                    <tr>
                        <th>Esquerdo</th>
                        <th>Direito</th>
                        <th>Esquerdo</th>
                        <th>Direito</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="discrepancia_aparente_esquerdo_1" class="input-style1"></td>
                        <td><input type="text" name="discrepancia_aparente_direito_1" class="input-style1"></td>
                        <td><input type="text" name="discrepancia_real_esquerdo_1" class="input-style1"></td>
                        <td><input type="text" name="discrepancia_real_direito_1" class="input-style1"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <br>
            <div class="opcoes-dor">
                <label class="label-bold">Teste de Galeazzi:</label><br>
                <label><input type="radio" name="testeGaleazzi" value="discrepancia-femur"> Discrepância fêmur</label>&nbsp
                <label><input type="radio" name="testeGaleazzi" value="discrepancia-tibia"> Discrepância tíbia</label>&nbsp
                <label><input type="radio" name="testeGaleazzi" value="esquerdo"> Esquerdo</label>&nbsp
                <label><input type="radio" name="testeGaleazzi" value="direito"> Direito</label>&nbsp
            </div>
            <br><br>

            <h3>Goniometria / Fleximetria</h3>

            <table class="tableS" border="1">
                <thead>
                    <tr>
                        <th rowspan="2" colspan="2">Articulação / Movimento</th>
                        <th colspan="2">Data: <input type="text" name="dataGonio" class="input-style1"></th>
                        <th colspan="2">Data: <input type="text" class="input-style1"></th>
                    </tr>
                    <tr>
                        <th>Esquerdo</th>
                        <th>Direito</th>
                        <th>Esquerdo</th>
                        <th>Direito</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <th rowspan="6">Ombro</th>
                        <th>Flexão (0 a 180°)</th>
                        <td><input type="text" name="ombro_flexao_esq" class="input-style1"></td>
                        <td><input type="text" name="ombro_flexao_dir" class="input-style1"></td>
                        <td><input type="text" name="" class="input-style1"></td>
                        <td><input type="text" name="" class="input-style1"></td>
                    </tr>

                    <tr>
                        <th>Extensão (0 a 45°)</th>
                        <td><input type="text" name="ombro_extensao_esq" class="input-style1"></td>
                        <td><input type="text" name="ombro_extensao_dir" class="input-style1"></td>
                        <td><input type="text" name="" class="input-style1"></td>
                        <td><input type="text" name="" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Adução (0 a 40°)</th>
                        <td><input type="text" name="ombro_aducao_esq" class="input-style1"></td>
                        <td><input type="text" name="ombro_aducao_dir" class="input-style1"></td>
                        <td><input type="text" name="" class="input-style1"></td>
                        <td><input type="text" name="" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Abdução (0 a 180°)</th>
                        <td><input type="text" name="ombro_abducao_esq" class="input-style1"></td>
                        <td><input type="text" name="ombro_abducao_dir" class="input-style1"></td>
                        <td><input type="text" name="" class="input-style1"></td>
                        <td><input type="text" name="" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Rotação Interna (0 a 90°)</th>
                        <td><input type="text" name="ombro_rotacao_interna_esq" class="input-style1"></td>
                        <td><input type="text" name="ombro_rotacao_interna_dir" class="input-style1"></td>
                        <td><input type="text" name="" class="input-style1"></td>
                        <td><input type="text" name="" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Rotação Externa (0 a 90°)</th>
                        <td><input type="text" name="ombro_rotacao_externa_esq" class="input-style1"></td>
                        <td><input type="text" name="ombro_rotacao_externa_dir" class="input-style1"></td>
                        <td><input type="text" name="" class="input-style1"></td>
                        <td><input type="text" name="" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th rowspan="3">Cotovelo</th>
                    </tr>
                    <tr>
                        <th>Flexão (0 a 145°)</th>
                        <td><input type="text" name="cotovelo_flexao_esq" class="input-style1"></td>
                        <td><input type="text" name="cotovelo_flexao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Extensão (145 a 0°)</th>
                        <td><input type="text" name="cotovelo_extensao_esq" class="input-style1"></td>
                        <td><input type="text" name="cotovelo_extensao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th rowspan="3">Radiulnar</th>
                    </tr>
                    <tr>
                        <th>Pronação (0 a 90°)</th>
                        <td><input type="text" name="radiulnar_pronacao_esq" class="input-style1"></td>
                        <td><input type="text" name="radiulnar_pronacao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Supinação (0 a 90°)</th>
                        <td><input type="text" name="radiulnar_supinacao_esq" class="input-style1"></td>
                        <td><input type="text" name="radiulnar_supinacao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>

                    <tr>
                        <th rowspan="5">Punho</th>
                    <tr>
                        <th>Flexão (0 a 90°)</th>
                        <td><input type="text" name="punho_flexao_esq" class="input-style1"></td>
                        <td><input type="text" name="punho_flexao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Extensão (0 a 70°)</th>
                        <td><input type="text" name="punho_extensao_esq" class="input-style1"></td>
                        <td><input type="text" name="punho_extensao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Desvio Ulnar (0 a 45°)</th>
                        <td><input type="text" name="punho_desvio_esq" class="input-style1"></td>
                        <td><input type="text" name="punho_desvio_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Desvio Radial (0 a 45°)</th>
                        <td><input type="text" name="punho_radial_esq" class="input-style1"></td>
                        <td><input type="text" name="punho_radial_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>

                    </tr>

                    <tr>
                        <th rowspan="4">CMC Polegar</th>
                    <tr>
                        <th>Flexão (0 a 15°)</th>
                        <td><input type="text" name="cmc_polegar_flexao_esq" class="input-style1"></td>
                        <td><input type="text" name="cmc_polegar_flexao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>

                    <tr>
                        <th>Abdução(0 a 15°)</th>
                        <td><input type="text" name="cmc_polegar_abducao_esq" class="input-style1"></td>
                        <td><input type="text" name="cmc_polegar_abducao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Extensão (0 a 70°)</th>
                        <td><input type="text" name="cmc_polegar_extensao_esq" class="input-style1"></td>
                        <td><input type="text" name="cmc_polegar_extensao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    </tr>
                    <tr>
                        <th rowspan="5">MCF</th>
                    <tr>
                        <th>Flexão (0 a 90°)</th>
                        <td><input type="text" name="mcf_flexao_esq" class="input-style1"></td>
                        <td><input type="text" name="mcf_flexao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Extensão (0 a 30°)</th>
                        <td><input type="text" name="mcf_extensao_esq" class="input-style1"></td>
                        <td><input type="text" name="mcf_extensao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Abdução (0 a 20°)</th>
                        <td><input type="text" name="mcf_abducao_esq" class="input-style1"></td>
                        <td><input type="text" name="mcf_abducao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Adução (0 a 20°)</th>
                        <td><input type="text" name="mcf_aducao_esq" class="input-style1"></td>
                        <td><input type="text" name="mcf_aducao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>


                    </tr>

                    <tr>
                        <th rowspan="3">Interfalângicas</th>
                    <tr>
                        <th>Flexão (0 a 110°)</th>
                        <td><input type="text" name="interfalangicas_flexao_esq" class="input-style1"></td>
                        <td><input type="text" name="interfalangicas_flexao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Extensão (0 a 20°)</th>
                        <td><input type="text" name="interfalangicas_extensao_esq" class="input-style1"></td>
                        <td><input type="text" name="interfalangicas_extensao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>

                    </tr>
                    <tr>
                        <th rowspan="7">Quadril</th>
                    <tr>
                        <th>Flexão (0 a 125°)</th>
                        <td><input type="text" name="quadril_flexao_esq" class="input-style1"></td>
                        <td><input type="text" name="quadril_flexao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Extensão (0 a 10°)</th>
                        <td><input type="text" name="quadril_extensao_esq" class="input-style1"></td>
                        <td><input type="text" name="quadril_extensao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Adução (0 a 15°)</th>
                        <td><input type="text" name="quadril_aducao_esq" class="input-style1"></td>
                        <td><input type="text" name="quadril_aducao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Abdução (0 a 45°)</th>
                        <td><input type="text" name="quadril_abducao_esq" class="input-style1"></td>
                        <td><input type="text" name="quadril_abducao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Rotação Interna (0 a 45°)</th>
                        <td><input type="text" name="quadril_rotacao_interna_esq" class="input-style1"></td>
                        <td><input type="text" name="quadril_rotacao_interna_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Rotação Externa (0 a 45°)</th>
                        <td><input type="text" name="quadril_rotacao_externa_esq" class="input-style1"></td>
                        <td><input type="text" name="quadril_rotacao_externa_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>

                    </tr>
                    <tr>
                        <th rowspan="3">Joelho</th>
                    <tr>
                        <th>Flexão (0 a 140°)</th>
                        <td><input type="text" name="joelho_flexao_esq" class="input-style1"></td>
                        <td><input type="text" name="joelho_flexao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Extensão (0°) ?</th>
                        <td><input type="text" name="joelho_extensao_esq" class="input-style1"></td>
                        <td><input type="text" name="joelho_extensao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>

                    </tr>
                    <tr>
                        <th rowspan="3">Tornozelo</th>
                    <tr>
                        <th>Dorsiflexão (0 a 20°)</th>
                        <td><input type="text" name="tornozelo_dorsiflexao_esq" class="input-style1"></td>
                        <td><input type="text" name="tornozelo_dorsiflexao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Flexão plantar (0 a 45°)</th>
                        <td><input type="text" name="tornozelo_plantarflexao_esq" class="input-style1"></td>
                        <td><input type="text" name="tornozelo_plantarflexao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>

                    </tr>
                    <tr>
                        <th rowspan="3">Subtalar</th>
                    <tr>
                        <th>Inversão (0 a 40°)</th>
                        <td><input type="text" name="subtalar_inversao_esq" class="input-style1"></td>
                        <td><input type="text" name="subtalar_inversao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Eversão (0 a 20°)</th>
                        <td><input type="text" name="subtalar_aversao_esq" class="input-style1"></td>
                        <td><input type="text" name="subtalar_aversao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>

                    </tr>
                    <tr>
                        <th rowspan="5">MTF</th>
                    <tr>
                        <th>Flexão I dedo (0 a 45°)</th>
                        <td><input type="text" name="mtf_flexao_i_dedo_esq" class="input-style1"></td>
                        <td><input type="text" name="mtf_flexao_i_dedo_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Il ao V dedo (0 a 40°)</th>
                        <td><input type="text" name="mtf_il_v_dedo_esq" class="input-style1"></td>
                        <td><input type="text" name="mtf_il_v_dedo_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Extensão I dedo (0 a 90°)</th>
                        <td><input type="text" name="mtf_extensao_i_dedo_esq" class="input-style1"></td>
                        <td><input type="text" name="mtf_extensao_i_dedo_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Il ao V dedo (0 a 45°)</th>
                        <td><input type="text" name="mtf_il_v_dedo_2_esq" class="input-style1"></td>
                        <td><input type="text" name="mtf_il_v_dedo_2_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>

                    </tr>
                    <tr>
                        <th rowspan="4">Interfalângicas</th>
                    <tr>
                        <th>Flexão IF I dedo (0 a 90°)</th>
                        <td><input type="text" name="if_flexao_if_i_dedo_esq" class="input-style1"></td>
                        <td><input type="text" name="if_flexao_if_i_dedo_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>IFP II ao V dedo (0 a 35°)</th>
                        <td><input type="text" name="ifp_ii_v_dedo_esq" class="input-style1"></td>
                        <td><input type="text" name="ifp_ii_v_dedo_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>IFD II ao V dedo (0 a 60°)</th>
                        <td><input type="text" name="ifd_ii_v_dedo_esq" class="input-style1"></td>
                        <td><input type="text" name="ifd_ii_v_dedo_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>

                    </tr>
                    <tr>
                        <th rowspan="5">Coluna Cervical</th>
                    <tr>
                        <th>Flexão (0 a 65°)</th>
                        <td><input type="text" name="col_cervical_flexao_esq" class="input-style1"></td>
                        <td><input type="text" name="col_cervical_flexao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Extensão (0 a 50°)</th>
                        <td><input type="text" name="col_cervical_extensao_esq" class="input-style1"></td>
                        <td><input type="text" name="col_cervical_extensao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Flexão Lateral (0 a 40°)</th>
                        <td><input type="text" name="col_cervical_flexao_lateral_esq" class="input-style1"></td>
                        <td><input type="text" name="col_cervical_flexao_lateral_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Rotação (0 a 65°)</th>
                        <td><input type="text" name="col_cervical_rotacao_esq" class="input-style1"></td>
                        <td><input type="text" name="col_cervical_rotacao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>


                    </tr>
                    <tr>
                        <th rowspan="5">Coluna Lombar</th>
                    </tr>
                    <tr>
                        <th>Flexão (0 a 95°)</th>
                        <td><input type="text" name="col_lombar_flexao_esq" class="input-style1"></td>
                        <td><input type="text" name="col_lombar_flexao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Extensão (0 a 35°)</th>
                        <td><input type="text" name="col_lombar_extensao_esq" class="input-style1"></td>
                        <td><input type="text" name="col_lombar_extensao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Flexão Lateral (0 a 40°)</th>
                        <td><input type="text" name="col_lombar_flexao_lateral_esq" class="input-style1"></td>
                        <td><input type="text" name="col_lombar_flexao_lateral_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Rotação (0 a 35°)</th>
                        <td><input type="text" name="col_lombar_rotacao_esq" class="input-style1"></td>
                        <td><input type="text" name="col_lombar_rotacao_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>

                    <tr>
                        <th rowspan="9">Medidas Especiais</th>
                    <tr>
                        <th>Valgo de Joelhos</th>
                        <td><input type="text" name="med_valgo_joelhos_esq" class="input-style1"></td>
                        <td><input type="text" name="med_valgo_joelhos_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Varo de Joelhos</th>
                        <td><input type="text" name="med_varo_joelhos_esq" class="input-style1"></td>
                        <td><input type="text" name="med_varo_joelhos_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Recurvado de Joelhos</th>
                        <td><input type="text" name="med_recurvado_joelhos_esq" class="input-style1"></td>
                        <td><input type="text" name="med_recurvado_joelhos_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Valgo de Cotovelo</th>
                        <td><input type="text" name="med_valgo_cotovelo_esq" class="input-style1"></td>
                        <td><input type="text" name="med_valgo_cotovelo_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Varo de Cotovelo</th>
                        <td><input type="text" name="med_varo_cotovelo_esq" class="input-style1"></td>
                        <td><input type="text" name="med_varo_cotovelo_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Valgo de Retropé</th>
                        <td><input type="text" name="med_valgo_retrope_esq" class="input-style1"></td>
                        <td><input type="text" name="med_valgo_retrope_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Varo de Retropé</th>
                        <td><input type="text" name="med_varo_retrope_esq" class="input-style1"></td>
                        <td><input type="text" name="med_varo_retrope_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Hálux valgo</th>
                        <td><input type="text" name="med_hallux_valgo_esq" class="input-style1"></td>
                        <td><input type="text" name="med_hallux_valgo_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>

                    </tr>
                    <tr>
                        <th rowspan="4">Flexibilidade</th>
                    <tr>
                        <th>Índice de Schober</th>
                        <td><input type="text" name="flex_indice_schober_esq" class="input-style1"></td>
                        <td><input type="text" name="flex_indice_schober_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>Índice de Stibor</th>
                        <td><input type="text" name="flex_indice_stibor_esq" class="input-style1"></td>
                        <td><input type="text" name="flex_indice_stibor_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>
                    <tr>
                        <th>III Dedo solo anterior</th>
                        <td><input type="text" name="flex_iii_dedo_solo_anterior_esq" class="input-style1"></td>
                        <td><input type="text" name="flex_iii_dedo_solo_anterior_dir" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                        <td><input type="text" class="input-style1"></td>
                    </tr>

                    </tr>
                </tbody>
            </table>
            <br><br>
            <h3>Teste de comprimento</h3>
            <br>
            <div>
                <label>Teste de Thomas:</label>
                <select class="select1" id="teste-thomas-1" name="teste_thomas_1">
                    <option value="" disabled selected>Selecione...</option>
                    <option value="esquerdo">Esquerdo</option>
                    <option value="direito">Direito</option>
                </select>
                <label class="label-radio">
                    <input type="radio" name="opcao1" value="positivo"> +
                </label>
                <label class="label-radio">
                    <input type="radio" name="opcao1" value="negativo"> -</label>
                <span style="padding-left: 2%;"></span>
                <select class="select1" id="teste-thomas-2" name="teste_thomas_2">
                    <option value="" disabled selected>Selecione...</option>
                    <option value="esquerdo">Esquerdo</option>
                    <option value="direito">Direito</option>
                </select>
                <label class="label-radio">
                    <input type="radio" name="opcao6" value="positivo"> +
                </label>
                <label class="label-radio">
                    <input type="radio" name="opcao6" value="negativo"> -</label>
            </div><br>

            <div>
                <label>Teste de Thomas modificado:</label>
                <select class="select1" id="teste-thomas-modificado-1" name="teste_thomas_modificado_1">
                    <option value="" disabled selected>Selecione...</option>
                    <option value="esquerdo">Esquerdo</option>
                    <option value="direito">Direito</option>
                </select>
                <label class="label-radio">
                    <input type="radio" name="opcao2" value="positivo"> +
                </label>
                <label class="label-radio">
                    <input type="radio" name="opcao2" value="negativo"> -</label>
                <span style="padding-left: 2%;"></span>
                <select class="select1" id="teste-thomas-modificado-2" name="teste_thomas_modificado_2">
                    <option value="" disabled selected>Selecione...</option>
                    <option value="esquerdo">Esquerdo</option>
                    <option value="direito">Direito</option>
                </select>
                <label class="label-radio">
                    <input type="radio" name="opcao7" value="positivo"> +
                </label>
                <label class="label-radio">
                    <input type="radio" name="opcao7" value="negativo"> -</label>
            </div><br>

            <div>
                <label>Teste de Ober:</label>
                <select class="select1" id="teste-ober-1" name="teste_ober_1">
                    <option value="" disabled selected>Selecione...</option>
                    <option value="esquerdo">Esquerdo</option>
                    <option value="direito">Direito</option>
                </select>
                <label class="label-radio">
                    <input type="radio" name="opcao3" value="positivo"> +
                </label>
                <label class="label-radio">
                    <input type="radio" name="opcao3" value="negativo"> -</label>
                <span style="padding-left: 2%;"></span>
                <select class="select1" id="teste-ober-2" name="teste_ober_2">
                    <option value="" disabled selected>Selecione...</option>
                    <option value="esquerdo">Esquerdo</option>
                    <option value="direito">Direito</option>
                </select>
                <label class="label-radio">
                    <input type="radio" name="opcao8" value="positivo"> +
                </label>
                <label class="label-radio">
                    <input type="radio" name="opcao8" value="negativo"> -</label>
            </div><br>

            <div>
                <label>Teste de Ely:</label>
                <select class="select1" id="teste-ely-1" name="teste_ely_1">
                    <option value="" disabled selected>Selecione...</option>
                    <option value="esquerdo">Esquerdo</option>
                    <option value="direito">Direito</option>
                </select>
                <label class="label-radio">
                    <input type="radio" name="opcao4" value="positivo"> +
                </label>
                <label class="label-radio">
                    <input type="radio" name="opcao4" value="negativo"> -</label>
                <span style="padding-left: 2%;"></span>
                <select class="select1" id="teste-ely-2" name="teste_ely_2">
                    <option value="" disabled selected>Selecione...</option>
                    <option value="esquerdo">Esquerdo</option>
                    <option value="direito">Direito</option>
                </select>
                <label class="label-radio">
                    <input type="radio" name="opcao9" value="positivo"> +
                </label>
                <label class="label-radio">
                    <input type="radio" name="opcao9" value="negativo"> -</label>
            </div><br>

            <div>
                <label>Teste do ângulo poplíteo:</label>
                <select class="select1" id="teste-angulo-popliteo-1" name="teste_angulo_popliteo_1">
                    <option value="" disabled selected>Selecione...</option>
                    <option value="esquerdo">Esquerdo</option>
                    <option value="direito">Direito</option>
                </select>
                <label class="label-radio">
                    <input type="radio" name="opcao5" value="positivo"> +
                </label>
                <label class="label-radio">
                    <input type="radio" name="opcao5" value="negativo"> -</label>
                <span style="padding-left: 2%;"></span>
                <select class="select1" id="teste-angulo-popliteo-2" name="teste_angulo_popliteo_2">
                    <option value="" disabled selected>Selecione...</option>
                    <option value="esquerdo">Esquerdo</option>
                    <option value="direito">Direito</option>
                </select>
                <label class="label-radio">
                    <input type="radio" name="opcao10" value="positivo"> +
                </label>
                <label class="label-radio">
                    <input type="radio" name="opcao10" value="negativo"> -</label>
            </div><br>

            <br><br>
            <div>
                <label for="queixa-principal">Outros:</label>
                <br><br>
                <textarea class="queixa" id="queixa-principal" name="outros"
                    placeholder="Digite aqui..."></textarea>
            </div>
            <br>
        </div>
        <div style="text-align: right;">
            <button class="styled-button" type="submit">Próxima página -></button>
        </div>
        </div>
    </form>
</body>

</html>