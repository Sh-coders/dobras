<?php
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