<?php
global $theme_uri, $ID;

$ID = $post->ID;
$theme_uri = get_template_directory_uri();

if ("page-home.php" == get_post_meta($ID, '_wp_page_template', true)) {
    global $h2_text, $h3_text, $additional_text, $btn1_text, $btn1_link, $btn2_text, $btn2_link,
           $partners_title, $title_projects, $title_news, $main_page_slider_btn_text, $main_page_slider_btn_link,
           $url_image1, $url_image2, $url_image3, $url_image4, $four_img_block_h3_text,
           $four_block_btn_link, $four_block_btn_text, $point_title, $point_value;

    $h2_text = get_post_meta($ID, 'h2_text', 1)[0];
    $h3_text = get_post_meta($ID, 'h3_text', 1)[0];
    $additional_text = get_post_meta($ID, 'short_text', 1)[0];
    $btn1_text = get_post_meta($ID, 'main_page_btn1_text', 1)[0];
    $btn1_link = get_post_meta($ID, 'main_page_btn1_link', 1)[0];
    $btn2_text = get_post_meta($ID, 'main_page_btn2_text', 1)[0];
    $btn2_link = get_post_meta($ID, 'main_page_btn2_link', 1)[0];
    $partners_title = get_post_meta($ID, 'title_partners_block', 1)[0];
    $partners_title = get_post_meta($ID, 'title_partners_block', 1)[0];
    $title_projects = get_post_meta($ID, 'title_projects_block', 1)[0];
    $title_news = get_post_meta($ID, 'title_news_block', 1)[0];
    $main_page_slider_btn_text = get_post_meta($ID, 'main_page_slider_btn_text', 1)[0];
    $main_page_slider_btn_link = get_post_meta($ID, 'main_page_slider_btn_link', 1)[0];
    $four_img_block_h3_text = get_post_meta($ID, 'four_img_block_h3_text', 1)[0];
    $four_block_btn_link = get_post_meta($ID, 'four_block_btn_link', 1)[0];
    $four_block_btn_text = get_post_meta($ID, 'four_block_btn_text', 1)[0];
    $point_title = get_post_meta($ID, 'point_title', 1);
    $point_value = get_post_meta($ID, 'point_value', 1);

    $images = get_post_meta($ID, 'img_gallery', 1);


    if (is_array($images) ) {
        $counter = 0;
        foreach ($images as $i => $id) {
            $counter += 1;
            ${'url_image'.$counter} = wp_get_attachment_image_url($id, 'large');
        }
    }
}


if ($post->post_type == 'projects') {
    global $date_donors, $name_donors, $link_donors, $amount, $documents_link, $documents_name,
           $date_blog, $link_blog, $name_blog, $desired_amount, $img_gallery;

    $date_donors = get_post_meta($ID, 'date_donors', true);
    $name_donors = get_post_meta($ID, 'name_donors', true);
    $link_donors = get_post_meta($ID, 'link_donors', true);
    $amount = get_post_meta($ID, 'amount', true);
    $documents_link = get_post_meta($ID, 'link_documents', true);
    $documents_name = get_post_meta($ID, 'name_documents', true);
    $date_blog = get_post_meta($ID, 'date_blog', true);
    $link_blog = get_post_meta($ID, 'link_blog', true);
    $name_blog = get_post_meta($ID, 'name_blog', true);
    $desired_amount = get_post_meta($ID, 'desired_amount', true);
    $img_gallery = get_post_meta($ID, 'img_gallery', 1);
}

global $theme_all_options, $num, $all_projects_btn_text, $all_projects_btn_link, $logo_id;

$theme_all_options = get_option('theme_options');
$all_projects_btn_text = (isset($theme_all_options['all_projects_btn_text']))
    ? $theme_all_options['all_projects_btn_text']  : '';
$all_projects_btn_link = (isset($theme_all_options['all_projects_btn_link']))
   ? $theme_all_options['all_projects_btn_link'] : "#";
$num = get_post_meta($ID, 'main_page_num_projects', 1);
$logo_id = (isset($theme_all_options['site_logo']) ? $theme_all_options['site_logo'] : '#');
?>