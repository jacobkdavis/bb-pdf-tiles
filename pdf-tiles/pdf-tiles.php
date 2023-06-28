<?php

/**
 *
 * @class TGHPdfTilesModule
 */
class TGHPdfTilesModule extends FLBuilderModule {

	/**
	 * Constructor function for the module. You must pass the
	 * name, description, dir and url in an array to the parent class.
	 *
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'		  => __('PDF Tiles', 'bb-pdf-tiles'),
			'description'   => __('Create a gallery of PDFs from Media Library files.', 'bb-pdf-tiles'),
			'category'		=> __( 'Media', 'fl-builder' ),
			'icon'		=> 'text.svg',
			'dir'		   => TBPT_CUSTOM_MODULE_DIR . 'pdf-tiles/',
			'url'		   => TBPT_CUSTOM_MODULE_URL . 'pdf-tiles/',
			'editor_export' => true, // Defaults to true and can be omitted.
			'enabled'	   => true, // Defaults to true and can be omitted.
//						'partial_refresh' => true,
		));
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('TGHPdfTilesModule', array(
	'general'       => array( // Tab
		'title'         => __('Assets', 'bb-pdf-tiles'), // Tab title
		'sections'      => array( // Tab Sections
			'design'       => array( // Section
				'title'         => __('', 'bb-pdf-tiles'), // Section Title
				'fields'        => array( // Section Fields
					'cb_link_list_form_field_repeater' => array(
						'type'          => 'form',
						'label'         => __('PDF', 'bb-pdf-tiles'),
						'form'          => 'cb_link_list_form_field', // ID of a registered form.
						'preview_text'  => 'cb_link_label', // ID of a field to use for the preview text.
						'multiple' 			=> true,
					),
				)
			),
		)
	),
));

/**
 * Register form
 */
FLBuilder::register_settings_form('cb_link_list_form_field', array(
	'title' => __('New PDF', 'bb-pdf-tiles'),
	'tabs'  => array(
		'file'	  => array(
			'title'		 => __('PDF', 'bb-pdf-tiles'),
			'sections'	  => array(
				'label'	   => array(
					'title'		 => 'Label',
					'fields'		=> array(
						'cb_link_label' => array(
							'type'		  => 'text',
							'label'		 => __( 'Label', 'bb-pdf-tiles' ),
							'default'	   => 'New PDF',
							'maxlength'	 => '140',
							'size'		  => '45',
							'placeholder'   => __( 'Describe image here', 'bb-pdf-tiles' ),
							'class'		 => 'my-css-class',
							'description'   => __( '', 'bb-pdf-tiles' ),
							'connections'   => array( 'string' )
						),
					)
				),
				'file'	   => array(
					'title'		 => '',
					'fields'		=> array(
						'cb_link_file' => array(
							'type'		  => 'pdf-field',
							'label'		 => __('File', 'bb-pdf-tiles'),
							'show_remove'	=> false
						),
					)
				),
			)
		),
	)
));
