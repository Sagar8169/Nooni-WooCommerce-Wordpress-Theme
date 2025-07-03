<?php
$redux_url = '';
if( class_exists('ReduxFramework') ){
	$redux_url = ReduxFramework::$_url;
}

$logo_url 					= get_template_directory_uri() . '/images/logo.png'; 
$favicon_url 				= get_template_directory_uri() . '/images/favicon.ico';

$color_image_folder = get_template_directory_uri() . '/admin/assets/images/colors/';
$list_colors = array('default','red');
$preset_colors_options = array();
foreach( $list_colors as $color ){
	$preset_colors_options[$color] = array(
					'alt'      => $color
					,'img'     => $color_image_folder . $color . '.jpg'
					,'presets' => nooni_get_preset_color_options( $color )
	);
}

$family_fonts = array(
	"Arial, Helvetica, sans-serif"                          => "Arial, Helvetica, sans-serif"
	,"'Arial Black', Gadget, sans-serif"                    => "'Arial Black', Gadget, sans-serif"
	,"'Bookman Old Style', serif"                           => "'Bookman Old Style', serif"
	,"'Comic Sans MS', cursive"                             => "'Comic Sans MS', cursive"
	,"Courier, monospace"                                   => "Courier, monospace"
	,"Garamond, serif"                                      => "Garamond, serif"
	,"Georgia, serif"                                       => "Georgia, serif"
	,"Impact, Charcoal, sans-serif"                         => "Impact, Charcoal, sans-serif"
	,"'Lucida Console', Monaco, monospace"                  => "'Lucida Console', Monaco, monospace"
	,"'Lucida Sans Unicode', 'Lucida Grande', sans-serif"   => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif"
	,"'MS Sans Serif', Geneva, sans-serif"                  => "'MS Sans Serif', Geneva, sans-serif"
	,"'MS Serif', 'New York', sans-serif"                   => "'MS Serif', 'New York', sans-serif"
	,"'Palatino Linotype', 'Book Antiqua', Palatino, serif" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif"
	,"Tahoma,Geneva, sans-serif"                            => "Tahoma, Geneva, sans-serif"
	,"'Times New Roman', Times,serif"                       => "'Times New Roman', Times, serif"
	,"'Trebuchet MS', Helvetica, sans-serif"                => "'Trebuchet MS', Helvetica, sans-serif"
	,"Verdana, Geneva, sans-serif"                          => "Verdana, Geneva, sans-serif"
	,"CustomFont"                          					=> "CustomFont"
);

$header_layout_options = array();
$header_image_folder = get_template_directory_uri() . '/admin/assets/images/headers/';
for( $i = 1; $i <= 6; $i++ ){
	$header_layout_options['v' . $i] = array(
		'alt'  => sprintf(esc_html__('Header Layout %s', 'nooni'), $i)
		,'img' => $header_image_folder . 'header_v'.$i.'.jpg'
	);
}

$loading_screen_options = array();
$loading_image_folder = get_template_directory_uri() . '/images/loading/';
for( $i = 1; $i <= 10; $i++ ){
	$loading_screen_options[$i] = array(
		'alt'  => sprintf(esc_html__('Loading Image %s', 'nooni'), $i)
		,'img' => $loading_image_folder . 'loading_'.$i.'.svg'
	);
}

$footer_block_options = nooni_get_footer_block_options();

$breadcrumb_layout_options = array();
$breadcrumb_image_folder = get_template_directory_uri() . '/admin/assets/images/breadcrumbs/';
for( $i = 1; $i <= 3; $i++ ){
	$breadcrumb_layout_options['v' . $i] = array(
		'alt'  => sprintf(esc_html__('Breadcrumb Layout %s', 'nooni'), $i)
		,'img' => $breadcrumb_image_folder . 'breadcrumb_v'.$i.'.jpg'
	);
}

$sidebar_options = array();
$default_sidebars = nooni_get_list_sidebars();
if( is_array($default_sidebars) ){
	foreach( $default_sidebars as $key => $_sidebar ){
		$sidebar_options[$_sidebar['id']] = $_sidebar['name'];
	}
}

$product_loading_image = get_template_directory_uri() . '/images/prod_loading.gif';

$mailchimp_forms = array();
$args = array(
	'post_type'			=> 'mc4wp-form'
	,'post_status'		=> 'publish'
	,'posts_per_page'	=> -1
);
$forms = new WP_Query( $args );
if( !empty( $forms->posts ) && is_array( $forms->posts ) ) {
	foreach( $forms->posts as $p ) {
		$mailchimp_forms[$p->ID] = $p->post_title;
	}
}

$option_fields = array();

/*** General Tab ***/
$option_fields['general'] = array(
	array(
		'id'        => 'section-logo-favicon'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Logo - Favicon', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_logo'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Logo', 'nooni' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Select an image file for the main logo', 'nooni' )
		,'readonly' => false
		,'default'  => array( 'url' => $logo_url )
	)
	,array(
		'id'        => 'ts_logo_mobile'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Mobile Logo', 'nooni' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Display this logo on mobile', 'nooni' )
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_logo_sticky'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Sticky Logo', 'nooni' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Display this logo on sticky header', 'nooni' )
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_logo_menu_mobile'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Mobile Menu Logo', 'nooni' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Display this logo on mobile menu', 'nooni' )
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_logo_width'
		,'type'     => 'text'
		,'url'      => true
		,'title'    => esc_html__( 'Logo Width', 'nooni' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Set width for logo (in pixels)', 'nooni' )
		,'default'  => '160'
	)
	,array(
		'id'        => 'ts_device_logo_width'
		,'type'     => 'text'
		,'url'      => true
		,'title'    => esc_html__( 'Logo Width on Device', 'nooni' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Set width for logo (in pixels)', 'nooni' )
		,'default'  => '120'
	)
	,array(
		'id'        => 'ts_favicon'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Favicon', 'nooni' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Select a PNG, GIF or ICO image', 'nooni' )
		,'readonly' => false
		,'default'  => array( 'url' => $favicon_url )
	)
	,array(
		'id'        => 'ts_text_logo'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Text Logo', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Nooni'
	)

	,array(
		'id'        => 'section-layout-style'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Layout Style', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Layout Fullwidth', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
	)
	,array(
		'id'        => 'ts_header_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Header Layout Fullwidth', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'required'	=> array( 'ts_layout_fullwidth', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_main_content_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Main Content Layout Fullwidth', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'required'	=> array( 'ts_layout_fullwidth', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_footer_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Footer Layout Fullwidth', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'required'	=> array( 'ts_layout_fullwidth', 'equals', '1' )
	)
	,array(
		'id'       	=> 'ts_layout_style'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Layout Style', 'nooni' )
		,'subtitle' => esc_html__( 'You can override this option for the individual page', 'nooni' )
		,'desc'     => ''
		,'options'  => array(
			'boxed' 	=> 'Boxed'
			,'wide' 	=> 'Wide'
		)
		,'default'  => 'wide'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
		,'required'	=> array( 'ts_layout_fullwidth', 'equals', '0' )
	)
	
	,array(
		'id'        => 'section-rtl'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Right To Left', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_enable_rtl'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Right To Left', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
	)
	
	,array(
		'id'        => 'section-smooth-scroll'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Smooth Scroll', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_smooth_scroll'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Smooth Scroll', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
	)
	
	,array(
		'id'        => 'section-back-to-top-button'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Back To Top Button', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_back_to_top_button'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Back To Top Button', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_back_to_top_button_on_mobile'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Back To Top Button On Mobile', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'section-page-not-found'
		,'type'     => 'section'
		,'title'    => esc_html__( '404 Page', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_404_page_image'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( '404 Image', 'nooni' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Choose image background for 404 text', 'nooni' )
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array( 
		'id'       	=> 'ts_404_page' 
		,'type'     => 'select' 
		,'title'    => esc_html__( '404 Page', 'nooni' ) 
		,'subtitle' => esc_html__( 'Select the page which displays the 404 page', 'nooni' ) 
		,'desc'     => ''
		,'data'     => 'pages'
		,'default'	=> ''
	)
	,array(
		'id'        => 'section-loading-screen'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Loading Screen', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_loading_screen'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Loading Screen', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
	)
	,array(
		'id'        => 'ts_loading_image'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Loading Image', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $loading_screen_options
		,'default'  => '1'
	)
	,array(
		'id'        => 'ts_custom_loading_image'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Custom Loading Image', 'nooni' )
		,'desc'     => ''
		,'subtitle' => ''
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'       	=> 'ts_display_loading_screen_in'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Display Loading Screen In', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'all-pages' 		=> esc_html__( 'All Pages', 'nooni' )
			,'homepage-only' 	=> esc_html__( 'Homepage Only', 'nooni' )
			,'specific-pages' 	=> esc_html__( 'Specific Pages', 'nooni' )
		)
		,'default'  => 'all-pages'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_loading_screen_exclude_pages'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Exclude Pages', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'data'     => 'pages'
		,'multi'    => true
		,'default'	=> ''
		,'required'	=> array( 'ts_display_loading_screen_in', 'equals', 'all-pages' )
	)
	,array(
		'id'       	=> 'ts_loading_screen_specific_pages'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Specific Pages', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'data'     => 'pages'
		,'multi'    => true
		,'default'	=> ''
		,'required'	=> array( 'ts_display_loading_screen_in', 'equals', 'specific-pages' )
	)
);

