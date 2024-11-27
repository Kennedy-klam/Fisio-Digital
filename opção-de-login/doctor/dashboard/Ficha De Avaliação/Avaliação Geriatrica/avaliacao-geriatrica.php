<?php
// Conectando ao banco de dados
session_start();
include("../../../../../database/dbConect.php");

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}

$idPaciente = $_GET['idPaciente'] ?? null;
$idConsulta = $_GET['idConsulta'] ?? null;

if (!$idPaciente || !$idConsulta) {
    echo "Erro: ID do paciente ou da consulta não foi recebido!";
    die();
}

$_SESSION['idPaciente'] = $idPaciente;
$_SESSION['idConsulta'] = $idConsulta;

// Verifica se a consulta foi encontrada
$sqlConsulta = "SELECT idConsultas, Paciente_idPaciente FROM consultas WHERE idConsultas = ?";
$stmtConsulta = $conn->prepare($sqlConsulta);
if (!$stmtConsulta) {
    die("Erro ao preparar a consulta para consultas: " . $conn->error);
}

$stmtConsulta->bind_param("i", $idConsulta);  // "i" para inteiro
$stmtConsulta->execute();
$result = $stmtConsulta->get_result();  // Aqui obtemos o resultado da consulta

if ($result->num_rows > 0) {
    // Se a consulta for encontrada, pegamos os dados
    $row = $result->fetch_assoc();
    $consultas_idConsultas = $row['idConsultas'];  // ID da consulta
    $consultas_paciente_idPaciente = $row['Paciente_idPaciente'];  // ID do paciente
} else {
    die("Consulta não encontrada para este paciente.");
}

// Recupera os medicamentos cadastrados
$sqlMedicamentos = "SELECT * FROM Medicamentos";
$resultMedicamentos = $conn->query($sqlMedicamentos);

// Agora, consulta os dados do paciente
$sqlPaciente = "SELECT nome, nascimento, sexo, estaCivil, celular FROM paciente WHERE idPaciente = ?";
$stmtPaciente = $conn->prepare($sqlPaciente);
if (!$stmtPaciente) {
    die("Erro ao preparar a consulta para paciente: " . $conn->error);
}
$stmtPaciente->bind_param("i", $idPaciente);  // "i" para inteiro
$stmtPaciente->execute();
$resultPaciente = $stmtPaciente->get_result();

if ($resultPaciente->num_rows > 0) {
    // Se o paciente for encontrado, pegamos os dados
    $rowPaciente = $resultPaciente->fetch_assoc();
    $nome = $rowPaciente["nome"];
    $dataNascimento = $rowPaciente["nascimento"];
    $sexo = $rowPaciente["sexo"];
    $estadoCivil = $rowPaciente["estaCivil"];
    $telefone = $rowPaciente["celular"];

    // Calculando a idade
    $hoje = new DateTime();
    $nascimento = new DateTime($dataNascimento);
    $idade = $hoje->diff($nascimento)->y;
} else {
    die("Paciente não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha Avaliação Geriátrica</title>
    <script id="gerenciar-telas" src="scripts/gerenciar-telas.js" defer></script>
    <script>
        function redirecionar(url) {
            window.location.href = url;
        }
    </script>
    <style>
        /* Estilos aplicados apenas à tabela com ID #barthelTable */
        #barthelTable {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        #barthelTable th,
        #barthelTable td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        #barthelTable th {
            background-color: #DEF7E5;
            color: #113838;
        }

        #barthelTable td input[type="radio"] {
            transform: scale(1.2);
        }
    </style>
</head>

