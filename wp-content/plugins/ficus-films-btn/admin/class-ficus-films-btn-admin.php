<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://ficus.plugin/
 * @since      1.0.0
 *
 * @package    Ficus_Films_Btn
 * @subpackage Ficus_Films_Btn/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ficus_Films_Btn
 * @subpackage Ficus_Films_Btn/admin
 * @author     Oleg Kovalyov <koa2003@ukr.net>
 */
class Ficus_Films_Btn_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ficus-films-btn-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ficus-films-btn-admin.js', array( 'jquery' ), $this->version, false );

	}

    /**
     * Creates a new custom post type 'films'.
     *
     * @since 1.0.0
     * @access public
     * @uses register_post_type()
     */
    public static function ficus_cpt_films() {
        $cap_type = 'page';
        $plural = 'Films';
        $single = 'Film';
        $cpt_name = 'films';
        $opts['can_export'] = TRUE;
        $opts['capability_type'] = $cap_type;
        $opts['description'] = 'Films Custom Post Type';
        $opts['exclude_from_search'] = FALSE;
        $opts['has_archive'] = TRUE;
        $opts['hierarchical'] = FALSE;
        $opts['map_meta_cap'] = TRUE;
        $opts['menu_icon'] = 'dashicons-format-video';
        $opts['menu_position'] = 20;
        $opts['public'] = TRUE;
        $opts['publicly_querable'] = TRUE;
        $opts['query_var'] = TRUE;
        $opts['register_meta_box_cb'] = '';
        $opts['rewrite'] = TRUE;
        $opts['show_in_admin_bar'] = TRUE;
        $opts['show_in_menu'] = TRUE;
        $opts['show_in_nav_menu'] = TRUE;
        $opts['supports'] = ['title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'post-formats'];

        $opts['labels']['add_new'] = esc_html__( "Add New {$single}", 'ficus-films-btn' );
        $opts['labels']['add_new_item'] = esc_html__( "Add New {$single}", 'ficus-films-btn' );
        $opts['labels']['all_items'] = esc_html__( $plural, 'ficus-films-btn' );
        $opts['labels']['edit_item'] = esc_html__( "Edit {$single}" , 'ficus-films-btn' );
        $opts['labels']['menu_name'] = esc_html__( $plural, 'ficus-films-btn' );
        $opts['labels']['name'] = esc_html__( $plural, 'ficus-films-btn' );
        $opts['labels']['name_admin_bar'] = esc_html__( $single, 'ficus-films-btn' );
        $opts['labels']['new_item'] = esc_html__( "New {$single}", 'ficus-films-btn' );
        $opts['labels']['not_found'] = esc_html__( "No {$plural} Found", 'ficus-films-btn' );
        $opts['labels']['not_found_in_trash'] = esc_html__( "No {$plural} Found in Trash", 'ficus-films-btn' );
        $opts['labels']['parent_item_colon'] = esc_html__( "Parent {$plural} :", 'ficus-films-btn' );
        $opts['labels']['search_items'] = esc_html__( "Search {$plural}", 'ficus-films-btn' );
        $opts['labels']['singular_name'] = esc_html__( $single, 'ficus-films-btnk' );
        $opts['labels']['view_item'] = esc_html__( "View {$single}", 'ficus-films-btn' );

        register_post_type( strtolower( $cpt_name ), $opts );
    }

    /**
     * Creates a new taxonomies 'annum' and 'genre'  for a custom post type 'films'.
     *
     * @since 	1.0.0
     * @access 	public
     * @uses 	register_taxonomy()
     */
    public static function ficus_films_taxonomies() {

        $plural 	= 'Years';
        $single 	= 'Year';
        $tax_name 	= 'annum';

        $opts['hierarchical']							= FALSE;
        //$opts['meta_box_cb'] 							= '';
        $opts['public']									= TRUE;
        $opts['query_var']								= $tax_name;
        $opts['show_admin_column'] 						= FALSE;
        $opts['show_in_nav_menus']						= TRUE;
        $opts['show_tag_cloud'] 						= TRUE;
        $opts['show_ui']								= TRUE;
        $opts['sort'] 									= '';
        //$opts['update_count_callback'] 					= '';

        $opts['capabilities']['assign_terms'] 			= 'edit_posts';
        $opts['capabilities']['delete_terms'] 			= 'manage_categories';
        $opts['capabilities']['edit_terms'] 			= 'manage_categories';
        $opts['capabilities']['manage_terms'] 			= 'manage_categories';

        $opts['labels']['add_new_item'] 				= esc_html__( "Add New {$single}", 'ficus-films-btn' );
        $opts['labels']['add_or_remove_items'] 			= esc_html__( "Add or remove {$plural}", 'ficus-films-btn' );
        $opts['labels']['all_items'] 					= esc_html__( $plural, 'ficus-films-btn' );
        $opts['labels']['choose_from_most_used'] 		= esc_html__( "Choose from most used {$plural}", 'ficus-films-btn' );
        $opts['labels']['edit_item'] 					= esc_html__( "Edit {$single}" , 'ficus-films-btn');
        $opts['labels']['menu_name'] 					= esc_html__( $plural, 'ficus-films-btn' );
        $opts['labels']['name'] 						= esc_html__( $plural, 'ficus-films-btn' );
        $opts['labels']['new_item_name'] 				= esc_html__( "New {$single} Name", 'ficus-films-btn' );
        $opts['labels']['not_found'] 					= esc_html__( "No {$plural} Found", 'ficus-films-btn' );
        $opts['labels']['parent_item'] 					= esc_html__( "Parent {$single}", 'ficus-films-btn' );
        $opts['labels']['parent_item_colon'] 			= esc_html__( "Parent {$single}:", 'ficus-films-btn' );
        $opts['labels']['popular_items'] 				= esc_html__( "Popular {$plural}", 'ficus-films-btn' );
        $opts['labels']['search_items'] 				= esc_html__( "Search {$plural}", 'ficus-films-btn' );
        $opts['labels']['separate_items_with_commas'] 	= esc_html__( "Separate {$plural} with commas", 'ficus-films-btn' );
        $opts['labels']['singular_name'] 				= esc_html__( $single, 'ficus-films-btn' );
        $opts['labels']['update_item'] 					= esc_html__( "Update {$single}", 'ficus-films-btn' );
        $opts['labels']['view_item'] 					= esc_html__( "View {$single}", 'ficus-films-btn' );

        register_taxonomy( $tax_name, 'films', $opts );

        $plural 	= 'Genres';
        $single 	= 'Genre';
        $tax_name 	= 'genre';

        $opts['hierarchical']							= TRUE;
        //$opts['meta_box_cb'] 							= '';
        $opts['public']									= TRUE;
        $opts['query_var']								= $tax_name;
        $opts['show_admin_column'] 						= FALSE;
        $opts['show_in_nav_menus']						= TRUE;
        $opts['show_tag_cloud'] 						= TRUE;
        $opts['show_ui']								= TRUE;
        $opts['sort'] 									= '';
        //$opts['update_count_callback'] 					= '';

        $opts['capabilities']['assign_terms'] 			= 'edit_posts';
        $opts['capabilities']['delete_terms'] 			= 'manage_categories';
        $opts['capabilities']['edit_terms'] 			= 'manage_categories';
        $opts['capabilities']['manage_terms'] 			= 'manage_categories';

        $opts['labels']['add_new_item'] 				= esc_html__( "Add New {$single}", 'ficus-films-btn' );
        $opts['labels']['add_or_remove_items'] 			= esc_html__( "Add or remove {$plural}", 'ficus-films-btn' );
        $opts['labels']['all_items'] 					= esc_html__( $plural, 'ficus-films-btn' );
        $opts['labels']['choose_from_most_used'] 		= esc_html__( "Choose from most used {$plural}", 'ficus-films-btn' );
        $opts['labels']['edit_item'] 					= esc_html__( "Edit {$single}" , 'ficus-films-btn');
        $opts['labels']['menu_name'] 					= esc_html__( $plural, 'ficus-films-btn' );
        $opts['labels']['name'] 						= esc_html__( $plural, 'ficus-films-btn' );
        $opts['labels']['new_item_name'] 				= esc_html__( "New {$single} Name", 'ficus-films-btn' );
        $opts['labels']['not_found'] 					= esc_html__( "No {$plural} Found", 'ficus-films-btn' );
        $opts['labels']['parent_item'] 					= esc_html__( "Parent {$single}", 'ficus-films-btn' );
        $opts['labels']['parent_item_colon'] 			= esc_html__( "Parent {$single}:", 'ficus-films-btn' );
        $opts['labels']['popular_items'] 				= esc_html__( "Popular {$plural}", 'ficus-films-btn' );
        $opts['labels']['search_items'] 				= esc_html__( "Search {$plural}", 'ficus-films-btn' );
        $opts['labels']['separate_items_with_commas'] 	= esc_html__( "Separate {$plural} with commas", 'ficus-films-btn' );
        $opts['labels']['singular_name'] 				= esc_html__( $single, 'ficus-films-btn' );
        $opts['labels']['update_item'] 					= esc_html__( "Update {$single}", 'ficus-films-btn' );
        $opts['labels']['view_item'] 					= esc_html__( "View {$single}", 'ficus-films-btn' );

        register_taxonomy( $tax_name, 'films', $opts );

    }

}
