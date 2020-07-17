<?php

// Отображает разметку html на странице настроек в админпанели
function theme_option_render_settings($args) {

    extract($args);
    $key = explode ('_', $args['page']);
    $option_name = ($key[0] === "main") ? 'main_page_theme_options' : 'theme_options';
    $o = get_option($option_name);
    $o[$id] = esc_attr(stripslashes($o[$id]));
    $value = $o[$id];

    switch ($type) {
        case 'input':
            echo "<input class='code large-text' type='text' maxlength='$size' placeholder='$placeholder' value='$value'
            id='$id' name='" . $option_name . "[$id]'/>";
            echo ($desc != '') ? "<br /><span style='margin-left: 2%' class='description'>$desc</span>" : "";
            break;

        case 'img':
            echo "<div class='points-list'>
        <label for='main_page_image'>Ссылка<input class='code large-text meta-image' id='$id' 
        name='" . $option_name . "[$id]' type='text' name='main_page_image' value='$value' />
        <button type='button' class='img-button'>Выбрать изображение с библиотеки</button>
        </label>
            </div>";
            break;

        case 'img-main-page':
            // set the image url
            if ($value) {
                $image_prev = wp_get_attachment_image_src($value, 'medium');
            }
            echo "<div class='document-list'>
        <label for='main_page_image'> ID файла <input type='text' class='code meta-image' id='$id'
         size='4'   name='" . $option_name . "[$id]' value='$value' />Превью <img src='$image_prev[0]'>
        <button type='button' class='img-button'>  Выбрать изображение с библиотеки </button></label>
            </div>";
            break;

        case 'number':
            echo "<input class='code' type='number' placeholder='$placeholder' min='0'
            id='$id' name='" . $option_name . "[$id]' value='$value' />";
            echo ($desc != '') ? "<br /><span style='margin-left: 2%' class='description'>$desc</span>" : "";
            break;

        case 'checkbox':
            $checked = $value ? 'checked' : '';
            echo "<input type='checkbox' $checked id='$id' name='" . $option_name . "[$id]'  />";
            echo ($desc != '') ? "<br /><span style='margin-left: 2%' class='description'>$desc</span>" : "";
            break;

        case 'url':
            echo "<input class='code large-text' type='url' placeholder='$placeholder' value='$value'
            id='$id' name='" . $option_name . "[$id]'/>";
            break;

        case 'select':
            echo "<input type='time' value='$value' id='$id' name='" . $option_name . "[$id]' />";
            echo ($desc != '') ? "<br /><span style='margin-left: 2%' class='description'>$desc</span>" : "";
            break;

        case 'array':
//            add_settings_field('set_field_points2',
//                'Поинты', 'display_points',
//                'main_page_opt', 'main_page_four_images_options');
//
//            add_action('add_meta_boxes', 'add_points_meta_box');
            break;

    }
}
?>