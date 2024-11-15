console.log('O script está carregado!');

// Função para adicionar um CSS específico
function carregarCss(cssFile, id) {
    let link = document.createElement("link");
    link.id = id;
    link.rel = "stylesheet";
    link.href = cssFile;
    document.head.appendChild(link);
    console.log('css carregado');
}

// Função para remover um CSS específico
function removerCss(id) {
    let link = document.getElementById(id);
    if (link) {
        link.remove();
        console.log('css removido')
    }
}

 // Função para carregar um arquivo JS
 function carregarScript(src, id) {
    let script = document.createElement("script");
    script.src = src;
    script.id = id;  // Damos um ID para que seja fácil remover depois
    script.defer = true; // Adiciona o atributo defer
    document.head.appendChild(script);
    console.log('js carregado');
}

// Função para remover um arquivo JS
function removerScript(id) {
    let script = document.getElementById(id);
    if (script) {
        script.remove();
        console.log('js removido');
    }
}


// Carrega o CSS e js da Etapa 1 ao iniciar
window.onload = function () {
    carregarCss("styles/tela1.css", "cssEtapa1");

    carregarScript("scripts/tela1.js", "jsEtapa1"); // Carrega o script para a etapa 1
};

// Passar para a próxima etapa
document.getElementById('proximaEtapa1').addEventListener('click', function () {

    // Alterna o CSS para a Etapa 2
    removerScript("jsEtapa1"); // Remove o script da etapa 1, se carregado

    removerCss("cssEtapa1"); // Remove o CSS da Etapa 1
    
    carregarScript("scripts/parte2.js", "jsEtapa2"); // Carrega o script para a etapa 2

    carregarCss("styles/tela2.css", "cssEtapa2"); // Carrega o CSS da Etapa 2
    

    document.getElementById('etapa1').style.display = 'none';
    document.getElementById('etapa2').style.display = 'block';
});

// Voltar para a etapa anterior
document.getElementById('voltarEtapa1').addEventListener('click', function () {
    
    // Alterna o CSS para a Etapa 1
    removerCss("cssEtapa2"); // Remove o CSS da Etapa 2
    
    removerScript("jsEtapa2"); // Remove o script da etapa 2, se carregado
    
    carregarCss("styles/tela1.css", "cssEtapa1"); // Carrega o CSS da Etapa 1

    carregarScript("scripts/tela1.js", "jsEtapa1"); // Carrega o script para a etapa 1
    
    document.getElementById('etapa2').style.display = 'none';
    document.getElementById('etapa1').style.display = 'block';
    
});

