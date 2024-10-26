<?php 
session_start();
require("../../conexões/db.php");

$clientid = $_SESSION['id'];
$query = "SELECT nome FROM `paciente` WHERE idPaciente = $clientid;";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
if ($result) {
    $data = mysqli_fetch_assoc($result);
    $clientname = $data['nome'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas Marcadas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Custom CSS for visual improvements */
        .table-adjusted th, .table-adjusted td {
            padding: 10px 15px;
            text-align: center;
        }
        .appt {
            margin: 20px 0;
        }
        .appt .title h3 {
            padding: 10px 0;
            background-color: #f0f0f0;
        }
        .table-adjusted {
            width: 95%;
            margin: 0 auto;
        }
        .table-adjusted tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .table-adjusted th {
            background-color: #113838;
            color: white;
        }
        .no-appointments {
            margin-top: 15px;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
<div class="container-fluid pt-2 pb-2" style="background-color: #113838;">
    <div class="row">
        <div class="col-sm-10 ">
            <img width="200" class="ml-0 mt-2 mb-2" src="../../../../imagens/default_transparent.png">
        </div>
        <div class="col-sm-2">
            <h3 class="mr-0 text-white">Olá, <?php echo $clientname; ?>!</h3>
            <a href="../dashboard.php" class="btn btn-outline-light">Voltar para Tela Inicial</a>
        </div>
    </div>
</div>
<div class="container-fluid text-center" style="background-color: #79e3bd">
    <h2 class="pt-3 pb-3">Consultas do paciente</h2>
</div>

<div class="app">
    <!-- Consultas Hoje -->
    <div class="today">
        <div class="title">
            <h3 class='text-center'>CONSULTAS HOJE</h3>
        </div>
        <div class="appt">
        <?php
        $cid = $_SESSION["id"];
        $tdt = date("Y-m-d");
        $sql = "SELECT a.*, d.nome AS doutor_nome 
                FROM `consultas` a
                JOIN `doutor` d ON a.Doutor_idDoutor = d.idDoutor
                WHERE a.data = '$tdt' AND a.Paciente_idPaciente = '$cid';";
        $res = mysqli_query($con, $sql);
        
        if ($res) {
            if (mysqli_num_rows($res) > 0) {
                echo "<table class='table table-hover table-adjusted'>
                        <thead>
                            <tr>
                                <th>NÚMERO</th>
                                <th>DATA</th>
                                <th>HORÁRIO</th>
                                <th>DESCRIÇÃO</th>
                                <th>DOUTOR</th>
                            </tr>
                        </thead>
                        <tbody>";
                $no = 1;
                while ($row = mysqli_fetch_assoc($res)) {
                    $formattedDate = date("d/m/Y", strtotime($row["data"]));
                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$formattedDate}</td>
                            <td>{$row["horario"]}</td>
                            <td>{$row["descrição"]}</td>
                            <td>{$row['doutor_nome']}</td>
                        </tr>";
                    $no++;
                }
                echo "</tbody></table>";
            } else {
                echo "<div class='text-center no-appointments'>Sem consultas para hoje</div>";
            }
        }
        ?>
        </div>
    </div>
    <br><br>

    <!-- Consultas Futuras -->
    <div class="future">
        <div class="title">
            <h3 class='text-center'>CONSULTAS FUTURAS</h3>
        </div>
        <div class="appt">
        <?php
        $cid = $_SESSION["id"];
        $tdt = date("Y-m-d");
        $sql = "SELECT a.*, d.nome AS doutor_nome 
                FROM `consultas` a
                JOIN `doutor` d ON a.Doutor_idDoutor = d.idDoutor
                WHERE a.Paciente_idPaciente = '$cid' AND a.data > '$tdt';";
        $res = mysqli_query($con, $sql);

        if ($res) {
            if (mysqli_num_rows($res) > 0) {
                echo "<table class='table table-hover table-adjusted'>
                        <thead>
                            <tr>
                                <th>NÚMERO</th>
                                <th>DATA</th>
                                <th>HORÁRIO</th>
                                <th>DESCRIÇÃO</th>
                                <th>DOUTOR</th>
                            </tr>
                        </thead>
                        <tbody>";
                $no = 1;
                while ($row = mysqli_fetch_assoc($res)) {
                    $formattedDate = date("d/m/Y", strtotime($row["data"]));
                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$formattedDate}</td>
                            <td>{$row["horario"]}</td>
                            <td>{$row["descrição"]}</td>
                            <td>{$row['doutor_nome']}</td>
                        </tr>";
                    $no++;
                }
                echo "</tbody></table>";
            } else {
                echo "<div class='text-center no-appointments'>Sem consultas futuras</div>";
            }
        }
        ?>
        </div>
    </div>
    <br><br>

    <!-- Consultas Passadas -->
    <div class="past">
        <div class="title">
            <h3 class='text-center'>CONSULTAS PASSADAS</h3>
        </div>
        <div class="appt">
        <?php
        $cid = $_SESSION["id"];
        $tdt = date("Y-m-d");
        $sql = "SELECT a.*, d.nome AS doutor_nome 
                FROM `consultas` a
                JOIN `doutor` d ON a.Doutor_idDoutor = d.idDoutor
                WHERE a.data < '$tdt' AND a.Paciente_idPaciente = '$cid';";
        $res = mysqli_query($con, $sql);

        if ($res) {
            if (mysqli_num_rows($res) > 0) {
                echo "<table class='table table-hover table-adjusted'>
                        <thead>
                            <tr>
                                <th>NÚMERO</th>
                                <th>DATA</th>
                                <th>HORÁRIO</th>
                                <th>DESCRIÇÃO</th>
                                <th>DOUTOR</th>
                            </tr>
                        </thead>
                        <tbody>";
                $no = 1;
                while ($row = mysqli_fetch_assoc($res)) {
                    $formattedDate = date("d/m/Y", strtotime($row["data"]));
                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$formattedDate}</td>
                            <td>{$row["horario"]}</td>
                            <td>{$row["descrição"]}</td>
                            <td>{$row['doutor_nome']}</td>
                        </tr>";
                    $no++;
                }
                echo "</tbody></table>";
            } else {
                echo "<div class='text-center no-appointments'>Sem consultas passadas</div>";
            }
        }
        ?>
        </div>
    </div>
</div>
</body>
</html>