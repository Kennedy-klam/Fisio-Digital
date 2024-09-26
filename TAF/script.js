let minutos = 0;
let tempo = 0;
let intervalo;

function comecar() {
  intervalo = setInterval(() => {
    tempo++;
    const minutos = Math.floor(tempo / 60).toString().padStart(2, '0');
    const segundos = (tempo % 60).toString().padStart(2, '0');
    document.getElementById('tempo').textContent = `${minutos}:${segundos}`;
  }, 1000);
}
function parar() {
  clearInterval(intervalo);
}
