<?php
session_start();
include("../../conexões/db.php");

// Verificando se as sessões necessárias estão definidas
if (!isset($_SESSION["docid"]) || !isset($_SESSION["nome"]) || !isset($_SESSION["clinicid"])) {
    die("Erro: Sessão não iniciada corretamente.");
}

// Pegando o ID do médico da sessão
$di = $_SESSION["docid"];

// Buscando informações do médico
$sql = "SELECT * FROM logind WHERE doctorid='$di'";
$res = mysqli_query($con, $sql);
if ($res) {   
    if (mysqli_num_rows($res)) {
        while ($row = mysqli_fetch_assoc($res)) {
            $d = $row["doctorname"];
            $f = $row["fee"];
            $sp = $row["speciality"];
            $deg = $row["degree"];
            $exp = $row["experience"];
        }
    } else {
        die("Erro: Médico não encontrado.");
    }
} else {
    die("Erro ao consultar informações do médico.");
}

// Pegando o nome do cliente da sessão
$u = $_SESSION["nome"];

// Buscando o ID do cliente no banco de dados
$sql = "SELECT * FROM loginc WHERE clientname='$u'";
$res = mysqli_query($con, $sql);
if ($res) {   
    if (mysqli_num_rows($res)) {
        while ($row = mysqli_fetch_assoc($res)) {
            $uid = $row["clientid"];
        }
    } else {
        die("Erro: Cliente não encontrado.");
    }
} else {
    die("Erro ao consultar informações do cliente.");
}
$_SESSION["clientid"] = $uid;

// Pegando o ID da clínica da sessão
$ci = $_SESSION["clinicid"];

// Buscando informações da clínica
$sql = "SELECT * FROM cliniclogin WHERE clinicid='$ci'";
$res = mysqli_query($con, $sql);
if ($res) {   
    if (mysqli_num_rows($res)) {
        while ($row = mysqli_fetch_assoc($res)) {
            $cname = $row["clinicname"];
            $ph = $row["phoneno"];
            $cadd = $row["address"];
        }
    } else {
        die("Erro: Clínica não encontrada.");
    }
} else {
    die("Erro ao consultar informações da clínica.");
}

$mysqli = new mysqli('localhost', 'root', '', 'fisio digital');

// Verificando se a data foi passada via GET
if (isset($_GET['date'])) {
    $date = $_GET['date'];
    $stmt = $mysqli->prepare("SELECT * FROM appointment WHERE date = ?");
    $stmt->bind_param('s', $date);
    $bookings = array();
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $bookings[] = $row['timeslot'];
            }
            $stmt->close();
        } 
    }
}

// Processo para agendar a consulta
if (isset($_POST['submit'])) {
    $timeslot = $_POST["timeslot"];
    $descp = $_POST["decription"];
    
    // Verificando se o slot já está ocupado
    $stmt = $mysqli->prepare("SELECT * FROM appointment WHERE date=? AND timeslot=?");
    $stmt->bind_param('ss', $date, $timeslot);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $msg = "<div class='alert alert-danger'>Indisponível</div>"; 
        } else {
            // Inserindo a consulta no banco de dados
            $stmt = $mysqli->prepare("INSERT INTO appointment (date, timeslot, description, clientid, doctorid) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param('sssii', $date, $timeslot, $descp, $uid, $di);
            $stmt->execute();
            $msg = "<div class='alert alert-success'>Consulta Agendada!</div>";
            $bookings[] = $timeslot;
            $stmt->close();
            $mysqli->close();
            header("Location: ../dashboard.php"); // Redireciona para o painel após o agendamento
            exit();
        } 
    }
}

// Função para gerar os horários disponíveis
$duration = 20;
$cleanup = 0;
$start = "9:00";
$end = "15:00";
function timeslots($duration, $cleanup, $start, $end) {
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT" . $duration . "M");
    $cleanupInterval = new DateInterval("PT" . $cleanup . "M");
    $slots = array();

    for ($intStart = $start; $intStart < $end; $intStart->add($interval)->add($cleanupInterval)) {
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if ($endPeriod > $end) {
            break;
        }
        $slots[] = $intStart->format("H:iA") . "-" . $endPeriod->format("H:iA");
    }
    return $slots;
}
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento de Consulta</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <style>
    .hm {
        float:right;
        padding: 25px 100px 0 0;
    }
    </style>
  </head>
  <body>
    <div class="hm">
      <a href="../dashboard.php" class="btn btn-primary">Painel do Paciente</a>
    </div>

    <div class="container">
      <h1 class="text-center">Data da consulta: <?php echo date('d/m/Y', strtotime($date)); ?></h1>
      <hr>
      <div class="row">
        <div class="col-md-12">
          <?php echo isset($msg) ? $msg : ""; ?>
        </div>

        <?php
        $timeslot = timeslots($duration, $cleanup, $start, $end);  
        foreach ($timeslot as $ts) {
        ?>
          <div class="col-md-2">
            <div class="form-group">
              <?php if (in_array($ts, $bookings)) { ?>
                <button class="btn btn-danger"><?php echo $ts; ?></button>
              <?php } else { ?>
                <button class="btn btn-success book" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h1 class="modal-title">Marcação da Consulta</h1>
          </div>
          <div class="modal-body">
            <h4>
              DATA: <?php echo date('d/m/Y', strtotime($date)); ?><br><br>
              HORÁRIO: <span id="slot"></span><br><br>
              Nome: <?php echo "$u (ID= $uid)"; ?><hr>
              Doutor: <?php echo "$d (ID= $di)"; ?><br><br>
              Salário: <?php echo "$f"; ?><br><br>
              Especialidade: <?php echo "$sp"; ?><br><br>
              Grau: <?php echo "$deg"; ?><br><br>
              Experiência (em ANOS): <?php echo "$exp"; ?><hr>
              Nome da Clínica: <?php echo "$cname (ID= $ci)"; ?><br><br>
              Endereço: <?php echo "$cadd"; ?><br><br>
              Número de Contato da Clínica: <?php echo "$ph"; ?><br><br>
            </h4>
            <div class="row">
              <div class="col-md-12">
                <form action="" method="POST">
                  <div class="form-group">
                    <label for="timeslot">Horário</label>
                    <input required type="text" readonly name="timeslot" id="timeslot" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="decription">Descrição/Sintomas</label>
                    <textarea class="form-control" rows="5" name="decription"></textarea>
                  </div>
                  <div class="form-group pull-right">
                    <button class="btn btn-primary" type="submit" name="submit">MARCAR CONSULTA</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
      $(".book").click(function() {
        var timeslot = $(this).attr('data-timeslot');
        $("#slot").html(timeslot);
        $("#timeslot").val(timeslot);
        $("#myModal").modal("show");
      });
    </script>
  </body>
</html>