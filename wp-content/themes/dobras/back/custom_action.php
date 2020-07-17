<?php
add_action( 'head_single_projects', 'head_single_projects' );
function head_single_projects()
{
    wp_enqueue_style('project', get_template_directory_uri() . '/css/project.css');
    wp_enqueue_style('progress_bar', get_template_directory_uri() . '/css/progress_bar.css');
    wp_enqueue_script('progressBar', get_template_directory_uri() . '/js/progress_bar.js');
    wp_enqueue_script('menu_button', get_template_directory_uri() . '/js/menu_button.js');
}

add_action( 'head_category', 'head_category' );
function head_category()
{
    wp_enqueue_style('news', get_template_directory_uri() . '/css/news.css');
    wp_enqueue_style('paginate', get_template_directory_uri() . '/css/paginate.css');
    wp_enqueue_style( 'font-4', 'https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap' );
    wp_enqueue_style( 'font-4' );
}

add_action( 'head_category_projects', 'head_category_projects' );
function head_category_projects()
{
    wp_enqueue_style('news', get_template_directory_uri() . '/css/news.css');
    wp_enqueue_style('paginate', get_template_directory_uri() . '/css/paginate.css');
    wp_enqueue_style('paginate_pink', get_template_directory_uri() . '/css/paginate_pink.css');
    wp_enqueue_style('progress_bar', get_template_directory_uri() . '/css/progress_bar.css');
    wp_enqueue_style('projects', get_template_directory_uri() . '/css/projects.css');
    wp_enqueue_script('progressBar', get_template_directory_uri() . '/js/progress_bar.js');
    wp_enqueue_style( 'font-5', 'https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap' );
    wp_enqueue_style( 'font-5' );
}

add_action('head_single_documents', 'head_single_documents');
function head_single_documents()
{
    wp_enqueue_style('document', get_template_directory_uri() . '/css/document.css');
    wp_enqueue_style('paginate', get_template_directory_uri() . '/css/paginate.css');
    wp_enqueue_style('paginate-pink', get_template_directory_uri() . '/css/paginate_pink.css');
    wp_enqueue_style( 'font-6', 'https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap' );
    wp_enqueue_style( 'font-6' );
}

add_action('head_template', 'head_template');
function head_template()
{
    wp_enqueue_style('template', get_template_directory_uri() . '/css/template.css');
}

add_action('head_home', 'head_home');
function head_home()
{
    wp_enqueue_style('main_page', get_template_directory_uri() . '/css/main_page.css');
}
?>