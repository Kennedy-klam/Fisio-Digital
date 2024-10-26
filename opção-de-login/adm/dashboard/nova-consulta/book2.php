<?php 
session_start();
require("../../conexões/db.php");

// Verifica se o clinicid e idPaciente estão na sessão
if (!isset($_SESSION['clinicid']) || !isset($_SESSION['idPaciente'])) {
    header("Location: book1.php");
    exit();
}

// Verifica se o nome do administrador está na sessão
if (!isset($_SESSION["nome"])) {
    $_SESSION['nome'] = "Administrador";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fisioterapeutas Disponíveis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid pt-2 pb-2" style="background-color: #113838">
        <div class="row">
            <div class="col-sm-10 ">
                <img width="200" class="ml-0 mt-2 mb-2" src="../../../../imagens/default_transparent.png" alt="Logo">
            </div>
            <div class="col-sm-2">
                <h3 class="text-white">Olá, <?= $_SESSION['nome'] ?>!</h3>
                <a href="../dashboard.php" class="btn btn-outline-light">Painel do Administrador</a>
            </div>
        </div>
    </div>

    <div class="container-fluid text-center" style="background-color:#79e3bd">
        <h2 class="pt-3 pb-3">Fisioterapeutas Disponíveis</h2>
    </div>

    <?php
    // Obtém o clinicid da sessão e prepara a consulta
    $clinicid = $_SESSION['clinicid'];
    $stmt = $con->prepare("SELECT * FROM doutor WHERE Clinica_idClinica = ?");
    $stmt->bind_param("i", $clinicid);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res && $res->num_rows > 0) {
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
                <th>Idade</th>
                <th>Sexo</th>
              </tr>
            </thead>";

        while ($row = $res->fetch_assoc()) {
            echo "<tr> 
                    <td><input type='radio' name='idDoutor' value='" . $row['idDoutor'] . "' required></td>
                    <td>" . $row["nome"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["celular"] . "</td>
                    <td>" . $row["especialidade"] . "</td>
                    <td>" . $row["idade"] . "</td>
                    <td>" . $row["sexo"] . "</td>
                  </tr>";
        }

        echo "</table></div><br><br>";
        // Passa o clinicid e idPaciente para a próxima página
        echo "<input type='hidden' name='clinicid' value='$clinicid'>";
        echo "<input type='hidden' name='idPaciente' value='" . $_SESSION['idPaciente'] . "'>";
        echo "<button type='submit' class='btn btn-dark' name='selectdoctor'>Selecionar Doutor</button>";
        echo "</form>";
    } else {
        echo "<h5 class='text-center'>Nenhum doutor encontrado para esta clínica.</h5>";
    }

    // Fecha a consulta
    $stmt->close();
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>