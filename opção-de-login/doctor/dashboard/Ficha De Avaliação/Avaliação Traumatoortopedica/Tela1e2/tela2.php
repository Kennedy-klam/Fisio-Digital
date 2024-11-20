<?php
// Verifica se o idPaciente foi passado na URL
if (isset($_GET['idPaciente'])) {
    $idPaciente = $_GET['idPaciente'];
    // Agora você pode usar $idPaciente conforme necessário
} else {
    // Caso o idPaciente não seja passado na URL
    echo "ID do paciente não fornecido.";
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
                iscrepancia_aparente_esquerdo_1	varchar(45)	utf8mb4_0900_ai_ci		Sim	NULL			Alterar Alterar	Eliminar Eliminar	
	15	discrepancia_aparente_direito_1	varchar(45)	utf8mb4_0900_ai_ci		Sim	NULL			Alterar Alterar	Eliminar Eliminar	
	16	discrepancia_real_esquerdo_1	varchar(45)	utf8mb4_0900_ai_ci		Sim	NULL			Alterar Alterar	Eliminar Eliminar	
	17	discrepancia_real_direito_1
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
            <button class="styled-button" type="button">Próxima página -></button>
        </div>
        </div>
    </form>
</body>

</html>