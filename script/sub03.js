document.addEventListener("DOMContentLoaded", () => {
    const $ = (q) => document.querySelector(q), $$ = (q) => document.querySelectorAll(q);
    const selected = new Set(), MAX = 4;
    let isDragging = false, mode = null;

    const render = () => {
        $$(".seat").forEach(s => s.classList.toggle("selected", selected.has(+s.textContent)));
        const arr = [...selected].sort((a, b) => a - b);
        $(".selc-seat span").textContent = arr.length ? arr.join(", ") + "번" : "없음";
        $("#selectedSeats").value = arr.join(",");
    };

    const handle = (seat) => {
        const id = +seat.textContent;
        if (mode === 'add' && selected.size < MAX) selected.add(id);
        else if (mode === 'remove') selected.delete(id);
        render();
    };

    const seatBox = $(".seatBox");
    if (!seatBox) return;

    seatBox.onmousedown = (e) => {
        const seat = e.target.closest(".seat:not(.occupied)");
        if (!seat) return;
        isDragging = true;
        mode = selected.has(+seat.textContent) ? 'remove' : 'add';
        handle(seat);
        e.preventDefault(); 
    };

    seatBox.onmouseover = (e) => {
        const seat = e.target.closest(".seat:not(.occupied)");
        if (isDragging && seat) handle(seat);
    };
    window.onmouseup = () => isDragging = false;
    $("#btnReserve").onclick = () => $("#reserveForm").submit();
});