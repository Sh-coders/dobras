<?php
add_action('wp_head', 'add_css');
function add_css()
{
    wp_enqueue_style('partners', get_template_directory_uri() . '/css/document.css');
}

get_header();

?>
<main>
    <div class="container">
        <div class="content">
            <h1 class="title-post">Партнери</h1>
           <?php include 'custom_plugins/partners_list.php'?>
        </div>
</main>

<?php
include 'custom_plugins/tape.php';
get_footer(); ?>
