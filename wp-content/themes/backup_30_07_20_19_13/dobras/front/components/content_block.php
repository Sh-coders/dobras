<?php
/*выводим основные компоненты контента*/
function print_text(){
    ?>
    <p class="excerpt">
        <a href="<?php the_permalink(); ?>" >
            <?php the_excerpt_max_char_length(80); ?>
        </a>
    </p>
    <time class="date">
        <?php the_time('j F Y'); ?>
    </time><?php
}
?>