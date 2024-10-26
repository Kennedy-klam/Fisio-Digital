<?php 
session_start();
require("../../conexões/db.php");
$admid = $_SESSION['id'];
$query    = "SELECT * FROM `administrador` WHERE idAdministrador=$admid;";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
if($result) {
    $data = mysqli_fetch_assoc($result);
    $admnome = $data['nome'];
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

<div class="app">
    <div class="today">
        <div class="title">
            <h3 class='text-center'>HOJE</h3>
        </div>
        <div class="appt">
        <?php
        $tdt = date("Y-m-d");
        $sql = "SELECT a.*, c.nome AS paciente_nome, d.nome AS doutor_nome 
                FROM consultas a
                JOIN paciente c ON a.Paciente_idPaciente = c.idPaciente
                JOIN doutor d ON a.Doutor_idDoutor = d.idDoutor
                WHERE a.data = '$tdt'";
        $res = mysqli_query($con, $sql);
        
        if ($res && mysqli_num_rows($res) > 0) {
            echo "<table class='table table-hover table-adjusted'>
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
                $formattedDate = date('d/m/Y', strtotime($row["data"]));
                echo "<tr>
                        <td>" . $formattedDate . "</td>
                        <td>" . $row["horario"] . "</td>
                        <td>" . $row["descrição"] . "</td>
                        <td>" . $row["paciente_nome"] . "</td>
                        <td>" . $row["doutor_nome"] . "</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "<div class='text-center no-appointments'>Sem consultas hoje</div>";
        }
        ?>
        </div>
    </div>
    
    <!-- Consultas Futuras -->
    <div class="future">
        <div class="title">
            <h3 class='text-center'>FUTURO</h3>
        </div>
        <div class="appt">
        <?php
        $sql = "SELECT a.*, c.nome AS paciente_nome, d.nome AS doutor_nome 
                FROM consultas a
                JOIN paciente c ON a.Paciente_idPaciente = c.idPaciente
                JOIN doutor d ON a.Doutor_idDoutor = d.idDoutor
                WHERE a.data > '$tdt'";
        $res = mysqli_query($con, $sql);

        if ($res && mysqli_num_rows($res) > 0) {
            echo "<table class='table table-hover table-adjusted'>
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
                $formattedDate = date('d/m/Y', strtotime($row["data"]));
                echo "<tr>
                        <td>" . $formattedDate . "</td>
                        <td>" . $row["horario"] . "</td>
                        <td>" . $row["descrição"] . "</td>
                        <td>" . $row["paciente_nome"] . "</td>
                        <td>" . $row["doutor_nome"] . "</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "<div class='text-center no-appointments'>Sem consultas futuras</div>";
        }
        ?>
        </div>
    </div>
    
    <!-- Consultas Passadas -->
    <div class="past">
        <div class="title">
            <h3 class='text-center'>PASSADO</h3>
        </div>
        <div class="appt">
        <?php
        $sql = "SELECT a.*, c.nome AS paciente_nome, d.nome AS doutor_nome 
                FROM consultas a
                JOIN paciente c ON a.Paciente_idPaciente = c.idPaciente
                JOIN doutor d ON a.Doutor_idDoutor = d.idDoutor
                WHERE a.data < '$tdt'";
        $res = mysqli_query($con, $sql);
        
        if ($res && mysqli_num_rows($res) > 0) {
            echo "<table class='table table-hover table-adjusted'>  
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
                $formattedDate = date('d/m/Y', strtotime($row["data"]));
                echo "<tr>
                        <td>" . $formattedDate . "</td>
                        <td>" . $row["horario"] . "</td>
                        <td>" . $row["descrição"] . "</td>
                        <td>" . $row["paciente_nome"] . "</td>
                        <td>" . $row["doutor_nome"] . "</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "<div class='text-center no-appointments'>Sem atendimentos passados</div>";
        }
        ?>
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
