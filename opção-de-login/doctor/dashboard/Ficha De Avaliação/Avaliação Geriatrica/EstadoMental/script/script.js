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
        document.getElementById('resultado').textContent = `RESULTADO: ${totalScore} pontos. Avaliação: ${resultado}`;
    }

    function avaliarResultado(totalScore) {
        let resultado = '';

        if (totalScore > 27) {
            resultado = "Normal";
        } else if (totalScore <= 24) {
            resultado = "Estado cognitivo alterado";
        }

        // Avaliações de depressão
        if (totalScore >= 25.1) {
            resultado += ", Escore médio para Depressão não-complicada";
        } else if (totalScore <= 19) {
            resultado += ", Prejuízo cognitivo por depressão";
        }

        return resultado;
    }
});

// Função para atualizar o valor do "score-cell" e somar o total
function atualizarScore(selectElement) {
    // Obtém o valor selecionado no <select>
    let valorSelecionado = parseInt(selectElement.value) || 0; // Converte o valor para número, ou 0 se for inválido
    
    // Localiza a célula da tabela com a classe 'score-cell' na mesma linha
    let celulaScore = selectElement.closest('tr').querySelector('.score-cell');
    
    // Atualiza a célula 'score-cell' com o valor selecionado
    celulaScore.textContent = valorSelecionado;

    // Atualiza o total geral
    atualizarTotal();
}

// Função para calcular o total e atualizar o elemento com id="resultado2"
function atualizarTotal() {
    let total = 0;

    // Itera sobre todas as células com a classe 'score-cell' e soma os valores
    document.querySelectorAll('.score-cell').forEach(function(celula) {
        let valor = parseInt(celula.textContent) || 0;
        total += valor;
    });

    // Atualiza o elemento com id "resultado2" com o valor total
    document.getElementById('resultado2').textContent = `RESULTADO: ${total} pontos.`;
}

// Adiciona o evento de 'change' (mudança) em todos os elementos <select>
document.querySelectorAll('select').forEach(function(select) {
    select.addEventListener('change', function() {
        atualizarScore(this);
    });
});
