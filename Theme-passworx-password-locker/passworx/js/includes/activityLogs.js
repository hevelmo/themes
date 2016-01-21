$(document).ready(function () {

	$('#tabledata').dataTable({
		"order": [ 0, 'desc' ],
		"pageLength": 100
	});
	
	$('#tabledata_wrapper').addClass('pt-10 pb-20');
	$('#tabledata_paginate').addClass('pt-10');

});