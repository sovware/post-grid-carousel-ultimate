/*
    Plugin: Post Grid & Carousel Ultimate
    Plugin URI: https://wpwax.com/product/post-grid-carousel-ultimate-pro/
    Author: wpWax
    Version: 1.0
*/

(function ($) {
    window.addEventListener('load', () => {
        /* Check PGCU Carousel Data */
        let checkData = function (data, value) {
            return typeof data === 'undefined' ? value : data;
        };
        /* PGCU Carousel */
        let pgcuCarousel = document.querySelectorAll('.pgcu-carousel');
        pgcuCarousel.forEach(function (el) {
            let swiper = new Swiper(el, {
                slidesPerView: checkData(parseInt(el.dataset.pgcuItems), 4),
                spaceBetween: checkData(parseInt(el.dataset.pgcuMargin), 30),
                loop: checkData(JSON.parse(el.dataset.pgcuLoop.toLowerCase()), false),
                slidesPerGroup: checkData(parseInt(el.dataset.pgcuPerslide), 4),
                speed: checkData(parseInt(el.dataset.pgcuSpeed), 3000),
                autoplay: checkData(JSON.parse(el.dataset.pgcuAutoplay), {}),
                navigation: {
                    nextEl: '.pgcu-carousel-nav__btn--next',
                    prevEl: '.pgcu-carousel-nav__btn--prev',
                },
                pagination: {
                    el: '.pgcu-carousel-pagination',
                    type: 'bullets',
                    clickable: true
                },
                breakpoints: checkData(JSON.parse(el.dataset.pgcuResponsive), {})
            })
        });

        /* Marquee wrapper value */
        var pgcuStyles = document.createElement('style');
        document.head.append(pgcuStyles);
        pgcuStyles.innerHTML = `
            .pgcu-carousel--marquee .swiper-wrapper{
                animation: pgcuMarquee var(--pgcu-marqueeSpeed) linear infinite running;
            }
            @keyframes pgcuMarquee {
                0% {
                    transform: translate(0, 0);
                }
                100% {
                    transform: translate(var(--pgcu-marqueeItemsWidth), 0);
                }
            }
        `;
        var pgcuMarqueeCarousel = document.querySelectorAll('.pgcu-carousel--marquee');
        pgcuMarqueeCarousel.forEach(elm => {
            var pgcuMarqueeCarouselItem = elm.querySelectorAll('.pgcu-post:not(.swiper-slide-duplicate)');
            pgcuMarqueeCarouselItem.forEach(elmnt => {
                var pgcuMarqueeWrapperWidth = pgcuMarqueeCarouselItem.length * (elmnt.offsetWidth + checkData(parseInt(elm.dataset.pgcuMargin)));
                elm.style.setProperty('--pgcu-marqueeItemsWidth', `-${pgcuMarqueeWrapperWidth}px`);
                elm.style.setProperty('--pgcu-marqueeSpeed', `${checkData(parseInt(elm.dataset.pgcuSpeed))}ms`);
            })
        });

        /* Sortable Grid */
        let sortableGrids = document.querySelectorAll('.pgcu-post-sortable');
        if (sortableGrids.length) {
            sortableGrids.forEach(elm => {
                let pgcuSortable = window.Shuffle;
                let pgcuSortableGrid = elm.querySelector('.pgcu-post-sortable__grid');
                let sortLink = elm.querySelectorAll('.pgcu-post-sortable__btn');
                let shuffleInstance = new pgcuSortable(pgcuSortableGrid, {
                    itemSelector: '.pgcu-post'
                });
                sortLink.forEach(link => {
                    link.addEventListener('click', e => {
                        e.preventDefault();
                        let _this = e.target;
                        let siblings = link.parentElement.children;
                        for (let sib of siblings) {
                            sib.classList.remove('pgcu-post-sortable__btn--active');
                        }
                        _this.classList.add('pgcu-post-sortable__btn--active');
                        let keyword = _this.getAttribute('data-sortable-nav');
                        shuffleInstance.filter(keyword);
                    })
                })
            })
        }

        /* Masonry Layout */
        function pgcuMasonryInit() {
            let pgcuMasonryContainer = document.querySelectorAll('.pgcu-masonry');
            pgcuMasonryContainer.forEach(elm=>{
                let macy = new Macy({
                    container: elm,
                    trueOrder: true,
                    waitForImages: true,
                    margin: checkData(parseInt(elm.dataset.pgcuMasonryGutter), 30),
                    columns: checkData(parseInt(elm.dataset.pgcuMasonryColumns), 3),
                    breakAt: checkData(JSON.parse(elm.dataset.pgcuMasonryResponsive), {})
                });
                macy.runOnImageLoad(function () {
                    macy.recalculate(true);
                }, true);
            })
        }
        pgcuMasonryInit();

        /* Filter Buttons AJAX */
        $('.pgcu-post-sortable__btn').each(function(id, elm){
            $(elm).on("click", function (e) {
                e.preventDefault();
                var button = $(this),
                    data = {
                        'action': 'pgcu_sortable',
                        'id': $(this).attr('data-id'),
                        'term_id': $(this).attr('data-sortable-nav'),
                        'query': pgcu_ajax.query
                    };
                $(elm).closest('.pgcu-post-sortable__nav').siblings('.pgcu-row').addClass('pgcu-post-loading');
                $.ajax({ // you can also use $.post here
                    url: pgcu_ajax.ajaxurl, // AJAX handler
                    data: data,
                    type: 'POST',
                    success: function (data) {
                        $(elm).closest('.pgcu-post-sortable__nav').siblings('.pgcu-row').empty().append(data);
                        $(elm).siblings().removeClass('pgcu-post-sortable__btn--active');
                        $(elm).addClass('pgcu-post-sortable__btn--active');
                        $(elm).closest('.pgcu-post-sortable__nav').siblings('.pgcu-row').removeClass('pgcu-post-loading');
                    }
                });
            });
        })

        /* Load More Button AJAX */
        $('.pgcu_load_more').each(function(id, element){
            $(element).on("click", function(){
                var append_class = '.pgcu-grid-'+$(element).attr('data-id');
                var button = $(element),
                    data = {
                    'action': 'pgcu_loadmore',
                    'query': pgcu_ajax.query, // that's how we get params from wp_localize_script() function
                    'page' : pgcu_ajax.current_page,
                    'id'   : $(element).attr('data-id')
                };

                $.ajax({ // you can also use $.post here
                    url : pgcu_ajax.ajaxurl, // AJAX handler
                    data : data,
                    type : 'POST',
                    beforeSend : function ( xhr ) {
                        button.text('Loading...'); // change the button text, you can also add a preloader image
                    },
                    success : function( data ){
                        button.text('Load More');
                        if( data ) {
                            $(append_class).append(data); // insert new posts
                            pgcu_ajax.current_page++;

                            if ( pgcu_ajax.current_page == pgcu_ajax.max_page )
                                button.remove(); // if last page, remove the button

                            // you can also fire the "post-load" event here if you use a plugin that requires it
                            //$( document.body ).trigger( 'post-load' );
                            pgcuMasonryInit();
                        } else {
                            button.remove(); // if no data, remove the button as well
                        }
                    }
                });
            });
        })
    })
})(jQuery);