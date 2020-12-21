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
 * Barber elementor about us section widget.
 *
 * @since 1.0
 */
class Barber_About_Us extends Widget_Base {

	public function get_name() {
		return 'barber-aboutus';
	}

	public function get_title() {
		return __( 'About Us', 'barber-companion' );
	}

	public function get_icon() {
		return 'eicon-column';
	}

	public function get_categories() {
		return [ 'barber-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  About Left content ------------------------------
        $this->start_controls_section(
            'about_left_content',
            [
                'label' => __( 'About Left Content', 'barber-companion' ),
            ]
        );
        $this->add_control(
            'left_img',
            [
                'label' => esc_html__( 'Left Image', 'barber-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'left_icon',
            [
                'label' => esc_html__( 'Select an Icon', 'barber-companion' ),
                'type' => Controls_Manager::ICON,
                'label_block' => true,
                'default'   => 'flaticon-clock',
                'options'   => barber_themify_icon()
            ]
        );
        $this->add_control(
            'big_txt',
            [
                'label' => esc_html__( 'Big Text', 'barber-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Opening Hour', 'barber-companion' ),
            ]
        );
        $this->add_control(
            'day_hour',
            [
                'label' => esc_html__( 'Day and Hour', 'barber-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'Mon-Fri (9.00-11.00) <br>Sat (10.00-4.00)',
            ]
        );
        
        $this->end_controls_section(); // End about us content

        // About right content
        $this->start_controls_section(
            'about_right_content',
            [
                'label' => __( 'About Right Content', 'barber-companion' ),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'barber-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'About Us', 'barber-companion' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'barber-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'Experienced and <br>Traditional Stylish <br>Barber Shop',
            ]
        );
        $this->add_control(
            'sec_text',
            [
                'label' => esc_html__( 'Section Text', 'barber-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'Inspires employees and organizations to support causes they care  <br>is to bring more resources to the nonprofits that are  <br>changing our world.',
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__( 'Button Text', 'barber-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Learn More', 'barber-companion' ),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'Button URL', 'barber-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url'   => '#'
                ],
            ]
        );
        
        $this->end_controls_section(); // End about us content

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'about_sec_style', [
                'label' => __( 'About Section Styles', 'barber-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'left_sec_styles_seperator',
            [
                'label' => esc_html__( 'Left Section Styles', 'barber-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
			'exp_val_col', [
				'label' => __( 'Experience Value Color', 'barber-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_area .about_thumb .exprience h1' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'exp_txt_col', [
				'label' => __( 'Experience Text Color', 'barber-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_area .about_thumb .exprience span' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
            'right_sec_styles_seperator',
            [
                'label' => esc_html__( 'Right Section Styles', 'barber-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'barber-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_info .section_title .sub_heading' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Sec Title Color', 'barber-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_info .section_title h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .about_info .section_title .seperator' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_text_col', [
                'label' => __( 'Sec Text Color', 'barber-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .about_info p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .about_area .about_info ul li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'list_circle_col', [
                'label' => __( 'List Item Circle Color', 'barber-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .about_info ul li::before' => 'background: {{VALUE}};',
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
            'btn_txt_col', [
                'label' => __( 'Button Text & Border Color', 'barber-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .about_info a' => 'color: {{VALUE}} !important; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hvr_bg_col', [
                'label' => __( 'Button Hover Bg & Border Color', 'barber-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .about_info a:hover' => 'background: {{VALUE}}; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hvr_txt_col', [
                'label' => __( 'Button Hover Text Color', 'barber-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .about_info a:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_section();

    }
    

	protected function render() {
    $settings       = $this->get_settings();    
    $left_img       = !empty( $settings['left_img']['id'] ) ? wp_get_attachment_image( $settings['left_img']['id'], 'barber_about_img_588x600', '', array( 'alt' => 'about image' ) ) : '';
    $left_icon      = !empty( $settings['left_icon'] ) ?  esc_attr($settings['left_icon']) : '';
    $big_txt        = !empty( $settings['big_txt'] ) ?  esc_html($settings['big_txt']) : '';
    $day_hour       = !empty( $settings['day_hour'] ) ?  wp_kses_post(nl2br($settings['day_hour'])) : '';
    $sub_title      = !empty( $settings['sub_title'] ) ?  esc_html($settings['sub_title']) : '';
    $sec_title      = !empty( $settings['sec_title'] ) ?  wp_kses_post(nl2br($settings['sec_title'])) : '';
    $sec_text       = !empty( $settings['sec_text'] ) ?  wp_kses_post(nl2br($settings['sec_text'])) : '';
    $btn_text       = !empty( $settings['btn_text'] ) ?  esc_html($settings['btn_text']) : '';
    $btn_url        = !empty( $settings['btn_url']['url'] ) ?  esc_url($settings['btn_url']['url']) : '';
    $dynamic_class  = is_front_page() ? 'about_area' : 'about_area';
    ?>
    
    <!-- about_area_start -->
    <div class="about_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="about_thumb">
                        <?php
                            if ( $left_img ) {
                                echo $left_img;
                            }
                        ?>
                        <div class="opening_hour text-center">
                            <?php
                                if ( $left_icon ) {
                                    echo "<i class='{$left_icon}'></i>";
                                }
                                if ( $big_txt ) {
                                    echo "<h3>{$big_txt}</h3>";
                                }
                                if ( $day_hour ) {
                                    echo "<p>{$day_hour}</p>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="about_info">
                        <div class="section_title mb-20px">
                            <?php
                                if ( $sub_title ) {
                                    echo "<span>{$sub_title}</span>";
                                }
                                if ( $sec_title ) {
                                    echo "<h3>{$sec_title}</h3>";
                                }
                            ?>
                        </div>
                        <?php
                            if ( $sec_text ) {
                                echo "<p>{$sec_text}</p>";
                            }
                            if ( $btn_text ) {
                                echo "<a href='{$btn_url}' class='boxed-btn3'>{$btn_text}</a>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end -->
    <?php
    }
}