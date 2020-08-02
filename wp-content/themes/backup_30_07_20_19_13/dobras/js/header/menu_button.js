/**
 *  кнопки переключения вкладок в проекте
 **/
jQuery(document).ready(function ($) {
    let prevButton  = $('.btn-start');
    prevButton.addClass('current');
    $(`.${prevButton.data('target')}`).show();
    $('.btn-category').click(function () {
        prevButton.removeClass('current');
        $(`.${prevButton.data('target')}`).hide();
        $(this).addClass('current');
        $(`.${$(this).data('target')}`).show();
        prevButton = $(this);
    });
});