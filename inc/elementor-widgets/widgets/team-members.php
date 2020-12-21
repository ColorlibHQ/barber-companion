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
 * Barber elementor team member section widget.
 *
 * @since 1.0
 */
class Barber_Team_Members extends Widget_Base {

	public function get_name() {
		return 'barber-team-members';
	}

	public function get_title() {
		return __( 'Team Members', 'barber-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'barber-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Team Member content ------------------------------
		$this->start_controls_section(
			'team_member_content',
			[
				'label' => __( 'Team Member content', 'barber-companion' ),
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
                'default' => esc_html__( 'Our Cutter Masters', 'barber-companion' )
            ]
        );

        $this->add_control(
            'team_member_inner_settings_seperator',
            [
                'label' => esc_html__( 'Team Member Items', 'barber-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'team_members', [
                'label' => __( 'Create New', 'barber-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ member_name }}}',
                'fields' => [
                    [
                        'name' => 'member_img',
                        'label' => __( 'Member Image', 'barber-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'member_name',
                        'label' => __( 'Member Name', 'barber-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Lallu Mia', 'barber-companion' ),
                    ],
                    [
                        'name' => 'member_designation',
                        'label' => __( 'Member Designation', 'barber-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Design Expert', 'barber-companion' ),
                    ],
                    [
                        'name' => 'social_info_separator',
                        'label' => __( 'Social Links', 'barber-companion' ),
                        'type' => Controls_Manager::HEADING,
                        'separator' => 'after'
                    ],
                    [
                        'name' => 'fb_url',
                        'label' => __( 'Facebook Profile URL', 'barber-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ],
                    ],
                    [
                        'name' => 'tw_url',
                        'label' => __( 'Twitter Profile URL', 'barber-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ],
                    ],
                    [
                        'name' => 'ins_url',
                        'label' => __( 'Instagram Profile URL', 'barber-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ],
                    ],
                ],
                'default'   => [
                    [      
                        'member_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'     => __( 'Macau Wilium', 'barber-companion' ),
                        'member_designation'     => __( 'Massage Master', 'barber-companion' ),
                        'fb_url'     => '#',
                        'tw_url'     => '#',
                        'ins_url'     => '#',
                    ],
                    [      
                        'member_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'     => __( 'Dan Jacky', 'barber-companion' ),
                        'member_designation'     => __( 'Mens Cut', 'barber-companion' ),
                        'fb_url'     => '#',
                        'tw_url'     => '#',
                        'ins_url'     => '#',
                    ],
                    [      
                        'member_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'     => __( 'Luka Luka', 'barber-companion' ),
                        'member_designation'     => __( 'Mens Cut', 'barber-companion' ),
                        'fb_url'     => '#',
                        'tw_url'     => '#',
                        'ins_url'     => '#',
                    ],
                    [      
                        'member_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'     => __( 'Rona Dana', 'barber-companion' ),
                        'member_designation'     => __( 'Ladies Cut', 'barber-companion' ),
                        'fb_url'     => '#',
                        'tw_url'     => '#',
                        'ins_url'     => '#',
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
                    '{{WRAPPER}} .team_area .section_title .sub_heading' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'big_title_col', [
                'label' => __( 'Big Title Color', 'barber-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'member_styles_seperator',
            [
                'label' => esc_html__( 'Member Styles', 'barber-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'member_name_col', [
                'label' => __( 'Member Name Color', 'barber-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .single_team h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'member_desig_color', [
                'label' => __( 'Member Designation Color', 'barber-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .single_team p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings     = $this->get_settings();
    $sec_icon     = !empty( $settings['sec_icon'] ) ? $settings['sec_icon'] : '';
    $sec_title    = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $team_members = !empty( $settings['team_members'] ) ? $settings['team_members'] : '';
    ?>
    
    <!-- cutter_muster_start -->
    <div class="cutter_muster">
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
            <div class="row">
                <?php 
                if( is_array( $team_members ) && count( $team_members ) > 0 ) {
                    foreach( $team_members as $member ) {
                        $member_name        = ( !empty( $member['member_name'] ) ) ? esc_html($member['member_name']) : '';
                        $member_img         = !empty( $member['member_img']['id'] ) ? wp_get_attachment_image( $member['member_img']['id'], 'barber_team_thumb_264x320', '', array( 'alt' => $member_name.' image' ) ) : '';
                        $member_designation = ( !empty( $member['member_designation'] ) ) ? esc_html($member['member_designation']) : '';
                        $fb_url             = ( !empty( $member['fb_url']['url'] ) ) ? esc_url($member['fb_url']['url']) : '';
                        $tw_url             = ( !empty( $member['tw_url']['url'] ) ) ? esc_url($member['tw_url']['url']) : '';
                        $ins_url            = ( !empty( $member['ins_url']['url'] ) ) ? esc_url($member['ins_url']['url']) : '';
                        ?>
                        <div class="col-xl-3 col-md-6 col-lg-3">
                            <div class="single_master">
                                <div class="thumb">
                                    <?php 
                                        if ( $member_img ) { 
                                            echo $member_img;
                                        }
                                    ?>
                                    <div class="social_link">
                                        <?php 
                                            if ( $fb_url ) { 
                                                echo "<a href='{$fb_url}'><i class='fa fa-facebook'></i></a>";
                                            }
                                            if ( $tw_url ) { 
                                                echo "<a href='{$tw_url}'><i class='fa fa-twitter'></i></a>";
                                            }
                                            if ( $ins_url ) { 
                                                echo "<a href='{$ins_url}'><i class='fa fa-instagram'></i></a>";
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="master_name text-center">
                                    <?php 
                                        if ( $member_name ) { 
                                            echo "<h3>{$member_name}</h3>";
                                        }
                                        if ( $member_designation ) { 
                                            echo "<p>{$member_designation}</p>";
                                        }
                                    ?>
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
    <!-- cutter_muster_end -->
    <?php
    }
}