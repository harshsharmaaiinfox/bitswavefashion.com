<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Metro;
?>
<div id="rdtheme-search-popup">
	<button type="button" class="close">×</button>
	<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" name="s" value="<?php echo get_search_query();?>" placeholder="<?php esc_html_e( 'Type here........' , 'metro' );?>" title="<?php esc_html_e( 'Search' , 'metro' );?>"/>
		<button type="submit" class="search-btn"><span class="flaticon-search"></span></button>
	</form>
</div>