<body>
    <form action="database/processar-avaliacao-geriatrica.php" method="post">

        <!-- ------------------------------------------Tela 1------------------------------------------- -->
        <div class="etapa" id="etapa1">
            <div class="container">
                <h1>Ficha de Avaliação de Fisioterapia Geriátrica</h1>
                <br>
                <div class="data-estagiario">
                    <div>
                        <label for="data">Data:</label>
                        <input type="date" id="dataAtual" name="dataAtual" value="<?php echo date('Y-m-d'); ?>" readonly>
                    </div>
                    <div>
                        <label for="estagiario">Estagiário:</label>
                        <input type="text" id="estagiario" name="estagiario">
                    </div>
                </div>

                <!--Parte dos Dados Pessoais-->

                <div class="dados-pessoais">
                    <h2>Dados Pessoais</h2>
                    <br>
                    <div>
                        <label for="nome">Nome:</label>
                        <input type="text" class="input-style" id="nome" name="nome" value="<?php echo $nome; ?>" readonly>

                        <label for="dataNascimento">Data de Nascimento:</label>
                        <input type="date" class="input-date" id="dataNascimento" name="dataNascimento" value="<?php echo $dataNascimento; ?>" readonly>
                    </div>
                    <br>
                    <div>
                        <label for="idade">Idade:</label>
                        <input type="number" class="idadeSe" id="idade" name="idade" value="<?php echo $idade; ?>" readonly>

                        <label for="Sexo">Sexo:</label>
                        <input type="text" class="idadeSe" id="sexo" name="sexo" value="<?php echo $sexo; ?>" readonly>

                        <label for="estadoCivil">Estado Civil:</label>
                        <input type="text" class="input-style" id="estadoCivil" name="estadoCivil" value="<?php echo $estadoCivil; ?>" readonly>

                        <label for="telefone">Telefone:</label>
                        <input type="text" class="input-style" id="telefone" name="telefone" value="<?php echo $telefone; ?>" readonly>
                    </div>

                </div>

                <div class="informacoes-adicionais">

                    <div class="coluna-esq">

                        <div class="campo">
                            <label for="escolaridade">Escolaridade:</label>
                            <select id="escolaridade" name="escolaridade">
                                <option value disabled
                                    selected>Selecione...</option>
                                <option value="analfabeto">Analfabeto</option>
                                <option value="ensino_fundamental">Ensino
                                    Fundamental</option>
                                <option value="ensino_medio">Ensino Médio</option>
                                <option value="graduacao">Graduação</option>
                            </select>
                        </div>

                        <div class="campo">
                            <label for="renda">Renda:</label>
                            <select id="renda" name="renda"
                                onchange="mostrarProfissao()">
                                <option value disabled
                                    selected>Selecione...</option>
                                <option value="aposentadoria">Aposentadoria</option>
                                <option value="pensa">Pensão</option>
                                <option value="trabalho">Trabalho</option>
                                <option value="outros">Outros</option>
                            </select>
                        </div>

                        <div class="campo" id="profissaoCampo">
                            <label for="profissao">Profissão</label>
                            <input type="text" id="profissao" name="profissao">
                        </div>

                        <div class="campo">
                            <label for="local-residencia">Local de
                                Residência:</label>
                            <select id="local-residencia" name="local-residencia">
                                <option value disabled
                                    selected>Selecione...</option>
                                <option value="casa_terrea">Casa térrea</option>
                                <option value="casa_duplex">Casa duplex</option>
                                <option value="apartamento">Apartamento</option>
                                <option value="outros">Outros</option>
                            </select>
                        </div>

                        <div class="campo">
                            <label for="mora-com">Mora com:</label>
                            <select id="mora-com" name="mora-com">
                                <option value disabled
                                    selected>Selecione...</option>
                                <option value="sozinho">Sozinho</option>
                                <option value="filhos">Filhos</option>
                                <option value="outros_familiares">Outros
                                    familiares</option>
                                <option value="cuidador">Cuidador</option>
                                <option value="outros">Outros</option>
                            </select>
                        </div>

                    </div>

                    <div class="coluna-central">

                        <div class="campo">
                            <label>Atividades Físicas:</label>
                        </div>
                        <div>
                            <input type="radio" id="atividade-sim" name="atividade" value="sim" onclick="mostrarCampoAF()">
                            <label for="atividade-sim">Sim</label>
                            <br>
                            <input type="radio" id="atividade-nao" name="atividade" value="nao" onclick="mostrarCampoAF()">
                            <label for="atividade-nao">Não</label>
                        </div>
                        <br>
                        <div class="campo" id="campo-quantos-dias" style="display: none;">
                            <label for="quantos-dias">Se sim, quantos dias na semana:</label>
                            <input type="text" id="quantos-dias" name="quantos-dias">
                        </div>

                        <div class="campo">
                            <label>Frequência para sair de casa:</label>
                        </div>
                        <div>
                            <input type="radio" id="diariamente" name="frequencia"
                                value="diariamente">
                            <label for="diariamente">Diariamente</label>
                            <br>
                            <input type="radio" id="pouca-frequencia"
                                name="frequencia" value="pouca-frequencia">
                            <label for="pouca-frequencia">Pouca frequência</label>
                        </div>
                        <br>

                        <div class="campo">
                            <label for="atividade-social">Atividade social:</label>
                            <select id="atividade-social" name="atividade-social">
                                <option value="" disabled selected>Selecione...</option>
                                <option value="finais_de_semana">Finais de semana</option>
                                <option value="mensalmente">Mensalmente</option>
                                <option value="baixa_frequencia">Baixa Frequência</option>
                                <option value="outros">Outros</option>
                            </select>
                        </div>
                    </div>

                    <div class="coluna-dir">

                        <div class="campo">
                            <label for="doencas">Doenças:</label>
                            <select id="doencas" name="doencas" onchange="adicionarDoenca()">
                                <option value="" disabled selected>Selecione...</option>
                                <option value="hipertenso">Hipertenso</option>
                                <option value="diabetico">Diabético</option>
                                <option value="cardiopatias">Cardiopatias</option>
                                <option value="depressao">Depressão</option>
                                <option value="outros">Outros</option>
                            </select>
                        </div>

                        <div id="doencas-selecionadas"></div>
                        <br>


                        <div class="campo">
                            <label for="outras-doencas">Outras doenças:</label>
                            <textarea id="outras-doencas" name="outras-doencas"
                                rows="17">Digite aqui...</textarea>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label for="queixa-principal">Queixa-Principal/HMP:</label>
                    <textarea class="queixa" id="queixa-principal"
                        name="queixa-principal"></textarea>
                </div>
            </div>
            <br>

            <!--Tabela-->

            <div class="container">
                <h1>Medicamentos Cadastrados</h1>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Uso</th>
                            <th>Tempo de Uso</th>
                            <th>Classe</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $resultMedicamentos->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['idMedicamentos']; ?></td>
                                <td><?php echo $row['nome']; ?></td>
                                <td><?php echo $row['uso']; ?></td>
                                <td><?php echo $row['tempUso']; ?></td>
                                <td><?php echo $row['classe']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="button-container">
                <a href="Medicamentos/gerenciar-medicamentos.php" target="_blank" class="styled-button" style="text-decoration: none">Gerenciar Medicamentos</a>
            </div>

            <br> <br>

            <!--Parte de Baixo-->
            <div class="form-container">

                <div class="coluna-esq">
                    <div class="campo">
                        <label for="visao">Visão:</label>
                        <select id="visao" name="visao">
                            <option value="" disabled selected>Selecione...</option>
                            <option value="normal">Normal</option>
                            <option value="deficit_com_corretor">Déficit c/ uso de corretor</option>
                            <option value="deficit_sem_corretor">Déficit s/ uso de corretor</option>
                            <option value="perda_parcial">Perda parcial</option>
                            <option value="perda_total">Perda total</option>
                        </select>
                    </div>

                    <div class="campo">
                        <label for="audicao">Audição:</label>
                        <select id="audicao" name="audicao">
                            <option value="" disabled selected>Selecione...</option>
                            <option value="normal">Normal</option>
                            <option value="deficit_com_corretor">Déficit c/ uso de corretor</option>
                            <option value="deficit_sem_corretor">Déficit s/ uso de corretor</option>
                            <option value="perda_parcial">Perda parcial</option>
                            <option value="perda_total">Perda total</option>
                        </select>
                    </div>

                    <div class="campo">
                        <label for="urinária">Continência urinária:</label>
                    </div>
                    <div>
                        <input type="radio" id="continencia-sim" name="continencia-urinaria" value="sim" onclick="mostrarData()">
                        <label for="continencia-sim">Sim</label>
                        <br><br>
                        <input type="radio" id="continencia-nao" name="continencia-urinaria" value="nao" onclick="mostrarData()">
                        <label for="continencia-nao">Não</label>
                    </div>
                    <br>
                    <div id="data-container" style="display: none;">
                        <label for="data">Data:</label>
                        <input type="date" id="data" name="data">
                    </div>


                    <div class="campo">
                    </div>
                    <div class="campo">
                        <label for="urinária">Continência fecal:</label>
                    </div>
                    <div>
                        <input type="radio" id="continencia-fecal-sim" name="continencia-fecal" value="sim" onclick="mostrarDataF()">
                        <label for="continencia-fecal-sim">Sim</label>
                        <br><br>
                        <input type="radio" id="continencia-fecal-nao" name="continencia-fecal" value="nao" onclick="mostrarDataF()">
                        <label for="continencia-fecal-nao">Não</label>
                    </div>
                    <br>
                    <div id="data-fecal-container" style="display: none;">
                        <label for="data-fecal">Data:</label>
                        <input type="date" id="data-fecal" name="data-fecal">
                    </div>



                </div>

                <div class="coluna-central">

                    <div class="campo">
                        <label>Sono:</label>
                    </div>
                    <div>
                        <input type="radio" id="sono-normal" name="sono" value="NormalS" onclick="mostrarTexto()">
                        <label for="sono-normal">Normal</label>
                        <br><br>
                        <input type="radio" id="sono-naolegal" name="sono" value="Distúrbios" onclick="mostrarTexto()">
                        <label for="sono-naolegal">Distúrbios</label>
                    </div>
                    <br>
                    <div id="texto-disturbios-container" style="display: none;" class="campo">
                        <label for="texto-disturbios">Descreva os distúrbios:</label>
                        <input type="text" id="texto-disturbios" name="texto-disturbios">
                    </div>

                    <br>
                    <div class="campo">
                        <label for="ortese">Uso de órtese:</label>
                        <select id="ortese" name="ortese">
                            <option value="">Selecione</option>
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>
                        <br><br>

                        <label for="proteste">Uso de prótese:</label>
                        <select id="proteste" name="proteste">
                            <option value="">Selecione</option>
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>
                    </div>

                    <div class="campo">
                        <label for="queda">Queda nos últimos 12 meses:</label>
                        <select id="queda" name="queda" onchange="mostrarQuedaQuantas()">
                            <option value="">Selecione</option>
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>
                    </div>

                    <div class="campo" id="queda-quantas-container" style="display: none;">
                        <label for="queda-quantas">Quantas:</label>
                        <input type="number" id="queda-quantas" name="queda-quantas">
                    </div>

                </div>
                <div class="coluna-dir">

                    <div class="campo">
                        <label>Fuma:</label>
                    </div>
                    <div>
                        <input type="radio" id="fuma-sim" name="Fuma" value="sim" onclick="mostrarTempoFumar()">
                        <label for="fuma-sim">Sim</label>
                        <br>
                        <input type="radio" id="fuma-nao" name="Fuma" value="nao" onclick="mostrarTempoFumar()">
                        <label for="fuma-nao">Não</label>
                        <br>
                        <input type="radio" id="parou-fumar" name="Fuma" value="parou" onclick="mostrarTempoFumar()">
                        <label for="parou-fumar">Parou de fumar</label>
                    </div>
                    <br>
                    <div class="campo" id="tempo-fumar-container" style="display: none;">
                        <label for="tempo-fumar">Se parou, há quanto tempo?</label>
                        <input type="text" id="tempo-fumar" name="tempo-fumar">
                    </div>

                    <div class="campo">
                        <label for="etilista">Etilista:</label>
                    </div>
                    <div>
                        <input type="radio" id="etilista-sim" name="etilista" value="sim" onclick="mostrarTempoEtilista()">
                        <label for="etilista-sim">Sim</label>
                        <br>
                        <input type="radio" id="etilista-nao" name="etilista" value="nao" onclick="mostrarTempoEtilista()">
                        <label for="etilista-nao">Não</label>
                        <br>
                        <input type="radio" id="parou-etilista" name="etilista" value="parou" onclick="mostrarTempoEtilista()">
                        <label for="parou-etilista">Parou de usar</label>
                    </div>
                    <br>
                    <div class="campo" id="tempo-etilista-container" style="display: none;">
                        <label for="tempo-etilista">Se parou, há quanto tempo?</label>
                        <input type="text" id="tempo-etilista" name="tempo-etilista">
                    </div>

                </div>
            </div>
            <!--Botoes-->

            <div class="button-container">
                <button class="styled-button" type="button" onclick="redirecionar('../../../dashboard.php')">Tela Inicial</button>
                <button type="button" id="proximaEtapa1" class="styled-button">Próxima página</button>
            </div>
        </div>
        <!-- -----------------------------------------Tela 1------------------------------------------ -->

        <!-- -----------------------------------------Tela 2------------------------------------------ -->

        <div class="etapa" id="etapa2" style="display:none;">
            <div class="container">
                <div class="section-title">Estado Mental</div>
                <div class="column-group">
                    <!-- Primeira Coluna -->
                    <div class="column">
                        <!-- Orientação espacial -->
                        <div class="section">
                            <div class="subtitle">Orientação espacial:</div>
                            <legend>Tempo (0-5)</legend>
                            <div class="horizontal-group">
                                <div>
                                    <label><input type="checkbox"> Mês</label><br>
                                    <label><input type="checkbox"> Dia</label><br>
                                    <label><input type="checkbox"> Ano</label><br>
                                    <label><input type="checkbox"> Dia da Semana</label><br>
                                    <label><input type="checkbox"> Que horas são aproximadamente?</label>
                                </div>
                                <div class="notes">
                                    Nota:
                                    <input type="number" class="notes-input" name="tempo">
                                </div>
                            </div>
                        </div>

                        <!-- Localização -->
                        <div class="section">
                            <legend>Local (0-5):</legend>
                            <div class="horizontal-group">
                                <div>
                                    <label><input type="checkbox"> Estado</label><br>
                                    <label><input type="checkbox"> Cidade</label><br>
                                    <label><input type="checkbox"> Bairro</label><br>
                                    <label><input type="checkbox"> Local</label><br>
                                    <label><input type="checkbox"> País</label>
                                </div>
                                <div class="notes">
                                    Nota:
                                    <input type="number" class="notes-input" name="local">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Segunda Coluna -->
                    <div class="column">
                        <!-- Repita as palavras -->
                        <div class="section">
                            <legend>Repita as palavras (0-3):</legend>
                            <div class="horizontal-group">
                                <div>
                                    <label><input type="checkbox"> Carro</label><br>
                                    <label><input type="checkbox"> Vaso</label><br>
                                    <label><input type="checkbox"> Tijolo</label>
                                </div>
                                <div class="notes">
                                    Nota:
                                    <input type="number" class="notes-input" name="reptPalav">
                                </div>
                            </div>
                        </div>

                        <!-- Cálculo -->
                        <div class="section">
                            <legend>Cálculo (0-5): O senhor faz cálculos?</legend>
                            <div>
                                <label><input type="radio" name="calc" value="sim"> Sim &nbsp; &nbsp;</label>
                                <label><input type="radio" name="calc" value="não"> Não</label>
                            </div>
                            <div id="calc-sim" style="display:none;">
                                <p>Quanto é :</p>
                                <label><input type="checkbox">100 - 7?</label><br>
                                <label><input type="checkbox"> 93 - 7?</label><br>
                                <label><input type="checkbox"> 86 - 7?</label><br>
                                <label><input type="checkbox"> 79 - 7?</label><br>
                                <label><input type="checkbox"> 72 - 7?</label>
                            </div>
                            <div id="calc-nao" style="display:none;">
                                <p>Soletre a palavra MUNDO de trás para frente: <strong>O D N U M</strong></p>
                            </div>
                            <div class="notes">
                                Nota:
                                <input type="number" class="notes-input" name="calculo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>

                <div class="column-group">
                    <!-- Primeira Coluna -->
                    <div class="column">
                        <!-- Memorização -->
                        <div class="section">
                            <legend>Memorização (0-3):</legend>
                            <div>
                                Peça para o entrevistado repetir as palavras ditas há pouco. (Carro, vaso e tijolo)
                            </div>
                            <div class="notes">
                                Nota:
                                <select class="notes-input" name="memoria" aria-label="Default select example">
                                    <option selected></option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>

                        <!-- Linguagem (exemplo de uso com objetos) -->
                        <div class="section">
                            <legend>Linguagem (0-2):</legend>
                            <div>
                                Mostre dois objetos para o entrevistado e peça para nomeá-los.
                            </div>
                            <div class="notes">
                                Nota:
                                <select class="notes-input" name="nomObj" aria-label="Default select example">
                                    <option selected></option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                        </div>

                        <!-- Linguagem - repetição de frase -->
                        <div class="section">
                            <legend>Linguagem (1 ponto):</legend>
                            <div>
                                Solicite ao entrevistado que repita a frase: NEM AQUI, NEM ALI, NEM LÁ.
                            </div>
                            <div class="notes">
                                Nota:
                                <select class="notes-input" name="reptFase" aria-label="Default select example">
                                    <option selected></option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                        </div>

                        <!-- Linguagem (0-3 pontos) -->
                        <div class="section">
                            <legend>Linguagem (0-3 ponto):</legend>
                            <div>
                                Siga uma ordem e 3 estágios: Pegue esse papel com a mão direita; dobre-o no meio e
                                coloque-o no
                                chão.
                            </div>
                            <div class="notes">
                                Nota:
                                <select class="notes-input" name="ordem" aria-label="Default select example">
                                    <option selected></option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Segunda Coluna -->
                    <div class="column">
                        <!-- Linguagem (1 ponto) - Instrução -->
                        <div class="section">
                            <legend>Linguagem (1 ponto):</legend>
                            <div>
                                Clique <a href="images/instrucao.html" target="_blank">&nbsp;AQUI &nbsp;</a> e peça ao
                                entrevistado ler
                                a ordem e executá-la.
                            </div>
                            <div class="notes">
                                Nota:
                                <select class="notes-input" name="lerOrdem" aria-label="Default select example">
                                    <option selected></option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                        </div>

                        <!-- Linguagem (1 ponto) - Escreva uma frase -->
                        <div class="section">
                            <legend>Linguagem (1 ponto):</legend>
                            <div>
                                Peça para o entrevistado escrever uma frase completa. A frase deve ter um sujeito e um
                                objeto e
                                deve ter sentido. Ignore a ortografia.
                            </div>
                            <div class="notes">
                                Nota:
                                <select class="notes-input" name="escrevFase" aria-label="Default select example">
                                    <option selected></option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                        </div>

                        <!-- Linguagem (1 ponto) - Copiar um desenho -->
                        <div class="section">
                            <legend>Linguagem (1 ponto):</legend>
                            <div>
                                Peça ao entrevistado para copiar o seguinte desenho.
                                Verifique se todos os lados estão preservados e se os lados de intersecção foram um
                                quadrilátero.
                                Tremor e rotação podem ser ignorados.
                            </div>
                            <p></p>
                            <a href="images/desenho.jpeg" target="_blank">Clique aqui para ver o desenho</a>
                            <div class="notes">
                                Nota:
                                <select class="notes-input" name="copDesenho" aria-label="Default select example">
                                    <option selected></option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="legend">
                    <h3 id="resultado">RESULTADO: 0 pontos.</h3>
                </div>

            </div>

            <!--------------------------------------TESTE DE FORÇA------------------------------------------------------------>
            <div class="section-title">Teste de Força (MRC)</div>
            <div class="column-group">
                <!-- Primeira Coluna -->
                <div class="column">
                    <h4>Membros superiores</h4>
                    <!--OMBRO-->
                    <div class="section">
                        <div>
                            Abdução do ombro direto
                        </div>
                        <div class="notes">
                            Nota:
                            <select class="notes-input1" name="abombrod">
                                <option selected></option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>

                    <div class="section">
                        <div>
                            Abdução do ombro esquerdo
                        </div>
                        <div class="notes">
                            Nota:
                            <select class="notes-input1" name="abombroe">
                                <option selected></option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>

                    <!--COTOVELO-->
                    <div class="section">
                        <div>
                            Flexão do cotovelo direito
                        </div>
                        <div class="notes">
                            Nota:
                            <select class="notes-input1" name="flexcotovelod">
                                <option selected></option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="section">
                        <div>
                            Flexão do cotovelo esquerdo
                        </div>
                        <div class="notes">
                            Nota:
                            <select class="notes-input" name="flexcotoveloe">
                                <option selected></option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>

                    <!--PUNHO-->
                    <div class="section">
                        <div>
                            Extensão do punho direito
                        </div>
                        <div class="notes">
                            Nota:
                            <select class="notes-input" name="extpunhod">
                                <option selected></option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="section">
                        <div>
                            Extensão do punho esquerdo
                        </div>
                        <div class="notes">
                            Nota:
                            <select class="notes-input1" name="extpunhoe">
                                <option selected></option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Segunda Coluna -->
                <div class="column">
                    <h4>Membros inferiores</h4>
                    <!--QUADRIL-->
                    <div class="section">
                        <div>
                            Flexão quadril direito
                        </div>
                        <div class="notes">
                            Nota:
                            <select class="notes-input1" name="flexquadrild">
                                <option selected></option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="section">
                        <div>
                            Flexão quadril esquerdo
                        </div>
                        <div class="notes">
                            Nota:
                            <select class="notes-input1" name="flexquadrile">
                                <option selected></option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>

                    <!--JOELHO-->
                    <div class="section">
                        <div>
                            Extensão do joelho direito
                        </div>
                        <div class="notes">
                            Nota:
                            <select class="notes-input1" name="extjoelhod">
                                <option selected></option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="section">
                        <div>
                            Extensão do joelho esquerdo
                        </div>
                        <div class="notes">
                            Nota:
                            <select class="notes-input1" name="extjoelhoe">
                                <option selected></option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>

                    <!--TORNOZELO-->
                    <div class="section">
                        <div>
                            Dorsiflexão do tornozelo direito
                        </div>
                        <div class="notes">
                            Nota:
                            <select class="notes-input1" name="dflextornozelod">
                                <option selected></option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="section">
                        <div>
                            Dorsiflexão do tornozelo esquerdo
                        </div>
                        <div class="notes">
                            Nota:
                            <select class="notes-input1" name="dflextornozeloe">
                                <option selected></option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!--LEGENDA DO TESE DE FORÇA-->
            <div class="legend">
                <p>A força do paciente é classificada em uma escala de 0 - 5:</p>
                <p><b>Grau 5:</b> Força muscular normal contra a resistência total.</p>
                <p><b>Grau 4:</b> A força muscular é reduzida, mas há contração muscular contra a resistência.</p>
                <p><b>Grau 3:</b> A articulação pode ser movimentada apenas contra gravidade sem resistência do
                    examinador.</p>
                <p><b>Grau 2:</b> Há força muscular e movimentação articular somente se a resistência da gravidade for
                    removida.
                </p>
                <p><b>Grau 1:</b> Apenas um esboço de movimento é visto, sentido ou fasciculações são observadas no
                    músculo.</p>
                <p><b>Grau 0:</b> Nenhum movimento é observado ou sentido.</p>
            </div>

            <table id="barthelTable">
                <tr>
                    <th>Atividade</th>
                    <th>Dependente (0)</th>
                    <th>Assistido (5)</th>
                    <th>Independente (10/15)</th>
                </tr>
                <tr>
                    <td>Alimentação</td>
                    <td><input type="radio" name="alimentacao" value="0"></td>
                    <td><input type="radio" name="alimentacao" value="5"></td>
                    <td><input type="radio" name="alimentacao" value="10"></td>
                </tr>
                <tr>
                    <td>Banho</td>
                    <td><input type="radio" name="banho" value="0"></td>
                    <td><input type="radio" name="banho" value="5"></td>
                    <td><input type="radio" name="banho" value="10"></td>
                </tr>
                <tr>
                    <td>Atividades diárias</td>
                    <td><input type="radio" name="atividadeb" value="0"></td>
                    <td><input type="radio" name="atividadeb" value="5"></td>
                    <td><input type="radio" name="atividadeb" value="10"></td>
                </tr>
                <tr>
                    <td>Vestir-se</td>
                    <td><input type="radio" name="vestir" value="0"></td>
                    <td><input type="radio" name="vestir" value="5"></td>
                    <td><input type="radio" name="vestir" value="10"></td>
                </tr>
                <tr>
                    <td>Intestino</td>
                    <td><input type="radio" name="intestino" value="0"></td>
                    <td><input type="radio" name="intestino" value="5"></td>
                    <td><input type="radio" name="intestino" value="10"></td>
                </tr>
                <tr>
                    <td>Sistema Urinário</td>
                    <td><input type="radio" name="urina" value="0"></td>
                    <td><input type="radio" name="urina" value="5"></td>
                    <td><input type="radio" name="urina" value="10"></td>
                </tr>
                <tr>
                    <td>Uso do Banheiro</td>
                    <td><input type="radio" name="banheiro" value="0"></td>
                    <td><input type="radio" name="banheiro" value="5"></td>
                    <td><input type="radio" name="banheiro" value="10"></td>
                </tr>
                <tr>
                    <td>Transferência (cama-cadeira)</td>
                    <td><input type="radio" name="transferencia" value="0"></td>
                    <td><input type="radio" name="transferencia" value="5"></td>
                    <td><input type="radio" name="transferencia" value="15"></td>
                </tr>
                <tr>
                    <td>Mobilidade em superfícies planas</td>
                    <td><input type="radio" name="deambulacao" value="0"></td>
                    <td><input type="radio" name="deambulacao" value="5"></td>
                    <td><input type="radio" name="deambulacao" value="15"></td>
                </tr>
                <tr>
                    <td>Escadas</td>
                    <td><input type="radio" name="escadas" value="0"></td>
                    <td><input type="radio" name="escadas" value="5"></td>
                    <td><input type="radio" name="escadas" value="10"></td>
                </tr>
            </table>

            <!-- Resultado da pontuação -->
            <p id="resultadoBarthel" style="text-align: center; font-size: 28px; color: #113838; font-weight: bold;"></p>

            <div class="button-container">
                <button class="styled-button" type="button" id="voltarEtapa1">Voltar</button>
                <button type="button" id="proximaEtapa2" class="styled-button">Próxima página</button>
            </div>
        </div>
        <!-- -----------------------------------------Tela 2------------------------------------------ -->
        <!-- -----------------------------------------Tela 3------------------------------------------ -->

        <div class="container" id="etapa3" style="display:none;">
            <h1>Timed Up and Go test (TUGT)</h1>
            <div class="instrucoes">
                <p><strong>Intruções:</strong> O paciente ou indivíduo que irá participar do teste de início deve estar sentado
                    em
                    uma cadeira sem braços com as costas reforçadas, usando seus calçados de uso habitual (seu dispositivo
                    auxiliar
                    de marcha caso utilize), Após o comando “VÀ ou VAI”, ele deve se levantar da cadeira e andar em um percurso
                    linear de 3 metros, com passos seguros (pode se acrescentar uma linha ou um objeto como, por exemplo, um cone)
                    para que o idoso o contorne e em seguida retorne em direção à cadeira sentar e novamente, o tempo deste
                    percurso
                    será cronometrado a partir do comando verbal de “vá” e avaliado em seguida quando o paciente retornar à sua
                    posição de início.
                </p>
            </div>
            <div class="tittle">
                <h1>CRONÔMETRO:</h1>
            </div>
            <div class="timer" id="timer">
                <img src="images/cronometro.png" alt="cronometro" class="image">
                <label id="tempo" class="tempo">00:00</label>
                <button class="iniciar" type="button" onclick="comecar()">INICIAR</button>
                <button class="terminar" type="button" onclick="parar()">FINALIZAR</button>
                <button class="resetar" type="button" onclick="resetar()">REINICIAR</button>
            </div><br>
            <div class="resultado" id="res">
                <label for=""><strong>Resultado:</strong></label>
                <p id="descricao"></p>
                <input type="hidden" name="tugt" id="tugt" value="">

            </div><br>
            <h1>TAF(teste de alcance funcional)</h1>
            <div class="TAF">
                <p><strong>Procedimentos:</strong>O paciente em posição ortostática, membros inferiores levemente abduzidos,
                    descalço, coluna a mais ereta possível, olhar para o horizonte, braços em extensão a 90° e hemicorpo direito
                    próximo à parede. A partir dessa posição, solicitava-se ao avaliado esticar-se o máximo possível para frente.
                    A
                    excursão do braço desde o inicio até o final é medida por uma fita métrica fixada na parede no sentido
                    horizontal ao lado do paciente, na altura do acrômio. Para a aferição, a extremidade do terceiro metacarpo
                    pode
                    ser utilizada como marcação de partida até o alcance máximo. </p>
            </div>
            <h1>Valores normativos do TAF</h1>
            <table>
                <tr>
                    <th>Faixa Etária</th>
                    <th>Homens (cm)</th>
                    <th>Mulheres (cm)</th>
                </tr>
                <tr>
                    <td>20 - 40 anos</td>
                    <td>42,41</td>
                    <td>37,08</td>
                </tr>
                <tr>
                    <td>41 - 69 anos</td>
                    <td>37,84</td>
                    <td>35,05</td>
                </tr>
                <tr>
                    <td>70 - 87 anos</td>
                    <td>33,52</td>
                    <td>26,63</td>
                </tr>
            </table>
            <h1>Teste de caminhada de 6 minutos</h1>
            <div class="tabela">
                <table class="tabela">
                    <tr>
                        <th></th>
                        <th>0 minutos</th>
                        <th>3 minutos</th>
                        <th>6 minutos</th>
                    </tr>
                    <tr>
                        <td>PA</td>
                        <td><input type="number" name="PA-0"></td>
                        <td><input type="number" name="PA-3"></td>
                        <td><input type="number" name="PA-6"></td>
                    </tr>
                    <tr>
                        <td>FC</td>
                        <td><input type="number" name="FC-0"></td>
                        <td><input type="number" name="FC-3"></td>
                        <td><input type="number" name="FC-6"></td>
                    </tr>
                    <tr>
                        <td>Sat o2</td>
                        <td><input type="number" name="Sat-0"></td>
                        <td><input type="number" name="Sat-3"></td>
                        <td><input type="number" name="Sat-6"></td>
                    </tr>
                    <tr>
                        <td>Fr</td>
                        <td><input type="number" name="Fr-0"></td>
                        <td><input type="number" name="Fr-3"></td>
                        <td><input type="number" name="Fr-6"></td>
                    </tr>
                    <tr>
                        <td>Borg</td>
                        <td><input type="number" name="Borg-0"></td>
                        <td><input type="number" name="Borg-3"></td>
                        <td><input type="number" name="Borg-6"></td>
                    </tr>
                </table><br>
            </div>
            <!--Distância percorrida e prevista-->
            <div>
                <label for="distanciaPercorrida">Distância percorrida:</label>
                <input type="text" id="distanciaPercorrida" name="distanciaPercorrida" class="distancia-percorrida"><br><br>
                <label for="distanciaPrevista">Distância prevista:</label>
                <input type="text" id="distanciaPrevista" name="distanciaPrevista" class="distancia-prevista">
            </div><br>
            <!-- teste de sentar e levantar -->
            <div class="teste-sentar-levantar">
                <h2>TESTE SENTAR E LEVANTAR (30 segundos):</h2>
                <p>O teste inicia com o idoso sentado em uma cadeira, com as costas encostadas e os pés afastados à largura dos
                    ombros e totalmente apoiados no solo. Os membros superiores devem estar cruzados ao nível dos punhos e contra
                    o
                    peito.</p>  
                <div>
                    <label for="sentar" class="sentar"><strong>SENTAR:</strong></label>
                    <select class="apoios-sentar" id="sentar">
                        <option value="" disabled selected>APOIOS</option>
                        <option value="5">Sem apoios</option>
                        <option value="4">Com 1 apoio</option>
                        <option value="3">Com 2 apoios</option>
                        <option value="2">Com 3 apoios</option>
                        <option value="1">Com 4 apoios</option>
                        <option value="0">Com mais de 4 apoios ou com ajuda externa</option>
                    </select>
                    <label for="levantar" class="levantar"><strong>LEVANTAR:</strong></label>
                    <select class="apoios-levantar" id="levantar">
                        <option value="" disabled selected>APOIOS</option>
                        <option value="5">Sem apoios</option>
                        <option value="4">Com 1 apoio</option>
                        <option value="3">Com 2 apoios</option>
                        <option value="2">Com 3 apoios</option>
                        <option value="1">Com 4 apoios</option>
                        <option value="0">Com mais de 4 apoios ou com ajuda externa</option>
                    </select>
                </div><br>
                <div>
                    <label><input type="checkbox" name="desequilibrioSentar" class="desequilibrio-sentar"
                            id="desequilibrioSentar">
                        Houve desequilíbrio</label>
                    <label><input type="checkbox" name="desequilibrioLevantar" class="desequilibrio-levantar"
                            id="desequilibrioLevantar">Houve desequilíbrio</label>
                </div><br>
                <label class="nota1">Nota:</label>
                <input type="text" class="nota-teste" id="nota-sentar" name="nota-sentar" readonly>
                <label class="nota2">Nota:</label>
                <input type="text" class="nota-teste" id="nota-levantar" name="nota-levantar" readonly>
            </div><br>
            <button class="botaoCalcular" type="button" onclick="calcularNota()">Calcular Nota</button>
            <!--campos de diagnóstico e objetivos-->
            <div>
                <h2>diagnóstico fisioterápeutico:</h2>
                <textarea class="diagnostico" id="diagnostico" name="diag-fisio" placeholder="Digite aqui:"></textarea>
            </div>
            <div>
                <h2>objetivo:</h2>
                <textarea class="objetivo" id="objetivo" name="objetivo" placeholder="Digite aqui:"></textarea>
            </div><br>
            <button class="styled-button" type="button" id="voltarEtapa2">Voltar</button>
            <button class="finalizar" type="submit">Finalizar</button>
        </div>
    </form>

</body>

</html>