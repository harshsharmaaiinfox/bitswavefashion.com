<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Metro;

$nav_menu_args = Helper::nav_menu_args();
?>
<div class="main-header">
	<div class="header-firstrow">
		<div class="container">
			<div class="row align-items-center">				
				<div class="col-sm-4 col-xs-12 rtin-middle order-sm-2 mobile-center mobile-margin-bottom-10 header-9-logo">
					<?php echo Helper::site_logo(RDTheme::$options['logo_type'],RDTheme::$options['logo_text'],RDTheme::$options['logo']);?>
				</div>
				<div class="col-sm-4 col-4 rtin-left order-sm-1">
					<div class="rtin-left-holder">						
						<?php get_template_part( 'template-parts/header/icon', 'menu' ); ?>
					</div>				
				</div>				
				<div class="col-sm-4 col-8 rtin-right order-sm-3 mobile-right">					
					<?php get_template_part( 'template-parts/header/icon', 'area' );?>
				</div>
			</div>		
			<div class="row align-items-center">
				<div class="col-12"><span class="rt-border-bottom">&nbsp;</span></div>
			</div>
		</div>	
	</div>
	<div class="main-navigation-area">
		<div class="container">
			<div class="main-navigation"><?php wp_nav_menu( $nav_menu_args );?></div>
		</div>
	</div>
</div>
