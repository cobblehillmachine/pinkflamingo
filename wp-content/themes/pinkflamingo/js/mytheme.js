$(document).ready(function() {
	footerHeight();
	$('#header, #main-wrap, #footer, #logo-cont').fadeIn('slow');
	logoBoxPosition();
	
	showCatDropdown();
	$('.cat-dd ul li a').removeAttr('title');
	setInputFieldFunctions();
	$('.member-img').live({
		mouseenter: function(){$(this).children('.photo1').hide(); $(this).children('.photo2').show();},
		mouseleave: function(){$(this).children('.photo1').show(); $(this).children('.photo2').hide();}
	});
	var container = $('.images-cont');
	container.imagesLoaded( function(){
	  container.masonry({ 	
		itemSelector: '.gallery-images',
		  columnWidth: function( containerWidth ) {
		    return containerWidth / 3;
		  }
		});
	});
	$('#gallery-cont .categories li:first-child').remove();
	// $('#gallery-cont .categories .cat-name a').on({
	// 	click: function(e){ e.preventDefault(); var route = $(this).attr('href'); $('.images-cont').load(route+' #masonry-images'); }
	// });
});

$(window).resize(function() {
	footerHeight();

});

$(window).load(function() {
	footerHeight();

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
		$('.sort-title').css({'background-position': '90px 10px'});
	},
	function(){
		$('.cat-dd ul').animate({height: 'toggle'});
		$('.sort-title').css({'background-position': '90px -15px'});
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
// 	var footer = $('#footer'); 
// 	var winH = $(window).height();
// 	var winW = $(window).width();
// 	var contentH = $(document).height();
// 	var filler = winH -contentH;
// 	var newH = winH - 58;
// 		if(contentH < 1180 && winW < 1550) {
// 			footer.css({'height': filler});
// 		}
// 		$('body').css({'height':contentH});
// }
function footerHeight(){
var footer = $('#footer'),
windowHeight = $(window).height(),
combinedHeight = footer.offset().top,
height = (windowHeight > combinedHeight) ? windowHeight - footer.offset().top : 18;
// height = windowHeight - footer.offset().top;

footer.css({'height':height});
}