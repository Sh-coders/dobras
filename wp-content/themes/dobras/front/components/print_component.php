<?php
    /*выводимм миниатюру*/
    function print_thumbnail(){
         ?> <div class="img-news">
                <?php if ( has_post_thumbnail()) { ?>
                       <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" >
                           <?php the_post_thumbnail(); ?>
                       </a>
                <?php } ?>
            </div><?php
    }
    /*выводим основные компоненты контента*/
    function print_text(){
        ?>
        <p class="excerpt">
            <?php the_excerpt_max_char_length(80); ?>
        </p>
        <time class="date">
            <?php the_time('j F Y'); ?>
        </time><?php
    }

    /*выводим прогресс бар*/
    function print_progress_bar( $percent, $post_id ){
            ?>
        <div class="progress-bar"
             data-percent="<?php echo $percent ?>" id="<?php echo $post_id ?>">
            <div class="background"></div>
            <div class="rotate"></div>
            <div class="left"></div>
            <div class="right"></div>
            <div class="percent">
                <span></span>
            </div>
        </div><?php
    }
    /*выводим сатьи на странице проекта*/
    function print_blog( $name_blog, $date_blog, $link_blog ){
      ?>
        <?php if( is_array($date_blog) ) : for($i = 0; $i < count($date_blog); $i++ ) { ?>
            <div>
                <time class="date">
                    <?php echo date('d.m.Y', strtotime($date_blog[$i]))?>
                </time>
                <h4>
                    <a href="<?php echo isset( $link_blog[$i] ) ? $link_blog[$i] : '#'; ?>">
                        <?php echo isset( $name_blog[$i] ) ? $name_blog : 'name' ?>
                    </a>
                </h4>
            </div>
        <?php } ?>
        <?php endif; ?>
    <?php
    }
    /*выводим донаты на странице проекта*/
    function print_donors( $date_donors, $link_donors, $name_donors, $amount ){
        ?>
        <?php if( is_array($date_donors) ) : for($i = 0; $i < count($date_donors); $i++ ) { ?>
            <div>
                <div>
                    <time class="date">
                        <?php echo date('d.m.Y', strtotime($date_donors[$i]))?>
                    </time>
                    <h4>
                        <a href="<?php echo isset( $link_donors[$i] ) ? $link_donors[$i] : '#' ?>">
                            <?php echo  isset( $name_donors[$i] ) ? $name_donors[$i] : 'name' ;?>
                        </a>
                    </h4>
                </div>
                <span class="donors-money">
                                        +<?php echo isset( $amount ) ? number_format( $amount[$i], 2,
                        '.', ' ' ) : '0';
                    ?> грн
                                    </span>
            </div>
        <?php } ?>
        <?php endif; ?>
        <?php
    }

    /*выводим документы на странице проекта*/
    function print_documents($documents_link, $documents_name){
        ?>
        <?php if( is_array($documents_link) ) : for( $i = 0; $i < count($documents_link); $i++ ) { ?>
            <div>
                <h4>
                    <?php echo isset( $documents_name[$i] ) ? $documents_name[$i] : 'name' ?>
                </h4>
                <a href="<?php echo $documents_link[$i] ?>">
                    Переглянути
                </a>
            </div>
        <?php } ?>
        <?php endif; ?>
        <?php
    }
?>