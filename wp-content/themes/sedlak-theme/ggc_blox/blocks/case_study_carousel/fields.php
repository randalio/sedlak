<?php
$fields =  array(
	'key' => 'layout_case_study_carousel_'.$posttype,
	'name' => 'case_study_carousel_'.$posttype,
	'label' => 'Success Stories Carousel',
	'display' => 'block',
	'sub_fields' => array(
		array(
			'key' => 'field_case_study_carousel_headline_'.$posttype,
			'label' => 'Headline',
			'name' => 'headline',
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
			'key' => 'field_case_study_carousel_relationships_'.$posttype,
			'label' => 'Success Stories To Show',
			'name' => 'case_study_relationship',
			'type' => 'post_object',
			'post_type' => array( 'industry', 'service' ),
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'taxonomy' => 'category',
			'field_type' => 'select',
			'allow_null' => 1,
			'add_term' => 0,
			'save_terms' => 0,
			'load_terms' => 0,
			'return_format' => 'id',
			'multiple' => 0,
		),
		array(
			'key' => 'field_case_study_carousel_padding_top_'.$posttype,
			'label' => 'Padding Top',
			'name' => 'pad_top',
			'type' => 'select',
			'choices' => array(
				0 => '0',
				1 => '1',
				2 => '2',
				3 => '3',
				4 => '4',
			),
			'default_value' => array(
				0 => 1,
			),
			'allow_null' => 0,
			'filters' => '',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
		),
		array(
			'key' => 'field_case_study_carousel_padding_bot_'.$posttype,
			'label' => 'Padding Bottom',
			'name' => 'pad_bot',
			'type' => 'select',
			'choices' => array(
				0 => '0',
				1 => '1',
				2 => '2',
				3 => '3',
				4 => '4',
			),
			'default_value' => array(
				0 => 1,
			),
			'allow_null' => 0,
			'filters' => '',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
		),
	),
	'min' => '',
	'max' => '',
);

//return $fields;
?>