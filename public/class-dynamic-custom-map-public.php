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
        <div class="demo-container">
            <h2>Countries using Euro as currency (custom tooltips)</h2>

            <div id="svgMapEuroCurrency"></div>
            <script>
            var svgMapEuroCurrency = new svgMap({
                targetElementID: 'svgMapEuroCurrency',
                data: {
                    data: {
                        euro: {}
                    },
                    applyData: 'euro',
                    values: {
                        AT: { euro: 1, eurozone: 1 }, // Austria
                        BE: { euro: 1, eurozone: 1 }, // Belgium
                        CY: { euro: 1, eurozone: 1 }, // Cyprus
                        EE: { euro: 1, eurozone: 1 }, // Estonia
                        FI: { euro: 1, eurozone: 1 }, // Finland
                        FR: { euro: 1, eurozone: 1 }, // France
                        DE: { euro: 1, eurozone: 1 }, // Germany
                        GR: { euro: 1, eurozone: 1 }, // Greece
                        IE: { euro: 1, eurozone: 1 }, // Ireland
                        IT: { euro: 1, eurozone: 1 }, // Italy
                        LV: { euro: 1, eurozone: 1 }, // Latvia
                        LT: { euro: 1, eurozone: 1 }, // Lithuania
                        LU: { euro: 1, eurozone: 1 }, // Luxembourg
                        MT: { euro: 1, eurozone: 1 }, // Malta
                        NL: { euro: 1, eurozone: 1 }, // Netherlands
                        PT: { euro: 1, eurozone: 1 }, // Portugal
                        ES: { euro: 1, eurozone: 1 }, // Spain
                        SI: { euro: 1, eurozone: 1 }, // Slovenia
                        SK: { euro: 1, eurozone: 1 }, // Slovakia

                        // Countries using euro but not in eurozone
                        XK: { euro: 1, eurozone: 0, color: '#528FCC' }, // Kosovo
                        ME: { euro: 1, eurozone: 0, color: '#528FCC' }, // Montenegro
                        AD: { euro: 1, eurozone: 0, color: '#528FCC' }, // Andorra
                        MC: { euro: 1, eurozone: 0, color: '#528FCC' }, // Monaco
                        SM: { euro: 1, eurozone: 0, color: '#528FCC' }, // San Marino
                        VA: { euro: 1, eurozone: 0, color: '#528FCC' }, // Vatican City

                        // Countries in eurozone but not using euro
                        BG: { euro: 0, eurozone: 1, color: '#a6d2ff' }, // Bulgaria
                        CZ: { euro: 0, eurozone: 1, color: '#a6d2ff' }, // Czech Republic
                        DK: { euro: 0, eurozone: 1, color: '#a6d2ff' }, // Denmark
                        HR: { euro: 0, eurozone: 1, color: '#a6d2ff' }, // Croatia
                        HU: { euro: 0, eurozone: 1, color: '#a6d2ff' }, // Hungary
                        PL: { euro: 0, eurozone: 1, color: '#a6d2ff' }, // Poland
                        RO: { euro: 0, eurozone: 1, color: '#a6d2ff' }, // Romania
                        SE: { euro: 0, eurozone: 1, color: '#a6d2ff' } // Sweden
                    }
                },
                colorMin: '#E2E2E2',
                colorMax: '#297ACC',
                colorNoData: '#E2E2E2',
                thresholdMax: 1,
                thresholdMin: 0,
                initialZoom: 3,
                initialPan: {
                    x: 420,
                    y: 50
                },
                mouseWheelZoomEnabled: true,
                mouseWheelZoomWithKey: true,
                onGetTooltip: function (tooltipDiv, countryID, countryValues) {
                // Geting the list of countries
                var countries = svgMapEuroCurrency.countries;

                // Create tooltip content element
                var tooltipContentElement = document.createElement('div');
                tooltipContentElement.style.padding = '16px 24px';

                // Fill content
                var innerHTML = '<div style="margin: 0 0 10px; text-align: center"></div>';

                innerHTML +=
                    '<div style="min-width: 180px; font-weight: bold; margin: 0 0 15px; text-align: center">' +
                    countries[countryID] +
                        '<table>'+
                            '<thead>'+
                                '<tr>'+
                                    '<th><br></th>'+
                                    '<th>2015</th>'+
                                    '<th>2016</th>'+
                                    '<th>2017</th>'+
                                    '<th>2018</th>'+
                                    '<th>2019</th>'+
                                    '<th>2020</th>'+
                                    '<th>2021</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                                '<tr>'+
                                    '<td>Leaders Trained&nbsp;</td>'+
                                    '<td>&nbsp;15</td>'+
                                    '<td>&nbsp;17</td>'+
                                    '<td>20&nbsp;</td>'+
                                    '<td>&nbsp;24</td>'+
                                    '<td>&nbsp;35</td>'+
                                    '<td>200&nbsp;</td>'+
                                    '<td>500&nbsp;</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td># of events&nbsp;</td>'+
                                    '<td>&nbsp;1</td>'+
                                    '<td>2&nbsp;</td>'+
                                    '<td>&nbsp;1</td>'+
                                    '<td>3&nbsp;</td>'+
                                    '<td>&nbsp;5</td>'+
                                    '<td>&nbsp;8</td>'+
                                    '<td>&nbsp;15</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>&nbsp;$ spent</td>'+
                                    '<td>&nbsp;$300</td>'+
                                    '<td>&nbsp;$400</td>'+
                                    '<td>$500&nbsp;</td>'+
                                    '<td>$800&nbsp;</td>'+
                                    '<td>$900&nbsp;</td>'+
                                    '<td>$1200&nbsp;</td>'+
                                    '<td>$1500&nbsp;</td>'+
                                '</tr>'+
                            '</tbody>'+
                        '</table>'+
                    '</div>';

                // if (countryValues && countryValues.eurozone == 1) {
                //     innerHTML +=
                //     '<div style="margin-bottom: 8px"><span style="color: #6d0; display: inline-block; margin-right: 4px; width: 20px; text-align: center">✔</span>Part of eurozone</div>';
                // } else {
                //     innerHTML +=
                //     '<div style="margin-bottom: 8px; color: #aaa"><span style="color: #f03; display: inline-block; margin-right: 4px; width: 20px; text-align: center">✘</span>Not a part of eurozone</div>';
                // }

                // if (countryValues && countryValues.euro == 1) {
                //     innerHTML +=
                //     '<div style="margin-bottom: 8px"><span style="color: #6d0; display: inline-block; margin-right: 4px; width: 20px; text-align: center">✔</span>Uses Euro</div>';
                // } else {
                //     innerHTML +=
                //     '<div style="margin-bottom: 8px; color: #aaa"><span style="color: #f03; display: inline-block; margin-right: 4px; width: 20px; text-align: center">✘</span>Does not use Euro</div>';
                // }

                // Return element with custom content
                tooltipContentElement.innerHTML = innerHTML;
                return tooltipContentElement;
                }
            });
            </script>
            <style>
                table {
                    border:1px solid #b3adad;
                    border-collapse:collapse;
                    padding:5px;
                }
                table th {
                    border:1px solid #b3adad;
                    padding:5px;
                    background: #f0f0f0;
                    color: #313030;
                }
                table td {
                    border:1px solid #b3adad;
                    text-align:center;
                    padding:5px;
                    background: #ffffff;
                    color: #313030;
                }
            </style>
        </div>
        <?php
        return ob_get_clean();
    }
}