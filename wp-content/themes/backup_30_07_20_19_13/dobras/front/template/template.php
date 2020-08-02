<?php
/**
 * The template single and pages
 */
get_header();
// Добавляет на страницу файл стилей css
do_action('head_category');
do_action('head_template');

global $ID;
global $theme_all_options;
do_action("FancyBox");
?>
<script>
    jQuery(document).ready(function() {
        jQuery(".blocks-gallery-item figure").each(function() {
                let newSrc=jQuery('img',this).attr("src")
                jQuery(this).wrapInner(`<a data-fancybox="gallery-alt" href='${newSrc}' rel='fancy'></a>`)
        });
    });
</script>
<style>
    .blocks-gallery-item{
        display: flex!important;
    }
</style>
    <div class="container">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="title-container">
                <?php
                the_title('<div class="title-container">
                <h1 class="entry-title">', '</h1></div>');
                ?>
            </div><!-- .entry-header -->
            <div class="entry-content">
                <?php if (has_post_thumbnail()) {
                    $img = wp_get_attachment_image_url(get_post_thumbnail_id(), 'large'); ?>
                    <div class="img-title" style="
                            background: url('<?php echo $img ?>') no-repeat top center;
                            background-size: cover;
                            "></div>
                <?php } ?>
                <?php
                while (have_posts()) : the_post();
                    the_content(); // выводим контент
                endwhile;
                $value= get_post_meta($ID, 'another_posts', 1);
                if ($value !== 'off') {
                    echo "<h2 class='see-also-title'>" . $theme_all_options['field_see_also'] . "</h2>"; ?>
                    <section class="section-news">
                        <div class="header-news">
                            <?php
                            $query = new WP_Query(array(
                                'post_type' => 'post',
                                'post__not_in' => array($ID),
                                'showposts' => 3,
                                'orderby' => 'rand',
                            ));
                            if ( $query->have_posts() ) :

                            ?>
                            <h2 class="title-post">
                                <?php echo single_cat_title('', false); ?>
                            </h2>
                        </div>
                        <div class="all-news">
                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                <div class="news">
                                    <?php print_thumbnail( 250); ?>
                                    <div class="info">
                                        <?php get_the_category( $post->ID ); ?>
                                        <a class="title-news" href="<?php the_permalink(); ?>">
                                            <?php the_category(); ?>
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
add_tape($ID);
get_footer();
?>