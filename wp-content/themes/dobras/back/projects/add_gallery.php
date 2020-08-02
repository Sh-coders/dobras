<?php
add_action('add_meta_boxes', 'add_gallery');
// добавляет мета бокс с галереей на страницу проектов в админке
function add_gallery()
{
    add_meta_box('projects_gallery', 'Галерея проекта', 'render_gallery_box',
        'projects', 'advanced', 'high', false);
}

add_action('save_post', 'save_data');
?>