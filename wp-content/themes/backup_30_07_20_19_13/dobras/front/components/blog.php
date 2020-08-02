<?php
/*выводим сатьи на странице проекта*/
function print_blog( $name_blog, $date_blog, $link_blog ){
    global $theme_all_options;
    $projects_empty_articles = $theme_all_options['projects_empty_articles'];
    ?>
    <?php if( is_array( $date_blog )
            && is_array( $link_blog )
            && is_array( $name_blog ) ) :
        foreach( $date_blog as $key => $date ) { ?>
        <div>
            <time class="date">
                <?php if( isset($date) )
                { echo date('d.m.Y', strtotime( $date )); }?>
            </time>

            <?php if( isset( $link_blog[$key] ) && $link_blog[$key] !== '') : ?>
            <h4>
                <a href="<?php echo $link_blog[$key]; ?>">
                    <?php  if( isset( $name_blog[$key] ) && $name_blog[$key] !== '' )
                        { echo $name_blog[$key]; }?>
                </a>
            </h4>
            <?php endif; ?>
        </div>
    <?php } ?>
    <?php else :
        echo '<div class="error-wrp">
                <p class="error">'.$projects_empty_articles.'</p>
            </div>';
        ?>
    <?php endif; ?>
    <?php
}
?>