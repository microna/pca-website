//  Num counter
function numCounter(selector, number, time, step) {
    const counter = document.querySelector(selector)

    let res = 0

    const allTime = Math.round(time / (number / step))

    let interval = setInterval(() => {
        res = res + step

        if (res === number) {
            clearInterval(interval)
        }
        counter.innerHTML = res
    }, allTime)
}

// this function can be used multiple times

// First argument- selector where will invoke the result
// Second argument - finish result
// Third argument - animation
// Fourth argument - animation step

// Play animation on scroll
// Play animation on scroll
const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        // instead of section-3 you can use different class
        if (entry.target.classList.contains('section-3')) {
            numCounter('#num-1', 600, 2000, 10)
        }
    })
})
document.querySelectorAll('.section').forEach((section) => {
    observer.observe(section)
})
