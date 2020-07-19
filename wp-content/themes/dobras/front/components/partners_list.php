<?php
// Выводит на странице фронта список партнеров в виде html тегов
function render_partners_list($ID) {
    echo "<div class='partners-list'>";
//    $page = get_page_by_title('Список партнеров для отображения на сайте', OBJECT, 'partners');
//    print_r($page);
//    $ID = $page->ID;
    $names = get_post_meta($ID, 'partner_name', 1);
    $links = get_post_meta($ID, 'partner_link', 1);
    $images = get_post_meta($ID, 'partner_image', 1);

    if (is_array($links) && is_array($images)) {
        for ($i = 0; $i < count($links); $i++) {
            $img_url = wp_get_attachment_image_url($images[$i], 'medium');
            echo "
<a target='_blank' href='$links[$i]'><img src='$img_url' alt='$names[$i]'></a>";
        }

    } else {
        echo "Партнери відсутні";
    }

    echo "</div>";
}
?>