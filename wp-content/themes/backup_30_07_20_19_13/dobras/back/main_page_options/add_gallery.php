<?php
add_action('add_meta_boxes', 'add_meta_boxj', 10, 1);
// добавляет мета бокс с галереей на страницу "Главная" в админке
function add_meta_boxj()
{
    global $post;
    if ("page-home.php" == get_post_meta($post->ID, '_wp_page_template', true)) {
        add_meta_box('meta_box_slider', 'Галерея блоку "Кому ми допомагаємо"', 'render_gallery_box',
            'page', 'normal', 'high', true);
        do_action('AdminGallery');
    }
}

get_template_part('back/render_gallery');
add_action('save_post', 'save_data');
get_template_part('back/save_meta_data');
?>