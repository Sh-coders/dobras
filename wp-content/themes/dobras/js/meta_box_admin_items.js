jQuery(document).ready(function ($) {
    const $documentInfo = $('.document-info');
    let meta_image_frame;
    let input;

    $('.add-info-document', $documentInfo).click(function () {
        const $list = $('.document-list');
        $item = $list.find('.item-document').first().clone();
        $item.find('input').val(''); // чистим знанчение
        $list.append($item);
    });

    $documentInfo.on('click', '.remove-info-document', function () {
        if ($('.item-document').length > 1) {
            $(this).closest('.item-document').remove();
        } else {
            $(this).closest('.item-document').find('input').val('');
        }
    });

    const $pointsInfo = $('.points-info');


     $('.add-point-document', $pointsInfo).click(function () {
        const $list = $('.point-list');
        $item = $list.find('.item-document').first().clone();
        $item.find('input').val(''); // чистим знанчение
        $list.append($item);
    });

    $pointsInfo.on('click', '.remove-info-document', function () {
        if ($('.item-document').length > 1) {
            $(this).closest('.item-document').remove();
        } else {
            $(this).closest('.item-document').find('input').val('');
        }
    });

   // add images from wp library (used in add_meta_box.php)
    const $documentList = $('.document-list');
      // Runs when the image button is clicked.
    $documentList.on('click', '.img-button', function (e) {
        input = $(this).siblings();
        e.preventDefault();

        // If the frame already exists, re-open it.
        if (meta_image_frame) {
            meta_image_frame.open();
            return;
        }

        // Sets up the media library frame
        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
            library: {type: 'image'}
        });

        // Runs when an image is selected.
        meta_image_frame.on('select', function () {
            // Grabs the attachment selection and creates a JSON representation of the model.
            let media_attachment = meta_image_frame.state().get('selection').first().toJSON();
            input.val (media_attachment.url);
        });

        // Opens the media library frame.
        meta_image_frame.open();
    });
});
