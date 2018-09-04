<?php
/*********************************************************************************************

Add Thumbnail Support

*********************************************************************************************/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 100, 100, true ); // Normal post thumbnails
add_image_size( 'single-post-image', 720, 320, TRUE );
/*********************************************************************************************

Add Custom Background Support

*********************************************************************************************/
$defaults = array(
	'default-color'          => '000000',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $defaults );
/*********************************************************************************************

Replaces the excerpt "more" text by a link

*********************************************************************************************/
function custom_excerpt_length( $length ) {
	return 15;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
/*********************************************************************************************

Array Random

*********************************************************************************************/
function array_random($arr, $num = 1) {
    shuffle($arr);

    $r = array();
    for ($i = 0; $i < $num; $i++) {
        $r[] = $arr[$i];
    }
    return $num == 1 ? $r[0] : $r;
}
/*********************************************************************************************

Add widgets

*********************************************************************************************/
function my_widgets_init() {
register_sidebar(array(
        'name' => 'Barre footer',
        'id' => 'footer_sidebar',
		'before_widget' => '<div class="footer_widget" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="footer_title">',
        'after_title' => '</div>',
      ));
}
add_action('widgets_init', 'my_widgets_init');

/*********************************************************************************************

transform object to array

*********************************************************************************************/
function objectToArray($object) 
{ 
    if(!is_object( $object ) && !is_array( $object ))
    { 
        return $object; 
    } 
    if(is_object($object) ) 
    { 
        $object = get_object_vars( $object ); 
    } 
    return array_map('objectToArray', $object ); 
}