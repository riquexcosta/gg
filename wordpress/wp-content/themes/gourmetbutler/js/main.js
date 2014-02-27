jQuery(document).ready(function(){

	var numero = 1;
	setInterval(function(){
		if(numero===3){
			numero=1;
		}else{numero++;}
		$('.banner .img').animate({opacity: 0}, 'slow', function() {
        $(this)
            .css({'background-image': 'url('+temaUrl+'/images/bebidasfesta/banner'+numero+'.jpg)'})
            .animate({opacity: 1});
    });
	}, 5000);


	


	$('.btn-planos').on('click', function(){
		$('html, body').animate({
			scrollTop: $("#selecoes").offset().top
		}, 2000);
	});

	$( "#accordion" ).accordion({
      heightStyle: "content"
    });

	jQuery(".entrar").on("click", function(){
		jQuery("#login").slideDown();
		event.preventDefault();
	});
	jQuery(".close-login").on("click", function(){
		jQuery("#login").slideUp();
		event.preventDefault();	});

	jQuery(".indique").on("click", function(){
		jQuery("#indique-amigo").slideDown();
		event.preventDefault();
	});

	jQuery("#indique-amigo #close").on("click", function(){
		jQuery("#indique-amigo").slideUp();
		event.preventDefault();
	});

	$('#trabalhe').on('click', function(){
		if($(this).hasClass('active')){
			$('#form-trabalhe').slideUp(300);
			$(this).removeClass('active');
		}
		else{
			$('#form-trabalhe').slideDown(300);
			$(this).addClass('active');
		}
 
	});

/* BANNER */

	slideUm();

	var aba = jQuery(".banner .tabs a");

	jQuery(aba).on("click", function(){
		if($(this).parent('li').hasClass('active')){
			event.preventDefault();
		}
		else{
			$('.banner .tabs li').removeClass('active');
			$(this).parent('li').addClass('active');
		}
	});

	$("#action1").on("click", slideUm);
	$("#action2").on("click", slideDois);
	$("#action3").on("click", slideTres);
	$("#action4").on("click", slideQuatro);

	$("#home .tabs a").on("click", function(){
		event.preventDefault();
	});




});

function slideUm(){
	$('.tabs li').removeClass('active');
	$("#action1").parent('li').addClass('active');
	$('.banner-slide').fadeOut(300);
	$('#banner1 div').fadeOut(300);
	$('.banner-img').fadeOut(300, function(){	
		$(this).css('background-image', 'url('+temaUrl+'/images/banner1.jpg)').fadeIn(400, function(){
			$('#selecionado1').fadeIn(400, function(){
				$('#selecionado2').fadeIn(400, function(){
					$('#selecionado3').fadeIn(400,function(){
						$('.caixa').fadeIn();
					});
				})
			});
		});
		
		$('#banner1').fadeIn();
		
	});
	var timeOut1 = setTimeout(function(){
		slideDois();
	}, 9000);

	$("#home .tabs a").on("click", function(e){
		clearTimeout(timeOut1);
	});

}

function slideDois(){
	$('.tabs li').removeClass('active');
	$("#action2").parent('li').addClass('active');
	$('.banner-slide').fadeOut(300);
	$('#banner2 div').fadeOut(300);
	$('.banner-img').fadeOut(300, function(){
		
		$(this).css('background-image', 'url('+temaUrl+'/images/banner2.jpg)').fadeIn(400, function(){
			$('#pocketg').fadeIn(400, function(){
				$('#royalg').fadeIn(400, function(){
					$('#premiumg').fadeIn(400,function(){
						$('.caixa').fadeIn();
					});
				})
			});
		});
		
		$('#banner2').fadeIn();
	});
	var timeOut2 = setTimeout(function(){
		slideTres();
	}, 9000);

	$("#home .tabs a").on("click", function(e){
		clearTimeout(timeOut2);
	});

}

function slideTres(){
	$('.tabs li').removeClass('active');
	$("#action3").parent('li').addClass('active');
	$('.banner-slide').fadeOut(300);
	$('#banner3 div').fadeOut(300);
	$('.banner-img').fadeOut(300, function(){
		$(this).css('background-image', 'url('+temaUrl+'/images/banner3.jpg)').fadeIn(400,function(){
			$('.vinho-1').fadeIn(400,function(){
				$('.caixa').fadeIn();
			});
		});
		$('.banner-slide').fadeOut();
		$('#banner3').fadeIn();
	});
	var timeOut3 = setTimeout(function(){
		slideQuatro();
	}, 9000);

	$("#home .tabs a").on("click", function(){
		clearTimeout(timeOut3);
	});

}

