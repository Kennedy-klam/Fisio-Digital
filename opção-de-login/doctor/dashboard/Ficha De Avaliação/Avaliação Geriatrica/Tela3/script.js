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
    clearInterval(cronometro);
     // Atualiza o campo oculto com o valor do tempo
     document.getElementById("tugt").value = document.getElementById("tempo").innerText;
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
botao.addEventListener("click", function(){
    window.alert('Formulário Salvo!')
    window.location.href = "O LINK VAI AQUI"
})

function calcularNota(){
    let sentar = document.getElementById('sentar').value
    let levantar = document.getElementById('levantar').value
    let desequilibrioSentar = document.getElementById('desequilibrioSentar').checked
    let desequilibrioLevantar = document.getElementById('desequilibrioLevantar').checked
    let notaSentar = parseFloat(sentar)
    let notaLevantar = parseFloat(levantar)

    if(isNaN(notaSentar)){
        notaSentar = 0
    }

    if(isNaN(notaLevantar)){
        notaLevantar = 0
    }
    //subtrair se houver desequilibrio em sentar
    if(desequilibrioSentar){
        notaSentar -= 0.5
    }
    //subtrair se houver desequilibrio em levantar
    if(desequilibrioLevantar){
        notaLevantar -= 0.5
    }

    document.getElementById('nota-sentar').value = notaSentar.toFixed(1)
    document.getElementById('nota-levantar').value = notaLevantar.toFixed(1)

}

function calcularMedida(){
    const genero = document.getElementById('genero').value
    const medida = parseFloat(document.getElementById('medidaTaf').value)
    const resultadoSpan = document.getElementById('resultado')
    //const tolerancia = 3

    const faixas = [
        {faixa:'20 - 40 anos', homem: 42.41, mulher: 37.08},
        {faixa:'41 - 69anos', homem: 37.84, mulher: 35.05},
        {faixa:'70 - 87 anos', homem: 33.52, mulher: 26.63}
    ]

    let resultado = 'Nenhuma faixa correspondente'
    let avaliacao = ''
    

    for(const faixa of faixas ){
        const valorEsperado = genero === "Homem"? faixa.homem : faixa.mulher
        

        if(medida === valorEsperado){
            resultado = `${genero === "Homem" ? 'homem' : 'mulher'}, ${faixa.faixa}`
            avaliacao = 'Na média!'     
        }else if(medida < valorEsperado){
            resultado = `${genero === "Homem" ? 'homem' : 'mulher'}, ${faixa.faixa}`
            avaliacao = 'Abaixo da média!'
        }else if(medida > valorEsperado){
            resultado = `${genero === ""}`
        }
    }
    resultadoSpan.textContent = `${resultado} . ${avaliacao}`
}