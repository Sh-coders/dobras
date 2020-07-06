<?php
$options_page = 'theme-options.php';

/*
 * Функция, добавляющая страницу в пункт меню Настройки
 */
function theme_options()
{
    global $options_page;
    add_options_page('Параметры темы', 'Параметры темы', 'manage_options',
        $options_page, 'theme_options_page');
}

add_action('admin_menu', 'theme_options');


/**
 * Возвратная функция (Callback)
 */
function theme_options_page()
{
    global $options_page;
    ?>
    <div class="wrap">
    <h2>Дополнительные параметры шаблона</h2>
    <form method="post" enctype="multipart/form-data" action="options.php">
        <?php
        settings_fields('theme_options');
        do_settings_sections($option_page);
        ?>
        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>"/>
        </p>
    </form>
    </div><?php
}

/*
 * Регистрируем настройки
 * Мои настройки будут храниться в базе под названием theme_options (это также видно в предыдущей функции)
 */
function theme_option_settings()
{
    global $options_page;
    register_setting('theme_options', 'theme_options', 'theme_validate_settings');

    add_settings_section('theme_section_1', 'Данные о компании', '', $options_page);

    $theme_field_params = array(
        'id' => 'company_footer_fields_title',
        'type' => 'input',
        'placeholder' => 'Введите название блока контактов',
        'desc' => 'По умолчанию - Контакти'
    );

    add_settings_field('footer_fields_title',
        'Название для блока контактов на сайте', 'theme_option_display_settings',
        $options_page, 'theme_section_1', $theme_field_params);

    $theme_field_params = array(
        'id' => 'company_footer_phone1',
        'type' => 'input',
        'placeholder' => 'Введите номер телефона',
        'desc' => 'Пример +38 123 45 67'
    );

    add_settings_field('footer_phone1',
        'Номер телефона для блока контактов на сайте', 'theme_option_display_settings',
        $options_page, 'theme_section_1', $theme_field_params);

    $theme_field_params = array(
        'id' => 'company_footer_phone2',
        'type' => 'input',
        'placeholder' => 'Введите номер телефона',
        'desc' => 'Пример +38 123 45 67'
    );

    add_settings_field('footer_phone2',
        'Номер телефона для блока контактов на сайте', 'theme_option_display_settings',
        $options_page, 'theme_section_1', $theme_field_params);

    $theme_field_params = array(
        'id' => 'company_footer_phone3',
        'type' => 'input',
        'placeholder' => 'Введите номер телефона',
        'desc' => 'Пример +38 123 45 67'
    );

    add_settings_field('footer_phone3',
        'Номер телефона для блока контактов на сайте', 'theme_option_display_settings',
        $options_page, 'theme_section_1', $theme_field_params);

    $theme_field_params = array(
        'id' => 'company_country_town',
        'type' => 'input',
        'placeholder' => '76000, Україна, Івано-Франківськ',
        'desc' => 'Введите номер индекса, название страны, название города'
    );

    add_settings_field('footer_index_country_town',
        'Почтовый индекс, страна, город', 'theme_option_display_settings',
        $options_page, 'theme_section_1', $theme_field_params);

    $theme_field_params = array(
        'id' => 'company_street',
        'type' => 'input',
        'placeholder' => 'вул. Дністровська 49',
        'desc' => 'Введите название улицы и номер дома'
    );

    add_settings_field('footer_street',
        'Улица, номер дома', 'theme_option_display_settings',
        $options_page, 'theme_section_1', $theme_field_params);

    add_settings_section('theme_section_2', 'График работы', '', $options_page);

    //for monday
    $theme_field_params = array(
        'id' => 'company_schedule_monday_start',
        'type' => 'select',
        'desc' => 'от'
    );

    add_settings_field('schedule_monday_start',
        'Понедельник', 'theme_option_display_settings',
        $options_page, 'theme_section_2', $theme_field_params);

    $theme_field_params = array(
        'id' => 'company_schedule_monday_finish',
        'type' => 'select',
        'desc' => 'до'
    );

    add_settings_field('schedule_monday_finish',
        '', 'theme_option_display_settings',
        $options_page, 'theme_section_2', $theme_field_params);

    //for tuesday
    $theme_field_params = array(
        'id' => 'company_schedule_tuesday_start',
        'type' => 'select',
        'desc' => 'от'
    );

    add_settings_field('schedule_tuesday_start',
        'Вторник', 'theme_option_display_settings',
        $options_page, 'theme_section_2', $theme_field_params);

    $theme_field_params = array(
        'id' => 'company_schedule_tuesday_finish',
        'type' => 'select',
        'desc' => 'до'
    );

    add_settings_field('schedule_tuesday_finish',
        '', 'theme_option_display_settings',
        $options_page, 'theme_section_2', $theme_field_params);

    //for wednesday
    $theme_field_params = array(
        'id' => 'company_schedule_wednesday_start',
        'type' => 'select',
        'desc' => 'от'
    );

    add_settings_field('schedule_wednesday_start',
        'Среда', 'theme_option_display_settings',
        $options_page, 'theme_section_2', $theme_field_params);

    $theme_field_params = array(
        'id' => 'company_schedule_wednesday_finish',
        'type' => 'select',
        'desc' => 'до'
    );

    add_settings_field('schedule_wednesday_finish',
        '', 'theme_option_display_settings',
        $options_page, 'theme_section_2', $theme_field_params);

    //for thursday
    $theme_field_params = array(
        'id' => 'company_schedule_thursday_start',
        'type' => 'select',
        'desc' => 'от'
    );

    add_settings_field('schedule_thursday_start',
        'Четверг', 'theme_option_display_settings',
        $options_page, 'theme_section_2', $theme_field_params);

    $theme_field_params = array(
        'id' => 'company_schedule_thursday_finish',
        'type' => 'select',
        'desc' => 'до'
    );

    add_settings_field('schedule_thursday_finish',
        '', 'theme_option_display_settings',
        $options_page, 'theme_section_2', $theme_field_params);

    //for friday
    $theme_field_params = array(
        'id' => 'company_schedule_friday_start',
        'type' => 'select',
        'desc' => 'от'
    );

    add_settings_field('schedule_friday_start',
        'Пятница', 'theme_option_display_settings',
        $options_page, 'theme_section_2', $theme_field_params);

    $theme_field_params = array(
        'id' => 'company_schedule_friday_finish',
        'type' => 'select',
        'desc' => 'до'
    );

    add_settings_field('schedule_friday_finish',
        '', 'theme_option_display_settings',
        $options_page, 'theme_section_2', $theme_field_params);

    //for saturday
    $theme_field_params = array(
        'id' => 'company_schedule_saturday_start',
        'type' => 'select',
        'desc' => 'от'
    );

    add_settings_field('schedule_saturday_start',
        'Суббота', 'theme_option_display_settings',
        $options_page, 'theme_section_2', $theme_field_params);

    $theme_field_params = array(
        'id' => 'company_schedule_saturday_finish',
        'type' => 'select',
        'desc' => 'до'
    );

    add_settings_field('schedule_saturday_finish',
        '', 'theme_option_display_settings',
        $options_page, 'theme_section_2', $theme_field_params);

    //for sunday
    $theme_field_params = array(
        'id' => 'company_schedule_sunday_start',
        'type' => 'select',
        'desc' => 'от'
    );

    add_settings_field('schedule_sunday_start',
        'Воскресенье', 'theme_option_display_settings',
        $options_page, 'theme_section_2', $theme_field_params);

    $theme_field_params = array(
        'id' => 'company_schedule_sunday_finish',
        'type' => 'select',
        'desc' => 'до'
    );

    add_settings_field('schedule_sunday_finish',
        '', 'theme_option_display_settings',
        $options_page, 'theme_section_2', $theme_field_params);
}


