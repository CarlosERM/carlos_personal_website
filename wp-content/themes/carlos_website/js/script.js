const burguerButton = document.getElementById("burguerButton")
const closeButton = document.getElementById("closeButton")
const modal = document.getElementById('modal')

function onClick() {
  if(modal.classList.contains('hidden')) modal.classList.remove('hidden')
  else modal.classList.add('hidden')
}

if(burguerButton) burguerButton.addEventListener('click', onClick)
if(closeButton) closeButton.addEventListener('click', onClick)

