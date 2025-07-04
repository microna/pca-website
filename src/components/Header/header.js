// Мобильное меню бургер
function burgerMenu() {
    const burger = document.querySelector('.burger')
    const menu = document.querySelector('.menu')
    const body = document.querySelector('body')
    burger.addEventListener('click', () => {
        if (!menu.classList.contains('active')) {
            menu.classList.add('active')
            burger.classList.add('active')
            body.classList.add('locked')
        } else {
            menu.classList.remove('active')
            burger.classList.remove('active')
            body.classList.remove('locked')
        }
    })
    // Вот тут мы ставим брейкпоинт навбара
    window.addEventListener('resize', () => {
        if (window.innerWidth > 991.98) {
            menu.classList.remove('active')
            burger.classList.remove('active')
            body.classList.remove('locked')
        }
    })
}
burgerMenu()

// Invoke this function if you need fix the menu 
function fixedHeader() {
    const nav = document.querySelector('.header')

    // here you can indicate on how much you need to scroll befor fixing
    const breakpoint = 1
    if (window.scrollY >= breakpoint) {
        nav.classList.add('fixed')
    } else {
        nav.classList.remove('fixed')
    }
}
window.addEventListener('scroll', fixedHeader)
