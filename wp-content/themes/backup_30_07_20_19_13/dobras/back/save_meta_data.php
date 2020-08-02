<?php
// Сохраняет данные метабоксов для медиа галерей
function save_data($post_id)
{
    if (wp_is_post_autosave($post_id))
        return;

    if (wp_is_post_revision($post_id))
        return;

    if (!current_user_can('edit_post', $post_id))
        return;

    if (isset($_POST['img_gallery'])) {
        $item = $_POST['img_gallery'];
        $item = array_map('sanitize_text_field', $item);
        $item = array_filter($item);

        if ($item) {
            update_post_meta($post_id, 'img_gallery', $item);
        } else {
            delete_post_meta($post_id, 'img_gallery');
        }
    }
}
?>