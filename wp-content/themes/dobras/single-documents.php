<?php
    /**
        Шаблон Ресурсов и Отчетов
     **/

    get_header();
    do_action('head_single_documents');

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
                                    $link = get_post_permalink();
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
                                ?>
                            </div>
                    </section>
                </div>
        </main>
<?php
    add_tape( $post->ID );
    get_footer();
?>