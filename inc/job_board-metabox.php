<?php
function job_board_page_metabox( $meta_boxes ) {

	$job_board_prefix = '_job_board_';
	$meta_boxes[] = array(
		'id'        => 'job_board_metaboxes',
		'title'     => esc_html__( 'Job Options', 'job_board-companion' ),
		'post_types'=> array( 'job' ),
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(	
			array(
				'id'    => $job_board_prefix . 'comapny_name',
				'size' => 30,
				'required'  => true,
				'type'  => 'text',
				'name'  => esc_html__( 'Company name', 'job_board-companion' ),
			),	
			array(
				'id'    => $job_board_prefix . 'company_phone',
				'required'  => true,
				'type'  => 'text',
				'name'  => esc_html__( 'Company Phone', 'job_board-companion' ),
			),	
			array(
				'id'    => $job_board_prefix . 'company_email',
				'required'  => true,
				'type'  => 'text',
				'name'  => esc_html__( 'Company Email', 'job_board-companion' ),
			),
			array(
				'id'    => $job_board_prefix . 'job_location',
				'type'  => 'text',
				'required'  => true,
				'name'  => esc_html__( 'Address', 'job_board-companion' ),
				'placeholder' => esc_html__( 'Detail Address for the Listing.', 'job_board-companion' ),
			),
			array(
				'id'            => $job_board_prefix . 'job_map',
				'type'          => 'osm',
				'required'  => true,
				'name'          => esc_html__( 'Location', 'job_board-companion' ),
				'std'           => '-6.233406,-35.049906,15',
				'address_field' => $job_board_prefix . 'job_location',
			),	
			array(
				'type'  => 'divider'
			),	
			array(
				'id'    => $job_board_prefix . 'job_type',
				'type'  => 'switch',
				'on_label' => '<i class="dashicons dashicons-yes"></i>',
				'name'  => esc_html__( 'Part-Time?', 'job_board-companion' ),
				'placeholder' => esc_html__( 'Select the Job Type. Ex: Full-Time', 'job_board-companion' ),
			),			
			array(
				'id'    => $job_board_prefix . 'job_deadline',
				'size' => 30,
				'required'  => true,
				'type'  => 'date',
				'js_options' => [
					'dateFormat' => 'dd M, yy'
				],
				'name'  => esc_html__( 'Job Deadline', 'job_board-companion' ),
			),	
			array(
				'id'    => $job_board_prefix . 'job_vacancy',
				'size' => 30,
				'required'  => true,
				'type'  => 'text',
				'name'  => esc_html__( 'Job Vacancy', 'job_board-companion' ),
			),
			array(
				'id'    => $job_board_prefix . 'job_salary',
				'size' => 30,
				'required'  => true,
				'type'  => 'text',
				'name'  => esc_html__( 'Job Salary', 'job_board-companion' ),
			),		
			array(
				'type'  => 'divider'
			),
			array(
				'id'    => $job_board_prefix . 'job_apply_form_shortcode',
				'type'  => 'text',
				'required'  => true,
				'name'  => esc_html__( 'Apply Form Shortcode', 'job_board-companion' ),
				'desc'  => 'Place the Contact form 7 shortcode here. Ex: [contact-form-7 id="6" title="Contact form 1"]',
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'job_board_page_metabox' );
