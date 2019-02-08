<?php

namespace Roots\Sage\Widgets;

class Ad_Block extends \WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
    parent::__construct(
			'ad_block', // Base ID
			__( 'Ad Block (1)', 'sage' ), // Name
			array( 'description' => __( 'Displays 1 full-width ad', 'sage' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
    //if ( !empty($instance['title']) ) {
      //echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    //}
    //echo get_field('text_field', 'widget_' . $args['widget_id']);
		// $attachment_id = get_field('ad_block_1', 'widget_' . $widget_id);
		// $size = "full";
		// $image = wp_get_attachment_image_src( $attachment_id, $size );


    // $attachment = get_field('ad_block_1', 'widget_' . $args['widget_id']);
		// $size = "full";
		// $image = wp_get_attachment_image_src( $attachment, $size );


		$image = get_field('ad_block_1', 'widget_' . $args['widget_id']);
		$size = 'full';
		$URL = get_field('URL', 'widget_' . $args['widget_id']);
		// echo $URL;

		// echo $image;
		// print_r($image);
  	// $image_url = $image;
		// print $image_url = $image['size']['full'];
		?>

		<section class="block">
		  <div class="widget-content">
				<a target="_blank" href="<?php echo $URL; ?>">
		     <?php echo wp_get_attachment_image( $image, $size ); ?>
			 </a>
		  </div>
		</section>
    <?php echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	 public function form( $instance ) {
		 if ( isset($instance['title']) ) {
			 $title = $instance['title'];
		 }
		 else {
			 $title = __( 'New title', 'text_domain' );
		 }
		 ?>
		 <p>
			 <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php// _e( 'Title:' ); ?></label>
			 <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		 </p>
		 <?php
	 }

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	 public function update( $new_instance, $old_instance ) {
		 $instance = array();
		 $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		 $instance['ad_block_1'] = ( ! empty( $new_instance['ad_block_1'] ) ) ? strip_tags( $new_instance['ad_block_1'] ) : '';

		 return $instance;
	 }
	}
