jQuery(document).ready(function($) {
	var allSelected = true;	
	var checkboxes = $('fieldset.the-addons input[type=checkbox]');
	var theButton = $('.select-btn');
	theButton.find('.all').click(function(event) {
		checkboxes.prop('checked', true);
	});
	theButton.find('.none').click(function(event) {
		checkboxes.prop('checked', false);
	});	

});