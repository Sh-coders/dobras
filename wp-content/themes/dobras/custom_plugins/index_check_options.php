<?php
$all_options = get_option('main_page_theme_options');

$background_url = (isset($all_options['main_page_image'])) ? $all_options['main_page_image'] : "#";
$h2_text = (isset($all_options['h2_text'])) ? $all_options['h2_text'] : "";
$h3_text = (isset($all_options['h3_text'])) ? $all_options['h3_text'] : "";
$additional_text = (isset($all_options['short_text'])) ? $all_options['short_text'] : "";
$btn1_text = (isset($all_options['main_page_btn1_text'])) ? $all_options['main_page_btn1_text'] : "";
$btn1_link = (isset($all_options['main_page_btn1_link'])) ? $all_options['main_page_btn1_link'] : "#";
$btn2_text = (isset($all_options['main_page_btn2_text'])) ? $all_options['main_page_btn2_text'] : "";
$btn2_link = (isset($all_options['main_page_btn2_link'])) ? $all_options['main_page_btn2_link'] : "#";
$partners_display = (isset($all_options['display_partners_block'])) ? $all_options['display_partners_block'] : "";
$partners_title = (isset($all_options['title_partners_block'])) ? $all_options['title_partners_block'] : "";
$tape_display = (isset($all_options['display_additional_tape'])) ? $all_options['display_additional_tape'] : null;
