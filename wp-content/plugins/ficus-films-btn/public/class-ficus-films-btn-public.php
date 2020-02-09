<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://ficus.plugin/
 * @since      1.0.0
 *
 * @package    Ficus_Films_Btn
 * @subpackage Ficus_Films_Btn/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ficus_Films_Btn
 * @subpackage Ficus_Films_Btn/public
 * @author     Oleg Kovalyov <koa2003@ukr.net>
 */
class Ficus_Films_Btn_Public {

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
		 * defined in Ficus_Films_Btn_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ficus_Films_Btn_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ficus-films-btn-public.css', array(), $this->version, 'all' );

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
		 * defined in Ficus_Films_Btn_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ficus_Films_Btn_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ficus-films-btn-public.js', array( 'jquery' ), $this->version, false );

	}

    /**
     * Processes shortcode type of [films id=37].
     *
     * @param array $atts
     * @param null $content
     * @param string $tag
     * @return string
     */
    function ficus_films_dynamic_shortcode($atts = [], $content = null, $tag = '') {

        $atts = array_change_key_case((array)$atts, CASE_LOWER);
        $atts = shortcode_atts([ 'id' => null ], $atts, $tag);
        $atts['id'] = intval($atts['id']);
        // start output
        $o = '';

        if ( ! empty( $atts['id'] ) ) {
            $o .= '';
            $film_post = get_post( $atts['id'] );
            // start film box
            $o .= '<div class="film-box"><a href="'. get_permalink( $atts['id']) . '">';
                $o .= '<img src="' . wp_get_attachment_image_url( get_post_thumbnail_id( $atts['id'] ), 'medium' ) . '"></a>';
                $o .= '<a href="'. get_permalink( $atts['id']) . '">';
                $o .= '<h2>' . esc_html__($film_post->post_title, 'ficus-films-btn') . '</h2></a>';
                // get 'annum'(year) taxonomy
                $terms_years =  get_the_terms( $atts['id'], 'annum' );
                foreach($terms_years as $terms_year) {
                    $o .= '<span>Год: ' . esc_html($terms_year->name) . '</span>';
                }
                // get 'genre' taxonomy
                $terms_genres = get_the_terms( $atts['id'], 'genre' );
                $o .= '<br><small>| ';
                foreach($terms_genres as $terms_genre) {
                    $o .= '<span><strong>' . esc_html__($terms_genre->name, 'ficus-film-btn')  . '</strong> | </span>';
                }
                $o .= '</small><p class="film-excerpt">';

                if( has_excerpt( $atts['id'] ) || esc_html__($film_post->post_excerpt, 'ficus-films-btn') !== '' ){
                    $o .=  esc_html__($film_post->post_excerpt, 'ficus-films-btn');
                    $o .= '<a class="film-more-link" href="'. get_permalink( $atts['id']) . '"><small> ... Read More</small></a></p>';
                } else {
                    // create 21 words length excerpt from '$film_post->post_content'
                    $film_content = esc_html__($film_post->post_content, 'ficus-films-btn');
                    $film_excerpt = implode( ' ', array_slice( explode(' ', $film_content), 0, 21 ) );
                    $o .= $film_excerpt . '<a class="film-more-link" href="'. get_permalink( $atts['id']) . '">';
                    $o .= '<small> ... Read More</small></a></p>';
                }
            // end film box
            $o .= '</div>';
        }

        return $o;
    }

    /**
     * Register shortcode kind of [films id=37].
     */
    public function ficus_register_shortcode() {
        add_shortcode( 'films', array( $this, 'ficus_films_dynamic_shortcode' ) );
    }

}
