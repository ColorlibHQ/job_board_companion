<?php
namespace Job_Boardelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Job_Board elementor testimonial section widget.
 *
 * @since 1.0
 */
class Job_Board_Testimonial extends Widget_Base {

	public function get_name() {
		return 'job_board-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'job_board-companion' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'job_board-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Testimonial content ------------------------------
		$this->start_controls_section(
			'testimonial_content',
			[
				'label' => __( 'Testimonial content', 'job_board-companion' ),
			]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'job_board-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Testimonial', 'job_board-companion' ),
            ]
        );
		$this->add_control(
            'testimonials', [
                'label' => __( 'Create New', 'job_board-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ client_name }}}',
                'fields' => [
                    [
                        'name' => 'client_img',
                        'label' => __( 'Client Image', 'job_board-companion' ),
                        'description' => __( 'The Image size should be 228x228', 'job_board-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'review_text',
                        'label' => __( 'Review Text', 'job_board-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default'     => __( '"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering through animal welfare when people might depend on livestock as their only source of income or food.', 'job_board-companion' ),
                    ],
                    [
                        'name' => 'client_name',
                        'label' => __( 'Client Name', 'job_board-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Micky Mouse', 'job_board-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'client_img'    => [
                            'url'       => Utils::get_placeholder_image_src(),
                        ],
                        'review_text'   => __( '"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering through animal welfare when people might depend on livestock as their only source of income or food.', 'job_board-companion' ),
                        'client_name'   => __( 'Micky Mouse', 'job_board-companion' ),
                    ],
                    [      
                        'client_img'    => [
                            'url'       => Utils::get_placeholder_image_src(),
                        ],
                        'review_text'   => __( '"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering through animal welfare when people might depend on livestock as their only source of income or food.', 'job_board-companion' ),
                        'client_name'   => __( 'John Doe', 'job_board-companion' ),
                    ],
                    [      
                        'client_img'    => [
                            'url'       => Utils::get_placeholder_image_src(),
                        ],
                        'review_text'   => __( '"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering through animal welfare when people might depend on livestock as their only source of income or food.', 'job_board-companion' ),
                        'client_name'   => __( 'Jonathan Doe', 'job_board-companion' ),
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End gallery content

    /**
     * Style Tab
     * ------------------------------ Style Section ------------------------------
     *
     */

        $this->start_controls_section(
            'style_gallery_section', [
                'label' => __( 'Style Gallery Section', 'job_board-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'hover_overlay_col', [
                'label' => __( 'Hover overy Color', 'job_board-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_area .single_gallery .hover_pop:before' => 'background: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'btn_styles_seperator',
            [
                'label' => esc_html__( 'Button Styles', 'job_board-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'btn_bg_col', [
                'label' => __( 'Button BG Color', 'job_board-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_area .view_pore.boxed-btn3' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hov_col', [
                'label' => __( 'Button Hover Color', 'job_board-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_area .view_pore.boxed-btn3:hover' => 'background: transparent; color: {{VALUE}} !important; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings  = $this->get_settings();
    // call load widget script
    $this->load_widget_script(); 
    $sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $testimonials = !empty( $settings['testimonials'] ) ? $settings['testimonials'] : '';
    $quote_img = JOB_BOARD_DIR_ICON_IMG_URI . 'quote.svg';
    ?>


    <!-- testimonial_area  -->
    <div class="testimonial_area  ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-40">
                        <h3>Testimonial</h3>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        <?php
                        if( is_array( $testimonials ) && count( $testimonials ) > 0 ){
                            foreach ( $testimonials as $item ) {
                                $review_text = !empty( $item['review_text'] ) ? $item['review_text'] : '';
                                $client_img = !empty( $item['client_img']['id'] ) ? wp_get_attachment_image( $item['client_img']['id'], 'job_board_testimonial_img_42x42', '', array('alt' => job_board_image_alt( $item['client_img']['url'] ) ) ) : '';
                                $client_name = !empty( $item['client_name'] ) ? $item['client_name'] : '';
                                ?>
                                <div class="single_carousel">
                                    <div class="row">
                                        <div class="col-lg-11">
                                            <div class="single_testmonial d-flex align-items-center">
                                                <?php
                                                    if ( $client_img ) {
                                                    echo '<div class="thumb">
                                                        '.wp_kses_post( $client_img );

                                                        echo '
                                                        <div class="quote_icon">
                                                            <i class="Flaticon flaticon-quote"></i>
                                                        </div>
                                                    </div>
                                                    ';
                                                    }
                                                ?>
                                                <div class="info">
                                                    <?php
                                                        if ( $review_text ) {
                                                            echo '<p>'.wp_kses_post( nl2br($review_text) ).'</p>';
                                                        }
                                                        if ( $client_name ) {
                                                            echo '<span>- '.esc_html( $client_name).'</span>';
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            // review-active
            var testmonial = $('.testmonial_active');
            if(testmonial.length){
            testmonial.owlCarousel({
            loop:true,
            margin:0,
            autoplay:true,
            navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
                nav:true,
            dots:false,
            autoplayHoverPause: true,
            autoplaySpeed: 800,
                responsive:{
                    0:{
                        items:1,
                        dots:false,
                        nav:false,
                    },
                    767:{
                        items:1,
                        dots:false,
                        nav:false,
                    },
                    992:{
                        items:1,
                        nav:true
                    },
                    1200:{
                        items:1,
                        nav:true
                    },
                    1500:{
                        items:1
                    }
                }
            });
            }         
        })(jQuery);
        </script>
        <?php 
        }
    }	
}