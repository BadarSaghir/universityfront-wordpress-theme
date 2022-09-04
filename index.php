
<?php
// header("Refresh:1");
?>

<?php
get_header();
function postAreHere()
{
    ?>
    <?php
    while (have_posts()) {
        the_post(); 
        ?>
       <h1> <a href="<?php the_permalink() ?>" ><?php the_title();?></a> </h1> 
       <p><?php the_content();?></p> 
       <hr>
        <?php
        
  
        
    }
    ?>
    <?php
}

postAreHere();
get_footer();
?>