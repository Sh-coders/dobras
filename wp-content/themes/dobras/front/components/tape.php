<?php
// Выводит во фронте ленту над футером страницы, если в админпанеле для этой страницы устанновлен соотвествующий чекбокс
function add_tape($id, $show_always = false)
{
    $value = get_post_meta($id, 'additional_tape', 1);

    if ($value !== 'off') {
        do_action('head_tape');
        global $theme_all_options;
        $tape_text = (isset($theme_all_options['field_top_contacts'])) ? $theme_all_options['field_top_contacts'] : "";
        $btn = (isset($theme_all_options['tape_btn_text'])) ? $theme_all_options['tape_btn_text'] : "";
        $link = (isset($theme_all_options['tape_btn_link'])) ? $theme_all_options['tape_btn_link'] : "#";

        if ($tape_text !== '') {
            $first_letter = substr($tape_text, 0, strpos($tape_text, " "));
            $another_letters = substr($tape_text, strpos($tape_text, " "));
        }

        echo "<div class='additional-tape'><div class='helper-text'>
    <span class='first-letter'>$first_letter</span>$another_letters</div>
    <a class='tape-button blue-btn button' href='$link'>$btn</a></div>";
    }
}

?>