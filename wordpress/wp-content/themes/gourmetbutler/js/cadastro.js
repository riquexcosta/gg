$("#cep").on('change', function(){
		Index.buscarEndereco();
	});

$('#seuCPF').mask("999.999.999-99");
$('#dataNascimento').mask("99/99/9999");
$('.numeroFone').mask("(99) 9999-9999");

$("#campoLogin").on('change', function(){
	var login = $(this).val();

	$.ajax({
  		type: "POST",
  		url: "http://localhost/gourmet/wordpress/wp-admin/admin-ajax.php",
  		data: {
  			action: 'pb_check_username',
  			usr: login
  		},
  		dataType: 'JSON',
  		success:function(data){
  			
  			if(data==1){
  				$('.disponibilidade').html('Usuário não disponível').addClass('nao').removeClass('sim').fadeIn();
  				$("#campoLogin").removeClass('valid').addClass('error');
  			}else{
  				if(data==0){
  					$(".disponibilidade").html('Usuário disponível').addClass('sim').removeClass('nao').fadeIn();
  					$("#campoLogin").removeClass('error').addClass('valid');
  				}
  				else{
  					if(data==2){
  						$('.disponibilidade').html('Digite seu usuário').addClass('nao').removeClass('sim').fadeIn();
  						$("#campoLogin").removeClass('valid').addClass('error');
  					}
  				}
  				
  			}
		
  		}
	});

});


	$("#campoEmail").on("change",function(){
		var email = $(this).val();

		$.ajax({
	  		type: "POST",
	  		url: "http://localhost/gourmet/wordpress/wp-admin/admin-ajax.php",
	  		data: {
	  			action: 'check_email',
	  			email: email
	  		},
	  		dataType: 'JSON',
	  		success:function(data){
	  			
	  			if(data==1){
	  				$('.disponibilidadeEmail').html('E-mail já está em uso').addClass('nao').removeClass('sim').fadeIn();
	  				
	  			}else{
	  				if(data==0){
	  					if($("#campoEmail").hasClass('error')){
	  						$(".disponibilidadeEmail").html('Digite seu e-mail coretamente').addClass('nao').removeClass('sim').fadeIn();			
	  					}
	  					else{
		  					$(".disponibilidadeEmail").html('E-mail disponível').addClass('sim').removeClass('nao').fadeIn();
	  					}
	  				}
	  				else{
	  					if(data==2){
	  						$('.disponibilidadeEmail').html('Digite seu e-mail').addClass('nao').removeClass('sim').fadeIn();
	  					
	  					}
	  				}
	  				
	  			}
			
	  		}
		});

	});

	$("#confirmarsenha").on('change', function(){
		var confirmar = $(this).val();
		var senha = $("#senha").val();

		if(confirmar==senha){
			$(".compatibilidade").html('Senhas iguais').addClass('sim').removeClass('nao').fadeIn();

		}
		else{
			$('.compatibilidade').html('Senhas diferentes').addClass('nao').removeClass('sim').fadeIn();
			$('#confirmarsenha').val('');
		}
	});


/* CADASTRO */

$(".planoSelect").on('click', function(){
	$('.status').removeClass('active');
	$(this).find('.status').addClass('active');

	var plano = $(this).attr('data-plano');
	var valor = '';

	if(plano == 'Pocket'){
		valor = "15000";
	}else{
		if(plano == 'Premium'){
			valor = "30000";
		}
		else{
			if(plano=='Royal'){
				valor="60000";
			}
		}
	}

	$('#planoEscolhido').val(plano);
	$('#planoValor').val(valor);
});

function passoDois(){
	$('#passoUM').fadeOut(400, function(){
		$('#passoDOIS').fadeIn();
		$('.passos li').removeClass('active');
		$('.passos li:nth-of-type(2)').addClass('active');
		$('#voltar').fadeIn();
	});
	
}

function passoTres(){
	$('#passoDOIS').fadeOut(400, function(){
		$('#passoTRES').fadeIn();
		$('.passos li').removeClass('active');
		$('.passos li:nth-of-type(3)').addClass('active');
		$('#voltar').fadeOut();
	});
	
}

function passoQuatro(){
	$('#passoTRES').fadeOut(400, function(){
		$('#passoQuatro').fadeIn();
		$('.passos li').removeClass('active');
	});
	
}

$('.bandeiras li').on('click', function(){
	$('.bandeiras li').removeClass('active');
	$(this).addClass('active');
	var cartao = $(this).attr('data-cartao');
	$('#cartaoEscolhido').val(cartao);
});


