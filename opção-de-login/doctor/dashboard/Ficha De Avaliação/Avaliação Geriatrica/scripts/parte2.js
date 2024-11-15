console.log('O script da tela 2 está carregado!');

// Função para inicializar toda a lógica da Etapa 2 (ACLC)
function inicializarParte2() {
    console.log("Inicializando Parte 2...");

    // Configuração de eventos para as seções de cálculo
    const radioButtons = document.querySelectorAll('input[name="calc"]');
    const calcSim = document.getElementById("calc-sim");
    const calcNao = document.getElementById("calc-nao");

    // Gerenciar exibição de cálculos ou soletração
    radioButtons.forEach((radio) => {
        radio.addEventListener("change", () => {
            if (radio.value === "sim") {
                calcSim.style.display = "block";
                calcNao.style.display = "none";
            } else {
                calcSim.style.display = "none";
                calcNao.style.display = "block";
            }
        });
    });

    // Função para calcular pontuação total na Etapa 2
    function updateTotalScoreCognitiva() {
        let totalScore = 0;
        const notesInputs = document.querySelectorAll(".notes-input");
        notesInputs.forEach((input) => {
            const value = parseInt(input.value, 10);
            if (!isNaN(value)) {
                totalScore += value;
            }
        });

        const resultadoCognitivo = document.getElementById("resultado");
        resultadoCognitivo.textContent = `RESULTADO: ${totalScore} pontos.`;
    }

    // Eventos para os checkboxes e inputs numéricos
    const checkboxes = document.querySelectorAll(".section input[type='checkbox']");
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener("change", () => {
            const section = checkbox.closest(".section");
            if (section) {
                updateSectionNotes(section);
            }
            updateTotalScoreCognitiva();
        });
    });

    const notesInputs = document.querySelectorAll(".notes-input");
    notesInputs.forEach((input) => {
        input.addEventListener("input", updateTotalScoreCognitiva);
    });

    // Atualiza a nota de uma seção específica
    function updateSectionNotes(section) {
        const sectionCheckboxes = section.querySelectorAll("input[type='checkbox']");
        const notesField = section.querySelector(".notes-input");

        let sectionScore = 0;
        sectionCheckboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                sectionScore++;
            }
        });

        if (notesField) {
            notesField.value = sectionScore;
        }
    }
}
// Inicializa a lógica da Etapa 2
inicializarParte2();

// Função para calcular o índice de Barthel
function calcularBarthel() {
    const radios = document.querySelectorAll('#barthelTable input[type="radio"]');
    let total = 0;

    // Soma os valores dos radio buttons selecionados
    radios.forEach(radio => {
        if (radio.checked) {
            total += parseInt(radio.value, 10);
        }
    });

    // Determina o grau de dependência com base na pontuação
    const dependencia = determinarDependencia(total);

    // Exibe o resultado no elemento com ID "resultadoBarthel"
    const resultadoBarthelEl = document.getElementById('resultadoBarthel');
    if (resultadoBarthelEl) {
        resultadoBarthelEl.innerText = `RESULTADO: ${total} pontos - ${dependencia}`;
    }
}

// Função para determinar o grau de dependência
function determinarDependencia(total) {
    if (total >= 100) {
        return 'Totalmente independente';
    } else if (total >= 76) {
        return 'Dependência leve';
    } else if (total >= 51) {
        return 'Dependência moderada';
    } else if (total >= 26) {
        return 'Dependência severa';
    } else {
        return 'Dependência total';
    }
}

// Adiciona o evento de mudança para cada radio button
document.querySelectorAll('#barthelTable input[type="radio"]').forEach(radio => {
    radio.addEventListener('change', calcularBarthel);
});
