<?php
/**
 * The template single and pages
 */

get_header();
// Добавляет на страницу файл стилей css
do_action('head_template' );
do_action('head_category');
global $post;
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
                    echo "<h2>" . $theme_all_options['field_see_also'] . "</h2>"; ?>
                     <section class="section-news">
            <div class="header-news">
            <?php if ( have_posts() ) :
                $query = new WP_Query( array(
                    'posts_per_page' => 10,
                    'category_name' => single_cat_title( '', false ),
                ) );
            ?>
                <h2 class="title-post">
                    <?php echo single_cat_title( '', false ); ?>
                </h2>
            </div>
            <div class="all-news">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="news">
                   <?php print_thumbnail(); ?>
                    <div class="info">
                        <a class="title-news" href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                        <?php print_text(); ?>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </section>
<?php wp_reset_postdata();
                }
                ?>
            </div><!-- .entry-content -->
    </div><!-- .content -->

<?php
add_tape( $post->ID );
get_footer();
?>