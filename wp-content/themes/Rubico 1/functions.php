<?php 
//Link to the queries file 
require get_template_directory(). '/inc/queries.php';

/* ------------------------------------------------------------
/ Adding Scripts
-------------------------------------------------------------- */
function add_my_scripts(){

    /* Normalize CSS */
    wp_enqueue_style( 'normalize', get_template_directory() . '/css.normalize.css' , array() , '8.0.1' );
    
    /* Google Font */
    wp_enqueue_style( 'googlefont', 'https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@400;700;900&family=Staatliches&display=swap', array(), '1.0.0' );
    
    /* Main Stylesheet */
    wp_enqueue_style( 'style', get_stylesheet_uri(), array('normalize','googlefont') , '1.0.0' );
    
    /* Sliknav css */
    wp_register_style( 'slicknavcss', get_stylesheet_directory_uri() . '/css/slicknav.css', array(), '1.0.10');
    
    /* Lightbox CSS */
    if( basename( get_page_template() ) === 'gallery.php'):
        /* Lightbox css */
        wp_enqueue_style('lightboxcss', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.1.11');
    endif;
    
    /* Load javascripts */
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'slicknavjs', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery') , '1.0.10', true);
    wp_enqueue_script( 'siteloader', get_template_directory_uri() . '/js/siteloader.js', array('jquery'), '1.0.0', true);
    if( basename( get_page_template() ) === 'gallery.php'):
        wp_enqueue_script('lightboxjs', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '1.0.10', true);
    endif;
   
}
add_action( 'wp_enqueue_scripts', 'add_my_scripts' );


if ( ! function_exists( 'rubico1_setup' ) ) {

    function rubico1_setup(){
        /** automatic feed link*/
        add_theme_support( 'automatic-feed-links' );
     
        /** tag-title **/
        add_theme_support( 'title-tag' );
     
        /** post formats */
        add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

     
        /** post thumbnail **/
        add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );
     
        /** refresh widgets **/
        add_theme_support( 'customize-selective-refresh-widgets' );
     
        /** custom logo **/
        $logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);
     
    }
    add_action('after_setup_theme','rubico1_setup');
}

/* ------------------------------------------------------------
/ Register Menus
-------------------------------------------------------------- */

function register_my_menus() {
    register_nav_menus(
        array(
        'header-menu' => __( 'Header Menu' ),
        'extra-menu' => __( 'Extra Menu' )
        )
    );
}
add_action( 'init', 'register_my_menus' );

/* ------------------------------------------------------------
/ Widget Zone
-------------------------------------------------------------- */


function rubico1_widgets(){
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}
add_action( 'widgets_init', 'rubico1_widgets');

/** Displays the Hero image on background of the front-page **/

function rubico_hero_image() {
    $front_page_id = get_option('page_on_front');
    $image_id = get_field('hero_image', $front_page_id);

    $image = $image_id['url'];

    wp_register_style('custom', false);
    wp_enqueue_style('custom');

    $featured_image_css = "
        body.home .site-header {
            background-image: linear-gradient( rgba(0,0,0, 0.65), rgba(0,0,0, 0.65) ), url( $image );  
        }
    ";
    wp_add_inline_style('custom', $featured_image_css);
}
add_action('init', 'rubico_hero_image');
