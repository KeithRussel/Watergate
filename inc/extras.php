<?php

// Actions that we need to hook in to.

add_image_size( 'carousel-slider', 1300, 620, true );
add_image_size( 'footer-logo', 89, 100, true );
add_image_size( 'banner', 1300, 480, true );
add_image_size( 'room-slider', 540, 325, true );
add_image_size( 'news-image', 350, 315, true );
add_image_size( 'defpageImg', 460, 355, true );
add_image_size( 'defgalleryFt', 350, 215, true );
add_image_size( 'cater', 360, 195, true );
add_image_size('og-image', 1200, 630, true); 
add_image_size('testimonial-image', 100, 100, true);

// Action to limit excerpt length
function the_new_excerpt($limit = 12, $endstring = '...') {
    $content = get_the_excerpt();
    $content = explode(' ', $content, $limit);

    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content) . $endstring;
    } else {
        $content = implode(" ",$content);
    } 
    //$content = apply_filters('the_content', $content);
    $content = preg_replace('/^\s+|\n|\r|\s+$/m', ' ', $content);
    $content = preg_replace('/\[.+\]/','', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    echo $content;
}

// Add support for Page excerpt
add_post_type_support( 'page', 'excerpt' );


// This Gives us some options for styling the admin area. 
    function custom_size() {
       echo '<style type="text/css">
               .wp-menu-name { font-size: 12px; }
               #adminmenu .wp-submenu a{ font-size: 11px; }
             </style>';
    }
    add_action('admin_head', 'custom_size');
