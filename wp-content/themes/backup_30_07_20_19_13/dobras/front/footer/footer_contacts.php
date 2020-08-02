<?php
global $theme_uri;
global $theme_all_options; ?>
<img class="lazy" src="" data-src="<?php echo $theme_uri . '/img/phone.png' ?>" alt="phone icon">
<div class="info">
    <?php

    for ($i = 1; $i < 4; $i++) {
        $key = 'company_footer_phone' . $i;
        echo "<p class='font-light'>" . substr($theme_all_options[$key], 0, 3) . "<span>" .
            substr($theme_all_options[$key], 3) . "</span></p>";
    } ?>
</div>