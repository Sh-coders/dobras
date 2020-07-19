<?php
// Отображает чекбокс в админпанели
function admin_render_checkbox($post, $key)
{

    ?>
    <input type="hidden" name="extra[<?= $key['args'] ?>]" value="">
    <label><input type="checkbox" name="extra[<?= $key['args'] ?>]" value="1"
            <?php checked(get_post_meta($post->ID, $key['args'], 1), 1); ?> /> Показать</label>

    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>"/>
    <?php
}


// Сохраняем данные, при сохранении поста (страницы)
function save_meta_data($post_id)
{

    // базовая проверка
    if (
        empty($_POST['extra'])
        || !wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__)
        || wp_is_post_autosave($post_id)
        || wp_is_post_revision($post_id)
    )
        return false;

    // Все ОК! Теперь, нужно сохранить/удалить данные
    $_POST['extra'] = array_map('sanitize_text_field', $_POST['extra']); // чистим все данные от пробелов по краям
    foreach ($_POST['extra'] as $key => $value) {
        if (empty($value)) {
            delete_post_meta($post_id, $key); // удаляем поле если значение пустое
            continue;
        }
        update_post_meta($post_id, $key, $value); //
    }

    return $post_id;
}

add_action('save_post', 'save_meta_data');
?>