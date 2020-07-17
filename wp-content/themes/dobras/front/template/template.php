<?php
/**
 * The template single and pages
 */

get_header();
// Добавляет на страницу файл стилей css
do_action('head_template' );
?>

    <div class="container">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div>
                <?php
                the_title('<h1 class="entry-title">', '</h1>');
                ?>
            </div><!-- .entry-header -->
            <div class="entry-content">
                <?php
                while (have_posts()) : the_post();
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
    add_tape( $post->ID );
    get_footer();
?>