<?php

add_action('wp_head', 'add_css');
function add_css()
{
    wp_enqueue_style('news', get_template_directory_uri() . '/css/news.css');
    wp_enqueue_style('paginate', get_template_directory_uri() . '/css/paginate.css');
    wp_enqueue_style( 'font-1', 'https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap' );
    wp_enqueue_style( 'font-1' );
}

$current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;
get_header();
?>

<main>
    <div class="container">
        <section class="section-news">
            <div class="header-news">
            <?php if ( have_posts() ) :
                $query = new WP_Query( array(
                    'posts_per_page' => 10,
                    'category_name' => single_cat_title( '', false ),
                    'paged' => $current_page,
                ) );
            ?>
                <h2 class="title-post">
                    <?php echo single_cat_title( '', false ); ?>
                </h2>
                <div class="news-category">
                    <?php
                        $category_id = get_cat_ID(single_cat_title( '', false ));
                        $category = get_categories(array(
                            'taxonomy' => 'category',
                            'type'     => 'post',
                            'child_of' => $category_id,
                    ));
                    foreach($category as $cat) : ?>
                        <a href="<?php echo $cat->slug ?>" class="category">
                            <?php echo $cat->cat_name ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="all-news">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="news">
                    <div class="img-news">
                        <?php if ( has_post_thumbnail()) { ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" >
                                <?php the_post_thumbnail(); ?>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="info">
                        <a class="title-news" href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                        <p class="excerpt">
                            <?php the_excerpt_max_char_length(90); ?>
                        </p>
                        <time class="date">
                            <?php the_time('j F Y'); ?>
                        </time>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="paginate">
                <?php
                echo paginate_links( array(
                    'base' => get_category_link($category_id) . '%_%',
                    'format' => '?page=%#%',
                    'total' => $query->max_num_pages,
                    'current' => $current_page,
                    'prev_next' => true,
                    'prev_text'    => '&lsaquo;',
                    'next_text'    => '&rsaquo;',
                    'mid_size' => '1',
                ) );

                wp_reset_postdata();
                ?>
            </div>
        </section>
    </div>
</main>

<?php
include 'custom_plugins/tape.php';
get_footer();