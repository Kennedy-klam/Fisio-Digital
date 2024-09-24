let timer = null
let segundos = 0

function updateTime(){
    const timeLabel = document.getElementById('tempo')
    let formattedSeconds = segundos < 10 ? `0${segundos}` : segundos
    timeLabel.textContent = `00:${formattedSeconds}`
}
function comecar(){
    if(timer !== null) return 
    timer = setInterval(()=>{
        updateTime()
    }, 1000)
}
function parar(){
    clearInterval(timer)
    timer = null
}
