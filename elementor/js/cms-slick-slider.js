( function( $ ) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     * //appendArrows: '.cms-slick-nav',
     */
    var CMSSlickSliderHandler = function( $scope, $ ) {
        var breakpoints = elementorFrontend.config.breakpoints;
        var carousel = $scope.find(".cms-slick-slider");
        var carousel_nav = $scope.find(".cms-slick-slider-nav");
        var carousel_meta = $scope.find(".cms-slick-slider-meta");
        if(carousel.length == 0){
            return false;
        }
        var data = carousel.data();
        var gutter = data.gutter;
        var slickOptions = {
            fade: true === data.fade,
            rows: data.rows,
            autoplay: true === data.autoplay,
            autoplaySpeed: data.autoplayspeed,
            infinite: true === data.infinite,
            pauseOnHover: true === data.pauseonhover,
            speed: data.speed,
            rtl: true === data.rtl,
            // arrows
            arrows: true === data.arrows,
            appendArrows: carousel.parents('.cms-slick-sliders').find('.cms-slick-arrows'),
            prevArrow : '<div class="cms-slick-prev cms-slick-arrow"><span class="cms-slick-arrow-icon prev" data-title="'+data.titleprev+'"></span></div>',
            nextArrow : '<div class="cms-slick-next cms-slick-arrow"><span class="cms-slick-arrow-icon next" data-title="'+data.titlenext+'"></span></div>',
            // Dots
            dots: true === data.dots,
            appendDots : carousel.parents('.cms-slick-sliders').find('.cms-slick-dots'),
            dotsClass: 'cms-slick-dot',
            // Items
            slidesToShow: data.slidestoshow,
            slidesToScroll: data.slidestoscroll,
            // Responsives 
            responsive: [
                {
                    breakpoint: breakpoints.lg,
                    settings: {
                        rows: data.rowstablet,
                        slidesToShow: data.slidestoshowtablet,
                        slidesToScroll: data.slidestoscrolltablet,
                        arrows: data.arrowstablet,
                        dots: data.dotstablet
                    }
                },
                {

                    breakpoint: breakpoints.md,
                    settings: {
                        rows: data.rowsmobile,
                        slidesToShow: data.slidestoshowmobile,
                        slidesToScroll: data.slidestoscrollmobile,
                        arrows: data.arrowsmobile,
                        dots: data.dotsmobile
                    }
                }
            ],
            adaptiveHeight: true
        };
        if(true === data.asnavfor){
            slickOptions['asNavFor'] = '.cms-slick-slider-nav, .cms-slick-slider-meta';//carousel_nav + ',' + carousel_meta;
        } else {
            slickOptions['asNavFor'] = null;
        }
        //console.log(slickOptions['asNavFor']);
        carousel.each(function() {
            $(this).slick(slickOptions);
        }); 

        // asNavFor
        var nav_data = carousel_nav.data();
        if(true === data.asnavfor){
            carousel_nav.each(function() {
                $(this).slick({
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: false,
                    infinite: true,
                    autoplay: false,
                    focusOnSelect: true,
                    asNavFor: '.cms-slick-slider, .cms-slick-slider-meta', // carousel
                    rtl: true === nav_data.rtl,
                    centerMode: true,
                    centerPadding: '0',
                    gutter: 15
                });
            });
            // Carousel Meta
            carousel_meta.each(function(){
                $(this).slick({
                    fade: true,
                    draggable: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: false,
                    //autoplay: false,
                    //focusOnSelect: true,
                    //infinite: true,
                    //asNavFor: '.cms-slick-slider',
                    rtl: true === data.rtl
                });
            });
        }
        
        ///
        carousel.find('.cms-slick-slide, .cms-slick-item').css({
            'padding-left':gutter,
            'padding-right':gutter
        });
        carousel.find('.cms-slick-prev').css({
            //'margin-left':gutter
        });
        carousel.find('.cms-slick-next').css({
            //'margin-right':gutter
        });
        carousel.on('breakpoint', function(event,slick){
            $('.cms-slick-slide').css({
                //'padding':gutter
            });
        });
        
    };
    // How It Work
    var CMSSlickSliderHowItWork = function( $scope, $ ) {
        var carousel = $scope.find(".cms-howitwork-slider");
        if(carousel.length == 0){
            return false;
        }
        var slickOptions = {
            fade: true,
            autoplay: true,
            autoplaySpeed: 2000,
            infinite: true,
            pauseOnHover: true,
            speed: 500,
            // arrows
            arrows: true,
            appendArrows: carousel.parents('.cms-howitwork-sliders').find('.cms-slick-arrows'),
            prevArrow : '<div class="cms-slick-prev cms-slick-arrow"><span class="cms-slick-arrow-icon prev cmsi-long-arrow-left"></span></div>',
            nextArrow : '<div class="cms-slick-next cms-slick-arrow"><span class="cms-slick-arrow-icon next cmsi-long-arrow-right-1"></span></div>',
            // Dots
            dots: false,
            // Items
            slidesToShow: 1,
            slidesToScroll: 1,
            // Responsives 
            responsive: [
                
            ],
            adaptiveHeight: true
        };
        carousel.each(function() {
            $(this).slick(slickOptions);
            // Custom next / prev arrow every where in html
        });
        $('.cms-slick-prev').click(function(){
          $(this).parents('.cms-howitwork-slider').slick('slickPrev');
        })

        $('.cms-slick-next').click(function(){
          $(this).parents('.cms-howitwork-slider').slick('slickNext');
        }) 
    };
    // make slider with data-settings
    var CMSSlickSliderDataSettingsHandler = function( $scope, $ ) {
        var carousel = $scope.find(".cms-slick-slider-data-settings");
        var breakpoints = elementorFrontend.config.breakpoints;
        if(carousel.length == 0){
            return false;
        }
        carousel.each(function() {
            $(this).slick({
                slidesToShow: 4,
                slidesToScroll: 4,
                arrows: false,
                dots: true,
                appendDots: '.cms-slick--dots',
                dotsClass: 'cms-slick-dot',
                responsive: [
                    {
                        breakpoint: breakpoints.lg,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: breakpoints.md,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
        });        
    };
    

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/cms_post_carousel.default', CMSSlickSliderHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/cms_testimonial.default', CMSSlickSliderHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/cms_headline.default', CMSSlickSliderHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/cms_clients.default', CMSSlickSliderHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/cms_teams.default', CMSSlickSliderHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/cms_careers.default', CMSSlickSliderHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/cms_fancy_box.default', CMSSlickSliderDataSettingsHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/cms_howitwork.default', CMSSlickSliderHowItWork );
    } );
} )( jQuery );