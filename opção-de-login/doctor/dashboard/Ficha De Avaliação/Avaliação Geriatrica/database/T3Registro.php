<?php
// Inclua a conexão com o banco de dados
include("../../../../../../database/dbConect.php");

// Capture os dados do formulário
$Consultas_idConsultas = 1; // Valor estático

$nota_sentar = $_POST['nota-sentar'] ?? null;
$nota_levantar = $_POST['nota-levantar'] ?? null;
$diag_fisio = $_POST['diag-fisio'] ?? null;
$objetivo = $_POST['objetivo'] ?? null;

$idFichaAvaliaçãoGeriatrica = 23; // Exemplo de ID, ajuste conforme necessário.

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

try {
    // Inserir na tabela fichaavaliaçãogeriatrica
    $sql1 = "INSERT INTO fichaavaliaçãogeriatrica (
        Consultas_idConsultas,
        nota_sentar, 
        nota_levantar, 
        diag_fisio, 
        objetivo
    ) VALUES (
        ?, ?, ?, ?, ?
    )";

    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("iiiss", $Consultas_idConsultas, $nota_sentar, $nota_levantar, $diag_fisio, $objetivo);

    if (!$stmt1->execute()) {
        throw new Exception("Erro ao inserir em fichaavaliaçãogeriatrica: " . $stmt1->error);
    }

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
        $pa_0, $pa_3, $pa_6,
        $fc_0, $fc_3, $fc_6,
        $sat_0, $sat_3, $sat_6,
        $fr_0, $fr_3, $fr_6,
        $borg_0, $borg_3, $borg_6,
        $distancia_percorrida, $distancia_prevista
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
?>
