<?php get_header(); ?>

<div class="page-wrapper">
    <div class="page-cont">
        <!-- Title -->
        <h3 class="post-title"><?php the_title(); ?></h3>

        <div class="post-content">
            <?php the_content(); ?>
        </div>
        

    </div>
</div>


<?php get_footer(); ?>