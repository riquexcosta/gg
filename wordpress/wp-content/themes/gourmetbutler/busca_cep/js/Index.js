/**
  *
  * Script para busca por cep com Ajax
  * @author: Edy Segura - edy@segura.pro.br
  *
  */
var Index = {

	init: function() {
		Index.setForm();

	},

	
	setForm: function() {
		var form = document.forms['formPassoDois'];
		form.onsubmit = function() {
			return false;
		};
	},
	
	
	buscarEndereco: function(form) {
		//remove qualquer coisa q não seja um digito.
		var CEP = $('#formPassoDois #cep').val();
		if(CEP.length != 8) {
			alert("Preencha corretamente seu CEP."); 
			return $('#formPassoDois #cep').focus();
		}

		Ajax.request({
			url      : "http://localhost/gourmet/wordpress/wp-content/themes/gourmetbutler/busca_cep/cep/endereco.php?cep=" + CEP,
			params   : form,
			callback : Index.preencherCampos,
			callerro : Index.limparCampo
		});
		
	},

	preencherCampos: function(response, form) {
		var cep = eval('(' + response + ')');
		console.log(cep);
		
		$("#rua").val(cep.logradouro);
		$("#bairro").val(cep.bairro);
		$("#cidade").val(cep.cidade);
		$("#uf").val(cep.uf);

	},
	
	limparCampo: function(httpStatus, message, form) {
		alert(message);
	}

};

//inicializacao
window.onload = Index.init;
