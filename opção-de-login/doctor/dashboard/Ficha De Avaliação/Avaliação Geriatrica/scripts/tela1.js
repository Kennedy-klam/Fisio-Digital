console.log('O script da tela 1 está carregado!');

function addMed() {
    // Obtendo os valores dos inputs
    const medicamento = document.getElementById('medicamentos').value;
    const comoUsa = document.getElementById('como-usa').value;
    const tempoUso = document.getElementById('tempo-uso').value;

    // Verificando se os campos não estão vazios
    if (medicamento === "" || comoUsa === "" || tempoUso === "") {
        alert("Preencha todos os campos.");
        return;
    }

    // Criando uma nova linha na tabela
    const tabela = document.getElementById('tabela-medicamentos').getElementsByTagName('tbody')[0];
    const novaLinha = tabela.insertRow();

    // Inserindo as células na nova linha
    const celulaMedicamento = novaLinha.insertCell(0);
    const celulaComoUsa = novaLinha.insertCell(1);
    const celulaTempoUso = novaLinha.insertCell(2);
    const celulaBotao = novaLinha.insertCell(3);

    // Adicionando o conteúdo nas células
    celulaMedicamento.textContent = medicamento;
    celulaComoUsa.textContent = comoUsa;
    celulaTempoUso.textContent = tempoUso;

    // Criando botão de remover com o estilo
    const botaoRemover = document.createElement('button');
    botaoRemover.textContent = 'Remover';
    botaoRemover.classList.add('botao-remover' , 'remove-btn1');

    // Adicionando um evento de clique ao botão
    botaoRemover.addEventListener('click', function() {
        novaLinha.remove();
    });

    // Adicionando o botão à célula
    celulaBotao.appendChild(botaoRemover);

    // Limpando os inputs do formulário
    document.getElementById('medicamento-form').reset();
}

// Adicionando o evento ao botão
document.getElementById('adicionar-btn').addEventListener('click', addMed);

//Script para mostrar
function mostrarProfissao() {
    var rendaSelect = document.getElementById("renda");
    var profissaoCampo = document.getElementById("profissaoCampo");
    
    if (rendaSelect.value === "outros") {
        profissaoCampo.style.display = "block";
    } else {
        profissaoCampo.style.display = "none";
        document.getElementById("profissao").value = ""; // Limpa sem
    }
}


//mostrar data 
function mostrarData() {
    const dataContainer = document.getElementById('data-container');
    const simSelected = document.getElementById('continencia-sim').checked;

    if (simSelected) {
        dataContainer.style.display = 'block'; 
    } else {
        dataContainer.style.display = 'none'; 
    }
}

    function mostrarDataF() {
        const dataFecalContainer = document.getElementById('data-fecal-container');
        const fecalSimSelected = document.getElementById('continencia-fecal-sim').checked;

        if (fecalSimSelected) {
            dataFecalContainer.style.display = 'block'; // Mostrar campo de data se "Sim" for selecionado
        } else {
            dataFecalContainer.style.display = 'none'; // Ocultar campo de data se "Não" for selecionado
        }
    }

    function mostrarTexto() {
        const textoDisturbiosContainer = document.getElementById('texto-disturbios-container');
        const disturbiosSelected = document.getElementById('sono-naolegal').checked;

        if (disturbiosSelected) {
            textoDisturbiosContainer.style.display = 'block'; // Mostrar campo de texto se "Distúrbios" for selecionado
        } else {
            textoDisturbiosContainer.style.display = 'none'; // Ocultar campo de texto se "Normal" for selecionado
        }
    }

    function mostrarQuedaQuantas() {
        const quedaQuantasContainer = document.getElementById('queda-quantas-container');
        const quedaSelected = document.getElementById('queda').value;

        if (quedaSelected === 'sim') {
            quedaQuantasContainer.style.display = 'block'; // Mostrar campo de número se "Sim" for selecionado
        } else {
            quedaQuantasContainer.style.display = 'none'; // Ocultar campo de número se "Não" for selecionado
        }
    }

    function mostrarTempoFumar() {
        const tempoFumarContainer = document.getElementById('tempo-fumar-container');
        const fumou = document.querySelector('input[name="Fuma"]:checked');

        if (fumou && fumou.value === 'parou') {
            tempoFumarContainer.style.display = 'block'; // Mostrar campo de texto se "Parou" for selecionado
        } else {
            tempoFumarContainer.style.display = 'none'; // Ocultar campo de texto se "Sim" ou "Não" forem selecionados
        }
    }

    function mostrarTempoEtilista() {
        const tempoEtilistaContainer = document.getElementById('tempo-etilista-container');
        const etilista = document.querySelector('input[name="etilista"]:checked');

        if (etilista && etilista.value === 'parou') {
            tempoEtilistaContainer.style.display = 'block'; // Mostrar campo de texto se "Parou de fumar" for selecionado
        } else {
            tempoEtilistaContainer.style.display = 'none'; // Ocultar campo de texto se "Sim" ou "Não" forem selecionados
        }
    }

    function adicionarDoenca() {
        const select = document.getElementById('doencas');
        const doencaSelecionada = select.value;
        const doencaTexto = select.options[select.selectedIndex].text;
    
        // Evita adicionar a opção "Outros"
        if (doencaSelecionada === "outros") {
            return; // Não faz nada quando outros é selecionado
        }
    
        // Verifica se a doença já foi adicionada
        if (!document.getElementById(doencaSelecionada)) {
           
            const doencaDiv = document.createElement('div');
            doencaDiv.classList.add('doenca-selecionada');
            doencaDiv.id = doencaSelecionada;
    
            // Adiciona o texto da doença
            const doencaSpan = document.createElement('span');
            doencaSpan.textContent = doencaTexto;
            doencaDiv.appendChild(doencaSpan);
    
            // Botão de remover
            const removeBtn = document.createElement('button');
            removeBtn.classList.add('remove-btn');
            removeBtn.innerHTML = '&times;'; // O "x"
            removeBtn.onclick = function() {
                doencaDiv.remove(); // Remove o próprio div da doença
            };
            doencaDiv.appendChild(removeBtn);
    
            // Adiciona a doença 
            document.getElementById('doencas-selecionadas').appendChild(doencaDiv);
        }
    }

    function mostrarCampoAF() {
        var sim = document.getElementById("atividade-sim");
        var campo = document.getElementById("campo-quantos-dias");

        // Exibe o campo apenas se a opção "Sim" estiver selecionada
        if (sim.checked) {
            campo.style.display = "block";
        } else {
            campo.style.display = "none";
        }
    }
    
    
