<?php
include('../../../../conexões/conexao.php');
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Captura os dados do formulário e os armazena na sessão
    $_SESSION['dados_formulario'] = [
        'consultas_idConsultas' => $_POST['Consultas_idConsultas'],
        'consultas_paciente_idPaciente' => $_POST['Consultas_Paciente_idPaciente'],
        'diagnostico_clinico' => $_POST['diagnostico_clinico'],
        'queixa' => $_POST['queixa'],
        'temperatura' => $_POST['temperatura'],
        'frequencia_c' => $_POST['frequencia_c'],
        'frequencia_r' => $_POST['frequencia_r'],
        'pressao' => $_POST['pressao'],
        'inspecao' => $_POST['inspecao'],
        'palpacao' => $_POST['palpacao'],
        'sensibilidade' => $_POST['sensibilidade'],
        'reflexo_tricipital_esquerdo' => $_POST['reflexo_tricipital_esquerdo'],
        'reflexo_patelar_esquerdo' => $_POST['reflexo_patelar_esquerdo'],
        'reflexo_calcaneo_esquerdo' => $_POST['reflexo_calcaneo_esquerdo'],
        'reflexo_bicipital_direito' => $_POST['reflexo_bicipital_direito'],
        'reflexo_tricipital_direito' => $_POST['reflexo_tricipital_direito'],
        'reflexo_patelar_direito' => $_POST['reflexo_patelar_direito'],
        'reflexo_calcaneo_direito' => $_POST['reflexo_calcaneo_direito'],
        'reflexo_bicipital_esquerdo' => $_POST['reflexo_bicipital_esquerdo'],
        'local_dor' => $_POST['local_dor'],
        'eva' => $_POST['eva'],
        'historia_dor' => $_POST['historia_dor'],
        'frequencia_dor' => $_POST['frequencia_dor'],
        'caracteristica_dor' => $_POST['caracteristica_dor'],
        'movimentos_dor' => $_POST['movimentos_dor'],
        'agravantes' => $_POST['agravantes'],
        'atenuantes' => $_POST['atenuantes'],
        'dataAvali' => $_POST['dataAvali'],
    
        // Dados de medicamento (exemplo de campos de medicamentos)
        'medicamento_nome' => $_POST['medicamento_nome'],
        'medicamento_dosagem' => $_POST['medicamento_dosagem'],
        'medicamento_frequencia' => $_POST['medicamento_frequencia'],
    ];
}

// Redireciona para a próxima página, se necessário
if (isset($_POST['submit'])) {
    header("Location: tela2.php"); // Redireciona para a próxima página
    exit;
}

$idPaciente = $_GET['idPaciente'];

