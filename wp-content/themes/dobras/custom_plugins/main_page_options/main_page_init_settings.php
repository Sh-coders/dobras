<?php
function main_page_settings_page()
{
    ?>
    <form method="post" enctype='multipart/form-data' action='options.php'>
        <?php settings_fields("main_page_theme_options"); ?>
        <?php do_settings_sections('main_page_opt') ?>
        <?php submit_button(); ?>
    </form>
    <?php
}