add_action('admin_init', 'theme_option_settings');

/*
 * Функция отображения полей ввода
 * Здесь задаётся HTML и PHP, выводящий поля
 */
function theme_option_display_settings($args)
{
    extract($args);
    $option_name = 'theme_options';
    $o = get_option($option_name);
    $o[$id] = esc_attr(stripslashes($o[$id]));
    $value = $o[$id];
    switch ($type) {
        case 'input':
            echo "<input class='code large-text' type='text'  placeholder='$placeholder' value='$value'
            id='$id' name='" . $option_name . "[$id]' value='' />";
            echo ($desc != '') ? "<br /><span style='margin-left: 2%' class='description'>$desc</span>" : "";
            break;

        case 'select':
            echo "<input type='time' value='$value' id='$id' name='" . $option_name . "[$id]' />";
            echo ($desc != '') ? "<br /><span style='margin-left: 2%' class='description'>$desc</span>" : "";
            break;
    }
}


/*
 * Функция проверки правильности вводимых полей
 */
function theme_validate_settings($input)
{
    foreach ($input as $k => $v) {
        $valid_input[$k] = trim($v);

        /* Вы можете включить в эту функцию различные проверки значений, например
        if(! задаем условие ) { // если не выполняется
            $valid_input[$k] = ''; // тогда присваиваем значению пустую строку
        }
        */
    }
    return $valid_input;
}
