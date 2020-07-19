<?php
/*
Template Name: Партнеры
*/
get_header();
do_action('head_partners');
global $post;

?>

    <main>
        <div class="container">
            <div class="content">
                <h1 class="title-post">Партнери</h1>
                <?php
                render_partners_list($post->ID); ?>
            </div>
    </main>

<?php
add_tape( $post->ID );
get_footer(); ?>