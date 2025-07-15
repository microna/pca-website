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


document.addEventListener('DOMContentLoaded', function() {
    // Check if GSAP is loaded
    if (typeof gsap !== 'undefined') {
        // Create hero section timeline
        const heroTl = gsap.timeline({ delay: 0.2 });
        
        heroTl
            // Animate hero title first
            .from(".hero__title", {
                duration: 1.2,
                y: 50,
                opacity: 0,
                ease: "power2.out"
            })
            // Animate hero advantages item (slide in from left)
            .from(".hero__advantages-item", {
                duration: 0.8,
                x: -50,
                opacity: 0,
                ease: "power2.out"
            }, "-=0.8") // Start 0.8 seconds before the previous animation ends
            // Animate hero advantages content (slide in from right)
            .from(".hero__advantages-content", {
                duration: 0.8,
                x: 50,
                opacity: 0,
                ease: "power2.out"
            }, "-=0.6") // Start 0.6 seconds before the previous animation ends
            // Animate the CTA button
            .from(".hero__content-btn", {
                duration: 0.6,
                y: 30,
                opacity: 0,
                ease: "power2.out"
            }, "-=0.4"); // Start 0.4 seconds before the previous animation ends
        
        console.log('GSAP timeline animations loaded successfully');
    } else {
        console.error('GSAP is not loaded. Please check your functions.php file.');
    }
});


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
  