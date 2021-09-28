/*
    Plugin: Post Grid & Carousel Ultimate
    Plugin URI: https://wpwax.com/product/post-grid-carousel-ultimate-pro/
    Author: wpWax
    Version: 1.0
*/

(function($){
    /* Check WPCU Carousel Data */
    let checkData = function (data, value) {
        return typeof data === 'undefined' ? value : data;
    };
    /* WPCU Carousel */
    let pgcuCarousel = document.querySelectorAll('.pgcu-carousel');
    pgcuCarousel.forEach(function (el) {
        let swiper = new Swiper(el, {
            slidesPerView: checkData(parseInt(el.dataset.wpcuItems), 4),
            spaceBetween: checkData(parseInt(el.dataset.wpcuMargin), 30),
            loop: checkData(JSON.parse(el.dataset.wpcuLoop.toLowerCase()), false),
            slidesPerGroup: checkData(parseInt(el.dataset.wpcuPerslide), 4),
            speed: checkData(parseInt(el.dataset.wpcuSpeed), 3000),
            autoplay: checkData(JSON.parse(el.dataset.wpcuAutoplay), {}),
            navigation: {
                nextEl: '.wpcu-carousel-nav__btn--next',
                prevEl: '.wpcu-carousel-nav__btn--prev',
            },
            pagination: {
                el: '.wpcu-carousel-pagination',
                type: 'bullets',
                clickable: true
            },
            breakpoints: checkData(JSON.parse(el.dataset.wpcuResponsive), {})
        })
    });
})(jQuery)