<?php

class Meta_Box
{
    private $post_type = null;
    private $id_meta = null;
    private $name_meta = null;
    /*группы полей*/
    private $groups = null;
    private $script = null;
    private $style = null;
    /*массив мета элементов*/
    private $meta_array = null;

    public function __construct($args) {
        $data = $args;
        $this->id_meta = $data['id_meta'];
        $this->name_meta = $data['name_meta'];
        $this->post_type = $data['post_type'];
        $this->groups = $data['groups'];
        $this->script = $data['script'];
        $this->style = $data['style'];
        $this->meta_array = $data['meta_array'];

        add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
        add_action( 'save_post', array( $this, 'save_meta_box' ) );
        add_action( 'admin_print_footer_scripts', array( $this, 'show_assets' ));
    }

    ## Добавляет матабоксы
    public function add_meta_box() {
        add_meta_box( $this->id_meta,
            $this->name_meta, array( $this, 'render_meta_box'), $this->post_type,
            'advanced', 'high' );
    }

    ## обрабатываем элемент перед сохранением
    private function processElement( $meta ){
        $item = $_POST[$meta];
        $item = array_map('sanitize_text_field', $item );
        return array_filter( $item );
    }

    ## проверяем мета элемент
    private function checkMeta( $array ) {
        foreach ( $array as $elem ) {
            if( !isset( $_POST[$elem] ) ){
                return false;
            }
        }

        return true;
    }

    ## Очищает и сохраняет значения полей
    public function save_meta_box( $post_id ) {

        if ( wp_is_post_autosave( $post_id ) )
            return;

        foreach( $this->groups as $meta_array ){
            if( $item = $this->checkMeta( $meta_array ) ){
                foreach ( $meta_array as $meta ) {
                    $item = $this->processElement( $meta );
                    if( $item ){
                        update_post_meta( $post_id, $meta, $item );
                    } else {
                        delete_post_meta( $post_id, $meta );
                    }
                }
            }
        }
    }

    ## Отображает метабокс на странице редактирования поста
    function render_meta_box( $post ) {
        ?>
        <div class="info">
                <?php
                foreach ( $this->groups as $key => $group ) {
                    ?><div class="list-<?php echo $key ?>"><?php
                    $max = 0;
                    $array = [];
                    $clone = false;
                    $delete = false;

                    $button = $this->create_add_button( $key );

                    $input = '<div class="item-'.$key.'">';

                    foreach( $group as $elem ) {
                        $meta = $this->meta_array[$elem];

                        $delete = $this->check_delete( $delete, $meta );

                        $clone = $this->check_clone( $clone, $meta );

                        $array[] = get_post_meta( $post->ID, $elem, true );

                        $max = $this->find_max_length( $max, $array );

                        $input = $this->createItem( $input, $meta, $elem );

                        $input = $this->add_custom_button( $input, $meta );
                    }
                    $input = $this->add_button_delete( $input, $delete, $key );

                    $input .= '</div>';

                    $this->fill_in_items( $max, $array, $clone, $input, $button );

                   ?> </div> <?php
                }
                ?>
        </div>
        <?php
    }

    ## создаем кнопку добавления элемента
    private function create_add_button( $key ) {
        return '<div>
                     <button class="add-info button button-primary" type="button" 
                             data-target="item-'.$key.'"
                             data-list="list-'.$key.'">
                             Добавить Пункт
                     </button>
                </div>';
    }

    ## проверка элемента надо ли его клонировать
    private function check_clone( $clone, $meta ) {
        if( isset( $meta['clone'] ) ) {
            $clone = $meta['clone'];
        }

        return $clone;
    }

    ## будет ли элемент удалятся
    private function check_delete( $delete, $meta ) {
        if( isset( $meta['delete'] ) ){
            $delete = $meta['delete'];
        }

        return $delete;
    }

