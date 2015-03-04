<?php
/**
 * Plugin Name: Rapid Edit
 * Description: Boosts the quick edit for your post types and taxonomies. Allows you to select what you want to include in your quick edit boxes, and to reorder it to suit your needs. Gives you total control over your quick edit, providing you with a brand new, fast and comfortable way to manage your content. This saves time and provides you with a consistent experience - you can now manage all content without a single page reload!
 * Version: 1.0
 * Author: tyxla
 * Author URI: https://github.com/tyxla
 * License: GPL2
 * Requires at least: 3.8
 * Tested up to: 4.1.1
 */

/**
 * Main plugin class.
 */
class Rapid_Edit {

	/**
	 * Path to the plugin.
	 *
	 * @access protected
	 *
	 * @var string
	 */
	protected $plugin_path;

	/**
	 * Plugin assets base URL.
	 *
	 * @access protected
	 *
	 * @var string
	 */
	protected $assets_url;

	/**
	 * Constructor.
	 *	
	 * Initializes and hooks the plugin functionality.
	 *
	 * @access public
	 */
	public function __construct() {

		// set the path to the plugin main directory
		$this->set_plugin_path(dirname(__FILE__));

		// set assets URL
		$this->set_assets_url(plugins_url('/', __FILE__));

	}

	/**
	 * Retrieve the path to the main plugin directory.
	 *
	 * @access public
	 *
	 * @return string $plugin_path The path to the main plugin directory.
	 */
	public function get_plugin_path() {
		return $this->plugin_path;
	}

	/**
	 * Modify the path to the main plugin directory.
	 *
	 * @access protected
	 *
	 * @param string $plugin_path The new path to the main plugin directory.
	 */
	protected function set_plugin_path($plugin_path) {
		$this->plugin_path = $plugin_path;
	}

	/**
	 * Retrieve the plugin assets base URL.
	 *
	 * @access public
	 *
	 * @return string $assets_url The plugin assets base URL.
	 */
	public function get_assets_url() {
		return $this->assets_url;
	}

	/**
	 * Modify the plugin assets base URL.
	 *
	 * @access protected
	 *
	 * @param string $assets_url The new plugin assets base URL.
	 */
	protected function set_assets_url($assets_url) {
		$this->assets_url = $assets_url;
	}

}

// initialize Rapid Edit
global $rapid_edit;
$rapid_edit = new Rapid_Edit();