<?php
if (get_post_meta($post->ID, 'additional_tape', 1) == 1) {
    $theme_all_options = get_option('theme_options');
    $tape_text = (isset($theme_all_options['field_top_contacts'])) ? $theme_all_options['field_top_contacts'] : "";
    $btn = (isset($theme_all_options['tape_btn_text'])) ? $theme_all_options['tape_btn_text'] : "";
    $link = (isset($theme_all_options['tape_btn_link'])) ? $theme_all_options['tape_btn_link'] : "#";

    if ($tape_text !== '') {
        $first_letter = substr($tape_text, 0, strpos($tape_text, " "));
        $another_letters = substr($tape_text, strpos($tape_text, " "));
    }

    echo "<div class='additional-tape'>
    <span class='first-letter'>$first_letter
    </span>$another_letters<a class='tape-button blue-btn button' href='$link'>$btn</a></div>";
}
