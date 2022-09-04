
<?php
get_header();
function postAreHere()
{
    ?>
    <h1>This is a page</h1>
    <?php
    while (have_posts()) {
        the_post(); 

        ?>
        
       <h1> <?php echo strtoupper(get_the_title()) ;?></h1> 
       <p><?php the_content();?></p> 

        <?php
        
        
    }
    ?>
    <?php
}

postAreHere();
get_footer();
?>