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
        descricao = "30 segundos ou mais. ALTO RISCO DE QUEDAS.";
    }

    document.getElementById("descricao").innerText = descricao;
}
