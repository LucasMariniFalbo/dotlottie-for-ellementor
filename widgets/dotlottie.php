<?php



class DotLottie_Widget extends \Elementor\Widget_Base {



	public function get_name() {

		return 'dotLottie';

	}



	public function get_title() {

		return __( 'dotLottie', 'elementor-dotlottie' );

	}



	public function get_icon() {

		return 'eicon-lottie';

	}



	public function get_categories() {

		return [ 'basic' ];

	}



	protected function _register_controls() {





	// Content Section START

	$this->start_controls_section(

		'content_section',

		[

			'label' => __( 'Content', 'elementor-dotlottie' ),

			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,

		]

	);



		// Controls

		$this->add_control(

			'lottie_source',

			[

				'label' => esc_html__( 'Source', 'elementor-dotlottie' ),

				'type' => \Elementor\Controls_Manager::SELECT,

				'default' => 'file',

				'options' => [

					'file' => esc_html__( 'Media File', 'elementor-dotlottie' ),

					'url'  => esc_html__( 'External URL', 'elementor-dotlottie' ),

				],

			]

		);



		$this->add_control(

			'lottie_file',

			[

				'label' => esc_html__( 'Upload your .lottie file', 'elementor-dotlottie' ),

				'type' => \Elementor\Controls_Manager::MEDIA,

				'media_types'	=> ['application/lottie'],

				'default' => [

					'url' => plugins_url('../inc/elementor.lottie', __FILE__),

				],

				'condition' => [

					'lottie_source' => 'file',

				],

				

			]

		);



		$this->add_control(

			'lottie_url',

			[

				'label' => esc_html__( 'Paste the Lottie URL', 'elementor-dotlottie' ),

				'type' => \Elementor\Controls_Manager::URL,

				'options' => [''],

				'condition' => [

					'lottie_source' => 'url',

				],

			]

		);



		$this->add_control(

			'lottie_link',

			[

				'label' => esc_html__( 'Link to', 'elementor-dotlottie' ),

				'type' => \Elementor\Controls_Manager::URL,

				'options' => [ 'url', 'is_external', 'nofollow' ],

				'default' => [

					'url' => '',

					'is_external' => true,

					'nofollow' => true,

				],

				'label_block' => true,

			]

		);



	// Content Section END

	$this->end_controls_section();



	// Settings Section START

	$this->start_controls_section(

		'settings_section',

		[

			'label' => __( 'Settings', 'elementor-dotlottie' ),

			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,

		]

	);



		// Settings Controls

		$this->add_control(

			'lottie_trigger',

			[

				'label' => esc_html__( 'Trigger', 'elementor-dotlottie' ),

				'type' => \Elementor\Controls_Manager::SELECT,

				'default' => 'viewport',

				'options' => [

					'viewport' => esc_html__( 'Viewport', 'elementor-dotlottie' ),

					'hover'  => esc_html__( 'Hover', 'elementor-dotlottie' ),

				],

			]

		);



		$this->add_control(

			'lottie_mode',

			[

				'label' => esc_html__( 'Mode', 'elementor-dotlottie' ),

				'type' => \Elementor\Controls_Manager::SELECT,

				'default' => 'normal',

				'options' => [

					'normal' => esc_html__( 'Normal', 'elementor-dotlottie' ),

					'bounce'  => esc_html__( 'Bounce', 'elementor-dotlottie' ),

				],

			]

		);



		$this->add_control(

			'lottie_loop',

			[

				'label' => esc_html__( 'Loop', 'elementor-dotlottie' ),

				'type' => \Elementor\Controls_Manager::SWITCHER,

				'true' => esc_html__( 'True', 'elementor-dotlottie' ),

				'false' => esc_html__( 'False', 'elementor-dotlottie' ),

				'return_value' => 'true',

				'default' => 'true',

			]

		);



		$this->add_control(

			'lottie_speed',

			[

				'label' => esc_html__( 'Play Speed', 'elementor-dotlottie' ),

				'type' => \Elementor\Controls_Manager::NUMBER,

				'min' => 1,

				'max' => 10,

				'step' => 1,

				'default' => 1,

			]

		);





		$this->add_control(

			'lottie_controls',

			[

				'label' => esc_html__( 'Show controls', 'elementor-dotlottie' ),

				'type' => \Elementor\Controls_Manager::SWITCHER,

				'true' => esc_html__( 'True', 'elementor-dotlottie' ),

				'false' => esc_html__( 'False', 'elementor-dotlottie' ),

				'label_on' => esc_html__( 'Show', 'elementor-dotlottie' ),

				'label_off' => esc_html__( 'Hide', 'elementor-dotlottie' ),

				'return_value' => 'true',

				'default' => 'false',

			]

		);



	// Settings controls END

	$this->end_controls_section();



	// Style tab START

	$this->start_controls_section(

		'style_section',

		[

			'label' => __( 'Style', 'elementor-dotlottie' ),

			'tab' => \Elementor\Controls_Manager::TAB_STYLE,

		]

	);



		// Style tab Controls

		$this->add_responsive_control(

			'container_align',

			[

				'label' => esc_html__( 'Alignment', 'elementor-dotlottie' ),

				'type' => \Elementor\Controls_Manager::CHOOSE,

				'options' => [

					'left' => [

						'title' => esc_html__( 'Left', 'elementor-dotlottie' ),

						'icon' => 'eicon-text-align-left',

					],

					'center' => [

						'title' => esc_html__( 'Center', 'elementor-dotlottie' ),

						'icon' => 'eicon-text-align-center',

					],

					'right' => [

						'title' => esc_html__( 'Right', 'elementor-dotlottie' ),

						'icon' => 'eicon-text-align-right',

					],

				],

				'default' => 'center',

				'toggle' => true,

				'selectors' => [

					'{{WRAPPER}}' => 'display:flex; justify-content: {{VALUE}};width:100%;',

				],

			]

		);

	

		$this->add_responsive_control(

			'lottie_width',

			[

				'label' => esc_html__( 'Width', 'elementor-dotlottie' ),

				'type' => \Elementor\Controls_Manager::SLIDER,

				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],

				'range' => [

					'px' => [

						'min' => 0,

						'max' => 1000,

						'step' => 1,

					],

					'%' => [

						'min' => 0,

						'max' => 100,

					],

				],

				'default' => [

					'unit' => 'px',

					'size' => 300,

				],
				'selectors' => [
					'{{WRAPPER}} dotlottie-player' => 'width: {{SIZE}}{{UNIT}};',
				],

			]

		);

	

