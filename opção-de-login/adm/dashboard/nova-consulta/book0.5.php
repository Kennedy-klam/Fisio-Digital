<?php
session_start();
include('../../conexões/db.php');

// Verifica se a sessão de administrador está ativa
if (!isset($_SESSION['id'])) {
    header("Location: ../../menu.html");
    exit();
}

// Obtendo o nome do administrador para exibição
$admid = $_SESSION['id'];
$query = "SELECT * FROM `loginadm` WHERE admid = $admid";
$result = mysqli_query($con, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    $admnome = $data['admnome'];
    $_SESSION['admnome'] = $admnome; // Adiciona o nome do administrador na sessão
} else {
    $admnome = "Administrador"; // Nome padrão se não encontrar no banco
    $_SESSION['admnome'] = $admnome; // Adiciona o nome padrão na sessão
}

// Verificando se o paciente foi selecionado
if (isset($_POST['selectpatient']) && isset($_POST['clientid'])) {
    $_SESSION['clientid'] = $_POST['clientid'];  // Salva o ID do paciente na sessão
    header("Location: book1.php");  // Redireciona para a próxima página
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procurar Paciente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid pt-2 pb-2" style="background-color: #113838">
        <div class="row">
            <div class="col-sm-10">
                <img width="200" class="ml-0 mt-2 mb-2" src="../consultas-marcadas/default_transparent.png">
            </div>
            <div class="col-sm-2">
                <h3 class="mr-0 text-white">Olá, <?php echo $admnome; ?>!</h3>
                <a href="../dashboard.php" class="btn btn-outline-light">Painel do Administrador</a>
            </div>
        </div>
    </div>
    <div class="container-fluid text-center" style="background-color:#79e3bd">
        <div class="">
            <h2 class="pt-3 pb-3">Procurar Paciente</h2>
        </div>
    </div>

    <form action="" class="w-50 m-auto">
        <div class="form-group row">
            <label class="align-self-center m-2">Coloque o Nome</label>
            <input type="text" class="form-control w-50 align-self-center m-2" name="nome_paciente" placeholder="Digite o nome do paciente">
            <button type="submit" class="btn btn-dark align-self-center m-2" value="Login" name="search">Procurar pacientes</button>
        </div>
    </form>
    <hr>
    <h2 class="text-center">Pacientes Disponíveis</h2>
    <hr>
    <?php
    if (isset($_GET['search']) && !empty($_GET['nome_paciente'])) {
        $nome_paciente = $_GET['nome_paciente'];
        // Consulta para buscar pacientes pelo nome usando LIKE
        $sql = "SELECT * FROM loginc WHERE clientname LIKE '%$nome_paciente%'";
        $res = mysqli_query($con, $sql);
        if ($res) {
            if (mysqli_num_rows($res)) {
                echo "<div class='table-responsive text-center'>";
                echo "<form action='' method='POST'>";  // Alterado para POST
                echo "<table class='table table-hover'>
                        <thead>
                          <tr>
                            <th scope='col'> </th>
                            <th scope='col'> ID </th>
                            <th scope='col'> Nome </th>
                            <th scope='col'> E-mail </th>
                            <th scope='col'> Telefone </th>
                            <th scope='col'> Sexo </th>
                          </tr>
                        </thead>";

                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr> 
                                <td> <input type='radio' name='clientid' value='" . $row['clientid'] . "'></td>
                                <td scope='row'>" . $row["clientid"] . " </td>
                                <td>" . $row["clientname"] . "</td>
                                <td>" . $row["clientemail"] . "</td>
                                <td>" . $row["phoneno"] . " </td>
                                <td>" . $row["sex"] . " </td>
                               </tr>";
                }
                echo "</table> <br> <br>";
                echo " <button type='submit' class='btn btn-dark ml-auto mb-50' value='selectpatient' name='selectpatient'>Selecionar Paciente</button>";
                echo "</form> </div>";
            } else {
                echo "<h5 class='text-center'>Nenhum paciente encontrado.</h5>";
            }
        } else {
            echo "<h5 class='text-center'>Erro na consulta ao banco de dados.</h5>";
        }
    } else {
        echo "<h5 class='text-center'>Digite um nome válido para buscar.</h5>";
    }
    mysqli_close($con);
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-Df5IicThPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>