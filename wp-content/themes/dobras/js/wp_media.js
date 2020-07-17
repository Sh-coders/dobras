jQuery(document).ready(function ($) {
    let meta_image_frame;
    let input;

   // add images from wp library (used in add_meta_box.php)
    const $documentList = $('.document-list, .info');
      // Runs when the image button is clicked.
    $documentList.on('click', '.img-button', function (e) {
        console.log($(this));
        input = $(this).siblings('.meta-image');
        console.log(input);
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
            input.val (media_attachment.id);
        });

        // Opens the media library frame.
        meta_image_frame.open();
    });
});
