<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();

// Verifica se o doutor foi selecionado
if (isset($_GET["selectdoctor"])) {
    if (isset($_GET['docid']) && is_numeric($_GET['docid'])) {
        $_SESSION["docid"] = $_GET['docid'];
    } else {
        // Redireciona ou exibe erro se o docid for inválido
        die("Doutor inválido.");
    }
}

// Função para construir o calendário
function build_calendar($month, $year, $mysqli) {
    // Array contendo os dias da semana em português
    $daysOfWeek = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado');

    // Primeiro dia do mês
    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

    // Número de dias no mês
    $numberDays = date('t', $firstDayOfMonth);

    // Informações sobre o primeiro dia do mês
    $dateComponents = getdate($firstDayOfMonth);

    // Nome do mês em português
    setlocale(LC_TIME, 'pt_BR.utf8', 'pt_BR', 'Portuguese_Brazil');
    $monthName = ucfirst(strftime('%B', $firstDayOfMonth));

    // Índice do primeiro dia da semana
    $dayOfWeek = $dateComponents['wday'];

    // Data de hoje
    $datetoday = date('Y-m-d');

    // Início da construção do calendário
    $calendar = "<table class='table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year</h2>";

    // Links para navegação entre os meses
    $calendar .= "<a class='btn btn-xs btn-dark' href='?month=" . date('m', mktime(0, 0, 0, $month - 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month - 1, 1, $year)) . "'>Mês anterior</a> ";
    $calendar .= " <a class='btn btn-xs btn-dark' href='?month=" . date('m') . "&year=" . date('Y') . "'>Mês atual</a> ";
    $calendar .= "<a class='btn btn-xs btn-dark' href='?month=" . date('m', mktime(0, 0, 0, $month + 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month + 1, 1, $year)) . "'>Próximo mês</a></center><br>";

    $calendar .= "<tr>";

    // Cabeçalhos do calendário
    foreach ($daysOfWeek as $day) {
        $calendar .= "<th class='header'>$day</th>";
    }

    // Contador do dia
    $currentDay = 1;

    $calendar .= "</tr><tr>";

    // Ajuste para alinhar o primeiro dia do mês no calendário
    if ($dayOfWeek > 0) {
        for ($k = 0; $k < $dayOfWeek; $k++) {
            $calendar .= "<td class='empty'></td>";
        }
    }

    $month = str_pad($month, 2, "0", STR_PAD_LEFT);

    while ($currentDay <= $numberDays) {
        // Nova linha após o sábado
        if ($dayOfWeek == 7) {
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }

        // Data atual formatada
        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        // Verifica o nome do dia e a disponibilidade
        $dayname = strtolower(date('l', strtotime($date)));
        $today = $date == date('Y-m-d') ? "today" : "";

        // Dias indisponíveis (domingo ou datas passadas)
        if ($dayname == 'sunday') {
            $calendar .= "<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>Sem atendimentos</button>";
        } elseif ($date < date('Y-m-d')) {
            $calendar .= "<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>Indisponível</button>";
        } else {
            // Verifica a disponibilidade de agendamentos
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

    // Preenche o restante dos dias da última semana
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
    $stmt = $mysqli->prepare("SELECT * FROM appointment WHERE date = ?");
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
       @media only screen and (max-width: 760px),
        (min-device-width: 802px) and (max-device-width: 1020px) {

            /* Force table to not be like tables anymore */
            table, thead, tbody, th, td, tr {
                display: block;

            }
            
            

            .empty {
                display: none;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            th {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border: 1px solid #ccc;
            }

            td {
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }



            /*
		Label the data
		*/
            td:nth-of-type(1):before {
                content: "Sunday";
            }
            td:nth-of-type(2):before {
                content: "Monday";
            }
            td:nth-of-type(3):before {
                content: "Tuesday";
            }
            td:nth-of-type(4):before {
                content: "Wednesday";
            }
            td:nth-of-type(5):before {
                content: "Thursday";
            }
            td:nth-of-type(6):before {
                content: "Friday";
            }
            td:nth-of-type(7):before {
                content: "Saturday";
            }


        }

        /* Smartphones (portrait and landscape) ----------- */

        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
            body {
                padding: 0;
                margin: 0;
            }
        }

        /* iPads (portrait and landscape) ----------- */

        @media only screen and (min-device-width: 802px) and (max-device-width: 1020px) {
            body {
                width: 495px;
            }
        }

        @media (min-width:641px) {
            table {
                table-layout: fixed;
            }
            td {
                width: 33%;
            }
        }
        
        .row{
            margin-top: 20px;
        }
        
        .today{
            background:yellow;
        }
        .hm{
            float:right;
            margin:20px 100px 0 0;        
        }
        .mycontainer{
            width:80%;
            margin:auto;
            display:flex;
            justify-content:space-between;
        }
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
                // Verifica o mês e ano atuais ou usa parâmetros da URL
                $dateComponents = getdate();
                if (isset($_GET['month']) && isset($_GET['year']) && is_numeric($_GET['month']) && is_numeric($_GET['year'])) {
                    $month = $_GET['month'];
                    $year = $_GET['year'];
                } else {
                    $month = $dateComponents['mon'];
                    $year = $dateComponents['year'];
                }

                // Conexão com o banco de dados
                $mysqli = new mysqli('localhost', 'root', '', 'fisio digital');
                if ($mysqli->connect_error) {
                    die("Erro de conexão: " . $mysqli->connect_error);
                }

                // Gera o calendário
                build_calendar($month, $year, $mysqli);

                // Fecha a conexão com o banco de dados
                $mysqli->close();
                ?>
            </div>
        </div>
    </div>
</body>

</html>