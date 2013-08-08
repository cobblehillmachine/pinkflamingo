$(document).ready(function() {
	logoBoxPosition();
	//footerHeight();
	showCatDropdown();
	$('.cat-dd ul li a').removeAttr('title');
	setInputFieldFunctions();

});

$(window).resize(function() {
	//footerHeight();

});

function setInputFieldFunctions(){
	$('.input-text').each(function(){
     	if($(this).val() == "")
       	$(this).val($(this).attr('default'));
   	})

   $('.input-text').focus(function(){
     if($(this).val() == $(this).attr('default') || $(this).val() == '')
       $(this).val('');

   }).blur(function() {
     if($(this).val() == $(this).attr('default') || $(this).val() == '')
       $(this).val($(this).attr('default'));
   });

$('input, textarea').each(function(){
    var $this = $(this);
    $this.data('placeholder', $this.attr('placeholder'))
         .focus(function(){$this.removeAttr('placeholder');})
         .blur(function(){$this.attr('placeholder', $this.data('placeholder'));});
});
}

function showCatDropdown() {	
	$('.cat-dd .sort-title').toggle(function(){
		$('.cat-dd ul').animate({height: 'toggle'});
		$('#blog-header .sort-title').css({'background-position': '90px 10px'});
	},
	function(){
		$('.cat-dd ul').animate({height: 'toggle'});
		$('#blog-header .sort-title').css({'background-position': '90px -15px'});
	});
}

function logoBoxPosition() {
	$('#logo-cont img').each(function() {
		$(this).on({
			mouseenter: function(){$(this).siblings('.box-hover').fadeIn('fast');},
			mouseleave: function(){$(this).siblings('.box-hover').fadeOut('fast');}
		});
	});
	
	// $('.box-hover').each(function() {
	// 	$(this).on({
	// 		//mouseenter: function(){$(this).siblings('.box-hover').fadeIn('slow');},
	// 		mouseleave: function(){$(this).fadeOut('slow');}
	// 	});
	// });
	$('#logo-cont .box-hover').each(function() {
		var boxH = $(this).height();
		$(this).css({'marginTop': -boxH -40});
		
	});
	// $('.bottom-logos img').each(function(){
	// 	var logoH = $(this).height();
	// 	$(this).css({'height': logoH});
	// });
	// $('.bottom-logos').each(function(){
	// 	var logoH = $(this).children('img').height();
	// 	var boxH = $(this).children('.box-hover').height();
	// 	$(this).css({'height': logoH + boxH});
	// });
}

// function footerHeight(){
// var footer = $('#footer'); 
// var winH = $(window).height();
// var winW = $(window).width();
// var contentH = $(document).height();
// var filler = winH -contentH;
// var newH = winH - 58;
// 	if(contentH < 1180 && winW < 1550) {
// 		footer.css({'height': filler});
// 	}
// 	$('body').css({'height':contentH});
// }


