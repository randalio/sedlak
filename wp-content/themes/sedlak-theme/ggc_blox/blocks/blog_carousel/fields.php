<?php

$fields =  array(
	'key' => 'layout_blog_carousel_'.$posttype,
	'name' => 'blog_carousel_'.$posttype,
	'label' => 'Blog Carousel',
	'display' => 'block',
	'sub_fields' => array(
			array(
				'key' => 'field_blog_carousel_'.$posttype,
				'label' => 'Blog Carousel Block',
				'name' => 'Blog Carousel',
				'type' => 'html',
				'instructions' => 'Renders a rotating carousel of 8 most recent blog posts',
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
					'key' => 'field_blog_carousel_headline_'.$posttype,
					'label' => 'Blog Carousel Headline',
					'name' => 'blog_carousel_headline',
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
						'key' => 'field_blog_carousel_cta_text_'.$posttype,
						'label' => 'Blog Carousel CTA Text',
						'name' => 'blog_carousel_cta_text',
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
							'key' => 'field_blog_carousel_cta_link_'.$posttype,
							'label' => 'Blog Carousel CTA Link',
							'name' => 'blog_carousel_cta_link',
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
