/**
 * отрисовка прогреса в progress_bar
 **/
jQuery(document).ready(function ($) {
    $('.progress-bar').each(function () {
        const $elem  = $(this);
        const percent = $elem.data('percent');
        const $rotate = $elem.find('.rotate');

        $(`#${this.id} .percent span`).text(percent+ '%');
        $rotate.css({
            'transform': 'rotate(' + percent * 3.6 + 'deg)'
        });

        if (percent > 50) {
            $elem.find('.right').css({
                opacity: 1
            });
            $elem.find('.left').css({
                opacity: 0
            });
        }
    });
});