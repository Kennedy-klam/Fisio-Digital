<?php
// Conectando ao banco de dados
include("../../../../../../database/dbConect.php");

// Criando conexão
$conn = new mysqli($host, $user, $pass, $banco);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}


// ID do paciente que queremos buscar
$paciente_id = 1;  // Exemplo estático, sera dinâmico

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
    <title>Tela 1 Avaliação Geriátrica</title>
    <link rel="stylesheet" href="Estilos/styles.css">
    <!--versão 1.0-->
    <script>
        function redirecionar(url) {
            window.location.href = url;
        }
    </script>
</head>

<body>
    <form action="../database/T1Registro.php" method="post">
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
                            <option value disabled selected>Selecione...</option>
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
            <button class="styled-button" type="submit">Próxima página</button>
        </div>
    </form>

    <!--O script ficou aqui porque não estava sendo carregado-->
    <script src="Script/script.js"></script>
</body>

</html>