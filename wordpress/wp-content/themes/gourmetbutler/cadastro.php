<?php
/*
Template Name: Cadastro
*/

get_header(); ?>
<section id="pag-cadastro">
	<div class="container titulo">
		<div class="titulos">
			<h1>Bem-vindo ao Gourmet Butler</h1>
			<h2>Por gentileza, preencha os dados abaixo para realizar seu cadastro. </h2>
		</div>	
		<ul class="passos">
			<li id="selectPassoUm" class="active">
				<div class="num">1</div>
				<p>Informações pessoais</p>
			</li>
			<li id="selectPassoDois">
				<div class="num">2</div>
				<p>Dados de Entrega</p>
			</li>
			<li id="selectPassoTres">
				<div class="num">3</div>
				<p>Plano e pagamento</p>
			</li>
			<div class="clear"></div>
		</ul>	
		<div class="clear"></div>

		<div id="voltar">Voltar</div>
	</div>
	<div class="etapa" id="passoUM">
		<div class="container">
			<h2>Informações Pessoais</h2>
			<form id="formPassoUm" action="#">
				<div class="divESQ">
					<input type="text" name="login" id="campoLogin" placeholder="Login" required>
					<div class="disponibilidade relative"></div>
					<input type="password" id="senha" name="senha" placeholder="Senha" required>
					<input type="password" id="confirmarsenha" name="confirmarsenha" placeholder="Confirmar senha" required>
					<div class="compatibilidade"></div>
					<input type="text" name="nome" placeholder="Seu nome" required>
					<input type="text" name="sobrenome" placeholder="Seu sobrenome" required>
					<input type="text" name="cpf" placeholder="Seu CPF" required id="seuCPF">
					
				</div>
				<div class="divDIR">
					<input type="email" name="email" placeholder="E-mail" id="campoEmail" required>
					<div class="disponibilidadeEmail relative"></div>
					<input type="text" name="nascimento" placeholder="Data de Nascimento" required id="dataNascimento">	
					<div class="relative">
						<label for="sexo">Sexo</label>
						<input type="radio" name="sexo" value="Masculino" checked>M
						<input type="radio" name="sexo" value="Feminino">F
					</div>		
					<input type="text" name="telefone" placeholder="Telefone" required class="numeroFone">
					<input type="text" name="celular" placeholder="Telefone Celular" required class="numeroFone">			
				</div>
				<div class="clear"></div>
				
				<input type="submit" value="ENVIAR" id="enviarPassoUm">
			</form>
			<div class="clear"></div>
			<div class="alerta">
				Produto EXCLUSIVO para maiores de 18 anos.
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="etapa" id="passoDOIS">
		<div class="container">
			<h2>Dados de Entrega</h2>
			<form action="#" id="formPassoDois">
				  	<fieldset>
						<div class="divESQ">
							<input type="text" name="cep" placeholder="Seu CEP" id="cep" required>
							<input type="text" name="rua" placeholder="Seu endereço" required id="rua">
							<input type="text" name="complemento" placeholder="Complemento" id="complemento" required>
							<input type="text" name="bairro" placeholder="Bairro" required id="bairro">
						</div>
						<div class="divDIR">
							<input type="text" name="uf" id="uf" placeholder="UF" disabled>
							<input type="text" name="cidade" placeholder="Seu Cidade" required id="cidade" disabled>
							<input type="text" name="numero" placeholder="Número" required id="numero">
							<input type="text" name="referencia" placeholder="Referência" id="referencia">
						</div>
						<div class="clear"></div>
						<input type="submit" value="ENVIAR" id="enviarPassoDois">
					</fieldset>
			</form>
		</div>
		<div class="clear"></div>
	</div>
	<div class="etapa" id="passoTRES">
		<form action="#" id="formPassoTres">
			<div class="container">
				<h2>Plano e Pagamento</h2>
				<h3>Escolha o plano que mais se encaixa no seu perfil<h3>
				
					<ul>
						<li class="planoSelect" data-plano="Royal">
							<h2><div class="icon"><div id="royal"></div></div>seleção<span>Royal</span></h2>
							<div class="content">
								<div class="status"></div>
								<div class="image">
								<img src="http://localhost/gourmet/wordpress/wp-content/themes/gourmetbutler/images/selecaoRoyal.png">								
								<div class="preco">R$<span>600</span></div>
								</div>
								<p>Selecionamos vinhos de <strong>safras memoráveis</strong> e com <strong>alta pontuação</strong>.</p>
								<div class="divisao"></div>
								<div class="garrafas">
									<div class="garrafasRate">
										<div class="garrafaIcon"></div>
										<div class="garrafaIcon"></div>
										<div class="garrafaIcon"></div>
										<div class="garrafaIcon"></div>
										<div class="garrafaIcon"></div>
										<div class="garrafaIcon"></div>
										<div class="clear"></div>
									</div>
									
									<p>De 4 a 6 garrafas por mês</p>
								</div>
								<div class="divisao"></div>
								
							</div>
						</li>
						<li class="planoSelect" data-plano="Premium">
							<h2><div class="icon"><div id="premium"></div></div>seleção<span>Premium</span></h2>
							<div class="content">
								<div class="status"></div>
								<div class="image">
								<img src="http://localhost/gourmet/wordpress/wp-content/themes/gourmetbutler/images/selecaoRoyal.png">								
								<div class="preco">R$<span>300</span></div>
								</div>
								<p>Reúne rótulos distíntos e com excelente<strong>custo-benefício</strong>.</p>
								<div class="divisao"></div>
								<div class="garrafas">
									<div class="garrafasRate">
										<div class="garrafaIcon"></div>
										<div class="garrafaIcon"></div>
										<div class="garrafaIcon"></div>
										<div class="garrafaIcon"></div>
										<div class="garrafaIcon"></div>
										<div class="garrafaIcon"></div>
										<div class="clear"></div>
									</div>
									<p>De 4 a 6 garrafas por mês</p>
								</div>
								<div class="divisao"></div>
							</div>
						</li>
						<li class="planoSelect" data-plano="Pocket">
							<h2><div class="icon"><div id="pocket"></div></div>seleção<span>Pocket</span></h2>
							<div class="content">
								<div class="status"></div>
								<div class="image">
								<img src="http://localhost/gourmet/wordpress/wp-content/themes/gourmetbutler/images/selecaoRoyal.png">								
								<div class="preco">R$<span>150</span></div>
								</div>
								<p>Receba os mesmos rótulos da <strong>Seleção Premium</strong>, mas no tamanho certo para você.</p>
								<div class="divisao"></div>
								<div class="garrafas">
									<div class="garrafasRate">
										<div class="garrafaIcon"></div>
										<div class="garrafaIcon"></div>
										<div class="garrafaIcon"></div>
									
										<div class="clear"></div>
									</div>
									<p>De 2 a 3 garrafas por mês</p>
								</div>
								<div class="divisao"></div>
								
							</div>
						</li>
						<div class="clear"></div>
					</ul>
					<input type="hidden" id="planoEscolhido" name="plano" value="">
					<input type="hidden" id="planoValor" name="valor" value="">

					<div class="campos">
						<div class="cupomDesconto">
							<label for="desconto">Cupom de desconto:</label>
							<input type="text" name="desconto" placeholder="Cupom" id="desconto">
						</div>
						<div class="calculo">
							<div class="frete"></div>
							<label for="frete">Frete:</label>
							
							<div class="clear"></div>
							<div class="subtotal"></div>
							<label class="labelSub">Subtotal:</label>
							
							<div class="clear"></div>

							<div id="atualizarValor"><span></span> Atualizar valor</div>

						</div>
						<div class="clear"></div>
					</div>
				
			</div>
			<section class="formaPagamento">
				<div class="container">
					<h1>Escolha a forma de pagamento de sua preferência</h1>
					<div class="bandeiras">
						<ul>
							<li class="visa" data-cartao="Visa"></li>
							<li class="master" data-cartao="MasterCard"></li>
							<li class="dinners" data-cartao="Dinners"></li>
							<div class="clear"></div>
							<li class="elo" data-cartao="Elo"></li>
							<li class="amex" data-cartao="American Express"></li>
						</ul>
						<input type="text" name="bandeira" value="" id="cartaoEscolhido" required disabled> 
					</div>
					<div class="dadosCartao">
						<input type="text" name="titular" placeholder="Nome do titular do cartão" required>
						<input type="text" name="cartaoNumero" id="cartaoNumero" placeholder="Número do cartão" required>
						<input type="text" name="codigo" id="codigo" placeholder="Código de segurança" required>
						<div class="relative">
							<a onclick="window.open('https://seguro.devmedia.com.br/duvida.htm','_blank', 'height=530, width=630'); return false();" class="oquee">O que é código de segurança?</a>
														
						</div>
						<input type="text" name="validade" placeholder="Validade" id="validade" required>
					</div>
					<div class="clear"></div>
					<input type="checkbox" name="termos" required> <p>Li e concordo com os <a href="<?php bloginfo('url') ?>/termos-de-servico">termos de serviço</a></p>
					<input type="submit" value="ENVIAR" id="enviarPassoTres">
					<div class="clear"></div>

				</div>
			</section>
		</form>
	</div>
	<div class="etapa" id="passoQuatro">
		<div class="container">
			<h1>Pagamento efetuado com sucesso</h1>
			<div class="texto">
				<h2>Bem-vindo ao clube</h2>
				<p>Agora você é um associado Gourmet Butler. A próxima seleção será entregue no local de escolha. </p>
				<p>Aproveite para acessar nossso Blog e sabia mais sobre dicas, receitas, recomendações e conteúdo sobre o mundo dos vinhos e da gastronomia.</p>
				<p>O Gourmet Butler agradece.</p>
			</div>
			<div class="garcom-content">
				<div class="garcom"></div>
				<div class="gb-pisca"></div>
				<div class="gb"></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>

</section>

<?php

get_footer();

?>