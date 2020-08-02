<?php
add_action('SlickTheme', 'SlickThemeInc'); // Add Slick Theme Styles
function SlickThemeInc()
{
    global $DIR;
    wp_enqueue_style('slickTheme', $DIR . '/css/slick-theme.css');
}

add_action('Slick', 'SlickInc'); // Add Slick Style
function SlickInc()
{
    global $DIR;
    wp_enqueue_style('slickCss', $DIR . '/css/slick.css');
}

add_action('SlickScript', 'SlickScriptInc'); // Add Slick Script
function SlickScriptInc()
{
    global $DIR;
    wp_enqueue_script('slickJs', $DIR . '/js/lib/slick.js');
}


add_action('ProgressBar', 'ProgressBarScript'); // Add Progress Bar Style and Script
function ProgressBarScript()
{
    global $DIR;
    wp_enqueue_style('progressBarCss', $DIR . '/css/progress_bar.css');
    wp_enqueue_script('progressBarJs', $DIR . '/js/progress_bar.js');
}

add_action('Project', 'ProjectStyleInc'); // Add Single Page Project Post Type Style
function ProjectStyleInc()
{
    global $DIR;
    wp_enqueue_style('projectCss', $DIR . '/css/project.css');
}

add_action('Projects', 'ProjectsStyleInc'); // Add Projects Post Type Style
function ProjectsStyleInc()
{
    global $DIR;
    wp_enqueue_style('projectsCss', $DIR . '/css/projects.css');
}

add_action('Paginate', 'PaginateStyleInc'); // Add Paginate Style
function PaginateStyleInc()
{
    global $DIR;
    wp_enqueue_style('paginateCss', $DIR . '/css/paginate.css');
}

add_action('NewsStyle', 'NewsStyleInc'); // Add Style For News Posts
function NewsStyleInc()
{
    global $DIR;
    wp_enqueue_style('newsCss', $DIR . '/css/news.css');
}

add_action('PaginatePink', 'PaginatePinkInc'); // Add Style For Pink Paginate
function PaginatePinkInc()
{
    global $DIR;
    wp_enqueue_style('paginatePinkCss', $DIR . '/css/paginate_pink.css');
}

add_action('Documents', 'DocumentsStyleInc'); // Add Style For Documents Pages
function DocumentsStyleInc()
{
    global $DIR;
    wp_enqueue_style('documentCss', $DIR . '/css/document.css');
}


add_action('FancyBox', 'FancyBoxScript'); // Add Fancy Box Script
function FancyBoxScript()
{
    global $DIR;
    wp_enqueue_script('fancyboxJs', $DIR . '/js/lib/jquery.fancybox.min.js');
}

add_action('AdminGallery', 'AdminGalleryScript'); // Add Media Gallery Script for Home Page Admin
function AdminGalleryScript()
{
    global $DIR;
    wp_enqueue_script('adminGallery', $DIR . '/js/admin/gallery_page_home.js');
}


add_action('head_category', 'head_category');
function head_category()
{
    global $DIR;
    do_action('NewsStyle');
    do_action('Paginate');
}

add_action('head_single_projects', 'head_single_projects');
function head_single_projects()
{
    global $DIR;
    do_action('Project');
    do_action('ProgressBar');
    do_action('Slick');
    wp_enqueue_script('menu_button', $DIR . '/js/header/menu_button.js');
    wp_enqueue_style('slick-theme-2', $DIR . '/css/slick-theme-2.css');
}


add_action('head_category_projects', 'head_category_projects');
function head_category_projects()
{
    global $DIR;
    do_action('NewsStyle');
    do_action('Paginate');
    do_action('PaginatePink');
    do_action('ProgressBar');
    do_action('Projects');
}

add_action('head_single_documents', 'head_single_documents');
function head_single_documents()
{
    global $DIR;
    do_action('Paginate');
    do_action('PaginatePink');
    do_action('Documents');
}

add_action('head_template', 'head_template');
function head_template()
{
    global $DIR;
    wp_enqueue_style('template', $DIR . '/css/template.css');
}


add_action('head_home', 'head_home');
function head_home()
{
    global $DIR;
    do_action('ProgressBar');
    do_action('Projects');
    do_action('SlickTheme');
    do_action('NewsStyle');
    do_action('Slick');
    wp_enqueue_style('main_page', $DIR . '/css/main_page.css');
    wp_enqueue_style('help', $DIR . '/css/help.css');
}
add_action('script_footer_home', 'script_footer_home');


function script_footer_home()
{
    global $DIR;
    do_action('SlickScript');
    wp_enqueue_script('home_sliker', $DIR . '/js/gallery/home_sliker.js');
    do_action('FancyBox');
}

add_action('script_footer_project', 'script_footer_project');
function script_footer_project()
{
    global $DIR;
    do_action('SlickScript');
    wp_enqueue_script('slider_gallery', $DIR . '/js/gallery/slider-gallery.js');
    do_action('FancyBox');
}


add_action('head_partners', 'head_partners');
function head_partners()
{
    global $DIR;
    do_action('Documents');
    wp_enqueue_style('partners', $DIR . '/css/partners.css');
}


add_action('head_see_also_block', 'head_see_also_block');
function head_see_also_block()
{
    global $DIR;
    wp_enqueue_style('partners', $DIR . '/css/see_also.css');
}


add_action('script_footer_map', 'script_footer_map');
function script_footer_map()
{
    global $DIR;
    wp_enqueue_script('map', $DIR . '/js/map/map.js');
    wp_enqueue_script('burger', $DIR . '/js/header/burger.js');
    wp_enqueue_script('leaflet_js', $DIR . '/js/lib/leaflet.js');
    wp_enqueue_script('lazy', $DIR . '/js/lib/jquery.lazy.min.js');
    wp_enqueue_script('lazy_include', $DIR . '/js/lib/lazy.js');
}


add_action('head_tape', 'head_tape');
function head_tape()
{
    global $DIR;
    wp_enqueue_style('tape', $DIR . '/css/tape.css');
}


add_action('head_page_not_found', 'head_page_not_found');
function head_page_not_found()
{
    global $DIR;
    wp_enqueue_style('page_not_found', $DIR . '/css/404.css');
}
?>