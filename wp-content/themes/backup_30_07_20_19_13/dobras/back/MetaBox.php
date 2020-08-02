<?php

class Meta_Box
{
    private $post_type = null;
    private $id_meta = null;
    private $name_meta = null;
    /*группы полей*/
    private $groups = null;
    /*массив мета элементов*/
    private $meta_array = null;
    private $file_name = null;
    private $title_group = null;

    public function __construct($args)
    {
        $data = $args;
        $this->id_meta = $data['id_meta'];
        $this->name_meta = $data['name_meta'];
        $this->post_type = $data['post_type'];
        $this->groups = $data['groups'];
        $this->meta_array = $data['meta_array'];
        if (isset($data['file_name']) && $data['file_name'] !== '') {
            $this->file_name = $data['file_name'];
        }
        if( isset( $data['title_group'] ) && $data['title_group'] !== '' ){
            $this->title_group = $data['title_group'] ;
        }
        add_action('add_meta_boxes', array($this, 'add_meta_box'));
        add_action('save_post', array($this, 'save_meta_box'));
    }

    ## Добавляет матабоксы
    public function add_meta_box()
    {
        global $post;
        if (!is_null($this->file_name)) {
            if ($this->file_name ===
                get_post_meta($post->ID, '_wp_page_template', true)) {
                add_meta_box($this->id_meta,
                    $this->name_meta, array($this, 'render_meta_box'), $this->post_type,
                    'advanced', 'high');
            }
        } else {
            add_meta_box($this->id_meta,
                $this->name_meta, array($this, 'render_meta_box'), $this->post_type,
                'advanced', 'high');
        }
    }

    ## обрабатываем элемент перед сохранением
    private function processElement($meta)
    {
        $item = $_POST[$meta];
        $item = array_map('sanitize_text_field', $item);
        return array_filter( $item);
    }

    ## проверяем мета элемент
    private function checkMeta($array)
    {
        foreach ($array as $elem) {
            if (!isset($_POST[$elem])) {
                return false;
            }
        }

        return true;
    }

    ## Очищает и сохраняет значения полей
    public function save_meta_box($post_id)
    {
        if (wp_is_post_autosave($post_id))
            return;

        if (wp_is_post_revision($post_id))
            return;

        if (!current_user_can('edit_post', $post_id))
            return;

        foreach ($this->groups as $meta_array) {
            if ($item = $this->checkMeta($meta_array)) {
                foreach ($meta_array as $meta) {
                    $item = $this->processElement($meta);
                    if ($item) {
                        update_post_meta($post_id, $meta, $item);
                    } else {
                        delete_post_meta($post_id, $meta);
                    }
                }
            }
        }
    }

    ## Отображает метабокс на странице редактирования поста
    public function render_meta_box($post)
    {
        wp_nonce_field($this->id_meta, $this->id_meta . '_wpnonce',
            false, true);
        ?>
        <div class="info">
            <?php
            foreach ($this->groups as $key => $group) {
                ?>
                <div class="list-<?php echo $key ?>">
                    <?php if( isset( $this->title_group ) ) : ?>
                        <h6>
                            <?php echo $this->title_group[$key] ?>
                        </h6>
                    <?php endif; ?>
                    <?php

                    $max = 0;
                    $array = [];
                    $clone = false;
                    $delete = false;
                    $button = $this->create_add_button($key);
                    $input = '<div class="item-' . $key . '">';
                    $counter = 0;
                    $img_position = -1;

                    foreach ($group as $elem) {

                        $meta = $this->meta_array[$elem];

                        $delete = $this->check_delete($delete, $meta);

                        $clone = $this->check_clone($clone, $meta);

                        $array[] = get_post_meta($post->ID, $elem, true);

                        $max = $this->find_max_length($max, $array);

                        $input = $this->createItem($input, $meta, $elem);

                        $input = $this->add_custom_button($input, $meta);

                        if ($meta['input'] === 'img') {

                            $img_position = $counter;
                            $input .= '<div class="image-preview"><img src=""></div>';

                        } else {
                            $counter++;
                        }

                    }

                    $input = $this->add_button_delete($input, $delete, $key);

                    $input .= '</div>';

                    $this->fill_in_items($max, $array, $clone, $input, $button, $meta, $img_position);

                    ?> </div> <?php
            }
            ?>
        </div>
        <?php
    }

    ## создаем кнопку добавления элемента
    private function create_add_button($key)
    {
        return '<div>
                     <button class="add-info button button-primary" type="button" 
                             data-target="item-' . $key . '"
                             data-list="list-' . $key . '">
                             Додати пункт
                     </button>
                </div>';
    }

    ## проверка элемента надо ли его клонировать
    private function check_clone($clone, $meta)
    {
        if (isset($meta['clone'])) {
            $clone = $meta['clone'];
        }

        return $clone;
    }

