<?php
/**
    Шаблон конкретного проекта
 **/

    $date_donors = get_post_meta( $post->ID, 'date_donors', true );
    $name_donors = get_post_meta( $post->ID, 'name_donors', true );
    $link_donors = get_post_meta( $post->ID, 'link_donors', true );
    $amount = get_post_meta( $post->ID, 'amount', true );
    $documents_link = get_post_meta( $post->ID, 'link_documents', true );
    $documents_name = get_post_meta( $post->ID, 'name_documents', true );
    $date_blog = get_post_meta( $post->ID, 'date_blog', true );
    $link_blog = get_post_meta( $post->ID, 'link_blog', true );
    $name_blog = get_post_meta( $post->ID, 'name_blog', true );
    $desired_amount = get_post_meta( $post->ID, 'desired_amount', true );

    get_header();
    do_action( 'head_single_projects' );
?>
    <main>
        <div class="container">
            <article class="project">
                <?php the_post(); ?>
                <div class="left-col"></div>
                <div class="right-col">
                    <div class="title">
                        <h3 class="category-project">
                            <?php
                            $category = get_categories(array(
                                'taxonomy' => 'projects_category',
                                'type'     => 'projects',
                            ));
                            for( $i = 0; $i < count($category); $i++) { ?>
                                <span>
                                    <?php echo $category[$i]->cat_name; echo $i + 1 !== count($category) ? ',' : '.'?>
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
                                    <span class="text">Потрiбно зiбрати</span>
                                    <span class="money">
                                        <?php echo number_format($desired_amount[0], 0,
                                            '.', ' ')
                                            ?> грн
                                    </span>
                                </li>
                                <li>
                                    <span class="text">Зібрано</span>
                                    <span class="money"><?php echo number_format(calc_sum( $amount ), 0,
                                            '.', ' ')
                                        ?> грн</span>
                                </li>
                                <li>
                                    <span class="text">Залишилось</span>
                                    <span class="money"><?php echo number_format(calc_balance( $amount, $desired_amount ),
                                            0, '.', ' ')
                                        ?> грн</span>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <?php
                            $percent = number_format(calc_percent( $amount, $desired_amount ),
                                0, '.', '');
                            print_progress_bar($percent, get_the_ID()) ?>
                        </div>
                        <div>
                            <button type="button" class="btn">Допомогти</button>
                        </div>
                    </div>

                    <div class="description">
                        <?php the_content(); ?>
                    </div>
                    <div class="info">
                        <div class="info-links">
                            <ul class="info-list">
                                <li>
                                    <button type="button" class="btn btn-category" data-target="donors-block">
                                        Донори
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-category" data-target="blog-block">
                                        Блог
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-category" data-target="documents-block">
                                        Документи
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="blog-block">
                            <?php print_blog($name_blog, $date_blog, $link_blog); ?>
                        </div>
                        <div class="donors-block">
                            <?php print_donors($date_donors, $link_donors, $name_donors, $amount) ?>
                        </div>
                        <div class="documents-block">
                            <?php print_documents($documents_link, $documents_name) ?>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </main>


<?php
add_tape( $post->ID );
get_footer();
?>