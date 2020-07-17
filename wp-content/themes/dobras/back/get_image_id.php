<?php
// Получает ID изображения, которое находится в медиабиблиотеке вп по URL файла
function get_image_id($image_url) {
    global $wpdb;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
    return $attachment[0];
}
?>