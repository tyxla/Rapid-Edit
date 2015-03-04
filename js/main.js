jQuery(function($) {

	$('.rapid-edit-item-fields .field-list').sortable({
		helper: 'clone',
		connectWith: '.field-list',
		cursor: "move",
		stop: function(event, ui) {
			var $item = $(ui.item);
			var $input = $item.find('.field-trigger');
			if ($item.parent().hasClass('selected-fields')) {
				$input.removeAttr('disabled');
			} else {
				$input.attr('disabled', 'disabled');
			}
		}
	});

});