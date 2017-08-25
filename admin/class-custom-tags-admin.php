<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://pranavprakash.net
 * @since      1.0.0
 *
 * @package    Custom_Tags
 * @subpackage Custom_Tags/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Custom_Tags
 * @subpackage Custom_Tags/admin
 * @author     Pranav Prakash <pranav@pranavprakash.net>
 */
class Custom_Tags_Admin {

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
		add_action( 'add_meta_boxes', array( __CLASS__, 'add_meta_boxes' ), 999 );

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
		 * defined in Custom_Tags_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Custom_Tags_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/custom-tags-admin.css', array(), $this->version, 'all' );

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
		 * defined in Custom_Tags_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Custom_Tags_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/custom-tags-admin.js', array( 'jquery' ), $this->version, false );

	}

	public static function add_meta_boxes( $post_type ) {
		$taxonomies = get_object_taxonomies( $post_type );
		if ( in_array( 'post_tag', $taxonomies ) ) {
			if ( $post_type == 'page' && ! is_page_have_tags() ) {
				return false;
			}
			// remove_meta_box( 'post_tag' . 'div', $post_type, 'side' );
			// remove_meta_box( 'tagsdiv-' . 'post_tag', $post_type, 'side' );
			add_meta_box( 'adv-tagsdiv', __( 'Custom Tags', 'custom-tags' ), array(
				__CLASS__,
				'metabox'
			), $post_type, 'side', 'core', array( 'taxonomy' => 'post_tag' ) );
			return true;
		}
		return false;
	}
	
    public static function metabox( $post ) {
	?>
	<p>
	    <input type="text" class="widefat" name="custom-tags-input" id="custom-tags-input"/>
	</p>
	<?php _e( '<p class="howto" id="custom-tags-desc">Separate tags with commas</p>' ); ?>
	<?php
    }

}
