document.getElementById('adicionar-btn').addEventListener('click', function() {
    const medicamento = document.getElementById('medicamentos').value;
    const comoUsa = document.getElementById('como-usa').value;
    const tempoUso = document.getElementById('tempo-uso').value;

    if (medicamento && comoUsa && tempoUso) {
        const tabela = document.getElementById('tabela-medicamentos').getElementsByTagName('tbody')[0];

        const novaLinha = tabela.insertRow();

        const celulaMedicamento = novaLinha.insertCell(0);
        const celulaComoUsa = novaLinha.insertCell(1);
        const celulaTempoUso = novaLinha.insertCell(2);

        celulaMedicamento.textContent = medicamento;
        celulaComoUsa.textContent = comoUsa;
        celulaTempoUso.textContent = tempoUso;

        document.getElementById('medicamentos').value = '';
        document.getElementById('como-usa').value = '';
        document.getElementById('tempo-uso').value = '';
    } else {
        alert("Preencha todos os campos.");
    }
});
