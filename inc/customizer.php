<?php
/**
 * Customizer elements for the theme. 
 *
 */

 
function retail_motion_customize_register( $wp_customize ) {
	
}
add_action( 'customize_register', 'retail_motion_customize_register' );


//JS functionality for dynamically changing the live customizer
function retail_motion_customize_preview_js() {
	wp_enqueue_script( 'retail_motion_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'retail_motion_customize_preview_js' );



//add additional theme customizer elements
function add_theme_customizer_support($wp_customize){
	
	//update site name, description and show/hide so they are dynamic in the editor
	//$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	//$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	//$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	//if we have support for custom background
	if(current_theme_supports('custom-background')){
			
		//COLOURS
		//body color
		$wp_customize->add_setting('pacific_text_color', 
			array(
				'default'			=> '#333333',
				'sanitize_callback'	=> 'sanitize_hex_color'
			)
		); 
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize, 
			'pacific_text_color',
			array(
				'label'				=> 'Text Color',
				'description'		=> 'Color for standard text / body content',
				'section'			=> 'colors',
				'type'				=> 'color'
				)
			)
		);
		
		//header (h1-h6) color
		$wp_customize->add_setting('pacific_header_color', 
			array(
				'default'			=> '#333333',
				'sanitize_callback'	=> 'sanitize_hex_color'
			)
		); 
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize, 
			'pacific_header_color',
			array(
				'label'				=> 'H1 - H6 Color',
				'description'		=> 'Color for H1-H6 tags',
				'section'			=> 'colors',
				'type'				=> 'color'
				)
			)
		);
		
		
		//Footer Color Settings		
		//Footer background color
		$wp_customize->add_setting('pacific_footer_background_color', 
			array(
				'default'			=> '#333333',
				'sanitize_callback'	=> 'sanitize_hex_color'
			)
		); 
		$wp_customize->add_setting('pacific_footer_text_color', 
			array(
				'default'			=> '#ffffff',
				'sanitize_callback'	=> 'sanitize_hex_color'
			)
		); 
		
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize, 
			'pacific_footer_background_color',
			array(
				'label'				=> 'Footer Background Color',
				'description'		=> 'Background color for the footer.',
				'section'			=> 'colors',
				'type'				=> 'color'
				)
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize, 
			'pacific_footer_text_color',
			array(
				'label'				=> 'Footer Text Color',
				'description'		=> 'Colour used for text including headers when displayed in the footer',
				'section'			=> 'colors',
				'type'				=> 'color'
				)
			)
		);
		
		
		//Misc settings 
		$wp_customize->add_setting('pacific_accent_color', 
			array(
				'default'			=> '#3487BF',
				'sanitize_callback'	=> 'sanitize_hex_color'
			)
		); 
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize, 
			'pacific_accent_color',
			array(
				'label'				=> 'Theme Accent Colour',
				'description'		=> 'Colour used for various small element such as blockquote text, UL / OL bullets and dividers',
				'section'			=> 'colors',
				'type'				=> 'color'
				)
			)
		);
		
		
		
			
		//CUSTOM BACKGROUND
		//Additional custom-background settings
		$wp_customize->add_setting('pacific_background_size',
			array(
				'default'			=> 'cover'
			)
		);
		$wp_customize->add_control('pacific_background_size', 
			array(
				'label'				=> 'Background Size',
				'description'		=> 'How the background image will pan and scale',
				'section'			=> 'background_image',
				'type'				=> 'radio',
				'settings'			=> 'pacific_background_size',
				'choices'			=> array(
					'cover'				=> 'Cover',
					'contain'			=> 'Contain'
				)
			)
		);
		
		//CUSTOM HEADER
		//Additional custom-header settings to control output
		$wp_customize->add_setting('pacific_header_background_color',
			array(
				'default'			=> '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_setting('pacific_header_text_color',
			array(
				'default'			=> '#333333',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);	
		$wp_customize->add_setting('pacific_header_button_primary_text',
			array(
				'default'			=> ''
			)
		);	
		$wp_customize->add_setting('pacific_header_button_primary_url',
			array(
				'default'			=> ''
			)
		);

		$wp_customize->add_setting('pacific_header_button_secondary_text',
			array(
				'default'			=> ''
			)
		);	
		$wp_customize->add_setting('pacific_header_button_secondary_url',
			array(
				'default'			=> ''
			)
		);	
		
		
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize, 
			'pacific_header_background_color',
			array(
				'label'				=> 'Header Background Color',
				'description'		=> 'Background color for the header, useful if you don\'t want to upload an image',
				'section'			=> 'header_image',
				'type'				=> 'color'
				)
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize, 
			'pacific_header_text_color',
			array(
				'label'				=> 'Header Text Color',
				'description'		=> 'Colour of the main title and subtitle when displayed in the header. Also determines search / nav icon colour',
				'section'			=> 'header_image',
				'type'				=> 'color'
				)
			)
		);
		$wp_customize->add_control('pacific_header_button_primary_text', 
			array(
				'label'				=> 'Primary CTA Text',
				'description'		=> 'The main call to action text button displayed in the header',
				'section'			=> 'header_image',
				'type'				=> 'text',
				'settings'			=> 'pacific_header_button_primary_text',
			)
		);
		$wp_customize->add_control('pacific_header_button_primary_url', 
			array(
				'label'				=> 'Primary CTA URL',
				'description'		=> 'The URL the main call to action button will link to',
				'section'			=> 'header_image',
				'type'				=> 'url',
				'settings'			=> 'pacific_header_button_primary_url',
			)
		);
		$wp_customize->add_control('pacific_header_button_secondary_text', 
			array(
				'label'				=> 'Secondary CTA Text',
				'description'		=> 'The secondary call to action text button displayed in the header',
				'section'			=> 'header_image',
				'type'				=> 'text',
				'settings'			=> 'pacific_header_button_secondary_text',
			)
		);
		$wp_customize->add_control('pacific_header_button_secondary_url', 
			array(
				'label'				=> 'Secondary CTA URL',
				'description'		=> 'The URL the secondary call to action button will link to',
				'section'			=> 'header_image',
				'type'				=> 'url',
				'settings'			=> 'pacific_header_button_secondary_url',
			)
		);
		
		
	}
	
	
	
}

