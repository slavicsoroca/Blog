"use strict"
$(document).ready(function() {
	$('form').submit(function(event) {
		var json;
		event.preventDefault();
		let data = new FormData(this);
		
		if ($(this).attr('action') === '/comment/add') {
			let post_id = (window.location.pathname).split('/')[2];
			data.append('post_id', post_id);
		}
		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: data,
			contentType: false,
			cache: false,
			processData: false,
			success: function(result) {
			/*	console.log(result),*/
				json = jQuery.parseJSON(result);
				if (json.url) {
					window.location.href = '/' + json.url;
				} else {
					alert(json.status + ' - ' + json.message);
				}
				
				$('.form-control').val('');
			},
		});
	});
});