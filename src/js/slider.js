import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
(function() {

document.addEventListener('DOMContentLoaded', function() {
new Swiper(".slider", {
    slidesPerView: 3,
    spaceBetween: 15,
    freeMode: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
    },
    breakpoints: {
        768: {
            slidesPerView: 2
        },
        1024: {
            slidesPerView: 3
        },
        1200: {
            slidesPerView: 4
        }
    }

  });

});

})() // IIFE
