<?php
session_start();
require("../../conexões/conexao.php");

if (session_status() == PHP_SESSION_NONE) {
    die("Erro: A sessão não foi iniciada.");
}

date_default_timezone_set('America/Sao_Paulo');

// Verifica se o doutor e paciente foram selecionados
if (isset($_GET["selectdoctor"])) {
    if (isset($_GET['idDoutor']) && is_numeric($_GET['idDoutor'])) {
        $_SESSION["idDoutor"] = $_GET['idDoutor'];
    } else {
        die("Doutor inválido.");
    }
    
    if (isset($_GET['idPaciente']) && is_numeric($_GET['idPaciente'])) {
        $_SESSION["idPaciente"] = $_GET['idPaciente'];

        // Obtendo o nome do cliente com base no clientid
        $stmt = $mysqli->prepare("SELECT nome FROM paciente WHERE idPaciente = ?");
        $stmt->bind_param('i', $_SESSION["idPaciente"]);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION["nome"] = $row['nome']; // Armazenando o nome do cliente na sessão
        } else {
            die("Cliente não encontrado.");
        }

        $stmt->close();
    } else {
        die("Paciente inválido.");
    }
}

// Verifica se o clinicid já está definido
if (!isset($_SESSION["idClinica"])) {
    $stmt = $mysqli->prepare("SELECT Clinica_idClinica FROM doutor WHERE idDoutor = ?");
    $stmt->bind_param('i', $_SESSION["idDoutor"]);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION["idClinica"] = $row['Clinica_idClinica'];
    } else {
        die("Clínica não encontrada.");
    }
    $stmt->close();
}
    function build_calendar($month, $year, $mysqli) {
        $daysOfWeek = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado');
        $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
        $numberDays = date('t', $firstDayOfMonth);
        $dateComponents = getdate($firstDayOfMonth);
        $dateObj = DateTime::createFromFormat('Y-m-d', "$year-$month-01");
        $monthName = ucfirst($dateObj->format('F')); // Obtém o nome do mês em inglês
        $monthsInPortuguese = [
            'January' => 'Janeiro', 'February' => 'Fevereiro', 'March' => 'Março',
            'April' => 'Abril', 'May' => 'Maio', 'June' => 'Junho',
            'July' => 'Julho', 'August' => 'Agosto', 'September' => 'Setembro',
            'October' => 'Outubro', 'November' => 'Novembro', 'December' => 'Dezembro'
        ];
        $monthName = $monthsInPortuguese[$monthName] ?? $monthName;
    
        $dayOfWeek = $dateComponents['wday'];
        $datetoday = date('Y-m-d');    

    $calendar = "<table class='table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year</h2>";
    $calendar .= "<a class='btn btn-xs btn-dark' href='?month=" . date('m', mktime(0, 0, 0, $month - 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month - 1, 1, $year)) . "'>Mês anterior</a> ";
    $calendar .= "<a class='btn btn-xs btn-dark' href='?month=" . date('m') . "&year=" . date('Y') . "'>Mês atual</a> ";
    $calendar .= "<a class='btn btn-xs btn-dark' href='?month=" . date('m', mktime(0, 0, 0, $month + 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month + 1, 1, $year)) . "'>Próximo mês</a></center><br>";

    $calendar .= "<tr>";
    foreach ($daysOfWeek as $day) {
        $calendar .= "<th class='header'>$day</th>";
    }

    $currentDay = 1;
    $calendar .= "</tr><tr>";

    if ($dayOfWeek > 0) {
        for ($k = 0; $k < $dayOfWeek; $k++) {
            $calendar .= "<td class='empty'></td>";
        }
    }

    $month = str_pad($month, 2, "0", STR_PAD_LEFT);

    while ($currentDay <= $numberDays) {
        if ($dayOfWeek == 7) {
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }

        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";
        $dayname = strtolower(date('l', strtotime($date)));
        $today = $date == date('Y-m-d') ? "today" : "";

        if ($dayname == 'sunday') {
            $calendar .= "<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>Sem atendimentos</button>";
        } elseif ($date < date('Y-m-d')) {
            $calendar .= "<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>Indisponível</button>";
        } else {
            $totalbookings = checkSlots($mysqli, $date);
            if ($totalbookings == 36) {
                $calendar .= "<td class='$today'><h4>$currentDay</h4> <a href='#' class='btn btn-danger btn-xs'>Agenda cheia</a>";
            } else {
                $availableslots = 36 - $totalbookings;
                $calendar .= "<td class='$today'><h4>$currentDay</h4> <a href='book4.php?date=" . $date . "' class='btn btn-success btn-xs'>Agendar</a> <small><i>$availableslots agendamentos sobrando</i></small>";
            }
        }

        $calendar .= "</td>";
        $currentDay++;
        $dayOfWeek++;
    }

    if ($dayOfWeek != 7) {
        $remainingDays = 7 - $dayOfWeek;
        for ($l = 0; $l < $remainingDays; $l++) {
            $calendar .= "<td class='empty'></td>";
        }
    }

    $calendar .= "</tr>";
    $calendar .= "</table>";

    echo $calendar;
}

// Função para verificar slots disponíveis
function checkSlots($mysqli, $date) {
    $stmt = $mysqli->prepare("SELECT * FROM consultas WHERE data = ?");
    $stmt->bind_param('s', $date);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->num_rows;
}
?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <style>
       /* Estilos responsivos e personalizados */
       @media only screen and (max-width: 760px),
        (min-device-width: 802px) and (max-device-width: 1020px) {

            table, thead, tbody, th, td, tr {
                display: block;
            }
            .empty {
                display: none;
            }
            th {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }
            tr {
                border: 1px solid #ccc;
            }
            td {
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }
            td:nth-of-type(1):before { content: "Domingo"; }
            td:nth-of-type(2):before { content: "Segunda"; }
            td:nth-of-type(3):before { content: "Terça"; }
            td:nth-of-type(4):before { content: "Quarta"; }
            td:nth-of-type(5):before { content: "Quinta"; }
            td:nth-of-type(6):before { content: "Sexta"; }
            td:nth-of-type(7):before { content: "Sábado"; }
        }

        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
            body { padding: 0; margin: 0; }
        }

        @media only screen and (min-device-width: 802px) and (max-device-width: 1020px) {
            body { width: 495px; }
        }

        @media (min-width:641px) {
            table { table-layout: fixed; }
            td { width: 33%; }
        }

        .row { margin-top: 20px; }
        .today { background: yellow; }
        .mycontainer { width:80%; margin:auto; display:flex; justify-content:space-between; }
    </style>
</head>

<body>
    <div class="mycontainer">
        <a href="book1.php" class="btn btn-dark">Voltar</a>
        <a href="../dashboard.php" class="btn btn-dark">Painel do Paciente</a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                $dateComponents = getdate();
                if (isset($_GET['month']) && isset($_GET['year']) && is_numeric($_GET['month']) && is_numeric($_GET['year'])) {
                    $month = $_GET['month'];
                    $year = $_GET['year'];
                } else {
                    $month = $dateComponents['mon'];
                    $year = $dateComponents['year'];
                }

                build_calendar($month, $year, $mysqli);
                $mysqli->close();
                ?>
            </div>
        </div>
    </div>
</body>
</html>
