const burguerButton = document.getElementById("burguerButton")
const closeButton = document.getElementById("closeButton")
const modal = document.getElementById('modal')

function onClick() {
  if(modal.classList.contains('hidden')) modal.classList.remove('hidden')
  else modal.classList.add('hidden')
}

if(burguerButton) burguerButton.addEventListener('click', onClick)
if(closeButton) closeButton.addEventListener('click', onClick)

const languageSwitcherButton = document.querySelectorAll('a[href="#pll_switcher"]')[0]
const languagesSubMenu = document.getElementsByClassName('sub-menu')[0]

function languageSwitcherButtonOnClick() {
  if (languagesSubMenu.classList.contains('flex')) {
    languagesSubMenu.classList.remove('flex')
  } else {
    languagesSubMenu.classList.add('flex')
  }
}

if(languageSwitcherButton) languageSwitcherButton.addEventListener('click', languageSwitcherButtonOnClick)

// console.log(languageSwitcherButton)
// console.log(languagesSubMenu)
