let selected = [];
let dragging = false;
const seats = document.querySelectorAll('.seat');
const seatCon = document.querySelector('.seats');
const showSel = document.querySelector('.seatdata span');
const selValue = document.querySelector('input[name="selected_seat"]');
const selInput = document.querySelector('.seatdata form');

function select (e) { 
    const seat = e.textContent.trim();

    if(e.classList.contains('selected')) {
        e.classList.remove('selected');
        selected = selected.filter(s => s !== seat);
    } else {
        if (selected.length >= 4) return;
        selected.push(seat);
        e.classList.add('selected');
    }

    if (selValue) selValue.value = JSON.stringify(selected)
    showSel.textContent = !selected.length ? "좌석번호: 없음" : `좌석번호: ${selected.join('번, ')}번`;
    selInput.style.display = !selected.length ? "none" : "flex";
}
seatCon.onmousedown = () => {dragging = true}
seats.forEach(seat => {
    seat.onmouseover = () => {
        if (dragging) {select(seat)}
    }
    seat.onmousedown = () => {select(seat)}
});
window.onmouseup = () => {dragging = false} 