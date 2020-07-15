<div class='partners-list'>
    <?php
    $page = get_page_by_title( 'Список партнеров для отображения на сайте', OBJECT, 'partners' );
    $ID = $page->ID;
    $names = get_post_meta($ID, 'partner_name', 1);
    $links = get_post_meta($ID, 'partner_link', 1);
    $images = get_post_meta($ID, 'partner_image', 1);
    if (is_array($links) && is_array($images)) {
        for ($i = 0; $i < count($links); $i++) {
            echo "
<a target='_blank' href='$links[$i]'><img src='$images[$i]' alt='$names[$i]'></a>";
        }

    } else {
        echo "Партнери відсутні";
    } ?>
</div>
