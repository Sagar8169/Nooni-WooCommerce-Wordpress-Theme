<?php
if( !isset($data) ){
	$data = nooni_get_theme_options();
}

$default_options = array(
				'ts_layout_fullwidth'			=> 0
				,'ts_logo_width'				=> "160"
				,'ts_device_logo_width'			=> "120"
				,'ts_header_slide_notice_timing' => "15"
				,'ts_custom_font_ttf'			=> array( 'url' => '' )
		);
		
foreach( $default_options as $option_name => $value ){
	if( isset($data[$option_name]) ){
		$default_options[$option_name] = $data[$option_name];
	}
}

extract($default_options);
		
$default_colors = array(
				'ts_main_content_background_color'				=>	'#ffffff'
				,'ts_primary_color'								=>	'#d10202'
				,'ts_text_color_in_bg_primary'					=>	'#ffffff'
				,'ts_text_color'								=>	'#000000'
				,'ts_heading_color'								=>	'#000000'
				,'ts_gray_text_color'							=>	'#848484'
				,'ts_gray_bg_color'								=>	'#efefef'
				,'ts_text_in_gray_bg_color'						=>	'#000000'
				,'ts_dropdown_bg_color'							=>	'#ffffff'
				,'ts_dropdown_color'							=>	'#000000'
				,'ts_link_color'								=>	'#d10202'
				,'ts_link_color_hover'							=>	'#848484'
				,'ts_icon_hover_color'							=>	'#d10202'
				,'ts_tags_color'								=>	'#848484'
				,'ts_tags_background_color'						=>	'#ffffff'
				,'ts_tags_border_color'							=>	'#ebebeb'
				,'ts_blockquote_icon_color'						=>	'#959595'
				,'ts_blockquote_text_color'						=>	'#000000'
				,'ts_border_color'								=>	'#ebebeb'
				,'ts_input_text_color'							=>	'#000000'
				,'ts_input_background_color'					=>	'#ffffff'
				,'ts_input_border_color'						=>	'#ebebeb'
				,'ts_button_text_color'							=>	'#ffffff'
				,'ts_button_background_color'					=>	'#000000'
				,'ts_button_border_color'						=>	'#000000'
				,'ts_button_text_hover_color'					=>	'#ffffff'
				,'ts_button_background_hover_color'				=>	'#d10202'
				,'ts_button_border_hover_color'					=>	'#d10202'
				,'ts_button_thumbnail_text_color'				=>	'#000000'
				,'ts_button_thumbnail_bg_color'					=>	'#ffffff'
				,'ts_button_thumbnail_hover_text_color'			=>	'#ffffff'
				,'ts_button_thumbnail_hover_bg_color'			=>	'#d10202'
				,'ts_breadcrumb_background_color'				=>	'#ffffff'
				,'ts_breadcrumb_text_color'						=>	'#000000'
				,'ts_breadcrumb_link_color'						=>	'#848484'
				,'ts_header_top_background_color'				=>	'#000000'
				,'ts_header_top_text_color'						=>	'#ffffff'
				,'ts_header_top_border_color'					=>	'#000000'
				,'ts_header_top_link_hover_color'				=>	'#848484'
				,'ts_header_top_icon_count_background_color'	=>	'#ffffff'
				,'ts_header_top_icon_count_text_color'			=>	'#000000'
				,'ts_header_middle_background_color'			=>	'#ffffff'
				,'ts_header_middle_text_color'					=>	'#000000'
				,'ts_header_middle_border_color'				=>	'#d6d6d6'
				,'ts_header_middle_link_hover_color'			=>	'#848484'
				,'ts_header_icon_count_background_color'		=>	'#000000'
				,'ts_header_icon_count_text_color'				=>	'#ffffff'
				,'ts_header_bottom_background_color'			=>	'#ffffff'
				,'ts_header_bottom_text_color'					=>	'#000000'
				,'ts_header_bottom_border_color'				=>	'#d6d6d6'
				,'ts_header_bottom_link_hover_color'			=>	'#848484'
				,'ts_footer_background_color'					=>	'#ffffff'
				,'ts_footer_text_color'							=>	'#848484'
				,'ts_footer_link_hover_color'					=>	'#d10202'
				,'ts_footer_border_color'						=>	'#d6d6d6'
				,'ts_rating_color'								=>	'#000000'
				,'ts_product_price_color'						=>	'#000000'
				,'ts_product_sale_price_color'					=>	'#848484'
				,'ts_product_sale_label_text_color'				=>	'#ffffff'
				,'ts_product_sale_label_background_color'		=>	'#000000'
				,'ts_product_new_label_text_color'				=>	'#ffffff'
				,'ts_product_new_label_background_color'		=>	'#ffa632'
				,'ts_product_feature_label_text_color'			=>	'#ffffff'
				,'ts_product_feature_label_background_color'	=>	'#d10202'
				,'ts_product_outstock_label_text_color'			=>	'#ffffff'
				,'ts_product_outstock_label_background_color'	=>	'#919191'
				,'ts_product_meta_label_text_color'				=>	'#d10202'
);