/*** Color Scheme Tab ***/
$option_fields['color-scheme'] = array(
	array(
		'id'          => 'ts_color_scheme'
		,'type'       => 'image_select'
		,'presets'    => true
		,'full_width' => false
		,'title'      => esc_html__( 'Select Color Scheme of Theme', 'nooni' )
		,'subtitle'   => ''
		,'desc'       => ''
		,'options'    => $preset_colors_options
		,'default'    => 'default'
		,'class'      => ''
	)
	,array(
		'id'        => 'section-general-colors'
		,'type'     => 'section'
		,'title'    => esc_html__( 'General Colors', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'      => 'info-primary-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Primary Colors', 'nooni' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_primary_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Primary Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#d10202'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_text_color_in_bg_primary'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Text Color In Background Primary Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-secondary-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Secondary Colors', 'nooni' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_gray_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Gray Text Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#848484'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_gray_bg_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Gray Background Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#efefef'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_text_in_gray_bg_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Text In Gray Background Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-main-content-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Main Content Colors', 'nooni' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_main_content_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Main Content Background Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Text Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_heading_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Heading Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_dropdown_bg_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Dropdown/Sidebar Background Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_dropdown_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Dropdown/Sidebar Text Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Border Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ebebeb'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_link_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Link Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#d10202'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_link_color_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Link Color Hover', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#848484'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_icon_hover_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Icon Hover Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#d10202'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_blockquote_icon_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Blockquote Icon Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#959595'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-tags-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Tags Colors', 'nooni' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_tags_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Tags Text Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#848484'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_tags_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Tags Background Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_tags_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Tags Border Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ebebeb'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-input-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Input Colors', 'nooni' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_input_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Input Text Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_input_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Input Background Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_input_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Input Border Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ebebeb'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'        => 'section-buttons-color'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Buttons Color', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'      => 'info-default-button'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Default Button', 'nooni' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_button_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Text Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_button_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Background Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_button_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Border Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_button_text_hover_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Text Hover Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_button_background_hover_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Background Hover Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#d10202'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_button_border_hover_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Border Hover Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#d10202'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-button-thumbnails-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Icon/Buttons On Product Thumbnail Color (quickview, wishlist, compare...)', 'nooni' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_button_thumbnail_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Text Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_button_thumbnail_bg_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Background Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_button_thumbnail_hover_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Text Hover Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_button_thumbnail_hover_bg_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Background Hover Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#d10202'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-breadcrumb-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Breadcrumb Colors', 'nooni' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_breadcrumb_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Breadcrumb Background Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_breadcrumb_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Breadcrumb Text Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_breadcrumb_link_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Breadcrumb Link Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#848484'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'        => 'section-header-colors'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Header Colors', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'      => 'info-header-top'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Top', 'nooni' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_header_top_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Top Text Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_top_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Top Background Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_top_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Top Border Color', 'nooni' )
		,'subtitle' => esc_html__( 'Only available on some header layouts', 'nooni' )
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_top_link_hover_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Top Link Hover Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#848484'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_top_icon_count_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Top Cart/Wishlist Count Number Background Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_top_icon_count_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Top Cart/Wishlist Count Number Text Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-header-middle'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Middle', 'nooni' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_header_middle_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Middle Text Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_middle_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Middle Background Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_middle_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Middle Border Color', 'nooni' )
		,'subtitle' => esc_html__( 'Only available on some header layouts', 'nooni' )
		,'default'  => array(
			'color' 	=> '#ebebeb'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_middle_link_hover_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Middle Link Hover Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#d10202'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_icon_count_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Middle Cart/Wishlist Count Number Background Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_icon_count_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Middle Cart/Wishlist Count Number Text Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-header-bottom'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Bottom', 'nooni' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_header_bottom_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Bottom Text Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_bottom_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Bottom Background Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_bottom_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Bottom Border Color', 'nooni' )
		,'subtitle' => esc_html__( 'Only available on some header layouts', 'nooni' )
		,'default'  => array(
			'color' 	=> '#ebebeb'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_bottom_link_hover_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Bottom Link Hover Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#d10202'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'        => 'section-footer-colors'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Footer Colors', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       => 'ts_footer_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Footer Background Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_footer_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Footer Text Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#848484'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_footer_link_hover_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Footer Link Hover Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#d10202'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_footer_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Footer Border Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#d6d6d6'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'        => 'section-product-colors'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Product Colors', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       => 'ts_product_price_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Product Price Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_sale_price_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Product Sale Price Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#959595'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_rating_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Product Rating Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-product-label-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Product Label Colors (Style on Product Thumbnail)', 'nooni' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_product_sale_label_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Sale Label Text Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_sale_label_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Sale Label Background Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_new_label_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'New Label Text Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_new_label_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'New Label Background Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffa632'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_feature_label_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Feature Label Text Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_feature_label_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Feature Label Background Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#d10202'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_outstock_label_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'OutStock Label Text Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_outstock_label_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'OutStock Label Background Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#919191'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-product-label-meta-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Product Label Colors (Style Label After Product Thumbnail)', 'nooni' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_product_meta_label_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Label Text Color', 'nooni' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#d10202'
			,'alpha'	=> 1
		)
	)
);

/*** Typography Tab ***/
$option_fields['typography'] = array(
	array(
		'id'        => 'section-fonts'
		,'type'     => 'section'
		,'title'    => esc_html__( 'GENERAL FONT', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       			=> 'ts_body_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Body Font', 'nooni' )
		,'subtitle' 		=> ''
		,'google'   		=> true
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'color'   			=> false
		,'letter-spacing' 	=> true
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Inter'
			,'font-weight' 		=> '400'
			,'font-size'   		=> '15px'
			,'line-height' 		=> '24px'
			,'letter-spacing' 	=> '0.375px'
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       			=> 'ts_body_font_medium'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Body Font Medium', 'nooni' )
		,'subtitle' 		=> ''
		,'google'   		=> true
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'line-height'  	=> false
		,'font-size'  		=> false
		,'letter-spacing' 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Inter'
			,'font-weight' 		=> '500'
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       			=> 'ts_body_font_bold'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Body Font Bold', 'nooni' )
		,'subtitle' 		=> ''
		,'google'   		=> true
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'line-height'  	=> false
		,'font-size'  		=> false
		,'letter-spacing' 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Inter'
			,'font-weight' 		=> '700'
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       			=> 'ts_button_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Button Font', 'nooni' )
		,'subtitle' 		=> ''
		,'google'   		=> true
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'color'   			=> false
		,'line-height' 		=> false
		,'letter-spacing' 	=> true
		,'text-transform' 	=> true
		,'preview'			=> array('always_display' => true)
		,'default'  			=> array(
			'font-family'  		=> 'Inter'
			,'font-weight' 		=> '700'
			,'font-size'   		=> '14px'
			,'letter-spacing'   => '1.05px'
			,'text-transform'   => 'uppercase'
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       		=> 'ts_blockquote_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'Blockquote Font Size', 'nooni' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '30px'
			,'line-height' 		=> '48px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'      => 'info-product-price-fonts'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'PRODUCT PRICE FONT SIZE', 'nooni' )
		,'desc'   => ''
	)
	,array(
		'id'       		=> 'ts_single_product_price_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'Single Product Price Font Size', 'nooni' )
		,'subtitle' 	=> esc_html__( 'Font size of price in product detail page', 'nooni' )
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> false
		,'line-height' 		=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '36px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       		=> 'ts_single_product_sale_price_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'Single Product Sale Price Font Size', 'nooni' )
		,'subtitle' 	=> esc_html__( 'Font size of discount price in product detail page', 'nooni' )
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> false
		,'line-height' 		=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '20px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'      => 'info-menu-fonts'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'MAIN MENU FONT', 'nooni' )
		,'desc'   => ''
	)
	,array(
		'id'       			=> 'ts_menu_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Main Menu Font', 'nooni' )
		,'subtitle' 		=> ''
		,'google'   		=> true
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'color'   			=> false
		,'letter-spacing' 	=> false
		,'preview'			=> array('always_display' => true)
		,'default'  			=> array(
			'font-family'  		=> 'Inter'
			,'font-weight' 		=> '400'
			,'font-size'   		=> '16px'
			,'line-height'   	=> '24px'
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       		=> 'ts_sub_menu_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'Main Menu - Sub Menu Font Size', 'nooni' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '14px'
			,'line-height' 		=> '24px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'      => 'info-sidebar-menu-fonts'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'SIDEBAR MENU FONT', 'nooni' )
		,'desc'   => ''
	)
	,array(
		'id'       			=> 'ts_sidebar_menu_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Sidebar Menu Font', 'nooni' )
		,'subtitle' 		=> ''
		,'google'   		=> true
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'color'   			=> false
		,'line-height' 		=> true
		,'letter-spacing' 	=> false
		,'preview'			=> array('always_display' => true)
		,'default'  			=> array(
			'font-family'  		=> 'Inter'
			,'font-weight' 		=> '400'
			,'font-size'   		=> '24px'
			,'line-height'   	=> '28px'
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       		=> 'ts_sidebar_submenu_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'Sidebar Menu - Sub Menu Font Size', 'nooni' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '18px'
			,'line-height' 		=> '24px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'      => 'info-mobile-menu-fonts'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'MOBILE MENU FONT', 'nooni' )
		,'desc'   => ''
	)
	,array(
		'id'       			=> 'ts_mobile_menu_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Mobile Menu Font', 'nooni' )
		,'subtitle' 		=> ''
		,'google'   		=> true
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'color'   			=> false
		,'line-height' 		=> true
		,'letter-spacing' 	=> false
		,'preview'			=> array('always_display' => true)
		,'default'  			=> array(
			'font-family'  		=> 'Inter'
			,'font-weight' 		=> '400'
			,'font-size'   		=> '16px'
			,'line-height'   	=> '24px'
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'      => 'info-heading-fonts'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'HEADING FONT', 'nooni' )
		,'desc'   => ''
	)
	,array(
		'id'       			=> 'ts_heading_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Heading Font', 'nooni' )
		,'subtitle' 		=> ''
		,'google'   		=> true
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'line-height'  	=> false
		,'font-size'  		=> false
		,'letter-spacing' 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Inter'
			,'font-weight' 		=> '700'
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       			=> 'ts_h1_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Font Size H1', 'nooni' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '48px'
			,'line-height' 		=> '54px'
			,'letter-spacing' 	=> '3.6px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       		=> 'ts_h2_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'Font Size H2', 'nooni' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '36px'
			,'line-height' 		=> '40px'
			,'letter-spacing' 	=> '2.5px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       		=> 'ts_h3_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'Font Size H3', 'nooni' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '30px'
			,'line-height' 		=> '36px'
			,'letter-spacing' 	=> '2px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       		=> 'ts_h4_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'Font Size H4', 'nooni' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '25px'
			,'line-height' 		=> '30px'
			,'letter-spacing' 	=> '1.2px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       		=> 'ts_h5_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'Font Size H5', 'nooni' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '20px'
			,'line-height' 		=> '28px'
			,'letter-spacing' 	=> '1px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       		=> 'ts_h6_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'Font Size H6', 'nooni' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '18px'
			,'line-height' 		=> '24px'
			,'letter-spacing' 	=> '0.9px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'        => 'section-font-sizes-responsive'
		,'type'     => 'section'
		,'title'    => esc_html__( 'RESPONSIVE FONT SIZE', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'      => 'info-font-size-tablet'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Tablet', 'nooni' )
		,'desc'   => ''
	)
	,array(
		'id'       		=> 'ts_h1_ipad_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'H1 Font Size', 'nooni' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '36px'
			,'line-height' 		=> '40px'
			,'letter-spacing' 	=> '2px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       		=> 'ts_h2_ipad_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'H2 Font Size', 'nooni' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '30px'
			,'line-height' 		=> '36px'
			,'letter-spacing' 	=> '1.7px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       		=> 'ts_h3_ipad_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'H3 Font Size', 'nooni' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '25px'
			,'line-height' 		=> '30px'
			,'letter-spacing' 	=> '1.2px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       		=> 'ts_h4_ipad_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'H4 Font Size', 'nooni' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '20px'
			,'line-height' 		=> '28px'
			,'letter-spacing' 	=> '0.9px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       		=> 'ts_h5_ipad_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'H5 Font Size', 'nooni' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '18px'
			,'line-height' 		=> '24px'
			,'letter-spacing' 	=> '0.75px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       		=> 'ts_h6_ipad_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'H6 Font Size', 'nooni' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '16px'
			,'line-height' 		=> '24px'
			,'letter-spacing' 	=> '0.75px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       		=> 'ts_sidebar_menu_ipad_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'Sidebar Menu Font Size', 'nooni' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '18px'
			,'line-height' 		=> '26px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       		=> 'ts_sidebar_submenu_ipad_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'Sidebar Sub Menu Font Size', 'nooni' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '15px'
			,'line-height' 		=> '24px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       		=> 'ts_single_product_price_ipad_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'Single Product Price Font Size', 'nooni' )
		,'subtitle' 	=> esc_html__( 'Font size of price in product detail page', 'nooni' )
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> false
		,'line-height' 		=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '25px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       		=> 'ts_single_product_sale_price_ipad_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'Single Product Sale Price Font Size', 'nooni' )
		,'subtitle' 	=> esc_html__( 'Font size of discount price in product detail page', 'nooni' )
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> false
		,'line-height' 		=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '18px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'      => 'info-font-size-mobile'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Mobile', 'nooni' )
		,'desc'   => ''
	)
	,array(
		'id'       		=> 'ts_h1_mobile_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'H1 Font Size', 'nooni' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '30px'
			,'line-height' 		=> '36px'
			,'letter-spacing' 	=> '1.2px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       		=> 'ts_h2_mobile_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'H2 Font Size', 'nooni' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '25px'
			,'line-height' 		=> '30px'
			,'letter-spacing' 	=> '1px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       		=> 'ts_h3_mobile_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'H3 Font Size', 'nooni' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '20px'
			,'line-height' 		=> '28px'
			,'letter-spacing' 	=> '0.9px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       		=> 'ts_h4_mobile_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'H4 Font Size', 'nooni' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '18px'
			,'line-height' 		=> '24px'
			,'letter-spacing' 	=> '0.75px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       		=> 'ts_h5_mobile_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'H5 Font Size', 'nooni' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '16px'
			,'line-height' 		=> '24px'
			,'letter-spacing' 	=> '0.75px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       		=> 'ts_h6_mobile_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'H6 Font Size', 'nooni' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'letter-spacing' 	=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '15px'
			,'line-height' 		=> '24px'
			,'letter-spacing' 	=> '0.75px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'        => 'section-custom-font'
		,'type'     => 'section'
		,'title'    => esc_html__( 'CUSTOM FONT', 'nooni' )
		,'subtitle' => esc_html__( 'If you get the error message \'Sorry, this file type is not permitted for security reasons\', you can add this line define(\'ALLOW_UNFILTERED_UPLOADS\', true); to the wp-config.php file', 'nooni' )
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_custom_font_ttf'
		,'type'     => 'media'
		,'url'      => true
		,'preview'  => false
		,'title'    => esc_html__( 'Custom Font ttf', 'nooni' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Upload the .ttf font file. To use it, you select CustomFont in the Standard Fonts group', 'nooni' )
		,'default'  => array( 'url' => '' )
		,'mode'		=> 'application'
	)
);