    ## будет ли элемент удалятся
    private function check_delete($delete, $meta)
    {
        if (isset($meta['delete'])) {
            $delete = $meta['delete'];
        }

        return $delete;
    }

    private function find_max_length($max, $array)
    {
        if (is_array($array[count($array) - 1]) &&
            count($array[count($array) - 1]) > $max) {
            $max = count($array[count($array) - 1]);

        } else if (1 > $max) {
            $max = 1;
        }

        return $max;
    }

    ## заполняем элементы
    private function fill_in_items($max, $array, $clone, $input, $button, $meta, $img_position)
    {

        for ($i = 0; $i < $max; $i++) {
            $values = [];

            foreach ($array as $value) {
                $values[] = isset($value[$i]) ? esc_attr($value[$i]) : '';
            }

            if ($meta['input'] === 'img') {
                $resolution = isset($meta['size']) ? $meta['size'] : 'thumbnail';
                $image_prev = null;

                if ($img_position === -1 && count($array[0]) === 1) {
                    $image_prev = wp_get_attachment_image_src($array[0][0], $resolution);

                } else {
                    $image_prev = wp_get_attachment_image_src($array[$img_position][$i], $resolution);
                }

                if ($image_prev) {
                    echo "<div class='image-preview'>" . "<img src='$image_prev[0]'></div>";
                }
            }

            printf($i + 1 == $max && $clone ? $input . $button :
                $input, ...$values);
        }
    }

    ## создаем кнупку удаления элемента
    private function create_button_delete($key)
    {
        return '<button type="button" class="button remove-info"
                        data-target="item-' . $key . '">
                        Видалити
                </button>';
    }

    ## добавляем кнупку в элемент
    private function add_button_delete($input, $fDelete, $key)
    {
        if ($fDelete) {
            $input .= $this->create_button_delete($key);
        }

        return $input;
    }

    ## добавляем кастомною кнопку
    private function add_custom_button($input, $meta)
    {
        if (isset($meta['button'])) {
            $btn = $meta['button'];
            $input .= $this->create_custom_button($btn);
        }

        return $input;
    }

    ## создаем кастомною кнопку
    private function create_custom_button($btn)
    {
        $class_btn = isset($btn['class']) ? $btn['class'] : '';
        $title_btn = isset($btn['title']) ? $btn['title'] : '';

        return '<button type="button" class="' . $class_btn . '">
                                           ' . $title_btn . '
                </button>';
    }

    ## создаем лейблу элементу
    private function createLabel($meta, $id, $input)
    {
        $label = isset($meta['label']) ? $meta['label'] : true;
        $title = isset($meta['title']) ? $meta['title'] : '';

        if ($label) {
            $input .= '<label class="label" for="' . $id . '">' . $title . '</label>';
        }

        return $input;
    }

    private function createHidden($meta, $input, $elem)
    {
        $hidden = isset($meta['hidden']) ? $meta['hidden'] : false;
        $class_hidden = isset($meta['class_hidden']) ? $meta['class_hidden'] : '';
        $id_hidden = isset($meta['id_hidden']) ? $meta['id_hidden'] : '';

        if ($hidden) {
            $input .= '<input type="hidden" name="' . $elem . '[]"
             id="' . $id_hidden . '" class=' . $class_hidden . ' value="0">';
        }

        return $input;
    }

    ## Создаем элемент
    private function createItem($input, $meta, $elem)
    {
        global $post;
        $class = isset($meta['class']) ? $meta['class'] : '';
        $type = isset($meta['input']) ? $meta['input'] : 'text';
        $id = isset($meta['id']) ? $meta['id'] : '';
        $parameter = isset($meta['parameter']) ? $meta['name_parameter'] : '';
        $required = isset($meta['required']) && $meta['required'] ? 'required' : '';
        $placeholder = isset($meta['placeholder']) ? $meta['placeholder'] : '';
        $size = isset($meta['size']) ? $meta['size'] : '';
        $maxlength = isset($meta['maxlength']) ? $meta['maxlength'] : '';
        $min = isset($meta['min']) ? $meta['min'] : '';
        $max = isset($meta['max']) ? $meta['max'] : '';
        $checked = isset($meta['parameter']) ?
            checked(get_post_meta($post->ID, $parameter, 1)) : '';
        $value = !isset($meta['parameter']) ? 'value="%s"' : 'value="1"';
        $input = $this->createHidden($meta, $input, $elem);
        $input = $this->createLabel($meta, $id, $input);

        $input .= '<input min="' . $min . '" max="' . $max . '" placeholder="' . $placeholder . '" id="' . $id . '" type="' . $type . '" 
         name="' . $elem . '[]"' . $value . ' size="' . $size . '"  maxlength="' . $maxlength . '" 
         class="' . $class . '" ' . $required . ' ' . $checked . '>';

        return $input;
    }
}

?>