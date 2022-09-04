
<?php
function postAreHere()
{
    ?>
    <?php
    while (have_posts()) {
        the_post(); 
        ?>
       <h1> <?php the_title();?> </h1> 
       <p><?php the_content();?></p> 
       
        <?php   
  
        
    }
    ?>
    <?php
}
get_header();
postAreHere();
get_footer();
?>