/*** Header Tab ***/
$option_fields['header'] = array(
	array(
		'id'        => 'section-header-options'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Header Options', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_header_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Header Layout', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $header_layout_options
		,'default'  => 'v1'
	)
	,array(
		'id'        => 'ts_header_store_notice'
		,'type'     => 'textarea'
		,'title'    => esc_html__( 'Header Notice', 'nooni' )
		,'subtitle' => esc_html__( 'Not available in header layout 5', 'nooni' )
		,'validate'	=> 'html'
		,'desc'     => ''
		,'default'  => ''
	)
	,array(
		'id'        => 'ts_header_slide_notice'
		,'type'     => 'multi_text'
		,'title'    => esc_html__( 'Header Notices', 'nooni' )
		,'subtitle' => esc_html__( 'Only available in header layout 5. Show multiple notices as slider', 'nooni' )
		,'desc'     => ''
		,'default'  => array('')
	)
	,array(
		'id'        => 'ts_header_slide_notice_timing'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Notice Animation Timing', 'nooni' )
		,'subtitle' => esc_html__( 'The Timing is in seconds. Please put the number only in this field. Default is 30', 'nooni' )
		,'desc'     => ''
		,'default'  => ''
	)
	,array(
		'id'        => 'ts_enable_sticky_header'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Sticky Header', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'nooni' )
		,'off'		=> esc_html__( 'Disable', 'nooni' )
	)
	,array(
		'id'        => 'ts_enable_search'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Search', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'nooni' )
		,'off'		=> esc_html__( 'Disable', 'nooni' )
	)
	,array(
		'id'        => 'ts_enable_tiny_wishlist'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Wishlist', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'nooni' )
		,'off'		=> esc_html__( 'Disable', 'nooni' )
	)
	,array(
		'id'        => 'ts_header_currency'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Header Currency', 'nooni' )
		,'subtitle' => esc_html__( 'Only available on some header layouts. If you don\'t install WooCommerce Multilingual plugin, it may display demo html', 'nooni' )
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'nooni' )
		,'off'		=> esc_html__( 'Disable', 'nooni' )
	)
	,array(
		'id'        => 'ts_header_language'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Header Language', 'nooni' )
		,'subtitle' => esc_html__( 'Only available on some header layouts. If you don\'t install WPML plugin, it may display demo html', 'nooni' )
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'nooni' )
		,'off'		=> esc_html__( 'Disable', 'nooni' )
	)
	,array(
		'id'        => 'ts_enable_tiny_account'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'My Account', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'nooni' )
		,'off'		=> esc_html__( 'Disable', 'nooni' )
	)
	,array(
		'id'        => 'ts_enable_tiny_shopping_cart'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Shopping Cart', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'nooni' )
		,'off'		=> esc_html__( 'Disable', 'nooni' )
	)
	,array(
		'id'        => 'ts_shopping_cart_sidebar'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Shopping Cart Sidebar', 'nooni' )
		,'subtitle' => esc_html__( 'Show shopping cart in sidebar instead of dropdown. You need to update cart after changing', 'nooni' )
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'nooni' )
		,'off'		=> esc_html__( 'Disable', 'nooni' )
		,'required'	=> array( 'ts_enable_tiny_shopping_cart', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_show_shopping_cart_after_adding'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Show Shopping Cart After Adding Product To Cart', 'nooni' )
		,'subtitle' => esc_html__( 'You need to enable Ajax add to cart in WooCommerce > Settings > Products', 'nooni' )
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'nooni' )
		,'off'		=> esc_html__( 'Disable', 'nooni' )
		,'required'	=> array( 'ts_shopping_cart_sidebar', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_add_to_cart_effect'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Add To Cart Effect', 'nooni' )
		,'subtitle' => esc_html__( 'You need to enable Ajax add to cart in WooCommerce > Settings > Products. If "Show Shopping Cart After Adding Product To Cart" is enabled, this option will be disabled', 'nooni' )
		,'options'  => array(
			'0'				=> esc_html__( 'None', 'nooni' )
			,'fly_to_cart'	=> esc_html__( 'Fly To Cart', 'nooni' )
			,'show_popup'	=> esc_html__( 'Show Popup', 'nooni' )
		)
		,'default'  => '0'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	
	,array(
		'id'        => 'ts_enable_header_social_icons'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Header Social Icons', 'nooni' )
		,'subtitle' => esc_html__( 'Only available in header layout 5. For other layout please contact our support team.', 'nooni' )
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'nooni' )
		,'off'		=> esc_html__( 'Disable', 'nooni' )
	)
	,array(
		'id'        => 'ts_facebook_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Facebook URL', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => '#'
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_twitter_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Twitter URL', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => '#'
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_instagram_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Instagram URL', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => '#'
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_pinterest_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Pinterest URL', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => '#'
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_youtube_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Youtube URL', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_linkedin_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'LinkedIn URL', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_custom_social_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Custom Social URL', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_custom_social_class'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Custom Social Icon', 'nooni' )
		,'subtitle' => esc_html__( 'Put the class of icon. Nooni support our custom font with prefix tb-icon-brand- + social name. Ex: tb-icon-brand-facebook. Or you can use font awesome 5. Ex: fab fa-facebook-f', 'nooni' )
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	
	,array(
		'id'        => 'section-breadcrumb-options'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Breadcrumb Options', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_breadcrumb_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Breadcrumb Layout', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $breadcrumb_layout_options
		,'default'  => 'v1'
	)
	,array(
		'id'        => 'ts_enable_breadcrumb_background_image'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Breadcrumbs Background Image', 'nooni' )
		,'subtitle' => esc_html__( 'You can set background color by going to Color Scheme tab > Breadcrumb Colors section', 'nooni' )
		,'default'  => true
	)
	,array(
		'id'        => 'ts_bg_breadcrumbs'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Breadcrumbs Background Image', 'nooni' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Select a new image to override the default background image', 'nooni' )
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_breadcrumb_bg_parallax'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Breadcrumbs Background Parallax', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
	)
	,array(
		'id'        => 'ts_breadcrumb_product_taxonomy_description'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Taxonomy Description In Breadcrumbs', 'nooni' )
		,'subtitle' => esc_html__( 'Show product taxonomy description (category, tags, ...) in breadcrumbs area on the product taxonomy page', 'nooni' )
		,'default'  => false
	)
);

