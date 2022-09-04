<?php
function university_files(){
    wp_enqueue_style('university_main_styles',get_stylesheet_uri());
}
/**
 * Fires when scripts and styles are enqueued.
 *
 */


add_action('wp_enqueue_scripts',function() : void {
    university_files();
} );

?>