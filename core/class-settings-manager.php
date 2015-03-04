<?php
/**
 * Class for handling the Rapid Edit settings.
 */
class Rapid_Edit_Settings_Manager {

	/**
	 * Constructor.
	 *	
	 * Initializes the module settings manager.
	 *
	 * @access public
	 */
	public function __construct() {
		// hook the main plugin page
		add_action('admin_menu', array($this, 'add_submenu_page'));
	}

	/**
	 * Get the title of the submenu item page.
	 *
	 * @access public
	 *
	 * @return string $menu_title The title of the submenu item.
	 */
	public function get_menu_title() {
		// allow filtering the title of the submenu page
		$menu_title = apply_filters('rapid_edit_menu_item_title', __('Rapid Edit', 'rapid-edit'));

		return $menu_title;
	}

	/**
	 * Get the ID (slug) of the submenu item page.
	 *
	 * @access public
	 *
	 * @return string $menu_id The ID (slug) of the submenu item.
	 */
	public function get_menu_id() {
		return 'rapid-edit';
	}

	/**
	 * Register the main plugin submenu page.
	 *
	 * @access public
	 */
	public function add_submenu_page() {
		$menu_title = $this->get_menu_title();
		$menu_id = $this->get_menu_id();

		// register the submenu page - child of the Media parent menu item
		add_submenu_page( 'options-general.php', $menu_title, $menu_title, 'manage_options', $menu_id, array($this, 'render') );
	}

	/**
	 * Render the settings page.
	 *
	 * @access public
	 */
	public function render() {
		global $rapid_edit;

		// determine the main template
		$template = $rapid_edit->get_plugin_path() . '/templates/settings.php';
		$template = apply_filters('rapid_edit_main_template', $template);

		// render the main template
		include_once($template);
	}

}