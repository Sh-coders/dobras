<?php
/*
    Template Name: Ресурси
    Template Post Type: page
 */

get_header();
do_action('head_single_documents');

$names = get_post_meta( $ID, 'name', 1 );
$links = get_post_meta( $ID, 'link', 1 );
$number_meta = 10;
$current_page = !empty( $_GET['meta'] ) ? $_GET['meta'] : 1;
$number_item = $number_meta * ($current_page - 1);
$text = $post->post_name === 'resources'
    ? $theme_all_options['resourses_btn_text'] : $theme_all_options['reports_btn_text'];
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
                        <h6 class="title-document" title="<?php echo $names[$item] ?>">
                            <?php echo $names[$item] ?>
                        </h6>
                        <a class="btn" href="<?php echo $links[$item] ?>" target="_blank">
                            <?php echo $text ?>
                        </a>
                    </div>
                <?php }?>
                <div class="paginate">
                    <?php
                    $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http')
                        . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                    $url = explode('?', $url);
                    $url = $url[0];
                    $total = ceil(count($names) / $number_meta );
                    paginate( $total, $current_page, $url, 'meta' );
                    ?>
                </div>
        </section>
    </div>
</main>
<?php
add_tape($ID);
get_footer();
?>
