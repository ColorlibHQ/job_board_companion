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
 * Job_Board services Contents section widget.
 *
 * @since 1.0
 */
class Job_Board_Services extends Widget_Base {

	public function get_name() {
		return 'job_board-services';
	}

	public function get_title() {
		return __( 'Services', 'job_board-companion' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'job_board-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  services contents  ------------------------------
		$this->start_controls_section(
			'services_content',
			[
				'label' => __( 'Services Contents', 'job_board-companion' ),
			]
        );
        $this->add_control(
            'sub_title',
            [
                'label'         => __( 'Sub Title', 'job_board-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'Services', 'job_board-companion' )
            ]
        );
        $this->add_control(
            'big_title',
            [
                'label'         => __( 'Big Title', 'job_board-companion' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'default'       => __( 'With more than 20 years of experience we can deliver the best product design.', 'job_board-companion' )
            ]
        );
		$this->add_control(
            'services', [
                'label' => __( 'Create New', 'job_board-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'item_icon',
                        'label' => __( 'Select Icon', 'job_board-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::SELECT,
                        'options' => job_board_themify_icon(),
                        'default' => 'layers-icon',
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Title', 'job_board-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Graphic Design', 'job_board-companion' ),
                    ],
                    [
                        'name' => 'text',
                        'label' => __( 'Text', 'job_board-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.', 'job_board-companion' ),
                    ],
                ],
                'default'   => [
                    [
                        'item_icon'        => 'layers-icon',
                        'item_title'        => __( 'Graphic design', 'job_board-companion' ),
                        'text' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.', 'job_board-companion' ),
                    ],
                    [
                        'item_icon'        => 'design-icon',
                        'item_title'        => __( 'Web design', 'job_board-companion' ),
                        'text' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.', 'job_board-companion' ),
                    ],
                    [
                        'item_icon'        => '3d-icon',
                        'item_title'        => __( 'Mobile App', 'job_board-companion' ),
                        'text' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.', 'job_board-companion' ),
                    ],
                ]
            ]
        );
        $this->end_controls_section(); // End Hero content

        /**
         * Style Tab
         * ------------------------------ Style Title ------------------------------
         *
         */
        $this->start_controls_section(
            'style_team_member', [
                'label' => __( 'Style Member Section', 'job_board-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Section Title Color', 'job_board-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'job_board-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .section_title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        
        $this->add_control(
            'single_item_styles_seperator',
            [
                'label' => esc_html__( 'Single Item Styles', 'job_board-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'item_title_color', [
                'label' => __( 'Title Color', 'job_board-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .single_team .team_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_text_color', [
                'label' => __( 'Text Color', 'job_board-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .single_team .team_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings = $this->get_settings();
    $sub_title = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $big_title = !empty( $settings['big_title'] ) ? $settings['big_title'] : '';
    $services = !empty( $settings['services'] ) ? $settings['services'] : '';
    ?>

    <!-- service_area  -->
    <div class="service_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-70">
                        <?php
                        if ( $sub_title ) {
                            echo '
                            <span class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" >
                                '.esc_html( $sub_title ).'
                            </span>
                            ';
                        }
                        if ( $big_title ) {
                            echo '
                            <h3 class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".2s">
                                '.esc_html( $big_title ).'
                            </h3>
                            ';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if( is_array( $services ) && count( $services ) > 0 ){
                    foreach ( $services as $item ) {
                        $item_icon = !empty( $item['item_icon'] ) ? JOB_BOARD_DIR_ICON_IMG_URI . $item['item_icon'] . '.svg' : '';
                        $item_title = !empty( $item['item_title'] ) ? $item['item_title'] : '';
                        $text = !empty( $item['text'] ) ? $item['text'] : '';
                        ?>
                        <div class="col-xl-4 col-md-4">
                            <div class="single_service text-center wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay=".4s">
                                <?php
                                    if ( $item_icon ) {
                                        echo '
                                        <div class="icon">
                                            <img src="'.esc_url($item_icon).'" alt="'.esc_attr($item_title).'">
                                        </div>
                                        ';
                                    }
                                    if ( $item_title ) {
                                        echo '<h3>'.esc_html( $item_title ).'</h3>';
                                    }
                                    if ( $text ) {
                                        echo '<p>'.wp_kses_post( $text ).'</p>';
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    }
}