/*** Footer Tab ***/
$option_fields['footer'] = array(
	array(
		'id'       	=> 'ts_footer_block'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Footer Block', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $footer_block_options
		,'default'  => '0'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
);

/*** Menu Tab ***/
$option_fields['menu'] = array(
	array(
		'id'             => 'ts_menu_thumb_width'
		,'type'          => 'slider'
		,'title'         => esc_html__( 'Menu Thumbnail Width', 'nooni' )
		,'subtitle'      => ''
		,'desc'          => esc_html__( 'Min: 5, max: 60, step: 1, default value: 54', 'nooni' )
		,'default'       => 54
		,'min'           => 5
		,'step'          => 1
		,'max'           => 60
		,'display_value' => 'text'
	)
	,array(
		'id'             => 'ts_menu_thumb_height'
		,'type'          => 'slider'
		,'title'         => esc_html__( 'Menu Thumbnail Height', 'nooni' )
		,'subtitle'      => ''
		,'desc'          => esc_html__( 'Min: 5, max: 60, step: 1, default value: 54', 'nooni' )
		,'default'       => 54
		,'min'           => 5
		,'step'          => 1
		,'max'           => 60
		,'display_value' => 'text'
	)
	,array(
		'id'        => 'ts_enable_menu_overlay'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Menu Background Overlay', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'nooni' )
		,'off'		=> esc_html__( 'Disable', 'nooni' )
	)
);

/*** Blog Tab ***/
$option_fields['blog'] = array(
	array(
		'id'        => 'section-blog'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Blog', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_blog_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Blog Layout', 'nooni' )
		,'subtitle' => esc_html__( 'This option is available when Front page displays the latest posts', 'nooni' )
		,'desc'     => ''
		,'options'  => array(
			'0-1-0' => array(
				'alt'  => esc_html__('Fullwidth', 'nooni')
				,'img' => $redux_url . 'assets/img/1col.png'
			)
			,'1-1-0' => array(
				'alt'  => esc_html__('Left Sidebar', 'nooni')
				,'img' => $redux_url . 'assets/img/2cl.png'
			)
			,'0-1-1' => array(
				'alt'  => esc_html__('Right Sidebar', 'nooni')
				,'img' => $redux_url . 'assets/img/2cr.png'
			)
			,'1-1-1' => array(
				'alt'  => esc_html__('Left & Right Sidebar', 'nooni')
				,'img' => $redux_url . 'assets/img/3cm.png'
			)
		)
		,'default'  => '0-1-1'
	)
	,array(
		'id'       	=> 'ts_blog_left_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Left Sidebar', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'blog-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_blog_right_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Right Sidebar', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'blog-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_blog_columns'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Blog Columns', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			1	=> 1
			,2	=> 2
			,3	=> 3
		)
		,'default'  => '1'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_blog_item_layout'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Blog Item Layout', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'item-grid'		=> esc_html__( 'Grid', 'nooni' )
			,'item-list'	=> esc_html__( 'List', 'nooni' )
		)
		,'default'	=> 'item-grid'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_blog_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Thumbnail', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_blog_date'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Date', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_blog_title'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Title', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_blog_author'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Author', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_blog_comment'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Comment', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_blog_read_more'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Read More Button', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_blog_categories'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Categories', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_blog_excerpt'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Excerpt', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_blog_excerpt_strip_tags'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Excerpt Strip All Tags', 'nooni' )
		,'subtitle' => esc_html__( 'Strip all html tags in Excerpt', 'nooni' )
		,'default'  => false
	)
	,array(
		'id'        => 'ts_blog_excerpt_max_words'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Blog Excerpt Max Words', 'nooni' )
		,'subtitle' => esc_html__( 'Input -1 to show full excerpt', 'nooni' )
		,'desc'     => ''
		,'default'  => '-1'
	)

	,array(
		'id'        => 'section-blog-details'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Blog Details', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_blog_details_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Blog Details Layout', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'0-1-0' => array(
				'alt'  => esc_html__('Fullwidth', 'nooni')
				,'img' => $redux_url . 'assets/img/1col.png'
			)
			,'1-1-0' => array(
				'alt'  => esc_html__('Left Sidebar', 'nooni')
				,'img' => $redux_url . 'assets/img/2cl.png'
			)
			,'0-1-1' => array(
				'alt'  => esc_html__('Right Sidebar', 'nooni')
				,'img' => $redux_url . 'assets/img/2cr.png'
			)
			,'1-1-1' => array(
				'alt'  => esc_html__('Left & Right Sidebar', 'nooni')
				,'img' => $redux_url . 'assets/img/3cm.png'
			)
		)
		,'default'  => '0-1-0'
	)
	,array(
		'id'       	=> 'ts_blog_details_left_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Left Sidebar', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'blog-detail-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_blog_details_right_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Right Sidebar', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'blog-detail-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_blog_details_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Thumbnail', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'       	=> 'ts_blog_details_thumbnail_style'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Blog Thumbnail Style', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'thumbnail-default'		=> esc_html__( 'Default', 'nooni' )
			,'thumbnail-parallax'	=> esc_html__( 'Parallax', 'nooni' )
		)
		,'default'	=> 'thumbnail-default'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_blog_details_date'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Date', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_blog_details_title'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Title', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_blog_details_author'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Author', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_blog_details_comment'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Comment', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_blog_details_content'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Content', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_blog_details_tags'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Tags', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_blog_details_categories'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Categories', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_blog_details_sharing'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Sharing', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_blog_details_sharing_sharethis'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Sharing - Use ShareThis', 'nooni' )
		,'subtitle' => esc_html__( 'Use share buttons from sharethis.com. You need to add key below', 'nooni')
		,'default'  => true
		,'required'	=> array( 'ts_blog_details_sharing', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_blog_details_sharing_sharethis_key'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Blog Sharing - ShareThis Key', 'nooni' )
		,'subtitle' => esc_html__( 'You get it from script code. It is the value of "property" attribute', 'nooni' )
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_blog_details_sharing', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_blog_details_author_box'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Author Box', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_blog_details_navigation'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Navigation', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_blog_details_related_posts'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Related Posts', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_blog_details_comment_form'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Comment Form', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
);

