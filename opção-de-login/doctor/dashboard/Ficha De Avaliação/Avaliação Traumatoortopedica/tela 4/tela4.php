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
    $dedo_extensao_C6_C8_D1 = $_POST['dedo_extensao_C6_C8_D1'];
    $dedo_extensao_C6_C8_E1 = $_POST['dedo_extensao_C6_C8_E1'];
    $dedo_flexao_C6_T1_D1 = $_POST['dedo_flexao_C6_T1_D1'];
    $dedo_flexao_C6_T1_E1 = $_POST['dedo_flexao_C6_T1_E1'];
    $dedo_flexaoIF_C8_T1_D1 = $_POST['dedo_flexaoIF_C8_T1_D1'];
    $dedo_flexaoIF_C8_T1_E1 = $_POST['dedo_flexaoIF_C8_T1_E1'];
    $dedo_extensao_C6_C7_D1 = $_POST['dedo_extensao_C6_C7_D1'];
    $dedo_extensao_C6_C7_E1 = $_POST['dedo_extensao_C6_C7_E1'];
    $dedo_abducao_C6_C7_D1 = $_POST['dedo_abducao_C6_C7_D1'];
    $dedo_abducao_C6_C7_E1 = $_POST['dedo_abducao_C6_C7_E1'];
    $dedo_aducaoP_C8_T1_D1 = $_POST['dedo_aducaoP_C8_T1_D1'];
    $dedo_aducaoP_C8_T1_E1 = $_POST['dedo_aducaoP_C8_T1_E1'];
    $dedo_oposicao_C6_C7_D1 = $_POST['dedo_oposicao_C6_C7_D1'];
    $dedo_oposicao_C6_C7_E1 = $_POST['dedo_oposicao_C6_C7_E1'];
    $dedo_oposicao_C8_T1_D1 = $_POST['dedo_oposicao_C8_T1_D1'];
    $dedo_oposicao_C8_T1_E1 = $_POST['dedo_oposicao_C8_T1_E1'];
    $quadril_flexao_L2_L3_D1 = $_POST['quadril_flexao_L2_L3_D1'];
    $quadril_flexao_L2_L3_E1 = $_POST['quadril_flexao_L2_L3_E1'];
    $quadril_flexao_L4_S1_D1 = $_POST['quadril_flexao_L4_S1_D1'];
    $quadril_flexao_L4_S1_E1 = $_POST['quadril_flexao_L4_S1_E1'];
    $quadril_F_Re_A_L2_L3_D1 = $_POST['quadril_F_Re_A_L2_L3_D1'];
    $quadril_F_Re_A_L2_L3_E1 = $_POST['quadril_F_Re_A_L2_L3_E1'];
    $quadril_extensao_L5_S2_D1 = $_POST['quadril_extensao_L5_S2_D1'];
    $quadril_extensao_L5_S2_E1 = $_POST['quadril_extensao_L5_S2_E1'];
    $quadril_abducao_L4_S1_D1 = $_POST['quadril_abducao_L4_S1_D1'];
    $quadril_abducao_L4_S1_E1 = $_POST['quadril_abducao_L4_S1_E1'];
    $quadril_aducao_L3_S2_D1 = $_POST['quadril_aducao_L3_S2_D1'];
    $quadril_aducao_L3_S2_E1 = $_POST['quadril_aducao_L3_S2_E1'];
    $quadril_rotacaoI_L4_S1_D1 = $_POST['quadril_rotacaoI_L4_S1_D1'];
    $quadril_rotacaoI_L4_S1_E1 = $_POST['quadril_rotacaoI_L4_S1_E1'];
    $quadril_rotacaoE_L3_S2_D1 = $_POST['quadril_rotacaoE_L3_S2_D1'];
    $quadril_rotacaoE_L3_S2_E1 = $_POST['quadril_rotacaoE_L3_S2_E1'];
    $joelho_extensao_L2_L4_D1 = $_POST['joelho_extensao_L2_L4_D1'];
    $joelho_extensao_L2_L4_E1 = $_POST['joelho_extensao_L2_L4_E1'];
    $joelho_flexao_L5_S2_D1 = $_POST['joelho_flexao_L5_S2_D1'];
    $joelho_flexao_L5_S2_E1 = $_POST['joelho_flexao_L5_S2_E1'];
    $tornozelo_dorsi_L4_S1_D1 = $_POST['tornozelo_dorsi_L4_S1_D1'];
    $tornozelo_dorsi_L4_S1_E1 = $_POST['tornozelo_dorsi_L4_S1_E1'];
    $tornozelo_flexaoP_S1_S2_D1 = $_POST['tornozelo_flexaoP_S1_S2_D1'];
    $tornozelo_flexaoP_S1_S2_E1 = $_POST['tornozelo_flexaoP_S1_S2_E1'];
    $tornozelo_inversao_L5_S1_D1 = $_POST['tornozelo_inversao_L5_S1_D1'];
    $tornozelo_inversao_L5_S1_E1 = $_POST['tornozelo_inversao_L5_S1_E1'];
    $tornozelo_eversao_L4_S1_D1 = $_POST['tornozelo_eversao_L4_S1_D1'];
    $tornozelo_eversao_L4_S1_E1 = $_POST['tornozelo_eversao_L4_S1_E1'];
    $pe_flexaoMTF_L4_S1_D1 = $_POST['pe_flexaoMTF_L4_S1_D1'];
    $pe_flexaoMTF_L4_S1_E1 = $_POST['pe_flexaoMTF_L4_S1_E1'];
    $pe_flexaoIF_L5_S2_D1 = $_POST['pe_flexaoIF_L5_S2_D1'];
    $pe_flexaoIF_L5_S2_E1 = $_POST['pe_flexaoIF_L5_S2_E1'];
    $pe_flexaoIFD_L5_S1_D1 = $_POST['pe_flexaoIFD_L5_S1_D1'];
    $pe_flexaoIFD_L5_S1_E1 = $_POST['pe_flexaoIFD_L5_S1_E1'];
    $pe_flexaoIFP_L4_S5_D1 = $_POST['pe_flexaoIFP_L4_S5_D1'];
    $pe_flexaoIFP_L4_S5_E1 = $_POST['pe_flexaoIFP_L4_S5_E1'];
    $pe_extensao_L4_S1_D1 = $_POST['pe_extensao_L4_S1_D1'];
    $pe_extensao_L4_S1_E1 = $_POST['pe_extensao_L4_S1_E1'];
    $pe_extensaoIF_L4_S1_D1 = $_POST['pe_extensaoIF_L4_S1_D1'];
    $pe_extensaoIF_L4_S1_E1 = $_POST['pe_extensaoIF_L4_S1_E1'];
    $pe_extensaoMTF_L4_S1_D1 = $_POST['pe_extensaoMTF_L4_S1_D1'];
    $pe_extensaoMTF_L4_S1_E1 = $_POST['pe_extensaoMTF_L4_S1_E1'];

    // Verifica se já existe uma ficha com o ID informado
    $query_check = "SELECT * FROM fichatraumatoortopédica4 WHERE idFichaTraumatoOrtopédica = ?";
    $stmt_check = $mysqli->prepare($query_check);
    if ($stmt_check === false) {
        die('Erro ao preparar a consulta de verificação: ' . $mysqli->error);
    }
    $stmt_check->bind_param('i', $idFichaTraumatoOrtopedica);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    // Se a ficha já existir, realiza a atualização
    if ($result_check->num_rows > 0) {
        $query_update = "UPDATE fichatraumatoortopédica4 SET
         dedo_extensao_C6_C8_D1 = ?, dedo_extensao_C6_C8_E1 = ?, dedo_flexao_C6_T1_D1 = ?, dedo_flexao_C6_T1_E1 = ?,
        dedo_flexaoIF_C8_T1_D1 = ?, dedo_flexaoIF_C8_T1_E1 = ?, dedo_extensao_C6_C7_D1 = ?, dedo_extensao_C6_C7_E1 = ?,
        dedo_abducao_C6_C7_D1 = ?, dedo_abducao_C6_C7_E1 = ?, dedo_aducaoP_C8_T1_D1 = ?, dedo_aducaoP_C8_T1_E1 = ?,
        dedo_oposicao_C6_C7_D1 = ?, dedo_oposicao_C6_C7_E1 = ?, dedo_oposicao_C8_T1_D1 = ?, dedo_oposicao_C8_T1_E1 = ?,
        quadril_flexao_L2_L3_D1 = ?, quadril_flexao_L2_L3_E1 = ?, quadril_flexao_L4_S1_D1 = ?, quadril_flexao_L4_S1_E1 = ?,
        quadril_F_Re_A_L2_L3_D1 = ?, quadril_F_Re_A_L2_L3_E1 = ?, quadril_extensao_L5_S2_D1 = ?, quadril_extensao_L5_S2_E1 = ?,
        quadril_abducao_L4_S1_D1 = ?, quadril_abducao_L4_S1_E1 = ?, quadril_aducao_L3_S2_D1 = ?, quadril_aducao_L3_S2_E1 = ?,
        quadril_rotacaoI_L4_S1_D1 = ?, quadril_rotacaoI_L4_S1_E1 = ?, quadril_rotacaoE_L3_S2_D1 = ?, quadril_rotacaoE_L3_S2_E1 = ?,
        joelho_extensao_L2_L4_D1 = ?, joelho_extensao_L2_L4_E1 = ?, Joelho_flexao_L5_S2_D1 = ?, Joelho_flexao_L5_S2_E1 = ?,
        tornozelo_dorsi_L4_S1_D1 = ?, tornozelo_dorsi_L4_S1_E1 = ?, tornozelo_flexaoP_S1_S2_D1 = ?, tornozelo_flexaoP_S1_S2_E1 = ?,
        tornozelo_inversao_L5_S1_D1 = ?, tornozelo_inversao_L5_S1_E1 = ?, tornozelo_eversao_L4_S1_D1 = ?, tornozelo_eversao_L4_S1_E1 = ?,
        pe_flexaoMTF_L4_S1_D1 = ?, pe_flexaoMTF_L4_S1_E1 = ?, pe_flexaoIF_L5_S2_D1 = ?, pe_flexaoIF_L5_S2_E1 = ?,
        pe_flexaoIFD_L5_S1_D1 = ?, pe_flexaoIFD_L5_S1_E1 = ?, pe_flexaoIFP_L4_S5_D1 = ?, pe_flexaoIFP_L4_S5_E1 = ?,
        pe_extensao_L4_S1_D1 = ?, pe_extensao_L4_S1_E1 = ?, pe_extensaoIF_L4_S1_D1 = ?, pe_extensaoIF_L4_S1_E1 = ?,
        pe_extensaoMTF_L4_S1_D1 = ?, pe_extensaoMTF_L4_S1_E1 = ? WHERE idFichaTraumatoOrtopédica = ?";

        $stmt_update = $mysqli->prepare($query_update);
        if ($stmt_update === false) {
            die('Erro ao preparar a consulta de atualização: ' . $mysqli->error);
        }

        $stmt_update->bind_param('iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii',
        $dedo_extensao_C6_C8_D1, $dedo_extensao_C6_C8_E1, $dedo_flexao_C6_T1_D1, $dedo_flexao_C6_T1_E1,
        $dedo_flexaoIF_C8_T1_D1, $dedo_flexaoIF_C8_T1_E1, $dedo_extensao_C6_C7_D1, $dedo_extensao_C6_C7_E1,
        $dedo_abducao_C6_C7_D1, $dedo_abducao_C6_C7_E1, $dedo_aducaoP_C8_T1_D1, $dedo_aducaoP_C8_T1_E1,
        $dedo_oposicao_C6_C7_D1, $dedo_oposicao_C6_C7_E1, $dedo_oposicao_C8_T1_D1, $dedo_oposicao_C8_T1_E1,
        $quadril_flexao_L2_L3_D1, $quadril_flexao_L2_L3_E1, $quadril_flexao_L4_S1_D1, $quadril_flexao_L4_S1_E1,
        $quadril_F_Re_A_L2_L3_D1, $quadril_F_Re_A_L2_L3_E1, $quadril_extensao_L5_S2_D1, $quadril_extensao_L5_S2_E1,
        $quadril_abducao_L4_S1_D1, $quadril_abducao_L4_S1_E1, $quadril_aducao_L3_S2_D1, $quadril_aducao_L3_S2_E1,
        $quadril_rotacaoI_L4_S1_D1, $quadril_rotacaoI_L4_S1_E1, $quadril_rotacaoE_L3_S2_D1, $quadril_rotacaoE_L3_S2_E1,
        $joelho_extensao_L2_L4_D1, $joelho_extensao_L2_L4_E1, $Joelho_flexao_L5_S2_D1, $Joelho_flexao_L5_S2_E1,
        $tornozelo_dorsi_L4_S1_D1, $tornozelo_dorsi_L4_S1_E1, $tornozelo_flexaoP_S1_S2_D1, $tornozelo_flexaoP_S1_S2_E1,
        $tornozelo_inversao_L5_S1_D1, $tornozelo_inversao_L5_S1_E1, $tornozelo_eversao_L4_S1_D1, $tornozelo_eversao_L4_S1_E1,
        $pe_flexaoMTF_L4_S1_D1, $pe_flexaoMTF_L4_S1_E1, $pe_flexaoIF_L5_S2_D1, $pe_flexaoIF_L5_S2_E1,
        $pe_flexaoIFD_L5_S1_D1, $pe_flexaoIFD_L5_S1_E1, $pe_flexaoIFP_L4_S5_D1, $pe_flexaoIFP_L4_S5_E1,
        $pe_extensao_L4_S1_D1, $pe_extensao_L4_S1_E1, $pe_extensaoIF_L4_S1_D1, $pe_extensaoIF_L4_S1_E1,
        $pe_extensaoMTF_L4_S1_D1, $pe_extensaoMTF_L4_S1_E1, $idFichaTraumatoOrtopedica 
    );
    
    if ($stmt_update->execute()) {
        header("Location: ../tela5/tela5.php");
    } else {
        echo "Erro ao atualizar os dados: " . $stmt_update->error;
    }
    $stmt_update->close();
} else {
    // Se não existir, insere os dados como um novo registro
    $query_insert = "INSERT INTO fichatraumatoortopédica4 (
        idFichaTraumatoOrtopédica,
        dedo_extensao_C6_C8_D1, dedo_extensao_C6_C8_E1, dedo_flexao_C6_T1_D1, dedo_flexao_C6_T1_E1,
        dedo_flexaoIF_C8_T1_D1, dedo_flexaoIF_C8_T1_E1, dedo_extensao_C6_C7_D1, dedo_extensao_C6_C7_E1,
        dedo_abducao_C6_C7_D1, dedo_abducao_C6_C7_E1, dedo_aducaoP_C8_T1_D1, dedo_aducaoP_C8_T1_E1,
        dedo_oposicao_C6_C7_D1, dedo_oposicao_C6_C7_E1, dedo_oposicao_C8_T1_D1, dedo_oposicao_C8_T1_E1,
        quadril_flexao_L2_L3_D1, quadril_flexao_L2_L3_E1, quadril_flexao_L4_S1_D1, quadril_flexao_L4_S1_E1,
        quadril_F_Re_A_L2_L3_D1, quadril_F_Re_A_L2_L3_E1, quadril_extensao_L5_S2_D1, quadril_extensao_L5_S2_E1,
        quadril_abducao_L4_S1_D1, quadril_abducao_L4_S1_E1, quadril_aducao_L3_S2_D1, quadril_aducao_L3_S2_E1,
        quadril_rotacaoI_L4_S1_D1, quadril_rotacaoI_L4_S1_E1, quadril_rotacaoE_L3_S2_D1, quadril_rotacaoE_L3_S2_E1,
        joelho_extensao_L2_L4_D1, joelho_extensao_L2_L4_E1, Joelho_flexao_L5_S2_D1, Joelho_flexao_L5_S2_E1,
        tornozelo_dorsi_L4_S1_D1, tornozelo_dorsi_L4_S1_E1, tornozelo_flexaoP_S1_S2_D1, tornozelo_flexaoP_S1_S2_E1,
        tornozelo_inversao_L5_S1_D1, tornozelo_inversao_L5_S1_E1, tornozelo_eversao_L4_S1_D1, tornozelo_eversao_L4_S1_E1,
        pe_flexaoMTF_L4_S1_D1, pe_flexaoMTF_L4_S1_E1, pe_flexaoIF_L5_S2_D1, pe_flexaoIF_L5_S2_E1,
        pe_flexaoIFD_L5_S1_D1, pe_flexaoIFD_L5_S1_E1, pe_flexaoIFP_L4_S5_D1, pe_flexaoIFP_L4_S5_E1,
        pe_extensao_L4_S1_D1, pe_extensao_L4_S1_E1, pe_extensaoIF_L4_S1_D1, pe_extensaoIF_L4_S1_E1,
        pe_extensaoMTF_L4_S1_D1, pe_extensaoMTF_L4_S1_E1
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt_insert = $mysqli->prepare($query_insert);
if ($stmt_insert === false) {
    die('Erro ao preparar a consulta de inserção: ' . $mysqli->error);
}

    $stmt_insert->bind_param('iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii',
    $idFichaTraumatoOrtopedica, $dedo_extensao_C6_C8_D1, $dedo_extensao_C6_C8_E1, $dedo_flexao_C6_T1_D1, $dedo_flexao_C6_T1_E1,
    $dedo_flexaoIF_C8_T1_D1, $dedo_flexaoIF_C8_T1_E1, $dedo_extensao_C6_C7_D1, $dedo_extensao_C6_C7_E1,
    $dedo_abducao_C6_C7_D1, $dedo_abducao_C6_C7_E1, $dedo_aducaoP_C8_T1_D1, $dedo_aducaoP_C8_T1_E1,
    $dedo_oposicao_C6_C7_D1, $dedo_oposicao_C6_C7_E1, $dedo_oposicao_C8_T1_D1, $dedo_oposicao_C8_T1_E1,
    $quadril_flexao_L2_L3_D1, $quadril_flexao_L2_L3_E1, $quadril_flexao_L4_S1_D1, $quadril_flexao_L4_S1_E1,
    $quadril_F_Re_A_L2_L3_D1, $quadril_F_Re_A_L2_L3_E1, $quadril_extensao_L5_S2_D1, $quadril_extensao_L5_S2_E1,
    $quadril_abducao_L4_S1_D1, $quadril_abducao_L4_S1_E1, $quadril_aducao_L3_S2_D1, $quadril_aducao_L3_S2_E1,
    $quadril_rotacaoI_L4_S1_D1, $quadril_rotacaoI_L4_S1_E1, $quadril_rotacaoE_L3_S2_D1, $quadril_rotacaoE_L3_S2_E1,
    $joelho_extensao_L2_L4_D1, $joelho_extensao_L2_L4_E1, $Joelho_flexao_L5_S2_D1, $Joelho_flexao_L5_S2_E1,
    $tornozelo_dorsi_L4_S1_D1, $tornozelo_dorsi_L4_S1_E1, $tornozelo_flexaoP_S1_S2_D1, $tornozelo_flexaoP_S1_S2_E1,
    $tornozelo_inversao_L5_S1_D1, $tornozelo_inversao_L5_S1_E1, $tornozelo_eversao_L4_S1_D1, $tornozelo_eversao_L4_S1_E1,
    $pe_flexaoMTF_L4_S1_D1, $pe_flexaoMTF_L4_S1_E1, $pe_flexaoIF_L5_S2_D1, $pe_flexaoIF_L5_S2_E1,
    $pe_flexaoIFD_L5_S1_D1, $pe_flexaoIFD_L5_S1_E1, $pe_flexaoIFP_L4_S5_D1, $pe_flexaoIFP_L4_S5_E1,
    $pe_extensao_L4_S1_D1, $pe_extensao_L4_S1_E1, $pe_extensaoIF_L4_S1_D1, $pe_extensaoIF_L4_S1_E1,
    $pe_extensaoMTF_L4_S1_D1, $pe_extensaoMTF_L4_S1_E1
);

        if ($stmt_insert->execute()) {
            header("Location: ../tela5/tela5.php");
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
        <link rel="stylesheet" href="../tela 3/tela3.css">
        <!--Por essa tela possuir o mesmo estilo da tela 3 o mesmo arquico css será ultilizado-->
        <title>Document</title>
    </head>
    <body>
        <form action="" method="POST">
            <div class="fundo">
                <div class="musculo hiperbato">
                    <h1 class="sub-titulo">Continuação de Mãos e Dedos</h1>
                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Extensão MCF</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="dedo_extensao_C6_C8_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="dedo_extensao_C6_C8_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Extensor dos dedos (C6-C8)</p>
                            <p>Extensor do indicador (C6-C8)</p>
                            <p>Extensor do dedo mínimo (C6-C8)</p>
                            <p><b>Esquerdo: <input type="text" name="dedo_extensao_C6_C8_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="dedo_extensao_C6_C8_E2" class="descricao"></b></p>
                        </div>

                        <div
                            class="blank"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Flexão MCF Polegar</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="dedo_flexao_C6_T1_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="dedo_flexao_C6_T1_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Flexor curto do polegar
                                (C6-T1)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="dedo_flexao_C6_T1_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="dedo_flexao_C6_T1_E2" class="descricao"></b></p>
                        </div>
                    </div>

                    <hr class="blank">

                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Flexão IF Polegar </p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="dedo_flexaoIF_C8_T1_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="dedo_flexaoIF_C8_T1_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Flexor longo do Polegar
                                (C8-T1)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="dedo_flexaoIF_C8_T1_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="dedo_flexaoIF_C8_T1_E2" class="descricao"></b></p>
                        </div>

                        <div
                            class="blank"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Extensão MCF e IF Polegar</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="dedo_extensao_C6_C7_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="dedo_extensao_C6_C7_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Extensor longo do Polegar
                                (C6-C8)</p>
                            <p>Extensor curto do polegar (C6-C7) </p>
                            <br>
                            <p><b>Esquerdo: <input type="text" name="dedo_extensao_C6_C7_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="dedo_extensao_C6_C7_E2" class="descricao"></b></p>
                        </div>
                    </div>

                    <hr class="blank">

                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Abdução Polegar </p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="dedo_abducao_C6_C7_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="dedo_abducao_C6_C7_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Abdutor longo do polegar
                                (C6-C7)</p>
                            <p>Abdutor curto do polegar (C6-C7)</p>
                            <br>
                            <p><b>Esquerdo: <input type="text" name="dedo_abducao_C6_C7_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="dedo_abducao_C6_C7_E2" class="descricao"></b></p>
                        </div>

                        <div
                            class="blank"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Adução Polegar</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="dedo_aducaoP_C8_T1_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="dedo_aducaoP_C8_T1_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Adutor do polegar (C8-T1)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="dedo_aducaoP_C8_T1_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="dedo_aducaoP_C8_T1_E2" class="descricao"></b></p>
                        </div>
                    </div>

                    <hr class="blank">

                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Oposição polegar</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="dedo_oposicao_C6_C7_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="dedo_oposicao_C6_C7_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Oponente do polegar (C6-C7)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="dedo_oposicao_C6_C7_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="dedo_oposicao_C6_C7_E2" class="descricao"></b></p>
                        </div>

                        <div
                            class="blank"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Oposição dedo minimo</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="dedo_oposicao_C8_T1_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="dedo_oposicao_C8_T1_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Oponente do dedo mínimo
                                (C8-T1)</p>
                            <br><br>
                            <p><b>Esquerdo: <input type="text" name="dedo_oposicao_C8_T1_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="dedo_oposicao_C8_T1_E2" class="descricao"></b></p>
                        </div>
                    </div>
                </div>

                <div class="musculo">
                    <h1 class="sub-titulo">Quadril</h1>
                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Flexão</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="quadril_flexao_L2_L3_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="quadril_flexao_L2_L3_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Iliopsoas (L2-L3) </p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="quadril_flexao_L2_L3_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="quadril_flexao_L2_L3_E2" class="descricao"></b></p>
                        </div>

                        <div
                            class="d-flex"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Flexão, Rotação Interna e
                                Abdução</p>
                            <br><br>
                            <p><b>Direito: <input type="text" name="quadril_flexao_L4_S1_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="quadril_flexao_L4_S1_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Tensor da Fáscia Lata (L4-S1)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="quadril_flexao_L4_S1_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="quadril_flexao_L4_S1_E2" class="descricao"></b></p>
                        </div>
                    </div>

                    <hr>

                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Flexão, Rotação Externa e
                                Abdução</p>
                            <br><br>
                            <p><b>Direito: <input type="text" name="quadril_F_Re_A_L2_L3_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="quadril_F_Re_A_L2_L3_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Sartório (L2-L3)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="quadril_F_Re_A_L2_L3_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="quadril_F_Re_A_L2_L3_E2" class="descricao"></b></p>
                        </div>

                        <div
                            class="d-flex"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Extensão</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="quadril_extensao_L5_S2_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="quadril_extensao_L5_S2_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Glúteo máximo (L5-S2)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="quadril_extensao_L5_S2_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="quadril_extensao_L5_S2_E2" class="descricao"></b></p>
                        </div>
                    </div>

                    <hr>

                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Abdução</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="quadril_abducao_L4_S1_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="quadril_abducao_L4_S1_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Glúteo Médio (L4-S1)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="quadril_abducao_L4_S1_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="quadril_abducao_L4_S1_E2" class="descricao"></b></p>
                        </div>

                        <div
                            class="d-flex"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Adução</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="quadril_aducao_L3_S2_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="quadril_aducao_L3_S2_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Adutores (L3-S2)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="quadril_aducao_L3_S2_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="quadril_aducao_L3_S2_E2" class="descricao"></b></p>
                        </div>
                    </div>

                    <hr>

                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Rotação Interna</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="quadril_rotacaoI_L4_S1_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="quadril_rotacaoI_L4_S1_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Glúteo mínimo (L4-S1)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="quadril_rotacaoI_L4_S1_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="quadril_rotacaoI_L4_S1_E2" class="descricao"></b></p>
                        </div>

                        <div
                            class="d-flex"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Rotação Externa </p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="quadril_rotacaoE_L3_S2_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="quadril_rotacaoE_L3_S2_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Rotadores Externos (L3-S2)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="quadril_rotacaoE_L3_S2_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="quadril_rotacaoE_L3_S2_E2" class="descricao"></b></p>
                        </div>
                    </div>
                </div>

                <div class="musculo hiperbato">
                    <h1 class="sub-titulo">Joelho</h1>
                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Extensão</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="joelho_extensao_L2_L4_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="joelho_extensao_L2_L4_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Quadríceps (L2-L4)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="joelho_extensao_L2_L4_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="joelho_extensao_L2_L4_E2" class="descricao"></b></p>
                        </div>

                        <div
                            class="blank"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Flexão</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="joelho_flexao_L5_S2_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="joelho_flexao_L5_S2_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Isquiotibiais (L5-S2)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="joelho_flexao_L5_S2_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="joelho_flexao_L5_S2_E2" class="descricao"></b></p>
                        </div>
                    </div>
                </div>

                <div class="musculo">
                    <h1 class="sub-titulo">Tornozelo</h1>
                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Dorsiflexão</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="tornozelo_dorsi_L4_S1_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="tornozelo_dorsi_L4_S1_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Tibial anterior (L4-S1)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="tornozelo_dorsi_L4_S1_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="tornozelo_dorsi_L4_S1_E2" class="descricao"></b></p>
                        </div>

                        <div
                            class="d-flex"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Flexão plantar</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="tornozelo_flexaoP_S1_S2_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="tornozelo_flexaoP_S1_S2_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Tríceps sural (S1-S2)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="tornozelo_flexaoP_S1_S2_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="tornozelo_flexaoP_S1_S2_E2" class="descricao"></b></p>
                        </div>
                    </div>

                    <hr>

                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Inversão</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="tornozelo_inversao_L5_S1_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="tornozelo_inversao_L5_S1_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Tibial Posterior (L5-S1)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="tornozelo_inversao_L5_S1_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="tornozelo_inversao_L5_S1_E2" class="descricao"></b></p>
                        </div>

                        <div
                            class="d-flex"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Eversão</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="tornozelo_eversao_L4_S1_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="tornozelo_eversao_L4_S1_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Fibulares (L4-S1)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="tornozelo_eversao_L4_S1_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="tornozelo_eversao_L4_S1_E2" class="descricao"></b></p>
                        </div>
                    </div>
                </div>

                <div class="musculo hiperbato">
                    <h1 class="sub-titulo">Pé</h1>
                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Flexão MTF Hálux</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="pe_flexaoMTF_L4_S1_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="pe_flexaoMTF_L4_S1_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Flexor curto do hálux (L4-S1)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="pe_flexaoMTF_L4_S1_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="pe_flexaoMTF_L4_S1_E2" class="descricao"></b></p>
                        </div>

                        <div
                            class="blank"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Flexão IF Hálux</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="pe_flexaoIF_L5_S2_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="pe_flexaoIF_L5_S2_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Flexor longo do hálux (L5-S2)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="pe_flexaoIF_L5_S2_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="pe_flexaoIF_L5_S2_E2" class="descricao"></b></p>
                        </div>
                    </div>

                    <hr class="blank">

                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Flexão IFP e IFD Dedos</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="pe_flexaoIFD_L5_S1_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="pe_flexaoIFD_L5_S1_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Flexor longo dos dedos
                                (L5-S1)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="pe_flexaoIFD_L5_S1_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="pe_flexaoIFD_L5_S1_E2" class="descricao"></b></p>
                        </div>

                        <div
                            class="blank"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Flexão IFP dedos</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="pe_flexaoIFP_L4_S5_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="pe_flexaoIFP_L4_S5_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Flexor curto dos dedos
                                (L4-S5)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="pe_flexaoIFP_L4_S5_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="pe_flexaoIFP_L4_S5_E2" class="descricao"></b></p>
                        </div>
                    </div>

                    <hr class="blank">

                    <div class="container">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Extensão dedos</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="pe_extensao_L4_S1_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="pe_extensao_L4_S1_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Extensor longo dos dedos
                                (L4-S1)</p>
                            <p>Extensor curto dos dedos (L5-S1)</p>
                            <br><br>
                            <p><b>Esquerdo: <input type="text" name="pe_extensao_L4_S1_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="pe_extensao_L4_S1_E2" class="descricao"></b></p>
                        </div>

                        <div
                            class="blank"><!--separação vertical entre as colunas-->
                            <div class="vr"></div>
                        </div>

                        <div class="coluna1">
                            <p><b>Movimento:</b> Extensão IF Hálux </p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="pe_extensaoIF_L4_S1_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="pe_extensaoIF_L4_S1_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Extensor longo do Hálux
                                (L4-S1)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="pe_extensaoIF_L4_S1_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="pe_extensaoIF_L4_S1_E2" class="descricao"></b></p>
                        </div>
                    </div>

                    <hr class="blank">

                    <div class="container final">
                        <div class="coluna1">
                            <p><b>Movimento:</b> Extensão MTF Hálux</p>
                            <br><br><br>
                            <p><b>Direito: <input type="text" name="pe_extensaoMTF_L4_S1_D1" class="descricao"></b></p>
                            <p><b>Direito: <input type="text" name="pe_extensaoMTF_L4_S1_D2" class="descricao"></b></p>
                        </div>
                        <div class="coluna2">
                            <p><b>Músculo:</b> Extensor curto do Hálux
                                (L4-S1)</p>
                            <br><br><br>
                            <p><b>Esquerdo: <input type="text" name="pe_extensaoMTF_L4_S1_E1" class="descricao"></b></p>
                            <p><b>Esquerdo: <input type="text" name="pe_extensaoMTF_L4_S1_E2" class="descricao"></b></p>
                        </div>

                    </div>
                </div>
                <button type="submit" name="submit">Próxima página -></button>
            </div>
        </form>
    </body>
</html>