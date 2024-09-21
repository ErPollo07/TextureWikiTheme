<?php
/* Template Name: Home Page */
?>
<?php get_header(); ?>

<div class="page-wrapper">
    <div class="content-wrapper-80">
        <div class="title-container align-items-center text">
            <!-- TITLE -->
            <h1>
                <?php echo get_option('front_page_title'); ?>
            </h1>
                
            <!-- SUB-TITLE -->
            <h5><?php echo get_option('front_page_subtitle'); ?></h5>
        </div>

        <div class="button-container align-items-center justify-content-center">
            <?php
                wp_nav_menu( array(
                    'theme_location'    => 'button',
                    'depth'             => 2,
                    'container'         => 'div',
                    'menu_class'        => 'my-btn button-link margin-none text h6',
                ) );
            ?>
            
        </div>
    </div>
</div>

<?php get_footer(); ?>