/*** WooCommerce Tab ***/
$option_fields['woocommerce'] = array(
	array(
		'id'        => 'section-product-label'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Product Label', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       	=> 'ts_product_label_style'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Label Style', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'rectangle' 	=> esc_html__( 'Rectangle', 'nooni' )
			,'square' 		=> esc_html__( 'Square', 'nooni' )
			,'circle' 		=> esc_html__( 'Circle', 'nooni' )
		)
		,'default'  => 'rectangle'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_product_label_pos'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Label Position', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'on-thumbnail' 		=> esc_html__( 'On Thumbnail', 'nooni' )
			,'after-thumbnail' 	=> esc_html__( 'After Thumbnail', 'nooni' )
		)
		,'default'  => 'on-thumbnail'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_product_show_new_label'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product New Label', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_product_new_label_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product New Label Text', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'New'
		,'required'	=> array( 'ts_product_show_new_label', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_product_show_new_label_time'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product New Label Time', 'nooni' )
		,'subtitle' => esc_html__( 'Number of days which you want to show New label since product is published', 'nooni' )
		,'desc'     => ''
		,'default'  => '30'
		,'required'	=> array( 'ts_product_show_new_label', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_product_feature_label_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Feature Label Text', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Hot'
	)
	,array(
		'id'        => 'ts_product_out_of_stock_label_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Out Of Stock Label Text', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Sold out'
	)
	,array(
		'id'       	=> 'ts_show_sale_label_as'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Show Sale Label As', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'text' 		=> esc_html__( 'Text', 'nooni' )
			,'number' 	=> esc_html__( 'Number', 'nooni' )
			,'percent' 	=> esc_html__( 'Percent', 'nooni' )
		)
		,'default'  => 'percent'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_product_sale_label_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Sale Label Text', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Sale'
	)
	,array(
		'id'        => 'ts_product_sale_percent_prefix'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Sale Label Prefix', 'nooni' )
		,'subtitle' => esc_html__( 'This text will be shown before amount discount in the After Thumbnail style', 'nooni' )
		,'desc'     => ''
		,'default'  => 'Sale off'
		,'required'	=> array( array('ts_product_label_pos', 'equals', 'after-thumbnail'), array('ts_show_sale_label_as', '!=', 'text') )
	)
	
	,array(
		'id'        => 'section-product-hover'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Product Hover', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       	=> 'ts_product_hover_style'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Hover Style', 'nooni' )
		,'subtitle' => esc_html__( 'Select the style of buttons/icons when hovering on product', 'nooni' )
		,'desc'     => ''
		,'options'  => array(
			'hover-horizontal-style' 			=> esc_html__( 'Horizontal Style', 'nooni' )
			,'hover-vertical-style' 		=> esc_html__( 'Vertical Style', 'nooni' )
		)
		,'default'  => 'hover-vertical-style'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_effect_product'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Back Product Image', 'nooni' )
		,'subtitle' => esc_html__( 'Show another product image on hover. It will show an image from Product Gallery', 'nooni' )
		,'default'  => false
	)
	,array(
		'id'        => 'ts_product_tooltip'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Tooltip', 'nooni' )
		,'subtitle' => esc_html__( 'Show tooltip when hovering on buttons/icons on product', 'nooni' )
		,'default'  => true
	)
	
	,array(
		'id'        => 'section-lazy-load'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Lazy Load', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_lazy_load'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Activate Lazy Load', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_placeholder_img'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Placeholder Image', 'nooni' )
		,'desc'     => ''
		,'subtitle' => ''
		,'readonly' => false
		,'default'  => array( 'url' => $product_loading_image )
	)
	
	,array(
		'id'        => 'section-quickshop'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Quickshop', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_enable_quickshop'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Activate Quickshop', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
	)

	,array(
		'id'        => 'section-catalog-mode'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Catalog Mode', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_enable_catalog_mode'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Catalog Mode', 'nooni' )
		,'subtitle' => esc_html__( 'Hide all Add To Cart buttons on your site. You can also hide Shopping cart by going to Header tab > turn Shopping Cart option off', 'nooni' )
		,'default'  => false
	)
	
	,array(
		'id'        => 'section-ajax-search'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Ajax Search', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_ajax_search'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Ajax Search', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_ajax_search_number_result'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Number Of Results', 'nooni' )
		,'subtitle' => esc_html__( 'Input -1 to show all results', 'nooni' )
		,'desc'     => ''
		,'default'  => '6'
	)
);

