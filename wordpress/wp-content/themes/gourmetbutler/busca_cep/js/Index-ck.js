/**
  *
  * Script para busca por cep com Ajax
  * @author: Edy Segura - edy@segura.pro.br
  *
  */var Index={init:function(){Index.setForm()},setForm:function(){var e=document.forms.formPassoDois;e.onsubmit=function(){return!1}},buscarEndereco:function(e){var t=$("#formPassoDois #cep").val();if(t.length!=8){alert("Preencha corretamente seu CEP.");return $("#formPassoDois #cep").focus()}Ajax.request({url:"http://localhost/gourmet/wordpress/wp-content/themes/gourmetbutler/busca_cep/cep/endereco.php?cep="+t,params:e,callback:Index.preencherCampos,callerro:Index.limparCampo})},preencherCampos:function(response,form){var cep=eval("("+response+")");console.log(cep);$("#rua").val(cep.logradouro);$("#bairro").val(cep.bairro);$("#cidade").val(cep.cidade);$("#uf").val(cep.uf)},limparCampo:function(e,t,n){alert(t)}};window.onload=Index.init;