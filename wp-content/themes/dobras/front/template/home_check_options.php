<?php
$background_img_id = get_post_meta($post->ID, 'main_page_image', 1)[0];
$background_url = wp_get_attachment_image_src($background_img_id, 'full')[0];
$h2_text = get_post_meta($post->ID, 'h2_text', 1)[0];
$h3_text = get_post_meta($post->ID, 'h3_text', 1)[0];
$additional_text = get_post_meta($post->ID, 'short_text', 1)[0];
$btn1_text = get_post_meta($post->ID, 'main_page_btn1_text', 1)[0];
$btn1_link = get_post_meta($post->ID, 'main_page_btn1_link', 1)[0];
$btn2_text = get_post_meta($post->ID, 'main_page_btn2_text', 1)[0];
$btn2_link = get_post_meta($post->ID, 'main_page_btn2_link', 1)[0];
$partners_title = get_post_meta($post->ID, 'title_partners_block', 1)[0];
?>