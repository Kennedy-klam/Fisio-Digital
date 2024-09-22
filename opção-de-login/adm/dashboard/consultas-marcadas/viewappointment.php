<?php 
session_start();
require("../../conexões/db.php");
$admid = $_SESSION['id'];
$query    = "SELECT * FROM `loginadm` WHERE admid=$admid;";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
if($result) {
    $data = mysqli_fetch_assoc($result);
    $admnome = $data['admnome'];
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas Marcadas</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid pt-2 pb-2" style="background-color: #113838;">
    <div class="row">
        <div class="col-sm-10">
            <img width="200" class="ml-0 mt-2 mb-2" src="../../../../imagens/default_transparent.png">
        </div>
        <div class="col-sm-2">
        <h3 class="mr-0 text-white">Olá, <?php echo $admnome; ?>!</h3>
            <a href="../dashboard.php" class="btn btn-outline-light">Voltar para Tela Inicial</a>
        </div>
    </div>
</div>

<div class="container-fluid text-center" style="background-color: #79e3bd">
    <div class="h-25 d-inline-block">
        <h2 class="pt-3 pb-3">Todas as Consultas Marcadas</h2>
    </div>
</div>

<div class="container">
    <div class="app">
        <div class="today">
            <div class="title table-title">
                <h3 class='text-center'>HOJE</h3>
            </div>
            <div class="appt">
            <?php
            $tdt = date("Y-m-d");
            $sql = "SELECT a.*, c.clientname, d.doctorname FROM appointment a
                    JOIN loginc c ON a.clientid = c.clientid
                    JOIN logind d ON a.doctorid = d.doctorid
                    WHERE a.date = '$tdt'";
            $res = mysqli_query($con, $sql);
            
            if ($res) {   
                if (mysqli_num_rows($res)) {
                    echo "<table class='table table-hover'>  
                    <thead>
                    <tr>
                        <th>DATA</th>
                        <th>HORÁRIO</th>
                        <th>DESCRIÇÃO</th>
                        <th>PACIENTE</th>
                        <th>DOUTOR</th>
                    </tr>
                    </thead>";
                    while ($row = mysqli_fetch_assoc($res)) {
                        $formattedDate = date('d/m/Y', strtotime($row["date"]));
                        echo "<tr>
                            <td>" . $formattedDate . "</td>
                            <td>" . $row["timeslot"] . "</td>
                            <td>" . $row["description"] . "</td>
                            <td>" . $row["clientname"] . "</td>
                            <td>" . $row["doctorname"] . "</td>
                        </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<div class='text-center'>Sem consultas para hoje</div>";
                }
            }
            ?>
            </div>
        </div>

        <div class="future">
            <div class="title table-title">
                <h3 class='text-center'>FUTURO</h3>
            </div>
            <div class="appt">
            <?php
            $sql = "SELECT a.*, c.clientname, d.doctorname FROM appointment a
                    JOIN loginc c ON a.clientid = c.clientid
                    JOIN logind d ON a.doctorid = d.doctorid
                    WHERE a.date > '$tdt'";
            $res = mysqli_query($con, $sql);

            if ($res) {
                if (mysqli_num_rows($res)) {
                    echo "<table class='table table-hover'>
                            <thead>
                                <tr>
                                    <th>DATA</th>
                                    <th>HORÁRIO</th>
                                    <th>DESCRIÇÃO</th>
                                    <th>PACIENTE</th>
                                    <th>DOUTOR</th>
                                </tr>
                            </thead>";
                    while ($row = mysqli_fetch_assoc($res)) {
                        $formattedDate = date('d/m/Y', strtotime($row["date"]));
                        echo "<tr>
                                <td>" . $formattedDate . "</td>
                                <td>" . $row["timeslot"] . "</td>
                                <td>" . $row["description"] . "</td>
                                <td>" . $row["clientname"] . "</td>
                                <td>" . $row["doctorname"] . "</td>
                              </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<div class='text-center'>Sem consultas futuras</div>";
                }
            }
            ?>
            </div>
        </div>

        <div class="past">
            <div class="title table-title">
                <h3 class='text-center'>PASSADO</h3>
            </div>
            <div class="appt">
            <?php
            $sql = "SELECT a.*, c.clientname, d.doctorname FROM appointment a
                    JOIN loginc c ON a.clientid = c.clientid
                    JOIN logind d ON a.doctorid = d.doctorid
                    WHERE a.date < '$tdt'";
            $res = mysqli_query($con, $sql);
            
            if ($res) {   
                if (mysqli_num_rows($res)) {
                    echo "<table class='table table-hover'>  
                    <thead>
                        <tr>
                            <th>DATA</th>
                            <th>HORÁRIO</th>
                            <th>DESCRIÇÃO</th>
                            <th>PACIENTE</th>
                            <th>DOUTOR</th>
                        </tr>
                    </thead>";
                    while ($row = mysqli_fetch_assoc($res)) {
                        $formattedDate = date('d/m/Y', strtotime($row["date"]));
                        echo "<tr>
                            <td>" . $formattedDate . "</td>
                            <td>" . $row["timeslot"] . "</td>
                            <td>" . $row["description"] . "</td>
                            <td>" . $row["clientname"] . "</td>
                            <td>" . $row["doctorname"] . "</td>
                        </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<div class='text-center'>Sem atendimentos passados</div>";
                }
            }
            ?>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>