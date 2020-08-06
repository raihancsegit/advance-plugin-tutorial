<?php

/**
 * Fired during plugin deactivation
 *
 * @link       raihanislamcse.com
 * @since      1.0.0
 *
 * @package    Advanced_Plugin
 * @subpackage Advanced_Plugin/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Advanced_Plugin
 * @subpackage Advanced_Plugin/includes
 * @author     Raihan Islam <raihanislam.cse@gmail.com>
 */
class Advanced_Plugin_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	private $table_activator;
	public function __construct($activaor){
      $this->table_activator = $activaor;
	}
	public function deactivate() {

		global $wpdb;

		$wpdb->query("DROP TABLE IF EXISTS ".$this->table_activator->Book_Table_Prefix());
		$wpdb->query("DROP TABLE IF EXISTS ".$this->table_activator->Book_Table_Shelf_Prefix());

		//delete page when plugin deactive

		$get_data =$wpdb->get_row(
				$wpdb->prepare("SELECT ID from ".$wpdb->prefix."posts WHERE post_name = %s",'book_tool')
		);

		$page_id = $get_data->ID;
		if($page_id > 0){
			wp_delete_post($page_id,true);
		}

	}

}
