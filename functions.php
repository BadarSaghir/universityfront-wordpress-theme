<?php
require get_theme_file_path("/inc/search-route.php");
require get_theme_file_path("/inc/custom-posts.php");
require get_theme_file_path("/inc/register-new-fields.php");
require get_theme_file_path("/inc/university-misc.php");

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


?>