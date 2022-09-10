<?php

function pageBanner()
{?>
  <div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php 
  $banner_image=get_field('page_banner_background');
  if($banner_image){
  echo $banner_image['sizes']['pageBanner'];}
  else{
    echo get_theme_file_uri('/images/ocean.jpg');
  }
  ?>);"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title"><?php the_title(); ?></h1>
    <div class="page-banner__intro">
      <p><?php if(get_field('page_banner_subtitle'))the_field('page_banner_subtitle')?></p>
    </div>
  </div>  
</div>

<?php
}

function university_files() {
  wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('university_main_styles', get_stylesheet_uri());
}
//find binary search in php.


add_action('wp_enqueue_scripts', 'university_files');

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

add_action('after_setup_theme', 'university_features');

function university_adjust_queries($query) {
  if (!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()) {
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
    $query->set('posts_per_page', -1);
  }

  if (!is_admin() AND $query->is_post_type_archive('event') AND $query->is_main_query()) {
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

add_action('pre_get_posts', 'university_adjust_queries');