function slideQuatro(){
	$('.tabs li').removeClass('active');
	$("#action4").parent('li').addClass('active');
	$('.banner-slide').fadeOut(300);
	$('.banner-img').fadeOut(300, function(){
		$(this).css('background-image', 'url('+temaUrl+'/images/banner4.jpg)').fadeIn();
		$('.banner-slide').fadeOut();
		$('#banner4').fadeIn();
	});
	var timeOut4 = setTimeout(function(){
		slideUm();
	}, 9000);

	$("#home .tabs a").on("click", function(e){
		clearTimeout(timeOut4);
	});

}

/* FIM BANNER */

setInterval(function(){

	$('#gb-pisca').fadeIn(500).delay(2000).fadeOut(500);},5000);

var valores = $('#valores li');

valores.on('click',function(){
	if($(this).hasClass('active')){
		$(this).find('.descricaoValor').slideUp();
		$(this).removeClass('active');
	}
	else{
	
		$('#valores li').removeClass('active').addClass('inativa')	
		$(this).addClass('active').removeClass('inativa');
		$('.descricaoValor').slideUp(500);
		
		$('.active').find('.descricaoValor').slideDown();
		
		
	}
});


/* CONTATO */



var contatoForm = $( "#contatoForm" );
	contatoForm.validate({
		errorPlacement: function(error, element){},
		submitHandler: function(form) {

			
		}
	});

$("#contatoForm").submit(function(){
	var teste = contatoForm.valid();
	if(teste){
		
		var nome = $('#contatoForm #nome').val();
		var email = $('#contatoForm #email').val();
		var mensagem = $('#contatoForm #mensagem').val();
		
		$.ajax({
	  		type: "POST",
	  		url: Url+"/wp-admin/admin-ajax.php",
	  		data: {
	  			action: 'contatoAction',
	  			nome: nome,
	  			email: email,
	  			mensagem: mensagem
	  		},
	  		dataType: 'JSON',
	  		success:function(data){
	  			$('.mensagem').after('<p style="font-size: 18px; color: #7FB46A;">Mensagem enviada com sucesso.</p>');
	  			$('input[type="text"], input[type="email"], textarea').val();
	  			$('input[type="submit"]').val('ENVIADO').css('background', '#7FB46A');
	  			
	  			_gaq.push(['_trackPageview', '/envio-contato']);
			
	  		}
		});
	}
});

var contatoOrcamento = $( "#bebidasContatoOrcamento" );
	contatoOrcamento.validate({
		errorPlacement: function(error, element){},
		submitHandler: function(form) {

			
		}
	});

$("#bebidasContatoOrcamento").submit(function(){

	var teste = contatoOrcamento.valid();
	if(teste){
	
		var nome = $('#bebidasContatoOrcamento input[name="nome"]').val();
		var email = $('#bebidasContatoOrcamento input[name="email"]').val();
		var telefone = $('#bebidasContatoOrcamento #foneOrcamento').val();
		var mensagem = $('#bebidasContatoOrcamento textarea').val();
		
		$.ajax({
	  		type: "POST",
	  		url: Url+"/wp-admin/admin-ajax.php",
	  		data: {
	  			action: 'contatoOrcamentoAction',
	  			nome: nome,
	  			email: email,
	  			telefone: telefone,
	  			mensagem: mensagem
	  		},
	  		dataType: 'JSON',
	  		success:function(data){
	  			$('.mensagem').after('<p style="font-size: 18px; color: #7FB46A;">Mensagem enviada com sucesso.</p>');
	  			$('#bebidasContatoOrcamento input[type="text"], input[type="email"], textarea').val();
	  			$('#bebidasContatoOrcamento input[type="submit"]').val('ENVIADO').css('background', '#7FB46A');
	  			setTimeout(function(){
	  				$('.contatoOrcamento').slideUp();
	  			}, 3000);
	  			_gaq.push(['_trackPageview', '/envio-orcamento']);
			
	  		}
		});
	}
});

var contatoOrcamento2 = $( "#bebidasContato" );
	contatoOrcamento2.validate({
		errorPlacement: function(error, element){},
		submitHandler: function(form) {

			
		}
	});

$("#bebidasContato").submit(function(){
	var teste = contatoOrcamento2.valid();
	if(teste){
		
		var nome = $('#bebidasContato input[name="nome"]').val();
		var email = $('#bebidasContato input[name="email"]').val();
		var telefone = $('#bebidasContato #foneContato').val();
		var mensagem = $('#bebidasContato textarea').val();
		
		$.ajax({
	  		type: "POST",
	  		url: "http://localhost/gourmet/wordpress/wp-admin/admin-ajax.php",
	  		data: {
	  			action: 'contatoOrcamentoAction',
	  			nome: nome,
	  			email: email,
	  			telefone: telefone,
	  			mensagem: mensagem
	  		},
	  		dataType: 'JSON',
	  		success:function(data){
	  			$('.mensagem').after('<p style="font-size: 18px; color: #7FB46A;">Mensagem enviada com sucesso.</p>');
	  			$('#bebidasContato input[type="text"], input[type="email"], textarea').val();
	  			$('#bebidasContato input[type="submit"]').val('ENVIADO').css('background', '#7FB46A');
	  			setTimeout(function(){
	  				$('.contato').slideUp();
	  			}, 3000);
	  			
	  			_gaq.push(['_trackPageview', '/envio-orcamento']);
			
	  		}
		});
	}
});

