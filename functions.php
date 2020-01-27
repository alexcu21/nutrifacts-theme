<?php

/*
* Load queries
*/
require_once dirname(__FILE__) . '/inc/queries.php';

/*
* styles and script functions
*/
function nft_scripts() {
     /** Styles **/
     wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css' , false, '4.2.1');
     wp_enqueue_style('fontawesome-css', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css' , false, '4.1.3');
     wp_enqueue_style('ct-paper', get_stylesheet_directory_uri() .'/css/vendor/ct-paper.css' , false, '4.1.3');
     wp_enqueue_style('demo', get_stylesheet_directory_uri() .'/css/vendor/demo.css' , false, '4.1.3');
     wp_enqueue_style('style', get_stylesheet_uri(), array('bootstrap-css') );
    
     /** JS Scripts **/
     wp_enqueue_script('jquery');
     wp_enqueue_script('jquery-ui', get_stylesheet_directory_uri() . '/js/vendor/jquery-ui-1.10.4.custom.min.js', array('jquery'), '1.0', true );
     wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array('jquery'), '1.0', true );
     wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery'), '1.0', true );
     wp_enqueue_script('ct-paper-js', get_stylesheet_directory_uri() . '/js/vendor/ct-paper.js', array('bootstrap-js'), '1.0', true );
}
add_action('wp_enqueue_scripts', 'nft_scripts' );

function ap_setup(){
    //size of thumbnails
    add_image_size('medium', 510, 340, true);
    add_image_size('square_medium', 350, 350, true);
    //featured image
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    //nav menu
    register_nav_menus(
      array(
        'main_menu' => esc_html__('Main Menu', 'nft'),
        'footer_menu' => esc_html__('Footer Menu', 'nft')       
  
      ));
  }
  
  add_action('after_setup_theme','ap_setup');

/*
* adding bootstrap class link
*/

function ap_link_class($atts, $item, $args){
    if($args->theme_location == 'main_menu') {
         $atts['class'] = 'nav-link';

    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'ap_link_class', 10, 3 );

/*
* adding bootstrap class ul > li
*/

function ap_li_class($classes, $item, $args){
    if($args->add_li_class) {
         $classes[] = $args->add_li_class;

    }
    return $classes;
}
add_filter('nav_menu_css_class', 'ap_li_class', 10, 3 );

