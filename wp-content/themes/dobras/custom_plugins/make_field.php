<?php
function make_theme_option_field ($settings_section, $title, $id, $size, $desc, $type, $placeholder, $options_page) {

    $field_params = array(
        'id' => $id,
        'type' => $type,
        'size' => $size,
        'placeholder' => $placeholder,
        'desc' => $desc,
        'page' => $options_page,
    );

    add_settings_field("set_".$id, $title, 'theme_option_render_settings',
        $options_page, $settings_section, $field_params);
}
