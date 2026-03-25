const qs = (query) => document.querySelector(query);
const qsa = (query) => [...document.querySelectorAll(query)];

const MAX_SELECT = 4;
const selected = new Set();
let isDragging = false;

function render() {
  qsa(".seat").forEach((seat, i) => {
    seat.classList.toggle("selected", selected.has(i + 1));
  });
  const arr = [...selected].sort((a, b) => a - b);
  qs(".selc-seat span").textContent = arr.length ? arr.join(", ") + "번" : "없음";
  qs(".reserve-btn").style.opacity = arr.length === 0 ? "0.4" : "1";
  qs(".reserve-btn").style.pointerEvents = arr.length === 0 ? "none" : "auto";
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

qs(".reserve-btn").addEventListener("click", () => {
  const arr = [...selected].sort((a, b) => a - b);
  if (arr.length === 0) return;
  alert(`${arr.join(", ")}번 좌석이 예약되었습니다.`);
});

render();