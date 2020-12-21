<?php
namespace Barberelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Barber elementor home contact section widget.
 *
 * @since 1.0
 */
class Barber_Home_Contact extends Widget_Base {

	public function get_name() {
		return 'barber-home-contact-section';
	}

	public function get_title() {
		return __( 'Home Contact', 'barber-companion' );
	}

	public function get_icon() {
		return 'eicon-play-o';
	}

	public function get_categories() {
		return [ 'barber-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Home Contact Section content ------------------------------
        $this->start_controls_section(
            'home_contact_content',
            [
                'label' => __( 'Home Contact Section', 'barber-companion' ),
            ]
        );
        $this->add_control(
            'bg_img',
            [
                'label' => esc_html__( 'BG Image', 'barber-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->add_control(
            'right_section_separator',
            [
                'label' => esc_html__( 'Right Section Content', 'barber-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'barber-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'How to Find Us', 'barber-companion' ),
            ]
        );
        
        $this->add_control(
            'contact_contents', [
                'label' => __( 'Create New', 'barber-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'item_icon',
                        'label' => __( 'Item Icon', 'barber-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::ICON,
                        'options' => barber_themify_icon(),
                        'default' => 'flaticon-placeholder'
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Item Title', 'barber-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Location', 'barber-companion' ),
                    ],
                    [
                        'name' => 'item_text',
                        'label' => __( 'Item Text', 'barber-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( '200, A-block, Green road, USA', 'barber-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'item_icon'  => __( 'flaticon-placeholder', 'barber-companion' ),
                        'item_title' => __( 'Location', 'barber-companion' ),
                        'item_text'  => __( '200, A-block, Green road, USA', 'barber-companion' ),
                    ],
                    [      
                        'item_icon'  => __( 'flaticon-phone-call', 'barber-companion' ),
                        'item_title' => __( 'Call Us', 'barber-companion' ),
                        'item_text'  => __( '+10 378 478 2789', 'barber-companion' ),
                    ],
                    [      
                        'item_icon'  => __( 'flaticon-paper-plane', 'barber-companion' ),
                        'item_title' => __( 'Mail Us', 'barber-companion' ),
                        'item_text'  => __( 'contact@barbershop.com', 'barber-companion' ),
                    ],
                ]
            ]
        );      
        
        $this->end_controls_section(); // End about us content

        //------------------------------ Style title ------------------------------
        
        // Home Contact Section Styles
        $this->start_controls_section(
            'home_contact_sec_style', [
                'label' => __( 'Home Contact Section Styles', 'barber-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
			'sub_title_col', [
				'label' => __( 'Sub title Color', 'barber-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .messege_area .section_title .sub_heading' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'sec_title_col', [
				'label' => __( 'Big Title Color', 'barber-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .messege_area .section_title h3' => 'color: {{VALUE}};',
					'{{WRAPPER}} .messege_area .section_title .seperator' => 'background: {{VALUE}};',
				],
			]
        );

        $this->add_control(
            'btn_styles_seperator',
            [
                'label' => esc_html__( 'Button Styles', 'barber-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
			'btn_border_txt_col', [
				'label' => __( 'Button Border & Text Color', 'barber-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .messege_area .messege .boxed-btn' => 'color: {{VALUE}} !important; border-color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'btn_hvr_border_bg_col', [
				'label' => __( 'Button Hover Border & Bg Color', 'barber-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .messege_area .messege .boxed-btn:hover' => 'background: {{VALUE}}; border-color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'btn_hvr_txt_col', [
				'label' => __( 'Button Hover Text Color', 'barber-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .messege_area .messege .boxed-btn:hover' => 'color: {{VALUE}} !important;;',
				],
			]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings         = $this->get_settings();
    $bg_img           = !empty( $settings['bg_img']['url'] ) ?  $settings['bg_img']['url'] : '';
    $sec_title        = !empty( $settings['sec_title'] ) ?  $settings['sec_title'] : '';
    $contact_contents = !empty( $settings['contact_contents'] ) ?  $settings['contact_contents'] : '';
    ?>
    
    <!-- find_us_area start -->
    <div class="find_us_area find_bg_1" <?php echo barber_inline_bg_img( esc_url( $bg_img ) ); ?>>
        <div class="container">
            <div class="row">
                <div class="col-xl-5 offset-xl-7 col-lg-6 offset-lg-6">
                    <div class="find_info">
                        <?php 
                            if ( $sec_title ) { 
                                echo "<h3 class='find_info_title'>{$sec_title}</h3>";
                            }
                        ?>

                        <?php 
                        if( is_array( $contact_contents ) && count( $contact_contents ) > 0 ) {
                            foreach( $contact_contents as $item ) {
                                $item_icon   = ( !empty( $item['item_icon'] ) ) ? esc_attr($item['item_icon']) : '';
                                $item_title  = ( !empty( $item['item_title'] ) ) ? esc_html($item['item_title']) : '';
                                $item_text   = ( !empty( $item['item_text'] ) ) ? esc_html($item['item_text']) : '';                                
                                ?>
                                <div class="single_find d-flex">
                                    <div class="icon">
                                        <?php 
                                            if ( $item_icon ) { 
                                                echo "<i class='{$item_icon}'></i>";
                                            }
                                        ?>
                                    </div>
                                    <div class="find_text">
                                        <?php 
                                            if ( $item_title ) { 
                                                echo "<h3>{$item_title}</h3>";
                                            }
                                            if ( $item_text ) { 
                                                echo "<p>{$item_text}</p>";
                                            }
                                        ?>
                                    </div>
                                </div>
                                <?php 
                            }
                        }
                        ?>

                        <div class="single_find">
                            <div class="book_btn">
                                <a class="popup-with-form" href="#test-form">Make an Appointment</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- find_us_area_end -->
    <?php

    }
}