<?php

// Отображает разметку html на странице настроек в админпанели
function theme_option_render_settings($args) {

    extract($args);
    $option_name = 'theme_options';
    $o = get_option($option_name);
    $o[$id] = esc_attr(stripslashes($o[$id]));
    $value = $o[$id];

    switch ($type) {
        case 'input':
            echo "<input class='code large-text' type='text' maxlength='$size' placeholder='$placeholder' value='$value'
            id='$id' name='" . $option_name . "[$id]'/>";
            echo ($desc != '') ? "<br /><span style='margin-left: 2%' class='description'>$desc</span>" : "";
            break;

        case 'img-main-page':
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

        case 'time':
            echo "<input type='time' value='$value' id='$id' name='" . $option_name . "[$id]' />";
            echo ($desc != '') ? "<br /><span style='margin-left: 2%' class='description'>$desc</span>" : "";
            break;
    }
}
?>