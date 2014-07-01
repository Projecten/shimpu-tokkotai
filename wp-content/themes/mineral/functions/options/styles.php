<?php


/**
 * Load the patterns into arrays.
 */

$pexeto_styles_options=array( array(
		'name' => 'Style settings',
		'type' => 'title',
		'img' => 'icon-write'
	),

	array(
		'type' => 'open',
		'subtitles'=>array(
			array( 'id'=>'general', 'name'=>'General' ),
			array( 'id'=>'bg', 'name'=>'Background Options' ),
			array( 'id'=>'text', 'name'=>'Text Styles' ),
			array( 'id'=>'fonts', 'name'=>'Fonts' ),
			array( 'id'=>'add_styles', 'name'=>'Additional Styles' )
		)
	),

	/* ------------------------------------------------------------------------*
	 * GENERAL
	 * ------------------------------------------------------------------------*/

	array(
		'type' => 'subtitle',
		'id' => 'general'
	),


	

	array(
		'name' => 'Predefined Accent Color',
		'id' => 'accent_color',
		'type' => 'stylecolor',
		'options' => array( '26ae90','00a569','98be5d','029fc5','4090ba','257fb1','dd6053','d14836', 'f49257', 'efc860','bf6b8a','876096','535961','cdc8b2','8c8c8c','323a45', 'ef567a', '165b9e' ),
		'std' => '26ae90',
		'desc' => 'This is the accent color of the small detailed elements such as 
			page title section, buttons, image hover, some link colors, etc.'
	),

	array(
		'name' => 'Custom Accent Color',
		'id' => 'custom_accent_color',
		'type' => 'color',
		'desc' => 'You can pick a custom accent color for your theme. 
			This field has priority over the "Predefined Accent Color" field above. '
	),

	array(
		'name' => 'Background Color',
		'id' => 'custom_body_bg',
		'type' => 'color',
		'std' => 'ffffff',
		'desc' => 'You can select a custom background color for your theme. '
	),


	array(
		'name' => 'Main body text color',
		'id' => 'body_color',
		'type' => 'color',
		'std' => '777777',
		'desc' => 'The color set to this option will be applied to the main 
		content and sidebar text color.'
	),

	array(
		'name' => 'Icons style',
		'id' => 'icon_style',
		'type' => 'select',
		'options' => array( 
			array( 'id'=>'dark', 'name'=>'Dark' ), 
			array( 'id'=>'light', 'name'=>'Light' ) ),
		'std' => 'dark',
		'desc' => 'You can set the default style of all the icons used in the
		theme, such as social icons, blog icons, share icons, etc. If you have
		set a dark skin to the theme, you can select the light icon style so
		they can be more visible.'
	),



	array(
		'type' => 'close' ),



	/* ------------------------------------------------------------------------*
	 * BACKGROUND OPTIONS
	 * ------------------------------------------------------------------------*/

	array(
		'type' => 'subtitle',
		'id'=>'bg',
	),


	array(
		'name' => 'Secondary elements background',
		'id' => 'secondary_color',
		'type' => 'color',
		'std' => 'faf9f4',
		'desc' => 'This is the secondary content color, used in widgets 
			(tabs, accordion), footer call to action section, input fields, etc.'
	),

	array(
		'name' => 'Lines and borders color',
		'id' => 'border_color',
		'std' => 'f3f3f3',
		'type' => 'color'
	),

	array(
		'name' => 'Footer background color',
		'id' => 'footer_bg',
		'std' => '252525',
		'type' => 'color'
	),

	array(
		'name' => 'Footer copyright section background color',
		'id' => 'footer_copyright_bg',
		'std' => '141414',
		'type' => 'color'
	),



	array(
		'name' => 'Footer lines and borders color',
		'id' => 'footer_border_color',
		'std' => '333333',
		'type' => 'color'
	),


	array(
		'type' => 'close' ),

	/* ------------------------------------------------------------------------*
	 * TEXT STYLES
	 * ------------------------------------------------------------------------*/

	array(
		'type' => 'subtitle',
		'id'=>'text',
	),


	array(
		'name' => 'Headings color',
		'id' => 'heading_color',
		'std' => '333332',
		'type' => 'color'
	),

	array(
		'name' => 'Links color',
		'id' => 'link_color',
		'std' => '383838',
		'type' => 'color'
	),

	array(
		'name' => 'Secondary elements text color',
		'id' => 'secondary_text_color',
		'type' => 'color',
		'std' => '777777',
		'desc' => 'This is the secondary content text color, used in widgets 
			(tabs, accordion), footer call to action section, input fields, etc.'
	),

	array(
		'name' => 'Footer text color',
		'id' => 'footer_text_color',
		'std' => 'b3b3b3',
		'type' => 'color'
	),

	array(
		'name' => 'Footer widgets title color',
		'id' => 'footer_title_color',
		'std' => '5d5d5d',
		'type' => 'color'
	),

	array(
		'name' => 'Footer links color',
		'id' => 'footer_link_color',
		'std' => 'ececec',
		'type' => 'color'
	),

		array(
		'name' => 'Footer copyright section text color',
		'id' => 'footer_copyright_text',
		'type' => 'color'
	),


	array(
		'type' => 'close' ),

	/* ------------------------------------------------------------------------*
	 * FONTS
	 * ------------------------------------------------------------------------*/

	array(
		'type' => 'subtitle',
		'id' => 'fonts'
	),


	array(
		'type' => 'multioption',
		'id' => 'body_font',
		'name' => 'Body font',
		'desc' => 'You can add additional fonts in the Google API fonts section
		below',
		'fields' => array(
			array(
				'id' => 'family',
				'name' => 'Font Family',
				'type' => 'select',
				'options' => pexeto_get_font_options(),
				'std' => 'default' ),
			array(
				'id' => 'size',
				'name' => 'Font Size',
				'type' => 'text',
				'std' => '14',
				'suffix' => 'px'
			),
		)
	),

	array(
		'type' => 'multioption',
		'id' => 'menu_font',
		'name' => 'Menu font',
		'desc' => 'You can add additional fonts in the Google API fonts section
		below',
		'fields' => array(
			array(
				'id' => 'family',
				'name' => 'Font Family',
				'type' => 'select',
				'options' => pexeto_get_font_options(),
				'std' => 'default' ),
			array(
				'id' => 'size',
				'name' => 'Font Size',
				'type' => 'text',
				'std' => '13',
				'suffix' => 'px'
			),
		)
	),

	array(
		'type' => 'select',
		'id' => 'headings_font_family',
		'name' => 'Headings font family',
		'options' => pexeto_get_font_options(),
		'desc' => 'You can add additional fonts in the Google API fonts section
		below',
		'std' => 'default'
	),



	array(
		'type' => 'documentation',
		'text' => '<h3>Google API Fonts</h3>'
	),

	array(
		'name' => 'Enable Google Fonts',
		'id' => 'enable_google_fonts',
		'type' => 'checkbox',
		'std' =>true
	),

	array(
		'name'=>'Add Google Font',
		'id'=>'google_fonts',
		'type'=>'custom',
		'button_text'=>'Add Font',
		'fields'=>array(
			array( 'id'=>'name',
				'type'=>'text',
				'name'=>'Font Name / Font Family',
				'required'=>true ),
			array( 'id'=>'link',
				'type'=>'textarea',
				'name'=>'Font URL',
				'required'=>true ) ),
		'bind_to'=>array(
			'ids'=>array( 'headings_font_family', 'body_font_family', 'menu_font_family' ),
			'links'=>array( 'id'=>'link', 'name'=>'name' )
		),
		'desc'=>'In this field you can add or remove Google Fonts to the theme. 
			In the "Font Name / Font Family" field add the name of the font or a
			font family where the fonts are separated with commeas. In the 
			"Font URL" insert the URL of the font file. Please note that only 
			the font URL should be inserted here (the value that is set within 
			the "href" attribute of the embed link tag Google provides), 
			not the whole embed link tag.<br/><br/> <b>Example values:</b><br /> 
			<b>Font Name / Font Family: </b><br/>\'Archivo Narrow\', sans-serif<br/> 
			<b>Font URL: </b><br/>
			http://fonts.googleapis.com/css?family=Archivo+Narrow<br /><br/> 
			Once you add the font, it will be added to the default font list 
			available to select for each of the elements. For more information, 
			please refer to the "Fonts" section of the documentation included.',
		'std'=>array(array('name'=>"'Open Sans'", 'link'=>'http://fonts.googleapis.com/css?family=Open+Sans:400,700'))

	),


	array(
		'type' => 'close' ),


	/* ------------------------------------------------------------------------*
	 * ADDITIONAL STYLES
	 * ------------------------------------------------------------------------*/

	array(
		'type' => 'subtitle',
		'id' => 'add_styles'
	),

	array(
		'name' => 'Additional CSS styles',
		'id' => 'additional_styles',
		'type' => 'textarea',
		'large' => true,
		'desc' => 'You can insert some more additional CSS code here. If you would 
			like to do some modifications to the theme\'s CSS, it is recommended to 
			insert the modifications in this field rather than modifying the 
			original style.css file, as the modifications in this field will 
			remain saved trough the theme updates.'
	),

	array(
		'type' => 'close' ),


	array(
		'type' => 'close' ) );


$pexeto->options->add_option_set( $pexeto_styles_options );
