$(document).ready(function() {
	logoBoxPosition();

});

$(window).resize(function() {
	

});


function logoBoxPosition() {
	$('#logo-cont img').each(function() {
		$(this).on({
			mouseenter: function(){$(this).siblings('.box-hover').fadeIn('slow');},
			mouseleave: function(){$(this).siblings('.box-hover').fadeOut('slow');}
		});
	});
	$('#logo-cont .box-hover').each(function() {
		var boxH = $(this).height();
		$(this).css({'marginTop': -boxH -40});
	});
}
