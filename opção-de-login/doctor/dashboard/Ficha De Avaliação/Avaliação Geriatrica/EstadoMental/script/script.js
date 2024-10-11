document.addEventListener('DOMContentLoaded', () => {
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

    // Função para calcular pontuação com base em checkboxes (outra funcionalidade)
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            updateNotes(checkbox.closest('.section'));
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
            notesField.value = score;
        }
    }

    // Atualiza a pontuação total de todas as seções não relacionadas ao Teste de Força
    const notesInputs = document.querySelectorAll('.notes-input');
    notesInputs.forEach(input => {
        input.addEventListener('input', updateTotalScore);
    });

    function updateTotalScore() {
        let totalScore = 0;

        notesInputs.forEach(input => {
            const value = parseInt(input.value, 10);
            if (!isNaN(value)) {
                totalScore += value;
            }
        });

        document.getElementById('resultado').textContent = `RESULTADO: ${totalScore} pontos.`;
    }
});


// Seleciona todos os elementos select da tabela
const selects = document.querySelectorAll('.notes-table');

// Adiciona um listener para cada select
selects.forEach(select => {
    select.addEventListener('change', function() {
        // Encontra a célula SCORE na mesma linha do select
         const scoreCell = this.parentElement.nextElementSibling;

        // Insere o valor do select na célula SCORE
        scoreCell.textContent = this.value;
    });
});