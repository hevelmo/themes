$(document).ready(function () {

	$('#entries').dataTable({
		"order": [ 4, 'desc' ],
		"pageLength": 25
	});
	
	$('#entries_wrapper').addClass('pt-10 pb-20');
	$('#entries_paginate').addClass('pt-10');

});