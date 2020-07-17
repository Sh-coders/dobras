<?php
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
?>