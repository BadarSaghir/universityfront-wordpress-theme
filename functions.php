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
// register_post_type('event',array(
//         'support'=>array('title','editor','excerpt'),

//   'rewrite'=>array('slug'=>'events'),
//   'has_archive'=>true,
//   'public'=>true,
//   'labels'=>array(
//       'name'=>'Events',
//       'add_new_item'=>"Add New Event",
//       'edit_item'=>"Edit Event",
//       'all_items'=>"All Events",
      
//       'singular_name'=>'Event'
//   ),
//   'menu_icon'=>'dashicons-calender'
// ));
// //Program
// register_post_type('Program',array(
//  'support'=>array('title','editor','excerpt'),
//   'rewrite'=>array('slug'=>'Programs'),
//   'has_archive'=>true,
//   'public'=>true,
//   'labels'=>array(
//       'name'=>'Programs ',
//       'add_new_item'=>"Add New Program",
//       'edit_item'=>"Edit Program",
//       'all_items'=>"All Programs",
      
//       'singular_name'=>'Program'
//   ),
//   'menu_icon'=>'dashicons-awards'
// ));
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


function university_adjust_queries($query) {
  if (!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()) {
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
    $query->set('posts_per_page', -1);
  }

  if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
    $today = date('Ymd');
    $query->set('meta_key', 'event_date');
    $query->set('orderby', 'meta_value_num');
    $query->set('order', 'ASC');
    $query->set('meta_query', array(
              array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
              )
            ));
  }
}

/**
 * Fires after the query variable object is created, but before the actual query is run.
 *
 * @param \WP_Query $query The WP_Query instance (passed by reference).
 */
add_action('pre_get_posts', function( \WP_Query $query ) : void {
  university_adjust_queries($query);
} );
