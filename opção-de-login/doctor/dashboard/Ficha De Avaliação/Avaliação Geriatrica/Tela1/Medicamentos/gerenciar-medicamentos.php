<?php
include '../../../../../../../database/dbConect.php';

// Inicializa variável de mensagem
$mensagem = "";

// Recupera os medicamentos cadastrados
$sql = "SELECT * FROM Medicamentos";
$result = $conn->query($sql);

// Adicionar medicamento
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-medicamento'])) {
    $nome = $conn->real_escape_string($_POST['nome']);
    $descricao = $conn->real_escape_string($_POST['uso']);
    $tempUso = $conn->real_escape_string($_POST['tempUso']);
    $classe = $conn->real_escape_string($_POST['classe']);

    $insert_sql = "INSERT INTO Medicamentos (Paciente_idPaciente, nome, uso, tempUso, classe) VALUES (1, '$nome', '$descricao', '$tempUso', '$classe')";
    if ($conn->query($insert_sql) === TRUE) {
        $mensagem = "Medicamento adicionado com sucesso.";
    } else {
        $mensagem = "Erro ao adicionar medicamento: " . $conn->error;
    }
    // Redireciona para recarregar a página
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Remover medicamento
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove-medicamento'])) {
    $remove_id = $conn->real_escape_string($_POST['idMedicamentos']);
    $delete_sql = "DELETE FROM Medicamentos WHERE idMedicamentos = $remove_id";
    if ($conn->query($delete_sql) === TRUE) {
        $mensagem = "Medicamento removido com sucesso.";
    } else {
        $mensagem = "Erro ao remover medicamento: " . $conn->error;
    }
    // Redireciona para recarregar a página
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicamentos</title>
    <link rel="stylesheet" href="gerenciar-medicamentos.css">
</head>
<body>
    <div class="container">
        <h1>Medicamentos Cadastrados para Laysa</h1>

        <?php if (!empty($mensagem)) { ?>
            <p style="color: green;"><?php echo $mensagem; ?></p>
        <?php } ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Uso</th>
                    <th>Tempo de Uso</th>
                    <th>Classe</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['idMedicamentos']; ?></td>
                        <td><?php echo $row['nome']; ?></td>
                        <td><?php echo $row['uso']; ?></td>
                        <td><?php echo $row['tempUso']; ?></td>
                        <td><?php echo $row['classe'];?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="idMedicamentos" value="<?php echo $row['idMedicamentos']; ?>">
                                <button type="submit" name="remove-medicamento">Remover</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <form method="POST">
            <h2>Adicionar Medicamento</h2>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>

            <label for="uso">Uso:</label>
            <textarea name="uso" id="uso" required></textarea>

            <label for="tempUso">Tempo de Uso:</label>
            <textarea name="tempUso" id="tempUso" required></textarea>

            <label for="classe">Classe</label>
            <input type="text" name="classe" id="classe" required>

            <button type="submit" name="add-medicamento">Adicionar Medicamento</button>
        </form>
    </div>
</body>
</html>

