<?php
session_start();
include('../../conexões/db.php');

// Verifica se a sessão de administrador está ativa
if (!isset($_SESSION['id'])) {
    header("Location: ../../menu.html");
    exit();
}

// Obtendo o nome do administrador para exibição
$idAdministrador = $_SESSION['id'];
$query = "SELECT nome FROM administrador WHERE idAdministrador = $idAdministrador";
$result = mysqli_query($con, $query);
$admnome = ($result && mysqli_num_rows($result) > 0) ? mysqli_fetch_assoc($result)['nome'] : "Administrador";
$_SESSION['nome'] = $admnome;

// Verificando se o paciente foi selecionado
if (isset($_POST['selectpatient']) && isset($_POST['idPaciente'])) {
    $_SESSION['idPaciente'] = $_POST['idPaciente'];
    header("Location: book1.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procurar Paciente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid pt-2 pb-2" style="background-color: #113838">
        <div class="row">
            <div class="col-sm-10">
                <img width="200" class="ml-0 mt-2 mb-2" src="../../../../imagens/default_transparent.png" alt="Logo">
            </div>
            <div class="col-sm-2">
                <h3 class="text-white">Olá, <?= $admnome ?>!</h3>
                <a href="../dashboard.php" class="btn btn-outline-light">Painel do Administrador</a>
            </div>
        </div>
    </div>
    
    <div class="container-fluid text-center" style="background-color:#79e3bd">
        <h2 class="pt-3 pb-3">Procurar Paciente</h2>
    </div>

    <form action="" method="GET" class="w-50 m-auto">
        <div class="form-group row">
            <label class="align-self-center m-2">Coloque o Nome</label>
            <input type="text" class="form-control w-50 align-self-center m-2" name="nome_paciente" placeholder="Digite o nome do paciente">
            <button type="submit" class="btn btn-dark align-self-center m-2" name="search">Procurar pacientes</button>
        </div>
    </form>
    
    <hr>
    <h2 class="text-center">Pacientes Disponíveis</h2>
    <hr>

    <?php if (isset($_GET['search']) && !empty($_GET['nome_paciente'])): 
        $nome_paciente = $_GET['nome_paciente'];
        $sql = "SELECT idPaciente, nome, email, celular, sexo FROM paciente WHERE nome LIKE '%$nome_paciente%'";
        $res = mysqli_query($con, $sql);
    ?>
        <?php if ($res && mysqli_num_rows($res) > 0): ?>
            <div class="table-responsive text-center">
                <form action="" method="POST">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Sexo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($res)): ?>
                                <tr>
                                    <td><input type="radio" name="idPaciente" value="<?= $row['idPaciente'] ?>"></td>
                                    <td><?= $row["idPaciente"] ?></td>
                                    <td><?= $row["nome"] ?></td>
                                    <td><?= $row["email"] ?></td>
                                    <td><?= $row["celular"] ?></td>
                                    <td><?= $row["sexo"] ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-dark mb-3" name="selectpatient">Selecionar Paciente</button>
                </form>
            </div>
        <?php else: ?>
            <h5 class="text-center">Nenhum paciente encontrado.</h5>
        <?php endif; ?>
    <?php else: ?>
        <h5 class="text-center">Digite um nome válido para buscar.</h5>
    <?php endif; 
    mysqli_close($con); 
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
