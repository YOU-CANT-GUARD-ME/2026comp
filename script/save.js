
    let selected = []
    let dragging = false
    const seats = document.querySelectorAll('.seat')

    function select (el) {
      const seat = el.textContent

      if(el.classList.contains('selected')){
        el.classList.remove('selected')
        selected = selected.filter(s => s !== seat)
      } else {
        if(selected.length >= 4) return 
        selected.push(seat)
        el.classList.add('selected')
      }
      selValue.value = selected.join(',')
      showSel.textContent = !selected.length ? "없음" : `${selected.join('번,')}번 선택됨`
      
    }


    seatCon.onmousedown = () => { dragging=true }
    seats.forEach(seat => {
        seat.onmouseover = () => {
          if(dragging) { select(seat) }
        }
    })
    window.onmouseup = () => {dragging=false}

    selInput.onsubmit = (e) => { 
      if(seats.length === 0) {
        e.preventDefault()
        alert('좌석을 선택해주세요')
      }
     }
