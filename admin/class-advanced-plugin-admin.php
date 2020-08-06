<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       raihanislamcse.com
 * @since      1.0.0
 *
 * @package    Advanced_Plugin
 * @subpackage Advanced_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Advanced_Plugin
 * @subpackage Advanced_Plugin/admin
 * @author     Raihan Islam <raihanislam.cse@gmail.com>
 */
class Advanced_Plugin_Admin {

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
		 * defined in Advanced_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Advanced_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
	   $valid_page = array('book-management','create-book','list-book');
	   $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';
	   if(in_array($page,$valid_page)){
	
		wp_enqueue_style( 'bootstrap.min', ADVANCED_PLUGIN_BOOK_URL. 'assets/css/bootstrap.min.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'jquery.dataTables.min', ADVANCED_PLUGIN_BOOK_URL. 'assets/css/jquery.dataTables.min.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'sweetalert', ADVANCED_PLUGIN_BOOK_URL. 'assets/css/sweetalert.css', array(), $this->version, 'all' );
	   }

	   //wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/advanced-plugin-admin.css', array(), $this->version, 'all' );
		


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
		 * defined in Advanced_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Advanced_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$valid_page = array('book-management','create-book','list-book');
	   $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';
	   if(in_array($page,$valid_page)){
		wp_enqueue_script("jquery");
		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/advanced-plugin-admin.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( "bootstrap.js", ADVANCED_PLUGIN_BOOK_URL . 'assets/js/bootstrap.min.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( "jquery.dataTables.min.js", ADVANCED_PLUGIN_BOOK_URL . 'assets/js/jquery.dataTables.min.js', array( 'jquery' ), $this->version, false );
		
		wp_enqueue_script( "jquery.validate.min.js", ADVANCED_PLUGIN_BOOK_URL . 'assets/js/jquery.validate.min.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( "sweetalert.js", ADVANCED_PLUGIN_BOOK_URL . 'assets/js/sweetalert.js', array( 'jquery' ), $this->version, false );
	   }

	}

	public function advanced_menu_section(){
		add_menu_page(
			"Book Management",
			"Book Management",
			"manage_options",
			"book-management",
			array($this,"book_managemnet_deshbord")

		);

		add_submenu_page(
			"book-management",
			"Deshbord",
			"Deshbord",
			"manage_options",
			"book-management",
			array($this,"book_managemnet_deshbord")
		);

		add_submenu_page(
			"book-management",
			"Create Book",
			"Create Book",
			"manage_options",
			"create-book",
			array($this,"callback_create_book")
		);

		add_submenu_page(
			"book-management",
			"List Book",
			"List Book",
			"manage_options",
			"list-book",
			array($this,"callback_list_book")
		);

	}

	public function book_managemnet_deshbord(){
		echo "<h2>Book Deshbord</h2>";
		global $wpdb;
		// $user_email = $wpdb->get_var("Select user_email from wp_users WHERE ID = 1");
		// echo $user_email;
		
		// $user_data = $wpdb->get_row("Select * from wp_users WHERE ID = 1",ARRAY_A );
		// echo "<pre>";
		// print_r($user_data);

		// $post_title = $wpdb->get_col("Select post_title from wp_posts");
		// echo "<pre>";
		// print_r($post_title);

		// $all_posts = $wpdb->get_results("Select * from wp_posts",ARRAY_A );
		// echo "<pre>";
		// print_r($all_posts);

		$post_title = $wpdb->get_row(
			$wpdb->prepare("Select * from wp_posts Where id = %d",1)
		);
		echo "<pre>";
		print_r($post_title);

	}

	public function callback_create_book(){
		echo "<h2>Create Book</h2>";
	}

	public function callback_list_book(){
		echo "<h2>List Book</h2>";
	}

}
