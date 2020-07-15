<?php
    function print_thumbnail(){
         ?> <div class="img-news">
                <?php if ( has_post_thumbnail()) { ?>
                       <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" >
                           <?php the_post_thumbnail(); ?>
                       </a>
                <?php } ?>
            </div><?php
    }

function print_text(){
    ?>
    <p class="excerpt">
        <?php the_excerpt_max_char_length(80); ?>
    </p>
    <time class="date">
        <?php the_time('j F Y'); ?>
    </time><?php
}

function print_progress_bar( $percent, $post_id ){
        ?>
    <div class="progress-bar"
         data-percent="<?php echo $percent ?>" id="<?php echo $post_id ?>">
        <div class="background"></div>
        <div class="rotate"></div>
        <div class="left"></div>
        <div class="right"></div>
        <div class="percent">
            <span></span>
        </div>
    </div><?php
}