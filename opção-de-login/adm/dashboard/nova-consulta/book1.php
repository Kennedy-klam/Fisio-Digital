<?php
session_start();
require('../../conexões/db.php');

// Verifica se o clientid está na sessão
if (!isset($_SESSION["clientid"])) {
    // Redireciona de volta para a seleção de paciente se o clientid não estiver definido
    header("Location: book0.5.php");
    exit();
}

// Verifica se o nome do administrador está na sessão
if (!isset($_SESSION["admnome"])) {
    // Caso o nome do administrador não esteja na sessão, redireciona ou trata o erro.
    $_SESSION['admnome'] = "Administrador";
}

// Armazena o clinicid na sessão ao selecionar uma clínica
if (isset($_GET["selectclinic"])) {
    $_SESSION["clinicid"] = $_GET['clinicid'];
    header("Location: book2.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procurar Clínica</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid pt-2 pb-2" style="background-color: #113838">
        <div class="row">
            <div class="col-sm-10">
                <img width="200" class="ml-0 mt-2 mb-2" src="../consultas-marcadas/default_transparent.png">
            </div>
            <div class="col-sm-2">
                <!-- Exibe o nome do administrador -->
                <h3 class="mr-0 text-white">Olá, <?php echo $_SESSION['admnome']; ?>!</h3>
                <a href="../dashboard.php" class="btn btn-outline-light">Painel do Administrador</a>
            </div>
        </div>
    </div>
    <div class="container-fluid text-center" style="background-color:#79e3bd">
        <div class="">
            <h2 class="pt-3 pb-3">Procurar Clínica</h2>
        </div>
    </div>

    <form action="" class="w-50 m-auto">
        <div class="form-group row">
            <label class="align-self-center m-2">Coloque o local</label>
            <input type="text" class="form-control w-50 align-self-center m-2" name="location" placeholder="Digite o local da clínica">
            <button type="submit" class="btn btn-dark align-self-center m-2" value="Login" name="search">Procurar Clínicas</button>
        </div>
    </form>
    <hr>
    <h2 class="text-center">Clínicas Disponíveis</h2>
    <hr>
    <?php
    if (isset($_GET['search']) && !empty($_GET['location'])) {
        $loc = $_GET['location'];
        $sql = "SELECT * FROM cliniclogin WHERE location='$loc'";
        $res = mysqli_query($con, $sql);
        if ($res) {
            if (mysqli_num_rows($res)) {
                echo "<div class='table-responsive text-center'>";
                echo "<form action='' method='GET'>";  // Alterado para POST
                echo "<table class='table table-hover'>
                        <thead>
                          <tr>
                            <th scope='col'> </th>
                            <th scope='col'> ID </th>
                            <th scope='col'> Nome </th>
                            <th scope='col'> E-mail</th>
                            <th scope='col'> Número de Celular</th> 
                            <th scope='col'> Localização </th>
                            <th scope='col'> Endereço </th>
                            <th scope='col'> Dono </th>
                          </tr>
                          </thead>";

                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr> 
                                <td> <input type='radio' name='clinicid' value='" . $row['clinicid'] . "'></td>
                                <td scope='row'>" . $row["clinicid"] . " </td>
                                <td>" . $row["clinicname"] . "</td>
                                <td>" . $row["clinicemail"] . "</td>
                                <td>" . $row["phoneno"] . " </td>
                                <td>" . $row["location"] . " </td>
                                <td>" . $row["address"] . "</td>
                                <td>" . $row["owner"] . " </td>
                               </tr> ";
                }
                echo "</table>  <br> <br>";
                echo " <button type='submit' class='btn btn-dark ml-auto mb-50' value='selectclinic' name='selectclinic'>Selecionar Clínica</button>";
                echo "</form> </div>";
            } else {
                echo "<h5 class=text-center>0 Resultados</h5>";
            }
        } else {
            echo "<h5 class=text-center>Erro ao consultar o banco de dados</h5>";
        }
    } else {
        echo "<h5 class=text-center>Digite uma localização válida </h5>";
    }
    mysqli_close($con);
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-Df5IicThPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>