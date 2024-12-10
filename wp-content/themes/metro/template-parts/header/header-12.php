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
<div class="header-search-area ps-autocomplete-js">
	<div class="container">
		<div class="row align-items-center">
			<div class="<?php echo esc_attr( $logo_class );?>">
				<div class="site-branding">
					<?php echo Helper::site_logo(RDTheme::$options['logo_type'],RDTheme::$options['logo_text'],RDTheme::$options['logo']);?>
				</div>
			</div>
			<div class="<?php echo esc_attr( $menu_class );?>">

				<div class="topbar-middle">
					<div class="item-phn-number">
						<div class="item-icon">
							<div class="glyph-icon flaticon-phone-call"></div>
						</div>
						<div class="item-number"> <span>Call:</span>+ 123 456 7890</div>
					</div>
					<div class="search-box">
						<?php get_template_part( 'template-parts/header/header-search2' );?>
					</div>
					<div class="header-actions">
						<?php get_template_part( 'template-parts/header/icon', 'area' );?>
					</div>
				</div>

					<?php //get_template_part( 'template-parts/header/header-search2' );?>
					<?php //get_template_part( 'template-parts/header/icon', 'area' );?>
				
			</div>
		</div>
	</div>
</div>

<div class="main-header">
	<div class="container">
		<div class="row gap10">
			<div class="col-lg-3 col-md-4 col-sm-12 col-12">
				<?php get_template_part( 'template-parts/vertical-menu' );?>
			</div>
			<div class="col-lg-9 col-md-8 col-sm-12 col-12">
				<div class="main-navigation-area">
					<div class="main-navigation"><?php wp_nav_menu( $nav_menu_args );?></div>
				</div>
			</div>
		</div>
	</div>
</div>