// Verifica se o idPaciente foi fornecido
if (!empty($idPaciente)) {
    // Consulta para pegar os dados do paciente
    $sql = "SELECT nome, nascimento, telefone, profissao, endereço, naturalidade, estaCivil, sexo 
            FROM paciente WHERE idPaciente = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $idPaciente);  // "i" para inteiro (id do paciente)
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se o paciente foi encontrado
    if ($result->num_rows > 0) {
        // Pega os dados do paciente
        $row = $result->fetch_assoc();
        $nome = $row['nome'];
        $nascimento = $row['nascimento'];
        $telefone = $row['telefone'];
        $profissao = $row['profissao'];
        $endereço = $row['endereço'];
        $naturalidade = $row['naturalidade'];
        $estaCivil = $row['estaCivil'];
        $sexo = $row['sexo'];
    } else {
        echo "Paciente não encontrado.";
    }
} else {
    echo "ID do paciente não fornecido.";
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
    <div class="container">
        <h1>Ficha de Avaliação de Fisioterapia</h1>
        <h1>Traumato-Ortopédica e Reumatológica</h1>
        <br>

        <form action="" method="post">
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
                    <input type="text" class="input-style" name="nome"> &nbsp &nbsp &nbsp
                    <label for="dataNascimento">Data de Nascimento:</label>
                    <input type="date" class="input-date" id="dataNascimento" name="dataNascimento">
                </div>
                <br>
                <div>
                    <label for="telefone">Telefone:</label>
                    <input type="text" class="input-style" name="telefone">&nbsp&nbsp&nbsp

                    <label for="profissao">Profissão:</label>
                    <input type="text" class="input-style" name="profissao">&nbsp &nbsp

                    <label for="endereco">Endereço Residencial:</label>
                    <input type="text" class="input-style" name="endereco">
                </div>
                <br>

                <div>
                    <label for="naturalidade">Naturalidade:</label>
                    <input type="text" class="input-style" name="naturalidade"> &nbsp &nbsp
                    <label for="estadoCivil">Estado Civil:</label>
                    <input type="text" class="input-style" name="estadoCivil">
                    <label for="sexo">Sexo:</label>
                    <input type="text" class="input-style" name="sexo">
                </div>
            </div>

            <div>
                <label for="queixa-principal">Diagnóstico Clínico:</label>
                <br><br>
                <textarea class="queixa" id="queixa-principal" name="queixa-principal" placeholder="Digite aqui..."></textarea>
            </div>

            <br>
            <label for="estagiario">Avaliador (es):</label>
            <input type="text" id="estagiario" name="estagiario" class="custom-input">
            <br><br>

            <h2>ANAMNESE:</h2>
            <br>

            <div>
                <label for="queixa-principal">Queixa Principal:</label> <br><br>
                <textarea class="queixa" id="queixa-principal" name="queixa-principal" placeholder="Digite aqui..."></textarea>
            </div><br>

            <div>
                <label for="historia-doenca">História da Doença Atual:</label>
                <br><br>
                <textarea class="queixa" id="historia-doenca" name="historia-doenca" placeholder="Digite aqui..."></textarea>
            </div><br>

            <div>
                <label for="historico-patologico">Histórico Patológico / Doenças Associadas:</label> <br><br>
                <textarea class="queixa" id="historico-patologico" name="historico-patologico" placeholder="Digite aqui..."></textarea>
            </div><br>

            <div>
                <label for="historia-familiar">História Familiar:</label> <br><br>
                <textarea class="queixa" id="historia-familiar" name="historia-familiar" placeholder="Digite aqui..."></textarea>
            </div><br>

            <div>
                <label for="historia-pessoal">História Pessoal e Social:</label>
                <br><br>
                <textarea class="queixa" id="historia-pessoal" name="historia-pessoal" placeholder="Digite aqui..."></textarea>
            </div>
            <br>
            <!-- Tabela de Medicamentos -->
            <h2>MEDICAMENTOS EM USO</h2>
            <br>
            <div>
                <form id="form-medicamentos">
                    <div class="div-esquerda">
                        <label for="medicamentos" style="font-weight: bold">Nome do Medicamento:</label>
                        <input type="text" id="medicamentos" name="medicamentos" class="custom-input1" placeholder="Digite aqui..." required>
                        <br><br>&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
                        <button class="styled-button" type="button" id="remover-btn">Remover</button>
                    </div>

                    <div class="div-direita">
                        <label for="como-usa" style="font-weight: bold">Classe Terapêutica:</label>
                        <input type="text" id="como-usa" name="como-usa" class="custom-input1" placeholder="Digite aqui..." required>
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
                <input type="text" id="frequencia-cardiaca" name="frequencia-cardiaca" class="custom-input">

                <label for="frequencia-respiratoria">FR:</label>
                <input type="text" id="frequencia-respiratoria" name="frequencia-respiratoria" class="custom-input">

                <label for="pressao-arterial">PA:</label>
                <input type="text" id="pressao-arterial" name="pressao-arterial" class="custom-input">
            </div>
            <br>

            <div>
                <h3>Inspeção:</h3><br>
                <textarea class="queixa" id="queixa-inspecao" name="queixa-inspecao" placeholder="Digite aqui..."></textarea>
            </div>
            <br>

            <div>
                <h3>Palpação:</h3><br>
                <textarea class="queixa" id="queixa-palpacao" name="queixa-palpacao" placeholder="Digite aqui..."></textarea>
            </div>
            <br>

            <div>
                <h3>Sensibilidade:</h3><br>
                <textarea class="queixa" id="queixa-sensibilidade" name="queixa-sensibilidade" placeholder="Digite aqui..."></textarea>
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
                <br>
                <div class="image-container">
                    <img src="Imagens/ImagemDor.png" alt="Imagem que mostra a dor em uma escala de 0 a 10" class="central-image">
                </div>

                <br><br>
                <form id="form-dor1">
                    <div class="div-esquerda">
                        <label for="dor1" style="font-weight: bold">Local da Dor:</label>
                        <input type="text" id="dor1" name="dor" class="custom-input1" placeholder="Digite aqui..." required>
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
                            <label><input type="radio" name="historia-dor1" value="Aguda"> Aguda</label>&nbsp
                            <label><input type="radio" name="historia-dor1" value="Crônica"> Crônica</label>
                        </div>
                    </div>

                    <div class="estilodemarcar">
                        <label class="label-bold">Frequência:</label>
                        <div class="opcoes-dor">
                            <label><input type="radio" name="frequencia1" value="Constante"> Constante</label>&nbsp
                            <label><input type="radio" name="frequencia1" value="Intermitente"> Intermitente</label>
                        </div>
                    </div>

                    <div class="estilodemarcar">
                        <label class="label-bold">Característica:</label>
                        <div class="opcoes-dor">
                            <label><input type="radio" name="caracteristica1" value="Localizada"> Localizada</label>&nbsp
                            <label><input type="radio" name="caracteristica1" value="Irradiada"> Irradiada</label>&nbsp
                            <label><input type="radio" name="caracteristica1" value="Difusa"> Difusa</label>&nbsp
                        </div>
                    </div>
                </form>

                <br><br>

                <!-- Movimentos e Fatores -->
                <h3>Movimentos que exacerbam a dor:</h3>
                <br><br>
                <div>
                    <h4>Dor:</h4><br>
                    <textarea class="queixa" id="queixa-sensibilidade" name="queixa-sensibilidade" placeholder="Digite aqui..."></textarea>
                </div>
                <br>

                <div>
                    <h4>Fatores agravantes:</h4><br>
                    <textarea class="queixa" id="queixa-sensibilidade" name="queixa-sensibilidade" placeholder="Digite aqui..."></textarea>
                </div>
                <br>

                <div>
                    <h4>Fatores atenuantes:</h4><br>
                    <textarea class="queixa" id="queixa-sensibilidade" name="queixa-sensibilidade" placeholder="Digite aqui..."></textarea>
                </div>
                <br>

                <div style="text-align: right;">
                    <button class="styled-button" type="button" onclick="window.location.href='tela2.html';">Próxima página -></button>
                </div>
        </form>
    </div>

    <script src="Script/Script.js"></script>
</body>

</html>