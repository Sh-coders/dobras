<?php
/*выводим прогресс бар*/
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
?>