add_action('customize_register','add_theme_customizer_support');


//Output dynamic styles to the head based on customizer
function output_dynamic_customizer_styles(){
	//background image options
	$pacific_background_size = get_theme_mod('pacific_background_size');
	$background_color = get_theme_mod('background_color', get_theme_support('custom-background', 'default-color'));
	//universal color options
	$pacific_text_color = get_theme_mod('pacific_text_color');
	$pacific_header_color = get_theme_mod('pacific_header_color');
	$pacific_accent_color = get_theme_mod('pacific_accent_color', '#3487bf');
	//footer color options
	$pacific_footer_background_color = get_theme_mod('pacific_footer_background_color', '#333'); 
	$pacific_footer_text_color = get_theme_mod('pacific_footer_text_color', '#fff'); 
	//custom header options
	$pacific_header_text_color = get_theme_mod('pacific_header_text_color', '#333');
	
	?>
	<style type="text/css" id="theme-customizier-styles">
		body{
			background-size: <?php echo $pacific_background_size; ?>;
		}
		
		<?php if(!empty($background_color)){ ?>
		body{
			background-color: #<?php echo $background_color; ?>;
		}
		<?php } ?>
		
		<?php if(!empty($pacific_text_color)){ ?>
		body {
			color: <?php echo $pacific_text_color; ?>;
		}
		<?php } ?>
		
		<?php if(!empty($pacific_header_color)){ ?>
		h1,h2,h3,h4,h5,h6{
			color: <?php echo $pacific_header_color; ?>;
		}
		<?php } ?>
		
		<?php if(!empty($pacific_footer_background_color)){ ?>
		.site-footer{
			background-color: <?php echo $pacific_footer_background_color; ?>;
		}
		<?php } ?>
		
		<?php if(!empty($pacific_footer_text_color)){ ?>
		.site-footer,
		.site-footer a,
		.site-footer h1,
		.site-footer h2,
		.site-footer h3,
		.site-footer h4,
		.site-footer h5,
		.site-footer h6{
			color: <?php echo $pacific_footer_text_color; ?>;
		}
		<?php } ?>
		
		<?php if(!empty($pacific_accent_color)){ ?>
		hr{
			background-color: <?php echo $pacific_accent_color; ?>;
		}
		blockquote, q{
			border-top-color: <?php echo $pacific_accent_color; ?>;
			border-bottom-color: <?php echo $pacific_accent_color; ?>;
			color: <?php echo $pacific_accent_color; ?>;
		}
		.entry-content ul li:before,
		.entry-content ol li:before{
			background-color: <?php echo $pacific_accent_color; ?>;
		}
		<?php } ?>
		
		<?php if(!empty($pacific_header_text_color)){?>
		.site-header .header-inner{
			color: <?php echo $pacific_header_text_color; ?>;
		}
		<?php } ?>
		
		<?php if(!empty($pacific_accent_color)){?>
		.nav-links .page-numbers{
			background-color: <?php echo $pacific_accent_color; ?>;
			color: #fff;
		}
		<?php } ?>
		
		<?php if(!empty($pacific_accent_color)){?>
		li.current_page_item > a,
		.vertical-nav li.current_page_item > a{
			color: <?php echo $pacific_accent_color;?>;
		}
		<?php } ?>
		
		
	</style>
	<?php
	
}
add_action('wp_head', 'output_dynamic_customizer_styles', 99, 1);
