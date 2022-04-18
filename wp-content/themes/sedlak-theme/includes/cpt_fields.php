<?php
if( function_exists('acf_add_local_field_group') ):

  // EVENTS FIELDS
  acf_add_local_field_group(array(
  	'key' => 'group_5f4457e28891a',
  	'title' => 'Events Fields',
  	'fields' => array(
  		array(
  			'key' => 'field_5f4457eb820d1',
  			'label' => 'Event Start Date',
  			'name' => 'event_date',
  			'type' => 'date_picker',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '25',
  				'class' => '',
  				'id' => '',
  			),
  			'display_format' => 'F j, Y',
  			'return_format' => 'M j, Y',
  			'first_day' => 0,
  		),
  		array(
  			'key' => 'field_5f34563456345608960d1',
  			'label' => 'Event End Date',
  			'name' => 'event_end_date',
  			'type' => 'date_picker',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '25',
  				'class' => '',
  				'id' => '',
  			),
  			'display_format' => 'F j, Y',
  			'return_format' => 'M j, Y',
  			'first_day' => 0,
  		),
      array(
        'key' => 'field_5f089723454560d4',
        'label' => 'Website',
        'name' => 'website',
        'type' => 'url',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '50',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
  		array(
  			'key' => 'field_5f0234689054560d4',
  			'label' => 'Description',
  			'name' => 'description',
  			'type' => 'textarea',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '70',
  				'class' => '',
  				'id' => '',
  			),
  			'default_value' => '',
  			'placeholder' => '',
  			'prepend' => '',
  			'append' => '',
  			'maxlength' => '',
  		),
      array(
        'key' => 'field_5f022436787462436d4',
        'label' => 'Event Image',
        'name' => 'image',
        'type' => 'image',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '30',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
  	),
  	'location' => array(
  		array(
  			array(
  				'param' => 'post_type',
  				'operator' => '==',
  				'value' => 'event',
  			),
  		),
  	),
  	'menu_order' => 0,
  	'position' => 'normal',
  	'style' => 'seamless',
  	'label_placement' => 'top',
  	'instruction_placement' => 'label',
  	'hide_on_screen' => array(
  		0 => 'the_content',
  	),
  	'active' => true,
  	'description' => '',
  ));

  //White Papers
  acf_add_local_field_group(array(
    'key' => 'group_whitepapers',
    'title' => 'Resources Field Group',
    'fields' => array(
      array(
        'key' => 'field_whitepaper_grid_image',
        'label' => 'White Paper Image',
        'name' => 'cover',
        'type' => 'image',
        'instructions' => 'Upload a 640 x 320px cover image for the resources grid',
        'required' => 0,
        'conditional_logic' => '',
        'wrapper' => array(
          'width' => '33',
          'class' => '',
          'id' => '',
        ),
        'width' => '',
        'height' => '',
        'preview_size' => 'medium',
      ),
      array(
        'key' => 'field_whitepaper_summary',
        'label' => 'Brief Summary',
        'name' => 'summary',
        'type' => 'textarea',
        'instructions' => 'Enter a brief summary of this resource.',
        'required' => 0,
        'conditional_logic' => '',
        'wrapper' => array(
          'width' => '66',
          'class' => '',
          'id' => '',
        ),
      ),
      array(
        'key' => 'field_whitepaper_pdf',
        'label' => 'White Paper PDF',
        'name' => 'pdf',
        'type' => 'file',
        'instructions' => 'Upload the White Paper PDF',
        'required' => 0,
        'conditional_logic' => '',
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
      ),

    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'white-paper',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'acf_after_title',
    'style' => 'seamless',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
      0 => 'the_content',
      1 => 'excerpt',
      2 => 'discussion',
      3 => 'comments',
      4 => 'featured_image',
    ),
    'active' => true,
    'description' => '',
  ));

  //Case Studies
  acf_add_local_field_group(array(
    'key' => 'group_casestudies',
    'title' => 'Resources Field Group',
    'fields' => array(
      array(
        'key' => 'field_casestudy_img',
        'label' => 'Case Study Cover Image',
        'name' => 'cover',
        'type' => 'image',
        'instructions' => 'Upload a 480px by 220px cover image for this resource',
        'required' => 0,
        'conditional_logic' => '',
        'wrapper' => array(
          'width' => '33',
          'class' => '',
          'id' => '',
        ),
        'width' => '',
        'height' => '',
        'preview_size' => 'medium',
      ),
      array(
        'key' => 'field_casestudy_summary',
        'label' => 'Brief Summary',
        'name' => 'summary',
        'type' => 'textarea',
        'instructions' => 'Enter a brief summary of this resource.',
        'required' => 0,
        'conditional_logic' => '',
        'wrapper' => array(
          'width' => '66',
          'class' => '',
          'id' => '',
        ),
      ),


    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'case-study',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'acf_after_title',
    'style' => 'seamless',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
      0 => 'the_content',
      1 => 'excerpt',
      2 => 'discussion',
      3 => 'comments',
      4 => 'featured_image',
    ),
    'active' => true,
    'description' => '',
  ));

  //Videos
  acf_add_local_field_group(array(
    'key' => 'group_videos',
    'title' => 'Resources Field Group',
    'fields' => array(
      array(
        'key' => 'field_youtube_code',
        'label' => 'YouTube Code',
        'name' => 'youtube_code',
        'type' => 'text',
        'instructions' => 'Enter the youtube video code found at the end of your videos URL Eg. https://www.youtube.com/watch?v={XXXXXXXXX}.',
        'required' => 0,
        'conditional_logic' => '',
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
      ),
      array(
        'key' => 'field_video_resource_cover_img',
        'label' => 'Video Cover Image',
        'name' => 'cover',
        'type' => 'image',
        'instructions' => 'Upload a cover image for this video',
        'required' => 0,
        'conditional_logic' => '',
        'wrapper' => array(
          'width' => '25',
          'class' => '',
          'id' => '',
        ),
        'width' => '',
        'height' => '',
        'preview_size' => 'medium',
      ),
      array(
        'key' => 'field_video_summary',
        'label' => 'Brief Summary',
        'name' => 'summary',
        'type' => 'textarea',
        'instructions' => 'Enter a brief summary of this resource.',
        'required' => 0,
        'conditional_logic' => '',
        'wrapper' => array(
          'width' => '40',
          'class' => '',
          'id' => '',
        ),
      ),
      array(
        'key' => 'field_related_videos',
        'label' => 'Related Videos',
        'name' => 'related_videos_repeater',
        'instructions' => 'Add videos related to this video',
        'type' => 'repeater',
        'sub_fields' => array(
          array(
            'key' => 'field_video_object',
            'label' => '',
            'name' => 'video_object',
            'type' => 'post_object',
            'post_type' => 'video',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => '',
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
          ),
        ),
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => '',
        'wrapper' => array(
          'width' => '35',
          'class' => '',
          'id' => '',
        ),
      ),


    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'video',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'acf_after_title',
    'style' => 'seamless',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
      0 => 'the_content',
      1 => 'excerpt',
      2 => 'discussion',
      3 => 'comments',
      4 => 'featured_image',
    ),
    'active' => true,
    'description' => '',
  ));

  // PARTNERS
  acf_add_local_field_group(array(
    'key' => 'group_partners_side',
    'title' => 'Partners Side',
    'fields' => array(
      array(
        'key' => 'field_partner_logo',
        'label' => 'Partner Logo',
        'name' => 'logo',
        'type' => 'image',
        'instructions' => 'Upload a logo for this partner',
        'required' => 0,
        'conditional_logic' => '',
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'width' => '',
        'height' => '',
        'preview_size' => 'medium',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'partner',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'side',
    'style' => 'seamless',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
      // 0 => 'the_content',
      0 => 'excerpt',
      1 => 'discussion',
      2 => 'comments',
      3 => 'featured_image',
    ),
    'active' => true,
    'description' => '',
  ));

  // CLIENTS
  acf_add_local_field_group(array(
    'key' => 'group_clients_side',
    'title' => 'Clients Side',
    'fields' => array(
      array(
        'key' => 'field_client_logo',
        'label' => 'Client Logo',
        'name' => 'logo',
        'type' => 'image',
        'instructions' => 'Upload a logo for this client',
        'required' => 0,
        'conditional_logic' => '',
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'width' => '',
        'height' => '',
        'preview_size' => 'medium',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'client',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'side',
    'style' => 'seamless',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
      // 0 => 'the_content',
      0 => 'excerpt',
      1 => 'discussion',
      2 => 'comments',
      3 => 'featured_image',
    ),
    'active' => true,
    'description' => '',
  ));

  // INDUSTRIES
  acf_add_local_field_group(array(
    'key' => 'group_industries_side',
    'title' => 'Partners Side',
    'fields' => array(
      array(
        'key' => 'field_industry_partners_headline',
        'label' => 'Industry Partners Headline',
        'name' => 'partner_headline',
        'type' => 'textarea',
        'rows' => 2,
        'instructions' => 'Choose the partner logos you want to display on this industry page',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
      ),
      array(
        'key' => 'field_client_logos_relationships',
        'label' => 'Client Partners',
        'name' => 'client_logos',
        'type' => 'relationship',
        'instructions' => 'Choose the client logos you want to display on this industry page',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'post_type' => array(
          0 => 'client',
        ),
        'taxonomy' => '',
        'filters' => '',
        'elements' => '',
        'min' => '',
        'max' => '',
        'return_format' => 'id',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'industry',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'side',
    'style' => 'seamless',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
      0 => 'the_content',
      1 => 'excerpt',
      2 => 'discussion',
      3 => 'comments',
      4 => 'featured_image',
    ),
    'active' => true,
    'description' => '',
  ));

  // RELATIONSHIPS
  acf_add_local_field_group(array(
    'key' => 'group_resources_side',
    'title' => 'Resources Side',
    'fields' => array(
      array(
        'key' => 'field_reltaed_industry',
        'label' => 'Related Industry',
        'name' => 'related_industry',
        'type' => 'post_object',
        'post_type' => 'industry',
        'multiple' => 1,
        'allow_null' => 1,
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
      ),
      array(
        'key' => 'field_reltaed_service',
        'label' => 'Related Service',
        'name' => 'related_service',
        'type' => 'post_object',
        'post_type' => 'service',
        'multiple' => 1,
        'allow_null' => 1,
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'white-paper',
        ),
      ),
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'case-study',
        ),
      ),
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'video',
        ),
      ),
      // array(
      //   array(
      //     'param' => 'post_type',
      //     'operator' => '==',
      //     'value' => 'client',
      //   ),
      // ),
      // array(
      //   array(
      //     'param' => 'post_type',
      //     'operator' => '==',
      //     'value' => 'partner',
      //   ),
      // ),
    ),
    'menu_order' => 0,
    'position' => 'side',
    'style' => 'seamless',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
      0 => 'the_content',
      1 => 'excerpt',
      2 => 'discussion',
      3 => 'comments',
      4 => 'featured_image',
    ),
    'active' => true,
    'description' => '',
  ));

  //PROFESSIONAL CUSTOM FIELDS
  acf_add_local_field_group(array(
  	'key' => 'group_5f980345675d0f',
  	'title' => 'Professional Info',
  	'fields' => array(
  		array(
  			'key' => 'field_pro_bio_group_1',
  			'label' => '',
  			'name' => 'pro_bio_group_1',
  			'type' => 'group',
  			'sub_fields' => array(
  				array(
  					'key' => 'field_pro_image',
  					'label' => 'Head Shot',
  					'name' => 'pro_image',
  					'type' => 'image',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  				),
          array(
  					'key' => 'field_pro_job_title',
  					'label' => 'Job Title',
  					'name' => 'pro_job_title',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  				),
  				array(
  					'key' => 'field_pro_linkedin',
  					'label' => 'LinkedIn URL',
  					'name' => 'pro_linkedin',
  					'type' => 'url',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  				),
  			),
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '40',
  				'class' => '',
  				'id' => '',
  			),
  		),
  		array(
  			'key' => 'field_pro_bio_group_2',
  			'label' => '',
  			'name' => 'pro_bio_group_2',
  			'type' => 'group',
  			'sub_fields' => array(
  				array(
  					'key' => 'field_pro_long_bio',
  					'label' => 'Longform Bio',
  					'name' => 'pro_long_bio',
  					'type' => 'wysiwyg',
  					'toolbar' => 'basic',
  					'media_upload' => 0,
  					'new_lines' => 'wpautop',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  				),
  			),
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '60',
  				'class' => '',
  				'id' => '',
  			),
  		),
  	),
  	'location' => array(
  		array(
  			array(
  				'param' => 'post_type',
  				'operator' => '==',
  				'value' => 'profile',
  			),
  		),
  	),
  	'menu_order' => 0,
  	'position' => 'acf_after_title',
  	'style' => 'default',
  	'label_placement' => 'top',
  	'instruction_placement' => 'label',
  	'hide_on_screen' => array( 'the_content'),
  	'active' => true,
  	'description' => '',
  ));

  // Blog Author
  acf_add_local_field_group(array(
    'key' => 'group_blog_author',
    'title' => 'Blog Author',
    'fields' => array(
      array(
        'key' => 'field_blog_author',
        'label' => 'Blog Author',
        'name' => 'blog_author',
        'type' => 'post_object',
        'post_type' => 'profile',
        'multiple' => 0,
        'allow_null' => 1,
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'post',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'side',
    'style' => 'seamless',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
      0 => 'excerpt',
      1 => 'discussion',
      2 => 'comments',
      3 => 'author',
      4 => 'tags',
    ),
    'active' => true,
    'description' => '',
  ));













      acf_add_local_field_group(array(
      	'key' => 'group_site_redirect_settings',
      	'title' => 'Redirects',
      	'fields' => array(
          array(
            'key' => 'field_starting_url',
            'label' => 'URL to Redirect',
            'name' => 'starting_url',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
          ),
          array(
            'key' => 'field_destination_url',
            'label' => 'Destination URL',
            'name' => 'destination_url',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
          ),

      	),
        'location' => array(
          array(
            array(
              'param' => 'post_type',
              'operator' => '==',
              'value' => 'redirect_301',
            ),
          ),
        ),
      	'menu_order' => 0,

      	'position' => 'normal',
      	'style' => 'seamless',
      	'label_placement' => 'top',
      	'instruction_placement' => 'label',
        'hide_on_screen' => array(
          0 => 'excerpt',
          1 => 'discussion',
          2 => 'comments',
          3 => 'title',
          4 => 'tags',
          5 => 'the_content',
        ),
      	'active' => true,
      	'description' => '',
      ));



endif;
?>
