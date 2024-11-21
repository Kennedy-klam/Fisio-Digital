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
async function calcularMedida() {
    const medida = parseFloat(document.getElementById('medidaTaf').value)
    const resultadoSpan = document.getElementById('resultado')

    //tabela com faixa etária e o valor normativo
    const faixas = [
        { faixa: '20 - 40 anos', homem: 42.41, mulher: 37.08, minIdade: 20, maxIdade: 40 },
        { faixa: '41 - 69 anos', homem: 37.84, mulher: 35.05, minIdade: 41, maxIdade: 69 },
        { faixa: '70 - 87 anos', homem: 33.52, mulher: 26.63, minIdade: 70, maxIdade: 87 }
    ];

    try {
        //simular requisição do banco via API 
        const resposta = await fetch('httpexemplo')
        const dadosPaciente = await resposta.json()

        //puxando o secsu e a idade
        const{sexo, idade} = dadosPaciente

        //aqui valida us dadus
        if(!sexo || !idade || isNaN(idade)){
            resultadoSpan.textContent = 'Erro: dados inválidos retornados do banco de dados'
            return
        }

        //determinar a faixa etária correta 
        const faixaCorrespondente = faixas.find(faixa => idade >= faixa.minIdade && idade <= faixa.maxIdade)

        if(!faixaCorrespondente){
            resultadoSpan.textContent = 'idade fora das faixas etárias!'
            return
        }
        //determina o valor esperado com base no secsu rsrs
        const valorEsperado = sexo === "homem" ? faixaCorrespondente.homem : faixaCorrespondente.mulher

        let resultado = ''
        let avaliacao = ''

        if (medida === valorEsperado){
            resultado = `${sexo === "homem" ? 'Homem' : 'Mulher'}, ${faixaCorrespondente.faixa}`
            avaliacao = 'Na média!'
        } else if (medida < valorEsperado){
            resultado = `${sexo === "homem" ? 'Homem' : 'Mulher'}, ${faixaCorrespondente.faixa}`;
            avaliacao = 'Abaixo da média!';
        } else{
            resultado = `${sexo === "homem" ? 'Homem' : 'Mulher'}, ${faixaCorrespondente.faixa}`;
            avaliacao = 'Acima da média!';
        }

        //exibir o resultado 
        resultadoSpan.textContent = `${resultado} . ${avaliacao}`
    }catch(error){
        //aqui vai trartar eeros na comunicação com o banco
        resultadoSpan.textContent ='Erro ao conectar com o banco de dados. Verifique a conexão'
        console.error('ERRO', error)
    }
}

