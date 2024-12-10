<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Metro;

$previous = get_previous_post();
$next = get_next_post();
?>
<div class="single-post-pagination">
	<div class="rtin-left rtin-item">
		<?php if ( $previous ): ?>
			<?php if ( has_post_thumbnail( $previous ) ): ?>
				<div class="rtin-thumb"><a href="<?php echo esc_url( get_permalink( $previous ) ); ?>"><?php echo get_the_post_thumbnail( $previous, 'thumbnail' ); ?><div class="rtin-icon"><span class="flaticon-plus-symbol"></span></div></a></div>
			<?php endif; ?>

			<div class="rtin-content">
				<h3 class="rtin-title"><a href="<?php echo esc_url( get_permalink( $previous ) ); ?>"><?php echo get_the_title( $previous ); ?></a></h3>
				<div class="rtin-date"><span class="fa fa-clock-o"></span><?php echo esc_html( get_post_time( get_option( 'date_format' ), false, $previous ) ); ?></div>
				<a class="rtin-link" href="<?php echo esc_url( get_permalink( $previous ) ); ?>"><span class="fa fa-angle-left"></span><?php echo esc_html_e( 'Previous Post', 'metro' );?></a>
			</div>
		<?php endif; ?>
	</div>
	<div class="rtin-right rtin-item">
		<?php if ( $next ): ?>
			<div class="rtin-content">
				<h3 class="rtin-title"><a href="<?php echo esc_url( get_permalink( $next ) ); ?>"><?php echo get_the_title( $next ); ?></a></h3>
				<div class="rtin-date"><span class="fa fa-clock-o"></span><?php echo esc_html( get_post_time( get_option( 'date_format' ), false, $next ) ); ?></div>
				<a class="rtin-link" href="<?php echo esc_url( get_permalink( $next ) ); ?>"><?php echo esc_html_e( 'Next Post', 'metro' );?><span class="fa fa-angle-right"></span></a>
			</div>
			<?php if ( has_post_thumbnail( $next ) ): ?>
				<div class="rtin-thumb"><a href="<?php echo esc_url( get_permalink( $next ) ); ?>"><?php echo get_the_post_thumbnail( $next, 'thumbnail' ); ?><div class="rtin-icon"><span class="flaticon-plus-symbol"></span></div></a></div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>