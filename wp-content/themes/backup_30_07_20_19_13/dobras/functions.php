<?php
/*родключаем основные стили и скрипты*/
get_template_part('back/head');
/*создаемм хуки на стили и скрипты для раных шаблонов*/
get_template_part('back/custom_action');
/*подключаем стили и скрипты админки*/
get_template_part('back/add_scripts_and_style');

/*Создает новый мета-бокс*/
get_template_part('back/add_custom_meta_box');
/*Создаем свой вывод галереи*/
get_template_part('back/gallery_template');
/*подключаем класс метабоксов*/
get_template_part('back/MetaBox');
/*подключаем шабон русурсов и отчетов*/
get_template_part('back/documents/add_meta_box');
/*рендер поля чекбокс в админке для настройки показа на странице других постов*/
get_template_part('back/display_another_posts');
/*рендер поля чекбокс в админке для настройки показа на странице ленты допомоготи так легко */
get_template_part('back/display_additional_tape');
/*создаем метабоксы партнеров*/
get_template_part('back/partners/add_meta_box');
/*Настройки-> Параметры темы*/
get_template_part('back/theme_options/theme_options_main');
/*Метабаксы главной старници*/
get_template_part('back/main_page_options/add_meta_box');
/*создаем тип, шаблон и метабоксы проектов*/
get_template_part('back/projects/index');
/*подключаем вспомогательные функции*/
get_template_part('back/support');

/*подключаем шаблон tape*/
get_template_part('front/components/tape');
/*подключаем шаблон menu*/
get_template_part('front/components/nav_menu');
/*подключаем шаблон paginate*/
get_template_part('front/components/paginate');
/*подключаем табы Блог, Донаты, Длкументы*/
get_template_part('front/components/documents');
get_template_part('front/components/blog');
get_template_part('front/components/donors');
/*подключаем прогресс бар*/
get_template_part('front/components/progress_bar');
/*подключаем партнеров*/
get_template_part('front/components/partners_list');
/*подключаем миниатюры*/
get_template_part('front/components/thumbnail');
/*подключаем контент*/
get_template_part('front/components/content_block');
/*галерея из 4 картинок в админке главной страницы*/
get_template_part('back/main_page_options/add_gallery');
?>