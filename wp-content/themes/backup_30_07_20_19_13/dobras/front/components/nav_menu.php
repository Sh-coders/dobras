<?php
/*создаем меню*/
function theme_register_nav_menu() {
    register_nav_menu( 'main_nav_menu', 'Main menu');
}
add_action( 'after_setup_theme', 'theme_register_nav_menu' );
?>
