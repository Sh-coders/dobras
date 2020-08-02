<?php
global $ID;
if (has_post_thumbnail()) {
    ?>
    <div class="background-container">
    <img alt='' data-src="<?php echo get_the_post_thumbnail_url($ID, 'home_image');
    ?>" class="lazy mainimg"></div>
<?php }
?>