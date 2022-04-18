<?php
$fields =  array(
	'key' => 'layout_resources_filter_grid_'.$posttype,
	'name' => 'resources_filter_grid_'.$posttype,
	'label' => 'Resource Library with Filters',
	'display' => 'block',
	'sub_fields' => array(
      array(
					'key' => 'field_resources_grid_with_filters_'.$posttype,
					'label' => 'Resource Grid with Filters',
					'name' => 'resources_grid_post_type',
					'type' => 'html',
					'instructions' => 'This block will display a filterable grid of Resources.',
					'choices' => array(
						'case_study' => 'Case Studies',
						'literature' => 'Literature',
						'video' => 'Videos',
						'webinar' => 'Webinars',
					),
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
  ),
	'min' => '',
	'max' => '',
);

?>
