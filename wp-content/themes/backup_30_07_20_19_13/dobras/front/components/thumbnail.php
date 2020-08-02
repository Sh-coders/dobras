<?php
/*выводимм миниатюру*/
function print_thumbnail( $height ){
    ?><?php if ( has_post_thumbnail()) {
        $img = wp_get_attachment_image_url( get_post_thumbnail_id(), 'large' ); ?>
        <a href="<?php the_permalink(); ?>">
            <div  class="lazy img-news" data-src='<?php echo $img ?>' style="
                    background: url() no-repeat center;
                    background-size: cover;
                    height: <?php echo $height ?>px;
                    width: 100%;
                    "></div>
        </a>
    <?php } else {?>
        <div  class="img-news" style="height: <?php echo $height ?>px; width: 100%;"></div>
    <?php } ?>
    <?php
}
?>