var formPassoUm = $( "#formPassoUm" );
	formPassoUm.validate({
		errorPlacement: function(error, element){},
		submitHandler: function(form) {

			
		}
	});

$("#formPassoUm").submit(function(){
	var teste = formPassoUm.valid();
	if(teste){
		_gaq.push(['_trackEvent', 'Cadastro', 'Passo Um']);
		passoDois();
	}
	else{
		$('#enviarPassoUm').before('<div class="erro"> * Preencha corretamente os campos destacados </div>')
	}
});

var formPassoDois = $( "#formPassoDois" );
	formPassoDois.validate({
		errorPlacement: function(error, element){},
		submitHandler: function(form) {

			
		}
	});

$("#formPassoDois").submit(function(){
	var teste = formPassoDois.valid();
	if(teste){
		_gaq.push(['_trackEvent', 'Cadastro', 'Passo Dois']);
		passoTres();

	}
	else{
		$('#enviarPassoDois').before('<div class="erro"> * Preencha corretamente os campos destacados </div>')
	}
});

var formPassoTres = $( "#formPassoTres" );
	formPassoTres.validate({
		errorPlacement: function(error, element){},
		submitHandler: function(form) {

			
		}
	});

$("#enviarPassoTres").on('click',function(){
	var login = $("#campoLogin").val();
	var email = $("#campoEmail").val();
	var senha = $("#senha").val();
	var nome = $("input[name='nome']").val();
	var sobrenome = $("input[name='sobrenome']").val();
	var cpf = $("#seuCPF").val();
	var cupom = $("#desconto").val();
	var titular = $("#titular").val();
	var numeroCartao = $("#cartaoNumero").val();
	var codSeguranca = $("#codigo").val();
	var validade = $("#validade").val();
	var bandeira = $("#cartaoEscolhido").val();
	var plano = $("#planoEscolhido").val();
	var dataNascimento = $("#dataNascimento").val();
	var telefone = $("input[name='telefone']").val();
	var celular = $("input[name='celular']").val();
	var telefone = $("input[name='telefone']").val();
	var sexo = $("input[name='sexo']:checked").val();
	var cep = $("#cep").val();
	var endereco = $("#rua").val();
	var complemento = $("#complemento").val();
	var bairro = $("#bairro").val();
	var uf = $("#uf").val();
	var cidade = $("#cidade").val();
	var numero = $("#numero").val();
	var referencia = $("#referencia").val();


	var teste = formPassoTres.valid();
	if(teste){
		$.ajax({
	  		type: "POST",
	  		url: "http://localhost/gourmet/wordpress/wp-admin/admin-ajax.php",
	  		data: {
	  			action: 'cadastro',
	  			nome: nome,
	  			sobrenome: sobrenome,
	  			email: email,
	  			login: login,
	  			senha: senha,
	  			cpf: cpf,
	  			cupom: cupom,
	  			titular: titular,
	  			numeroCartao: numeroCartao,
	  			codSeguranca: codSeguranca,
	  			validade: validade,
	  			bandeira: bandeira,
	  			plano: plano,
	  			dataNascimento: dataNascimento,
	  			telefone: telefone,
	  			celular: celular,
	  			sexo: sexo,
	  			cep: cep,
	  			endereco: endereco,
	  			complemento: complemento,
	  			bairro: bairro,
	  			uf: uf,
	  			cidade: cidade,
	  			numero: numero,
	  			referencia: referencia
	  		},
	  		dataType: 'JSON',
	  		success:function(data){
				if(data){
					passoQuatro();
					alert(data);
				}
				else{
					alert("Não foi possível completar a operação");
				}
	  		}
		});
	}
	else{

		$('#enviarPassoTres').before('<div class="erro"> * Preencha corretamente os campos destacados </div>')
	}
});


$('#voltar').on('click', function(){
	var passoUm = $('#selectPassoUm');
	var passoDois = $('#selectPassoDois');
	var passoTres = $('#selectPassoTres');

	if(passoDois.hasClass('active')){
		$("#passoDOIS").fadeOut();
		$("#passoUM").fadeIn();
		$('#voltar').fadeOut();
		passoDois.removeClass('active');
		passoUm.addClass('active');
	}

	if(passoTres.hasClass('active')){
		$("#passoTRES").fadeOut();
		$("#passoDOIS").fadeIn();
		passoDois.addClass('active');
		passoTres.removeClass('active');
	}

});