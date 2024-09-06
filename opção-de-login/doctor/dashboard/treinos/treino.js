const form = document.querySelector("#form");
const treinoInput = document.querySelector("#treino");
const repeticoesInput = document.querySelector("#repeticoes");
const intervInput = document.querySelector("#interv");
const messageTextarea = document.querySelector("#message");

form.addEventListener("submit", (event) => {
  event.preventDefault();

  //verifica se o treino está vazio
  if (treinoInput.value === "") {
    alert("Por favor, preencha com o treino");
    return;
  }

  //verifica se a serie foi selecionada
  if (seriesSelect.value === "") {
    alert("Por favor, selecione uma serie");
    return;
  }

  //verificar se as repeticoes foram preenchidas
  if(repeticoesInput.value === "") {
    alert("Por favor, preencha as repetições do treino")
    return;
  }

  //verificar se o intervalo foi preenchido
  if(intervInput.value === "") {
    alert("Por favor, preencha o intervalo do treino")
    return;
  }

// se todos os campos estiverem corretamente preenchidos, envie o form
form.submit();

});

const seriesSelect = document.querySelector("#series");
const personalizadoField = document.querySelector("#personalizadoField");
const personalizadoInput = document.querySelector("#personalizadoInput");

seriesSelect.addEventListener("change", function () {
  if (seriesSelect.value === "5") {
    personalizadoField.style.display = "block";
  } else {
    personalizadoField.style.display = "none";
  }
});