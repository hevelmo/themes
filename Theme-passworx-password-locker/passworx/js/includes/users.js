$(document).ready(function () {

	$('#tabledata').dataTable({
		"order": [ 7, 'desc' ],
		"pageLength": 25
	});
	
	$('#tabledata_wrapper').addClass('pt-10 pb-20');
	$('#tabledata_paginate').addClass('pt-10');

});