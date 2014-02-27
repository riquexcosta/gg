<section id="selecoes">
	<div class="container">
		<ul>
			<li>
				<h2><div class="icon"><div id="royal"></div></div>seleção<span>Royal</span></h2>
				<div class="content">
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
					<div class="btns">
						<?php query_posts(array( 
							'post_type' => 'selecao',
							'showposts' => 1,
							'meta_query' => array(
								'relation' => 'AND',
								array(
									'key' => 'tipo',
									'value' => 'royal',
									'compare' => '='
								),
								array(
									'key' => 'sele_do_mes',
									'value' => true,
									'compare' => '='
								)
							)));   ?>

						<?php if(have_posts()): ?>
								
							<?php while (have_posts()) : the_post(); ?>
								<a href="<?php the_permalink(); ?>" class="conheca">Conheça a seleção deste mês</a>
							<?php endwhile; ?>
						<?php endif; ?>

						<?php wp_reset_query(); ?>
						<a href="http://localhost/gourmet/wordpress/cadastro" class="associar">QUERO ME ASSOCIAR</a>
					</div>
				</div>
			</li>
			<li>
				<h2><div class="icon"><div id="premium"></div></div>seleção<span>Premium</span></h2>
				<div class="content">
					<div class="image">
					<img src="http://localhost/gourmet/wordpress/wp-content/themes/gourmetbutler/images/selecaoRoyal.png">								
					<div class="preco">R$<span>300</span></div>
					</div>
					<p>Reúne rótulos distíntos e com excelente <strong>custo-benefício</strong>.</p>
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
					<div class="btns">
						<?php query_posts(array( 
							'post_type' => 'selecao',
							'showposts' => 1,
							'meta_query' => array(
								'relation' => 'AND',
								array(
									'key' => 'tipo',
									'value' => 'premium',
									'compare' => '='
								),
								array(
									'key' => 'sele_do_mes',
									'value' => true,
									'compare' => '='
								)
							)));   ?>

						<?php if(have_posts()): ?>
								
							<?php while (have_posts()) : the_post(); ?>
								<a href="<?php the_permalink(); ?>" class="conheca">Conheça a seleção deste mês</a>
							<?php endwhile; ?>
						<?php endif; ?>

						<?php wp_reset_query(); ?>
						<a href="http://localhost/gourmet/wordpress/cadastro" class="associar">QUERO ME ASSOCIAR</a>
					</div>
				</div>
			</li>
			<li>
				<h2><div class="icon"><div id="pocket"></div></div>seleção<span>Pocket</span></h2>
				<div class="content">
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
					<div class="btns">
						<?php query_posts(array( 
							'post_type' => 'selecao',
							'showposts' => 1,
							'meta_query' => array(
								'relation' => 'AND',
								array(
									'key' => 'tipo',
									'value' => 'pocket',
									'compare' => '='
								),
								array(
									'key' => 'sele_do_mes',
									'value' => true,
									'compare' => '='
								)
							)));   ?>

						<?php if(have_posts()): ?>
								
							<?php while (have_posts()) : the_post(); ?>
								<a href="<?php the_permalink(); ?>" class="conheca">Conheça a seleção deste mês</a>
							<?php endwhile; ?>
						<?php endif; ?>

						<?php wp_reset_query(); ?>
						
						<a href="http://localhost/gourmet/wordpress/cadastro" class="associar">QUERO ME ASSOCIAR</a>
					</div>
				</div>
			</li>
			<div class="clear"></div>
		</ul>
	</div>
</section>