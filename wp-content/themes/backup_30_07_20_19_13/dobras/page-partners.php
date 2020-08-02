<?php
/*
Template Name: Партнери
Template Post Type: page
*/
get_header();
do_action('head_partners');
?>

<main>
    <div class="container">
        <div class="title-container"><h1 class="title-post">
                <?= the_title() ?></h1></div>
            <?php render_partners_list($ID); ?>
</main>

<?php
add_tape($ID);
get_footer(); ?>