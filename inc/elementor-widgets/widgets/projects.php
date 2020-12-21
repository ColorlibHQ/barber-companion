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
 * Barber elementor project section widget.
 *
 * @since 1.0
 */
class Barber_Projects extends Widget_Base {

	public function get_name() {
		return 'barber-projects';
	}

	public function get_title() {
		return __( 'Projects', 'barber-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'barber-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Project content ------------------------------
		$this->start_controls_section(
			'project_content',
			[
				'label' => __( 'Projects content', 'barber-companion' ),
			]
        );
        $this->add_control(
            'style_type',
            [
                'label' => esc_html__( 'Select Style', 'barber-companion' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'default' => 'style_1',
                'options' => [
                    'style_1' => __( 'Style 1', 'barber-companion' ),
                    'style_2' => __( 'Style 2', 'barber-companion' ),
                ]
            ]
        );

        // Style 2
        $this->add_control(
            'slider_imgs', [
                'label' => __( 'Top Slider Contents', 'barber-companion' ),
                'type' => Controls_Manager::REPEATER,
                'condition' => [
                    'style_type' => 'style_2'
                ],
                'title_field' => '{{{ slider_title }}}',
                'fields' => [
                    [
                        'name' => 'slider_title',
                        'label' => __( 'Slider Title', 'barber-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Slider 1', 'barber-companion' ),
                    ],
                    [
                        'name' => 'slider_img',
                        'label' => __( 'Slider Image', 'barber-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                ],
                'default'   => [
                    [
                        'slider_title'  => __( 'Slider 1', 'barber-companion' ),
                        'slider_img'       => [
                            'url'           => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'slider_title'  => __( 'Slider 2', 'barber-companion' ),
                        'slider_img'       => [
                            'url'           => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'slider_title'  => __( 'Slider 3', 'barber-companion' ),
                        'slider_img'       => [
                            'url'           => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'slider_title'  => __( 'Slider 4', 'barber-companion' ),
                        'slider_img'       => [
                            'url'           => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ]
            ]
        );

        // Style 1
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'barber-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Project view', 'barber-companion' ),
                'condition' => [
                    'style_type' => 'style_1'
                ],
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'barber-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Our Latest Projects', 'barber-companion' ),
                'condition' => [
                    'style_type' => 'style_1'
                ],
            ]
        );

        $this->add_control(
            'project_inner_settings_seperator',
            [
                'label' => esc_html__( 'Project Items', 'barber-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'style_type' => 'style_1'
                ],
            ]
        );

		$this->add_control(
            'barberprojects', [
                'label' => __( 'Create New', 'barber-companion' ),
                'type' => Controls_Manager::REPEATER,
                'condition' => [
                    'style_type' => 'style_1'
                ],
                'title_field' => '{{{ project_title }}}',
                'fields' => [
                    [
                        'name' => 'reverse_img',
                        'label' => __( 'Reverse Style', 'barber-companion' ),
                        'type' => Controls_Manager::SWITCHER,
                        'label_on' => __( 'Yes', 'barber-companion' ),
                        'label_off' => __( 'No', 'barber-companion' ),
                    ],
                    [
                        'name' => 'project_img',
                        'label' => __( 'Project Image', 'barber-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'img_size',
                        'label' => __( 'Select Image Size', 'barber-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::SELECT,
                        'default' => __( 'barber_project_thumb_585x450', 'barber-companion' ),
                        'options' => [
                            'barber_project_thumb_585x450' => '585x450',
                            'barber_project_thumb_484x700' => '484x700',
                        ]
                    ],
                    [
                        'name' => 'project_location',
                        'label' => __( 'Project Location', 'barber-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Dubai, UAE', 'barber-companion' ),
                    ],
                    [
                        'name' => 'project_title',
                        'label' => __( 'Project Title', 'barber-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Abahoni Building', 'barber-companion' ),
                    ],
                    [
                        'name' => 'project_text',
                        'label' => __( 'Project Text', 'barber-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'Consectetur adipiscing elit, sed do eiusmod tempor labore et dolore magna aliqua quis ipsum suspendisse.', 'barber-companion' ),
                    ],
                    [
                        'name' => 'btn_text',
                        'label' => __( 'Button Text', 'barber-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'View More', 'barber-companion' ),
                    ],
                    [
                        'name' => 'btn_url',
                        'label' => __( 'Project URL', 'barber-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ]
                    ],
                ],
                'default'   => [
                    [
                        'project_img'       => [
                            'url'           => Utils::get_placeholder_image_src(),
                        ],
                        'img_size'          => 'barber_project_thumb_585x450',
                        'project_location'  => __( 'Dubai, UAE', 'barber-companion' ),
                        'project_title'     => __( 'Abahoni Building', 'barber-companion' ),
                        'project_text'      => __( 'Consectetur adipiscing elit, sed do eiusmod tempor labore et dolore magna aliqua quis ipsum suspendisse.', 'barber-companion' ),
                        'btn_text'          => __( 'View More', 'barber-companion' ),
                        'btn_url'           => '#',
                    ],
                    [
                        'reverse_img'       => 'yes',
                        'project_img'       => [
                            'url'           => Utils::get_placeholder_image_src(),
                        ],
                        'img_size'          => 'barber_project_thumb_484x700',
                        'project_location'  => __( 'Dhaka, Bangladesh', 'barber-companion' ),
                        'project_title'     => __( 'MR Kholifa Tower', 'barber-companion' ),
                        'project_text'      => __( 'Consectetur adipiscing elit, sed do eiusmod tempor labore et dolore magna aliqua quis ipsum suspendisse.', 'barber-companion' ),
                        'btn_text'          => __( 'View More', 'barber-companion' ),
                        'btn_url'           => '#',
                    ],
                    [
                        'project_img'       => [
                            'url'           => Utils::get_placeholder_image_src(),
                        ],
                        'img_size'          => 'barber_project_thumb_585x450',
                        'project_location'  => __( 'Dubai, UAE', 'barber-companion' ),
                        'project_title'     => __( 'Galoni Plan & Design', 'barber-companion' ),
                        'project_text'      => __( 'Consectetur adipiscing elit, sed do eiusmod tempor labore et dolore magna aliqua quis ipsum suspendisse.', 'barber-companion' ),
                        'btn_text'          => __( 'View More', 'barber-companion' ),
                        'btn_url'           => '#',
                    ],
                    [
                        'reverse_img'       => 'yes',
                        'project_img'       => [
                            'url'           => Utils::get_placeholder_image_src(),
                        ],
                        'img_size'          => 'barber_project_thumb_484x700',
                        'project_location'  => __( 'Dhaka, Bangladesh', 'barber-companion' ),
                        'project_title'     => __( 'Hiclick Mirror design', 'barber-companion' ),
                        'project_text'      => __( 'Consectetur adipiscing elit, sed do eiusmod tempor labore et dolore magna aliqua quis ipsum suspendisse.', 'barber-companion' ),
                        'btn_text'          => __( 'View More', 'barber-companion' ),
                        'btn_url'           => '#',
                    ],
                ]
            ]
		);
        $this->end_controls_section(); // End project content
        
        // Project left contents
        $this->start_controls_section(
			'project_left_contents',
			[
                'label' => __( 'Project Left Contents', 'barber-companion' ),
                'condition' => [
                    'style_type' => 'style_2'
                ],
            ],
        );
        $this->add_control(
            'left_text_contents', [
                'label' => __( 'Add Text Section', 'barber-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ text_title }}}',
                'fields' => [
                    [
                        'name' => 'text_title',
                        'label' => __( 'Section Title', 'barber-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Architechtural plan<br> design and build', 'barber-companion' ),
                    ],
                    [
                        'name' => 'text_paragraph',
                        'label' => __( 'Paragraph Text', 'barber-companion' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'label_block' => true,
                        'default' => __( 'Eiusmod tempor incididunt ut labore et dolore magna liqua orem ipsum dolor sit amet, consectetur adipisicing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.', 'barber-companion' ),
                    ],
                ],
                'default' => [
                    [
                        'text_title'     => 'Architechtural plan<br> design and build', 'barber-companion',
                        'text_paragraph' => __( 'Eiusmod tempor incididunt ut labore et dolore magna liqua orem ipsum dolor sit amet, consectetur adipisicing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.', 'barber-companion' ),
                    ],
                    [
                        'text_title'     => __( 'Challenge', 'barber-companion' ),
                        'text_paragraph' => __( 'I pray in tempor and vitality, so that the residue of the very hard work and a great idea eiusmod ipsum dolor sit amet, consectetur adipiscing elit. I grant you that labor, and vitality, and long-suffering, with some great eiusmod. Lorem ipsum carrots.', 'barber-companion' ),
                    ],
                    [
                        'text_title'     => __( 'Solution', 'barber-companion' ),
                        'text_paragraph' => __( 'I pray in tempor and vitality, so that the residue of the very hard work and a great idea eiusmod ipsum dolor sit amet, consectetur adipiscing elit. I grant you that labor, and vitality, and long-suffering, with some great eiusmod. Lorem ipsum carrots.', 'barber-companion' ),
                    ],
                ]
            ]
        );
        $this->end_controls_section(); // End left project content
        
        // Project right contents
        $this->start_controls_section(
			'project_right_contents',
			[
                'label' => __( 'Project Right Contents', 'barber-companion' ),
                'condition' => [
                    'style_type' => 'style_2'
                ],
            ],
        );
        $this->add_control(
            'project_right_img',
            [
                'label' => esc_html__( 'Project Right Image', 'barber-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'project_info_separator',
            [
                'label' => esc_html__( 'Project Info', 'barber-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'client_name',
            [
                'label' => esc_html__( 'Client Name', 'barber-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Colorlib', 'barber-companion' ),
            ]
        );
        $this->add_control(
            'project_cat',
            [
                'label' => esc_html__( 'Categories', 'barber-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Exterior', 'barber-companion' ),
            ]
        );
        $this->add_control(
            'project_date',
            [
                'label' => esc_html__( 'Project Date', 'barber-companion' ),
                'type' => Controls_Manager::DATE_TIME,
                'label_block' => true,
                'picker_options' => [
                    'dateFormat' => 'M J, Y'
                ],
                'default' => esc_html__( 'July 14th, 2019', 'barber-companion' ),
            ]
        );
        $this->add_control(
            'project_rating',
            [
                'label' => esc_html__( 'Project Rating', 'barber-companion' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
					'1' => [
                        'title' => __( '1', 'barber-companion' ),
                        'icon'  => 'fa fa-star'
                    ],
					'2' => [
                        'title' => __( '2', 'barber-companion' ),
                        'icon'  => 'fa fa-star'
                    ],
					'3' => [
                        'title' => __( '3', 'barber-companion' ),
                        'icon'  => 'fa fa-star'
                    ],
					'4' => [
                        'title' => __( '4', 'barber-companion' ),
                        'icon'  => 'fa fa-star'
                    ],
					'5' => [
                        'title' => __( '5', 'barber-companion' ),
                        'icon'  => 'fa fa-star'
                    ],
				],
                // 'default' => __( '5', 'barber-companion' ),
            ]
        );
        $this->add_control(
            'project_website',
            [
                'label' => esc_html__( 'Project Website', 'barber-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => 'https://examplesite.com'
                ],
            ]
        );

        $this->add_control(
            'project_sharing_separator',
            [
                'label' => esc_html__( 'Project Sharing', 'barber-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'project_share',
            [
                'label' => esc_html__( 'Show Project Sharing?', 'barber-companion' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'barber-companion' ),
                'label_off' => __( 'No', 'barber-companion' ),
                
            ]
        );
		$this->end_controls_section(); // End right project content

    /**
     * Style Tab
     * ------------------------------ Style Section Heading ------------------------------
     *
     */

        $this->start_controls_section(
            'style_room_section', [
                'label' => __( 'Style Service Section', 'barber-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_type' => 'style_1'
                ],
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'barber-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lastest_project .section_title .sub_heading' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Section Title Color', 'barber-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lastest_project .section_title h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .lastest_project .section_title .seperator' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'singl_item_styles_seperator',
            [
                'label' => esc_html__( 'Single Project Styles', 'barber-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'proj_loc_col', [
                'label' => __( 'Project Location Color', 'barber-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lastest_project .section_title .sub_heading2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'proj_title_col', [
                'label' => __( 'Project Title Color', 'barber-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lastest_project .section_title h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'proj_txt_col', [
                'label' => __( 'Project Text Color', 'barber-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lastest_project .section_title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'singl_item_btn_styles_seperator',
            [
                'label' => esc_html__( 'Button Styles', 'barber-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'btn_line_txt_col', [
                'label' => __( 'Button Border & Text Color', 'barber-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lastest_project .section_title .boxed-btn' => 'color: {{VALUE}} !important; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hvr_bg_col', [
                'label' => __( 'Button Hover Bg & Border Color', 'barber-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lastest_project .section_title .boxed-btn:hover' => 'background: {{VALUE}}; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hvr_txt_col', [
                'label' => __( 'Button Hover Text Color', 'barber-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lastest_project .section_title .boxed-btn:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_section();

		//------------------------------ Services Item Style ------------------------------
		$this->start_controls_section(
			'style_serv_items_sec', [
				'label' => __( 'Style Single Item', 'barber-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_type' => 'style_2'
                ],
			]
		);
		$this->add_control(
			'big_titles_color', [
				'label' => __( 'Big Titles Color', 'barber-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .project_details .project_details_left .single_details h3, .project_details .projects_details_info .details_info h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'texts_color', [
				'label' => __( 'Text Color', 'barber-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .project_details .project_details_left .single_details p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();

    }
    
    public function barber_get_project_img( $project_img ) {
        ?>
        <div class="single_project_thumb">
            <?php
                if ( $project_img ) {
                    echo $project_img;
                }
            ?>
        </div>
        <?php
    }

    public function barber_get_project_contents( $project_location, $project_title, $project_text, $btn_text, $btn_url ) {
        ?>
        <div class="section_title">
            <?php 
                if ( $project_location ) { 
                    echo '<span class="sub_heading2">'.$project_location.'</span>';
                }
                if ( $project_title ) { 
                    echo '<h4>'.esc_html( $project_title ).'</h4>';
                }
                if ( $project_text ) { 
                    echo '<p>'.esc_html( $project_text ).'</p>';
                }
                if ( $btn_text ) { 
                    echo '<a href="'.esc_url( $btn_url ).'" class="boxed-btn">'.esc_html( $btn_text ).'</a>';
                }
            ?>
        </div>
        <?php
    }

    public function barber_get_project_details_left_content( $left_text_contents ) {
        ?>
        <div class="col-xl-6 col-lg-6">
            <div class="project_details_left"> 
            <?php 
            if( is_array( $left_text_contents ) && count( $left_text_contents ) > 0 ) {
                foreach( $left_text_contents as $item ) {
                    $text_title = ( !empty( $item['text_title'] ) ) ? $item['text_title'] : '';
                    $text_paragraph = ( !empty( $item['text_paragraph'] ) ) ? $item['text_paragraph'] : '';
                    ?>
                    <div class="single_details">
                        <?php
                            if ( $text_title ) {
                                echo '<h3>'.wp_kses_post( nl2br( $text_title ) ).'</h3>';
                            }
                            if ( $text_paragraph ) {
                                echo '<p>'.wp_kses_post( nl2br( $text_paragraph ) ).'</p>';
                            }
                        ?>
                    </div>
                    <?php
                }
            }
            ?>
            </div>
        </div>
        <?php
    }

    public function barber_get_project_details_right_content( $project_right_img, $client_name, $project_cat, $project_date, $project_rating, $project_website, $project_share ) {
        ?>
        <div class="col-xl-6 col-lg-6">
            <div class="projects_details_info">
                <div class="details_thumb">
                    <?php
                        if ( $project_right_img ) {
                            echo $project_right_img;
                        }
                    ?>
                </div>
                <div class="details_info">
                    <?php echo '<h3>'. esc_html__( 'Project Info:', 'supreme' ) . '</h3>';?>
                    <div class="details_info_list">
                        <div class="single_details_info d-flex justify-content-between align-items-center">
                        <?php echo '<span class="left_info">'. esc_html__( 'Client:', 'supreme' ) . '</span>';?>
                            <span class="right_info"><?php echo esc_html( $client_name )?></span>
                        </div>
                        <div class="single_details_info d-flex justify-content-between align-items-center">
                        <?php echo '<span class="left_info">'. esc_html__( 'Categories:', 'supreme' ) . '</span>';?>
                            <span class="right_info"><?php echo esc_html( $project_cat )?></span>
                        </div>
                        <div class="single_details_info d-flex justify-content-between align-items-center">
                        <?php echo '<span class="left_info">'. esc_html__( 'Date:', 'supreme' ) . '</span>';?>
                            <span class="right_info"><?php echo esc_html( $project_date )?></span>
                        </div>
                        <div class="single_details_info d-flex justify-content-between align-items-center">
                        <?php echo '<span class="left_info">'. esc_html__( 'Rating:', 'supreme' ) . '</span>';?>
                            <?php 
                            if ( !empty( $project_rating ) ) { 
                                ?>
                                <span class="right_info star">
                                    <?php
                                        for ( $i = 0; $i < 5; $i++ ) {
                                            if ( $project_rating >= $i ) {
                                                echo '<i class="fa fa-star"></i>';
                                            }
                                        }
                                    ?>
                                </span>
                                <?php 
                            } 
                            ?>
                        </div>
                        <div class="single_details_info d-flex justify-content-between align-items-center">
                            <?php echo '<span class="left_info">'. esc_html__( 'Website:', 'supreme' ) . '</span>';?>
                            <span class="right_info"><a href="<?php echo esc_url( $project_website )?>"><?php echo esc_html( $project_website )?></a></span>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                if ( $project_share == 'yes' ) {
                ?>
                <div class="project_share">
                    <div class="single_details_info d-flex justify-content-between align-items-center">
                        <?php echo '<span class="left_info">'. esc_html__( 'Share Project:', 'supreme' ) . '</span>';?>
                        <?php echo barber_social_sharing_buttons( 'project-sharer')?>
                    </div>
                </div>
                <?php
                }
            ?>
        </div>
        <?php
    }

	protected function render() {
    $settings       = $this->get_settings();
    $style_type     = !empty( $settings['style_type'] ) ? $settings['style_type'] : '';
    if ( $style_type == 'style_1' ) {
        $sub_title      = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
        $sec_title      = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
        $barberprojects = !empty( $settings['barberprojects'] ) ? $settings['barberprojects'] : '';
        ?>
        <!-- lastest_project_strat -->
        <div class="lastest_project">
            <div class="container">
                <?php if ( $sub_title || $sec_title ) { ?>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section_title mb-60">
                            <?php 
                                if ( $sub_title ) { 
                                    echo '<span class="sub_heading">'.$sub_title.'</span>';
                                }
                                if ( $sec_title ) { 
                                    echo '<h3>'.esc_html( $sec_title ).'</h3>';
                                    echo '<div class="seperator"></div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <?php 
                if( is_array( $barberprojects ) && count( $barberprojects ) > 0 ) {
                    foreach( $barberprojects as $project ) {
                        $reverse_img        = ( !empty( $project['reverse_img'] ) ) ? $project['reverse_img'] : '';
                        $img_size           = ( !empty( $project['img_size'] ) ) ? $project['img_size'] : '';
                        $project_img        = !empty( $project['project_img']['id'] ) ? wp_get_attachment_image( $project['project_img']['id'], $img_size, '', array( 'alt' => 'project image' ) ) : '';
                        $project_location   = ( !empty( $project['project_location'] ) ) ? $project['project_location'] : '';
                        $project_title      = ( !empty( $project['project_title'] ) ) ? $project['project_title'] : '';
                        $project_text       = ( !empty( $project['project_text'] ) ) ? $project['project_text'] : '';
                        $btn_text           = ( !empty( $project['btn_text'] ) ) ? $project['btn_text'] : '';
                        $btn_url            = ( !empty( $project['btn_url']['url'] ) ) ? $project['btn_url']['url'] : '';
                        ?>
                        <div class="row align-items-center mb-80">
                            <div class="col-xl-6 col-md-6">
                                <?php
                                    if ( $reverse_img == 'yes' ) {
                                        $this->barber_get_project_contents( $project_location, $project_title, $project_text, $btn_text, $btn_url );
                                    } else {
                                        $this->barber_get_project_img( $project_img );
                                    }
                                ?>
                            </div>
                            <div class="col-xl-5 offset-xl-1 col-md-6">
                                <?php
                                    if ( $reverse_img == 'yes' ) {
                                        $this->barber_get_project_img( $project_img );
                                    } else {
                                        $this->barber_get_project_contents( $project_location, $project_title, $project_text, $btn_text, $btn_url );
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
        <!-- lastest_project_end -->
        <?php
    } else {
        // call load widget script
        $this->load_widget_script(); 

        $slider_imgs        = !empty( $settings['slider_imgs'] ) ? $settings['slider_imgs'] : '';
        $left_text_contents = !empty( $settings['left_text_contents'] ) ? $settings['left_text_contents'] : '';
        $project_right_img  = !empty( $settings['project_right_img']['id'] ) ? wp_get_attachment_image( $settings['project_right_img']['id'], 'barber_project_thumb_585x450', '', array( 'alt' => 'project details image' ) ) : '';
        $client_name        = !empty( $settings['client_name'] ) ? $settings['client_name'] : '';
        $project_cat        = !empty( $settings['project_cat'] ) ? $settings['project_cat'] : '';
        $project_date       = !empty( $settings['project_date'] ) ? $settings['project_date'] : '';
        $project_rating     = !empty( $settings['project_rating'] ) ? $settings['project_rating'] : '';
        $project_website    = !empty( $settings['project_website']['url'] ) ? $settings['project_website']['url'] : '';
        $project_share      = !empty( $settings['project_share'] ) ? $settings['project_share'] : '';
        ?>
        <!-- details_slider_area_start -->
        <div class="details_slider_area">
            <div class="details_active owl-carousel">
                <?php 
                if( is_array( $slider_imgs ) && count( $slider_imgs ) > 0 ) {
                    foreach( $slider_imgs as $item ) {
                        $slider_img = ( !empty( $item['slider_img']['url'] ) ) ? $item['slider_img']['url'] : '';
                        ?>
                        <div class="single_details" <?php echo barber_inline_bg_img( esc_url( $slider_img ) ); ?>></div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>

        <!-- project_details_start -->
        <div class="project_details">
            <div class="container">
                <div class="row">
                    <?php
                        $this->barber_get_project_details_left_content( $left_text_contents );
                        $this->barber_get_project_details_right_content( $project_right_img, $client_name, $project_cat, $project_date, $project_rating, $project_website, $project_share );
                    ?>
                </div>
            </div>
        </div>
        <!-- details_slider_area_end -->
        <?php
    }

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            //project details slider
            $('.details_active').owlCarousel({
                loop:true,
                margin:0,
            items:1,
            // autoplay:true,
            navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
            nav:true,
            dots:false,
            // autoplayHoverPause: true,
            // autoplaySpeed: 800,
                responsive:{
                    0:{
                        items:1,
                        nav:false
            
                    },
                    767:{
                        items:1,
                        nav:false
                    },
                    992:{
                        items:1,
                        nav:false
                    },
                    1200:{
                        items:1,
                    }
                }
            });
        })(jQuery);
        </script>
        <?php 
        }
    }	   
}