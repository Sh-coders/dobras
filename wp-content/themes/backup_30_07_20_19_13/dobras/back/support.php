<?php
    /*добавляем поддержку миниатюр в постах и страницах*/
    add_theme_support( 'post-thumbnails', array( 'post', 'projects', 'page' ));
    add_image_size( 'spec_home_page_thumbnail', 400, 232, false );
    add_image_size( 'home_image', 1483, 860, true);

    /*обрезаем текст на заданное количество символов*/
    function the_excerpt_max_char_length( $char_length ) {
        $excerpt = get_the_title();
        $char_length++;

        if ( mb_strlen( $excerpt ) > $char_length ){
            $excerpt = mb_substr( $excerpt, 0, $char_length );
        }

        echo $excerpt;
    }

    /*считаем донаты*/
    function calc_sum( $amount ) {
        $sum = 0;
        if( is_array($amount) ) {
            foreach ($amount as $item) {
                $sum += floatval( $item );
            }
        }

        return $sum;
    }

    /*считаем остаток*/
    function calc_balance( $amount, $desired_amount ) {
        $sum = calc_sum($amount);

        return floatval( $desired_amount[0] ) - $sum;
    }

    /*считаем готовый процент*/
    function calc_percent( $amount, $desired_amount ) {
        $sum = calc_sum($amount);
        return $sum * 100 / $desired_amount[0];
    }
?>