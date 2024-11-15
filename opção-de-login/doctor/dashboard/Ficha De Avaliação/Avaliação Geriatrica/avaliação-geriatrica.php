<?php
// Conectando ao banco de dados
include("../../../../../database/dbConect.php");

// ID do paciente que queremos buscar
$paciente_id = 2;  // Exemplo estático, sera dinâmico

// Buscando os dados do usuário
$sql = "SELECT nome, nascimento, sexo, estaCivil, celular FROM paciente WHERE idPaciente = $paciente_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Os dados do usuário existem, pegamos a linha
    $row = $result->fetch_assoc();
    $nome = $row["nome"];
    $dataNascimento = $row["nascimento"];
    $sexo = $row["sexo"];
    $estadoCivil = $row["estaCivil"];
    $telefone = $row["celular"];

    // Calculando a idade
    $hoje = new DateTime();
    $nascimento = new DateTime($dataNascimento);
    $idade = $hoje->diff($nascimento)->y;
} else {
    echo "Nenhum dado encontrado para esse usuário.";
    exit();
}
?>



<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha de Avaliação de Fisioterapia Geriátrica</title>
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

        #barthelTable th, #barthelTable td {
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
    <form action="database/T1Registro.php" method="post">

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
            <div>
                <h2>Medicamentos</h2>
                <br>
                <div id="medicamento-form">

                    <div class="campo">
                        <br>
                        <label for="medicamentos">Medicamentos:</label>
                        <input type="text" id="medicamentos" name="medicamentos"
                            placeholder="Digite aqui...">
                    </div>

                    <div class="campo">
                        <br>
                        <label for="como-usa">Como usa:</label>
                        <input type="text" id="como-usa" name="como-usa"
                            placeholder="Digite aqui...">
                    </div>

                    <div class="campo">
                        <br>
                        <label for="tempo-uso">Tempo de Uso:</label>
                        <input type="text" id="tempo-uso" name="tempo-uso"
                            placeholder="Digite aqui...">
                    </div>

                    <br>
                    <div>
                        <button class="styled-button" type="button"
                            id="adicionar-btn">Adicionar </button>
                    </div>
                </div>
                <br>

                <h2>Tabela de Medicamentos</h2>
                <table id="tabela-medicamentos">
                    <thead>
                        <tr>
                            <th>Medicamento</th>
                            <th>Como Usa</th>
                            <th>Tempo de Uso</th>
                            <th>Remover Medicamento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- As linhas serão adicionadas dinamicamente aqui -->
                    </tbody>
                </table>
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
                                Clique <a href="instrucao.html" target="_blank">&nbsp;AQUI &nbsp;</a> e peça ao
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
                            <a href="imagens/desenho.jpeg" target="_blank">Clique aqui para ver o desenho</a>
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
            <td><input type="radio" name="higiene" value="0"></td>
            <td><input type="radio" name="higiene" value="5"></td>
            <td><input type="radio" name="higiene" value="10"></td>
        </tr>
        <tr>
            <td>Vestir-se</td>
            <td><input type="radio" name="vestir" value="0"></td>
            <td><input type="radio" name="vestir" value="5"></td>
            <td><input type="radio" name="vestir" value="10"></td>
        </tr>
        <tr>
            <td>Intestino</td>
            <td><input type="radio" name="urina" value="0"></td>
            <td><input type="radio" name="urina" value="5"></td>
            <td><input type="radio" name="urina" value="10"></td>
        </tr>
        <tr>
            <td>Sistema Urinário</td>
            <td><input type="radio" name="fezes" value="0"></td>
            <td><input type="radio" name="fezes" value="5"></td>
            <td><input type="radio" name="fezes" value="10"></td>
        </tr>
        <tr>
            <td>Uso do Banheiro</td>
            <td><input type="radio" name="sanitario" value="0"></td>
            <td><input type="radio" name="sanitario" value="5"></td>
            <td><input type="radio" name="sanitario" value="10"></td>
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
                <button type="button" id="proximaEtapa1" class="styled-button">Próxima página</button>
            </div>
        </div>
        <!-- -----------------------------------------Tela 2------------------------------------------ -->
    </form>

</body>
</html>