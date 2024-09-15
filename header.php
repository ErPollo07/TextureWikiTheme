<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TextureMaker</title>

    <?php wp_head(); ?>
    
</head>
<body>
    
<header>
    <nav class="background navbar-expand-lg bg-body-tertiary">
        <section class="row width-max">
            <div class="col-lg-4 brand-name align-items-center">
                <a class="navbar-brand text h5" href="<?php echo home_url(); ?>">Texture Wiki</a>

                <button class="navbar-toggler" type="button" 
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation">

                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            
            <div class="collapse navbar-collapse col-lg-8" id="navbarNav">
                <?php
                wp_nav_menu( array(
                    'theme_location'    => 'top-menu',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'container-links collapse navbar-collapse justify-content-center',
                    'container_id'      => 'bs-example-navbar-collapse-1',
                    'menu_class'        => 'links justify-content-space-between h7 margin-none',
                ) );
                ?>
            </div>
        </section>
    </nav>
</header>
