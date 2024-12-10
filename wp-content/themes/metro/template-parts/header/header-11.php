<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Metro;
$nav_menu_args  = Helper::nav_menu_offcanvas_args();
$socials        = Helper::socials();
?>

<div class="main-header offcanvas-header">
	<div class="header-firstrow">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-sm-4 col-6">
					<div class="logo-wrp">
						<?php get_template_part( 'template-parts/header/icon', 'menu' ); ?>
							<?php echo Helper::site_logo(RDTheme::$options['logo_type'],RDTheme::$options['logo_text'],RDTheme::$options['logo']);?>
					</div>							
				</div>							
				<div class="col-sm-8 col-6">
					<?php get_template_part( 'template-parts/header/icon', 'area' );?>
				</div>
			</div>
		</div>		
	</div>	
</div>
