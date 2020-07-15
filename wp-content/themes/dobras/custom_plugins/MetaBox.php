<?php

class Meta_Box
{
    private $post_type = null;
    private $id_meta = null;
    private $name_meta = null;
    private $groups = null;
    private $script = null;
    private $style = null;
    private $meta_array = null;

    public function __construct($args) {
        $data = $args;
        $this->id_meta =  $data['id_meta'];
        $this->name_meta =  $data['name_meta'];
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

    private function checkMeta( $array ) {
        foreach ( $array as $elem ) {
            if( !isset( $_POST[$elem] )){
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
            if( $this->checkMeta( $meta_array ) ){
                foreach ( $meta_array as $meta ) {
                    $item = $_POST[$meta];
                    $item = array_map('sanitize_text_field', $item );
                    $item = array_filter( $item );;
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
                    $clone = true;
                    $button = '
                            <div>
                                <button class="add-info button button-primary" type="button" 
                                data-target="item-'.$key.'"
                                data-list="list-'.$key.'">
                                    Добавить Пункт
                                </button>
                            </div>';
                    $input = '
                    <div class="item-'.$key.'">';
                    foreach( $group as $elem ){
                        $meta = $this->meta_array[$elem];
                        $clone = $meta['clone'];
                        $array[] = get_post_meta($post->ID, $elem, true);
                        if( is_array($array[count($array) - 1]) &&
                            count($array[count($array) - 1]) > $max){
                            $max = count($array[count($array) - 1]);
                        } else if ( 1 > $max){
                            $max = 1;
                        }
                        $input .= '<label class="label">
					        '.$meta['title'].'
						    <input type="'.$meta['input'].'" name="'.$elem.'[]" value="%s">
						</label>
						';
                    }
                    $input .= '<button type="button" class="button remove-info"
                            data-target="item-'.$key.'">
                            Удалить
                            </button>
					</div>';
                    for( $i = 0; $i < $max; $i++ ) {
                        $values = [];
                        foreach ( $array as $value ) {
                            $values[] = isset( $value ) ?
                                esc_attr( is_array($value) ? $value[$i] : $value )
                                : '';
                        }
                        printf($i == 0 && $clone ? $button . $input : $input , ...$values);
                    }
                   ?> </div> <?php
                }
                ?>
        </div>
        <?php
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
            <?php include get_stylesheet_directory().'/js/'.$this->script.'.js'; ?>
        </script>
        <?php
    }

    public function show_styles()
    {
        if( $this->style ){
        ?>
        <style>
            <?php include get_stylesheet_directory().'/css/'.$this->style.'.css'; ?>
        </style>
        <?php
        }
    }
}