<?php
// рендер html разметки для медиа галерей в админке
function render_gallery_box($post, $home_page)
{
    $gallery = get_post_meta($post->ID, 'img_gallery', 1);
    $item_gallery = '<div class="item-gallery">
                        <img src="%s" alt="img">
                        <div>
                            <input type="hidden" name="img_gallery[]" value="%s">
                            <button type="button" class="remove_image_button button">Видалити</button>
                        </div>
                     </div> ';
    ?>
    <div>
        <?php if ($home_page['args']) { ?>
            <div class="gallery-info"> <?php echo (!is_array($gallery)) ? 'Зображення не знайдені' : "" ?></div>
        <?php } ?>
        <div>
            <button type="submit" class="add-btn-gallery button">
                Завантажити зображення
            </button>
        </div>
        <div class="gallery-list">
            <?php
            if (is_array($gallery)) {
                foreach ($gallery as $key => $item) {
                    printf($item_gallery, wp_get_attachment_image_src(esc_attr($item), 'medium')[0],
                        esc_attr($item));
                }
            }
            ?>
        </div>
    </div>
    <?php
}
?>