/*** Shop/Product Category Tab ***/
$option_fields['shop-product-category'] = array(
	array(
		'id'        => 'ts_prod_cat_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Shop/Product Category Layout', 'nooni' )
		,'subtitle' => esc_html__( 'Sidebar is only available if Filter Widget Area is disabled', 'nooni' )
		,'desc'     => ''
		,'options'  => array(
			'0-1-0' => array(
				'alt'  => esc_html__('Fullwidth', 'nooni')
				,'img' => $redux_url . 'assets/img/1col.png'
			)
			,'1-1-0' => array(
				'alt'  => esc_html__('Left Sidebar', 'nooni')
				,'img' => $redux_url . 'assets/img/2cl.png'
			)
			,'0-1-1' => array(
				'alt'  => esc_html__('Right Sidebar', 'nooni')
				,'img' => $redux_url . 'assets/img/2cr.png'
			)
			,'1-1-1' => array(
				'alt'  => esc_html__('Left & Right Sidebar', 'nooni')
				,'img' => $redux_url . 'assets/img/3cm.png'
			)
		)
		,'default'  => '0-1-0'
	)
	,array(
		'id'       	=> 'ts_prod_cat_left_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Left Sidebar', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'product-category-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_prod_cat_right_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Right Sidebar', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'product-category-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_prod_cat_grid_list_toggle'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Grid/List Toggle', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'       	=> 'ts_prod_grid_list_toggle_default'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Grid/List Toggle Default', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'grid'		=> esc_html__( 'Grid', 'nooni' ),
			'list'		=> esc_html__( 'List', 'nooni' )
		)
		,'default'  => 'grid'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
		,'required'	=> array('ts_prod_cat_grid_list_toggle', 'equals', '1')
	)
	,array(
		'id'       	=> 'ts_prod_cat_columns'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Columns', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'3'			=> '3'
			,'4'		=> '4'
			,'5'		=> '5'
			,'6'		=> '6'
		)
		,'default'  => '4'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_prod_cat_per_page'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Products Per Page', 'nooni' )
		,'subtitle' => esc_html__( 'Number of products per page', 'nooni' )
		,'desc'     => ''
		,'default'  => '12'
	)
	,array(
		'id'       	=> 'ts_prod_cat_loading_type'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Loading Type', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'default'			=> esc_html__( 'Default', 'nooni' )
			,'infinity-scroll'	=> esc_html__( 'Infinity Scroll', 'nooni' )
			,'load-more-button'	=> esc_html__( 'Load More Button', 'nooni' )
			,'ajax-pagination'	=> esc_html__( 'Ajax Pagination', 'nooni' )
		)
		,'default'  => 'ajax-pagination'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_prod_cat_collapse_scroll_sidebar'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Collapse And Scroll Widgets In Sidebar', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_cat_per_page_dropdown'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Products Per Page Dropdown', 'nooni' )
		,'subtitle' => esc_html__( 'Allow users to select number of products per page', 'nooni' )
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_cat_onsale_checkbox'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Products On Sale Checkbox', 'nooni' )
		,'subtitle' => esc_html__( 'Allow users to view only the discounted products', 'nooni' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_filter_widget_area'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Filter Widget Area', 'nooni' )
		,'subtitle' => esc_html__( 'Display Filter Widget Area on the Shop/Product Category page. If enabled, sidebar will be removed', 'nooni' )
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'		=> 'ts_filter_widget_area_style'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Filter Widget Area Style', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'dropdown'			=> esc_html__( 'Dropdown', 'nooni' )
			,'sidebar'			=> esc_html__( 'Sidebar', 'nooni' )
			,'floating-sidebar'	=> esc_html__( 'Floating Sidebar', 'nooni' )
		)
		,'default'  => 'dropdown'
		,'select2'	=> array( 'allowClear' => false, 'minimumResultsForSearch' => 'Infinity' )
		,'required'	=> array( 'ts_filter_widget_area', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_cat_filter_heading'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Filter Sidebar Heading', 'nooni' )
		,'subtitle' => esc_html__( 'Used in Floating Sidebar', 'nooni' )
		,'desc'     => ''
		,'default'  => 'Filter Products'
	)
	,array(
		'id'		=> 'ts_show_filter_widget_area_by_default'
		,'type'		=> 'switch'
		,'title'	=> esc_html__( 'Show Filter Widget Area By Default', 'nooni' )
		,'subtitle'	=> ''
		,'desc'		=> ''
		,'default'	=> false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
		,'required'	=> array( 'ts_filter_widget_area_style', 'equals', 'sidebar' )	
	)
	,array(
		'id'        => 'ts_prod_cat_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Thumbnail', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_cat_label'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Label', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_cat_brand'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Brands', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_cat_cat'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Categories', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_cat_title'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Title', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_cat_sku'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product SKU', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_cat_rating'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Rating', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_cat_price'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Price', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_cat_add_to_cart'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Add To Cart Button', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_cat_desc'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Short Description - Grid View', 'nooni' )
		,'subtitle' => esc_html__( 'Show product description on grid view', 'nooni' )
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_cat_desc_words'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Short Description - Grid View - Limit Words', 'nooni' )
		,'subtitle' => esc_html__( 'Number of words to show product description on grid view. It is also used for product elements', 'nooni' )
		,'desc'     => ''
		,'default'  => '10'
	)
	,array(
		'id'        => 'ts_prod_cat_list_desc'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Short Description - List View', 'nooni' )
		,'subtitle' => esc_html__( 'Show product description on list view', 'nooni' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_cat_list_desc_words'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Short Description - List View - Limit Words', 'nooni' )
		,'subtitle' => esc_html__( 'Number of words to show product description on list view', 'nooni' )
		,'desc'     => ''
		,'default'  => '50'
	)
	,array(
		'id'        => 'ts_prod_cat_color_swatch'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Color Swatches', 'nooni' )
		,'subtitle' => esc_html__( 'Show the color attribute of variations. The slug of the color attribute has to be "color"', 'nooni' )
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'       	=> 'ts_prod_cat_number_color_swatch'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Number Of Color Swatches', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			2	=> 2
			,3	=> 3
			,4	=> 4
			,5	=> 5
			,6	=> 6
		)
		,'default'  => '3'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
		,'required'	=> array( 'ts_prod_cat_color_swatch', 'equals', '1' )
	)
);

