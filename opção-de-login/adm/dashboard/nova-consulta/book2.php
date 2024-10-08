<?php
session_start();
require("../../conexões/db.php");

// Verifica se o clinicid e o clientid estão na sessão
if (!isset($_SESSION['clinicid']) || !isset($_SESSION['clientid'])) {
    // Se não estiverem, redireciona para a página de seleção de clínica ou paciente
    header("Location: book1.php");
    exit();
}

if (!isset($_SESSION["admnome"])) {
    // Caso o nome do administrador não esteja na sessão, redireciona ou trata o erro.
    $_SESSION['admnome'] = "Administrador";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fisioterapeutas Disponíveis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid pt-2 pb-2" style="background-color: #113838">
        <div class="row">
            <div class="col-sm-10 ">
                <img width="200" class="ml-0 mt-2 mb-2" src="../consultas-marcadas/default_transparent.png">
            </div>
            <div class="col-sm-2">
                <h3 class="mr-0 text-white">Olá, <?php echo $_SESSION['admnome']; ?>!</h3>
                <a href="../dashboard.php" class="btn btn-outline-light">Painel do Paciente</a>
            </div>
        </div>
    </div>
    <div class="container-fluid text-center" style="background-color:#79e3bd">
        <div class="">
            <h2 class="pt-3 pb-3">Fisioterapeutas Disponíveis</h2>
        </div>
    </div>

    <?php
    // Obtém o clinicid da sessão e prepara a consulta
    $clinicid = $_SESSION['clinicid'];
    $stmt = $con->prepare("SELECT * FROM logind WHERE clinicid = ?");
    $stmt->bind_param("i", $clinicid);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res && mysqli_num_rows($res)) {
        echo "<form action='book3.php' method='GET' class='text-center'>";
        echo "<div class='table-responsive'>
            <table class='table table-hover'>
            <thead>
              <tr>
                <th></th>
                <th>Nome do Doutor</th>
                <th>E-mail do Doutor</th>
                <th>Número do Doutor</th>
                <th>Especialidade</th>
                <th>Avaliação</th>
                <th>Grau</th>
                <th>Experiência</th>
                <th>Idade</th>
                <th>Salário</th>
              </tr>
            </thead>";

        while ($row = mysqli_fetch_assoc($res)) {
            echo "<tr> 
                    <td><input type='radio' name='docid' value='" . $row['doctorid'] . "' required></td>
                    <td>" . $row["doctorname"] . "</td>
                    <td>" . $row["doctoremail"] . "</td>
                    <td>" . $row["phoneno"] . "</td>
                    <td>" . $row["speciality"] . "</td>
                    <td>" . $row["rating"] . "</td>
                    <td>" . $row["degree"] . "</td>
                    <td>" . $row["experience"] . "</td>
                    <td>" . $row["age"] . "</td>
                    <td>" . $row["fee"] . "</td>
                  </tr>";
        }

        echo "</table></div><br><br>";
        // Passa o clinicid e clientid para a próxima página
        echo "<input type='hidden' name='clinicid' value='$clinicid'>";
        echo "<input type='hidden' name='clientid' value='" . $_SESSION['clientid'] . "'>";
        echo "<button type='submit' class='btn btn-dark' value='selectdoctor' name='selectdoctor'>Selecionar Doutor</button>";
        echo "</form>";
    } else {
        echo "<h5 class='text-center'>Nenhum doutor encontrado para esta clínica.</h5>";
    }

    // Fecha a consulta
    $stmt->close();
    ?>

</body>

</html>