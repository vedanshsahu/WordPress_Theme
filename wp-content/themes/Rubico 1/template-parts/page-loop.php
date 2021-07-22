<?php while(have_posts(  )): the_post(  ); ?>
        <h1 class ="text-center text-primary"><?php the_title( ); ?></h1>

        <?php
            // check if an image exist
        if( has_post_thumbnail() ):
            the_post_thumbnail('', array('class' => 'featured-image'));
        endif;

        if( get_post_type() === 'rubico_projects'): ?>
        <p><b>Developed By: </b><?php the_field('developer'); ?> | <b>Technology Used:</b> <?php the_field('technology');?></p>
        <?php
        endif;
        the_content();?>
<?php endwhile; ?>