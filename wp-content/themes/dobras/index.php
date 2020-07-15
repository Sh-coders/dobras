<?php
/**
 * The main template file
 *
 */
include 'custom_plugins/index_check_options.php';

add_action('wp_head', 'add_main_page_css');
function add_main_page_css()
{
    wp_enqueue_style('main_page', get_template_directory_uri() . '/css/main_page.css');
}

get_header();
?>
    <script>
        const url = '<?php echo $background_url;?>';
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
            if ($partners_display === 'on') {
                echo "<div id='partners-block' class='partners-block'><h2>$partners_title</h2></div>";
                include 'custom_plugins/partners_list.php';
            }
            ?>
        </div>
    </main><!-- #main -->

<?php
if ($tape_display) {
    include 'custom_plugins/tape.php';
}
get_footer();

