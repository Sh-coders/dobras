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
             <?php
                        $query = new WP_Query( array(
                                'posts_per_page' => 3,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'projects_category',
                                        'field'    => 'name',
                                        'terms'    => single_cat_title( '', 0 )
                                    )),
                                'paged' => $current_page,
                                'post_type' => 'projects'
                        ) );

                    if ( $query->have_posts() ) :
                    ?>
                        <h2 class="title-post">
                                <?php single_cat_title( '', 1 ); ?>
                        </h2>
                        <a href="<?php echo $theme_all_options['all_projects_btn_link']; ?>" class="btn btn-projects-help">
                            <?php echo $theme_all_options['all_projects_btn_text']; ?>
                        </a>
                <div class="all-projects all-news">
                    <?php while ( $query->have_posts() ) : $query->the_post();
                        $post_id = $query->post->ID;
                        $desired_amount = get_post_meta( $post_id, 'desired_amount', true );
                        $amount = get_post_meta( $post_id, 'amount', true );
                        ?>
                        <div class="project news">
                            <?php print_thumbnail( 250); ?>
                            <div class="project-info info">
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
                </div>
                <div class="paginate">
                    <?php
                    $link = get_term_link( get_queried_object()->term_id, 'projects_category' );
                    paginate($query->max_num_pages, $current_page, $link, 'page');
                    wp_reset_postdata();
                    ?>
                </div>
            </section>
        </div>
    </main>

<?php
add_tape($ID);
else: echo '<div class="error-wrp">
                <p class="error">'.$theme_all_options['projects_empty_posts'].'</p>
            </div>';
endif;
get_footer();
?>