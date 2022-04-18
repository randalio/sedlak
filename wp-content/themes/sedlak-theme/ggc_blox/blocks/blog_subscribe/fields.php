<?php

$fields =  array(
	'key' => 'layout_blog_subscribe_'.$posttype,
	'name' => 'blog_subscribe_'.$posttype,
	'label' => 'Blog Subscribe',
	'display' => 'block',
	'sub_fields' => array(
		array(
			'key' => 'field_blog_subscribe_hs_form_'.$posttype,
			'label' => 'Choose Form',
			'name' => 'hs_form',
			'type' => 'post_object',
			'post_type' => 'hs-form',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'id',
			'allow_null' => 0,
			'multiple' => 0,
		),
			array(
					'key' => 'field_blog_subscribe_headline_'.$posttype,
					'label' => 'Blog Subscribe Headline',
					'name' => 'blog_subscribe_headline',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'placement' => 'top',
					'endpoint' => 0,
				),

				array(
						'key' => 'field_blog_subscribe_cta_text_'.$posttype,
						'label' => 'Blog Subscribe CTA Text',
						'name' => 'blog_subscribe_cta_text',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '75',
							'class' => '',
							'id' => '',
						),
						'placement' => 'top',
						'endpoint' => 0,
					),
	),
	'min' => '',
	'max' => '',
);

 ?>
