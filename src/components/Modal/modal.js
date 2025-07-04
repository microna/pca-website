// Modal
function bindModal(trigger, modal, close) {
  trigger = document.querySelector(trigger),
    modal = document.querySelector(modal),
    close = document.querySelector(close)

  const body = document.body

  trigger.addEventListener('click', e => {
    e.preventDefault()
    modal.style.display = 'flex'
    body.classList.add('locked')
  });
  close.addEventListener('click', () => {
    modal.style.display = 'none'
     body.classList.remove('locked')
  });
  modal.addEventListener('click', e => {
    if (e.target === modal) {
      modal.style.display = 'none'
       body.classList.remove('locked')
    }
  })
}

// First argument - btn class which will open window
// Second argument - modal class 
// Third argument - btn class which will close window
bindModal('.modal__btn', '.modal__wrapper', '.modal__close')