$data = apply_filters('nooni_custom_style_data', $data);

foreach( $default_colors as $option_name => $default_color ){
	if( isset($data[$option_name]['rgba']) ){
		$default_colors[$option_name] = $data[$option_name]['rgba'];
	}
	else if( isset($data[$option_name]['color']) ){
		$default_colors[$option_name] = $data[$option_name]['color'];
	}
}

extract( $default_colors );

/* Parse font option. Ex: if option name is ts_body_font, we will have variables below:
* ts_body_font (font-family)
* ts_body_font_weight
* ts_body_font_style
* ts_body_font_size
* ts_body_font_line_height
* ts_body_font_letter_spacing
*/
$font_option_names = array(
							'ts_body_font',
							'ts_body_font_medium',
							'ts_body_font_bold',
							'ts_heading_font',
							'ts_menu_font',
							'ts_sidebar_menu_font',
							'ts_mobile_menu_font',
							'ts_button_font',
							);
$font_size_option_names = array( 
							'ts_h1_font', 
							'ts_h2_font', 
							'ts_h3_font', 
							'ts_h4_font', 
							'ts_h5_font', 
							'ts_h6_font',
							'ts_sub_menu_font',
							'ts_sidebar_submenu_font',
							'ts_blockquote_font',
							'ts_single_product_price_font',
							'ts_single_product_sale_price_font',
							'ts_h1_ipad_font', 
							'ts_h2_ipad_font', 
							'ts_h3_ipad_font', 
							'ts_h4_ipad_font',
							'ts_h5_ipad_font',
							'ts_h6_ipad_font',
							'ts_sidebar_menu_ipad_font',
							'ts_sidebar_submenu_ipad_font',
							'ts_single_product_price_ipad_font',
							'ts_single_product_sale_price_ipad_font',
							'ts_h1_mobile_font',
							'ts_h2_mobile_font',
							'ts_h3_mobile_font',
							'ts_h4_mobile_font',
							'ts_h5_mobile_font',
							'ts_h6_mobile_font',
							);
$font_option_names = array_merge($font_option_names, $font_size_option_names);
foreach( $font_option_names as $option_name ){
	$default = array(
		$option_name 						=> 'inherit'
		,$option_name . '_weight' 			=> 'normal'
		,$option_name . '_style' 			=> 'normal'
		,$option_name . '_size' 			=> 'inherit'
		,$option_name . '_line_height' 		=> 'inherit'
		,$option_name . '_letter_spacing' 	=> 'inherit'
		,$option_name . '_transform' 		=> 'inherit'
	);
	if( is_array($data[$option_name]) ){
		if( !empty($data[$option_name]['font-family']) ){
			$default[$option_name] = $data[$option_name]['font-family'];
		}
		if( !empty($data[$option_name]['font-weight']) ){
			$default[$option_name . '_weight'] = $data[$option_name]['font-weight'];
		}
		if( !empty($data[$option_name]['font-style']) ){
			$default[$option_name . '_style'] = $data[$option_name]['font-style'];
		}
		if( !empty($data[$option_name]['font-size']) ){
			$default[$option_name . '_size'] = $data[$option_name]['font-size'];
		}
		if( !empty($data[$option_name]['line-height']) ){
			$default[$option_name . '_line_height'] = $data[$option_name]['line-height'];
		}
		if( !empty($data[$option_name]['letter-spacing']) ){
			$default[$option_name . '_letter_spacing'] = $data[$option_name]['letter-spacing'];
		}
		if( !empty($data[$option_name]['text-transform']) ){
			$default[$option_name . '_transform'] = $data[$option_name]['text-transform'];
		}
	}
	extract( $default );
}

