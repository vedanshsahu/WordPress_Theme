    
<footer class = "site-footer container">
    <div class = "footer-content">
        <?php
            wp_nav_menu( array(
                'theme_location' => 'extra-menu',
                'container' => 'nav', 
                'container_class' => 'extra-menu' 
                ) 
            );
        ?>
        <p class="copyright">All Rights Reserved. <a href="#"><?php echo get_bloginfo('name');?></a> . <?php echo date('Y'); ?></p>
    </div>
</footer>
      
<?php wp_footer();  ?>   
</body>
</html>