		$this->add_responsive_control(

			'lottie_max_width',

			[

				'label' => esc_html__( 'Max Width', 'elementor-dotlottie' ),

				'type' => \Elementor\Controls_Manager::SLIDER,

				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],

				'range' => [

					'px' => [

						'min' => 0,

						'max' => 1000,

						'step' => 1,

					],

					'%' => [

						'min' => 0,

						'max' => 100,

					],

				],

				'default' => [

					'unit' => '%',

					'size' => 100,

				],
				'selectors' => [
					'{{WRAPPER}} dotlottie-player' => 'max-width: {{SIZE}}{{UNIT}};',
				],

			]

		);



		// Start sub-tabs 

		$this->start_controls_tabs(

			'style_tabs'

		);



			// Normal sub-tab START

			$this->start_controls_tab(

				'style_normal_tab',

				[

					'label' => esc_html__( 'Normal', 'elementor-dotlottie' ),

				]

			);



				// Normal subtab Controls

				$this->add_control(

					'lottie_opacity',

					[

						'label' => esc_html__( 'Opacity', 'elementor-dotlottie' ),

						'type' => \Elementor\Controls_Manager::SLIDER,

						'size_units' => ['%'],

						'range' => [

							'%' => [

								'min' => 0,

								'max' => 100,

								'step' => 1,

							],

						],

						'default' => [

							'unit' => '%',

							'size' => 100,

						],

						'selectors' => [

							'{{WRAPPER}} dotlottie-player' => 'opacity: {{SIZE}}{{UNIT}};',

						],

					]

				);



				$this->add_group_control(

					\Elementor\Group_Control_Css_Filter::get_type(),

					[

						'name' => 'lottie_filters',

						'selector' => '{{WRAPPER}} dotlottie-player',

					]

				);



			// Normal sub-tab END

			$this->end_controls_tab();



			// Hover sub-tab START

			$this->start_controls_tab(

				'style_hover_tab',

				[

					'label' => esc_html__( 'Hover', 'elementor-dotlottie' ),

				]

			);



				// Hover sub-tab Controls

				$this->add_control(

					'lottie_opacity_hover',

					[

						'label' => esc_html__( 'Opacity', 'elementor-dotlottie' ),

						'type' => \Elementor\Controls_Manager::SLIDER,

						'size_units' => ['%'],

						'range' => [

							'%' => [

								'min' => 0,

								'max' => 100,

								'step' => 1,

							],

						],

						'default' => [

							'unit' => '%',

							'size' => 100,

						],

						'selectors' => [

							'{{WRAPPER}} dotlottie-player:hover' => 'opacity: {{SIZE}}{{UNIT}};',

						],

					]

				);



				$this->add_group_control(

					\Elementor\Group_Control_Css_Filter::get_type(),

					[

						'name' => 'lottie_filters_hover',

						'selector' => '{{WRAPPER}} dotlottie-player:hover',

					]

				);



				$this->add_control(

					'lottie_opacity_transition',

					[

						'label' => esc_html__( 'Transition Duration', 'elementor-dotlottie' ),

						'type' => \Elementor\Controls_Manager::SLIDER,

						'size_units' => ['s'],

						'range' => [

							's' => [

								'min' => 0,

								'max' => 3,

								'step' => 0.1,

							],

						],

						'default' => [

							'unit' => 's',

							'size' => 0.3,

						],

						'selectors' => [

							'{{WRAPPER}} dotlottie-player' => 'transition: {{SIZE}}{{UNIT}} ease;',

						],

					]

				);



			// Hover sub-tab END

			$this->end_controls_tab();

			

		// Style Tabs END

		$this->end_controls_tabs();



	// End Style Section

	$this->end_controls_section();



	}



	// Renderização no front

	protected function render() {



		$settings = $this->get_settings_for_display();



		// Type of source

		$source    = $settings['lottie_source'];



		switch($source){

			case 'file' 	: $lottie = $settings['lottie_file']['url']; break;

			case 'url' 		: $lottie = $settings['lottie_url']['url']; break;

		}



		// Url

		$urlAtts = $settings['lottie_link'];

		$url 	 = $settings['lottie_link']['url'];

		



		if ( ! empty( $url ) ) {

			$this->add_link_attributes( 'lottie_link', $urlAtts );

		}

		

		// Type of trigger

		$settings['lottie_trigger'] == 'viewport' ? $trigger = 'autoplay' : $trigger = 'hover="true"';



		// Properties

		$mode	    = $settings['lottie_mode'];

		$loop 	    = $settings['lottie_loop'] == 'true' ? 'loop' : '';

		$controls	= $settings['lottie_controls'] == 'true' ? 'controls' : '';

		$speed	    = $settings['lottie_speed'];

		//$_width     = $settings['lottie_width'];

		//$_max_w     = $settings['lottie_max_width'];

		//$width 		= 'width:' . $_width['size'] . $_width['unit'];

		//$max_w 		= 'max-width:' . $_max_w['size'] . $_max_w['unit'];

	

		// Code



		if ( ! empty( $url ) ) { 

			$html = '<a ' . $this->get_render_attribute_string( 'lottie_link' ) . '>'; 

		}

		

		$html .= "<dotlottie-player $trigger $controls $loop mode='$mode' speed='$speed' src='$lottie' background='transparent' resizeMode='cover'>";



		if ( ! empty( $url ) ) { 

			$html .= '</a>';

		}



		echo $html;



	}

}