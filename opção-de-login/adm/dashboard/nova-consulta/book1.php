<?php
session_start();
require('../../conexões/db.php');

// Verifica se o ID do paciente está na sessão
if (!isset($_SESSION["idPaciente"])) {
    header("Location: book0.5.php");
    exit();
}

// Verifica se o nome do administrador está na sessão
if (!isset($_SESSION["nome"])) {
    $_SESSION['nome'] = "Administrador";
}

// Armazena o clinicid na sessão ao selecionar uma clínica
if (isset($_GET["selectclinic"])) {
    $_SESSION["clinicid"] = $_GET['clinicid'];
    header("Location: book2.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procurar Clínica</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid pt-2 pb-2" style="background-color: #113838">
        <div class="row">
            <div class="col-sm-10">
                <img width="200" class="ml-0 mt-2 mb-2" src="../consultas-marcadas/default_transparent.png" alt="Logo">
            </div>
            <div class="col-sm-2">
                <h3 class="text-white">Olá, <?= $_SESSION['nome'] ?>!</h3>
                <a href="../dashboard.php" class="btn btn-outline-light">Painel do Administrador</a>
            </div>
        </div>
    </div>

    <div class="container-fluid text-center" style="background-color:#79e3bd">
        <h2 class="pt-3 pb-3">Procurar Clínica</h2>
    </div>

    <form action="" class="w-50 m-auto">
        <div class="form-group row">
            <label class="align-self-center m-2">Coloque o local</label>
            <input type="text" class="form-control w-50 align-self-center m-2" name="localização" placeholder="Digite o local da clínica">
            <button type="submit" class="btn btn-dark align-self-center m-2" name="search">Procurar Clínicas</button>
        </div>
    </form>
    
    <hr>
    <h2 class="text-center">Clínicas Disponíveis</h2>
    <hr>

    <?php
    if (isset($_GET['search']) && !empty($_GET['localização'])) {
        $loc = mysqli_real_escape_string($con, $_GET['localização']);
        $sql = "SELECT * FROM clinica WHERE localização LIKE '%$loc%'";
        $res = mysqli_query($con, $sql);
        
        if ($res) {
            if (mysqli_num_rows($res) > 0) {
                echo "<div class='table-responsive text-center'>";
                echo "<form action='' method='GET'>";
                echo "<table class='table table-hover'>
                        <thead>
                          <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Telefone</th> 
                            <th>Localização</th>
                            <th>Endereço</th>
                          </tr>
                        </thead>";

                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr> 
                            <td><input type='radio' name='clinicid' value='" . $row['idClinica'] . "'></td>
                            <td>" . $row["idClinica"] . "</td>
                            <td>" . $row["nome"] . "</td>
                            <td>" . $row["email"] . "</td>
                            <td>" . $row["telefone"] . "</td>
                            <td>" . $row["localização"] . "</td>
                            <td>" . $row["endereço"] . "</td>
                          </tr>";
                }
                echo "</table><br><br>";
                echo "<button type='submit' class='btn btn-dark' name='selectclinic'>Selecionar Clínica</button>";
                echo "</form></div>";
            } else {
                echo "<h5 class='text-center'>Nenhuma clínica encontrada.</h5>";
            }
        } else {
            echo "<h5 class='text-center'>Erro ao consultar o banco de dados.</h5>";
        }
    } else {
        echo "<h5 class='text-center'>Digite uma localização válida.</h5>";
    }
    mysqli_close($con);
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>