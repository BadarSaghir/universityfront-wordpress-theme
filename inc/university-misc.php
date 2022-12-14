<?php 

function universityMapKey($api) {
    $api['key'] = 'AIzaSyBh9b1rNCp6kOi5JeMHiRP4klDymBeoEWk';
    return $api;
}
  

function university_files() {
    wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('university_main_styles', get_stylesheet_uri());
    wp_localize_script('main-university-js', 'universityData', array(
      'root_url' => get_site_url(),
      'nonce'=> wp_create_nonce('wp_rest')
    ));
}
  //find binary search in php.
  
function university_features() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('professorLandscape',400,260,true);
    add_image_size('professorPortrait',480,650,true);
    add_image_size('pageBanner',1500,350,true);
  
    register_nav_menu('headerMenuLocation',"Header Menu Location");
    // register_nav_menu('footerMenuOne',"Footer Menu One");
    // register_nav_menu('footerMenuTwo',"Footer Menu Two"); 
  }
  
function filter_login_headerurl( string $login_header_url ) : string {
    return site_url('/');
  }
  
function action_login_enqueue_scripts() : void {
  wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('university_main_styles', get_stylesheet_uri());
    wp_enqueue_style('university_extra_styles', get_theme_file_uri('/build/index.css'));

    wp_localize_script('main-university-js', 'universityData', array(
      'root_url' => get_site_url(),
      'nonce'=> wp_create_nonce('wp_rest')
    ));

}
add_filter('login_headerurl','filter_login_headerurl' );

add_filter('acf/fields/google_map/api', 'universityMapKey');
add_action('wp_enqueue_scripts', 'university_files');
add_action('after_setup_theme', 'university_features');
add_action('login_enqueue_scripts','action_login_enqueue_scripts' );

