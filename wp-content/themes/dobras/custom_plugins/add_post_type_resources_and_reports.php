<?php
function register_types_res_rep() {
    $labels = array(
        'name'               => _x( 'Ресурсы и Отчеты', 'post type general name' ),
        'singular_name'      => _x( 'Ресурс/Отчет', 'post type singular name' ),
        'add_new'            => _x( 'Добавить Ресурсы/Отчеты', 'resource_report' ),
        'add_new_item'       => __( 'Добавить Ресурсы/Отчеты'),
        'edit_item'          => __( 'Редактировать Ресурсы/Отчеты' ),
        'new_item'           => __( 'Новые Ресурсы/Отчеты' ),
        'all_items'          => __( 'Все Ресурсы и Отчеты' ),
        'view_item'          => __( 'Смотреть Ресурсы/Отчеты' ),
        'search_items'       => __( 'Искать Ресурсы/Отчеты' ),
        'not_found'          => __( 'Не найдено' ),
        'not_found_in_trash' => __( 'Не найдено в корзине' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Ресурсы и Отчеты'
    );

    $args = array(
        'labels'        => $labels,
        'description'   => 'Описываем ресур или отчет',
        'public'        => true,
        'menu_position' => 4,
        'menu_icon' => 'dashicons-book-alt',
        'supports'      => array( 'title'),
        'has_archive'   => true,
    );
    register_post_type( 'res_and_rep', $args);
}
add_action('init', 'register_types_res_rep');
add_action('add_meta_boxes', 'details_box');
function details_box(){
    add_meta_box( 'meta-box', 'Details', 'details_box_content', 'res_and_rep',
        'normal', 'high'
    );
}

function details_box_content( $post ){
    // Используем nonce для верификации
    wp_nonce_field(plugin_basename(__FILE__), 'details_box_content_nonce');
    // значение поля
    $name = get_post_meta( $post->ID, 'meta_key_name', 0 );
    $link = get_post_meta( $post->ID, 'meta_key_link', 0 );


    // Поля формы для введения данных
    echo '<div class="container" style="display: flex; justify-content: space-between">';
        echo '<div class="add-content" style="width: 30%; display: flex;
               flex-direction: column; border: 1px solid green; padding: 1%; margin: 1%;
               border-radius: 4px; align-self: flex-start">';
            echo '<label for="name" style="margin: 2% 0 .5% 2%; font-size: 20px">' . __("Название документа", 'text_do_main' ) . '</label> ';
            echo '<input style="margin: 0 2%; padding: .1% .6%; font-size: 18px" type="text" id="name" name="name" placeholder="Название файла" size="50" />';
            echo '<label for="link" style="margin: 0 0 .5% 2%; font-size: 20px">' . __("Ссылка на документ", 'text_do_main' ) . '</label> ';
            echo '<input style="margin: 0 2%; padding: .1% .6%; font-size: 18px" type="text" id="link" name="link" placeholder="https:" size="50" />';
            echo '<div>
                   <button id="save-post" style="color: black; margin: 2% 2% 0 2%; font-size: 18px; background-color: #00a0d2;" class="button">Сохранить</button>
                  </div>';
        echo '</div>';
        echo '<div class="content" style="width: 50%; display: flex;
               flex-direction: column; border: 1px solid green; padding: 1%; margin: 1%;
               border-radius: 4px; color: blue">';
                for ($i = 0; $i < count($name); $i++){
                    echo '<div style="display: flex; justify-content: space-between; width: 100%;
                            border-bottom: 1px solid black">';
                        echo '<p style="font-size: 20px">';
                            echo 'Name: '.$name[$i];
                        echo '</p>';
                        echo '<p style=" font-size: 20px;">';
                            echo 'Link: '.$link[$i];
                        echo '</p>';
                        echo '<button class="button remove-meta-btn" style="align-self: center" type="button"
                                data-link="'.$link[$i].'" data-name="'.$name[$i].'">Удалить</button>';
                    echo '</div>';
                }
        echo '</div>';
    echo '</div>';
    ?>
        <script>
            jQuery(document).ready(function($) {
                $('.remove-meta-btn').click(function () {
                    $.ajax({
                        type: 'POST',
                        url: ajaxurl,
                        data: 'action=delete' + '&l=' + $(this).data('link') + '&n=' + $(this).data('name'),
                        success: () => {
                            console.log('sdsdsdsd');
                        }
                    });
                });
             });
        </script>
    <?php
}
add_action( 'wp_ajax_delete', 'delete_post_data' );
add_action( 'wp_ajax_nopriv_delete', 'delete_post_data' );
## Удаляем данные
function delete_post_data( $post_id ) {
    $data_link = intval( $_POST['l'] );;
    $data_name = intval( $_POST['n'] );;
    // Обновляем данные в базе данных.
    delete_post_meta( $post_id, 'meta_key_link', $data_link );
    delete_post_meta( $post_id, 'meta_key_name', $data_name );
    wp_die();
}

## Сохраняем данные, когда пост сохраняется
add_action( 'save_post', 'save_post_data' );
function save_post_data( $post_id ) {
    // Убедимся что поле установлено.
    if ( ! isset( $_POST['link'] ) || ! isset( $_POST['name'] ))
        return;

    // проверяем nonce нашей страницы, потому что save_post может быть вызван с другого места.
    if ( ! wp_verify_nonce( $_POST['details_box_content_nonce'], plugin_basename(__FILE__) ) )
        return;

    // если это автосохранение ничего не делаем
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        return;

    // проверяем права юзера
    if( ! current_user_can( 'edit_post', $post_id ) )
        return;

    // Все ОК. Теперь, нужно найти и сохранить данные
    // Очищаем значение поля input.
    $data_link = sanitize_text_field( $_POST['link'] );
    $data_name = sanitize_text_field( $_POST['name'] );
    // Обновляем данные в базе данных.
    add_post_meta( $post_id, 'meta_key_link', $data_link);
    add_post_meta( $post_id, 'meta_key_name', $data_name);
}

