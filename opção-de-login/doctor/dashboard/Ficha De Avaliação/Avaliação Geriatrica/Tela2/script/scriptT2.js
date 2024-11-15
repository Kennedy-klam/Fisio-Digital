document.addEventListener('DOMContentLoaded', () => {

    console.log('primeira parte');
    // Seção de "Sim" e "Não" para mostrar/ocultar partes do formulário
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

    // Função para calcular pontuação com base em checkboxes
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            updateNotes(checkbox.closest('.section'));
            updateTotalScore(); // Atualiza a pontuação total ao marcar/desmarcar checkboxes
        });
    });

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

    const notesInputs = document.querySelectorAll('.notes-input');
    notesInputs.forEach(input => {
        input.addEventListener('input', updateTotalScore);
    });

    function updateTotalScore() {
        let totalScore = 0;

        // Soma as pontuações dos campos de notas (calculadas pela função updateNotes)
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

        // Avaliações de depressão
        if (totalScore <= 25.1 && totalScore >= 20) {
            resultado += ", Escore médio para Depressão não-complicada";
        } else if (totalScore <= 19) {
            resultado = "Prejuízo cognitivo por depressão";
        }

        return resultado;
    }
});
// Função para calcular a nota
function calcularNota() {

    console.log('segunda parte');

    let total = 0;

    // Seleciona todas as checkboxes marcadas
    const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');

    // Soma os valores das checkboxes selecionadas
    checkboxes.forEach(checkbox => {
        total += parseInt(checkbox.value);
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

    // Exibe o total e a dependência no elemento de resultado
    document.getElementById('resultado2').innerText = `${total} pontos - ${dependencia}.`;
}

// Função para garantir que apenas uma checkbox por linha seja selecionada
function selecionarCheckboxesPorLinha(event) {
    const checkboxesNaLinha = event.target.closest('tr').querySelectorAll('input[type="checkbox"]');

    checkboxesNaLinha.forEach(checkbox => {
        if (checkbox !== event.target) {
            checkbox.checked = false; // Desmarca as outras checkboxes na mesma linha
        }
    });

    calcularNota(); // Recalcula a nota após a seleção
}

// Função para adicionar o evento 'change' após o carregamento da página
window.onload = function() {
    // Adiciona o evento 'change' a todas as checkboxes
    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', selecionarCheckboxesPorLinha);
    });
};
