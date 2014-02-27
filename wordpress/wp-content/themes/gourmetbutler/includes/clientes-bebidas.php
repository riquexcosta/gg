<section class="nossos-clientes">
	<div class="container">
		<div class="clientes">
			<h2>De nossos clientes</h2>
			<?php query_posts(array( 
					'post_type' => 'depoimentos',
                    'showposts' => '2'
                ));   
			?>

			<?php if(have_posts()): ?>
					<?php $contador = 0; ?>
					<?php while (have_posts()) : the_post(); ?>
						<?php if($contador==0) { ?>
							<div class="depoimento">
								<div class="foto">
									<div class="tacaIcon"></div>
									<div class="estrelas"></div>
									<div class="nome"><?php the_title(); ?></div>
									<img src="<?php the_field('foto', get_the_ID()); ?>">
								</div>
								<div class="texto">
									<p><?php the_content(); ?></p>
									<?php 
										$date = DateTime::createFromFormat('Ymd', get_field('data', get_the_ID()));

									?>
									<span class="data"><?php echo $date->format('d/m/Y'); ?></span>
								</div>	
								<div class="clear"></div>
							</div>
						<?php } else{ ?>
							<div class="divisao"></div>
							<div class="depoimento depoimento-right">
								<div class="texto">
									<p><?php the_content(); ?></p>
									<?php 
										$date = DateTime::createFromFormat('Ymd', get_field('data', get_the_ID()));

									?>
									<span class="data"><?php echo $date->format('d/m/Y'); ?></span>
								</div>	
								<div class="foto">
									<div class="tacaIcon"></div>
									<div class="estrelas"></div>
									<div class="nome"><?php the_title(); ?></div>
									<img src="<?php the_field('foto', get_the_ID()); ?>">
								</div>
								<div class="clear"></div>
							</div>
						<?php } ?>
						<?php $contador++; ?>
					<?php endwhile; ?>

			    
			<?php endif; ?>

			<?php wp_reset_query(); ?>
		</div>
		<aside>
			<div class="facebook">
				<?php include_once "facebox.php" ?>
			</div>
			<div class="sabermais">
				<p>Quer saber mais?</p>
				<form action="http://gourmetbutler.us6.list-manage.com/subscribe/post?u=ccb484c3868b713ecff2d35b6&amp;id=7a47eadeb2" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<input type="email" name="EMAIL" placeholder="digite seu e-mail">
					<input type="submit" value="">
				</form>
			</div>
		</aside>
		
		<div class="clear"></div>
	</div>
</section>





