<?php
/**
 * Шаблон конкретного проекта
 **/
get_header();
do_action('head_single_projects');
?>

         <div class="container">
            <article class="project">
                <?php the_post(); ?>
                <div class="left-col">
                    <div class="slider-gallery1">
                        <?php
                        if (is_array($img_gallery)) : ?>
                            <div class="slider slider-for">
                                <?php foreach ($img_gallery as $id) :
                                    echo $img = wp_get_attachment_image_url($id, 'large'); ?>
                                        <div class="img" style="
                                            background: url('<?php echo $img ?>') no-repeat center;
                                            background-size: cover;
                                            height: 465px;
                                            width: 314px;
                                            ">
                                            <a class="link-img"
                                               data-fancybox="gallery-projects" href="<?php echo $img ?>"></a>
                                        </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="slider slider-nav">
                                <?php foreach ($img_gallery as $id) :
                                    echo $img = wp_get_attachment_image_url($id, 'medium'); ?>
                                    <div class="lazy img" data-src="<?php echo $img ?>" style="
                                            background: url() no-repeat center;
                                            background-size: cover;
                                            height: 137px;
                                            width: 141px;
                                            "></div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="right-col">
                    <div class="title">
                        <h3 class="category-project">
                            <?php
                            $category = get_categories(array(
                                'taxonomy' => 'projects_category',
                                'type' => 'projects',
                            ));
                            foreach ($category as $key => $cat) { ?>
                                <span>
                                    <?php echo $cat->cat_name;
                                    echo $key + 1 !== count($category) ? ',' : '.' ?>
                                </span>
                            <?php } ?>
                        </h3>
                        <h2 class="title-project">
                            <?php the_title() ?>
                        </h2>
                        <time class="date">
                            <?php the_time('j F Y'); ?>
                        </time>
                    </div>
                    <div class="data">
                        <div class="result">
                            <ul>
                                <li>
                                    <span class="text">
                                        <?php echo $theme_all_options['projects_field1_text']; ?>
                                    </span>
                                    <span class="money">
                                        <?php echo number_format($desired_amount[0], 0,
                                            '.', ' ');
                                        ?> грн
                                    </span>
                                </li>
                                <li>
                                    <span class="text">
                                         <?php echo $theme_all_options['projects_field2_text']; ?>
                                    </span>
                                    <span class="money"><?php echo number_format(calc_sum($amount), 0,
                                            '.', ' ')
                                        ?> грн</span>
                                </li>
                                <li>
                                    <span class="text">
                                        <?php echo $theme_all_options['projects_field3_text']; ?>
                                    </span>
                                    <span class="money"><?php echo number_format(calc_balance($amount, $desired_amount),
                                            0, '.', ' ')
                                        ?> грн</span>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <?php
                            $percent = number_format(calc_percent($amount, $desired_amount),
                                0, '.', '');
                            print_progress_bar($percent, $ID) ?>
                        </div>
                        <div>
                            <a href="<?= $theme_all_options['article_btn_link'] ?>" class="btn">
                                <?= $theme_all_options['article_btn_text'] ?>
                            </a>
                        </div>
                    </div>

                    <div class="description">
                        <?php the_content(); ?>
                    </div>
                    <div class="info">
                        <div class="info-links">
                            <ul class="info-list">
                                <li>
                                    <button type="button" class="btn btn-category btn-start" data-target="donors-block">
                                        <?php echo $theme_all_options['projects_tab1_text'] ?>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-category" data-target="blog-block">
                                        <?php echo $theme_all_options['projects_tab2_text'] ?>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-category" data-target="documents-block">
                                        <?php echo $theme_all_options['projects_tab3_text'] ?>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="blog-block">
                            <?php print_blog($name_blog, $date_blog, $link_blog); ?>
                        </div>
                        <div class="donors-block">
                            <?php print_donors($date_donors, $name_donors,
                                $amount, $theme_all_options['projects_money_name']) ?>
                        </div>
                        <div class="documents-block">
                            <?php print_documents($documents_link, $documents_name,
                                $theme_all_options['projects_view_doc_text']) ?>
                        </div>
                    </div>
                </div>
            </article>
            <?php
            $value = get_post_meta($ID, 'another_posts', 1);
            if ($value !== 'off') {
            do_action('head_see_also_block');
            echo "<h2 class='see-also-h2'>" . $theme_all_options['field_see_also'] . "</h2>";

            $query = new WP_Query(array(
                'post_type' => 'projects',
                'post__not_in' => array($ID),
                'showposts' => 3,
                'orderby' => 'rand',
            ));
            ?>

            <div class="all-also-projects">
                <?php while ($query->have_posts()) : $query->the_post();
                    $post_id = $query->post->ID;
                    $desired_amount = get_post_meta($post_id, 'desired_amount', true);
                    $amount = get_post_meta($post_id, 'amount', true);
                    ?>
                    <div class="also-project">
                        <?php print_thumbnail(320); ?>
                        <div class="info">
                            <div>
                                <?php
                                $percent = number_format(calc_percent($amount, $desired_amount),
                                    0, '.', '');
                                print_progress_bar($percent, $post_id) ?>
                            </div>
                            <div><?php print_text(); ?></div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php
                wp_reset_postdata();
              echo "</div>";
                } ?>

         </div>

<?php
do_action('script_footer_project');
add_tape($ID);
get_footer();
?>