var indiqueForm = $( "#indiqueForm" );
	indiqueForm.validate({
		errorPlacement: function(error, element){},
		submitHandler: function(form) {

			
		}
	});

$("#indiqueForm").submit(function(){
	var teste = indiqueForm.valid();
	if(teste){
		
		var nome = $('#indiqueForm .nome').val();
		var email = $('#indiqueForm .email').val();
		var nomeAmigo = $('#indiqueForm .nome-amigo').val();
		var emailAmigo = $('#indiqueForm .email-amigo').val();
		var mensagem = $('#indiqueForm .mensagem').val();
		
		$.ajax({
	  		type: "POST",
	  		url: Url+"/wp-admin/admin-ajax.php",
	  		data: {
	  			action: 'indiqueAction',
	  			nome: nome,
	  			email: email,
	  			mensagem: mensagem,
	  			nomeamigo: nomeAmigo,
	  			emailamigo: emailAmigo 
	  		},
	  		dataType: 'JSON',
	  		success:function(data){
	  			$('.textarea').after('<p style="font-size: 18px; color: #7FB46A;">Mensagem enviada com sucesso.</p>');
	  			$('input[type="text"], input[type="email"], textarea').val();
	  			$('input[type="submit"]').val('ENVIADO').css('background', '#7FB46A');

	  			_gaq.push(['_trackPageview', '/indique']);
	  		
			
	  		}
		});
	}
});



var formTrabalhe = $( "#formTrabalhe" );
	formTrabalhe.validate({
		errorPlacement: function(error, element){},
		submitHandler: function(form) {

			
		}
	});
$('#formTrabalhe').submit(function(){
	var teste = formTrabalhe.valid();

	if(teste){
		alert('deu');
		var nome = $('#formTrabalhe .nome').val();
		var email = $('#formTrabalhe .email').val();

		$.ajaxFileUpload({
			url: "http://localhost/gourmet/wordpress/wp-admin/admin-ajax.php",
			secureuri: false,
			fileElementId: 'curriculo',
			data: {
				action: 'contatoTrabalheConosco', 
				nome: nome,
				email: email
			},
			success: function(data, status)
			{
				_gaq.push(['_trackPageview', '/trabalhe-conosco']);
			}
		});
	}
	
});




$('.como-funciona .orcamento').on('click', function(){
	$(".contato").slideDown();
	event.preventDefault();
});

$('.associe a').on('click', function(){
	$(".contatoOrcamento").slideDown();
	event.preventDefault();
});

$('#bebidasFesta #close').on('click', function(){
	$(this).parents('.contato, .contatoOrcamento').slideUp();

});

$('.chat, .chat-texto, #chat').on('click', function(){
	_gaq.push(['_trackPageview', '/chat']);
});

$('.pag-eventos .comprar').on('click', function(){
	_gaq.push(['_trackPageview', '/comprar-ingresso']);
});

$('#home #enviarMailing').on('click', function(){
	_gaq.push(['_trackPageview', '/home-mailing']);
});

$('.pag-quem #enviarMailing').on('click', function(){
	_gaq.push(['_trackPageview', '/quemsomos-mailing']);
});

$('.banner-caixa .quero-associar').on('click', function(){
	_gaq.push(['_trackEvent', 'Associação', 'Quero me associar', 'Banner Home']);
});

$('#unico .tornar-associado').on('click', function(){
	_gaq.push(['_trackEvent', 'Associação', 'Quero me associar', 'Porque Home']);
});

$('#clientesAsssociado').on('click', function(){
	_gaq.push(['_trackEvent', 'Associação', 'Quero me associar', 'Clientes Home']);
});

$('#selecoes .associar').on('click', function(){
	_gaq.push(['_trackEvent', 'Associação', 'Quero me associar', 'Seleções']);
});

$('#subHeader .associar').on('click', function(){
	_gaq.push(['_trackEvent', 'Associação', 'Quero me associar', 'Header']);
});

$('.pag-quem .botaoAssociar').on('click', function(){
	_gaq.push(['_trackEvent', 'Associação', 'Quero me associar', 'Quem Somos']);
});

$('.pag-comoFunciona .botaoAssociar').on('click', function(){
	_gaq.push(['_trackEvent', 'Associação', 'Quero me associar', 'Como funciona']);
});

$('#selecaoMes .botaoAssociar').on('click', function(){
	_gaq.push(['_trackEvent', 'Associação', 'Quero me associar', 'Pagina da seleção']);
});

$('.page-selecoesPassadas .desejo').on('click', function(){
	_gaq.push(['_trackEvent', 'Associação', 'Quero me associar', 'Seleções Antigas']);
});













