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

/* REMOVE MENU ITEMS
function remove_acf_menu(){
    $admins = array(
        'adam.pflantzer',
        'ogilvy'
    );
    $current_user = wp_get_current_user();
    if( !in_array( $current_user->user_login, $admins ) )
    {
        remove_menu_page('edit.php?post_type=acf');
        remove_menu_page('tools.php');
        remove_menu_page('edit-comments.php');
        remove_menu_page('edit.php');
        //remove_menu_page('themes.php');
    }
}
add_action( 'admin_menu', 'remove_acf_menu', 999 ); */

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

// PAGINATION
function wpbeginner_numeric_posts_nav() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /**	Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /**	Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<ul>' . "\n";

    /**	Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

    /**	Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /**	Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /**	Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /**	Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );

    echo '</ul>' . "\n";

}

// ADD NEW ATTRIBUTE POSSIBILITIES TO MENU
add_filter( 'nav_menu_link_attributes', 'wpse121123_contact_menu_atts', 10, 3 );
function wpse121123_contact_menu_atts( $atts, $item, $args )
{
    $menu_target = 78; //13;
    if ($item->ID == $menu_target) {
        $atts['data-toggle'] = 'modal';
        $atts['data-target'] = '#contact-message';
    }
    return $atts;
}


