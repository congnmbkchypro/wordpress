jQuery(document).ready(function($) {
	jQuery('body').on('input change', '#my-input', function(){
		console.log('aaa');
		var data = {
		'action': 'my_action',
		'name':  jQuery(this).val()     // We pass php values differently!
		};
		// We can also pass the url value separately from ajaxurl for front end AJAX implementations
		jQuery.post(ajax_object.ajax_url, data, function(response) {
			console.log('Got this from the server: ' + response);
		});
	});
	
});
