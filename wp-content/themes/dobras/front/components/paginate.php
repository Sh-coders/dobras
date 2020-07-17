<?php
    function paginate($max_num_pages, $current_page, $link) {
        echo paginate_links( array(
            'base' => $link . '%_%',
            'format' => '?page=%#%',
            'total' => $max_num_pages,
            'current' => $current_page,
            'prev_next' => true,
            'prev_text'    => '&lsaquo;',
            'next_text'    => '&rsaquo;',
            'mid_size' => '1',
        ) );

    }
?>