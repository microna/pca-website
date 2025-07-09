// Mobile burger menu
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
    // Here is the place where we change breakpoint
    window.addEventListener('resize', () => {
        if (window.innerWidth > 991.98) {
            menu.classList.remove('active')
            burger.classList.remove('active')
            body.classList.remove('locked')
        }
    })
}
burgerMenu()



// Shop Swiper
const shopSwiper = new Swiper('.shop .swiper', {
    loop: true,
    centeredSlides: false,
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: {
        el: '.shop .swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.shop .swiper-button-next',
        prevEl: '.shop .swiper-button-prev',
    },
    scrollbar: {
        el: '.shop .swiper-scrollbar',
    }
});

// Testimonials Swiper
const testimonialsSwiper = new Swiper('.testimonials .swiper', {
    loop: true,
    centeredSlides: false,
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: {
        el: '.testimonials .swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.testimonials .swiper-button-next',
        prevEl: '.testimonials .swiper-button-prev',
    },
    scrollbar: {
        el: '.testimonials .swiper-scrollbar',
    }
});

// Blog Swiper
const blogSwiper = new Swiper('.blog .swiper', {
    loop: true,
    centeredSlides: false,
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: {
        el: '.blog .swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.blog .swiper-button-next',
        prevEl: '.blog .swiper-button-prev',
    },
    scrollbar: {
        el: '.blog .swiper-scrollbar',
    }
});

// Services Swiper
const servicewiper = new Swiper('.services .swiper', {
    loop: true,
    centeredSlides: false,
    slidesPerView: 3,
    spaceBetween: 30,
    autoplay: {
        delay: 3000, // 3 seconds
        disableOnInteraction: false, // Continue autoplay after user interaction
        pauseOnMouseEnter: true, // Pause on mouse hover
    },
    pagination: {
        el: '.services .swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.services .swiper-button-next',
        prevEl: '.services .swiper-button-prev',
    },
    scrollbar: {
        el: '.services .swiper-scrollbar',
    }
});