<?php 

include("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>testepaciente</title>
</head>
<body>
    <div class="container">
        <h1>Cadatrar paciente</h1>
        <form action="testepaciente.php" method="POST">
            <div class="inputBox">
                <label for="nome" class="labeInput">Nome completo</label>
                <input type="text" name="nome" id="nome" class="inputUser" required>
            </div>
            <input type="submit" name="submit" id="submit">
        </form>
    </div>
</body>
</html>