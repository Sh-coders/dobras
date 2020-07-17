<?php
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
                                        +<?php echo isset( $amount[$i] ) ? number_format( $amount[$i], 2,
                    '.', ' ' ) : '0';
                ?> грн
                                    </span>
        </div>
    <?php } ?>
    <?php endif; ?>
    <?php
}
?>