<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Custom WordPress theme">
    <meta name="author" content="Alok">
    <title>
        <?php
        if (is_home()):
            echo 'Vlog';
        else:
            wp_title();
        endif;
        ?>
    </title>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body id="body">

<!-- Preloader -->
<div id="preloader">
    <div class='preloader'>
        <span></span>
        <span></span>
    </div>
</div>

<!-- Navigation -->
<header class="navigation fixed-top oc-header">
    <div class="container">
        <!-- main nav -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- Logo and Website Title & description -->
            <a class="navbar-brand logo" href="<?php echo get_site_url(); ?>">
                <?php
                if(!empty(get_custom_logo())):
                    echo get_custom_logo();
                else:
                    if(!empty(get_bloginfo( 'name' ))):
                        echo '<span class="web-title">'.get_bloginfo( 'name' ).'</span>';
                    endif;
                    if(!empty(get_bloginfo( 'description' ))):
                        echo '<p class="web-subtitle">'.get_bloginfo( 'description' ).'</p>';
                    endif;
                endif;
                ?>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navigation">
                <?php
                // WP Navigation
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'container'=> false,
                        'depth' => 0,
                        'menu_class' => 'navbar-nav ml-auto text-center',
                        'add_li_class' => 'nav-items',
                        'add_a_class' => 'nav-link'
                    )
                );
                ?>
            </div>
        </nav>
        <!-- /main nav -->
    </div>
</header>
