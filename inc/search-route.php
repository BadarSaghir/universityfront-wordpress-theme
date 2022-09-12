<?php

add_action('rest_api_init', 'action_rest_api_init');

/**
 * Fires when preparing to serve a REST API request.
 *
 * @param \WP_REST_Server $wp_rest_server Server object.
 */
function action_rest_api_init(): void
{
  register_rest_route('university/v1', 'search', array(
    "methods" => WP_REST_Server::READABLE,
    "callback" => 'uniSearchResult'
  ));
  function uniSearchResult($data)
  {
    $main_query = new WP_Query(array(
      "post_type" => array('professor', 'post', 'page', 'event', 'campus', 'program'),
      's' => sanitize_file_name($data['term'])
    ));
    $searhData = array(
      'generalInfo' => array(),
      'professors' => array(),
      'programs' => array(),
      'events' => array(),
      'campuses' => array(),


    );
    while ($main_query->have_posts()) {
      $main_query->the_post();
      if (get_post_type() === 'professor') {
        array_push($searhData['professors'], array('title' => get_the_title(), 'id' => get_the_ID(), 'author' => get_the_author(),'permalink'=>get_permalink()));
      }
      else if (get_post_type() === 'post' or get_post_type() === 'page') {
        
        array_push($searhData['generalInfo'], array('title' => get_the_title(), 'id' => get_the_ID(), 'author' => get_the_author(),'permalink'=>get_permalink()));
        
      }
      else if (get_post_type() == 'program') {
        
        array_push($searhData['programs'], array('title' => get_the_title(), 'id' => get_the_ID(), 'author' => get_the_author(),'permalink'=>get_permalink()));

      }else if (get_post_type() == 'event') {
        array_push($searhData['events'], array('title' => get_the_title(), 'id' => get_the_ID(), 'author' => get_the_author(),'permalink'=>get_permalink()));
      }else if (get_post_type() == 'campus') {
        array_push($searhData['campuses'], array('title' => get_the_title(), 'id' => get_the_ID(), 'author' => get_the_author(),'permalink'=>get_permalink()));
      }

    }
    return $searhData;
  }
}
