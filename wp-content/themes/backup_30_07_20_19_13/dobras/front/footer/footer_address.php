<?php
global $theme_uri;
global $theme_all_options;
?>
    <img class="lazy" data-src="<?php echo $theme_uri. '/img/geo.png' ?>" src="" alt="geo map icon">
    <div class="info">
        <p class="font-light footer-address-country">
            <?php echo $theme_all_options['company_country_town']; ?>
        </p>
        <p>
            <?php echo $theme_all_options['company_street']; ?>
        </p>
        <p class="font-light">Як проїхати &rarr;</p>
    </div>