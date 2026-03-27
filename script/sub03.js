const qs = (q) => document.querySelector(q);
const qsa = (q) => [...document.querySelectorAll(q)];

const MAX_SELECT = 4;
const selected = new Set();

const inputs = qsa("#reserveDate, #startTime, #endTime");

function isFormValid() {
  return inputs.every((i) => i.value);
}

function render() {
  qsa(".seat").forEach((seat) => {
    seat.classList.toggle("selected", selected.has(+seat.textContent));
  });
  const arr = [...selected].sort((a, b) => a - b);
  qs(".selc-seat span").textContent = arr.length ? arr.join(", ") + "번" : "없음";

  const canSubmit = arr.length && isFormValid();
  const btn = qs(".reserve-btn");
  btn.style.opacity = canSubmit ? "1" : "0.4";
  btn.style.pointerEvents = canSubmit ? "auto" : "none";
}

let isDragging = false;
let dragMode = null; // 'add' or 'remove'

qsa(".seat").forEach((seat) => {
  seat.addEventListener("mousedown", (e) => {
    if (seat.classList.contains("occupied")) return;
    isDragging = true;

    const id = +seat.textContent;
    dragMode = selected.has(id) ? "remove" : "add"; // decide the drag action
    toggleSeat(seat, dragMode);

    e.preventDefault(); // prevent text selection
  });

  seat.addEventListener("mouseover", () => {
    if (!isDragging) return;
    if (seat.classList.contains("occupied")) return;
    toggleSeat(seat, dragMode);
  });
});

document.addEventListener("mouseup", () => {
  isDragging = false;
  dragMode = null;
});

function toggleSeat(seat, mode) {
  const id = +seat.textContent;

  if (mode === "add" && selected.size < MAX_SELECT) {
    selected.add(id);
  } else if (mode === "remove") {
    selected.delete(id);
  }

  render();
}

qsa(".seat").forEach((seat) => {
  seat.addEventListener("click", () => {
    const id = +seat.textContent;
    if (seat.classList.contains("occupied")) return;
    if (selected.has(id)) selected.delete(id);
    else if (selected.size < MAX_SELECT) selected.add(id);
    render();
  });
});

inputs.forEach((i) => i.addEventListener("input", render));

qs(".reserve-btn").addEventListener("click", () => {
  const arr = [...selected].sort((a, b) => a - b);
  if (!arr.length || !isFormValid()) return;

  const [date, start, end] = inputs.map((i) => i.value);
  if (start >= end) return alert("종료시간은 시작시간보다 늦어야 합니다.");

  qs("#selectedSeats").value = arr.join(",");
  qs("#reserveForm").submit();
});

render();