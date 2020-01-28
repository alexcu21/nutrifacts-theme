<?php


/*
* CMB2
*/
require_once dirname(__FILE__) . '/cmb2/init.php';

/*
* Load queries
*/
require_once dirname(__FILE__) . '/inc/queries.php';

/*
* Theme's options
*/
require_once dirname(__FILE__) . '/inc/options.php';



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
     wp_enqueue_script('nf-scripts', get_stylesheet_directory_uri() . '/js/nf-scripts.js', array(), '1.0', true );
}
add_action('wp_enqueue_scripts', 'nft_scripts' );

function nf_setup(){
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
  
  add_action('after_setup_theme','nf_setup');

/*
* adding bootstrap class link
*/

function nf_link_class($atts, $item, $args){
    if($args->theme_location == 'main_menu') {
         $atts['class'] = 'nav-link';

    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'nf_link_class', 10, 3 );

/*
* adding bootstrap class ul > li
*/

function nf_li_class($classes, $item, $args){
    if($args->add_li_class) {
         $classes[] = $args->add_li_class;

    }
    return $classes;
}
add_filter('nav_menu_css_class', 'nf_li_class', 10, 3 );

/*
*
* featured images for pages
*
 */
add_action('init', 'nf_featured_image');
function nf_featured_image($id){
  $image = get_the_post_thumbnail_url($id, 'full');

  $html = '';
  $class = false;
  if($image){
    $class = true;
    $html .= '<div class="container">';
    $html .= '<div class="row featured-image"></div>';
    $html .= '</div>';

    // add inline Styles
    wp_register_style('custom', false);
    wp_enqueue_style('custom');
    //css for custom
    $featured_image_css = "
      .featured-image{
        background-image: url({$image});
      }
     ";
     wp_add_inline_style('custom', $featured_image_css);
  }
  return array($html, $class);
}

