$(document).ready(function(){
	$('#outrosRotulos').on('click', function(){

$('html, body').animate({
    scrollTop: $("#selecaoMes").offset().top
}, 2000);

	});

	$('.vinhoSelect').on('click', function(){
		$('.vinhos li').removeClass('active');
		$(this).parent('li').addClass('active');

		$('.sobre, .detalhe-vinho').fadeOut(400);
		var vinhoID = $(this).attr('data-id');

		$.ajax({
	  		type: "POST",
	  		url: "http://localhost/gourmet/wordpress/wp-admin/admin-ajax.php",
	  		data: {
	  			action: 'informacoesVinho',
	  			id: vinhoID
	  			
	  		},
	  		dataType: 'JSON',
	  		success:function(data){
	  			
	  			$('.nomeVinho').html(data['nome']);
				
				$('.teorAlcolico p').html(data['teor_alcoolico']);
				$('.origem p').html(data['origem']);
				$('.composicaoUvas p').html(data['composicao_de_uvas']);
				$('.envelhecimento p').html(data['envelhecimento']);
				$('.tempoConservacao p').html(data['tempo_de_conservacao']);
				$('.decantacao p').html(data['decantacao']);
				$('.harmonizacao').html('');

				if(data['harmonizacao']){
					$('.harmo').show();
					for(var i = 0; i<data['harmonizacao'].length; i++){
						$('.harmonizacao').append('<li><div><img src="'+data['harmonizacao'][i]['icone']+'"></div><p>'+data['harmonizacao'][i]['nome']+'</p></li>')
					}
				}
				else{
					$('.harmo').hide();
				}

				if(data['notas_de_prova']){
					$('.nota').show();
					$('.nota-content').html(data['notas_de_prova']);
					
				}
				else{
					$('.nota').hide();
				}

				if(data['por_que_amamos']){
					$('.porque').show();
					$('.porque-content').html(data['por_que_amamos']);
				}
				else{
					$('.porque').hide();
				}

				if(data['foto_produtor']){
					$('.sobre').fadeIn(400);
					$('.fotoProdutor').attr("src",data['foto_produtor']);
					$('.nomeProdutor').html(data['nome_produtor']);
					$('.descricaoProdutor').html(data['descricao_produtor']);
				}

				else{
					$('.sobre').hide();
				}
				

				
				$('.volumeVinho span').html(data['volume']);
				$('.safra span').html(data['safra']);
				$('.nacionalidade img').attr('src', data['nacionalidade']['bandeira']);
				$('.nacionalidade span').html(data['nacionalidade']['nome']);
				$('.tipoVinhos span').html(data['tipo']);
				$('.detalhe-vinho').fadeIn(400);
			
	  		}
		});
		event.preventDefault();
	});
});