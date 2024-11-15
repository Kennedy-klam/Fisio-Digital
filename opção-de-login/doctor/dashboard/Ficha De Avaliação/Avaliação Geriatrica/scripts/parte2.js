console.log('O script da tela 2 está carregado!');

// Função para inicializar toda a lógica da Etapa 2
function inicializarParte2() {
    console.log('Inicializando Parte 2...');
    
    // Configuração dos eventos de "Sim" e "Não"
    const calcSim = document.getElementById('calc-sim');
    const calcNao = document.getElementById('calc-nao');
    const radioButtons = document.querySelectorAll('input[name="calc"]');

    radioButtons.forEach(radio => {
        radio.addEventListener('change', () => {
            if (radio.value === 'sim') {
                calcSim.style.display = 'block';
                calcNao.style.display = 'none';
            } else if (radio.value === 'não') {
                calcSim.style.display = 'none';
                calcNao.style.display = 'block';
            }
        });
    });

    // Configuração para calcular pontuação com base nos checkboxes
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            updateNotes(checkbox.closest('.section'));
            updateTotalScore(); // Atualiza a pontuação total ao marcar/desmarcar checkboxes
        });
    });

    const notesInputs = document.querySelectorAll('.notes-input');
    notesInputs.forEach(input => {
        input.addEventListener('input', updateTotalScore);
    });

    // Funções auxiliares
    function updateNotes(section) {
        const checkboxes = section.querySelectorAll('input[type="checkbox"]');
        const notesField = section.querySelector('.notes-input');

        let score = 0;
        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                score++;
            }
        });

        if (notesField) {
            notesField.value = score; // Atualiza a nota da seção com base nas checkboxes
        }
    }

    function updateTotalScore() {
        let totalScore = 0;

        notesInputs.forEach(input => {
            const value = parseInt(input.value, 10);
            if (!isNaN(value)) {
                totalScore += value;
            }
        });

        const resultado = avaliarResultado(totalScore);
        document.getElementById('resultado').textContent = `RESULTADO: ${totalScore} pontos - ${resultado}`;
    }

    function avaliarResultado(totalScore) {
        let resultado = '';

        if (totalScore >= 27) {
            resultado = "Normal";
        } else if (totalScore > 19 && (totalScore <= 24 || totalScore === 26)) {
            resultado = "Estado cognitivo alterado";
        }

        if (totalScore <= 25.1 && totalScore >= 20) {
            resultado += ", Escore médio para Depressão não-complicada";
        } else if (totalScore <= 19) {
            resultado = "Prejuízo cognitivo por depressão";
        }

        return resultado;
    }
}

// Chama a função manualmente assim que o script é carregado
inicializarParte2();


 // Função para calcular a pontuação total
 function calcularBarthel() {
    const radios = document.querySelectorAll('input[type="radio"]');
    let total = 0;

    // Itera sobre os radio buttons e soma os valores selecionados
    radios.forEach(radio => {
        if (radio.checked) {
            total += parseInt(radio.value);
        }
    });

    // Determina a descrição da dependência
    let dependencia;
    if (total >= 100) {
        dependencia = 'Totalmente independente';
    } else if (total >= 76) {
        dependencia = 'Dependência leve';
    } else if (total >= 51) {
        dependencia = 'Dependência moderada';
    } else if (total >= 26) {
        dependencia = 'Dependência severa';
    } else {
        dependencia = 'Dependência total';
    }

    // Exibe o resultado no parágrafo
    document.getElementById("resultadoBarthel").innerText = total + " pontos, " + dependencia;
}

// Adiciona o evento de mudança em cada radio button
const radios = document.querySelectorAll('input[type="radio"]');
radios.forEach(radio => {
    radio.addEventListener('change', calcularBarthel);
});

