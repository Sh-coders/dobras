<?php $theme_all_options = get_option('theme_options'); ?>
<img src="<?php echo get_template_directory_uri() . '/img/phone.png' ?>" alt="phone icon">
<div class="info">
    <?php

    for ($i = 1; $i < 4; $i++) {
        $key = 'company_footer_phone' . $i;
        echo "<p class='font-light'>" . substr($theme_all_options[$key], 0, 3) . "<span>" .
            substr($theme_all_options[$key], 3) . "</span></p>";
    } ?>
</div>