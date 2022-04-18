<?php
$fields =  array(
	'key' => 'layout_hero_slider_'.$posttype,
	'name' => 'hero_slider_'.$posttype,
	'label' => 'Hero Slider',
	'display' => 'block',
	'sub_fields' => array(
    array(
			'key' => 'field_hero_slider_content_group_'.$posttype,
			'label' => '',
			'name' => 'hero_slider_content',
			'type' => 'repeater',
      'min' => '1',
			'max' => '3',
      'button_label' => '+ Add Tile',
      'layout' => 'block',
      'sub_fields' => array(
				array(
					'key' => 'field_hero_slider_background_group_'.$posttype,
					'label' => 'Background Settings',
					'name' => 'slide_background_settings',
					'type' => 'group',
					'sub_fields' => array(
						array(
							'key' => 'field_hero_slider_image_'.$posttype,
							'label' => 'Slide Background Image',
							'name' => 'slide_image',
							'type' => 'image',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => '',
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
						),
						array(
							'key' => 'field_hero_slider_video_'.$posttype,
							'label' => 'Slide Background Video MP4',
							'name' => 'slide_video',
							'type' => 'file',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => '',
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
						),
					),
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => '',
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),

				array(
					'key' => 'field_hero_slider_two_col_content_group_'.$posttype,
					'label' => '',
					'name' => 'two_col_content_group',
					'type' => 'group',
					'sub_fields' => array(
						array(
		          'key' => 'field_hero_slider_line_one_'.$posttype,
		          'label' => 'Line One Text (Small Gray Font)',
		          'name' => 'line_one',
		          'type' => 'text',
		          'instructions' => '',
		          'required' => 0,
		          'conditional_logic' => '',
		          'wrapper' => array(
		            'width' => '',
		            'class' => '',
		            'id' => '',
		          ),
		          'default_value' => '',
		        ),
						array(
							'key' => 'field_hero_slider_line_two_'.$posttype,
							'label' => 'Line Two Text (Large Gray Font)',
							'name' => 'line_two',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => '',
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
						),
		        array(
		          'key' => 'field_hero_slider_line_three_'.$posttype,
		          'label' => 'Line Three Text (Large Green Font)',
		          'name' => 'line_three',
		          'type' => 'text',
		          'instructions' => '',
		          'required' => 0,
		          'conditional_logic' => '',
		          'wrapper' => array(
		            'width' => '',
		            'class' => '',
		            'id' => '',
		          ),
		          'default_value' => '',
		        ),
						array(
							'key' => 'field_hero_slider_cta_text_'.$posttype,
							'label' => 'CTA Text',
							'name' => 'cta_text',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => '',
							'wrapper' => array(
								'width' => '33',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
						),
						array(
							'key' => 'field_hero_slider_two_col_button_link_'.$posttype,
							'label' => 'Button Link',
							'name' => 'two_col_button_link',
							'type' => 'link',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => '',
							'wrapper' => array(
								'width' => '66',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
						),
					),
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => '',
					'wrapper' => array(
						'width' => '66',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
      ),
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
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
	'min' => '',
	'max' => '',
);

?>