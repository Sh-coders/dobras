jQuery(document).ready(function() {
    jQuery('.burger .burger-btn').click( function (e) {
        e.stopPropagation();
        jQuery('.burger').toggleClass('burger-btn_active');
        jQuery('nav.nav div.menu').toggleClass('menu-active');
        jQuery('body .wrapper').toggleClass('active-fon');

        jQuery('.wrapper.active-fon').click( function (e) {
            jQuery('.burger').removeClass('burger-btn_active');
            jQuery('nav.nav div.menu').removeClass('menu-active');
            jQuery('body .wrapper').removeClass('active-fon');
        });

        jQuery('.menu .menu-list .menu-item a').click( function (e) {
            if ( this.hash !== '' ) {
                jQuery('.burger').removeClass('burger-btn_active');
                jQuery('nav.nav div.menu').removeClass('menu-active');
                jQuery('body .wrapper').removeClass('active-fon');
            }
        });
    });

    jQuery('.menu-item-has-children').click( function (e) {
        e.preventDefault();
        e.stopPropagation();
        jQuery(this).children('.sub-menu').slideToggle();
    });

    jQuery('.sub-menu').click( function (e) {
        e.stopPropagation();
    });

    jQuery('#menu_id ').click( function (e) {
        e.stopPropagation();
    });
});