<?php
/*
Template Name: Mainpage
*/
include('front/template/home_check_options.php');
//get_template_part( 'front/template/home_check_option');
global $post;
get_header();
do_action('head_home');
//if (is_page_template('front-page.php')) {
//    print_r(get_post_meta($post->ID, 'partner_name', 1));
//}

?>
    <script>
        const url =
            '<?php echo $background_url;?>';
        document.querySelector('body').style.backgroundImage =
            'linear-gradient(180deg, rgba(212, 201, 196, 0.52) 0%, rgba(199, 182, 176, 0) 37.27%), url('.concat(url).concat(')');
    </script>

    <main>
        <div class="container">
            <div class="main-block">
                <div class='h2-container'><h2><?= $h2_text ?></h2></div>
                <div class='h3-container'><h3><?= $h3_text ?></h3>
                    <p><?= $additional_text ?></p></div>
                <?php
                echo "<div class='btn-group'>
                <a href='$btn1_link'>
                <button class='red-btn button'>$btn1_text</button></a>
                <a href='$btn2_link'>
                <button class='blue-btn button margin-left-30'>$btn2_text</button></a>
                </div>";
                ?>
                <a href='#partners-block'>
                    <img class='arrow-down' src='<?= get_template_directory_uri() . '/img/arrow.png' ?>'
                         alt='arrow icon'><a>
            </div>
            <?php
            echo "<div id='partners-block' class='partners-block'><h2>$partners_title</h2></div>";
            $pages = get_pages(['meta_key' => 'partner_name']);
            render_partners_list($pages[0]->ID);
            ?>
        </div>
    </main><!-- #main -->

<?php add_tape($post->ID);
get_footer(); ?>