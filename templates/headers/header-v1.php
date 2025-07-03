<?php
$nooni_theme_options = nooni_get_theme_options();

$header_classes = array();
if( $nooni_theme_options['ts_enable_sticky_header'] ){
	$header_classes[] = 'has-sticky';
}

if( !$nooni_theme_options['ts_enable_tiny_shopping_cart'] ){
	$header_classes[] = 'hidden-cart';
}

if( !$nooni_theme_options['ts_enable_tiny_wishlist'] || !class_exists('WooCommerce') || !class_exists('YITH_WCWL') ){
	$header_classes[] = 'hidden-wishlist';
}

if( !$nooni_theme_options['ts_header_currency'] ){
	$header_classes[] = 'hidden-currency';
}

if( !$nooni_theme_options['ts_header_language'] ){
	$header_classes[] = 'hidden-language';
}

if( !$nooni_theme_options['ts_enable_search'] ){
	$header_classes[] = 'hidden-search';
}
?>

<header class="ts-header <?php echo esc_attr(implode(' ', $header_classes)); ?>">
	<div class="header-container">
		<div class="header-template">
		
			<div class="header-top">
				<div class="container">	
				
					<div class="header-left"><?php nooni_store_notices(); ?></div>
					
					<div class="header-right hidden-phone">
						<?php nooni_top_header_menu(); ?>
						
						<?php if( $nooni_theme_options['ts_header_currency'] || $nooni_theme_options['ts_header_language'] ): ?>
						<div class="language-currency">
							<?php if( $nooni_theme_options['ts_header_language'] ): ?>
							<div class="header-language"><?php nooni_wpml_language_selector(); ?></div>
							<?php endif; ?>
							
							<?php if( $nooni_theme_options['ts_header_currency'] ): ?>
							<div class="header-currency"><?php nooni_woocommerce_multilingual_currency_switcher(); ?></div>
							<?php endif; ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			
			<div class="header-sticky">
				<div class="header-middle">
					<div class="container">
						
						<div class="header-left">
						
							<div class="ts-sidebar-menu-icon">
								<span class="icon"></span>
							</div>
						
							<?php if( $nooni_theme_options['ts_enable_search'] ): ?>
							<div class="search-button search-icon">
								<span class="icon"></span>
							</div>
							<?php endif; ?>

						</div>
						
						<div class="header-center"><div class="logo-wrapper"><?php nooni_theme_logo(); ?></div></div>
						
						<div class="header-right">
							
							<?php if( $nooni_theme_options['ts_enable_tiny_account'] ): ?>
							<div class="my-account-wrapper hidden-phone">							
								<?php echo nooni_tiny_account(); ?>
							</div>
							<?php endif; ?>
							
							<?php if( class_exists('YITH_WCWL') && $nooni_theme_options['ts_enable_tiny_wishlist'] ): ?>
								<div class="my-wishlist-wrapper"><?php echo nooni_tini_wishlist(); ?></div>
							<?php endif; ?>
							
							<?php if( $nooni_theme_options['ts_enable_tiny_shopping_cart'] ): ?>
							<div class="shopping-cart-wrapper">
								<?php echo nooni_tiny_cart(); ?>
							</div>
							<?php endif; ?>
							
						</div>
					</div>					
				</div>
			</div>			
		</div>	
	</div>
</header>