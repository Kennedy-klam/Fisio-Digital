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
    // Recebe os dados do formulário
    $escapula_protracao_C5_C7_D1 = $_POST['escapula_protracao_C5_C7_D1'];
    $escapula_protracao_C5_C7_E1 = $_POST['escapula_protracao_C5_C7_E1'];
    $escapula_elevacao_C3_C4_D1 = $_POST['escapula_elevacao_C3_C4_D1'];
    $escapula_elevacao_C3_C4_E1 = $_POST['escapula_elevacao_C3_C4_E1'];
    $escapula_retacao_C3_C4_D1 = $_POST['escapula_retacao_C3_C4_D1'];
    $escapula_retacao_C3_C4_E1 = $_POST['escapula_retacao_C3_C4_E1'];
    $escapula_depressao_C3_C4_D1 = $_POST['escapula_depressao_C3_C4_D1'];
    $escapula_depressao_C3_C4_E1 = $_POST['escapula_depressao_C3_C4_E1'];
    $escapula_retacao_C5_D1 = $_POST['escapula_retacao_C5_D1'];
    $escapula_retacao_C5_E1 = $_POST['escapula_retacao_C5_E1'];
    $ombro_flexao_C5_C6_D1 = $_POST['ombro_flexao_C5_C6_D1'];
    $ombro_flexao_C5_C6_E1 = $_POST['ombro_flexao_C5_C6_E1'];
    $ombro_extensao_C5_C7_D1 = $_POST['ombro_extensao_C5_C7_D1'];
    $ombro_extensao_C5_C7_E1 = $_POST['ombro_extensao_C5_C7_E1'];
    $ombro_abducao_C5_C6_D1 = $_POST['ombro_abducao_C5_C6_D1'];
    $ombro_abducao_C5_C6_E1 = $_POST['ombro_abducao_C5_C6_E1'];
    $ombro_aducao_C5_T1_D1 = $_POST['ombro_aducao_C5_T1_D1'];
    $ombro_aducao_C5_T1_E1 = $_POST['ombro_aducao_C5_T1_E1'];
    $ombro_aducao_C5_C6_D1 = $_POST['ombro_aducao_C5_C6_D1'];
    $ombro_aducao_C5_C6_E1 = $_POST['ombro_aducao_C5_C6_E1'];
    $ombro_rotacao_C4_C6_D1 = $_POST['ombro_rotacao_C4_C6_D1'];
    $ombro_rotacao_C4_C6_E1 = $_POST['ombro_rotacao_C4_C6_E1'];
    $ombro_rotacao_C5_C7_D1 = $_POST['ombro_rotacao_C5_C7_D1'];
    $ombro_rotacao_C5_C7_E1 = $_POST['ombro_rotacao_C5_C7_E1'];
    $cotovelo_flexao_C5_C6_D1 = $_POST['cotovelo_flexao_C5_C6_D1'];
    $cotovelo_flexao_C5_C6_E1 = $_POST['cotovelo_flexao_C5_C6_E1'];
    $cotovelo_extensao_C7_C8_D1 = $_POST['cotovelo_extensao_C7_C8_D1'];
    $cotovelo_extensao_C7_C8_E1 = $_POST['cotovelo_extensao_C7_C8_E1'];
    $antebraco_supinacao_C6_D1 = $_POST['antebraco_supinacao_C6_D1'];
    $antebraco_supinacao_C6_E1 = $_POST['antebraco_supinacao_C6_E1'];
    $antebraco_pronacao_C6_C7_D1 = $_POST['antebraco_pronacao_C6_C7_D1'];
    $antebraco_pronacao_C6_C7_E1 = $_POST['antebraco_pronacao_C6_C7_E1'];
    $punho_flexao_C6_C7_D1 = $_POST['punho_flexao_C6_C7_D1'];
    $punho_flexao_C6_C7_E1 = $_POST['punho_flexao_C6_C7_E1'];
    $punho_extensao_C6_C7_D1 = $_POST['punho_extensao_C6_C7_D1'];
    $punho_extensao_C6_C7_E1 = $_POST['punho_extensao_C6_C7_E1'];
    $mao_flexao_C6_T1_D1 = $_POST['mao_flexao_C6_T1_D1'];
    $mao_flexao_C6_T1_E1 = $_POST['mao_flexao_C6_T1_E1'];
    $mao_abducao_C8_T1_D1 = $_POST['mao_abducao_C8_T1_D1'];
    $mao_abducao_C8_T1_E1 = $_POST['mao_abducao_C8_T1_E1'];
    $dedo_abducao_C8_T1_D1 = $_POST['dedo_abducao_C8_T1_D1'];
    $dedo_abducao_C8_T1_E1 = $_POST['dedo_abducao_C8_T1_E1'];
    $dedo_aducao_C8_T1_D1 = $_POST['dedo_aducao_C8_T1_D1'];
    $dedo_aducao_C8_T1_E1 = $_POST['dedo_aducao_C8_T1_E1'];
    $dedo_felxao_C7_T1_D1 = $_POST['dedo_felxao_C7_T1_D1'];
    $dedo_felxao_C7_T1_E1 = $_POST['dedo_felxao_C7_T1_E1'];
    $dedo_felxao_C8_T1_D1 = $_POST['dedo_felxao_C8_T1_D1'];
    $dedo_felxao_C8_T1_E1 = $_POST['dedo_felxao_C8_T1_E1'];

    // Verifica se já existe uma ficha com o ID informado
    $query_check = "SELECT * FROM fichatraumatoortopédica3 WHERE idFichaTraumatoOrtopédica = ?";
    $stmt_check = $mysqli->prepare($query_check);
    if ($stmt_check === false) {
        die('Erro ao preparar a consulta de verificação: ' . $mysqli->error);
    }
    $stmt_check->bind_param('i', $idFichaTraumatoOrtopedica);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    // Se a ficha já existir, realiza a atualização
    if ($result_check->num_rows > 0) {
        $query_update = "UPDATE fichatraumatoortopédica3 SET 
            escapula_protracao_C5_C7_D1 = ?, escapula_protracao_C5_C7_E1 = ?, escapula_elevacao_C3_C4_D1 = ?, 
            escapula_elevacao_C3_C4_E1 = ?, escapula_retacao_C3_C4_D1 = ?, escapula_retacao_C3_C4_E1 = ?, 
            escapula_depressao_C3_C4_D1 = ?, escapula_depressao_C3_C4_E1 = ?, escapula_retacao_C5_D1 = ?, 
            escapula_retacao_C5_E1 = ?, ombro_flexao_C5_C6_D1 = ?, ombro_flexao_C5_C6_E1 = ?, 
            ombro_extensao_C5_C7_D1 = ?, ombro_extensao_C5_C7_E1 = ?, ombro_abducao_C5_C6_D1 = ?, 
            ombro_abducao_C5_C6_E1 = ?, ombro_aducao_C5_T1_D1 = ?, ombro_aducao_C5_T1_E1 = ?, 
            ombro_aducao_C5_C6_D1 = ?, ombro_aducao_C5_C6_E1 = ?, ombro_rotacao_C4_C6_D1 = ?, 
            ombro_rotacao_C4_C6_E1 = ?, ombro_rotacao_C5_C7_D1 = ?, ombro_rotacao_C5_C7_E1 = ?, 
            cotovelo_flexao_C5_C6_D1 = ?, cotovelo_flexao_C5_C6_E1 = ?, cotovelo_extensao_C7_C8_D1 = ?, 
            cotovelo_extensao_C7_C8_E1 = ?, antebraco_supinacao_C6_D1 = ?, antebraco_supinacao_C6_E1 = ?, 
            antebraco_pronacao_C6_C7_D1 = ?, antebraco_pronacao_C6_C7_E1 = ?, punho_flexao_C6_C7_D1 = ?, 
            punho_flexao_C6_C7_E1 = ?, punho_extensao_C6_C7_D1 = ?, punho_extensao_C6_C7_E1 = ?, 
            mao_flexao_C6_T1_D1 = ?, mao_flexao_C6_T1_E1 = ?, mao_abducao_C8_T1_D1 = ?, mao_abducao_C8_T1_E1 = ?, 
            dedo_abducao_C8_T1_D1 = ?, dedo_abducao_C8_T1_E1 = ?, dedo_aducao_C8_T1_D1 = ?, dedo_aducao_C8_T1_E1 = ?, 
            dedo_felxao_C7_T1_D1 = ?, dedo_felxao_C7_T1_E1 = ?, dedo_felxao_C8_T1_D1 = ?, dedo_felxao_C8_T1_E1 = ?
            WHERE idFichaTraumatoOrtopédica = ?";
        
        $stmt_update = $mysqli->prepare($query_update);
        if ($stmt_update === false) {
            die('Erro ao preparar a consulta de atualização: ' . $mysqli->error);
        }
        // Bind de parâmetros
        $stmt_update->bind_param(
            'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii',
            $escapula_protracao_C5_C7_D1, $escapula_protracao_C5_C7_E1, $escapula_elevacao_C3_C4_D1, 
            $escapula_elevacao_C3_C4_E1, $escapula_retacao_C3_C4_D1, $escapula_retacao_C3_C4_E1, 
            $escapula_depressao_C3_C4_D1, $escapula_depressao_C3_C4_E1, $escapula_retacao_C5_D1, 
            $escapula_retacao_C5_E1, $ombro_flexao_C5_C6_D1, $ombro_flexao_C5_C6_E1, 
            $ombro_extensao_C5_C7_D1, $ombro_extensao_C5_C7_E1, $ombro_abducao_C5_C6_D1, 
            $ombro_abducao_C5_C6_E1, $ombro_aducao_C5_T1_D1, $ombro_aducao_C5_T1_E1, 
            $ombro_aducao_C5_C6_D1, $ombro_aducao_C5_C6_E1, $ombro_rotacao_C4_C6_D1, 
            $ombro_rotacao_C4_C6_E1, $ombro_rotacao_C5_C7_D1, $ombro_rotacao_C5_C7_E1, 
            $cotovelo_flexao_C5_C6_D1, $cotovelo_flexao_C5_C6_E1, $cotovelo_extensao_C7_C8_D1, 
            $cotovelo_extensao_C7_C8_E1, $antebraco_supinacao_C6_D1, $antebraco_supinacao_C6_E1, 
            $antebraco_pronacao_C6_C7_D1, $antebraco_pronacao_C6_C7_E1, $punho_flexao_C6_C7_D1, 
            $punho_flexao_C6_C7_E1, $punho_extensao_C6_C7_D1, $punho_extensao_C6_C7_E1, 
            $mao_flexao_C6_T1_D1, $mao_flexao_C6_T1_E1, $mao_abducao_C8_T1_D1, $mao_abducao_C8_T1_E1, 
            $dedo_abducao_C8_T1_D1, $dedo_abducao_C8_T1_E1, $dedo_aducao_C8_T1_D1, $dedo_aducao_C8_T1_E1, 
            $dedo_felxao_C7_T1_D1, $dedo_felxao_C7_T1_E1, $dedo_felxao_C8_T1_D1, $dedo_felxao_C8_T1_E1, 
            $idFichaTraumatoOrtopedica
        );

        if ($stmt_update->execute()) {
            header("Location: ../tela 4/tela4.php");
        } else {
            echo "Erro ao atualizar os dados: " . $stmt_update->error;
        }
        $stmt_update->close();
    } else {
        // Se não existir, insere os dados como um novo registro
        $query_insert = "INSERT INTO fichatraumatoortopédica3 (
            idFichaTraumatoOrtopédica,
            escapula_protracao_C5_C7_D1, escapula_protracao_C5_C7_E1, escapula_elevacao_C3_C4_D1, 
            escapula_elevacao_C3_C4_E1, escapula_retacao_C3_C4_D1, escapula_retacao_C3_C4_E1, 
            escapula_depressao_C3_C4_D1, escapula_depressao_C3_C4_E1, escapula_retacao_C5_D1, 
            escapula_retacao_C5_E1, ombro_flexao_C5_C6_D1, ombro_flexao_C5_C6_E1, 
            ombro_extensao_C5_C7_D1, ombro_extensao_C5_C7_E1, ombro_abducao_C5_C6_D1, 
            ombro_abducao_C5_C6_E1, ombro_aducao_C5_T1_D1, ombro_aducao_C5_T1_E1, 
            ombro_aducao_C5_C6_D1, ombro_aducao_C5_C6_E1, ombro_rotacao_C4_C6_D1, 
            ombro_rotacao_C4_C6_E1, ombro_rotacao_C5_C7_D1, ombro_rotacao_C5_C7_E1, 
            cotovelo_flexao_C5_C6_D1, cotovelo_flexao_C5_C6_E1, cotovelo_extensao_C7_C8_D1, 
            cotovelo_extensao_C7_C8_E1, antebraco_supinacao_C6_D1, antebraco_supinacao_C6_E1, 
            antebraco_pronacao_C6_C7_D1, antebraco_pronacao_C6_C7_E1, punho_flexao_C6_C7_D1, 
            punho_flexao_C6_C7_E1, punho_extensao_C6_C7_D1, punho_extensao_C6_C7_E1, 
            mao_flexao_C6_T1_D1, mao_flexao_C6_T1_E1, mao_abducao_C8_T1_D1, mao_abducao_C8_T1_E1, 
            dedo_abducao_C8_T1_D1, dedo_abducao_C8_T1_E1, dedo_aducao_C8_T1_D1, dedo_aducao_C8_T1_E1, 
            dedo_felxao_C7_T1_D1, dedo_felxao_C7_T1_E1, dedo_felxao_C8_T1_D1, dedo_felxao_C8_T1_E1
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt_insert = $mysqli->prepare($query_insert);
        if ($stmt_insert === false) {
            die('Erro ao preparar a consulta de inserção: ' . $mysqli->error);
        }
        $stmt_insert->bind_param(
            'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii',
            $idFichaTraumatoOrtopedica,
            $escapula_protracao_C5_C7_D1, $escapula_protracao_C5_C7_E1, $escapula_elevacao_C3_C4_D1, 
            $escapula_elevacao_C3_C4_E1, $escapula_retacao_C3_C4_D1, $escapula_retacao_C3_C4_E1, 
            $escapula_depressao_C3_C4_D1, $escapula_depressao_C3_C4_E1, $escapula_retacao_C5_D1, 
            $escapula_retacao_C5_E1, $ombro_flexao_C5_C6_D1, $ombro_flexao_C5_C6_E1, 
            $ombro_extensao_C5_C7_D1, $ombro_extensao_C5_C7_E1, $ombro_abducao_C5_C6_D1, 
            $ombro_abducao_C5_C6_E1, $ombro_aducao_C5_T1_D1, $ombro_aducao_C5_T1_E1, 
            $ombro_aducao_C5_C6_D1, $ombro_aducao_C5_C6_E1, $ombro_rotacao_C4_C6_D1, 
            $ombro_rotacao_C4_C6_E1, $ombro_rotacao_C5_C7_D1, $ombro_rotacao_C5_C7_E1, 
            $cotovelo_flexao_C5_C6_D1, $cotovelo_flexao_C5_C6_E1, $cotovelo_extensao_C7_C8_D1, 
            $cotovelo_extensao_C7_C8_E1, $antebraco_supinacao_C6_D1, $antebraco_supinacao_C6_E1, 
            $antebraco_pronacao_C6_C7_D1, $antebraco_pronacao_C6_C7_E1, $punho_flexao_C6_C7_D1, 
            $punho_flexao_C6_C7_E1, $punho_extensao_C6_C7_D1, $punho_extensao_C6_C7_E1, 
            $mao_flexao_C6_T1_D1, $mao_flexao_C6_T1_E1, $mao_abducao_C8_T1_D1, $mao_abducao_C8_T1_E1, 
            $dedo_abducao_C8_T1_D1, $dedo_abducao_C8_T1_E1, $dedo_aducao_C8_T1_D1, $dedo_aducao_C8_T1_E1, 
            $dedo_felxao_C7_T1_D1, $dedo_felxao_C7_T1_E1, $dedo_felxao_C8_T1_D1, $dedo_felxao_C8_T1_E1
        );

        if ($stmt_insert->execute()) {
            header("Location: ../tela 4/tela4.php");
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
        <link rel="stylesheet" href="tela3.css">
        <title>Document</title>
    </head>
    <body>
        <form action="" method="POST">
            <div class="fundo">
                <h1>PROVA DE FUNÇÃO MUSCULAR - DATA: <input type="date"
                        class="data-exame"></h1>
                <div class="musculo">
                    <h1 class="sub-titulo">Escapula</h1>
                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Protração e rotação para cima</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="escapula_protracao_C5_C7_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="escapula_protracao_C5_C7_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Serrátil Anterior (C5 - C7)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="escapula_protracao_C5_C7_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="escapula_protracao_C5_C7_E2" class="descricao"></b></p>
                        </div>

                        <div
                            class="d-flex"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Elevação</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="escapula_elevacao_C3_C4_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="escapula_elevacao_C3_C4_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Trapézio Descendente (NC XI e
                                C3-C4)</p>
                            <p>Levantador da escápula (C3-C4)</p>
                            <br>
                            <p><b>Esquerdo: <input type="text" name="escapula_elevacao_C3_C4_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="escapula_elevacao_C3_C4_E2" class="descricao"></b></p>
                        </div>
                    </div>

                    <hr>

                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Retração </p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="escapula_retacao_C3_C4_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="escapula_retacao_C3_C4_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Trapézio transverso (NC XI e
                                C3-C4)</p>
                            <br><br>
                            <p><b>Esquerdo: <input type="text" name="escapula_retacao_C3_C4_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="escapula_retacao_C3_C4_E2" class="descricao"></b></p>
                        </div>

                        <div
                            class="d-flex"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Depressão e Retração</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="escapula_depressao_C3_C4_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="escapula_depressao_C3_C4_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Trapézio Descendente(NC XI e
                                C3-C4) </p>
                            <br><br>
                            <p><b>Esquerdo: <input type="text" name="escapula_depressao_C3_C4_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="escapula_depressao_C3_C4_E2" class="descricao"></b></p>
                        </div>
                    </div>

                    <hr>

                    <div class="container final">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Retração e rotação para baixo
                            </p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="escapula_retacao_C5_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="escapula_retacao_C5_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Romboides (C5)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="escapula_retacao_C5_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="escapula_retacao_C5_E2" class="descricao"></b></p>
                        </div>
                    </div>
                </div>

                <div class="musculo hiperbato">
                    <h1 class="sub-titulo">Ombros</h1>
                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Flexão</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="ombro_flexao_C5_C6_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="ombro_flexao_C5_C6_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b>Deltoide Clavicular (C5-C6) </p>
                            <p>Coracobraquial (C6-C7)</p>
                            <br><br>
                            <p><b>Esquerdo: <input type="text" name="ombro_flexao_C5_C6_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="ombro_flexao_C5_C6_E1" class="descricao"></b></p>
                        </div>

                        <div
                            class="blank"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Extensão</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="ombro_extensao_C5_C7_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="ombro_extensao_C5_C7_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Latíssimo do dorso (C5-C7)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="ombro_extensao_C5_C7_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="ombro_extensao_C5_C7_E2" class="descricao"></b></p>
                        </div>
                    </div>

                    <hr class="blank">

                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Abdução</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="ombro_abducao_C5_C6_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="ombro_abducao_C5_C6_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Deltoide Acromial (C5-C6)</p>
                            <p>Supraespinal (C4-C6)</p>
                            <br><br>
                            <p><b>Esquerdo: <input type="text" name="ombro_abducao_C5_C6_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="ombro_abducao_C5_C6_E2" class="descricao"></b></p>
                        </div>

                        <div
                            class="blank"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Adução horizontal</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="ombro_aducao_C5_T1_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="ombro_aducao_C5_T1_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Peitoral maior (C5-T1)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="ombro_aducao_C5_T1_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="ombro_aducao_C5_T1_E2" class="descricao"></b></p>
                        </div>
                    </div>

                    <hr class="blank">

                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Adução horizontal</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="ombro_aducao_C5_C6_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="ombro_aducao_C5_C6_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Deltoide espinal (C5-C6)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="ombro_aducao_C5_C6_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="ombro_aducao_C5_C6_E2" class="descricao"></b></p>
                        </div>

                        <div
                            class="blank"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Rotação externa</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="ombro_rotacao_C4_C6_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="ombro_rotacao_C4_C6_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Infraespinal (C4-C6)</p>
                            <p>Redondo menor (C5-C6)</p>
                            <br>
                            <p><b>Esquerdo: <input type="text" name="ombro_rotacao_C4_C6_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="ombro_rotacao_C4_C6_E2" class="descricao"></b></p>
                        </div>
                    </div>

                    <hr class="blank">

                    <div class="container final">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Rotação interna</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="ombro_rotacao_C5_C7_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="ombro_rotacao_C5_C7_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Subescapular (C5-C7)</p>
                            <p>Redondo maior (C6-C7)</p>
                            <br><br>
                            <p><b>Esquerdo: <input type="text" name="ombro_rotacao_C5_C7_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="ombro_rotacao_C5_C7_E2" class="descricao"></b></p>
                        </div>
                    </div>
                </div>

                <div class="musculo">
                    <h1 class="sub-titulo">Cotovelo</h1>
                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Flexão</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="cotovelo_flexao_C5_C6_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="cotovelo_flexao_C5_C6_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Biceps braquial (C5-C6)</p>
                            <p>Braquial (C5-C6)</p>
                            <p>Braquiorradial (C5-C6)</p>
                            <p><b>Esquerdo: <input type="text" name="cotovelo_flexao_C5_C6_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="cotovelo_flexao_C5_C6_E2" class="descricao"></b></p>
                        </div>

                        <div
                            class="d-flex"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Extensão</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="cotovelo_extensao_C7_C8_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="cotovelo_extensao_C7_C8_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Triceps Braquial (C7-C8)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="cotovelo_extensao_C7_C8_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="cotovelo_extensao_C7_C8_E2" class="descricao"></b></p>
                        </div>
                    </div>
                </div>

                <div class="musculo hiperbato">
                    <h1 class="sub-titulo">Antebraço</h1>
                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Supinação</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="antebraco_supinacao_C6_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="antebraco_supinacao_C6_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Supinador (C6)</p>
                            <p>Bíceps Braquial (C5-C6)</p>
                            <br><br>
                            <p><b>Esquerdo: <input type="text" name="antebraco_supinacao_C6_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="antebraco_supinacao_C6_E2" class="descricao"></b></p>
                        </div>

                        <div
                            class="blank"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Pronação</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="antebraco_pronacao_C6_C7_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="antebraco_pronacao_C6_C7_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Pronador redondo (C6-C7)</p>
                            <p>Pronador quadrado (C8-T1)</p>
                            <br><br>
                            <p><b>Esquerdo: <input type="text" name="antebraco_pronacao_C6_C7_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="antebraco_pronacao_C6_C7_E2" class="descricao"></b></p>
                        </div>
                    </div>
                </div>

                <div class="musculo">
                    <h1 class="sub-titulo">Punho</h1>
                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Flexão</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="punho_flexao_C6_C7_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="punho_flexao_C6_C7_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Flexor radial do carpo
                                (C6-C7)</p>
                            <p>Flexor ulnar do carpo (C8-T1)</p>
                            <p>Palmar longo (C6-C7)</p>
                            <p><b>Esquerdo: <input type="text" name="punho_flexao_C6_C7_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="punho_flexao_C6_C7_E2" class="descricao"></b></p>
                        </div>

                        <div
                            class="d-flex"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Extensão</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="punho_extensao_C6_C7_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="punho_extensao_C6_C7_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Extensor radial longo do carpo
                                (C6-C7)</p>
                            <p>Extensor radial curto do carpo (C6-C7)</p>
                            <p>Extensor ulnar do carpo (C6-C8)</p>
                            <p><b>Esquerdo: <input type="text" name="punho_extensao_C6_C7_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="punho_extensao_C6_C7_E2" class="descricao"></b></p>
                        </div>
                    </div>
                </div>

                <div class="musculo hiperbato">
                    <h1 class="sub-titulo">Mãos e Dedos</h1>
                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Flexão MCF</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="mao_flexao_C6_T1_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="mao_flexao_C6_T1_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b>Lumbricais (C6-T1)</p>
                            <p>Interósseos (C8-T1)</p>
                            <br><br>
                            <p><b>Esquerdo: <input type="text" name="mao_flexao_C6_T1_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="mao_flexao_C6_T1_E2" class="descricao"></b></p>
                        </div>

                        <div
                            class="blank"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Abdução dedos</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="mao_abducao_C8_T1_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="mao_abducao_C8_T1_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Interósseos dorsais (C8-T1)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="mao_abducao_C8_T1_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="mao_abducao_C8_T1_E2" class="descricao"></b></p>
                        </div>
                    </div>

                    <hr class="blank">

                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Abdução do dedo minimo </p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="dedo_abducao_C8_T1_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="dedo_abducao_C8_T1_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Abdutor do dedo minimo
                                (C8-T1)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="dedo_abducao_C8_T1_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="dedo_abducao_C8_T1_E2" class="descricao"></b></p>
                        </div>

                        <div
                            class="blank"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Adução dedos </p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="dedo_aducao_C8_T1_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="dedo_aducao_C8_T1_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Interósseos palmares (C8-T1)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="dedo_aducao_C8_T1_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="dedo_aducao_C8_T1_E2" class="descricao"></b></p>
                        </div>
                    </div>

                    <hr class="blank">

                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Flexão IFP</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="dedo_felxao_C7_T1_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="dedo_felxao_C7_T1_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Flexor superficial dos dedos
                                (C7-T1)</p>
                            <br><br>
                            <p><b>Esquerdo: <input type="text" name="dedo_felxao_C7_T1_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="dedo_felxao_C7_T1_E2" class="descricao"></b></p>
                        </div>

                        <div
                            class="blank"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Flexão IFD</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="dedo_felxao_C8_T1_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="dedo_felxao_C8_T1_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Flexor profundo dos dedos
                                (C8-T1)</p>
                            <br><br>
                            <p><b>Esquerdo: <input type="text" name="dedo_felxao_C8_T1_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="dedo_felxao_C8_T1_E2" class="descricao"></b></p>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit">Próxima página -></button>
            </div>
        </form>
    </body>
</html>