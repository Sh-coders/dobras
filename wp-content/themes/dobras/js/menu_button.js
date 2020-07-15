jQuery(document).ready(function ($) {
    let prevButton  = null;
    $('.btn-category').click(function () {
        if(prevButton !== null) {
            prevButton.removeClass('current');
            $(`.${prevButton.data('target')}`).hide();
        }

        if($(this) !== prevButton) {
            $(this).addClass('current');
            $(`.${$(this).data('target')}`).show();
            prevButton = $(this);
        }
    });
});