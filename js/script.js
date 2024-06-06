function mostrarFecha() {
    const now = new Date();
    const dia = String(now.getDate()).padStart(2, '0');
    const mes = String(now.getMonth()).padStart(2, '0');
    const anio = String(now.getFullYear()).slice(-2);
    const fechaString = `${dia}-${mes}-${anio}`;
    document.getElementById('day').textContent = fechaString;
}

function mostrarReloj() {
    const now = new Date();
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    const timeString = `${hours}:${minutes}:${seconds}`;
    document.getElementById('clock').textContent = timeString;
}

mostrarFecha();

setInterval(mostrarReloj, 1000);
mostrarReloj();