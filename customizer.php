<?php
//customizer
function cd_customizer_settings( $wp_customize ){
	$wp_customize->add_section ( 'social_links', array(
		'title' => 'Social Links',
		'priority' => 100,
	) );

	$wp_customize->add_setting('facebook_field', array(
		'default' => 'Default Value',
		'type' => 'theme_mod',
		'sanitization_callback' => 'facebook_sanitize_function',
	) );

	$wp_customize->add_control('facebook_field', array(
		'label' => 'Facebook Field',
		'section' => 'social_links',
		'settings' => 'facebook_field',
		'type' => 'text',
	));	

	//twitter field
	$wp_customize->add_setting('twitter_field',array(
		'default' => 'Default Value',
		'type' => 'theme_mod',
		'sanitization_callback' => 'twitter_sanitization_function',
	));

	$wp_customize->add_control('twitter_field', array(
		'label' => 'Twitter Field',
		'section' => 'social_links',
		'settings' => 'twitter_field',
		'type' => 'text',
	));

	$wp_customize->add_setting('linked_in_field',array(
		'default' => 'Default Value',
		'type' => 'theme_mod',
		'sanitization_callback' => 'linked_in_sanitization_function'
	));

	$wp_customize->add_control('linked_in_field', array(
		'label' => 'LinkedIn Field',
		'section' => 'social_links',
		'type' => 'text',
		'settings' => 'linked_in_field',

	));

	$wp_customize->add_setting('dribble_field', array(
		'default' => 'Default Value',
		'type' => 'theme_mod',

	));

	$wp_customize->add_control('dribble_field', array(
		'label' => 'Dribble Field',
		'section' => 'social_links',
		'type' => 'text',
		'settings' => 'dribble_field',
	));

	$wp_customize->add_setting('contact', array(
		'default' => 'Default Value',
		'type' => 'theme_mod',

	));

	$wp_customize->add_control('contact', array(
		'label' => 'Phone Number',
		'section' => 'social_links',
		'type' => 'text',
		'settings' => 'contact',
	));




}

function facebook_sanitization_function( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
} 

function twitter_sanitization_function( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
} 

function linked_in_sanitization_function( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
} 

add_action('customize_register', 'cd_customizer_settings');


//customizer to upload cover image for drinks and bar section
function upload_image_customizer( $wp_customize ){
	$wp_customize->add_section ( 'cover_image', array(
		'title' => 'Cover Image',
		'priority' => 100,
	) );

	$wp_customize->add_setting('drinks_and_bar', array(
		'type' => 'theme_mod'
	));

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'drinks_and_bar', array(
		'label' => 'Drinks And Bar',
		'settings' => 'drinks_and_bar',
		'section' => 'cover_image'
	)) );

	//recent blog image
	$wp_customize->add_setting('blog_image', array(
		'type' => 'theme_mod'
	));

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'blog_image', array(
		'label' => 'Recent Blogs',
		'settings' => 'blog_image',
		'section' => 'cover_image'
	)) );


}
add_action('customize_register', 'upload_image_customizer');
