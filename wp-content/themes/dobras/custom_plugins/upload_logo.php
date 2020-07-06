<?php
function my_admin_menu () {
    $page_title = 'Изменить логотип';
    $menu_title = 'Изменить логотип';
    $capability = 'edit_posts';
    $menu_slug = 'theme_options_page';
    $function = 'my_theme_settings_page';
    $icon = 'dashicons-format-image';
    $position = 110;

    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon, $position );
}

add_action('admin_menu', 'my_admin_menu');

function my_theme_settings_page(){
    /*** New section ***/

    ?>
    <form method="post" enctype='multipart/form-data' action='options.php'>
        <?php settings_fields("ff_theme_options");?>
        <?php do_settings_sections('theme_options')?>
        <?php submit_button();?>
    </form>

    <?php
}

/*** Options fields ***/

add_action('admin_init','ff_custom_setting');
function ff_custom_setting(){
    register_setting("ff_theme_options", "logo", "handle_logo_upload");
    add_settings_section('ff_theme_options','Загрузить новый логотип сайта', null, 'theme_options');
        add_settings_field('logo','Website Logo','logo_display', 'theme_options','ff_theme_options');
}

function ff_theme_options(){
    echo 'Add your theme options';
}

function logo_display()
{
    ?>
    <input type="file" name="logo" />
    <?php echo get_option('logo'); ?>
    <?php
}


function handle_logo_upload($option)
{
    if(!empty($_FILES["logo"]["tmp_name"]))
    {
        $urls = wp_handle_upload($_FILES["logo"], array('test_form' => FALSE));
        $temp = $urls["url"];
        print_r($temp);
        return $temp;
    }

    return $option;
}
