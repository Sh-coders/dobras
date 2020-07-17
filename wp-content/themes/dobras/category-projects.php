<?php
/**
    Шаблон проектов

 **/
$current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;
get_header();
do_action('head_category_projects');
?>

    <main>
        <div class="container">
            <section class="section-news">
                <div class="header-news">
                    <?php if ( have_posts() ) :
                    $query = new WP_Query( array(
                        'posts_per_page' => 10,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'projects_category',
                                'field'    => 'name',
                                'terms'    => single_cat_title( '', 0 )
                            )),
                        'paged' => $current_page,
                        'post_type' => 'projects'
                    ) );
                    ?>
                    <h2 class="title-post">
                        <?php single_cat_title( '', 1 ); ?>
                    </h2>
                    <div class="news-category">
                        <?php
                        $term_ID = get_queried_object()->term_id;
                        $term_children = get_term_children( $term_ID, 'projects_category' );
                         if( is_array($term_children) ): ?>
                        <?php
                        foreach($term_children as $child ) : ?>
                            <?php $term = get_term_by( 'id', $child, 'projects_category' ); ?>
                            <a href="<?php echo get_term_link( $term->term_id, $term->taxonomy ) ?>" class="category">
                                <?php echo $term->name ?>
                            </a>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="all-news">
                    <?php while ( $query->have_posts() ) : $query->the_post();
                        $post_id = $query->post->ID;
                        $desired_amount = get_post_meta( $post_id, 'desired_amount', true );
                        $amount = get_post_meta( $post_id, 'amount', true );
                        ?>
                        <div class="news">
                            <?php print_thumbnail(); ?>
                            <div class="info">
                                <div>
                                    <?php
                                    $percent = number_format(calc_percent( $amount, $desired_amount ),
                                        0, '.', '');
                                    print_progress_bar($percent, $post_id) ?>
                                </div>
                                <div>
                                   <?php print_text(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="paginate">
                    <?php
                    $link = get_term_link( get_queried_object()->term_id, 'projects_category' );
                    paginate($query->max_num_pages, $current_page, $link);
                    ?>
                </div>
            </section>
        </div>
    </main>

<?php
add_tape( $post->ID );
get_footer();
?>