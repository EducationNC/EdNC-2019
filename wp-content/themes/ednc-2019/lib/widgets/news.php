<?php

namespace Roots\Sage\Widgets;

class News extends \WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
    parent::__construct(
			'news', // Base ID
			__( 'News', 'sage' ), // Name
			array( 'description' => __( 'Displays recent news', 'sage' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		$before_widget = $args['before_widget'];
		$after_widget = $args['after_widget'];
		$number = $instance['number'];

		echo $before_widget;
    include(locate_template('templates/widgets/news.php'));
		echo $after_widget;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		$number = isset( $instance['number'] ) ? $instance['number'] : 4;
		?>
		<select id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" class="widefat" style="width:100%;">
				<option <?php selected( $instance['number'], '4'); ?> value="4">4</option>
				<option <?php selected( $instance['number'], '8'); ?> value="8">8</option>
				<option <?php selected( $instance['number'], '12'); ?> value="12">12</option>
		</select>
		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		$instance['number'] = ( ! empty( $new_instance['number'] ) ) ? strip_tags( $new_instance['number'] ) : '';

		return $instance;
	}
}
