<?php
 if (function_exists('add_theme_support')) { 
 	add_theme_support('post-thumbnails');
 	add_image_size('large-thumbnail', 190);
 	add_image_size('single-thumb', 250);
 	add_image_size('featured-large', 620, 330, true);
 	add_image_size('featured-medium', 210, 96, true);
 	add_image_size('featured-600', 600, 9999); 	
 	add_image_size('featured-300', 300, 9999);
 	add_image_size('square-130', 130, 130, true);
 	add_image_size('square-150', 150, 150, true);
 }

if ( function_exists('register_sidebar') ) {
   register_sidebar(array(
       'before_widget' => '<li id="%1$s" class="widget %2$s">',
       'after_widget' => '</li>',
       'before_title' => '<h2 class="widgettitle">',
       'after_title' => '</h2>',
   ));
}

function project_excerpt_length($length) {
	return 55;
}
add_filter('excerpt_length', 'project_excerpt_length');


function project_excerpt_more($more) {
       global $post;
	return '...<a href="'. get_permalink($post->ID) . '" class="read-more">Read on</a>';
}
add_filter('excerpt_more', 'project_excerpt_more');


function custom_login_logo() {
        echo '<style type="text/css">h1 a { background: url('.get_bloginfo('template_directory').'/images/aw-login-logo.png) 50% 50% no-repeat !important; }</style>';
}
add_action('login_head', 'custom_login_logo');

function change_wp_login_url() {
        echo bloginfo('url');
}
add_filter('login_headerurl', 'change_wp_login_url');


?>