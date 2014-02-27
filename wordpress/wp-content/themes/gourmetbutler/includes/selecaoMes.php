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
			<a href="<?php the_permalink(); ?>">
				<li>
					<div class="icon" id="conhecaSelecao"></div>
					<div class="texto">Seleção do Mês</div>
				</li>
			</a>			
		<?php endwhile; ?>
    
<?php endif; ?>
<?php wp_reset_query(); ?>