    private function find_max_length( $max, $array ){
        if( is_array($array[count($array) - 1]) &&
            count($array[count($array) - 1]) > $max){
            $max = count($array[count($array) - 1]);
        } else if ( 1 > $max){
            $max = 1;
        }

        return $max;
    }

    ## заполняем элементы
    private function fill_in_items( $max, $array, $clone, $input, $button ){
        for( $i = 0; $i < $max; $i++ ) {
            $values = [];
            foreach ( $array as $value ) {
                $values[] = isset( $value[$i] ) ? esc_attr( $value[$i] ) : '';
            }
            printf($i + 1 == $max && $clone ? $input . $button :
                $input , ...$values);
        }
    }

    ## создаем кнупку удаления элемента
    private function create_button_delete( $key ){
        return '<button type="button" class="button remove-info"
                        data-target="item-' . $key . '">
                        Удалить
                </button>';
    }

    ## добавляем кнупку в элемент
    private function add_button_delete( $input, $fDelete, $key ) {
        if( $fDelete )  {
            $input .= $this->create_button_delete( $key );
        }

        return $input;
    }

    ## добавляем кастомною кнопку
    private function add_custom_button( $input, $meta ) {
        if( isset( $meta['button'] ) ){
            $btn = $meta['button'];
            $input .= $this->create_custom_button( $btn );
        }

        return $input;
    }

    ## создаем кастомною кнопку
    private function create_custom_button( $btn ){
        $class_btn = isset( $btn['class'] )? $btn['class'] : '';
        $title_btn =  isset( $btn['title'] )? $btn['title'] : '';

        return '<button type="button" class="'.$class_btn.'">
                                           '.$title_btn.'
                </button>';
    }

    ## создаем лейблу элементу
    private function createLabel( $meta, $id, $input ){
        $label = isset( $meta['label'] ) ? $meta['label'] : true;
        $title = isset( $meta['title'] ) ? $meta['title'] : '';

        if( $label ){
            $input .= '<label class="label" for="'.$id.'">'.$title.'</label>';
        }

        return $input;
    }

    ## Создаем элемент
    private function createItem( $input, $meta, $elem ){
        $class = isset( $meta['class'] ) ? $meta['class'] : '';
        $type =  isset( $meta['input'] ) ? $meta['input'] : 'text';
        $id = isset( $meta['id'] ) ? $meta['id'] : '';
        $required = isset( $meta['required'] ) && $meta['required'] ? 'required' : '';
        $input = $this->createLabel( $meta, $id, $input );

        $input .= '<input id="'.$id.'" type="'.$type.'" name="'.$elem.'[]" value="%s" class="'.$class.'" '.$required.'>';

        return $input;
    }

    ## Подключает скрипты и стили
    public function show_assets() {
        if ( is_admin() && get_current_screen()->id == $this->post_type ) {
            $this->show_scripts();
            $this->show_styles();
        }
    }

    ## Выводит на экран JS
    public function show_scripts() {
        ?>
        <script>
            <?php if( $this->script !== null ) : ?>
                <?php if( is_array($this->script) ) : foreach($this->script as $item ) : ?>
                    <?php include get_stylesheet_directory() . '/js/' . $item . '.js'; ?>
                <?php endforeach; else:  ?>
                    <?php include get_stylesheet_directory() . '/js/' . $this->script . '.js'; ?>
                <?php endif;  ?>
            <?php endif;  ?>
        </script>
        <?php
    }

    ## Подключаем стили
    public function show_styles()
    {
        if( $this->style ){
        ?>
        <style>
            <?php if( $this->script !== null ) : ?>
                <?php if( is_array($this->script) ) : foreach($this->style as $item ) : ?>
                    <?php include get_stylesheet_directory().'/css/'. $item .'.css'; ?>
                <?php endforeach; else: ?>
                <?php include get_stylesheet_directory().'/css/'. $this->style .'.css'; ?>
                <?php endif;  ?>
            <?php endif;  ?>
        </style>
        <?php
        }
    }
}
?>