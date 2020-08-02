<?php
/**
    Шаблон новостей
 **/
do_action('head_category');

$current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;
get_header();
$cats = get_the_category();
?>

<main>
    <div class="container">
        <section class="section-news">
            <div class="header-news">
            <?php
                $query = new WP_Query( array(
                    'posts_per_page' => 10,
                   // 'category_name' => single_cat_title( '', false ),
                     'cat'     => $cats[0]->term_id,
                    'paged' => $current_page,
                    'post_type' => 'post',
                ) );
                if ($query->have_posts() ) :
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
                    <?php print_thumbnail( 250); ?>
                    <div class="info">
                        <div>
                           <?php foreach($category as $cat) : ?>
                            <a class="title-news" href="<?php echo $cat->slug ?>" class="category">
                                <?php echo $cat->cat_name ?>
                            </a>
                            <?php endforeach; ?>
                        </div>
                        <?php print_text(); ?>
                    </div>
                </div>
                <?php endwhile; ?>


            </div>
            <div class="paginate">
                <?php
                paginate( $query->max_num_pages, $current_page, get_category_link($category_id), 'page' );
                wp_reset_postdata();
                ?>
            </div>
            <?php
            else: echo '<div class="error-wrp">
                <p class="error">'.$theme_all_options['projects_empty_posts'].'</p>
            </div>';
            endif;
            ?>
        </section>

    </div>
</main>

<?php
add_tape($ID, true);
get_footer();
?>