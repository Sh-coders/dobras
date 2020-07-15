<?php
// здесь указать тип страниц, постов, название кастомного поста в админке которыйх будет доступен мета-блок
$post_type = [
   'page',
  // 'res_and_rep',
  // 'post',
];

// подключаем функцию активации мета блока (my_extra_fields)
add_action('add_meta_boxes', 'display_another_posts_field');

function display_another_posts_field($post_type) {
    add_meta_box( 'display_another_posts', 'Показывать блок "Смотреть также"',
        'display_another_posts_func', $post_type, 'side', 'high'  );
}


function display_another_posts_func($post){
  ?>
    <input type="hidden" name="extra[another_posts]" value="">
    <label><input type="checkbox" name="extra[another_posts]" value="1"
            <?php checked( get_post_meta($post->ID, 'another_posts', 1), 1 )?> /> Показать</label>

    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
    <?php
}
