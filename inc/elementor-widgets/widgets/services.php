<?php
namespace Barberelementor\Widgets;

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
 * Barber elementor service section widget.
 *
 * @since 1.0
 */
class Barber_Services extends Widget_Base {

	public function get_name() {
		return 'barber-services';
	}

	public function get_title() {
		return __( 'Services', 'barber-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'barber-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Service content ------------------------------
		$this->start_controls_section(
			'service_content',
			[
				'label' => __( 'Services content', 'barber-companion' ),
			]
        );
        $this->add_control(
            'sec_icon',
            [
                'label' => esc_html__( 'Section Icon', 'barber-companion' ),
                'type' => Controls_Manager::ICON,
                'label_block' => true,
                'options' => barber_themify_icon(),
                'default' => 'flaticon-scissors'
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'barber-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Make your Dream with US', 'barber-companion' )
            ]
        );

        $this->add_control(
            'service_inner_settings_seperator',
            [
                'label' => esc_html__( 'Service Items', 'barber-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'barberservices', [
                'label' => __( 'Create New', 'barber-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ service_title }}}',
                'fields' => [
                    [
                        'name' => 'service_img',
                        'label' => __( 'Service Image', 'barber-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'service_title',
                        'label' => __( 'Service Title', 'barber-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Men’s Facial', 'barber-companion' ),
                    ],
                    [
                        'name' => 'service_price',
                        'label' => __( 'Service Price', 'barber-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '$15', 'barber-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'service_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'service_title'     => __( 'Men’s Facial', 'barber-companion' ),
                        'service_price'   => __( '$15', 'barber-companion' ),
                    ],
                    [      
                        'service_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'service_title'     => __( 'Classic haircut', 'barber-companion' ),
                        'service_price'   => __( '$17', 'barber-companion' ),
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End service content

    /**
     * Style Tab
     * ------------------------------ Style Section Heading ------------------------------
     *
     */

        $this->start_controls_section(
            'style_room_section', [
                'label' => __( 'Style Service Section', 'barber-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'barber-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dream_service .section_title .sub_heading' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'big_title_col', [
                'label' => __( 'Big Title Color', 'barber-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dream_service .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'singl_item_styles_seperator',
            [
                'label' => esc_html__( 'Single Item Styles', 'barber-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'sing_ser_title_col', [
                'label' => __( 'Title Color', 'barber-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dream_service .single_dream h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sing_ser_txt_col', [
                'label' => __( 'Text Color', 'barber-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dream_service .single_dream p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {
    $settings       = $this->get_settings();
    $sec_icon       = !empty( $settings['sec_icon'] ) ? esc_attr($settings['sec_icon']) : '';
    $sec_title      = !empty( $settings['sec_title'] ) ? esc_html($settings['sec_title']) : '';
    $barberservices = !empty( $settings['barberservices'] ) ? $settings['barberservices'] : '';
    ?>

    <div class="service_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title2 text-center mb-90">
                        <?php 
                            if ( $sec_icon ) { 
                                echo "<i class='{$sec_icon}'></i>";
                            }
                            if ( $sec_title ) { 
                                echo "<h3>{$sec_title}</h3>";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="white_bg_pos">
                <div class="row">
                    <?php 
                    if( is_array( $barberservices ) && count( $barberservices ) > 0 ) {
                        foreach( $barberservices as $service ) {
                            $service_img     = !empty( $service['service_img']['id'] ) ? wp_get_attachment_image( $service['service_img']['id'], 'barber_np_thumb', '', array( 'alt' => 'service image' ) ) : '';
                            $service_title   = ( !empty( $service['service_title'] ) ) ? esc_html($service['service_title']) : '';
                            $service_price    = ( !empty( $service['service_price'] ) ) ? esc_html($service['service_price']) : '';
                            ?>
                            <div class="col-xl-6">
                                <div class="single_service d-flex justify-content-between align-items-center">
                                    <div class="service_inner d-flex align-items-center">
                                        <div class="thumb">
                                            <?php 
                                                if ( $service_img ) { 
                                                    echo $service_img;
                                                }
                                            ?>
                                        </div>
                                        <?php 
                                            if ( $service_title ) { 
                                                echo "<span>{$service_title}</span>";
                                            }
                                        ?>
                                    </div>
                                    <?php 
                                        if ( $service_price ) { 
                                            echo "<p>………………………..{$service_price}</p>";
                                        }
                                    ?>
                                </div>
                            </div>
                            <?php 
                        }
                    }
                    ?>

                    <div class="col-xl-12">
                        <div class="book_btn text-center">
                            <a class="boxed-btn3 popup-with-form" href="#test-form">Make an Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
}