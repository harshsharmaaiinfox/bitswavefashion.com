<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Metro;

$nav_menu_args = Helper::nav_menu_args();
$logo_width = (int) RDTheme::$options['logo_width'];
$menu_width = 12 - $logo_width;
$logo_class = "col-lg-{$logo_width} col-sm-12 col-12";
$menu_class = "col-lg-{$menu_width} col-sm-12 col-12";
?>
<div class="main-header">
	<div class="container">
		<div class="row align-items-center">
			<div class="<?php echo esc_attr( $logo_class );?>">
			<div class="site-branding">
					<?php echo Helper::site_logo(RDTheme::$options['logo_type'],RDTheme::$options['logo_text'],RDTheme::$options['logo']);?>
				</div>
			</div>
			<div class="<?php echo esc_attr( $menu_class );?>">
				<div class="main-navigation-area">
					<div class="main-navigation"><?php wp_nav_menu( $nav_menu_args );?></div>
					<?php get_template_part( 'template-parts/header/icon', 'area' );?>
				</div>
			</div>
		</div>
	</div>
</div>