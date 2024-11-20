<?php
session_start();  // Inicia a sessão para capturar os dados
include('../../../../conexões/conexao.php');

// Verifica se a conexão com o banco está funcionando
if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}

// Verifica se o idPaciente foi passado na URL
$idPaciente = $_GET['idPaciente'] ?? null;

if (!$idPaciente) {
    die("ID do paciente não fornecido.");
}

// 1. Consultar a consulta associada ao paciente
$sql = "SELECT idConsultas, Paciente_idPaciente FROM consultas WHERE Paciente_idPaciente = ?";
$stmt = $mysqli->prepare($sql);
if (!$stmt) {
    die("Erro ao preparar a consulta de consulta: " . $mysqli->error);
}
$stmt->bind_param("i", $idPaciente); // "i" para inteiro (id do paciente)
if (!$stmt->execute()) {
    die("Erro ao executar a consulta de consulta: " . $stmt->error);
}
$result = $stmt->get_result();

// Verifica se a consulta foi encontrada
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $consultas_idConsultas = $row['idConsultas'];  // ID da consulta
    $consultas_paciente_idPaciente = $row['Paciente_idPaciente'];  // ID do paciente
} else {
    die("Consulta não encontrada para este paciente.");
}

// Verifica se o formulário foi enviado (POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitização e validação dos dados recebidos
    $diagnostico_clinico = htmlspecialchars($_POST['diagnostico_clinico'] ?? '');
    $avaliador = htmlspecialchars($_POST['avaliador'] ?? '');
    $queixa = htmlspecialchars($_POST['queixa'] ?? '');
    $historia_doenca_atual = htmlspecialchars($_POST['historia_doenca_atual'] ?? '');
    $historico_patologico = htmlspecialchars($_POST['historico_patologico'] ?? '');
    $historia_familiar = htmlspecialchars($_POST['historia_familiar'] ?? '');
    $historia_pessoal_social = htmlspecialchars($_POST['historia_pessoal_social'] ?? '');
    $temperatura = htmlspecialchars($_POST['temperatura'] ?? '');
    $frequencia_c = htmlspecialchars($_POST['frequencia_c'] ?? '');
    $frequencia_r = htmlspecialchars($_POST['frequencia_r'] ?? '');
    $pressao = htmlspecialchars($_POST['pressao'] ?? '');
    $inspecao = htmlspecialchars($_POST['inspecao'] ?? '');
    $palpacao = htmlspecialchars($_POST['palpacao'] ?? '');
    $sensibilidade = htmlspecialchars($_POST['sensibilidade'] ?? '');
    $reflexos_esquerdo = htmlspecialchars($_POST['reflexos_esquerdo'] ?? '');
    $reflexos_direito = htmlspecialchars($_POST['reflexos_direito'] ?? '');
    $local_dor = htmlspecialchars($_POST['local_dor'] ?? '');
    $eva = htmlspecialchars($_POST['eva'] ?? '');
    $historia_dor = htmlspecialchars($_POST['historia_dor'] ?? '');
    $frequencia_dor = htmlspecialchars($_POST['frequencia_dor'] ?? '');
    $caracteristica_dor = htmlspecialchars($_POST['caracteristica_dor'] ?? '');
    $movimentos_dor = htmlspecialchars($_POST['movimentos_dor'] ?? '');
    $agravantes = htmlspecialchars($_POST['agravantes'] ?? '');
    $atenuantes = htmlspecialchars($_POST['atenuantes'] ?? '');

    // Dados para a tabela medicamentos
    $nome = htmlspecialchars($_POST['nome'] ?? null);
    $classe = htmlspecialchars($_POST['classe'] ?? null);

    // 2. Salvar os dados na tabela fichatraumatoortopédica1
    $query1 = "INSERT INTO fichatraumatoortopédica (
        consultas_idConsultas,
        consultas_paciente_idPaciente,
        diagnostico_clinico,
        avaliador,
        queixa,
        historia_doenca_atual,
        historico_patologico,
        historia_familiar,
        historia_pessoal_social,
        temperatura,
        frequencia_c,
        frequencia_r,
        pressao,
        inspecao,
        palpacao,
        sensibilidade,
        reflexos_esquerdo,
        reflexos_direito,
        local_dor,
        eva,
        historia_dor,
        frequencia_dor,
        caracteristica_dor,
        movimentos_dor,
        agravantes,
        atenuantes
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
    )";

    $stmt1 = $mysqli->prepare($query1);
    if (!$stmt1) {
        die("Erro ao preparar a consulta para fichatraumatoortopédica1: " . $mysqli->error);
    }
    $stmt1->bind_param(
        'iissssssssssssssssssssssss',
        $consultas_idConsultas,
        $consultas_paciente_idPaciente,
        $diagnostico_clinico,
        $avaliador,
        $queixa,
        $historia_doenca_atual,
        $historico_patologico,
        $historia_familiar,
        $historia_pessoal_social,
        $temperatura,
        $frequencia_c,
        $frequencia_r,
        $pressao,
        $inspecao,
        $palpacao,
        $sensibilidade,
        $reflexos_esquerdo,
        $reflexos_direito,
        $local_dor,
        $eva,
        $historia_dor,
        $frequencia_dor,
        $caracteristica_dor,
        $movimentos_dor,
        $agravantes,
        $atenuantes
    );

    if (!$stmt1->execute()) {
        die("Erro ao inserir na tabela fichatraumatoortopédica1: " . $stmt1->error);
    }

    // 3. Salvar os medicamentos na tabela medicamentos
    if ($nome && $classe) {
        $query2 = "INSERT INTO medicamentos (Paciente_idPaciente, nome, classe) VALUES (?, ?, ?)";
        $stmt2 = $mysqli->prepare($query2);
        if (!$stmt2) {
            die("Erro ao preparar a consulta para medicamentos: " . $mysqli->error);
        }
        $stmt2->bind_param('iss', $consultas_paciente_idPaciente, $nome, $classe);

        if (!$stmt2->execute()) {
            die("Erro ao inserir dados do medicamento: " . $stmt2->error);
        }
    }

    // Redireciona para a tela2.php após o sucesso na inserção dos dados
    header("Location: tela2.php?idPaciente=" . $idPaciente);
    exit;
}

