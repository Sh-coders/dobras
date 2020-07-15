<?php
// здесь указать тип страниц, постов, название кастомного поста в админке которыйх будет доступен мета-блок
$post_type = [
    'page',
    // 'res_and_rep',
    // 'post',
];

// подключаем функцию активации мета блока (my_extra_fields)
add_action('add_meta_boxes', 'display_additional_tape_field');

function display_additional_tape_field($post_type) {
    add_meta_box( 'display_additional_tape',
        'Показывать над блоком контактов дополнительную ленту',
        'display_additional_tape_func', $post_type, 'side', 'high'  );
}


function display_additional_tape_func($post){
    ?>
    <input type="hidden" name="extra[additional_tape]" value="">
    <label><input type="checkbox" name="extra[additional_tape]" value="1"
            <?php checked( get_post_meta($post->ID, 'additional_tape', 1), 1 )?> /> Показать</label>

    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
    <?php
}

// включаем обновление полей при сохранении
add_action( 'save_post', 'display_another_blocks_update', 0 );

// Сохраняем данные, при сохранении поста
function display_another_blocks_update( $post_id ){
    // базовая проверка
    if (
        empty( $_POST['extra'] )
        || ! wp_verify_nonce( $_POST['extra_fields_nonce'], __FILE__ )
        || wp_is_post_autosave( $post_id )
        || wp_is_post_revision( $post_id )
    )
        return false;

    // Все ОК! Теперь, нужно сохранить/удалить данные
    $_POST['extra'] = array_map( 'sanitize_text_field', $_POST['extra'] ); // чистим все данные от пробелов по краям
    foreach( $_POST['extra'] as $key => $value ){
        if( empty($value) ){
            delete_post_meta( $post_id, $key ); // удаляем поле если значение пустое
            continue;
        }
        update_post_meta( $post_id, $key, $value ); // add_post_meta() работает автоматически
    }

    return $post_id;
}