/*** Product Details Tab ***/
$option_fields['product-details'] = array(
	array(
		'id'        => 'ts_prod_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Product Layout', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'0-1-0' => array(
				'alt'  => esc_html__('Fullwidth', 'nooni')
				,'img' => $redux_url . 'assets/img/1col.png'
			)
			,'1-1-0' => array(
				'alt'  => esc_html__('Left Sidebar', 'nooni')
				,'img' => $redux_url . 'assets/img/2cl.png'
			)
			,'0-1-1' => array(
				'alt'  => esc_html__('Right Sidebar', 'nooni')
				,'img' => $redux_url . 'assets/img/2cr.png'
			)
			,'1-1-1' => array(
				'alt'  => esc_html__('Left & Right Sidebar', 'nooni')
				,'img' => $redux_url . 'assets/img/3cm.png'
			)
		)
		,'default'  => '0-1-0'
	)
	,array(
		'id'       	=> 'ts_prod_left_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Left Sidebar', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'product-detail-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_prod_right_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Right Sidebar', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'product-detail-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_prod_layout_fullwidth'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Layout Fullwidth', 'nooni' )
		,'subtitle' => esc_html__( 'Override the Layout Fullwidth option in the General tab', 'nooni' )
		,'desc'     => ''
		,'options'  => array(
			'default'	=> esc_html__( 'Default', 'nooni' )
			,'0'		=> esc_html__( 'No', 'nooni' )
			,'1'		=> esc_html__( 'Yes', 'nooni' )
		)
		,'default'  => 'default'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_prod_header_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Header Layout Fullwidth', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'required'	=> array( 'ts_prod_layout_fullwidth', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_main_content_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Main Content Layout Fullwidth', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'required'	=> array( 'ts_prod_layout_fullwidth', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_footer_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Footer Layout Fullwidth', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'required'	=> array( 'ts_prod_layout_fullwidth', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_breadcrumb'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Breadcrumb', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_cloudzoom'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Cloud Zoom', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_lightbox'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Lightbox', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_attr_dropdown'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Attribute Dropdown', 'nooni' )
		,'subtitle' => esc_html__( 'If you turn it off, the dropdown will be replaced by image or text label', 'nooni' )
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_attr_color_text'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Color Attribute Text', 'nooni' )
		,'subtitle' => esc_html__( 'Show text for the Color attribute instead of color/color image', 'nooni' )
		,'default'  => false
		,'required'	=> array( 'ts_prod_attr_dropdown', 'equals', '0' )
	)
	,array(
		'id'        => 'ts_prod_attr_color_variation_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Color Attribute Variation Thumbnail', 'nooni' )
		,'subtitle' => esc_html__( 'Use the variation thumbnail for the Color attribute. The Color slug has to be "color". You need to specify Color for variation (not any)', 'nooni' )
		,'default'  => true
		,'required'	=> array( 'ts_prod_attr_color_text', 'equals', '0' )
	)
	,array(
		'id'        => 'ts_prod_next_prev_navigation'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Next/Prev Product Navigation', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Thumbnail', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'       	=> 'ts_prod_gallery_layout'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Gallery Layout', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'vertical'		=> esc_html__( 'Vertical', 'nooni' )
			,'horizontal'	=> esc_html__( 'Horizontal', 'nooni' )
			,'grid'			=> esc_html__( 'Grid', 'nooni' )
		)
		,'default'  => 'vertical'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_prod_thumbnails_slider_mobile'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Thumbnails Slider On Mobile', 'nooni' )
		,'subtitle' => esc_html__( 'If enabled, it will change all thumbnail/gallery layouts to slider on mobile', 'nooni' )
		,'default'  => true
		,'required'	=> array('ts_prod_gallery_layout', 'equals', 'grid')
	)
	,array(
		'id'        => 'ts_prod_group_heading'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Heading For Grouped Product', 'nooni' )
		,'subtitle' => esc_html__( 'Show this heading above list of grouped products', 'nooni' )
		,'desc'     => ''
		,'default'  => 'Part Of This Collection'
	)
	,array(
		'id'        => 'ts_prod_wfbt_in_summary'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Frequently Bought Together In Summary', 'nooni' )
		,'subtitle' => esc_html__( 'Move Frequently Bought Together to product summary in laptop screen & larger', 'nooni' )
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_label'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Label', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_title'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Title', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_title_in_content'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Title In Content', 'nooni' )
		,'subtitle' => esc_html__( 'Display the product title in the page content instead of above the breadcrumbs', 'nooni' )
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_rating'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Rating', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_sku'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product SKU', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_availability'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Availability', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_short_desc'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Short Description', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_count_down'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Count Down', 'nooni' )
		,'subtitle' => esc_html__( 'You have to activate ThemeSky plugin', 'nooni' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_price'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Price', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_discount_percent'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Discount Percent', 'nooni' )
		,'subtitle' => esc_html__( 'Show discount percent next to the price', 'nooni' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
		,'required'	=> array( 'ts_prod_price', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_add_to_cart'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Add To Cart Button', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_ajax_add_to_cart'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Ajax Add To Cart', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'required'	=> array( 'ts_prod_add_to_cart', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_buy_now'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Buy Now Button', 'nooni' )
		,'subtitle' => esc_html__( 'Only support the simple and variable products', 'nooni' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_brand'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Brands', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_cat'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Categories', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_tag'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Tags', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_size_chart'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Size Chart', 'nooni' )
		,'subtitle' => esc_html__( 'Size Chart Popup is only available if Attribute Dropdown is disabled and the slug of the Size attribute contain "size". Ex: taille-size', 'nooni' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_more_less_content'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product More/Less Content', 'nooni' )
		,'subtitle' => esc_html__( 'Show more/less content in the Description tab', 'nooni' )
		,'default'  => false
	)
	,array(
		'id'        => 'ts_prod_sharing'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Sharing', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_sharing_sharethis'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Sharing - Use ShareThis', 'nooni' )
		,'subtitle' => esc_html__( 'Use share buttons from sharethis.com. You need to add key below', 'nooni' )
		,'default'  => false
		,'required'	=> array( 'ts_prod_sharing', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_sharing_sharethis_key'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Sharing - ShareThis Key', 'nooni' )
		,'subtitle' => esc_html__( 'You get it from script code. It is the value of "property" attribute', 'nooni' )
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_prod_sharing', 'equals', '1' )
	)

	,array(
		'id'        => 'section-product-tabs'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Product Tabs', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_tabs'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Tabs', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'       	=> 'ts_prod_tabs_position'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Tabs Position', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'after_summary'				=> esc_html__( 'After Summary', 'nooni' )
			,'inside_summary'			=> esc_html__( 'Inside Summary', 'nooni' )
		)
		,'default'  => 'after_summary'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_prod_tabs_accordion'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Tabs Accordion', 'nooni' )
		,'subtitle' => esc_html__( 'Show tabs as accordion. If you add more custom tabs, please make sure that your tab content has heading (h2) at the top', 'nooni' )
		,'desc'     => ''
		,'options'  => array(
			'0'				=> esc_html__( 'None', 'nooni' )
			,'desktop'		=> esc_html__( 'On Desktop', 'nooni' )
			,'mobile'		=> esc_html__( 'On Mobile', 'nooni' )
			,'both'			=> esc_html__( 'On All Screens', 'nooni' )
		)
		,'default'  => 'mobile'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_prod_custom_tab'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Custom Tab', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_custom_tab_title'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Custom Tab Title', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Custom tab'
	)
	,array(
		'id'        => 'ts_prod_custom_tab_content'
		,'type'     => 'editor'
		,'title'    => esc_html__( 'Product Custom Tab Content', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => esc_html__( 'Your custom content goes here. You can add the content for individual product', 'nooni' )
		,'args'     => array(
			'wpautop'        => false
			,'media_buttons' => true
			,'textarea_rows' => 5
			,'teeny'         => false
			,'quicktags'     => true
		)
	)
	
	,array(
		'id'        => 'section-ads-banner'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Ads Banner', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_ads_banner'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Ads Banner', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_ads_banner_content'
		,'type'     => 'editor'
		,'title'    => esc_html__( 'Ads Banner Content', 'nooni' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'args'     => array(
			'wpautop'        => false
			,'media_buttons' => true
			,'textarea_rows' => 5
			,'teeny'         => false
			,'quicktags'     => true
		)
	)
	
	,array(
		'id'        => 'section-related-up-sell-products'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Related - Up-Sell', 'nooni' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_related'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Related Products', 'nooni' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
	,array(
		'id'        => 'ts_prod_upsells'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Up-Sell Products', 'nooni' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'nooni' )
		,'off'		=> esc_html__( 'Hide', 'nooni' )
	)
);

/*** Custom Code Tab ***/
$option_fields['custom-code'] = array(
	array(
		'id'        => 'ts_custom_css_code'
		,'type'     => 'ace_editor'
		,'title'    => esc_html__( 'Custom CSS Code', 'nooni' )
		,'subtitle' => ''
		,'mode'     => 'css'
		,'theme'    => 'monokai'
		,'desc'     => ''
		,'default'  => ''
	)
	,array(
		'id'        => 'ts_custom_javascript_code'
		,'type'     => 'ace_editor'
		,'title'    => esc_html__( 'Custom Javascript Code', 'nooni' )
		,'subtitle' => ''
		,'mode'     => 'javascript'
		,'theme'    => 'monokai'
		,'desc'     => ''
		,'default'  => ''
	)
);