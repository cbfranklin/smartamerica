<?php
// CUSTOM LOGIN SCREEN
	function my_login_logo() { ?>
		<style type="text/css">
			body.login div#login h1 a {
				background-image: url(<?php echo get_bloginfo( 'template_directory' ) ?>/images/site-login-logo.png);
				padding-bottom: 30px;
			}
		</style>
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );
// ENQUEUE SCRIPTS
	add_action( 'wp_enqueue_scripts', 'load_javascript_files' ); 
	function load_javascript_files() {
        wp_deregister_script( 'jquery' );
		// first register
        wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.0.0.min.js',false, '2.0.0', null);
		wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.0', true);
		wp_register_script( 'custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true);
        wp_register_script( 'slidejs', get_template_directory_uri() . '/js/slidejs.min.js', array('jquery'), '1.0', true);
        wp_register_script( 'scrollorama', get_template_directory_uri().'/js/jquery.scrollorama.js', array('jquery'), '2.0', true );
			// then enqueue
            wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'bootstrap' );
            wp_enqueue_script( 'scrollorama' );
            wp_enqueue_script( 'slidejs' );
            wp_enqueue_script( 'custom' );
    }
// REGISTER MENUS
    if ( function_exists( 'register_nav_menus' ) ) {
        register_nav_menus( array(
            'main_nav' => 'Navigation displayed on left side of navigation bar',
            'aside_nav' => 'Navigation displayed on right side of navigation bar',
            'footer_nav' => 'Navigation displayed in footer'
        ) );
    }
/* THUMBNAIL SUPPORT
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 178, 178, true ); // default Post Thumbnail dimensions (cropped)
       // add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
}*/
// CUSTOM FIELD EXCERPT
function custom_field_excerpt($field, $length) {
    global $post;
    $text = get_field($field);
    if ( '' != $text ) {
        $text = strip_shortcodes( $text );
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
        $excerpt_length = $length; // words
        $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
        $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
    }
    return apply_filters('the_excerpt', $text);
}


