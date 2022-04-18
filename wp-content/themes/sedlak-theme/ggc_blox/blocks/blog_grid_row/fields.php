<?php

$fields =  array(
	'key' => 'layout_blog_grid_row_'.$posttype,
	'name' => 'blog_grid_row_'.$posttype,
	'label' => 'Blog Grid Row',
	'display' => 'block',
	'sub_fields' => array(
			array(
				'key' => 'field_blog_grid_row_'.$posttype,
				'label' => 'Blog Grid Block',
				'name' => 'Blog Grid',
				'type' => 'html',
				'instructions' => 'Renders a rotating grid of 3 most recent blog posts',
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
					'key' => 'field_blog_grid_row_headline_'.$posttype,
					'label' => 'Blog Grid Headline',
					'name' => 'blog_grid_row_headline',
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
						'key' => 'field_blog_grid_row_cta_text_'.$posttype,
						'label' => 'Blog Grid CTA Text',
						'name' => 'blog_grid_row_cta_text',
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
					array(
							'key' => 'field_blog_grid_row_cta_link_'.$posttype,
							'label' => 'Blog Grid CTA Link',
							'name' => 'blog_grid_row_cta_link',
							'type' => 'link',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '25',
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
