<!doctype html>
<html lang="uk">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo wp_get_document_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body>

<div class="wrapper">
    <header class="header">
        <nav class="nav container">
            <div class="logo">
                <a href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo get_option('logo');?>" alt="company_logo">
                </a>
            </div>
            <?php wp_nav_menu([
                'theme_location' => 'main_nav_menu',
                'container' => 'div',
                'container_class' => 'menu',
                'container_id' => 'menu_id',
                'menu_class' => 'menu-list',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            ]); ?>
        </nav>
    </header>

