<?php
    /*выводим документы на странице проекта*/
    function print_documents( $documents_link, $documents_name, $projects_view_doc_text ){
       global $theme_all_options;
        $projects_empty_docs = $theme_all_options['projects_empty_docs'];
        ?>
        <?php if( is_array($documents_link)
            && is_array($documents_name) ) :
            foreach( $documents_name as $key => $name  ) { ?>
            <div>
                <h4>
                    <?php if(isset( $name ) && $name !== ''){
                        echo $name;  }?>
                </h4>

                <?php if( isset( $documents_link[$key] ) && $documents_link[$key] !== '') : ?>
                <a href="<?php echo $documents_link[$key] ?>">
                    <?php echo $projects_view_doc_text ?>
                </a>
                <?php endif; ?>
            </div>
        <?php } ?>
        <?php else :
            echo '<div class="error-wrp">
                <p class="error">'.$projects_empty_docs.'</p>
            </div>';
            ?>
        <?php endif; ?>
        <?php
    }
?>