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
 * Barber elementor hero section widget.
 *
 * @since 1.0
 */
class Barber_Hero extends Widget_Base {

	public function get_name() {
		return 'barber-hero';
	}

	public function get_title() {
		return __( 'Hero Section', 'barber-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'barber-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Hero content ------------------------------
		$this->start_controls_section(
			'hero_content',
			[
				'label' => __( 'Hero content', 'barber-companion' ),
			]
        );
        
		$this->add_control(
            'banner_img', [
                'label' => __( 'BG Image', 'barber-companion' ),
                'type' => Controls_Manager::MEDIA,

            ]
        );
		$this->add_control(
            'barber_img', [
                'label' => __( 'Barber Image', 'barber-companion' ),
                'type' => Controls_Manager::MEDIA,

            ]
        );
		$this->add_control(
            'big_title', [
                'label' => __( 'Big Title', 'barber-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Best Barber in <br>your Town'
            ]
        );
		$this->add_control(
            'sub_title', [
                'label' => __( 'Sub Title', 'barber-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Professional Care'
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
				'label' => __( 'Style Hero Section', 'barber-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'big_title_col', [
				'label' => __( 'Big Title Color', 'barber-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'sub_title_col', [
				'label' => __( 'Sub Title Color', 'barber-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text p' => 'color: {{VALUE}};',
				],
			]
        );
		$this->add_control(
			'btn_border-text_col', [
				'label' => __( 'Button Border & Text Color', 'barber-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text .boxed-btn2' => 'color: {{VALUE}};border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_bg_hov_col', [
				'label' => __( 'Button Hover Bg & Border Color', 'barber-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text .boxed-btn2:hover' => 'background: {{VALUE}};border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_bg_hov_txt_col', [
				'label' => __( 'Button Hover Text Color', 'barber-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text .boxed-btn2:hover' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->end_controls_section();
	}
    
	protected function render() {
    $settings   = $this->get_settings();  
    $banner_img = !empty( $settings['banner_img']['url'] ) ? $settings['banner_img']['url'] : ''; 
    $big_title  = !empty( $settings['big_title'] ) ? wp_kses_post(nl2br($settings['big_title'])) : ''; 
    $barber_img = !empty( $settings['barber_img']['id'] ) ? wp_get_attachment_image( $settings['barber_img']['id'], 'barber_text_img_258x85', '', array( 'alt' => 'barber text image' ) ) : '';
    $sub_title  = !empty( $settings['sub_title'] ) ? esc_html($settings['sub_title']) : '';     
    ?>
    
    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider d-flex align-items-center justify-content-center overlay2" <?php echo barber_inline_bg_img( esc_url( $banner_img ) ); ?>>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider_text text-center">
                            <?php
                                if ( $barber_img ) {
                                    echo $barber_img;
                                }
                                if ( $big_title ) {
                                    echo "<h3>{$big_title}</h3>";
                                }
                                if ( $sub_title ) {
                                    echo "<p>{$sub_title}</p>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->
    <?php

    }
}