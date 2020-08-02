<?php
/*
 * Изменение вывода галереи через шоткод
 */

add_filter( 'post_gallery', 'template_gallery', 10, 2);
function template_gallery($output, $attr){
    global $post;
    get_post_gallery($post,false);
    $pictures = get_posts( array(
        'posts_per_page' => -1,
        'post__in' => $attr['ids'],
        'post_type' => 'post',
        'post_mime_type' => 'image',
        'orderby' => 'post__in',
    ) );
    $posts = get_posts(array('include' => $attr['ids'],'post_type' => 'attachment'));



    // Вывод
    $out = '<div class="gallery">
                <ul>';
    // Выводим каждую картинку из галереи
    foreach( $posts as $pic ){
        $src = $pic->guid;
        $out .= '
		        <a data-fancybox="gallery-1" href="'.wp_get_attachment_image_src( $src ).'">
			        <img class="lazy" data-src="'.wp_get_attachment_image_src( $src ).'" src="" alt="image"> 
			    </a>
             ';
    }
    $out .= '    </ul>
             </div>';
    return $out;
}
?>