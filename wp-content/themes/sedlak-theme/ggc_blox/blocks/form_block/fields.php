<?php

$fields =  array(
	'key' => 'layout_form_block_'.$posttype,
	'name' => 'form_block_'.$posttype,
	'label' => 'Form Block',
	'display' => 'block',
	'sub_fields' => array(
    array(
			'key' => 'field_form_block_content_group_'.$posttype,
			'label' => 'Content',
			'name' => 'content_group',
			'type' => 'group',
      'sub_fields' => array(
        array(
          'key' => 'field_form_block_headline_'.$posttype,
          'label' => 'Headline Text',
          'name' => 'headline',
          'type' => 'text',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '66',
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
          'key' => 'field_form_block_style_'.$posttype,
          'label' => 'Layout Style',
          'name' => 'layout_style',
          'type' => 'select',
					'choices' => array(
						'full-width' => 'Full Width',
						'sidebar' => 'Sidebar'
					),
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '33',
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
          'key' => 'field_form_block_subheadline_'.$posttype,
          'label' => 'Subheadline Text',
          'name' => 'sub_head',
          'type' => 'text',
          'required' => 0,
					'conditional_logic' => array(
						array(
							'field' => 'field_form_block_style_'.$posttype,
							'operator' => '==',
							'value' => 'sidebar',
						),
					),
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
          'key' => 'field_form_block_sub_headline_'.$posttype,
          'label' => 'Sub Headline Text',
          'name' => 'line_text',
          'type' => 'textarea',
          'rows' => 6,
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
			'key' => 'field_form_block_embed_code_'.$posttype,
			'label' => 'Form',
			'name' => 'form_embed_code',
			'type' => 'forms',
			'required' => 0,
			'rows' => 15,
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
			'return_format' => 'id',
		),
		array(
			'key' => 'field_form_block_padding_top_'.$posttype,
			'label' => 'Padding Top',
			'name' => 'padding_top',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
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
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_form_block_padding_bot_'.$posttype,
			'label' => 'Padding Bottom',
			'name' => 'padding_bot',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
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
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),




	),
	'min' => '',
	'max' => '',
);

//return $fields;
?>