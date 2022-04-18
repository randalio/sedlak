<?php
$fields =  array(
	'key' => 'layout_contact_info_'.$posttype,
	'name' => 'contact_info_'.$posttype,
	'label' => 'Contact Info',
	'display' => 'block',
	'sub_fields' => array(
		array(
			'key' => 'field_contact_info_message_'.$posttype,
			'label' => 'Contact Info',
			'name' => 'contact_info_headline',
			'type' => 'html',
			'instructions' => 'Display Contact Info that is saved in Theme Options.',
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
