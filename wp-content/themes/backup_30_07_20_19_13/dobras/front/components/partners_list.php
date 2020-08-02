<?php
// Выводит на странице фронта список партнеров в виде html тегов
function render_partners_list($ID)
{
    echo "<div class='partners-list'>";
    $names = get_post_meta($ID, 'partner_name', 1);
    $links = get_post_meta($ID, 'partner_link', 1);
    $images = get_post_meta($ID, 'partner_image', 1);

    if (is_array($links) && is_array($images)) {
        foreach ($links as $i => $link) {
            $img_url = wp_get_attachment_image_url($images[$i], 'medium');
            echo "
<a target='_blank' href='$link'><img class='lazy' data-src='$img_url' alt='$names[$i]' src=''></a>";
        }

    } else {
        echo "Партнери відсутні";
    }

    echo "</div>";
}

?>