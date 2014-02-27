jQuery(document).ready(function(){
	$('.links a').mouseenter(function() {
	   $(this).find('div').stop(true,true).fadeIn(200);
	   $(this).find('p').css('color','rgba(255,255,255,1)');
		  
		  }).mouseleave(function() {
		$(this).find('div').stop(true,true).fadeOut(200);
	    $(this).find('p').css('color','rgba(89,89,89,1)');

	  });
});