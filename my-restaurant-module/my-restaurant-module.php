<?php
class MyModuleClass extends FLBuilderModule {

public function __construct()
{
  parent::__construct(array(
    'name'            => __( 'My Restaurant Module', 'fl-builder' ),
    'description'     => __( 'A custom module for restaurant locations', 'fl-builder' ),
    'category'        => __( 'Custom Modules', 'fl-builder' ),
    'dir'             => MY_MODULES_DIR . 'my-restaurant-module/',
    'url'             => MY_MODULES_URL . 'my-restaurant-module/',
    'editor_export'   => true, // Defaults to true and can be omitted.
    'enabled'         => true, // Defaults to true and can be omitted.
  ));
}
    
  public function update($settings)
  {       
    return $settings;
  }
  
  public function delete()
  {
  
  }

  public function restaurant_method()
  {
    echo "<br>Test from Method";
  }
}

FLBuilder::register_module( 'MyModuleClass', array(
  'my-content'      => array(
    'title'         => __( 'Content', 'fl-builder' ),
    'sections'      => array(
      'my-api-key'  => array(
        'title'         => __( 'API KEY', 'fl-builder' ),
        'fields'        => array(
          'my_api_key_field'     => array(
            'type'          => 'text',
            'label'         => __( 'API KEY', 'fl-builder' ),
            'help'          => 'Please enable both Javascript API and Geocoding API for google map'
          ),
        )
      ),
      'my-map-heading'  => array(
        'title'         => __( 'Map Setting', 'fl-builder' ),
        'fields'        => array(
          'my_map_heading_field'     => array(
            'type'          => 'text',
            'label'         => __( 'Map Heading', 'fl-builder' ),
            'preview'         => array(
              'type'             => 'css',
              'selector'         => '.fl-my-heading',
              'property'         => 'font-size',
              'unit'             => 'px'
            )
          ),
          'my_map_center_lat_lng'     => array(
            'type'          => 'text',
            'label'         => __( 'Map Center', 'fl-builder' ),
            'help'          => 'Please enter lat, lng',
            'default'       => '42.31, -83.03'
          ),
          'my_map_zoom' => array(
            'type'          => 'select',
            'label'         => __( 'Map Zoom', 'fl-builder' ),
            'default'       => '14',
            'options'       => array(
              '14'      => __( '14', 'fl-builder' ),
              '12'      => __( '12', 'fl-builder' ),
              '10'      => __( '10', 'fl-builder' )
            ),
          ),
          'my_font_field' => array(
            'type'          => 'font',
            'label'         => __( 'Font', 'fl-builder' ),
            'default'       => array(
              'family'        => 'Helvetica',
              'weight'        => 300,
            )
          ),
          'font_size' => array(
            'type'        => 'unit',
            'label'       => 'Font Size',
            'units'       => array( 'px', 'vw', '%' ),
            'description' => 'px',
            'placeholder' => 24,
            'responsive'  => true,
          ),
          'my_text_align' => array(
            'type'    => 'align',
            'label'   => 'Text Align',
            'default' => 'center',
            'preview' => array(
                'type'       => 'css',
                'selector'   => '.fl-my-heading',
                'property'   => 'text-align',
            ),
          ),
        )
      )
    )
  ),
  'my-map-locations'      => array(
    'title'         => __( 'Map Locations', 'fl-builder' ),
    'sections'      => array(
      'my-locations'  => array(
        'title'            => __( 'Locations', 'fl-builder' ),
        'fields'           => array(
          'item_locations' => array(
						'type'         => 'form',
						'label'        => __( 'Location', 'fl-builder' ),
						'form'         => 'location_items_form', // ID from registered form below
						'preview_text' => 'address_location', // Name of a field to use for the preview text
						'multiple'     => true,
					),
        )
      )
    )
  )
) );

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('location_items_form', array(
	'title' => __( 'Add Location', 'fl-builder' ),
	'tabs'  => array(
		'general' => array(
			'title'    => __( 'General', 'fl-builder' ),
			'sections' => array(
				'general' => array(
					'title'  => '',
					'fields' => array(
						'address_location' => array(
							'type'        => 'text',
							'label'       => __( 'Address', 'fl-builder' ),
              'help'        => 'Enter the full address, zip code or name of restaurant',
              'placeholder' => 'Example: Pho Maxim Windsor',
							'connections' => array( 'string' ),
						),
					),
				),
				'content' => array(
					'title'  => __( 'Info Window', 'fl-builder' ),
					'fields' => array(
						'infowindow_location' => array(
							'type'        => 'editor',
							'label'       => '',
							'wpautop'     => false,
							'connections' => array( 'string' ),
						),
					),
				),
			),
		),
	),
) );

?>