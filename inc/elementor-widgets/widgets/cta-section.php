<?php
namespace Job_Boardelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Job_Board elementor cta section widget.
 *
 * @since 1.0
 */
class Job_Board_Cta_Section extends Widget_Base {

	public function get_name() {
		return 'job_board-cta-section';
	}

	public function get_title() {
		return __( 'CTA Section', 'job_board-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'job_board-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  CTA content ------------------------------
		$this->start_controls_section(
			'cta_content',
			[
				'label' => __( 'CTA contents', 'job_board-companion' ),
			]
        );

        $this->add_control(
            'left_section_separator',
            [
                'label' => esc_html__( 'Left Section', 'job_board-companion' ),
                'type' => Controls_Manager::HEADING,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'bg_img',
            [
                'label' => esc_html__( 'BG Image', 'job_board-companion' ),
                'descripion' => esc_html__( 'Best size is 960x400', 'job_board-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'left_big_title',
            [
                'label' => esc_html__( 'Big Title', 'job_board-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Looking for a Job?', 'job_board-companion' ),
            ]
        );
        $this->add_control(
            'left_text',
            [
                'label' => esc_html__( 'Text', 'job_board-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( 'We provide online instant cash loans with quick approval ', 'job_board-companion' ),
            ]
        );
        $this->add_control(
            'left_btn_title',
            [
                'label' => esc_html__( 'Button Title', 'job_board-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Browse Job', 'job_board-companion' ),
            ]
        );
        $this->add_control(
            'left_btn_url',
            [
                'label' => esc_html__( 'Button URL', 'job_board-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
            ]
        );

        
        $this->add_control(
            'right_section_separator',
            [
                'label' => esc_html__( 'Right Section', 'job_board-companion' ),
                'type' => Controls_Manager::HEADING,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'right_big_title',
            [
                'label' => esc_html__( 'Big Title', 'job_board-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Looking for an Expert?', 'job_board-companion' ),
            ]
        );
        $this->add_control(
            'right_text',
            [
                'label' => esc_html__( 'Text', 'job_board-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( 'We provide online instant cash loans with quick approval ', 'job_board-companion' ),
            ]
        );
        $this->add_control(
            'right_btn_title',
            [
                'label' => esc_html__( 'Button Title', 'job_board-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Post a Job', 'job_board-companion' ),
            ]
        );
        $this->add_control(
            'right_btn_url',
            [
                'label' => esc_html__( 'Button URL', 'job_board-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
            ]
        );
        $this->end_controls_section(); // End Hero content


    /**
     * Style Tab
     * ------------------------------ Style Title ------------------------------
     *
     */
        $this->start_controls_section(
			'style_title', [
				'label' => __( 'Style Hero Section', 'job_board-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_col', [
				'label' => __( 'First Line Color', 'job_board-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'sub_title_col', [
				'label' => __( 'Second Line Color', 'job_board-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text span' => 'color: {{VALUE}};',
				],
			]
		);
        
        $this->add_control(
            'button_col_separator',
            [
                'label'     => __( 'Button Styles', 'job_board-companion' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
		$this->add_control(
			'btn_bg_col', [
				'label' => __( 'Button BG Color', 'job_board-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text a.boxed-btn3-line' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_txt_col', [
				'label' => __( 'Button Text Color', 'job_board-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text a.boxed-btn3-line' => 'color: {{VALUE}} !important; border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_hover_col', [
				'label' => __( 'Button Hover BG Color', 'job_board-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text a.boxed-btn3-line:hover' => 'background: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'btn_hover_txt_col', [
				'label' => __( 'Button Hover Text Color', 'job_board-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text a.boxed-btn3-line:hover' => 'color: {{VALUE}} !important; border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}
    
	protected function render() {
    $settings  = $this->get_settings();
    $bg_img = !empty( $settings['bg_img']['url'] ) ? $settings['bg_img']['url'] : '';
    $left_big_title = !empty( $settings['left_big_title'] ) ? $settings['left_big_title'] : '';
    $left_text = !empty( $settings['left_text'] ) ? $settings['left_text'] : '';
    $left_btn_title = !empty( $settings['left_btn_title'] ) ? $settings['left_btn_title'] : '';
    $left_btn_url = !empty( $settings['left_btn_url']['url'] ) ? $settings['left_btn_url']['url'] : '';
    $right_big_title = !empty( $settings['right_big_title'] ) ? $settings['right_big_title'] : '';
    $right_text = !empty( $settings['right_text'] ) ? $settings['right_text'] : '';
    $right_btn_title = !empty( $settings['right_btn_title'] ) ? $settings['right_btn_title'] : '';
    $right_btn_url = !empty( $settings['right_btn_url']['url'] ) ? $settings['right_btn_url']['url'] : '';
    ?>

    <style>
        .job_searcing_wrap::after {
            background-image: url(<?php echo esc_url($bg_img)?>);
        }
    </style>

    <!-- job_searcing_wrap  -->
    <div class="job_searcing_wrap overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1 col-md-6">
                    <div class="searching_text">
                        <?php 
                            if ( $left_big_title ) { 
                                echo '
                                <h3>
                                    '.esc_html( $left_big_title ).'
                                </h3>
                                ';                                    
                            }
                            if ( $left_text ) { 
                                echo '
                                <p>
                                    '.wp_kses_post( nl2br($left_text) ).'
                                </p>
                                ';                                    
                            }
                            if ( $left_btn_title ) { 
                                echo '
                                <a href="'.esc_url($left_btn_url).'" class="boxed-btn3">'.esc_html($left_btn_title).'</a>
                                ';                                    
                            }
                        ?>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-6">
                    <div class="searching_text">
                        <?php 
                            if ( $right_big_title ) { 
                                echo '
                                <h3>
                                    '.esc_html( $right_big_title ).'
                                </h3>
                                ';                                    
                            }
                            if ( $right_text ) { 
                                echo '
                                <p>
                                    '.wp_kses_post( nl2br($right_text) ).'
                                </p>
                                ';                                    
                            }
                            if ( $right_btn_title ) { 
                                echo '
                                <a href="'.esc_url($right_btn_url).'" class="boxed-btn3">'.esc_html($right_btn_title).'</a>
                                ';                                    
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job_searcing_wrap end  -->
    <?php
    } 
}