// Consulta os dados do paciente
$sqlPaciente = "SELECT nome, nascimento, telefone, profissao, endereço, naturalidade, estaCivil, sexo 
                FROM paciente WHERE idPaciente = ?";
$stmtPaciente = $mysqli->prepare($sqlPaciente);
if (!$stmtPaciente) {
    die("Erro ao preparar a consulta para paciente: " . $mysqli->error);
}
$stmtPaciente->bind_param("i", $idPaciente);
if (!$stmtPaciente->execute()) {
    die("Erro ao executar a consulta para paciente: " . $stmtPaciente->error);
}
$resultPaciente = $stmtPaciente->get_result();

// Verifica se o paciente foi encontrado
if ($resultPaciente->num_rows > 0) {
    $rowPaciente = $resultPaciente->fetch_assoc();
    // Preenche as variáveis com os dados do paciente
    $nome = $rowPaciente['nome'];
    $nascimento = $rowPaciente['nascimento'];
    $telefone = $rowPaciente['telefone'];
    $profissao = $rowPaciente['profissao'];
    $endereco = $rowPaciente['endereço'];
    $naturalidade = $rowPaciente['naturalidade'];
    $estaCivil = $rowPaciente['estaCivil'];
    $sexo = $rowPaciente['sexo'];
} else {
    die("Paciente não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha de Avaliação de Fisioterapia Traumato-Ortopédica</title>
    <link rel="stylesheet" href="Estilos/Styles.css">
</head>

<body>
<form method="POST" action="">
<input type="hidden" name="Consultas_Paciente_idPaciente" value="<?php echo $_GET['idPaciente']; ?>">
    <div class="container">
        <h1>Ficha de Avaliação de Fisioterapia</h1>
        <h1>Traumato-Ortopédica e Reumatológica</h1>
        <br>
        <div class="data-estagiario">
                <div>
                    <label for="data">Data da avaliação:</label>
                    <input type="date" id="data" name="data" class="classe1-input">
                </div>
            </div>

            <!-- Parte dos Dados Pessoais -->
            <div class="dados-pessoais">
                <h2>Identificação</h2>
                <br>
                <div>
                    <label for="nome">Nome:</label>
                    <input type="text" class="input-style" name="nome" value="<?php echo isset($nome) ? $nome : ''; ?>"> &nbsp &nbsp &nbsp
                    <label for="dataNascimento">Data de Nascimento:</label>
                    <input type="date" class="input-date" id="dataNascimento" name="dataNascimento" value="<?php echo isset($nascimento) ? $nascimento : ''; ?>">
                </div>
                <br>
                <div>
                    <label for="telefone">Telefone:</label>
                    <input type="text" class="input-style" name="telefone" value="<?php echo isset($telefone) ? $telefone : ''; ?>"> &nbsp&nbsp&nbsp
                    <label for="profissao">Profissão:</label>
                    <input type="text" class="input-style" name="profissao" value="<?php echo isset($profissao) ? $profissao : ''; ?>"> &nbsp &nbsp
                    <label for="endereco">Endereço Residencial:</label>
                    <input type="text" class="input-style" name="endereco" value="<?php echo isset($endereço) ? $endereço : ''; ?>">
                </div>
                <br>

                <div>
                    <label for="naturalidade">Naturalidade:</label>
                    <input type="text" class="input-style" name="naturalidade" value="<?php echo isset($naturalidade) ? $naturalidade : ''; ?>"> &nbsp &nbsp
                    <label for="estadoCivil">Estado Civil:</label>
                    <input type="text" class="input-style" name="estadoCivil" value="<?php echo isset($estaCivil) ? $estaCivil : ''; ?>">
                    <label for="sexo">Sexo:</label>
                    <input type="text" class="input-style" name="sexo" value="<?php echo isset($sexo) ? $sexo : ''; ?>">
                </div>
            </div>

            <div>
                <label for="queixa-principal">Diagnóstico Clínico:</label>
                <br><br>
                <textarea class="queixa" id="queixa-principal" name="diagnostico_clinico" placeholder="Digite aqui..."></textarea>
            </div>

            <br>
            <label for="estagiario">Avaliador (es):</label>
            <input type="text" id="estagiario" name="avaliador" class="custom-input">
            <br><br>

            <h2>ANAMNESE:</h2>
            <br>

            <div>
                <label for="queixa-principal">Queixa Principal:</label> <br><br>
                <textarea class="queixa" id="queixa-principal" name="queixa" placeholder="Digite aqui..."></textarea>
            </div><br>

            <div>
                <label for="historia-doenca">História da Doença Atual:</label>
                <br><br>
                <textarea class="queixa" id="historia-doenca" name="historia_doenca_atual" placeholder="Digite aqui..."></textarea>
            </div><br>

            <div>
                <label for="historico-patologico">Histórico Patológico / Doenças Associadas:</label> <br><br>
                <textarea class="queixa" id="historico-patologico" name="historico_patologico" placeholder="Digite aqui..."></textarea>
            </div><br>

            <div>
                <label for="historia-familiar">História Familiar:</label> <br><br>
                <textarea class="queixa" id="historia-familiar" name="historia_familiar" placeholder="Digite aqui..."></textarea>
            </div><br>

            <div>
                <label for="historia-pessoal">História Pessoal e Social:</label>
                <br><br>
                <textarea class="queixa" id="historia-pessoal" name="historia_pessoal_social" placeholder="Digite aqui..."></textarea>
            </div>
            <br>
            <!-- Tabela de Medicamentos -->
            <h2>MEDICAMENTOS EM USO</h2>
            <br>
            <div>
                <form id="form-medicamentos">
                    <div class="div-esquerda">
                        <label for="medicamentos" style="font-weight: bold">Nome do Medicamento:</label>
                        <input type="text" id="medicamentos" name="nome" class="custom-input1" placeholder="Digite aqui..." required>
                        <br><br>&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
                        <button class="styled-button" type="button" id="remover-btn">Remover</button>
                    </div>

                    <div class="div-direita">
                        <label for="como-usa" style="font-weight: bold">Classe Terapêutica:</label>
                        <input type="text" id="como-usa" name="classe" class="custom-input1" placeholder="Digite aqui..." required>
                        <br><br>&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
                        <button class="styled-button" type="button" id="adicionar-btn">Adicionar</button>
                    </div>
                </form>
                <br><br>
                <h2>Tabela de Medicamentos em Uso</h2>
                <table id="tabela-medicamentos" class="tableC" border="1">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Classe Terapêutica</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- As linhas serão adicionadas dinamicamente aqui -->
                    </tbody>
                </table>
            </div>

            <br><br><br>
            <h2>EXAME FÍSICO-FUNCIONAL:</h2>
            <br>
            <h3>Sinais Vitais</h3>
            <br>
            <div>
                <label for="temperatura">T:</label>
                <input type="text" id="temperatura" name="temperatura" class="custom-input">

                <label for="frequencia-cardiaca">FC:</label>
                <input type="text" id="frequencia-cardiaca" name="frequencia_c" class="custom-input">

                <label for="frequencia-respiratoria">FR:</label>
                <input type="text" id="frequencia-respiratoria" name="frequencia_r" class="custom-input">

                <label for="pressao-arterial">PA:</label>
                <input type="text" id="pressao-arterial" name="pressao" class="custom-input">
            </div>
            <br>

            <div>
                <h3>Inspeção:</h3><br>
                <textarea class="queixa" id="queixa-inspecao" name="inspecao" placeholder="Digite aqui..."></textarea>
            </div>
            <br>

            <div>
                <h3>Palpação:</h3><br>
                <textarea class="queixa" id="queixa-palpacao" name="palpacao" placeholder="Digite aqui..."></textarea>
            </div>
            <br>

            <div>
                <h3>Sensibilidade:</h3><br>
                <textarea class="queixa" id="queixa-sensibilidade" name="sensibilidade" placeholder="Digite aqui..."></textarea>
            </div>
            <br>
            <div>
                <h3>Reflexos Tendinos Profundos:</h3>
                <br>
                <table border="1" class="tableS">
                    <thead>
                        <tr>
                            <th>Reflexo</th>
                            <th>Arreflexia</th>
                            <th>Hiporreflexia</th>
                            <th>Normal</th>
                            <th>Hiperreflexia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Esquerdo</th>
                            <td><input type="radio" name="reflexo_bicipital_esquerdo" value="arreflexia"></td>
                            <td><input type="radio" name="reflexo_bicipital_esquerdo" value="hiporreflexia"></td>
                            <td><input type="radio" name="reflexo_bicipital_esquerdo" value="normal"></td>
                            <td><input type="radio" name="reflexo_bicipital_esquerdo" value="hiperreflexia"></td>
                        </tr>
                        <tr>
                            <td>Bicipital</td>
                            <td><input type="radio" name="reflexo_bicipital_esquerdo" value="arreflexia"></td>
                            <td><input type="radio" name="reflexo_bicipital_esquerdo" value="hiporreflexia"></td>
                            <td><input type="radio" name="reflexo_bicipital_esquerdo" value="normal"></td>
                            <td><input type="radio" name="reflexo_bicipital_esquerdo" value="hiperreflexia"></td>
                        </tr>
                        <tr>
                            <td>Tricipital</td>
                            <td><input type="radio" name="reflexo_tricipital_esquerdo" value="arreflexia"></td>
                            <td><input type="radio" name="reflexo_tricipital_esquerdo" value="hiporreflexia"></td>
                            <td><input type="radio" name="reflexo_tricipital_esquerdo" value="normal"></td>
                            <td><input type="radio" name="reflexo_tricipital_esquerdo" value="hiperreflexia"></td>
                        </tr>
                        <tr>
                            <td>Patelar</td>
                            <td><input type="radio" name="reflexo_patelar_esquerdo" value="arreflexia"></td>
                            <td><input type="radio" name="reflexo_patelar_esquerdo" value="hiporreflexia"></td>
                            <td><input type="radio" name="reflexo_patelar_esquerdo" value="normal"></td>
                            <td><input type="radio" name="reflexo_patelar_esquerdo" value="hiperreflexia"></td>
                        </tr>
                        <tr>
                            <td>Calcâneo</td>
                            <td><input type="radio" name="reflexo_calcaneo_esquerdo" value="arreflexia"></td>
                            <td><input type="radio" name="reflexo_calcaneo_esquerdo" value="hiporreflexia"></td>
                            <td><input type="radio" name="reflexo_calcaneo_esquerdo" value="normal"></td>
                            <td><input type="radio" name="reflexo_calcaneo_esquerdo" value="hiperreflexia"></td>
                        </tr>
                        <tr>
                            <th>Direito</th>
                            <td><input type="radio" name="reflexo_bicipital_direito" value="arreflexia"></td>
                            <td><input type="radio" name="reflexo_bicipital_direito" value="hiporreflexia"></td>
                            <td><input type="radio" name="reflexo_bicipital_direito" value="normal"></td>
                            <td><input type="radio" name="reflexo_bicipital_direito" value="hiperreflexia"></td>
                        </tr>
                        <tr>
                            <td>Bicipital</td>
                            <td><input type="radio" name="reflexo_bicipital_direito" value="arreflexia"></td>
                            <td><input type="radio" name="reflexo_bicipital_direito" value="hiporreflexia"></td>
                            <td><input type="radio" name="reflexo_bicipital_direito" value="normal"></td>
                            <td><input type="radio" name="reflexo_bicipital_direito" value="hiperreflexia"></td>
                        </tr>
                        <tr>
                            <td>Tricipital</td>
                            <td><input type="radio" name="reflexo_tricipital_direito" value="arreflexia"></td>
                            <td><input type="radio" name="reflexo_tricipital_direito" value="hiporreflexia"></td>
                            <td><input type="radio" name="reflexo_tricipital_direito" value="normal"></td>
                            <td><input type="radio" name="reflexo_tricipital_direito" value="hiperreflexia"></td>
                        </tr>
                        <tr>
                            <td>Patelar</td>
                            <td><input type="radio" name="reflexo_patelar_direito" value="arreflexia"></td>
                            <td><input type="radio" name="reflexo_patelar_direito" value="hiporreflexia"></td>
                            <td><input type="radio" name="reflexo_patelar_direito" value="normal"></td>
                            <td><input type="radio" name="reflexo_patelar_direito" value="hiperreflexia"></td>
                        </tr>
                        <tr>
                            <td>Calcâneo</td>
                            <td><input type="radio" name="reflexo_calcaneo_direito" value="arreflexia"></td>
                            <td><input type="radio" name="reflexo_calcaneo_direito" value="hiporreflexia"></td>
                            <td><input type="radio" name="reflexo_calcaneo_direito" value="normal"></td>
                            <td><input type="radio" name="reflexo_calcaneo_direito" value="hiperreflexia"></td>
                        </tr>
                    </tbody>
                </table>
                <br><br>

                <!-- Avaliação da Dor (EVA) -->
                <h3>Avaliação da Dor:</h3>
                <br><br>

                <div class="scale-container">
                    <!-- Labels acima da escala (LEVE, MODERADA, INTENSA) -->
                    <div class="sections">
                        <div>LEVE</div>
                        <div>MODERADA</div>
                        <div>INTENSA</div>
                    </div>

                    <!-- Números da escala -->
                    <div class="scale-numbers">
                        <span>0</span>
                        <span>1</span>
                        <span>2</span>
                        <span>3</span>
                        <span>4</span>
                        <span>5</span>
                        <span>6</span>
                        <span>7</span>
                        <span>8</span>
                        <span>9</span>
                        <span>10</span>
                    </div>

                    <!-- Barra de cores -->
                    <div class="scale">
                        <!-- Marcador de rosto -->
                        <div id="marker" class="marker">
                            <img src="https://emojipedia-us.s3.amazonaws.com/source/skype/289/slightly-smiling-face_1f642.png" alt="Rosto">
                        </div>
                    </div>
                </div>
                <br><br>
                <form id="form-dor1">
                    <div class="div-esquerda">
                        <label for="dor1" style="font-weight: bold">Local da Dor:</label>
                        <input type="text" id="dor1" name="local_dor" class="custom-input1" placeholder="Digite aqui..." required>
                        <br><br>
                        <button class="styled-button" type="button" id="remover-btn1">Remover</button>
                    </div>

                    <div class="div-direita">
                        <label for="eva1" style="font-weight: bold">EVA:</label>
                        <input type="text" id="eva1" name="eva" class="custom-input1" placeholder="Digite aqui..." required>
                        <br><br>
                        <button class="styled-button" type="button" id="adicionar-btn1">Adicionar</button>
                    </div>
                </form>

                <br>

                <table id="tabela-dor1" class="tableC" border="1">
                    <thead>
                        <tr>
                            <th>Local da Dor</th>
                            <th>EVA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- As linhas serão adicionadas dinamicamente aqui -->
                    </tbody>
                </table>

                <br><br>

                <!-- Características da Dor -->
                <form id="form-caracteristicas-dor">
                    <div class="estilodemarcar">
                        <label class="label-bold">História da Dor:</label>
                        <div class="opcoes-dor">
                            <label><input type="radio" name="historia_dor" value="Aguda"> Aguda</label>&nbsp
                            <label><input type="radio" name="historia_dor" value="Crônica"> Crônica</label>
                        </div>
                    </div>

                    <div class="estilodemarcar">
                        <label class="label-bold">Frequência:</label>
                        <div class="opcoes-dor">
                            <label><input type="radio" name="frequencia_dor" value="Constante"> Constante</label>&nbsp
                            <label><input type="radio" name="frequencia_dor" value="Intermitente"> Intermitente</label>
                        </div>
                    </div>

                    <div class="estilodemarcar">
                        <label class="label-bold">Característica:</label>
                        <div class="opcoes-dor">
                            <label><input type="radio" name="caracteristica_dor" value="Localizada"> Localizada</label>&nbsp
                            <label><input type="radio" name="caracteristica_dor" value="Irradiada"> Irradiada</label>&nbsp
                            <label><input type="radio" name="caracteristica_dor" value="Difusa"> Difusa</label>&nbsp
                        </div>
                    </div>
                </form>

                <br><br>

                <!-- Movimentos e Fatores -->
                <h3>Movimentos que exacerbam a dor:</h3>
                <br><br>
                <div>
                    <h4>Dor:</h4><br>
                    <textarea class="queixa" id="queixa-sensibilidade" name="movimentos_dor" placeholder="Digite aqui..."></textarea>
                </div>
                <br>
                <div>
                    <h4>Fatores agravantes:</h4><br>
                    <textarea class="queixa" id="queixa-sensibilidade" name="agravantes" placeholder="Digite aqui..."></textarea>
                </div>
                <br>
                <div>
                    <h4>Fatores atenuantes:</h4><br>
                    <textarea class="queixa" id="queixa-sensibilidade" name="atenuantes" placeholder="Digite aqui..."></textarea>
                </div>
                <br>
                <div style="text-align: right;">
                    <button class="styled-button" type="submit">Próxima página -></button>
                </div>
                </form>
    </div>

    <script src="Script/Script.js"></script>
    
</body>

</html>