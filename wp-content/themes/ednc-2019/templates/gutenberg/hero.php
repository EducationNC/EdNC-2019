<?php
/**
 * The template used for displaying a Hero block.
 *
 * @package _s
 */

// Set up fields.
$title            = get_field( 'title' );
$text             = get_field( 'text' );
$button_url       = get_field( 'button_url' );
$button_text      = get_field( 'button_text' );
$background_image = get_field( 'background_image' );
?>
<section class="hero-block">
	<div class="hero-content">
		<?php if ( $title ) : ?>
			<h2 class="hero-title"><?php echo esc_html( $title ); ?></h2>
		<?php endif; ?>

		<?php if ( $text ) : ?>
			<p class="hero-description"><?php echo esc_html( $text ); ?></p>
		<?php endif; ?>

		<?php if ( $button_text && $button_url ) : ?>
			<a class="button button-hero" href="<?php echo esc_url( $button_url ); ?>"><?php echo esc_html( $button_text ); ?></a>
		<?php endif; ?>
	</div><!-- .hero-content-->
	<?php if ( $background_image ) : ?>
		<figure class="image-background" aria-hidden="true">
			<?php echo wp_get_attachment_image( $background_image['id'], 'full' ); ?>
		</figure><!-- .image-background -->
	<?php endif ?>
</section><!-- .hero -->
