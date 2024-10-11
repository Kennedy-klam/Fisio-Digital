let cronometro
let totalSegundos = 0

function formatarTempo(segundos) {
    const minutos = Math.floor(segundos / 60)
    const segRestantes = segundos % 60
    return `${minutos < 10 ? '0' : ''}${minutos}:${segRestantes < 10 ? '0' : ''}${segRestantes}`
}

function comecar() {
    parar();
    cronometro = setInterval(() => {
        totalSegundos++
        document.getElementById("tempo").innerText = formatarTempo(totalSegundos)
        mostrarResultado(totalSegundos)
    }, 1000)
}

function parar() {
    clearInterval(cronometro)
}

function resetar() {
    parar();
    totalSegundos = 0
    document.getElementById("tempo").innerText = "00:00"
    document.getElementById("descricao").innerText = ""
}
function mostrarResultado(segundos) {
    const minutos = segundos / 60;
    let descricao = "";
    if (minutos <= 10 / 60) {
        descricao = "Desempenho normal para adultos saudáveis. BAIXO RISCO DE QUEDA."
    } else if (minutos <= 20 / 60) {
        descricao = "Normal para idosos frágeis ou com deficiência, mas que são independentes para a maioria das atividades de vida diária (AVD's). BAIXO RISCO DE QUEDA."
    } else if (minutos <= 29 / 60) {
        descricao = "Avaliação funcional obrigatória. Abordagem específica para prevenção de queda. RISCO DE QUEDAS MODERADO."
    } else if (minutos >= 30 / 60) {
        descricao = "30 segundos ou mais. ALTO RISCO DE QUEDAS."
    }
    document.getElementById("descricao").innerText = descricao
}

const botao = document.getElementById('prox-pag')
botao.addEventListener("click", function () {
    window.alert('Formulário Salvo!')
    window.location.href = "O LINK VAI AQUI"
})

function calcularNota() {
    let sentar = document.getElementById('sentar').value
    let levantar = document.getElementById('levantar').value
    let desequilibrioSentar = document.getElementById('desequilibrioSentar').checked
    let desequilibrioLevantar = document.getElementById('desequilibrioLevantar').checked
    let notaSentar = parseFloat(sentar)
    let notaLevantar = parseFloat(levantar)

    if (isNaN(notaSentar)) {
        notaSentar = 0
    }

    if (isNaN(notaLevantar)) {
        notaLevantar = 0
    }
    //subtrair se houver desequilibrio em sentar
    if (desequilibrioSentar) {
        notaSentar -= 0.5
    }
    //subtrair se houver desequilibrio em levantar
    if (desequilibrioLevantar) {
        notaLevantar -= 0.5
    }

    document.getElementById('notaSentar').value = notaSentar.toFixed(1)
    document.getElementById('notaLevantar').value = notaLevantar.toFixed(1)

}
