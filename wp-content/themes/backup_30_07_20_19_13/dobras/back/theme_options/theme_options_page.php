<?php
// Инициирует создание формы, в которой будут накапливаться опциональные поля
function theme_options_page() {
    ?>
    <div class="wrap">
    <h2>Додаткові параметри теми</h2>
    <form method="post" enctype="multipart/form-data" action="options.php">
        <?php
        settings_fields('theme_options');
        do_settings_sections('');
        ?>
        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>"/>
        </p>
    </form>
    </div>
<?php }  ?>