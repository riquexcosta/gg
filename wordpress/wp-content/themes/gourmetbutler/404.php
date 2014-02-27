<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<section id="pag404">
	<div class="container">
		<h1>ERRO 404</h1>
		<h2>A página que você procura não pôde ser encontrada.</h2>
		<h3>Mas não se preocupe. Encha sua taça e continue navegando. Aqui estão alguns links úteis:</h3>
		
		<ul class="links quatro">
			<li>
				<a class="hover" href="#" >
					<div id="btn-home">
						
					</div>
					<p>HOME</p>
				</a>
			</li>
			<li>
				<a class="hover" href="#">
					<div id="btn-quemsomos">
					</div>
						<p>QUEM SOMOS</p>					

				</a>
			</li>
			<li>
				<a class="hover" href="#">
					<div id="btn-comofunciona">
											
					</div>
					<p class="bottom">COMO FUNCIONA</p>	
				</a>
			</li>
			<li>
				<a class="hover" href="#">
					<div id="btn-selecao">
												
					</div>
					<p class="bottom">SELEÇÃO DO MÊS</p>
				</a>
			</li>
			<div class="clear"></div>
		</ul>

		<div class="clear"></div>

		<ul class="links tres">
			<li><a class="hover" href="">
				<div id="btn-eventos"></div>
				<p>EVENTOS</p>
			</a></li>
			<li><a class="hover" href="">
				<div id="btn-blog"></div>
				<p>BLOG</p>
			</a></li>
			<li><a class="hover" href="">
				<div id="btn-contatos"></div>
				<p>CONTATOS</p>
			</a></li>
			<div class="clear"></div>
		</ul>

		<div class="clear"></div>
	</div>
	<section class="blog">
		<div class="container">
			<h2>Aproveite para conferir as últimas do blog</h2>
			<article>
				<h4>Receita de Filé ao molho de vinho tinto</h4>
				<div class="categorias">
					<div class="categoria">Categoria 1</div>
					<div class="categoria">Categoria 1</div>
					<div class="categoria">Categoria 1</div>

					<div class="clear"></div>
				</div>
				<div class="autor">por Marco Antônio Dias</div>
				<div class="clear"></div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				<div class="clear"></div>
				<a href="#" class="leiaMais">Leia mais</a>
				<div class="clear"></div>
			</article>
			<article>
				<h4>Receita de Filé ao molho de vinho tinto</h4>
				<div class="categorias">
					<a href="#" class="categoria">Categoria 1</a>
					<a href="#" class="categoria">Categoria 1</a>
					<a href="#" class="categoria">Categoria 1</a>
					<div class="clear"></div>
				</div>
				<div class="autor">por Marco Antônio Dias</div>
				<div class="clear"></div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				<div class="clear"></div>
				<a href="#" class="leiaMais">Leia mais</a>
				<div class="clear"></div>
			</article>
		</div>
	</section>
</section>

<?php
get_footer();
