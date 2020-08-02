<?php
/*выводим донаты на странице проекта*/

function print_donors( $date_donors, $name_donors, $amount, $projects_money_name ){
    global $theme_all_options;
    $projects_empty_donors = $theme_all_options['projects_empty_donors'];
    ?>
    <?php if( is_array( $date_donors ) &&
        is_array( $name_donors ) &&
        is_array( $amount ) ) :
        foreach( $date_donors as $key => $date ) { ?>
        <div>
            <div>
                <time class="date">
                    <?php if(isset( $date ))
                    { echo date('d.m.Y', strtotime($date)); }?>
                </time>
                <h4>
                    <a>
                        <?php if (isset( $name_donors[$key] ) && $name_donors[$key] !== '')
                        { echo $name_donors[$key]; }?>
                    </a>
                </h4>
            </div>
            <span class="donors-money">
                <?php if( isset( $amount[$key] ) && $amount[$key] !== '' )
                    {    echo '+';
                         echo number_format( $amount[$key], 2, '.', ' ' );
                         echo $projects_money_name;
                    };
                ?>
            </span>
        </div>
    <?php } ?>
    <?php else :
        echo '<div class="error-wrp">
                <p class="error">'.$projects_empty_donors.'</p>
            </div>';
        ?>
    <?php endif; ?>
    <?php
}
?>