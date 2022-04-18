<?php
$fields =  array(
	'key' => 'layout_asset_feature_'.$posttype,
	'name' => 'asset_feature_'.$posttype,
	'label' => 'Featured Asset',
	'display' => 'block',
	'sub_fields' => array(
    array(
			'key' => 'field_asset_feature_content_group_'.$posttype,
			'label' => '',
			'name' => 'asset_feature_content',
			'type' => 'group',
      'sub_fields' => array(
        array(
    			'key' => 'field_asset_feature_headline_'.$posttype,
    			'label' => 'Headline',
    			'name' => 'asset_feature_headline',
    			'type' => 'text',
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
    		array(
    			'key' => 'field_asset_feature_button_text_'.$posttype,
    			'label' => 'Button Text',
    			'name' => 'asset_feature_button_text',
    			'type' => 'text',
    			'instructions' => '',
    			'required' => 0,
    			'conditional_logic' => 0,
    			'wrapper' => array(
    				'width' => '40',
    				'class' => '',
    				'id' => '',
    			),
    			'default_value' => '',
    			'tabs' => 'all',
    			'toolbar' => 'full',
    			'media_upload' => 1,
    			'delay' => 1,
    		),
    		array(
    			'key' => 'field_asset_feature_object_'.$posttype,
    			'label' => 'Choose Asset',
    			'name' => 'asset_id',
    			'type' => 'post_object',
					'post_type' => array(
						'case-study',
						'video',
						'white-paper'
					),
    			'instructions' => '',
    			'required' => 0,
    			'conditional_logic' => 0,
    			'wrapper' => array(
    				'width' => '60',
    				'class' => '',
    				'id' => '',
    			),
    			'default_value' => '',
					'return_format' => 'id',
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

//return $fields;
?>
