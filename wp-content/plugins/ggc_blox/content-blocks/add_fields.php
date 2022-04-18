<?php
function blox_init_fields($block_page, $blocks, $sidebar, $location){
	acf_add_local_field_group(array(
		'key' => 'group_'.$block_page.'_content_blocks',
		'title' => 'Content Blocks',
		'fields' => array(
			array(
				'key' => 'field_'.$block_page.'_row_type',
				'label' => 'Content',
				'name' => 'row_type_'.$block_page,
				'type' => 'flexible_content',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layouts' => array(
					'layout_one_column_layout' => array(
						'key' => 'layout_one_column_layout_'.$block_page,
						'name' => 'one_column_layout_'.$block_page,
						'label' => 'One Column Layout',
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_content_blocks_one_col_row_settings_'.$block_page,
								'label' => 'Content',
								'name' => 'content_blocks_one_col_row_settings_'.$block_page,
								'type' => 'group',
								'sub_fields' => array(
										array(
											'key' => 'field_content_blocks_one_col_row_container_'.$block_page,
											'label' => 'Container Size',
											'name' => 'content_blocks_one_col_row_container',
											'type' => 'radio',
											'required' => 0,
											'conditional_logic' => 0,
											'wrapper' => array(
												'width' => '25',
												'class' => '',
												'id' => '',
											),
											'choices' => array(
												'container' => 'Boxed',
												'container-fluid' => 'Full Width',
											),
											'allow_null' => 0,
											'other_choice' => 0,
											'default_value' => 'container',
											'layout' => 'horizontal',
											'return_format' => 'value',
											'save_other_choice' => 0,
										),
										array(
											'key' => 'field_content_blocks_one_col_row_id_'.$block_page,
											'label' => 'Row ID',
											'name' => 'content_blocks_one_col_row_id',
											'type' => 'text',
											'required' => 0,
											'conditional_logic' => 0,
											'wrapper' => array(
												'width' => '15',
												'class' => '',
												'id' => '',
											),
											'allow_null' => 0,
											'return_format' => 'value'
										),
										array(
											'key' => 'field_content_blocks_one_col_row_class_'.$block_page,
											'label' => 'Row Class',
											'name' => 'content_blocks_one_col_row_class',
											'type' => 'text',
											'required' => 0,
											'conditional_logic' => 0,
											'wrapper' => array(
												'width' => '15',
												'class' => '',
												'id' => '',
											),
											'allow_null' => 0,
											'return_format' => 'value'
										),
										array(
											'key' => 'field_content_blocks_one_col_row_bg_color_'.$block_page,
											'label' => 'Row BG Color',
											'name' => 'content_blocks_one_col_row_bg_color',
											'type' => 'color_picker',
											'required' => 0,
											'conditional_logic' => 0,
											'wrapper' => array(
												'width' => '25',
												'class' => '',
												'id' => '',
											),
											'allow_null' => 0,
											'return_format' => 'value'
										),
										array(
											'key' => 'field_content_blocks_one_col_row_bg_img_'.$block_page,
											'label' => 'Row BG Image',
											'name' => 'content_blocks_one_col_row_bg_img',
											'type' => 'image',
											'required' => 0,
											'conditional_logic' => 0,
											'wrapper' => array(
												'width' => '25',
												'class' => '',
												'id' => '',
											),
											'allow_null' => 0,
											'return_format' => 'value'
										),
								),
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
							),
							array(
								'key' => 'field_content_blocks_one_col_row_'.$block_page,
								'label' => 'Content',
								'name' => 'content_blocks_one_col_row_'.$block_page,
								'type' => 'flexible_content',
								'instructions' => 'Add content by selecting a content block.',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'layouts' =>  $blocks,
								'button_label' => 'Add Block',
								'min' => '',
								'max' => '',
							),
						),
						'min' => '',
						'max' => '',
					),
//
					'layout_two_column_layout_' => array(
						'key' => 'two_column_layout_'.$block_page,
						'name' => 'two_column_layout_'.$block_page,
						'label' => 'Two Column Layout',
						'display' => 'block',
						'sub_fields' => array(
							array(
									'key' => 'field_two_col_layout_row_content_tab_'.$block_page,
									'label' => 'Row Content',
									'name' => '',
									'type' => 'tab',
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
								'key' => 'field_content_blocks_two_col_main_even_left_'.$block_page,
								'label' => 'Content Left',
								'name' => 'content_blocks_two_col_main_even_left_'.$block_page,
								'type' => 'flexible_content',
								'instructions' => 'Add content by selecting a content block.',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '50',
									'class' => 'content_left',
									'id' => '',
								),
								'layouts' =>  $blocks,
								'button_label' => 'Add Block',
								'min' => '',
								'max' => '',
							),
							array(
								'key' => 'field_content_blocks_two_col_main_even_right_'.$block_page,
								'label' => 'Content Right',
								'name' => 'content_blocks_two_col_main_even_right_'.$block_page,
								'type' => 'flexible_content',
								'instructions' => 'Add content by selecting a content block.',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '50',
									'class' => 'content_right',
									'id' => '',
								),
								'layouts' =>  $blocks,
								'button_label' => 'Add Block',
								'min' => '',
								'max' => '',
							),
							array(
									'key' => 'field_content_blocks_two_col_row_settings_tab_'.$block_page,
									'label' => 'Row Settings',
									'name' => '',
									'type' => 'tab',
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
							  'key' => 'field_content_blocks_two_col_row_settings_'.$block_page,
							  'label' => 'Row Settings',
							  'name' => 'content_blocks_two_col_row_settings_'.$block_page,
							  'type' => 'group',
							  'sub_fields' => array(
							      array(
							        'key' => 'field_content_blocks_two_col_row_container_'.$block_page,
							        'label' => 'Container Size',
							        'name' => 'content_blocks_two_col_row_container',
							        'type' => 'radio',
							        'required' => 0,
							        'conditional_logic' => 0,
							        'wrapper' => array(
							          'width' => '30',
							          'class' => 'container_size',
							          'id' => '',
							        ),
							        'choices' => array(
							          'container' => '<div class="container-boxed"></div><span>Boxed</span>',
							          'container-fluid' => '<div class="container-fluid"></div><span>Fluid</span>',
							        ),
							        'allow_null' => 0,
							        'other_choice' => 0,
							        'default_value' => 'container',
							        'layout' => 'horizontal',
							        'return_format' => 'value',
							        'save_other_choice' => 0,
							      ),
										array(
											'key' => 'field_content_blocks_two_col_row_columns_'.$block_page,
											'label' => 'Layout',
											'name' => 'content_blocks_two_col_row_columns',
											'type' => 'radio',
											'layout' => 'horizontal',
											'choices' => array(
												'sidebar_l' => '<div class="sb_left"></div><span>Sidebar Left</span>',
												'even_split' => '<div class="even_split"></div><span>Equal Split</span>',
												'sidebar_r' => '<div class="sb_right"></div><span>Sidebar Right</span>',
											),
											'required' => 0,
											'conditional_logic' => 0,
											'wrapper' => array(
												'width' => '40',
												'class' => 'layout_settings',
												'id' => '',
											),
											'allow_null' => 0,
											'return_format' => 'value',
											'default_value' => 'sidebar_l'
										),
										array(
							        'key' => 'field_content_blocks_two_col_row_id_'.$block_page,
							        'label' => 'Row ID',
							        'name' => 'content_blocks_two_col_row_id',
							        'type' => 'text',
							        'required' => 0,
							        'conditional_logic' => 0,
							        'wrapper' => array(
							          'width' => '15',
							          'class' => '',
							          'id' => '',
							        ),
							        'allow_null' => 0,
							        'return_format' => 'value'
							      ),
										array(
											'key' => 'field_content_blocks_two_col_row_class_'.$block_page,
											'label' => 'Row Class',
											'name' => 'content_blocks_two_col_row_class',
											'type' => 'text',
											'required' => 0,
											'conditional_logic' => 0,
											'wrapper' => array(
												'width' => '15',
												'class' => '',
												'id' => '',
											),
											'allow_null' => 0,
											'return_format' => 'value'
										),
										array(
											'key' => 'field_content_blocks_two_col_row_main_bg_group_'.$block_page,
											'label' => 'Background - Main',
											'name' => 'content_blocks_two_col_row_main_bg_group',
											'type' => 'group',
											'sub_fields' => array(
												array(
													'key' => 'field_content_blocks_two_col_row_main_bg_color_'.$block_page,
													'label' => '',
													'name' => 'content_blocks_two_col_row_main_bg_color',
													'type' => 'color_picker',
													'required' => 0,
													'conditional_logic' => 0,
													'wrapper' => array(
														'width' => '50',
														'class' => '',
														'id' => '',
													),
													'allow_null' => 0,
													'return_format' => 'value'
												),
												array(
													'key' => 'field_content_blocks_two_col_row_main_bg_image_'.$block_page,
													'label' => '',
													'name' => 'content_blocks_two_col_row_main_bg_image',
													'type' => 'image',
													'required' => 0,
													'conditional_logic' => 0,
													'wrapper' => array(
														'width' => '50',
														'class' => '',
														'id' => '',
													),
													'allow_null' => 0,
													'return_format' => 'array',
													'preview_size' => 'admin-sample',
													'library' => 'all',
												),
											),
											'required' => 0,
											'conditional_logic' => 0,
											'wrapper' => array(
												'width' => '100',
												'class' => '',
												'id' => '',
											),
											'allow_null' => 0,
											'return_format' => 'value'
										),
										array(
											'key' => 'field_content_blocks_two_col_row_left_bg_group_'.$block_page,
											'label' => 'Background - Left',
											'name' => 'content_blocks_two_col_row_left_bg_group',
											'type' => 'group',
											'sub_fields' => array(
												array(
													'key' => 'field_content_blocks_two_col_row_left_bg_color_'.$block_page,
													'label' => '',
													'name' => 'content_blocks_two_col_row_left_bg_color',
													'type' => 'color_picker',
													'required' => 0,
													'conditional_logic' => 0,
													'wrapper' => array(
														'width' => '50',
														'class' => '',
														'id' => '',
													),
													'allow_null' => 0,
													'return_format' => 'value'
												),
												array(
													'key' => 'field_content_blocks_two_col_row_left_bg_image_'.$block_page,
													'label' => '',
													'name' => 'content_blocks_two_col_row_left_bg_image',
													'type' => 'image',
													'required' => 0,
													'conditional_logic' => 0,
													'wrapper' => array(
														'width' => '50',
														'class' => '',
														'id' => '',
													),
													'allow_null' => 0,
													'return_format' => 'array',
													'preview_size' => 'admin-sample',
													'library' => 'all',
												),
											),
											'required' => 0,
											'conditional_logic' => 0,
											'wrapper' => array(
												'width' => '50',
												'class' => '',
												'id' => '',
											),
											'allow_null' => 0,
											'return_format' => 'value'
										),
										array(
											'key' => 'field_content_blocks_two_col_row_right_bg_group_'.$block_page,
											'label' => 'Background - Right',
											'name' => 'content_blocks_two_col_row_right_bg_group',
											'type' => 'group',
											'sub_fields' => array(
												array(
													'key' => 'field_content_blocks_two_col_row_right_bg_color_'.$block_page,
													'label' => '',
													'name' => 'content_blocks_two_col_row_right_bg_color',
													'type' => 'color_picker',
													'required' => 0,
													'conditional_logic' => 0,
													'wrapper' => array(
														'width' => '50',
														'class' => '',
														'id' => '',
													),
													'allow_null' => 0,
													'return_format' => 'value'
												),
												array(
													'key' => 'field_content_blocks_two_col_row_right_bg_image_'.$block_page,
													'label' => '',
													'name' => 'content_blocks_two_col_row_right_bg_image',
													'type' => 'image',
													'required' => 0,
													'conditional_logic' => 0,
													'wrapper' => array(
														'width' => '50',
														'class' => '',
														'id' => '',
													),
													'allow_null' => 0,
													'return_format' => 'array',
													'preview_size' => 'admin-sample',
													'library' => 'all',
												),
											),
											'required' => 0,
											'conditional_logic' => 0,
											'wrapper' => array(
												'width' => '50',
												'class' => '',
												'id' => '',
											),
											'allow_null' => 0,
											'return_format' => 'value'
										),
							  ),
							  'wrapper' => array(
							    'width' => '',
							    'class' => '',
							    'id' => '',
							  ),
							),
						),
						'min' => '',
						'max' => '',
					),
				),
				'button_label' => 'Add Row',
				'min' => '',
				'max' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => $location,
					'operator' => '==',
					'value' => $block_page,
				),
			),
		),
		'menu_order' => 5,
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
}
?>