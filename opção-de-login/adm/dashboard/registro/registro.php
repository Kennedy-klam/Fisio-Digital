<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registro.css?v=1.1">
    <title>Cadastro de Paciente</title>
    <script>
        function calcularIdade() {
            const dob = document.getElementById("dob").value;
            const idadeInput = document.getElementById("idade");

            if (dob) {
                const hoje = new Date();
                const nascimento = new Date(dob);
                let idade = hoje.getFullYear() - nascimento.getFullYear();
                const mes = hoje.getMonth() - nascimento.getMonth();

                if (mes < 0 || (mes === 0 && hoje.getDate() < nascimento.getDate())) {
                    idade--;
                }

                idadeInput.value = idade; // Preenche o campo de idade
            }
        }
    </script>
</head>

<body>

    <div class="container">
        <h1>Cadastro de Paciente</h1>

        <!-- Troca o nome do arquivo php aqui -->
        <form action="registro.php" method="POST" enctype="multipart/form-data">

            <!-- Nome (Linha completa) -->
            <div class="form-grid full-width">
                <div class="textfield">
                    <label for="name">Nome Completo</label>
                    <input type="text" name="name" id="name" placeholder="Nome Completo" required>
                </div>
            </div>

            <!-- Idade, Data de Nascimento e Naturalidade -->
            <div class="form-grid">
                <div class="textfield">
                    <label for="dob">Data de Nascimento:</label>
                    <input type="date" id="dob" name="dob" required onchange="calcularIdade()">
                </div>
                <div class="textfield">
                    <label for="idade">Idade:</label>
                    <input type="number" id="idade" name="idade" readonly>
                </div>
                <div class="textfield">
                    <label for="naturalidade">Naturalidade</label>
                    <input type="text" name="naturalidade" id="naturalidade" placeholder="Naturalidade" required>
                </div>
            </div>

            <!-- CPF, RG, Cor -->
            <div class="form-grid">
                <div class="textfield">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf" placeholder="CPF" required>
                </div>
                <div class="textfield">
                    <label for="rg">RG</label>
                    <input type="text" name="rg" id="rg" placeholder="RG" required>
                </div>
                <div class="textfield">
                    <label for="cor">Cor</label>
                    <input type="text" name="cor" id="cor" placeholder="Cor" required>
                </div>
            </div>

            <!-- Estado Civil, Sexo, Altura -->
            <div class="form-grid">
                <div class="textfield">
                    <label for="estado-civil">Estado Civil</label>
                    <select id="estadoCivil" name="estadoCivil" required>
                        <option value="solteiro">Solteiro</option>
                        <option value="casado">Casado</option>
                        <option value="divorciado">Divorciado</option>
                        <option value="viuvo">Viúvo</option>
                    </select>
                </div>
                <div class="textfield">
                    <label for="sexo">Sexo</label>
                    <select name="sexo" id="sexo" required>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                    </select>
                </div>
                <div class="textfield">
                    <label for="altura">Altura</label>
                    <input type="text" name="altura" id="altura" placeholder="Altura" required>
                </div>
            </div>

            <!-- Nome do Pai e Nome da Mãe -->
            <div class="form-grid full-width">
                <div class="textfield">
                    <label for="pai">Filiação: Pai</label>
                    <input type="text" name="pai" id="pai" placeholder="Nome do Pai" required>
                </div>
            </div>

            <div class="form-grid full-width">
                <div class="textfield">
                    <label for="mae">Filiação: Mãe</label>
                    <input type="text" name="mae" id="mae" placeholder="Nome da Mãe" required>
                </div>
            </div>

            <!-- Profissão, Endereço, Cidade -->
            <div class="form-grid">
                <div class="textfield">
                    <label for="profissao">Profissão</label>
                    <input type="text" name="profissao" id="profissao" placeholder="Profissão" required>
                </div>
                <div class="textfield">
                    <label for="endereco">Endereço</label>
                    <input type="text" name="endereco" id="endereco" placeholder="Endereço Completo" required>
                </div>
                <div class="textfield">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" id="cidade" placeholder="Cidade" required>
                </div>
            </div>

            <!-- Estado, Celular, Telefone Fixo -->
            <div class="form-grid">
                <div class="textfield">
                    <label for="estado">Estado</label>
                    <input type="text" name="estado" id="estado" placeholder="Estado" required>
                </div>
                <div class="textfield">
                    <label for="celular">Celular</label>
                    <input type="text" name="celular" id="celular" placeholder="Celular" required>
                </div>
                <div class="textfield">
                    <label for="fixo">Telefone Fixo</label>
                    <input type="text" name="fixo" id="fixo" placeholder="Telefone Fixo">
                </div>
            </div>

            <!-- Recado, Data de Admissão, Data de Saída -->
            <div class="form-grid">
                <div class="textfield">
                    <label for="recado">Recado</label>
                    <input type="text" name="recado" id="recado" placeholder="Recado">
                </div>
                <div class="textfield">
                    <label for="data-admissao">Data de Admissão</label>
                    <input type="date" name="data-admissao" id="data-admissao" required>
                </div>
                <div class="textfield">
                    <label for="data-saida">Data de Saída</label>
                    <input type="date" name="data-saida" id="data-saida">
                </div>
            </div>

            <!-- Saída do Paciente e Desistência -->
            <div class="form-grid">
                <div class="desistencia">
                    <h3>Desistência</h3>
                    <label><input type="checkbox" name="desistencia[]" value="questao-monetaria"> Questão monetária</label>
                    <label><input type="checkbox" name="desistencia[]" value="desagrado"> Desagrado ao tratamento</label>
                    <label><input type="checkbox" name="desistencia[]" value="locomocao"> Questão de meio de locomoção</label>
                </div>
                <div class="saida-paciente">
                    <h3>Saída do Paciente</h3>
                    <label><input type="checkbox" name="saida" value="alta-medica"> Alta Médica</label>
                    <label><input type="checkbox" name="saida" value="alta-fisioterapeutica"> Alta Fisioterapeutica</label>
                    <label><input type="checkbox" name="saida" value="obito"> Óbito</label>
                </div>
            </div>

            <!-- Seção Anexar TCLE -->
            <h2 class="section-title">Anexar TCLE</h2>
            <div class="form-row">
                <div class="textfield-full">
                    <label for="tcle">Anexar Termo de Consentimento Livre e Esclarecido</label>
                    <input type="file" name="tcle" id="tcle">
                </div>
            </div>

            <!-- Botões -->
            <div class="form-buttons">
                <button type="submit" class="btn-submit">Registrar Paciente</button>
                <a href="../dashboard.php" class="btn-back">Voltar para a Página Inicial</a>
            </div>
        </form>
    </div>

