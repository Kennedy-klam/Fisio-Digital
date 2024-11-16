<?php
//include auth_session.php file on all user panel pages
include("../../conexões/protect.php");
require('../../conexões/db.php');

$doctorid = $_SESSION['id'];
$query = "SELECT nome FROM `doutor` WHERE idDoutor = $doctorid;";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
if ($result) {
    $data = mysqli_fetch_assoc($result);
    $doctorname = $data['nome'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        /* Custom CSS for visual improvements */
        .table-adjusted th,
        .table-adjusted td {
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
                <h3 class="mr-0 text-white">Olá, <?php echo $doctorname; ?>!</h3>
                <a href="../dashboard.php" class="btn btn-outline-light">Painel do Doutor</a>
            </div>
        </div>
    </div>

    <div class="container-fluid text-center" style="background-color: #79e3bd;">
        <h2 class="pt-3 pb-3">Menu de Consultas</h2>
    </div>

    <!-- Consultas Hoje -->
    <div class="app">
        <div class="today">
            <div class="title">
                <h3 class='text-center'>CONSULTAS HOJE</h3>
            </div>
            <div class="appt">
                <?php
                $today = date("Y-m-d");
                $qry1 = "SELECT a.*, p.nome AS paciente_nome 
                 FROM `consultas` a
                 JOIN `paciente` p ON a.Paciente_idPaciente = p.idPaciente
                 WHERE a.Doutor_idDoutor = '$doctorid' AND a.data = '$today';";
                $ans1 = mysqli_query($con, $qry1);

                if ($ans1 && mysqli_num_rows($ans1) > 0) {
                    echo "<table class='table table-hover table-adjusted'>
                            <thead>
                                <tr>
                                    <th>NÚMERO</th>
                                    <th>ID DA CONSULTA</th>
                                    <th>DATA</th>
                                    <th>NOME DO PACIENTE</th>
                                    <th>HORÁRIO</th>
                                    <th>DESCRIÇÃO</th>
                                </tr>
                            </thead>
                            <tbody>";
                    $no = 1;
                    while ($data1 = mysqli_fetch_assoc($ans1)) {
                        echo "<tr onclick=\"window.location.href='detalhes_paciente.php?idPaciente={$data1['Paciente_idPaciente']}'\" style='cursor: pointer;'>";
                        echo "<td>{$no}</td>";
                        echo "<td>{$data1['idConsultas']}</td>";
                        echo "<td>" . date("d/m/Y", strtotime($data1['data'])) . "</td>";
                        echo "<td>{$data1['paciente_nome']}</td>";
                        echo "<td>{$data1['horario']}</td>";
                        echo "<td>{$data1['descrição']}</td>";
                        echo "</tr>";
                        $no++;
                    }
                    echo "</tbody></table>";
                }
                 else {
                    echo "<div class='text-center no-appointments'>Sem consultas hoje</div>";
                }
                ?>
            </div>
        </div>

        <!-- Consultas Futuras -->
        <div class="future">
            <div class="title">
                <h3 class='text-center'>CONSULTAS FUTURAS</h3>
            </div>
            <div class="appt">
                <?php
                $qry1 = "SELECT a.*, p.nome AS paciente_nome 
                 FROM `consultas` a
                 JOIN `paciente` p ON a.Paciente_idPaciente = p.idPaciente
                 WHERE a.Doutor_idDoutor = '$doctorid' AND a.data > '$today';";
                $ans1 = mysqli_query($con, $qry1);

                if ($ans1 && mysqli_num_rows($ans1) > 0) {
                    echo "<table class='table table-hover table-adjusted'>
            <thead>
                <tr>
                    <th>NÚMERO</th>
                    <th>ID DA CONSULTA</th>
                    <th>DATA</th>
                    <th>NOME DO PACIENTE</th>
                    <th>HORÁRIO</th>
                    <th>DESCRIÇÃO</th>
                </tr>
            </thead>
            <tbody>";
                    $no = 1;
                    while ($data1 = mysqli_fetch_assoc($ans1)) {
                        echo "<tr onclick=\"window.location.href='../Ficha de Avaliação/Avaliação Traumatoortopedica/Tela1e2/tela1.php?idPaciente={$data1['Paciente_idPaciente']}'\" style='cursor: pointer;'>";
                        echo "<td>{$no}</td>";
                        echo "<td>{$data1['idConsultas']}</td>";
                        echo "<td>" . date("d/m/Y", strtotime($data1['data'])) . "</td>";
                        echo "<td>{$data1['paciente_nome']}</td>";
                        echo "<td>{$data1['horario']}</td>";
                        echo "<td>{$data1['descrição']}</td>";
                        echo "</tr>";
                        $no++;
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<div class='text-center no-appointments'>Sem consultas futuras</div>";
                }
                ?>
            </div>
        </div>

        <!-- Consultas Passadas -->
        <div class="past">
            <div class="title">
                <h3 class='text-center'>CONSULTAS PASSADAS</h3>
            </div>
            <div class="appt">
                <?php
                $qry1 = "SELECT a.*, p.nome AS paciente_nome 
                 FROM `consultas` a
                 JOIN `paciente` p ON a.Paciente_idPaciente = p.idPaciente
                 WHERE a.Doutor_idDoutor = '$doctorid' AND a.data < '$today';";
                $ans1 = mysqli_query($con, $qry1);

                if ($ans1 && mysqli_num_rows($ans1) > 0) {
                    echo "<table class='table table-hover table-adjusted'>
            <thead>
                <tr>
                    <th>NÚMERO</th>
                    <th>ID DA CONSULTA</th>
                    <th>DATA</th>
                    <th>NOME DO PACIENTE</th>
                    <th>HORÁRIO</th>
                    <th>DESCRIÇÃO</th>
                </tr>
            </thead>
            <tbody>";
                    $no = 1;
                    while ($data1 = mysqli_fetch_assoc($ans1)) {
                        echo "<tr onclick=\"window.location.href='detalhes_paciente.php?idPaciente={$data1['Paciente_idPaciente']}'\" style='cursor: pointer;'>";
                        echo "<td>{$no}</td>";
                        echo "<td>{$data1['idConsultas']}</td>";
                        echo "<td>" . date("d/m/Y", strtotime($data1['data'])) . "</td>";
                        echo "<td>{$data1['paciente_nome']}</td>";
                        echo "<td>{$data1['horario']}</td>";
                        echo "<td>{$data1['descrição']}</td>";
                        echo "</tr>";
                        $no++;
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<div class='text-center no-appointments'>Sem consultas passadas</div>";
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz4fnFO9gybKXwEw8xW9F26gB+7cU52G02H70y4c0oFAEJ1WQQG0y4Ciwv"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-wXy0E1jX4JYj18C38cG0pVIT9u8iJwxP5C6zFfS9E8I2cC9FzzJ2KMyPeyKw6W8"
        crossorigin="anonymous"></script>
</body>

</html>