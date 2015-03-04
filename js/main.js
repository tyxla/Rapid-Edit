jQuery(function($) {

	$('.rapid-edit-item-fields .field-list').sortable({
		helper: 'clone',
		connectWith: '.field-list',
		cursor: "move",
	});

});