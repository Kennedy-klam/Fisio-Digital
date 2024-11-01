function toggleX(cell) {
    // Verifica
    if (cell.innerHTML === 'X') {
        cell.innerHTML = ''; // Limpa
    } else {
        cell.innerHTML = 'X'; // Marca
    }
}

//Das tabelas de colocar 
const adicionarBtn = document.getElementById('adicionar-btn');
const removerBtn = document.getElementById('remover-btn');
const tabelaMedicamentos = document.getElementById('tabela-medicamentos').querySelector('tbody');
const form = document.getElementById('form-medicamentos');

adicionarBtn.addEventListener('click', function () {
    const medicamento = document.getElementById('medicamentos').value;
    const classeTerapêutica = document.getElementById('como-usa').value;

    if (medicamento && classeTerapêutica) {
        const novaLinha = tabelaMedicamentos.insertRow();
        novaLinha.insertCell(0).textContent = medicamento;
        novaLinha.insertCell(1).textContent = classeTerapêutica;

        // Adiciona evento de clique na linha para selecionar tipo, so clicar na linha, aí depois aperta remiver
        novaLinha.addEventListener('click', function () {
            this.classList.toggle('selected'); // Adiciona ou remove a classe 'selected'
        });

        // Limpa os campos 
        form.reset();
    } else {
        alert('Por favor, preencha todos os campos.');
    }
});

removerBtn.addEventListener('click', function () {
    const linhasSelecionadas = tabelaMedicamentos.querySelectorAll('tr.selected');
    linhasSelecionadas.forEach(linha => {
        tabelaMedicamentos.deleteRow(linha.rowIndex - 1); // Remove
    });
});

const adicionarBtn1 = document.getElementById('adicionar-btn1');
    const removerBtn1 = document.getElementById('remover-btn1');
    const tabelaDor1 = document.getElementById('tabela-dor1').querySelector('tbody');
    const form1 = document.getElementById('form-dor1');

    adicionarBtn1.addEventListener('click', function () {
        const dor1 = document.getElementById('dor1').value;
        const eva1 = document.getElementById('eva1').value;

        if (dor1 && eva1) {
            const novaLinha1 = tabelaDor1.insertRow();
            novaLinha1.insertCell(0).textContent = dor1;
            novaLinha1.insertCell(1).textContent = eva1;

            // Adiciona evento de clique na linha para selecionar tipo
            novaLinha1.addEventListener('click', function () {
                this.classList.toggle('selected'); // Adiciona ou remove a classe 'selected'
            });

            // Limpa os campos 
            form1.reset();
        } else {
            alert('Por favor, preencha todos os campos.');
        }
    });

    removerBtn1.addEventListener('click', function () {
        const linhasSelecionadas1 = tabelaDor1.querySelectorAll('tr.selected');
        linhasSelecionadas1.forEach(linha => {
            tabelaDor1.deleteRow(linha.rowIndex - 1); // Remove
        });
    });