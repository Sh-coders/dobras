<?php
/**
 * The main template file
 *
 */
get_header();
?>
    <main id="primary" class="site-main wrap">

        <?php
        if ( have_posts() ) :

            if ( is_home() && ! is_front_page() ) :
                ?>
                <header>
                    <h2 class="title-h2"><?php single_post_title(); ?></h2>
                </header>
            <?php
            endif;

            /* Start the Loop */
            while ( have_posts() ) :
                the_post();

                /*
                 * Include the Post-Type-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                 */
//            get_template_part( 'template-parts/content', get_post_type() );

            endwhile;

            the_posts_navigation();

        else :

            echo "Публікацій немає";

        endif;
        ?>

    </main><!-- #main -->

<?php
get_footer();

