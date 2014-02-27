$(document).ready(function(){
	$('.selecoes li').on('click', function(){
		$('.selecoes li').removeClass('active');
		$(this).addClass('active');

		var ano = $('.anos li.active').html();
		var tipo = $('.selecoes li.active').attr('data-tipo');
		$.ajax({
	  		type: "POST",
	  		url: "http://localhost/gourmet/wordpress/wp-admin/admin-ajax.php",
	  		data: {
	  			action: 'getPassadas',
	  			tipo: tipo,
	  			ano: ano
	  			
	  		},
	  		dataType: 'JSON',
	  		success:function(data){
				$('.garrafas .container').html(data);
	  		}
		});
	});

	$('.anos li').on('click', function(){
		$('.anos li').removeClass('active');
		$(this).addClass('active');

		var ano = $('.anos li.active').html();
		var tipo = $('.selecoes li.active').attr('data-tipo');
		
		$.ajax({
	  		type: "POST",
	  		url: "http://localhost/gourmet/wordpress/wp-admin/admin-ajax.php",
	  		data: {
	  			action: 'getPassadas',
	  			tipo: tipo,
	  			ano: ano
	  			
	  		},
	  		dataType: 'JSON',
	  		success:function(data){
				$('.garrafas .container').html(data);
	  		}
		});
	});

});