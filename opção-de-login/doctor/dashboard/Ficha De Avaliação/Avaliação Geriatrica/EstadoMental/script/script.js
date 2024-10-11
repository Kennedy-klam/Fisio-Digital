document.addEventListener('DOMContentLoaded', () => {
    const calcSim = document.getElementById('calc-sim');
    const calcNao = document.getElementById('calc-nao');
    const radioButtons = document.querySelectorAll('input[name="calc"]');

    // Mostra/oculta as seções de cálculo com base na seleção "Sim" ou "Não"
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

    // Adiciona eventos a todas as checkboxes para calcular a pontuação automaticamente
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            updateNotes(checkbox.closest('.section'));
        });
    });

    // Função para atualizar a pontuação em cada seção
    function updateNotes(section) {
        const checkboxes = section.querySelectorAll('input[type="checkbox"]');
        const notesField = section.querySelector('.notes-input');

        // Conta quantas checkboxes estão selecionadas
        let score = 0;
        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                score++;
            }
        });

        // Atualiza o campo de nota com a pontuação calculada
        if (notesField) {
            notesField.value = score;
        }
    }

    // Atualiza a pontuação total sempre que qualquer checkbox é alterada ou um campo de nota é preenchido manualmente
    const notesInputs = document.querySelectorAll('.notes-input');
    notesInputs.forEach(input => {
        input.addEventListener('input', updateTotalScore);
    });

    function updateTotalScore() {
        let totalScore = 0;

        // Soma as notas de todas as seções
        notesInputs.forEach(input => {
            const value = parseInt(input.value, 10);
            if (!isNaN(value)) {
                totalScore += value;
            }
        });

        // Atualiza o resultado final
        document.getElementById('resultado').textContent = `RESULTADO: ${totalScore} pontos.`;
    }
});