</body>

</html>

<?php

include("../../../../database/dbConect.php");

// Pegando os dados do formulário via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['dob'];
    $naturalidade = $_POST['naturalidade'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $cor_pele = $_POST['cor'];
    $estado_civil = $_POST['estadoCivil'];
    $sexo = $_POST['sexo'];
    $altura = $_POST['altura'];
    $filipai = $_POST['pai'];
    $filimae = $_POST['mae'];
    $profissao = $_POST['profissao'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $celular = $_POST['celular'];
    $telefone_fixo = $_POST['fixo'];
    $recado = $_POST['recado'];
    $data_admissao = $_POST['data-admissao'];
    $data_saida = $_POST['data-saida'];
    $desistencia = $_POST['desistencia'];
    $saida = $_POST['saida'];

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO paciente (cpf, nome, nascimento, naturalidade, rg, cor, estaCivil, sexo, altura, filiPai, filiMae, profissao, endereço, cidade, estado, celular, telefone, recado, dataAdmi, dataSaida, desistencia, motivSaida)
        VALUES ('$nome', '$data_nascimento', '$naturalidade', '$cpf', '$rg', '$cor_pele', '$estado_civil', '$sexo', '$altura', '$filipai', '$filimae', '$profissao', '$endereco', '$cidade', '$estado', '$celular', '$telefone_fixo', '$recado', '$data_admissao', '$data_saida', '$desistencia', '$saida')";

    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>