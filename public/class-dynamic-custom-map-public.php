<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://dcpi.org
 * @since      1.0.0
 *
 * @package    Dynamic_Custom_Map
 * @subpackage Dynamic_Custom_Map/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Dynamic_Custom_Map
 * @subpackage Dynamic_Custom_Map/public
 * @author     Diones Ramos <dionesmenqui@dcpi.org>
 */
class Dynamic_Custom_Map_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

        add_shortcode('custom_map', array($this, 'svgmap_shortcode'));
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Dynamic_Custom_Map_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Dynamic_Custom_Map_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/dynamic-custom-map-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'svgmap', 'https://cdn.jsdelivr.net/gh/StephanWagner/svgMap@v2.10.1/dist/svgMap.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Dynamic_Custom_Map_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Dynamic_Custom_Map_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
        wp_enqueue_script('svg-pan-zoom', 'https://cdn.jsdelivr.net/npm/svg-pan-zoom@3.6.1/dist/svg-pan-zoom.min.js', array('jquery'), $this->version, false);
        wp_enqueue_script('svgmap', 'https://cdn.jsdelivr.net/gh/StephanWagner/svgMap@v2.10.1/dist/svgMap.min.js', array('jquery', 'svg-pan-zoom'), $this->version, false);
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/dynamic-custom-map-public.js', array( 'jquery' ), $this->version, false );

	}

    public function svgmap_shortcode($atts) {
        ob_start();
        ?>
        <div id="svgMap"></div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                new svgMap({
                    targetElementID: 'svgMap',
                    data: {
                        data: {
                            gdp: {
                                name: 'GDP per capita',
                                format: '{0} USD',
                                thousandSeparator: ',',
                                thresholdMax: 50000,
                                thresholdMin: 1000
                            },
                            change: {
                                name: 'Change to year before',
                                format: '{0} %'
                            }
                        },
                        applyData: 'gdp',
                        values: {
                            AF: { gdp: 587, change: 4.73 },
                            AL: { gdp: 4583, change: 11.09 },
                            DZ: { gdp: 4293, change: 10.01 }
                            // ... Add more country data here
                        }
                    }
                });
            });
        </script>
        <?php
        return ob_get_clean();
    }
}