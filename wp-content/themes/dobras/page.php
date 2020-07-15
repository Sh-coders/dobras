<?php
/**
 * The template for displaying all pages
 */
add_action('wp_head', 'add_css');
function add_css()
{
    wp_enqueue_style('page', get_template_directory_uri() . '/css/page.css');
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
                $theme_all_options = get_option('theme_options');
                if (get_post_meta($post->ID, 'another_posts', 1) == 1) {
                    echo "<h2>" . $theme_all_options['field_see_also'] . "</h2>";
                }
                ?>
            </div><!-- .entry-content -->
    </div><!-- .content -->

<?php
include 'custom_plugins/tape.php';

get_footer();
