; (function ($) {
    $(window).on("elementor/frontend/init", function () {

        /**========================================
             SWIPER SLIDER
        ======================================== */

        elementorFrontend.hooks.addAction("frontend/element_ready/swiperSlider.default", function ($scope) {
            $scope.find('.swiper-container').each(function () {
                var swiper_container = $(this)[0];
                var sliderSelector = swiper_container,
                    options = {
                        init: false,
                        loop: true,
                        speed: 800,
                        slidesPerView: 2, // or 'auto'
                        // spaceBetween: 10,
                        centeredSlides: true,
                        effect: 'coverflow', // 'cube', 'fade', 'coverflow',
                        coverflowEffect: {
                            rotate: 50, // Slide rotate in degrees
                            stretch: 0, // Stretch space between slides (in px)
                            depth: 100, // Depth offset in px (slides translate in Z axis)
                            modifier: 1, // Effect multipler
                            slideShadows: true, // Enables slides shadows
                        },
                        grabCursor: true,
                        parallax: true,
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                        },
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        breakpoints: {
                            1023: {
                                slidesPerView: 1,
                                spaceBetween: 0
                            }
                        },
                        // Events
                        on: {
                            imagesReady: function () {
                                this.el.classList.remove('loading');
                            }
                        }
                    };
                var mySwiper = new Swiper(sliderSelector, options);

                // Initialize slider
                mySwiper.init();
            });
        });

        /**========================================
                        COUNTER
        ======================================== */
        elementorFrontend.hooks.addAction("frontend/element_ready/counter.default", function ($scope) {
            $scope.find('.counter-value').each(function () {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 3500,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        });

        /**========================================
                     ANIMATION TEXT
         ======================================== */

        elementorFrontend.hooks.addAction("frontend/element_ready/animationText.default", function ($scope) {
            $scope.find('.typed').each(function () {
                var element = $(this)[0];
                var animation_text = $(this).data('animation_text');
                if (element) {
                    new Typed(element, {
                        strings: [animation_text],
                        stringsElement: null,
                        typeSpeed: 100,
                        startDelay: 1000,
                        backSpeed: 30,
                        backDelay: 500,
                        loop: true,
                    });
                }
            });
        });

        /**========================================
                      FLUID METER
         ======================================== */
        elementorFrontend.hooks.addAction('frontend/element_ready/FluidMeter.default', function ($scope) {
            $scope.find(".fluid-meter").each(function () {
                var content_class = $(this)[0];
                var percentage = $(this).data('percentage');
                var layer_foreground = $(this).data('layer_foreground');
                var layer_background = $(this).data('layer_background');
                var content_background = $(this).data('content_background');
                var content_border_width = $(this).data('content_border_width');
                var content_border_color = $(this).data('content_border_color');
                var content_text_color = $(this).data('content_text_color');
                var content_size = $(this).data('content_size');
                var font_size = $(this).data('font_size');
                var font_family = $(this).data('font_family');
                if (content_class) {
                    var fm = new FluidMeter(content_class);
                    fm.init({
                        targetContainer: content_class,
                        fillPercentage: percentage ? percentage : 50,
                        options: {
                            fontFamily: font_family ? font_family : "Raleway",
                            fontSize: font_size ? font_size + 'px' : '45px',
                            fontFillStyle: content_text_color ? content_text_color : "white",
                            borderWidth: content_border_width ? content_border_width : 10,
                            backgroundColor: content_background ? content_background : "#e2e2e2",
                            foregroundColor: content_border_color ? content_border_color : "#fafafa",
                            drawPercentageSign: true,
                            drawBubbles: true,
                            size: content_size ? content_size : 300,
                            foregroundFluidLayer: {
                                fillStyle: layer_foreground,
                                angularSpeed: 100,
                                maxAmplitude: 12,
                                frequency: 30,
                                horizontalSpeed: -150
                            },
                            backgroundFluidLayer: {
                                fillStyle: layer_background,
                                angularSpeed: 100,
                                maxAmplitude: 10,
                                frequency: 30,
                                horizontalSpeed: 150
                            }
                        }
                    });
                }

            });

        });
    });
})(jQuery);