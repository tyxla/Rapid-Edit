<?php
$post_types = get_post_types(array('show_ui' => 'true'), 'objects');
$taxonomies = get_taxonomies(array('show_ui' => 'true'), 'objects');
$current_type = $current_subtype = $current_subtype_obj = false;
$fields = array();
if (!empty($_GET['re_type'])) {
	$current_type = $_GET['re_type'];
	if (!empty($_GET['re_post_type'])) {
		$current_subtype = $_GET['re_post_type'];
		$fields = array(
			'post_title' => array(
				'title' => __('Title', 'rapid-edit'),
			),
			'post_date' => array(
				'title' => __('Date', 'rapid-edit'),
			),
			'post_author' => array(
				'title' => __('Author', 'rapid-edit'),
			),
			'post_status' => array(
				'title' => __('Status', 'rapid-edit'),
			),
		);
	} elseif (!empty($_GET['re_taxonomy'])) {
		$current_subtype = $_GET['re_taxonomy'];
		$fields = array(
			'term_name' => array(
				'title' => __('Name', 'rapid-edit'),
			),
			'term_description' => array(
				'title' => __('Description', 'rapid-edit'),
			),
			'term_slug' => array(
				'title' => __('Slug', 'rapid-edit'),
			),
		);
	}
}
?>
<div class="rapid-edit-settings">
	<div class="wrap">
		<h2><?php echo $rapid_edit->get_settings_manager()->get_menu_title(); ?></h2>

		<p><?php _e('Please, select any post type or taxonomy to manage settings for.', 'rapid-edit'); ?></p>

		<div class="navigation">
			<h3><?php _e('Post Types', 'rapid-edit'); ?></h3>
			<ul>
				<?php 
				$base_link = add_query_arg('re_type', 'post_type', remove_query_arg('re_taxonomy'));
				foreach ($post_types as $pt): 
					if ($current_type === 'post_type' && $current_subtype === $pt->name) {
						$current_subtype_obj = $pt;
						$active = 'class="active"';
					} else {
						$active = '';
					}
					?>
					<li <?php echo $active; ?>>
						<a href="<?php echo add_query_arg('re_post_type', $pt->name, $base_link); ?>"><?php echo $pt->labels->name; ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
			<br class="clear" />

			<h3><?php _e('Taxonomies', 'rapid-edit'); ?></h3>
			<ul>
				<?php 
				$base_link = add_query_arg('re_type', 'taxonomy', remove_query_arg('re_post_type'));
				foreach ($taxonomies as $tax): 
					if ($current_type === 'taxonomy' && $current_subtype === $tax->name) {
						$active = 'class="active"';
						$current_subtype_obj = $tax;
					} else {
						$active = '';
					}
					?>
					<li <?php echo $active; ?>>
						<a href="<?php echo add_query_arg('re_taxonomy', $tax->name, $base_link); ?>"><?php echo $tax->labels->name; ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
			<br class="clear" />
		</div>

		<?php if (!empty($current_type) && !empty($current_subtype)): ?>
			<div class="rapid-edit-item-fields">
				<h2><?php printf(__('Settings for: %s', 'rapid-edit'), $current_subtype_obj->labels->name); ?></h2>
				<br class="clear" />

				<form method="POST" action="">
					<label>
						<?php printf(__('Enable Rapid Edit for %s?', 'rapid-edit'), $current_subtype_obj->labels->name); ?>
						<select name="re_enable_<?php echo $current_type . '_' . $current_subtype; ?>">
							<option value="0"><?php _e('No', 'rapid-edit'); ?></option>
							<option value="1"><?php _e('Yes', 'rapid-edit'); ?></option>
						</select>
					</label>
					<br class="clear" />

					<div class="fields-container">
						<div class="selected-fields field-list">
							
						</div>

						<div class="field-options field-list">
							<?php foreach ($fields as $field_name => $field_data): ?>
								<div class="rapid-edit-field">
									<span><?php echo $field_data['title']; ?></span>
									<input type="hidden" name="re_selected_fields[]" disabled="disabled" value="<?php echo $field_name; ?>" class="field-trigger" />
								</div>
							<?php endforeach; ?>
						</div>

					</div>
					<br class="clear" />

					<input type="hidden" name="re_settings_type" value="<?php echo $current_type; ?>" />
					<input type="hidden" name="re_settings_subtype" value="<?php echo $current_subtype; ?>" />

					<?php submit_button(); ?>
				</form>
			</div>
		<?php endif ?>
	</div>
</div>