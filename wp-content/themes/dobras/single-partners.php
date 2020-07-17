<?php
get_header();
do_action('head_partners');
?>

<main>
    <div class="container">
        <div class="content">
            <h1 class="title-post">Партнери</h1>
           <?php render_partners_list() ?>
        </div>
</main>

<?php
add_tape( $post->ID );
get_footer(); ?>