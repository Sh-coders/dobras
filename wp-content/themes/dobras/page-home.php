<?php
/*
Template Name: Головна
*/

get_header();
do_action('head_home');
do_action('head_partners');
get_template_part('front/components/home_background');

 ?>
    <main>
        <div class="main-block container">
            <div class="main-container">
                <h2 class='h2-main-title'>
                    <?= $h2_text; ?>
                </h2>
                <h3 class='h3-main-title'>
                    <?= $h3_text; ?>
                </h3>
                <p class="info-main">
                    <?= $additional_text ?>
                </p>
                <?php
                echo "<div class='btn-group'>
                            <a href='$btn1_link' class='red-btn button'>
                                $btn1_text
                            </a>
                            <a href='$btn2_link' class='blue-btn button margin-left-30'>
                                $btn2_text
                            </a>
                       </div>";
                ?>
                <a class="arrow" href='#news-container'>
                    <img src='<?= $theme_uri . '/img/arrow.png' ?>' alt='arrow icon'>
                </a>
            </div>
        </div>
        <section class="section-news" id="news-container">
            <div class="container">
                <?php
                $query_news = get_posts(array(
                    'numberposts' => 3,
                    'post_type' => 'post',
                    'orderby' => 'date',
                    'order' => 'DESC',
                ));
                ?>
                <h2 class="title-post title">
                    <?php echo $title_news; ?>
                </h2>
                <div class="all-news all-news-alt">
                    <?php foreach ($query_news as $post) : setup_postdata($post); ?>
                        <div class="news news-alt">
                            <?php print_thumbnail(250); ?>
                            <div class="info">
                                <a class="title-news" href="<?php the_permalink(); ?>">
                                    <?php the_category(); ?>
                                </a>
                                <?php print_text(); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="section-projects-new">
            <div class="container container-alt">
                <div class="title-block">
                    <h2 class="title-post title-post-home">
                        <?php echo $title_projects; ?>
                    </h2>
                    <a href="<?php echo $all_projects_btn_link; ?>" class="btn btn-projects-help">
                        <?php echo $all_projects_btn_text; ?>
                    </a>
                </div>
                <?php
                $number = isset($num[0]) ? $num[0] : 5;
                ?>

            </div>
            <div class="slider-newwrap">
            <div class="slider new-poj"  >
                <?php

                $query_projects = get_posts(array(
                    'numberposts' => $number,
                    'post_type' => 'projects',
                    'orderby' => 'date',
                    'order' => 'DESC',
                ));
                foreach ($query_projects as $post) : setup_postdata($post);
                    $post_id = $post->ID;
                    $desired_amount = get_post_meta($post_id, 'desired_amount', true);
                    $amount = get_post_meta($post_id, 'amount', true);
                    ?>
                    <div class="news project">
                        <?php print_thumbnail(250); ?>
                        <div class="info project-info project-slider">
                            <div>
                                <?php $percent = number_format(calc_percent($amount, $desired_amount),
                                    0, '.', '');
                                print_progress_bar($percent, $post_id) ?>
                            </div>
                            <div>
                                <?php print_text(); ?>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
            </div>
        </section>

        <section class="section-help">
            <div class="container">
                <div class="wrapper-alt">
                    <div class="left-cell">
                        <div class="rotate-1">
                            <a data-fancybox="gallery" href="<?php echo $url_image1 ?>">
                                <div class="lazy img-rotate-1" data-src="<?php echo $url_image1 ?>" style="
                                background: url() no-repeat center;
                                background-size: cover;
                               "></div>
                            </a>
                        </div>
                        <div class="container-image">
                            <div class="rotate-2">
                                <a data-fancybox="gallery" href="<?php echo $url_image2 ?>">
                                    <div class="lazy img-rotate-2" data-src="<?php echo $url_image2 ?>" style="
                                    background: url() no-repeat center;
                                    background-size: cover;
                                   "></div>
                                </a>
                            </div>
                            <div class="rotate-3">
                                <a data-fancybox="gallery" href="<?php echo $url_image3 ?>">
                                    <div class="lazy img-rotate-3" data-src="<?php echo $url_image3 ?>" style="
                                    background: url() no-repeat center;
                                    background-size: cover;
                                    "></div>
                                </a>
                            </div>
                        </div>
                        <div class="rotate-4">
                            <a data-fancybox="gallery" href="<?php echo $url_image4 ?>">
                                <div class="lazy img-rotate-4" data-src="<?php echo $url_image4 ?>" style="
                                background: url() no-repeat center;
                                background-size: cover;
                                "></div>
                            </a>
                        </div>
                    </div>
                    <div>
                        <h2 class="title-post title">
                            <?php echo $four_img_block_h3_text ?>
                        </h2>
                        <ul class="help-list">
                            <?php foreach ($point_title as $key => $title) : ?>
                                <li class="help-item">
                                    <span>
                                        <?php echo $title ?>
                                    </span>
                                    <br>
                                    <span>
                                        <?php echo $point_value[$key] ?>
                                </span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="<?php echo $four_block_btn_link ?>" class="btn">
                            <?php echo $four_block_btn_text ?>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <?php
        echo "<div class='container'><div class='partners-block'><h2>$partners_title</h2></div>";
        $pages = get_pages(['meta_key' => 'partner_name']);
        render_partners_list($pages[0]->ID);
        ?>
    </main><!-- #main -->

<?php
do_action('script_footer_home');
wp_reset_postdata();
add_tape($ID);
get_footer(); ?>