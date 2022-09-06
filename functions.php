<?php

function university_files() {
  wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('university_main_styles', get_stylesheet_uri());
}

/**
 * Fires when scripts and styles are enqueued.
 *
 */
add_action('wp_enqueue_scripts', function() : void {
  university_files();
} );

// must be implented in mu-plugins folder
// add_action('init',function() : void {
//   register_post_type('event',array(
//       'public'=>true,
//       'labels'=>array(
//           'name'=>'Events',
//           'add_new_item'=>"Add New Event",
//           'edit_item'=>"Edit New item"
//       ),
//       'menu_icon'=>'dashicons-calender'
//   ));
// } );
/**
 * Fires after the theme is loaded.
 *
 */
add_action("after_setup_theme",function() : void {
  add_theme_support('title-tag');
  register_nav_menu('headerMenuLocation',"Header Menu Location");
  register_nav_menu('footerMenuOne',"Footer Menu One");
  register_nav_menu('footerMenuTwo',"Footer Menu Two");
 


} );

