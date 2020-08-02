<?php
    function paginate($max_num_pages, $current_page, $link, $pr) {
        if(intval($max_num_pages) === 1){
            return;
        }

        if( $current_page === 1 ){
            echo '<a class="prev page-numbers disabled">&lsaquo;</a> ';
        }
        echo paginate_links( array(
            'base' => $link . '%_%',
            'format' => '?'.$pr.'=%#%',
            'total' => $max_num_pages,
            'current' => $current_page,
            'prev_next' => true,
            'prev_text'    => '&lsaquo;',
            'next_text'    => '&rsaquo;',
            'mid_size' => '1',
        ) );

        if( intval($current_page) === intval($max_num_pages) ){
            echo ' <a class="next page-numbers disabled">&rsaquo;</a>';
        }
    }
?>