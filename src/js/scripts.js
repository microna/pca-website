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
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        768: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        992: {
            slidesPerView: 2,
            spaceBetween: 30
        },
        1200: {
            slidesPerView: 3,
            spaceBetween: 40
        },
        1440: {
            slidesPerView: 3,
            spaceBetween: 50
        }
    }
});

// Testimonials Swiper
const testimonialsSwiper = new Swiper('.testimonials .swiper', {
    loop: true, // Add this for infinite loop
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
    },
    breakpoints: {
        786: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        992: {
            slidesPerView: 2,
            spaceBetween: 30
        },
        1440: {
            slidesPerView: 3,
            spaceBetween: 30
        }
    }
});

// Blog Swiper
const blogSwiper = new Swiper('.blog .swiper', {
    loop: true, // Add this for infinite loop
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
    },
    breakpoints: {
        786: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        992: {
            slidesPerView: 2,
            spaceBetween: 30
        },
        1440: {
            slidesPerView: 3,
            spaceBetween: 40
        },
        1920: {
            slidesPerView: 3,
            spaceBetween: 50
        }
    }
});

// Services Swiper
const servicewiper = new Swiper('.services .swiper', {
    loop: true,
    centeredSlides: false,
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
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        768: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        992: {
            slidesPerView: 2,
            spaceBetween: 30
        },
        1200: {
            slidesPerView: 3,
            spaceBetween: 40
        },
        1440: {
            slidesPerView: 3,
            spaceBetween: 50
        }
    }
});