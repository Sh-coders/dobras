<?php
/*выводим основные компоненты контента*/
function print_text(){
    ?>
    <p class="excerpt">
        <?php the_excerpt_max_char_length(80); ?>
    </p>
    <time class="date">
    <?php the_time('j F Y'); ?>
    </time><?php
}
?>