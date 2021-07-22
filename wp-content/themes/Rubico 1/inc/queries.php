<?php
    function rubico_projects_list() {?>
       <ul class="projects-list">
            <?php
                $args = array(
                    'post_type' => 'rubico_projects'
                );
                //Use wp_Query and append the results into $classes
                $classes = new WP_Query($args);

                while ($classes -> have_posts(  )) : $classes->the_post(  );
            ?>
            <li class="rubico-class card gradient">
            <a href="<?php
                        the_permalink();
                    ?>"><?php
                    the_post_thumbnail(); // 'medium' use image size if required.
                ?></a>
                <div class = "card-content">
                    <a href="<?php
                        the_permalink();
                    ?>"><h3><?php the_title( ); ?> </h3></a>
                    <p><b>Developed By: </b><?php
                        the_field('developer');
                    ?> | Technology Used: <?php
                    the_field('technology');
                ?></p>
                </div>
                
            </li>
            <?php
                endwhile; wp_reset_postdata(  );
            ?>
            
       </ul> 
<?php  
    }

// Displays the Developers

function rubico_developers_list() { ?>
    <ul class="developer-list">
            <?php 
                $args = array(
                    'post_type' => 'developers',
                    'posts_per_page' => -1
                );
                $instructors = new WP_Query($args);

                while($instructors->have_posts()): $instructors->the_post(); ?>
                    <li class="developer">
                        <?php the_post_thumbnail(); ?>
                        <div class="content text-center">
                            <h3><?php the_title(); ?></h3>

                            <div class="specialty">
                                <?php 
                                    $specialty = get_field('expertise'); ?>
                            </div>
                        </div>
                    </li>
                <?php endwhile; wp_reset_postdata(); ?>
        </ul>

    <?php 
}