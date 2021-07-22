<?php
    /*
        Plugin Name: Rubico1 - Widgets
        Plugin URI: 
        Description: Add widgets into WordPress
        Version: 1.0
        Author: RubicoIT PVT. LTD.
        Author URI: https://www.rubicoit.com/
        Text Domain: rubico1
    */
    if(!defined('ABSPATH')) die();
/**
 * Adds Foo_Widget widget.
 */
class rubico_Projects_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'rubico_projects', // Base ID
			esc_html__( 'Rubico - Projects List', 'rubico' ), // Name
			array( 'description' => esc_html__( 'Display different projects in the widget.' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
        echo $args['before_widget']; 

        $quantity = $instance['quantity'];
        ?>
        
        <h3 >
            <?php echo esc_html( $instance['title'] );   ?> 
        </h3>
        
        <ul class="sidebar-classes-list">
            <?php 
                $argss = array(
                    'post_type' => 'rubico_projects',
                    'posts_per_page' => $quantity,
                    'orderby' => 'rand'
                );

                $classes = new WP_Query($argss);
                while($classes->have_posts()): $classes->the_post();

            ?>
                <li class = "sidebar-class">
                    <div class = "sidebar-widget-image">
                        <?php
                            the_post_thumbnail();
                        ?>
                    </div>
                    <div class = "class-content">
                        <a href="<?php the_permalink(); ?>">
                            <h4> <?php the_title( );?></h4>
                        </a>
                        <p><b>Developed By: </b><?php the_field('developer'); ?> | <b>Technology Used:</b> <?php the_field('technology');?></p>
                    </div>
                    
                </li>
                <?php
                    endwhile; wp_reset_postdata();
                ?>
            </ul>

        <?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see wp_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
        $quantity = ! empty( $instance['quantity'] ) ? $instance['quantity'] : esc_html__( '1', 'text_domain' );
		?>
		<p>
            <label 
                for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                >
                <?php esc_attr_e( 'Title:', 'text_domain' ); ?>
            </label>
            
            <input 
                class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
                type="text" 
                value="<?php echo esc_attr( $title ); ?>">
		</p>

        <p>
            <label 
                for="<?php echo esc_attr( $this->get_field_id( 'quantity' ) ); ?>"
                >
                <?php esc_attr_e( 'Ammount of Classes to display:', 'text_domain' ); ?>
            </label>
            
            <input 
                class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id( 'quantity' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'quantity' ) ); ?>" 
                type="text" 
                value="<?php echo esc_attr( $quantity ); ?>"
                min = "1"
            >
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see theme_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

        $instance['quantity'] = ( ! empty( $new_instance['quantity'] ) ) ? sanitize_text_field( $new_instance['quantity'] ) : '';

		return $instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function register_rubico_Projects_Widget_widget() {
    register_widget( 'rubico_Projects_Widget' );
}
add_action( 'widgets_init', 'register_rubico_Projects_Widget_widget' );