/* Custom Font */
if( isset($ts_custom_font_ttf) && $ts_custom_font_ttf['url'] ):
?>
@font-face {
	font-family: 'CustomFont';
	src:url('<?php echo esc_url($ts_custom_font_ttf['url']); ?>') format('truetype');
	font-weight: normal;
	font-style: normal;
}
<?php endif; ?>	
	
:root{
	--nooni-logo-width: <?php echo absint($ts_logo_width); ?>px;
	--nooni-logo-device-width: <?php echo absint($ts_device_logo_width); ?>px;
	
	<?php if( $ts_header_slide_notice_timing ): ?>
	--nooni-marquee-timing: <?php echo esc_html($ts_header_slide_notice_timing); ?>s;
	<?php endif; ?>
	
	--nooni-main-font-family: <?php echo esc_html($ts_body_font); ?>;
	--nooni-main-font-style: <?php echo esc_html($ts_body_font_style); ?>;
	--nooni-main-font-weight: <?php echo esc_html($ts_body_font_weight); ?>;
	--nooni-main-font-medium-family: <?php echo esc_html($ts_body_font_medium); ?>;
	--nooni-main-font-medium-style: <?php echo esc_html($ts_body_font_medium_style); ?>;
	--nooni-main-font-medium-weight: <?php echo esc_html($ts_body_font_medium_weight); ?>;
	--nooni-main-font-bold-family: <?php echo esc_html($ts_body_font_bold); ?>;
	--nooni-main-font-bold-style: <?php echo esc_html($ts_body_font_bold_style); ?>;
	--nooni-main-font-bold-weight: <?php echo esc_html($ts_body_font_bold_weight); ?>;
	--nooni-body-font-size: <?php echo esc_html($ts_body_font_size); ?>;
	--nooni-body-line-height: <?php echo esc_html($ts_body_font_line_height); ?>;
	--nooni-body-letter-spacing: <?php echo esc_html($ts_body_font_letter_spacing); ?>;
	
	--nooni-button-font-family: <?php echo esc_html($ts_button_font); ?>;
	--nooni-button-font-style: <?php echo esc_html($ts_button_font_style); ?>;
	--nooni-button-font-weight: <?php echo esc_html($ts_button_font_weight); ?>;
	--nooni-button-transform: <?php echo esc_html($ts_button_font_transform); ?>;
	--nooni-button-font-size: <?php echo esc_html($ts_button_font_size); ?>;
	--nooni-button-letter-spacing: <?php echo esc_html($ts_button_font_letter_spacing); ?>;
	
	--nooni-menu-font-family: <?php echo esc_html($ts_menu_font); ?>;
	--nooni-menu-font-style: <?php echo esc_html($ts_menu_font_style); ?>;
	--nooni-menu-font-weight: <?php echo esc_html($ts_menu_font_weight); ?>;
	--nooni-menu-font-size: <?php echo esc_html($ts_menu_font_size); ?>;
	--nooni-menu-line-height: <?php echo esc_html($ts_menu_font_line_height); ?>;
	--nooni-submenu-font-size: <?php echo esc_html($ts_sub_menu_font_size); ?>;
	--nooni-submenu-line-height: <?php echo esc_html($ts_sub_menu_font_line_height); ?>;
	
	--nooni-sidebar-menu-font-family: <?php echo esc_html($ts_sidebar_menu_font); ?>;
	--nooni-sidebar-menu-font-style: <?php echo esc_html($ts_sidebar_menu_font_style); ?>;
	--nooni-sidebar-menu-font-weight: <?php echo esc_html($ts_sidebar_menu_font_weight); ?>;
	--nooni-sidebar-menu-font-size: <?php echo esc_html($ts_sidebar_menu_font_size); ?>;
	--nooni-sidebar-menu-line-height: <?php echo esc_html($ts_sidebar_menu_font_line_height); ?>;
	--nooni-sidebar-submenu-font-size: <?php echo esc_html($ts_sidebar_submenu_font_size); ?>;
	--nooni-sidebar-submenu-line-height: <?php echo esc_html($ts_sidebar_submenu_font_line_height); ?>;
	--nooni-sidebar-menu-ipad-font-size: <?php echo esc_html($ts_sidebar_menu_ipad_font_size); ?>;
	--nooni-sidebar-menu-ipad-line-height: <?php echo esc_html($ts_sidebar_menu_ipad_font_line_height); ?>;
	--nooni-sidebar-submenu-ipad-font-size: <?php echo esc_html($ts_sidebar_submenu_ipad_font_size); ?>;
	--nooni-sidebar-submenu-ipad-line-height: <?php echo esc_html($ts_sidebar_submenu_ipad_font_line_height); ?>;
	
	--nooni-mobile-menu-font-family: <?php echo esc_html($ts_sidebar_menu_font); ?>;
	--nooni-mobile-menu-font-style: <?php echo esc_html($ts_sidebar_menu_font_style); ?>;
	--nooni-mobile-menu-font-weight: <?php echo esc_html($ts_sidebar_menu_font_weight); ?>;
	--nooni-mobile-menu-font-size: <?php echo esc_html($ts_mobile_menu_font_size); ?>;
	--nooni-mobile-menu-line-height: <?php echo esc_html($ts_mobile_menu_font_line_height); ?>;
	
	--nooni-blockquote-font-size: <?php echo esc_html($ts_blockquote_font_size); ?>;
	--nooni-single-product-price-font-size: <?php echo esc_html($ts_single_product_price_font_size); ?>;
	--nooni-single-product-sale-price-font-size: <?php echo esc_html($ts_single_product_sale_price_font_size); ?>;
	--nooni-single-product-price-ipad-font-size: <?php echo esc_html($ts_single_product_price_ipad_font_size); ?>;
	--nooni-single-product-sale-price-ipad-font-size: <?php echo esc_html($ts_single_product_sale_price_ipad_font_size); ?>;
	
	--nooni-heading-font-family: <?php echo esc_html($ts_heading_font); ?>;
	--nooni-heading-font-style: <?php echo esc_html($ts_heading_font_style); ?>;
	--nooni-heading-font-weight: <?php echo esc_html($ts_heading_font_weight); ?>;
	--nooni-h1-font-size: <?php echo esc_html($ts_h1_font_size); ?>;
	--nooni-h1-line-height: <?php echo esc_html($ts_h1_font_line_height); ?>;
	--nooni-h1-letter-spacing: <?php echo esc_html($ts_h1_font_letter_spacing); ?>;
	--nooni-h2-font-size: <?php echo esc_html($ts_h2_font_size); ?>;
	--nooni-h2-line-height: <?php echo esc_html($ts_h2_font_line_height); ?>;
	--nooni-h2-letter-spacing: <?php echo esc_html($ts_h2_font_letter_spacing); ?>;
	--nooni-h3-font-size: <?php echo esc_html($ts_h3_font_size); ?>;
	--nooni-h3-line-height: <?php echo esc_html($ts_h3_font_line_height); ?>;
	--nooni-h3-letter-spacing: <?php echo esc_html($ts_h3_font_letter_spacing); ?>;
	--nooni-h4-font-size: <?php echo esc_html($ts_h4_font_size); ?>;
	--nooni-h4-line-height: <?php echo esc_html($ts_h4_font_line_height); ?>;
	--nooni-h4-letter-spacing: <?php echo esc_html($ts_h4_font_letter_spacing); ?>;
	--nooni-h5-font-size: <?php echo esc_html($ts_h5_font_size); ?>;
	--nooni-h5-line-height: <?php echo esc_html($ts_h5_font_line_height); ?>;
	--nooni-h5-letter-spacing: <?php echo esc_html($ts_h5_font_letter_spacing); ?>;
	--nooni-h6-font-size: <?php echo esc_html($ts_h6_font_size); ?>;
	--nooni-h6-line-height: <?php echo esc_html($ts_h6_font_line_height); ?>;
	--nooni-h6-letter-spacing: <?php echo esc_html($ts_h6_font_letter_spacing); ?>;
	--nooni-h1-ipad-font-size: <?php echo esc_html($ts_h1_ipad_font_size); ?>;
	--nooni-h1-ipad-line-height: <?php echo esc_html($ts_h1_ipad_font_line_height); ?>;
	--nooni-h1-ipad-letter-spacing: <?php echo esc_html($ts_h1_ipad_font_letter_spacing); ?>;
	--nooni-h2-ipad-font-size: <?php echo esc_html($ts_h2_ipad_font_size); ?>;
	--nooni-h2-ipad-line-height: <?php echo esc_html($ts_h2_ipad_font_line_height); ?>;
	--nooni-h2-ipad-letter-spacing: <?php echo esc_html($ts_h2_ipad_font_letter_spacing); ?>;
	--nooni-h3-ipad-font-size: <?php echo esc_html($ts_h3_ipad_font_size); ?>;
	--nooni-h3-ipad-line-height: <?php echo esc_html($ts_h3_ipad_font_line_height); ?>;
	--nooni-h3-ipad-letter-spacing: <?php echo esc_html($ts_h3_ipad_font_letter_spacing); ?>;
	--nooni-h4-ipad-font-size: <?php echo esc_html($ts_h4_ipad_font_size); ?>;
	--nooni-h4-ipad-line-height: <?php echo esc_html($ts_h4_ipad_font_line_height); ?>;
	--nooni-h4-ipad-letter-spacing: <?php echo esc_html($ts_h4_ipad_font_letter_spacing); ?>;
	--nooni-h5-ipad-font-size: <?php echo esc_html($ts_h5_ipad_font_size); ?>;
	--nooni-h5-ipad-line-height: <?php echo esc_html($ts_h5_ipad_font_line_height); ?>;
	--nooni-h5-ipad-letter-spacing: <?php echo esc_html($ts_h5_ipad_font_letter_spacing); ?>;
	--nooni-h6-ipad-font-size: <?php echo esc_html($ts_h6_ipad_font_size); ?>;
	--nooni-h6-ipad-line-height: <?php echo esc_html($ts_h6_ipad_font_line_height); ?>;
	--nooni-h6-ipad-letter-spacing: <?php echo esc_html($ts_h6_ipad_font_letter_spacing); ?>;
	--nooni-h1-mobile-font-size: <?php echo esc_html($ts_h1_mobile_font_size); ?>;
	--nooni-h1-mobile-line-height: <?php echo esc_html($ts_h1_mobile_font_line_height); ?>;
	--nooni-h1-mobile-letter-spacing: <?php echo esc_html($ts_h1_mobile_font_letter_spacing); ?>;
	--nooni-h2-mobile-font-size: <?php echo esc_html($ts_h2_mobile_font_size); ?>;
	--nooni-h2-mobile-line-height: <?php echo esc_html($ts_h2_mobile_font_line_height); ?>;
	--nooni-h2-mobile-letter-spacing: <?php echo esc_html($ts_h2_mobile_font_letter_spacing); ?>;
	--nooni-h3-mobile-font-size: <?php echo esc_html($ts_h3_mobile_font_size); ?>;
	--nooni-h3-mobile-line-height: <?php echo esc_html($ts_h3_mobile_font_line_height); ?>;
	--nooni-h3-mobile-letter-spacing: <?php echo esc_html($ts_h3_mobile_font_letter_spacing); ?>;
	--nooni-h4-mobile-font-size: <?php echo esc_html($ts_h4_mobile_font_size); ?>;
	--nooni-h4-mobile-line-height: <?php echo esc_html($ts_h4_mobile_font_line_height); ?>;
	--nooni-h4-mobile-letter-spacing: <?php echo esc_html($ts_h4_mobile_font_letter_spacing); ?>;
	--nooni-h5-mobile-font-size: <?php echo esc_html($ts_h5_mobile_font_size); ?>;
	--nooni-h5-mobile-line-height: <?php echo esc_html($ts_h5_mobile_font_line_height); ?>;
	--nooni-h5-mobile-letter-spacing: <?php echo esc_html($ts_h5_mobile_font_letter_spacing); ?>;
	--nooni-h6-mobile-font-size: <?php echo esc_html($ts_h6_mobile_font_size); ?>;
	--nooni-h6-mobile-line-height: <?php echo esc_html($ts_h6_mobile_font_line_height); ?>;
	--nooni-h6-mobile-letter-spacing: <?php echo esc_html($ts_h6_mobile_font_letter_spacing); ?>;
	
	--nooni-primary-color: <?php echo esc_html($ts_primary_color); ?>;
	--nooni-text-in-primary-color: <?php echo esc_html($ts_text_color_in_bg_primary); ?>;
	<?php if( strpos($ts_primary_color, 'rgba') !== false ): ?>
	--nooni-primary-loading-color: <?php echo esc_html(str_replace('1)', '0.5)', esc_html($ts_primary_color))); ?>;
	<?php endif; ?>
	--nooni-main-bg: <?php echo esc_html($ts_main_content_background_color); ?>;
	--nooni-text-color: <?php echo esc_html($ts_text_color); ?>;
	--nooni-heading-color: <?php echo esc_html($ts_heading_color); ?>;
	--nooni-gray-color: <?php echo esc_html($ts_gray_text_color); ?>;
	--nooni-gray-bg: <?php echo esc_html($ts_gray_bg_color); ?>;
	--nooni-text-in-gray-bg: <?php echo esc_html($ts_text_in_gray_bg_color); ?>;
	--nooni-dropdown-bg: <?php echo esc_html($ts_dropdown_bg_color); ?>;
	--nooni-dropdown-color: <?php echo esc_html($ts_dropdown_color); ?>;
	--nooni-link-color: <?php echo esc_html($ts_link_color); ?>;
	--nooni-link-hover-color: <?php echo esc_html($ts_link_color_hover); ?>;
	--nooni-icon-hover-color: <?php echo esc_html($ts_icon_hover_color); ?>;
	--nooni-tag-color: <?php echo esc_html($ts_tags_color); ?>;
	--nooni-tag-bg: <?php echo esc_html($ts_tags_background_color); ?>;
	--nooni-tag-border: <?php echo esc_html($ts_tags_border_color); ?>;
	--nooni-blockquote-icon-color: <?php echo esc_html($ts_blockquote_icon_color); ?>;
	--nooni-blockquote-text-color: <?php echo esc_html($ts_blockquote_text_color); ?>;
	--nooni-border: <?php echo esc_html($ts_border_color); ?>;
	
	--nooni-input-color: <?php echo esc_html($ts_input_text_color); ?>;
	--nooni-input-background-color: <?php echo esc_html($ts_input_background_color); ?>;
	--nooni-input-border: <?php echo esc_html($ts_input_border_color); ?>;
	
	--nooni-button-color: <?php echo esc_html($ts_button_text_color); ?>;
	--nooni-button-bg: <?php echo esc_html($ts_button_background_color); ?>;
	--nooni-button-border: <?php echo esc_html($ts_button_border_color); ?>;
	--nooni-button-hover-color: <?php echo esc_html($ts_button_text_hover_color); ?>;
	--nooni-button-hover-bg: <?php echo esc_html($ts_button_background_hover_color); ?>;
	--nooni-button-hover-border: <?php echo esc_html($ts_button_border_hover_color); ?>;
	<?php if( strpos($ts_button_text_color, 'rgba') !== false ): ?>
	--nooni-button-loading-color: <?php echo esc_html(str_replace('1)', '0.5)', esc_html($ts_button_text_color))); ?>;
	<?php endif; ?>
	<?php if( strpos($ts_button_text_hover_color, 'rgba') !== false ): ?>
	--nooni-button-loading-hover-color: <?php echo esc_html(str_replace('1)', '0.5)', esc_html($ts_button_text_hover_color))); ?>;
	<?php endif; ?>
	--nooni-button-thumbnail-color: <?php echo esc_html($ts_button_thumbnail_text_color); ?>;
	--nooni-button-thumbnail-bg: <?php echo esc_html($ts_button_thumbnail_bg_color); ?>;
	--nooni-button-thumbnail-hover-color: <?php echo esc_html($ts_button_thumbnail_hover_text_color); ?>;
	--nooni-button-thumbnail-hover-bg: <?php echo esc_html($ts_button_thumbnail_hover_bg_color); ?>;
	<?php if( strpos($ts_button_thumbnail_text_color, 'rgba') !== false ): ?>
	--nooni-button-thumbnail-loading-color: <?php echo esc_html(str_replace('1)', '0.5)', esc_html($ts_button_thumbnail_text_color))); ?>;
	<?php endif; ?>
	<?php if( strpos($ts_button_thumbnail_hover_text_color, 'rgba') !== false ): ?>
	--nooni-button-thumbnail-loading-hover-color: <?php echo esc_html(str_replace('1)', '0.5)', esc_html($ts_button_thumbnail_hover_text_color))); ?>;
	<?php endif; ?>
	
	--nooni-breadcrumb-bg: <?php echo esc_html($ts_breadcrumb_background_color); ?>;
	--nooni-breadcrumb-color: <?php echo esc_html($ts_breadcrumb_text_color); ?>;
	--nooni-breadcrumb-link-color: <?php echo esc_html($ts_breadcrumb_link_color); ?>;
	
	--nooni-top-bg: <?php echo esc_html($ts_header_top_background_color); ?>;
	--nooni-top-color: <?php echo esc_html($ts_header_top_text_color); ?>;
	--nooni-top-border: <?php echo esc_html($ts_header_top_border_color); ?>;
	--nooni-top-link-hover-color: <?php echo esc_html($ts_header_top_link_hover_color); ?>;
	--nooni-top-cart-number-bg: <?php echo esc_html($ts_header_top_icon_count_background_color); ?>;
	--nooni-top-cart-number-color: <?php echo esc_html($ts_header_top_icon_count_text_color); ?>;
	--nooni-middle-bg: <?php echo esc_html($ts_header_middle_background_color); ?>;
	--nooni-middle-color: <?php echo esc_html($ts_header_middle_text_color); ?>;
	--nooni-middle-border: <?php echo esc_html($ts_header_middle_border_color); ?>;
	--nooni-middle-link-hover-color: <?php echo esc_html($ts_header_middle_link_hover_color); ?>;
	--nooni-middle-cart-number-bg: <?php echo esc_html($ts_header_icon_count_background_color); ?>;
	--nooni-middle-cart-number-color: <?php echo esc_html($ts_header_icon_count_text_color); ?>;
	--nooni-bottom-bg: <?php echo esc_html($ts_header_bottom_background_color); ?>;
	--nooni-bottom-color: <?php echo esc_html($ts_header_bottom_text_color); ?>;
	--nooni-bottom-border: <?php echo esc_html($ts_header_bottom_border_color); ?>;
	--nooni-bottom-link-hover-color: <?php echo esc_html($ts_header_bottom_link_hover_color); ?>;
	
	--nooni-footer-bg: <?php echo esc_html($ts_footer_background_color); ?>;
	--nooni-footer-color: <?php echo esc_html($ts_footer_text_color); ?>;
	--nooni-footer-link-color: <?php echo esc_html($ts_footer_link_hover_color); ?>;
	--nooni-footer-border: <?php echo esc_html($ts_footer_border_color); ?>;
	
	--nooni-star-color: <?php echo esc_html($ts_rating_color); ?>;
	--nooni-product-price-color: <?php echo esc_html($ts_product_price_color); ?>;
	--nooni-product-sale-price-color: <?php echo esc_html($ts_product_sale_price_color); ?>;
	--nooni-sale-label-color: <?php echo esc_html($ts_product_sale_label_text_color); ?>;
	--nooni-sale-label-bg: <?php echo esc_html($ts_product_sale_label_background_color); ?>;
	--nooni-new-label-color: <?php echo esc_html($ts_product_new_label_text_color); ?>;
	--nooni-new-label-bg: <?php echo esc_html($ts_product_new_label_background_color); ?>;
	--nooni-hot-label-color: <?php echo esc_html($ts_product_feature_label_text_color); ?>;
	--nooni-hot-label-bg: <?php echo esc_html($ts_product_feature_label_background_color); ?>;
	--nooni-soldout-label-color: <?php echo esc_html($ts_product_outstock_label_text_color); ?>;
	--nooni-soldout-label-bg: <?php echo esc_html($ts_product_outstock_label_background_color); ?>;
	--nooni-meta-label-color: <?php echo esc_html($ts_product_meta_label_text_color); ?>;
}