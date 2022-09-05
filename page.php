<?php

get_header(); ?>



<?php
while (have_posts()) {
  the_post(); ?>
  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri("images/ocean.jpg") ?>)"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_title(); ?></h1>
      <div class="page-banner__intro">
        <p>Don't forget to replace with me</p>
      </div>
    </div>
  </div>



  <div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
      <?php
      $parent_id=wp_get_post_parent_id(get_the_ID());
      $parent=$parent_id;
      $children= get_pages(array(
        "child_of"=>get_the_ID()
      ));
      if ( $parent_id=== 0) {
        $parent_id=get_the_ID();
      } else{
        
      ?>
        <p>
          <a class="metabox__blog-home-link" href="<?php echo get_permalink($parent_id) ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php  echo get_the_title($parent_id) ?></a> <span class="metabox__main"><?php the_title(); ?></span>
        </p>
  
      <?php } ?>
    </div>
    
    <?php if($parent or $children){ ?>
    <!-- Side Bar menu -->
    <div class="page-links">
        <h2 class="page-links__title"><a href="<?php echo get_permalink($parent_id) ?>"><?php  echo get_the_title($parent_id) ?></a></h2>
        <ul class="min-list">
          <!-- <li class="current_page_item"><a href="#"><?php the_title(); ?></a></li> -->
          <?php 
         
          ?>
          <li><a href="#"><?php wp_list_pages(array(
            "title_li"=>null,
            "child_of"=>$parent_id,
            'sort_column' => 'menu_order'
          ))?></a></li>
        </ul>
      </div>
      <?php } ?>

    <div class="generic-content">
      <p><?php the_content() ?></p>
    </div>
  </div>
<?php }

get_footer();

?>