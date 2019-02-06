<?php

namespace Roots\Sage\Widgets;

class Ad_Blocks_3 extends \WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
    parent::__construct(
			'ad_blocks_3', // Base ID
			__( 'Ad Blocks (3)', 'sage' ), // Name
			array( 'description' => __( 'Displays three ads', 'sage' ), ) // Args
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
     // if ( !empty($instance['title']) ) {
     //   echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
     // }
     // echo get_field('text_field', 'widget_' . $args['widget_id']);
     // echo "<h1>Image</h1>";
     $image_1 = get_field('ad_block_1', 'widget_' . $args['widget_id']);
		 $image_2 = get_field('ad_block_2', 'widget_' . $args['widget_id']);
     $image_1_url = $image_1['sizes']['thumbnail'];
		 $image_2_url = $image_2['sizes']['thumbnail'];
     // echo "<img src='". $image_1_url ."' />";
		 // echo "<img src='". $image_2_url ."' />";
     echo $args['after_widget'];
	}

/**
  * Outputs the content of the widget
  *
  * @param array $args
  * @param array $instance
  */

	public function form( $instance ) {
		if ( isset($instance['ad_block_1'] ) || isset( $instance[ 'ad_block_2' ] ) ) {
			$ad_block_1 = $instance['ad_block_1'];
			$ad_block_2 = $instance['ad_block_2'];
		}
		else {
			$ad_block_1 = __( 'Ad Block 1', 'text_domain' );
			$ad_block_2 = __( 'Ad Block 3', 'text_domain' );
		}
	}

	public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['ad_block_1'] = ( ! empty( $new_instance['ad_block_1'] ) ) ? strip_tags( $new_instance['ad_block_1'] ) : '';
	$instance['ad_block_2'] = ( ! empty( $new_instance['ad_block_2'] ) ) ? strip_tags( $new_instance['ad_block_2'] ) : '';

	return $instance;
	}

}
