jQuery(document).ready(function ($) {
    $('a[href=\'#footer\']').click(function (event) {
        event.preventDefault();
        $('html,body').animate({scrollTop: $('#footer').offset().top + "px"}, {duration: 1000});
    });
});
