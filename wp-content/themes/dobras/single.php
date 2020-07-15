<?php

    add_action('wp_head', 'add_css');
    function add_css()
    {
        wp_enqueue_style('document', get_template_directory_uri() . '/css/document.css');
        wp_enqueue_style('paginate', get_template_directory_uri() . '/css/paginate.css');
        wp_enqueue_style('paginate-pink', get_template_directory_uri() . '/css/paginate_pink.css');
        wp_enqueue_style( 'font-1', 'https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap' );
        wp_enqueue_style( 'font-1' );
    }

    get_header();
    $names = get_post_meta( $post->ID, 'name', 1 );
    $links = get_post_meta( $post->ID, 'link', 1 );
    $number_meta = 2;
    $current_page = !empty( $_GET['meta'] ) ? $_GET['meta'] : 1;
    $number_item = $number_meta * ($current_page - 1);
    $theme_all_options = get_option('theme_options');
    $text = $post->post_name === 'resources' ? $theme_all_options['resourses_btn_text'] : $theme_all_options['reports_btn_text'];
    ?>
        <main>
                <div class="container">
                    <section class="content">
                        <h2 class="title-post">
                            <?php the_title(); ?>
                        </h2>
                        <div class="documents">
                            <?php
                                for( $item = $current_page > 1 ? $number_item : 0;
                                     $item < count($names); $item++) {
                                   if($item >= $number_item + $number_meta){
                                       break;
                                   } ?>
                                <div class="document">
                                    <div>
                                          <h3 class="title-document" title="<?php echo $names[$item] ?>">
                                            <?php echo $names[$item] ?>
                                        </h3>
                                    </div>
                                    <div>
                                        <a class="btn" href="<?php echo $links[$item] ?>" target="_blank">
                                            <?php echo $text ?>
                                        </a>
                                    </div>
                                </div>
                            <?php }?>
                            <div class="paginate">
                               <?php
                                    $total = ceil(count($names) / $number_meta );

                                    echo paginate_links( array(
                                        'base' => get_post_permalink() . '%_%',
                                        'format' => '?meta=%#%',
                                        'total' => $total,
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
