<?php
/**
 * The template for displaying all pages
 */
add_action( 'wp_head', 'add_css' );
function add_css(){
    wp_enqueue_style( 'page', get_template_directory_uri() . '/css/page.css' );
}
get_header(); ?>

    <div class="container">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div>
                <?php
                 the_title('<h1 class="entry-title">', '</h1>');
                ?>
            </div><!-- .entry-header -->

            <div class="entry-content">
                <?php
                global $more;
                while (have_posts()) : the_post();
                    $more = 1; // отображаем полностью всё содержимое поста
                    the_content(); // выводим контент
                endwhile;
                ?>
            </div><!-- .entry-content -->
    </div><!-- .content -->


<?php
get_footer();
