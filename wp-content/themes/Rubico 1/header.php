<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head();  ?>
</head>

<!-- Logo and Navigation Menu -->

<body>
    <header class="site-header">
        <div class="container header-grid">
            <div class="navigation-bar">
                <div class="logo">
                    <?php
                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                             
                            if ( has_custom_logo() ) {
                                echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                            } else {
                                //echo '<h1>' . get_bloginfo('name') . '</h1>';
                                echo '<img src="'. get_template_directory_uri(). '/img/logo.png" alt="Logo">';
                            }
                    ?>
                    <!-- 
                    <a href="<?php echo home_url(); ?>">
		               <img src="<?php get_template_directory_uri(). "img/logo.svg"?>" alt="Logo"> 
                    </a>
                    -->
                    
                </div><!-- logo -->

                <?php
                    wp_nav_menu( array( 'theme_location' => 'header-menu', 
                    'container' => 'nav', 'container_class' => 'header-menu' ) );
                ?>   
            </div><!-- Navigation Bar -->
        </div><!-- Container -->
    </header>
