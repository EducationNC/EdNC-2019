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
		// $URL = apply_filters( 'widget_title', $instance['URL']);
		// $ad_block_1 = apply_filters( 'widget_title', $instance['ad_block_1']);
		$before_widget = $args['before_widget'];
		$after_widget = $args['after_widget'];
		$URL = $instance['URL'];
		$ad_block_1 = $instance['ad_block_1'];
		echo $URL;

		echo $before_widget;
		include(locate_template('templates/widgets/ad-block.php'));
		echo $after_widget;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'URL' ] ) || isset( $instance[ 'ad_block_1' ] ) ) {
			$URL = $instance[ 'URL' ];
			$ad_block_1 = $instance[ 'ad_block_1' ];
		} else {
			$URL= __( 'New URL', 'ad_block' );
			$ad_block_1 = __( 'New Ad', 'ad_block' );
		}

		// Widget admin form
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'URL' ); ?>"><?php _e( 'Url:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'URL' ); ?>" name="<?php echo $this->get_field_name( 'URL' ); ?>" type="URL" value="<?php echo esc_attr( $URL ); ?>" />
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
		$instance['ad_block_1'] = ( ! empty( $new_instance['ad_block_1'] ) ) ? strip_tags( $new_instance['ad_block_1'] ) : '';
		$instance['URL'] = ( ! empty( $new_instance['URL'] ) ) ? strip_tags( $new_instance['URL'] ) : '';
		return $instance;
		print_r(array_values($instance));
	}
}
