
<?php
/* 
Template Name: Archive
*/
?>

<?php get_header() ?>




<div class="page-wrapper">
    
    <div class="page-cont">

        <div class="title-contents">Explore</div>

        <section class="my-row posts-container">
            
            <?php 
                wp_nav_menu( array(
                    'theme_location'    => 'post',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'post-list-container col-lg-10',
                    'menu_class'        => 'post-list',
                ) );
            ?>

            <?php 
                wp_nav_menu( array(
                    'theme_location'    => 'post-button',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'post-list-butto-container col-lg-2',
                    'menu_class'        => 'post-list-button',
                ) );
            ?>

        </section>
        
    </div>

</div>


<?php get_footer() ?>
