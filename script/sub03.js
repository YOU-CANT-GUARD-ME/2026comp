const qs = (query) => document.querySelector(query);
const qsa = (query) => [...document.querySelectorAll(query)];

const MAX_SELECT = 4;
const selected = new Set();
let isDragging = false;

function isFormValid() {
  const date = qs("#reserveDate").value;
  const start = qs("#startTime").value;
  const end = qs("#endTime").value;
  return date && start && end;
}

function render() {
  qsa(".seat").forEach((seat, i) => {
    seat.classList.toggle("selected", selected.has(i + 1));
  });
  const arr = [...selected].sort((a, b) => a - b);
  qs(".selc-seat span").textContent = arr.length ? arr.join(", ") + "번" : "없음";

  const canSubmit = arr.length > 0 && isFormValid();
  qs(".reserve-btn").style.opacity = canSubmit ? "1" : "0.4";
  qs(".reserve-btn").style.pointerEvents = canSubmit ? "auto" : "none";
}

document.addEventListener("mousedown", (e) => {
  const seat = e.target.closest(".seat");
  if (!seat || seat.classList.contains("occupied")) return;
  isDragging = true;
  const id = Number(seat.textContent.trim());
  selected.has(id) ? selected.delete(id) : selected.size < MAX_SELECT && selected.add(id);
  render();
});

qsa(".seat").forEach((seat) => {
  seat.addEventListener("mouseenter", () => {
    if (!isDragging || seat.classList.contains("occupied")) return;
    if (selected.size >= MAX_SELECT) return;
    selected.add(Number(seat.textContent.trim()));
    render();
  });
});

document.addEventListener("mouseup", () => {
  isDragging = false;
});

qsa("#reserveDate, #startTime, #endTime").forEach((input) => {
  input.addEventListener("change", render);
});

qs(".reserve-btn").addEventListener("click", () => {
  const arr = [...selected].sort((a, b) => a - b);
  if (arr.length === 0 || !isFormValid()) return;

  const date = qs("#reserveDate").value;
  const start = qs("#startTime").value;
  const end = qs("#endTime").value;

  if (start >= end) {
    alert("종료시간은 시작시간보다 늦어야 합니다.");
    return;
  }

  alert(`${arr.join(", ")}번 좌석이 ${date} ${start}~${end} 예약되었습니다.`);
});

render();