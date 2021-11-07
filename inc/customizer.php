<?php
/**
 * eirerepublic Theme Customizer
 *
 * @package eirerepublic
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function eirerepublic_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'eirerepublic_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'eirerepublic_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'eirerepublic_customize_register' );

/**
 * Add custom customizer sections
 * 
 * @param WP_Customize_Manager $wp_customize Theme Customizer object. 
 */
function eirerepublic_add_sections( $wp_customize ) {
	$wp_customize->add_panel( 'custom', array(
		'title' => 'Custom'
	));

	$wp_customize->add_section( 'contact_block', array(
		'title' => 'Contact Block',
		'panel' => 'custom'
	));

	$wp_customize->add_section( 'home', array(
		'title' => 'Home Page',
		'panel' => 'custom'
	));

	$wp_customize->add_setting( 'contact_block_heading', array(
		'default'   => 'Example heading text'
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_block_heading_control', array(
		'label' => 'Heading',
		'section' => 'contact_block',
		'settings' => 'contact_block_heading'
	)));

	$wp_customize->add_setting( 'contact_block_text', array(
		'default'   => 'Example paragraph text'
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_block_text_control', array(
		'label' => 'Text',
		'section' => 'contact_block',
		'settings' => 'contact_block_text',
		'type' => 'textarea'
	)));

	$wp_customize->add_setting( 'home_hero_heading', array(
		'default'   => 'Example heading text'
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_hero_heading_control', array(
		'label' => 'Heading',
		'section' => 'home',
		'settings' => 'home_hero_heading'
	)));

	$wp_customize->add_setting( 'home_hero_text', array(
		'default'   => 'Example paragraph text'
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_hero_text_control', array(
		'label' => 'Text',
		'section' => 'home',
		'settings' => 'home_hero_text',
		'type' => 'textarea'
	)));

	$wp_customize->add_setting('home_hero_image');
    
	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'home_hero_image_control', array(
		'label' => 'Image',
		'section' => 'home',
		'settings' => 'home_hero_image',
		'width' => 500,
		'height' => 500
	)));
}
add_action('customize_register', 'eirerepublic_add_sections');

/**
 * Remove unnecesary customizer sections
 * 
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function eirerepublic_remove_sections( $wp_customize ) {
	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('background_image');
}
add_action('customize_register', 'eirerepublic_remove_sections');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function eirerepublic_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function eirerepublic_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function eirerepublic_customize_preview_js() {
	wp_enqueue_script( 'eirerepublic-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'eirerepublic_customize_preview_js' );
