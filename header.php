<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />

	<link rel="profile" href="//gmpg.org/xfn/11" />
	<?php 
	nooni_theme_favicon();
	wp_head(); 
	?>
</head>
<body <?php body_class(); ?>>
<?php
if( function_exists('wp_body_open') ){
	wp_body_open();
}
?>

<div id="page" class="hfeed site">

	<?php if( !is_page_template('page-templates/blank-page-template.php') ): ?>
			
		<!-- Page Slider -->
		<?php if( is_page() ): ?>
			<?php if( nooni_get_page_options('ts_page_slider') && nooni_get_page_options('ts_page_slider_position') == 'before_header' ): ?>
			<div class="top-slideshow">
				<div class="top-slideshow-wrapper">
					<?php nooni_show_page_slider(); ?>
				</div>
			</div>
			<?php endif; ?>
		<?php endif; ?>
		
		<?php nooni_get_header_template(); ?>
		
	<?php endif; ?>
	
	<?php do_action('nooni_before_main_content'); ?>

	<div id="main" class="wrapper">