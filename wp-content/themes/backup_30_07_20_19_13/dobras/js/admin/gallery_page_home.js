// Считает и выводит количество выбранных изображений для галереи главной страницы
jQuery(document).ready(function ($) {
    const addBtn = $('.inside .add-btn-gallery');
    let removeBtns = $('.gallery-list .item-gallery .remove_image_button');
    const countImages = removeBtns.length;
    const textContainer = $('.inside .gallery-info');
    const newText = 'Вибрано зображень  '.concat(countImages).concat(' з  4');
    textContainer.text(newText);
    (countImages === 4) ? addBtn.hide() : addBtn.show();

    const targetNodes = $(".inside .gallery-list");
    const MutationObserver = window.MutationObserver || window.WebKitMutationObserver;
    const myObserver = new MutationObserver (mutationHandler);
    const obsConfig = { childList: true, characterData: true, attributes: true, subtree: true };

    targetNodes.each ( function () {
        myObserver.observe (this, obsConfig);
    } );
    function mutationHandler ( mutationRecords ) {
        mutationRecords.forEach ( function ( mutation ) {
            if ( typeof mutation.removedNodes == "object" ) {
                const countImages = $( '.gallery-list .item-gallery .remove_image_button' ).length;
                const newText = 'Вибрано зображень  '.concat( countImages ).concat( ' з  4' );
                textContainer.text( newText );
                ( countImages === 4 ) ? addBtn.hide() : addBtn.show();
            }
        } );
    }
});