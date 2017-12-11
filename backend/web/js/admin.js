$(document).ready(function(){
	$('.btn-save').on('click', function(){
		var count = $('table tbody').children().length;
		console.log(count);
	});	
});
