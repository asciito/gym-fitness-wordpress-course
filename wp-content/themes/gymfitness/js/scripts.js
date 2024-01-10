const swiper = new Swiper('.testimonial-container', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    autoplay: {
        delay: 3000,
    }
});

swiper.init();

// Wrap every letter in a span
var textWrapper = document.querySelector('.ml2');

if ( textWrapper ) {
    textWrapper.innerHTML = textWrapper.textContent?.replace(/\S/g, "<span class='letter'>$&</span>");

    anime.timeline({loop: true})
        .add({
            targets: '.ml2 .letter',
            scale: [4,1],
            opacity: [0,1],
            translateZ: 0,
            easing: "easeOutExpo",
            duration: 950,
            delay: (el, i) => 70*i
        }).add({
        targets: '.ml2',
        opacity: 0,
        duration: 1000,
        easing: "easeOutExpo",
        delay: 1000
    });
}

window.onscroll = function () {
    const scrollY = window.scrollY;
    const nav = document.getElementsByClassName('navbar')[0];

    if (scrollY <= 300) {
        nav.classList.remove('fixed-top');

        return;
    }

    nav.classList.add('fixed-top');
}

const burger = document.querySelector('.burger-menu svg');

burger.addEventListener('click', function () {
    const menu = document.querySelector('.menu-container');

    menu.classList.toggle('show');
});