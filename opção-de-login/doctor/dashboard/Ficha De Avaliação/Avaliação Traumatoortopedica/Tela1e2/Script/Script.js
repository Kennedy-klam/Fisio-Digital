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

// Rosto

const marker = document.getElementById('marker');
const scale = document.querySelector('.scale');
const scaleNumbers = document.querySelectorAll('.scale-numbers span');
const evaInput = document.getElementById('eva1'); // Campo de EVA
let isDragging = false;

// Atualiza a posição do marcador
function updateMarkerPosition(event) {
    const rect = scale.getBoundingClientRect();
    let x = event.clientX - rect.left;

    const minX = -marker.offsetWidth;
    if (x < minX) x = minX;

    const maxX = rect.width - marker.offsetWidth / 2;
    if (x > maxX) x = maxX;

    const offset = 5;
    marker.style.left = `${x + offset}px`;

    // Move a imagem do marcador mais à direita
    marker.querySelector('img').style.marginLeft = '5px'; // Ajuste conforme necessário

    const percent = (x + marker.offsetWidth) / rect.width;
    const value = Math.round(percent * 10);

    updateMarkerEmoji(value);
    updateMarkerNumber(value);
    updateEVA(value);
}

// Atualiza o emoji de acordo com o valor
function updateMarkerEmoji(value) {
  const emojiURLs = [
    "https://emojipedia-us.s3.amazonaws.com/source/skype/289/slightly-smiling-face_1f642.png",  // 0
    "https://emojipedia-us.s3.amazonaws.com/source/skype/289/slightly-smiling-face_1f642.png", // 1-3
    "https://emojipedia-us.s3.amazonaws.com/source/skype/289/neutral-face_1f610.png", // 4-6
    "https://emojipedia-us.s3.amazonaws.com/source/skype/289/frowning-face-with-open-mouth_1f626.png", // 7-8
    "https://emojipedia-us.s3.amazonaws.com/source/skype/289/crying-face_1f622.png", // 9-10
  ];

  let emojiIndex = Math.min(Math.floor(value / 2), emojiURLs.length - 1);
  marker.querySelector('img').src = emojiURLs[emojiIndex];
}

// Atualiza o número exibido abaixo do marcador (corrige a exibição incorreta)
function updateMarkerNumber(value) {
  const number = scaleNumbers[value];
  number.style.color = 'black'; // Destacar o número selecionado

  // Resetar a cor de todos os números
  scaleNumbers.forEach(num => num.style.color = 'gray');

  // Destacar apenas o número atual
  number.style.color = 'black';
}

// Atualiza o campo EVA com o valor correspondente
function updateEVA(value) {
  evaInput.value = value; // Atualiza o campo EVA com o valor da escala
}

// Eventos para arrastar o marcador
marker.addEventListener('mousedown', function() {
  isDragging = true;
  marker.style.cursor = 'grabbing';
});

window.addEventListener('mouseup', function() {
  isDragging = false;
  marker.style.cursor = 'grab';
});

window.addEventListener('mousemove', function(event) {
  if (isDragging) {
    updateMarkerPosition(event);
  }
});
