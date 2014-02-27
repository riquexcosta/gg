<?php
/*
Template Name: Eventos
*/

get_header(); ?>
<section class="pag-eventos">
	<div class="container">
		<h1><div id="iconEventos"></div>
			Eventos Gourmet Butler</h1>
	</div>
	
		<?php query_posts(array( 
					'post_type' => 'eventos',
					'showposts' => '1',
					'meta_key' => 'status',
					'meta_value' => 'atual'
					                   
                ));   
		?>

		<?php if(have_posts()): ?>
			
				<?php while (have_posts()) : the_post(); ?>
					<section class="eventosBanner">
						<img src="<?php echo get_field('banner', get_the_ID()); ?>" alt="">
					</section>
					<div class="container">
					<div class="principal">
						<div class="descricao">
							<h2><?php the_title(); ?></h2>
							<p><?php the_content(); ?></p>
							<a target="_blank" href="<?php echo get_field('url_compra', get_the_ID()); ?>" class="comprar">Quero comprar o ingresso</a>
						</div>
						<div class="caixa">
							<ul>
								<?php $data = DateTime::createFromFormat('Ymd', get_field('data', get_the_ID())); ?>
								<li>
									<div id="iconData"></div>
									<p><?php echo $data->format('d/m/Y'); ?></p>
									<div class="clear"></div>
								</li>
								<li>
									<div id="iconHora"></div>
									<p><?php echo get_field('horario', get_the_ID()); ?></p>
									<div class="clear"></div>
								</li>
								<li>
									<div id="iconLocal"></div>
									<p><?php echo get_field('local', get_the_ID()); ?></p>
									<p><span><?php echo get_field('endereco', get_the_ID()); ?></span></p>
									<div class="clear"></div>
								</li>
								<li>
									<div id="iconFone"></div>
									<p><?php echo get_field('telefone', get_the_ID()); ?></p>
									<div class="clear"></div>
								</li>
							</ul>
						</div>
						<div class="clear"></div>
					</div>
					
				<?php endwhile; ?>
		<?php endif; ?>

		<?php wp_reset_query(); ?>


		<?php query_posts(array( 
					'post_type' => 'eventos',
					'showposts' => '3',
					'meta_key' => 'status',
					'meta_value' => 'proximo'
					                   
                ));   
		?>

		<?php if(have_posts()): ?>
			<h2 class="slim">Próximos Eventos</h2>
			<ul class="proximos">
				<?php while (have_posts()) : the_post(); ?>
					<li>
						<img src="<?php echo get_field('foto', get_the_ID()); ?>" alt="">
						<h3><?php the_title(); ?></h3>
						<p class="desc"><?php the_content(); ?></p>
						<ul class="icones">
							<?php $data = DateTime::createFromFormat('Ymd', get_field('data', get_the_ID())); ?>
							<li>
								<div id="iconData"></div>
								<p><?php echo $data->format('d/m/Y'); ?></p>
								<div class="clear"></div>

							</li>
							<li>
								<div id="iconHora"></div>
								<p><?php echo get_field('horario', get_the_ID()); ?></p>
								<div class="clear"></div>

							</li>
							<li>
								<div id="iconLocal"></div>
								<p><?php echo get_field('local', get_the_ID()); ?></p>
								<p><span><?php echo get_field('endereco', get_the_ID()); ?></span></p>
								<div class="clear"></div>
							</li>
							<li>
								<div id="iconFone"></div>
								<p><?php echo get_field('telefone', get_the_ID()); ?></p>
								<div class="clear"></div>

							</li>
						</ul>
						<a target="_blank" href="<?php echo get_field('url_compra', get_the_ID()); ?>" class="comprar">Quero comprar o ingresso</a>
					</li>
					
					
				<?php endwhile; ?>
				<div class="clear"></div>
			</ul>
		<?php endif; ?>

		<?php wp_reset_query(); ?>
		
		
		
			
		
	</div>
	<section class="cinza">
		<div class="container">
			<div class="left">
				<h3>Gourmet Butler também fornece bebidas para a sua festa.</h3>
				<div>Rótulos selecionados para que seus convidados degustem o melhor do mundo dos vinhos.</div>
			</div>
			<div class="right">
				<a href="#" class="btn-saber">Quero saber mais</a>
			</div>
			<div class="clear"></div>
		</div>
	</section>
	<div class="container">
		
			<?php query_posts(array( 
					'post_type' => 'eventos',
					'showposts' => '3',
					'meta_key' => 'status',
					'meta_value' => 'anterior'
					                   
                ));   
			?>

			<?php if(have_posts()): ?>
				<div class="passados">
					<h2>Ficou na história</h2>
					<?php $cont = 0; ?>
					<?php while (have_posts()) : the_post(); ?>
						<?php if($cont==1): ?>
							<article class="right">
								<div class="content">
									<h3><?php the_title(); ?></h3>
									<p><?php echo get_field('desc_passados', get_the_ID()); ?></p>
								</div>
								<div class="image">
									<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_field('foto', get_the_ID()); ?>&w=260&h=140&zc=1" alt="">
								</div>
								<div class="clear"></div>
							</article>
						<?php else: ?>
							<article>
								<div class="image">
									<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_field('foto', get_the_ID()); ?>&w=260&h=140&zc=1" alt="">
								</div>
								<div class="content">
									<h3><?php the_title(); ?></h3>
									<p><?php echo get_field('desc_passados', get_the_ID()); ?></p>
								</div>
								<div class="clear"></div>
							</article>
						<?php endif; ?>

					<?php $cont++; ?>	
					<?php endwhile; ?>
					<div class="clear"></div>
				</ul>
			</div>	
		<?php endif; ?>

		<?php wp_reset_query(); ?>
		
	</div>
</section>
<?php include 'includes/midia.php' ?>	


<?php

get_footer();

?>