jQuery(document).ready(function() {
    jQuery('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    jQuery('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        asNavFor: '.slider-for',
        dots: false,
        focusOnSelect: true
    });

     jQuery(".link-img").click(function(){
         jQuery('.fancybox-button.fancybox-button--arrow_right').on('click', function () {
                if(jQuery('.fancybox-container').hasClass('fancybox-is-open')) {
                    jQuery('.slider-for').slick('slickNext');
                }
         });
     })
});